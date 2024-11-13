<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GABAY</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>

<body class="font-sans antialiased">
    <div class="bg-gray-50 text-black/50"}>
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
                        href="{{ route('login') }}"
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
                    <a
                        href="{{ route('login') }}"
                        class="justify-self-end border border-solid border-sky-900 font-bold rounded-full px-5 py-2 text-sky-900 ring-1 ring-transparent transition hover:border-sky-700 hover:bg-sky-700 hover:text-white hover:duration-500 focus:outline-none focus-visible:ring-[#FF2D20] mr-5 hover:shadow-md">
                        Log in
                    </a>

                    @if (Route::has('register'))
                    <div class="justify-self-end border border-transparent rounded-full px-5 py-2 text-white ring-1 font-bold ring-transparent transition hover:bg-sky-700 hover:duration-500 hover:shadow-md focus:outline-none focus-visible:ring-[#FF2D20] bg-sky-900">
                        <a
                        href="{{ route('register') }}">
                            Register
                        </a>
                    </div>
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
                        <h1 class="my-5 text-4xl font-bold text-black">
                            We’re here to help you reach your academic goals!
                        </h1>
                        <p class="my-5 text-lg font-normal text-gray-500">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae dapibus nunc, in tristique lorem.
                        </p>
                        <div class="justify-self-start border border-transparent rounded-full px-5 py-2 text-white ring-1 font-bold ring-transparent transition hover:bg-sky-700 hover:duration-500 hover:shadow-md focus:outline-none focus-visible:ring-[#FF2D20] bg-sky-900">
                            <a
                            href="{{ route('register') }}">
                                Book a tutor
                            </a>
                        </div>
                    </div>
                    <div class="absolute top-1 left-2/3">
                        <img src="{{ asset('storage/images/owl.png') }}" alt="Owl" class="block w-auto fill-current scale-150">
                    </div>
                </div>
            </section>

            <div class="bg-customOrange w-full h-32">
            </div>
            <section class="{{-- bg-blue-100 --}} h-screen relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <div class="h-full flex flex-col flex-wrap justify-evenly items-center">
                    <h1 class="-my-16 -mb-28 text-4xl font-bold text-black">
                        How it works
                    </h1>
                    <div class="w-full flex flex-wrap justify-evenly h-1/2">
                        <div class="flex flex-col flex-wrap justify-evenly items-center border-2 border-black w-1/4">
                            something here
                        </div>
                        <div class=" flex flex-col flex-wrap justify-evenly items-center border-2 border-black w-1/4">
                            something here
                        </div>
                        <div class="flex flex-col flex-wrap justify-evenly items-center border-2 border-black w-1/4">
                            something here
                        </div>
                    </div>
                </div>
            </section>
            
            {{--<footer class="py-16 text-center text-sm text-black dark:text-white/70">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>--}} 
        </div>
    </div>
</body>

</html>