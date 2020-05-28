<x:auth.layout title="{{ __('Create a new account') }}">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x:logo class="w-auto h-16 mx-auto text-primary-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            {{ __('Create a new account') }}
        </h2>
        <p class="mt-2 text-sm text-center text-gray-600 leading-5">
            {{ __('Or') }}
            <a href="{{ route('login') }}" class="link">
                {{ __('sign in to your account') }}
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="card px-4 py-8 sm:px-10">
            <x-form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="space-y-6">
                    <x-field-group for="name" label="Name" required :error="$errors->first('name')">
                        <x-field id="name" name="name" placeholder="Some text..." required autofocus value="{{ old('name', request('name')) }}" />
                    </x-field-group>

                    <x-field-group for="email" label="Email address" required :error="$errors->first('email')">
                        <x-field type="email" id="email" name="email" required value="{{ old('email', request('email')) }}" />
                    </x-field-group>

                    <x-field-group for="password" label="Password" required :error="$errors->first('password')">
                        <x-field type="password" id="password" name="password" required />
                    </x-field-group>

                    <x-field-group for="password_confirmation" label="Confirm Password" required>
                        <x-field type="password" id="password_confirmation" name="password_confirmation" required />
                    </x-field-group>

                    <div>
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit" class="button --primary --block">
                                {{ __('Register') }}
                            </button>
                        </span>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
</x:auth.layout>
