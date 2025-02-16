{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('user.usertemplate')

@section('contents')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="pro_information">
                    <h2 class="text-center">Profile Information</h2>

                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>
                
                    @php
                        $user = Auth::user();
                    @endphp
                
                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                
                        <!-- Email Address -->
                       <div>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control mt-1 block w-full" value="{{old('name', $user->name)}}" required autofocus autocomplete="name">
                        @error('name')
                            <span class="text-danger mt-2">{{$message}}</span>
                        @enderror
                       </div>

                       <!-- Email Address -->
                       <div class="mt-4">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control block mt-1 w-full" value="{{old('email', $user->email)}}" required autofocus autocomplete="username">
                        @error('email')
                            <span class="text-danger mt-2">{{$message}}</span>
                        @enderror

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div>
                                <p class="text-sm mt-2 text-gray-800">
                                    {{ __('Your email address is unverified.') }}
                                    
            
                                    <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </p>
            
                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-green-600">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                @endif
                            </div>
                        @endif

                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="updated-passhri">
                    <h2 class="text-center">Update Password</h2>

                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')
                
                        <div class="mt-4">
                            <label for="update_password_current_password">Current Password</label>
                            <input id="update_password_current_password" name="current_password" type="password" class="form-control mt-1 block w-full" autocomplete="current-password" />
                            @error('current_password')
                                <span class="text-danger mt-2">{{$message}}</span>
                            @enderror
                        </div>
                
                        <div class="mt-4">
                            <label for="update_password_password">New Password</label>
                            <input id="update_password_password" name="password" type="password" class="form-control mt-1 block w-full" autocomplete="new-password" />
                            @error('password')
                                <span class="text-danger mt-2">{{$message}}</span>
                            @enderror
                        </div>
                
                        <div class="mt-4">
                            <label for="update_password_password_confirmation">Confirm Password</label>
                            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control mt-1 block w-full" autocomplete="new-password" />
                            @error('password_confirmation')
                                <span class="text-danger mt-2">{{$message}}</span>
                            @enderror
                        </div>
                
                        <div class="flex items-center mt-4">
                            <button type="submit" class="btn btn-success">Save</button>
                
                            @if (session('status') === 'password-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
