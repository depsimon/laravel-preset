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
            <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:text-primary-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                {{ __('create a new account') }}
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                            {{ __('Email address') }}
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="email" name="email" type="email" required autofocus value="{{ old('email', request('email')) }}" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                        </div>

                        @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                            {{ __('Password') }}
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="password" name="remember" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                        </div>

                        @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center mt-6">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox" class="form-checkbox w-4 h-4 text-primary-600 transition duration-150 ease-in-out" />
                            <label for="remember" class="block ml-2 text-sm text-gray-900 leading-5">
                                {{ __('Remember') }}
                            </label>
                        </div>

                        <div class="text-sm leading-5 ml-auto">
                            <a href="{{ route('password.request') }}" class="font-medium text-primary-600 hover:text-primary-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    </div>

                    <div>
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-transparent rounded-md hover:bg-primary-500 focus:outline-none focus:border-primary-700 focus:shadow-outline-primary active:bg-primary-700 transition duration-150 ease-in-out">
                                {{ __('Sign in') }}
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x:auth.layout>
