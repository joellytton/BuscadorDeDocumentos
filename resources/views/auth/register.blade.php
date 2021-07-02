<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="nome_pessoa" :value="__('Name')" />

                <x-input id="nome_pessoa" class="block mt-1 w-full" type="text" name="nome_pessoa" :value="old('nome_pessoa')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email_pessoa" :value="__('Email')" />

                <x-input id="email_pessoa" class="block mt-1 w-full" type="email" name="email_pessoa" :value="old('email_pessoa')" required />
            </div>

              <!-- Login -->
              <div class="mt-4">
                <x-label for="login" :value="__('Email')" />

                <x-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="senha" :value="__('Password')" />

                <x-input id="senha" class="block mt-1 w-full"
                                type="password"
                                name="senha"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="senha_confirmation" :value="__('Confirm Password')" />

                <x-input id="senha_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="senha_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
