<x-app-layout name="tutor/1">
    <div class="relative flex flex-col items-center justify-start pt-36">                
            
        <section class="h-[calc(100vh-350px)] relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div>
                
                    <x-page-section :currentPage="$currentPage">
                        @if ($currentPage === 1)
                            <x-header>
                                Which subject would you like to teach?
                            </x-header>
                            <x-text-input placeholder="Subject" name="subject" id="subject" class="w-1/2"></x-text-input>
                        @elseif ($currentPage === 2)
                            <x-header>
                                Upload Resume
                            </x-header>
                            <x-sub-header>
                                Upload your latest updated resume in PDF format
                            </x-sub-header>

                            <form id="resume-upload-form" action="{{ route('applcation.resume.upload') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <x-file-input name="resume" class="w-1/2" accept=".pdf"></x-file-input>
                            </form>
                        @elseif ($currentPage === 3)
                            <x-header>
                                What is your hourly rate?
                            </x-header>
                            <x-text-input/>
                        @else
                            <x-header>
                                Confirm Details
                            </x-header>
                            <div class="items-center w-1/2 bg-white p-6 rounded-md shadow">
                                <p><strong>Subject:</strong> {{ session('subject', 'Not specified') }}</p>
                                <p><strong>Resume:</strong> 
                                    @if(session('resume_path'))
                                        <a href="{{ asset('storage/' . session('resume_path')) }}" target="_blank" class="text-blue-500 underline">View Resume</a>
                                    @else
                                        Not uploaded
                                    @endif
                                </p>
                                <p><strong>Hourly Rate:</strong> {{ session('hourly_rate', 'Not specified') }} {{ session('currency', '') }}</p>
                            </div>
                            
                        @endif
                    </x-page-section>
                
                <div class="absolute top-1 left-2/3">
                    <img src="{{ asset('storage/images/owl.png') }}" alt="Owl" class="block w-auto fill-current scale-150">
                </div>
            </div>
        </section>

        <div class="bg-customOrange w-full h-32 mt-3"/>
    </div>
</x-app-layout>
