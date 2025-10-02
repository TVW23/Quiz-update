<x-app-layout>

    <header class="bg-[#39B9EC] p-4 text-white">
      <div class="mx-auto flex max-w-6xl items-center justify-between">
        <a href="/overzicht">
          <img class="w-[50px] h-[50px] rounded-[10%]" src="{{ asset('images/consortium_logo.jpg') }}" alt="Logo" />
        </a>
        <nav class="hidden sm:flex space-x-4">
          <a href="/overzicht" class="hover:underline">Home</a>
          <a href="#" class="hover:underline">About</a>
          <a href="#" class="hover:underline">Contact</a>
          @if (Auth::check() && Auth::user()->isAdmin())
            <a href="/admin" class="hover:underline">Admin</a>
          @endif
        </nav>

            <!-- Settings Dropdown -->
            <div class="sm:items-center sm:ms-6">
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
                        <div class="flex lg:hidden md:hidden">
                          <x-dropdown-link href="/overzicht">
                              {{ __('Home') }}
                          </x-dropdown-link>
                        </div>

                        <div class="flex lg:hidden md:hidden">
                          <x-dropdown-link href="#">
                              {{ __('About') }}
                          </x-dropdown-link>
                        </div>

                        <div class="flex lg:hidden md:hidden">
                          <x-dropdown-link href="#">
                              {{ __('Contact') }}
                          </x-dropdown-link>
                        </div>

                        @if (Auth::check() && Auth::user()->isAdmin())
                        <div class="flex lg:hidden md:hidden">
                          <x-dropdown-link href="#">
                              {{ __('Admin') }}
                          </x-dropdown-link>
                        </div>
                        @endif
                        
                        <x-dropdown-link href="#" 
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                            {{ __('Verwijder Account') }}
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
                        {{ __('Weet je zeker dat je jouw account wilt verwijderen?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Als jouw account verwijderd is, dan zijn alle gegevens van dat account permanent verwijderd. Voer je wachtwoord in om te bevestigen dat je jouw account permanent wilt verwijderen.') }}
                    </p>

                    <div class="mt-6">
                        <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                        <x-text-input
                            id="password"
                            name="password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="{{ __('Wachtwoord') }}"
                        />

                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Annuleer') }}
                        </x-secondary-button>

                        <x-danger-button class="ms-3 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            {{ __('Verwijder Account') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
      </div>
    </header>

  <script src="../js/PointSystem.js"></script>
  <script src="../js//Streaks.js"></script>
  <script src="../js/quizLogic.js"></script>
<div class="flex items-center justify-between mx-auto max-w-4xl px-10 mt-6">
  <p class="text-xl font-bold">{{ $quiz->name }}</p>

  <div class="flex items-center gap-4 bg-gray-300 border-2 border-gray-500 rounded-md py-2 px-4">
    <p id="points-text" class="text-center text-white font-bold">
      0
    </p>
    <!-- Streak image with counter on top -->
    <div class="relative flex items-center">
      <img class="rounded-lg w-5 h-5" 
        src="{{ asset('images/streak-image.png') }}" 
        alt="Quiz image" />
      <span id="streaks-text"
        class="absolute left-3 top-2 text-orange-500 text-xs font-extrabold px-2 py-1 rounded bg-transparent">
        0
      </span>
    </div>
  </div>
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