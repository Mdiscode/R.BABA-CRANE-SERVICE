<x-guest-layout>
    <p class="text-2xl text-gray-600 text-center">Register</p>
    <form method="POST" action="{{ route('register') }}">
        @csrf
{{-- <h1>{{print_r($roles)}}</h1> --}}
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input  class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                             autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation"  autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                
        </div>
        <div class="mt-4">
            <label for="role" class="form-label">Role</label>
                <select name="role" id="" class="form-control">
                    @foreach ($roles as $role)
                    {{-- @if ($role == 'user' || $role == 'agent') --}}
                    <option value="{{$role}}">{{$role}}</option>
                    {{-- @endif --}}
                    
                    @endforeach
                    
                    {{-- <option value="{{$roles[1]}}">{{$roles[1]}}</option> --}}
                </select>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
