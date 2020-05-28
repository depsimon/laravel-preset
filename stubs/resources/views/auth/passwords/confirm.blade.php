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
        <div class="card px-4 py-8 sm:px-10">
            {{ __('Please confirm your password before continuing.') }}

            <x-form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="space-y-6">
                    <x-field-group for="password" label="Password" required :error="$errors->first('password')">
                        <x-field type="password" id="password" name="password" required />
                    </x-field-group>

                    <div class="flex items-center  mt-6">
                        <div class="text-sm leading-5 ml-auto">
                            <a href="{{ route('password.request') }}" class="link">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    </div>

                    <div>
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit" class="button --primary --block">
                                {{ __('Confirm Password') }}
                            </button>
                        </span>
                    </div>
                </div>
            </x-form>
            @endif
        </div>
    </div>
</x:auth.layout>
