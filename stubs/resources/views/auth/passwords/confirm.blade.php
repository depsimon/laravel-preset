<x:auth.layout title="{{ __('Confirm Password') }}">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x:logo class="w-auto h-16 mx-auto text-primary-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            {{ __('Confirm Password') }}
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            {{ __('Please confirm your password before continuing.') }}

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="space-y-6">
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

                    <div class="flex items-center  mt-6">
                        <div class="text-sm leading-5 ml-auto">
                            <a href="{{ route('password.request') }}" class="font-medium text-primary-600 hover:text-primary-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    </div>

                    <div>
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-transparent rounded-md hover:bg-primary-500 focus:outline-none focus:border-primary-700 focus:shadow-outline-primary active:bg-primary-700 transition duration-150 ease-in-out">
                                {{ __('Confirm Password') }}
                            </button>
                        </span>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
</x:auth.layout>
