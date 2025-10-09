<x-app-layout>
   <!-- Confetti Script -->
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

  <script src="../js/PointSystem.js"></script>
  <script src="../js//Streaks.js"></script>
  <script src="../js/quizLogic.js"></script>

<div class="flex items-center justify-between mx-auto max-w-4xl px-10 mt-6">
  <p class="text-xl font-bold">{{ $quiz->name }}</p>
 
  <div class="flex items-center gap-4 bg-gray-300 border-2 border-gray-500 rounded-md py-2 px-4">
    <p id="points-text" class="text-center text-white font-bold">
      0
    </p>
  </div>
</div>
 
  <div class="mx-auto mt-10 max-w-4xl px-10 mb-5">
    @foreach($quiz->questions as $index => $question)
      <div class="question-step shadow-lg rounded-2xl p-6 {{ $index > 0 ? 'hidden' : '' }}" data-step="{{ $index }}">
        <div class="space-between flex items-center justify-center mb-6">
          <h3 class="text-2xl font-bold text-center">Vraag {{ $index+1 }}</h1>
          {{-- Streak systeem --}}
          <div class="relative flex items-center">
            <img class="rounded-lg w-5 h-5"
              src="{{ asset('images/streak-image.png') }}"
              alt="Quiz image" />
            <span
              class="streaks-text absolute left-3 top-2 text-orange-500 text-xs font-extrabold px-2 py-1 rounded bg-transparent">
              0
            </span>
          </div>
        </div>
 
        <!-- {{-- Placeholder image (can be dynamic later) --}}
        <img class="mb-10 rounded-lg mx-auto"
             src="https://operaparallele.org/wp-content/uploads/2023/09/Placeholder_Image.png"
             alt="Quiz image" /> -->
 
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
              class="nakijken px-6 py-2 bg-[#39B9EC] text-white rounded-xl shadow transition duration-200"
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
 
  .nakijken:hover {
    background: #34a2cf;
  }
 
  .space-between > * + * {
    margin-left: 15px;
  }
 
</style>