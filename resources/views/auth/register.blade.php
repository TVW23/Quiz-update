<x-guest-layout :image_buttonColor="'#E72B76'">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-text-input id="name" class="block mb-2" placeholder="Naam" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-2">
            <x-text-input id="email" class="block mt-1" placeholder="Email" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-2">
            <x-text-input id="password" class="block mt-1" placeholder="Wachtwoord" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-2">
            <x-text-input id="password_confirmation" class="block mt-1" placeholder="Bevestig Wachtwoord" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button :image_buttonColor="'#E72B76'">
            <a action="{{ route('register') }}" href="{{ route('login') }}">
                {{ __('Register') }}
            </a>
        </x-primary-button>

        <div class="flex items-center justify-center mt-4">
            <a class="underline text-sm text-gray-400 rounded-md" href="{{ route('login') }}">
                {{ __('Heb je al een account?') }}
            </a>
        </div>
    </form>
</x-guest-layout>
