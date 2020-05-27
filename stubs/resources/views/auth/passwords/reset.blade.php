<x:auth.layout title="{{ __('Reset Password') }}">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x:logo class="w-auto h-16 mx-auto text-primary-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            {{ __('Reset Password') }}
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="card px-4 py-8 sm:px-10">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="space-y-6">
                    <x:app.field-group for="email" label="Email address" required :error="$errors->first('email')">
                        <x:app.field type="email" id="email" name="email" required autofocus value="{{ old('email', request('email')) }}" />
                    </x:app.field-group>

                    <x:app.field-group for="password" label="Password" required :error="$errors->first('password')">
                        <x:app.field type="password" id="password" name="password" required />
                    </x:app.field-group>

                    <x:app.field-group for="password_confirmation" label="Password" required>
                        <x:app.field type="password" id="password_confirmation" name="password_confirmation" required />
                    </x:app.field-group>

                    <div class="flex items-center  mt-6">
                        <div class="text-sm leading-5 ml-auto">
                            <a href="{{ route('password.request') }}" class="link">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    </div>

                    <div>
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit" class="button --block">
                                {{ __('Reset Password') }}
                            </button>
                        </span>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
</x:auth.layout>
