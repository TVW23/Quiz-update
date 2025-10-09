<header class="bg-[#39B9EC] p-4 text-white">
    <div class="mx-auto flex max-w-6xl items-center justify-between">
        <!-- Logo -->
        <a href="/overzicht">
            <img class="w-[50px] h-[50px] rounded-[10%]" 
                 src="{{ asset('images/consortium_logo.jpg') }}" 
                 alt="Logo" />
        </a>

        <!-- Navigation Links -->
        <nav class="hidden sm:flex space-x-4">
            <a href="/" class="hover:underline">Home</a>
            @auth
                @if(Auth::user()->isAdmin())
                    <a href="/admin" class="hover:underline">Admin</a>
                @endif
            @endauth
        </nav>

        <!-- Settings Dropdown -->
        <div class="sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#32a4d1] hover:text-gray-400 focus:outline-none transition ease-in-out duration-150">
                        @auth
                            <div>{{ Auth::user()->name }}</div>
                        @else
                            <div>Gast</div>
                        @endauth
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <!-- Mobile nav (hidden on lg/md) -->
                    <div class="flex lg:hidden md:hidden">
                        <x-dropdown-link href="/">
                            {{ __('Home') }}
                        </x-dropdown-link>
                    </div>

                    @auth
                        @if(Auth::user()->isAdmin())
                            <div class="flex lg:hidden md:hidden">
                                <x-dropdown-link href="/admin">
                                    {{ __('Admin') }}
                                </x-dropdown-link>
                            </div>
                        @endif
                    @endauth

                    @auth
                        <!-- Account deletion -->
                        <x-dropdown-link href="#"
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                            {{ __('Verwijder Account') }}
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    @else
                        <!-- If guest -->
                        <x-dropdown-link href="{{ route('login') }}">
                            {{ __('Log in') }}
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ route('register') }}">
                            {{ __('Registreren') }}
                        </x-dropdown-link>
                    @endauth
                </x-slot>
            </x-dropdown>
        </div>

        <!-- Delete account modal -->
        @auth
            <x-modal name="confirm-user-deletion"
                     :show="($errors->getBag('userDeletion') ?? collect())->isNotEmpty()"
                     focusable>
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
                        <x-input-error :messages="$errors->getBag('userDeletion')->get('password') ?? []" class="mt-2" />
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
        @endauth
    </div>
</header>
