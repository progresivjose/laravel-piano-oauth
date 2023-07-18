@extends('laravel-piano-oauth::layouts.app')

@push('title')
    {{ __('Login failed') }}
@endpush

@section('content')
    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
        <div class="px-6 py-4">
        <div class="font-bold text-xl mb-4 text-gray-800">
            <h1>{{ __('Login Failed') }}</h1>
        </div>
        <div class="text-base text-gray-600">
            <p>{{ __('There was a problem when trying to validate the account') }}</p>

        </div>
        <div class="px-6 pt-4 pb-2 flex justify-between">
            <a href="{{ route('login') }}" class="text-blue-500 underline hover:text-purple-700">{{ __('Try again') }}</a>
            <a href="{{ url('/') }}" class="text-blue-500 underline hover:text-purple-700">{{ __('Return to Home') }}</a>
        </div>
        </div>
    </div>
@endsection
