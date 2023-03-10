@extends('layouts.app')
@extends('layouts.base')
@include('layouts.master')
@section('content')
<div class="container-fluid my-3">
    <div class="col-md-12 wow fadeInDown">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" style="background-color:rgb(0, 0, 0); padding:10px;">
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/logo.png') }}" style="width: 100%">
            </div>
        </div>

        @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        
</div>
</div>
</div>
@endsection