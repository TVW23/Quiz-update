<x-guest-layout :image_buttonColor="'#39B9EC'">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="w-full max-w-[400px]">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <div>
                    <!-- Email Address -->
                    <div class="flex justify-center w-full max-w-[400px] mb-2 px-10">
                        <x-text-input id="email" type="email" placeholder="Email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class=" mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="flex justify-center w-full max-w-[400px] px-10">
                        <x-text-input id="password" placeholder="Password" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-5 justify-self-center">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class=" rounded"  name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Onthoudt mij') }}</span>
                        </label>
                    </div>

                    <div class="flex justify-center w-full max-w-[400px] px-10">
                        <x-primary-button :image_buttonColor="'#39B9EC'">
                            {{ __('Inloggen') }}
                        </x-primary-button>
                    </div>

                    <!-- <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div> -->

                    <div class="flex items-center justify-center mt-4">
                        @if (Route::has('register'))
                            <a class=" text-sm text-gray-400 rounded-md" href="{{ route('register') }}">
                                {!! __('Heb je nog geen account?') . ' <u>' . __('Meld je dan aan!') . '</u>' !!}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>