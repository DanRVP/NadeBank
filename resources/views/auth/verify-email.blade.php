<!DOCTYPE html>
<html lang="en-gb">
<head>
    <title>NadeBank - Register</title>
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
            <h1 class="col w12 ">Verify Email Address</h1>
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

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log out') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
    </div>
</main>
