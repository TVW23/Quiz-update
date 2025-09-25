<x-guest-layout :image_buttonColor="'#E72B76'">
    <div class="w-full max-w-[400px]">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Foutmeldingen -->
            <div class="flex flex-col justify-center w-full max-w-[400px] mb-5 px-10">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Naam -->
            <div class="flex justify-center w-full max-w-[400px] mb-2 px-10">
                <x-text-input id="name" placeholder="Naam" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <!-- Email Addres -->
            <div class="flex justify-center w-full max-w-[400px] mb-2 px-10">
                <x-text-input id="email" placeholder="Email" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <!-- Wachtwoord -->
            <div class="flex justify-center w-full max-w-[400px] mb-2 px-10">
                <x-text-input id="password" placeholder="Wachtwoord" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Bevestig wachtwoord -->
            <div class="flex justify-center w-full max-w-[400px] mb-2 px-10">
                <x-text-input id="password_confirmation" placeholder="Bevestig Wachtwoord" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!-- Registreer knop -->
            <div class="flex justify-center w-full max-w-[400px] px-10">
                <x-primary-button :image_buttonColor="'#E72B76'">
                    <a action="{{ route('register') }}" href="{{ route('login') }}">
                        {{ __('Registreer') }}
                    </a>
                </x-primary-button>
            </div>

            <!-- Heb je al een account knop -->
            <div class="flex items-center justify-center mt-4">
                <a class="underline text-sm text-gray-400 rounded-md" href="{{ route('login') }}">
                    {{ __('Heb je al een account?') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
