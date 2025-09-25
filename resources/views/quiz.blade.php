<x-app-layout>
  <div class="flex items-center justify-between mx-auto max-w-4xl px-10 mt-6">
    <p class="text-xl font-bold">{{ $quiz->name }}</p>
    <p class="bg-gray-300 border-2 border-gray-500 rounded-md py-2 px-3 text-center text-white font-bold">
      Punten
    </p>
  </div>

  <div class="mx-auto mt-10 max-w-4xl px-10 mb-5">
    @foreach($quiz->questions as $index => $question)
      <div class="question-step shadow-lg rounded-2xl p-6 {{ $index > 0 ? 'hidden' : '' }}" data-step="{{ $index }}">
        <h1 class="text-2xl font-bold mb-6 text-center">Vraag {{ $index+1 }}</h1>

        {{-- Placeholder image (can be dynamic later) --}}
        <img class="mb-10 rounded-lg mx-auto"
             src="https://operaparallele.org/wp-content/uploads/2023/09/Placeholder_Image.png"
             alt="Quiz image" />

        <p class="mb-5 text-center text-2xl font-bold">{{ $question->question }}</p>

        <div class="grid grid-cols-2 gap-4 text-white font-bold">
          @foreach($question->answers as $aIndex => $answer)
            <div>
              @php
                // 0: top left, 1: top right, 2: bottom left, 3: bottom right
                $colorClass = '';
                switch($aIndex) {
                  case 0: $colorClass = 'bg-[#E72B76] text-white hover:bg-[#b42b76]'; break; // top left
                  case 1: $colorClass = 'bg-[#CCD626] text-white hover:bg-[#98d626]'; break; // top right
                  case 2: $colorClass = 'bg-[#39B9EC] text-white hover:bg-[#34a2cf]'; break; // bottom left
                  case 3: $colorClass = 'bg-[#F2B300] text-white hover:bg-[#d19b00]'; break; // bottom right
                }
              @endphp
              <button
                onclick="getQuizAnswer(this)"
                class="button-layout {{ $colorClass }}"
                data-answer-id="{{ $answer->id }}"
                data-correct="{{ $answer->is_correct }}"
              >
                {{ $answer->choice }}
              </button>
            </div>
          @endforeach
        </div>

        <div class="text-center mt-6">
          <p class="mb-4 text-lg font-semibold" style="display:none" id="feedback-{{ $index }}"></p>
            <div class="flex justify-end">
            <button
              onclick="checkAnswer({{ $index }})"
              class="px-6 py-2 bg-blue-600 text-white rounded-xl shadow hover:bg-blue-700"
              id="check-btn-{{ $index }}"
            >
              Nakijken &raquo;
            </button>
            </div>
            <div class="flex justify-end">
            <button
              onclick="nextQuestion({{ $index }})"
              class="px-6 py-2 bg-green-600 text-white rounded-xl shadow hover:bg-green-700 mt-2"
              id="next-btn-{{ $index }}"
              style="display:none"
            >
              Volgende vraag &raquo;
            </button>
            </div>
        </div>
      </div>
    @endforeach
  </div>
</x-app-layout>

<style>
  .button-layout {
    @apply w-full py-3 rounded-lg transition-colors duration-200;
  }
</style>

<script>

function getQuizAnswer(button) {
  // Find the parent question step container
  const parent = button.closest('.question-step');
  // Remove selection and highlight from all answer buttons in this question
  parent.querySelectorAll('.button-layout').forEach(b => {
    b.classList.remove('ring-4', 'ring-green-500', 'ring-red-500');
    delete b.dataset.selected;
  });
  button.classList.add('ring-4', 'ring-black-500');
  button.dataset.selected = "true";
  // Hide feedback and next button if user changes answer before checking
  const step = parent.dataset.step;
  document.getElementById('feedback-' + step).style.display = 'none';
  document.getElementById('next-btn-' + step).style.display = 'none';
  document.getElementById('check-btn-' + step).style.display = '';
}

function checkAnswer(step) {
  const current = document.querySelector(`.question-step[data-step="${step}"]`);
  const selectedBtn = current.querySelector('[data-selected="true"]');
  const feedback = document.getElementById('feedback-' + step);
  if (!selectedBtn) {
    alert("Kies eerst een antwoord!");
    return;
  }
  // Check if correct
  if (selectedBtn.dataset.correct == "1") {
    feedback.textContent = "Goed gedaan! Dit is het juiste antwoord.";
    feedback.style.color = "green";
  } else {
    feedback.textContent = "Helaas, dit is niet het juiste antwoord.";
    feedback.style.color = "red";
  }
  feedback.style.display = '';
  document.getElementById('next-btn-' + step).style.display = '';
  document.getElementById('check-btn-' + step).style.display = 'none';
}


function nextQuestion(step) {
  const current = document.querySelector(`.question-step[data-step="${step}"]`);
  const next = document.querySelector(`.question-step[data-step="${step+1}"]`);

  // Hide feedback and next button for current question
  document.getElementById('feedback-' + step).style.display = 'none';
  document.getElementById('next-btn-' + step).style.display = 'none';
  document.getElementById('check-btn-' + step).style.display = '';

  // Reset selected state for buttons
  current.querySelectorAll('.button-layout').forEach(b => {
    b.classList.remove('ring-4', 'ring-black-500');
    delete b.dataset.selected;
  });

  current.classList.add('hidden');
  if (next) {
    next.classList.remove('hidden');
  } else {
    alert("Quiz afgerond!");

    // Go back to the dashboard, or leaderboard
  }
}
</script>
