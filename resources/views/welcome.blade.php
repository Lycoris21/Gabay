<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GABAY</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .owl-logo {
            position: absolute;
            top: 60%;
            left: 75%;
            transform: translate(-50%, -50%) scale(1.5);
        }
    </style>

</head>

<body class="font-sans antialiased">
    <div class="bg-gray-50 text-black/50">
        {{-- <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" /> --}}
        
        <header class="h-auto w-full">
                
            @if (Route::has('login'))
            
            <nav class="w-full flex flex-wrap flex-row items-center justify-around bg-white shadow-md h-20">
                @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] {{-- dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white --}}">
                    Dashboard
                </a>
                @else
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('storage/images/logoH.png') }}" alt="gabay logo" class="block w-auto fill-current max-h-7">
                    </a>
                </div>
                <div class="flex justify-center font-bold">
                    <a
                        href="{{ route('login') }}"
                        class="px-5 py-2 text-sky-900 ring-1 ring-transparent hover:underline  hover:duration-500 focus:outline-none focus-visible:ring-[#FF2D20] mr-5 active:underline underline-offset-4">
                        Courses
                    </a>
                    <a
                        href="#how-it-works"
                        class="px-5 py-2 text-sky-900 ring-1 ring-transparent hover:underline  hover:duration-500 focus:outline-none focus-visible:ring-[#FF2D20] mr-5 active:underline underline-offset-4">
                        How it Works
                    </a>
                    <a
                        href="{{ route('login') }}"
                        class="px-5 py-2 text-sky-900 ring-1 ring-transparent hover:underline  hover:duration-500 focus:outline-none focus-visible:ring-[#FF2D20]  mr-5 active:underline underline-offset-4">
                        Contact us
                    </a>
                </div>
                <div class="flex justify-start font-bold">
                    
                    <x-secondary-button class="mx-5">
                        <a
                            href="{{ route('login') }}"
                            >
                            Log in
                        </a>
                    </x-secondary-button>

                    @if (Route::has('register'))
                    <x-primary-button>
                        <a
                        href="{{ route('register') }}">
                            Register
                        </a>
                    </x-primary-button>
                </div>
                @endif
                @endauth
            </nav>
            @endif
        </header>
        <div class="relative min-h-screen flex flex-col items-center justify-start pt-36">                
            
            <section class="{{-- bg-blue-100 --}} h-[calc(100vh-350px)] relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <div class="flex flex-row">
                    <div class="w-1/2">
                        <x-header class="text-4xl py-4">
                            We’re here to help you reach your academic goals!
                        </x-header>
                        <p class="my-5 text-lg font-normal text-gray-500">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae dapibus nunc, in tristique lorem.
                        </p>
                        <x-primary-button>
                            <a
                            href="{{ route('register') }}">
                                Book a tutor
                            </a>
                        </x-primary-button>
                    </div>
                    <div class="owl-logo">
                        <img src="{{ asset('storage/images/owl.png') }}" alt="Owl" class="block w-auto fill-current">
                    </div>
                </div>
            </section>

            <div class="bg-customOrange w-full h-32">
            </div>
            <section id="how-it-works" class="{{-- bg-blue-100 --}} h-screen relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <div class="h-full flex flex-col flex-wrap justify-evenly items-center">
                    <h1 class="-my-16 -mb-28 text-4xl font-bold text-black">
                        How it works
                    </h1>
                    <div class="w-10/12 flex flex-wrap justify-evenly h-1/2">
                        <div class="flex flex-col flex-wrap justify-evenly items-center w-1/4">
                            <img src="{{ asset('/storage/images/step1.png') }}" alt="step1" class="block w-48 fill-current">
                            <x-header class="text-2xl py-3 text-sky-900">
                                Pick a tutor
                            </x-header>
                            <p class="text-md font-normal text-sky-900 text-center mb-8">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            </p>
                        </div>
                        <div class=" flex flex-col flex-wrap justify-evenly items-center w-1/4">
                            <img src="{{ asset('/storage/images/step2.png') }}" alt="step2" class="block w-48 fill-current">
                            <x-header class="text-2xl py-3 text-sky-900">
                                Choose a course
                            </x-header>
                            <p class="text-md font-normal text-sky-900 text-center mb-8">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            </p>
                        </div>
                        <div class="flex flex-col flex-wrap justify-evenly items-center w-1/4">
                            <img src="{{ asset('/storage/images/step3.png') }}" alt="step2" class="block w-48 fill-current">
                            <x-header class="text-2xl py-3 text-sky-900">
                                Join session
                            </x-header>
                            <p class="text-md font-normal text-sky-900 text-center mb-8">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="{{-- bg-blue-100 --}} h-screen relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <div class="h-full flex flex-col flex-wrap justify-evenly items-center">
                    <div class="w-5/12 flex flex-wrap justify-evenly h-2/5 border-4 border-sky-900 rounded-2xl">
                        <div class="flex flex-col flex-wrap justify-evenly items-center w-3/4 text-center text-sky-900 mt-7 mb-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ullamcorper mollis dapibus. Sed at laoreet dui. Proin tristique eros ligula, vel sollicitudin diam ullamcorper aliquam. Integer sed aliquam quam, vel porta lacus.
                        </div>
                        <div class="flex flex-col flex-wrap justify-evenly items-center w-3/4 text-center text-sky-900 mb-7">
                            <b>Xianne Jeon</b>
                            a 2-year GABAY user
                        </div>
                    </div>
                </div>
            </section>
            
            <footer class="bg-customOrange text-center text-sm text-black dark:text-white/70 w-full">
                <div class="h-full flex flex-col flex-wrap justify-evenly items-center">
                    <div class="w-8/12 flex flex-wrap justify-evenly h-2/5">
                        <div class="flex flex-col flex-wrap justify-evenly items-center w-1/8">
                            <a
                                href="{{ route('login') }}"
                                class="hover:underline  hover:duration-500 underline-offset-4">
                                Courses
                            </a>
                        </div>
                        <div class="flex flex-col flex-wrap justify-evenly items-center w-1/8">
                            <a
                                href="{{ route('login') }}"
                                class="hover:underline  hover:duration-500 underline-offset-4">
                                How It Works
                            </a>
                        </div>
                        <div class="flex flex-col flex-wrap justify-evenly items-center w-1/8">
                            <a
                                href="{{ route('login') }}"
                                class="hover:underline  hover:duration-500 underline-offset-4">
                                Contact Us
                            </a>
                        </div>
                        <div class="flex flex-col flex-wrap justify-evenly items-center w-1/8">
                            <img src="{{ asset('/storage/images/footer.png') }}" alt="footer" class="block w-32 fill-current">
                        </div>
                        <div class="flex flex-col flex-wrap justify-evenly items-center w-1/8">
                            Copyright © 2024. Gabay. All rights reserved.
                        </div>
                    </div>
                </div>
                {{-- Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) --}}
            </footer>
        </div>
    </div>

    <script>
        document.querySelector('a[href="#how-it-works"]').addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector('#how-it-works').scrollIntoView({
                behavior: 'smooth'
            });
        });
    </script>

</body>

</html>