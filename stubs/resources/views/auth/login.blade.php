<x:auth.layout title="{{ __('Sign in to your account') }}">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x:logo class="w-auto h-16 mx-auto text-primary-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            {{ __('Sign in to your account') }}
        </h2>
        <p class="mt-2 text-sm text-center text-gray-600 leading-5">
            {{ __('Or') }}
            <a href="{{ route('register') }}" class="link">
                {{ __('create a new account') }}
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="card px-4 py-8 sm:px-10">
            <x-form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="space-y-6">
                    <x-field-group for="email" label="Email address" required :error="$errors->first('email')">
                        <x-field type="email" id="email" name="email" required autofocus value="{{ old('email', request('email')) }}" />
                    </x-field-group>

                    <x-field-group for="password" label="Password" required :error="$errors->first('password')">
                        <x-field type="password" id="password" name="password" required />
                    </x-field-group>

                    <div class="flex items-center">
                        <x-field-group for="remember" checkbox label="Remember" :error="$errors->first('password')" class="w-auto">
                            <x-field type="checkbox" id="remember" name="remember" />
                        </x-field-group>

                        <div class="text-sm leading-5 ml-auto">
                            <a href="{{ route('password.request') }}" class="link">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    </div>

                    <div>
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit" class="button --primary --block">
                                {{ __('Sign in') }}
                            </button>
                        </span>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
</x:auth.layout>
