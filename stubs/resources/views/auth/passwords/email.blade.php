<x:auth.layout title="{{ __('Reset Password') }}">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x:logo class="w-auto h-16 mx-auto text-primary-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            {{ __('Reset Password') }}
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
            @if (session('status'))
            <div class="rounded-md bg-green-100 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>

                    <div class="ml-3">
                        <p class="text-sm leading-5 font-medium text-green-800">
                            {{ session('status') }}
                        </p>
                    </div>
                </div>
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="space-y-6">
                    <x:app.field-group for="email" label="Email address" required :error="$errors->first('email')">
                        <x:app.field type="email" id="email" name="email" required autofocus value="{{ old('email', request('email')) }}" />
                    </x:app.field-group>

                    <div>
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit" class="button --block">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x:auth.layout>
