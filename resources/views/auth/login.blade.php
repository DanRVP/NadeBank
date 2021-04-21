<!DOCTYPE html>
<html lang="en-gb">
<head>
    <title>NadeBank - Log In</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Daniel Rogers">
    <meta name="description" content="Video Adding">
    <meta name="keywords" content="An, effective, SEO description, of, the, page">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{asset("css/styles.css")}}>
    <link rel="stylesheet" href={{asset("css/custom.css")}}>
    <link rel="stylesheet" href={{asset("css/media.css")}}>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js"   integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="   crossorigin="anonymous"></script>
    <script type="javascript" src="js/alterClass.js"></script>
    <script>
        $(document).ready(function(){
            // DOM is Ready


        }); // DOC Ready
    </script>
</head>

<main>
    <header>
        <div class="col w24">
            <div class ="col w6 header-div">
                <a href="/"><i class="fas fa-home social-media"></i></a>
                <a href="https://www.youtube.com/channel/UC6J5Yz5ppMNo-I3mUyCExRQ" target="_blank"><i class="fab fa-youtube social-media"></i></a>
                <a href=""><i class="fab fa-twitter social-media"></i></a>
            </div>
            <h1 class="col w12 ">Log In</h1>
            <div class = "col w6 header-div">
                <div class="dropdown">
                    {{--<i class="fas fa-bars dropdownButton"></i>--}}
                </div>
            </div>
        </div>
    </header>
    <div id="page w23">
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                {{--<x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="formGroupHolder">
                {{--<x-label for="email" :value="__('Email')" />--}}
                <h2 class="formTitle">Email:</h2>
                <x-input id="email" class="block mt-1 w-full formField" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4 formGroupHolder">
                {{--<x-label for="password" :value="__('Password')" />--}}
                <h2 class="formTitle">Password:</h2>
                <x-input id="password" class="block mt-1 w-full formField"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center formLabel">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4 formGroupHolder">
                @if (Route::has('password.request'))
                    <a class="customLink" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <div id="buttonHolder">
                    <x-button class="ml-3" id="submitButton">
                    {{ __('Log in') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
    </div>
</main>
