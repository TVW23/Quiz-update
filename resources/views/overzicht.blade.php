<x-app-layout>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <header class="bg-[#39B9EC] p-4 text-white">
      <div class="mx-auto flex max-w-6xl items-center justify-between">
        <img class="w-[50px] h-[50px] rounded-[10%]" src="{{ asset('images/consortium_logo.jpg') }}" alt="Logo" />
        <nav class="space-x-4">
          <a href="#" class="hover:underline">Home</a>
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

    <div class="mx-auto max-w-4xl p-10">
      <div class="grid grid-cols-1 gap-5 p-30 sm:grid-cols-2 md:grid-cols-3">
        @php
          $colors = ['bg-[#CCD626]', 'bg-[#39B9EC]', 'bg-[#F2B300]', 'bg-[#E72B76]'];
        @endphp
      
        @foreach ($quizzes as $quiz)
          @php
            $randomColor = $colors[$loop->index % count($colors)];
          @endphp
          <div class="c w-full rounded-md {{ $randomColor }} hover:brightness-90 transition duration-300">
            <a href="/quiz/{{$quiz->id}}">
              <img class="w-full rounded-br-[20%]" src="https://tse2.mm.bing.net/th/id/OIP.uoX2AmMdsM3cON2eNjG05gHaEK?rs=1&pid=ImgDetMain&o=7&rm=3" alt="" />
              <div class="space-y-5 px-4 pt-5 pb-10">
                <h3 class="text-2xl font-bold text-white">{{$quiz->name}}</h3>
                <h4 class="text-md font-bold text-white">{{$quiz->subcategory}}</h4>
              </div>
            </a>
          </div>
        @endforeach

      </div>
    </div>
  </body>
</html>
</x-app-layout>