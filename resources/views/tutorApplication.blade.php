<x-app-layout name="tutor/1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .owl-logo {
            position: absolute;
            top: 60%;
            left: 75%;
            transform: translate(-50%, -50%) scale(1.5);
        }
    </style>
    <div class="relative flex flex-col items-center justify-start pt-32">
        <section class="h-[calc(100vh-350px)] relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div>
            <form id = "WHATEVER" action="{{ route('tutorApplication.submitStep') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <x-page-section :currentPage="$currentPage">
                    <input type="hidden" name="currentPage" value="{{ $currentPage }}">

                    @if ($currentPage === 1)
                        <x-header class="text-4xl py-4">
                            Which subject would you like to teach?
                        </x-header>
                        
                        <x-text-input placeholder="Subject" name="subject" value="{{ old('subject', session('application.subject', '')) }}" class="w-1/2"></x-text-input>
                    @elseif ($currentPage === 2)
                        <x-header class="text-4xl py-4">
                            Upload Resume
                        </x-header>
                        <x-sub-header class="my-2 text-2xl">
                            Upload your latest updated resume in PDF format
                        </x-sub-header>

                        <x-file-input name="resume" class="w-1/2" accept=".pdf"></x-file-input>
                    @elseif ($currentPage === 3)
                        <x-header class="text-4xl py-4">
                            What is your hourly rate?
                        </x-header>
                        <x-text-input placeholder="Hourly Rate" name="hourly_rate" value="{{ old('hourly_rate', session('application.hourly_rate', '')) }}" class="w-1/2"></x-text-input>
                    @elseif ($currentPage === 4)
                        <x-header class="text-4xl py-4">
                           Review Application Details:
                        </x-header>

                        <div class="items-center w-1/2 bg-white p-6 rounded-md shadow">
                           
                            <p><strong>Subject: {{ session('application.subject', 'Not specified') }}</p>
                            <p><strong>Resume:
                                @if(session('application.resume_path'))
                                    <a href="{{ asset('storage/' . session('application.resume_path')) }}" target="_blank" class="text-blue-500 underline">View Resume</a>
                                @else
                                    Not uploaded
                                @endif
                            </p>
                            <p><strong>Hourly Rate:</strong> {{ session('application.hourly_rate', 'Not specified') }}</p>
                        </div>
                    @else
                        <div class="items-center justify-items-center w-1/2 bg-white p-6 p ml-40 rounded-md shadow">
                            <img src="{{ asset('storage/images/sent.png') }}" alt="sent" class="w-28 h-28">
                            <x-header class="text-2xl mb-4">
                                Application Sent!
                            </x-header>
                            <x-sub-header class="text-lg text-center mb-4">
                                You will be notified of the status of your application.
                            </x-sub-header>
                            <x-nav-link :href="route('dashboard.userProfile')" :active="request()->routeIs('dashboard')">
                                {{ __('Back to Dashboard') }}
                            </x-nav-link>
                        </div>
                    @endif
                </x-page-section>
                
                <div class="owl-logo">
                    <img src="{{ asset('storage/images/owl.png') }}" alt="Owl" class="block w-auto fill-current">
                </div>
            </div>
        </section>

        <div class="bg-customOrange w-full h-32 mt-3"/>
    </div>
</x-app-layout>
