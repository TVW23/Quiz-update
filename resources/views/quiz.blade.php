<x-app-layout>

    <header class="bg-[#39B9EC] p-4 text-white">
      <div class="mx-auto flex max-w-6xl items-center justify-between">
        <img class="w-[50px] h-[50px] rounded-[10%]" src="{{ asset('images/consortium_logo.jpg') }}" alt="Logo" />
        <nav class="space-x-4">
          <a href="http://quiz-update.test/" class="hover:underline">Home</a>
          <a href="#" class="hover:underline">About</a>
          <a href="#" class="hover:underline">Contact</a>
          @if (Auth::check() && Auth::user()->isAdmin())
            <a href="/admin" class="hover:underline">Admin</a>
          @endif
        </nav>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#32a4d1] hover:text-gray-400 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link> -->
                        
                        <x-dropdown-link href="#" 
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                            {{ __('Delete Account') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-100">
                        {{ __('Are you sure you want to delete your account?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <div class="mt-6">
                        <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                        <x-text-input
                            id="password"
                            name="password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="{{ __('Password') }}"
                        />

                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button class="ms-3 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            {{ __('Delete Account') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
      </div>
    </header>
  <div class="flex items-center justify-between mx-auto max-w-4xl px-10 mt-6">
    <p class="text-xl font-bold">{{ $quiz->name }}</p>
    <p class="bg-gray-300 border-2 border-gray-500 rounded-md py-2 px-3 text-center text-white font-bold">
      0
    </p>
  </div>

  <div class="mx-auto mt-10 max-w-4xl px-10 mb-5">
    @foreach($quiz->questions as $index => $question)
      <div class="question-step shadow-lg rounded-2xl p-6 {{ $index > 0 ? 'hidden' : '' }}" data-step="{{ $index }}">
        <h1 class="text-2xl font-bold mb-6 text-center">Vraag {{ $index+1 }}</h1>

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
  // Disable all answer buttons and add borders
  current.querySelectorAll('.button-layout').forEach(b => {
    b.disabled = true;
    b.classList.remove('ring-4', 'ring-black-500', 'ring-green-500', 'ring-red-500');
    if (b.dataset.correct == "1") {
      b.classList.add('ring-4', 'ring-green-500');
    }
  });
  // Check if correct
  if (selectedBtn.dataset.correct == "1") {
    feedback.textContent = "Goed gedaan! Dit is het correcte antwoord.";
    feedback.style.color = "green";
  } else {
    // Find the correct answer text
    const correctBtn = current.querySelector('[data-correct="1"]');
    const correctText = correctBtn ? correctBtn.textContent.trim() : '';
    feedback.textContent = `Helaas, je had de vraag fout. Het juiste antwoord was: ${correctText}`;
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

  // Reset selected state and enable buttons
  current.querySelectorAll('.button-layout').forEach(b => {
    b.classList.remove('ring-4', 'ring-black-500', 'ring-green-500', 'ring-red-500');
    delete b.dataset.selected;
    b.disabled = false;
  });

  current.classList.add('hidden');
  if (next) {
    next.classList.remove('hidden');
  } else {
    alert("Quiz afgerond!");
    // Go back to the dashboard, or leaderboard
    window.location.href = 'http://quiz-update.test/';
  }
}
</script>
