<!-- Just the dashboard for now -->
 
<x-app-layout>
    <div class="py-5">
        <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mr-5 w-1/3 flex-col items-center">
                <div class="mb-2 h-40 p-10 bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
                    NOTIFICATIONS
                </div>

                <div class="mb-2 h-40 p-10 bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
                    CALENDAR
                </div>
            </div>
            <div class="w-3/4 h-40 p-10 flex items-center relative bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(Auth::user()->profile_picture)
                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="w-28 h-28 rounded-full shadow-xl">
                @else
                    <img src="{{ asset('storage/profile-picture/default-image.jpg') }}" alt="Default Profile Picture" class="w-28 h-28 rounded-full shadow-xl">
                @endif
                <div class="w-3/4 flex-col p-6 text-gray-900">
                    <div class="flex items-center">
                        <x-header class="text-2xl">
                            {{ Auth::user()->last_name }}, {{ Auth::user()->first_name }}
                        </x-header>
                        {{-- <p class="text-gray-500">
                            Profile ID: {{ Auth::user()->id }}
                        </p> --}}

                        <p class="mx-5">|</p>
                        
                        <p class=" text-l text-gray-800">
                            @if(Auth::user()->is_tutor)
                            {{ __('TUTOR') }}
                            @else
                            {{ __('STUDENT') }}
                            @endif
                        </p>
                    </div>
                    <p class="text-sm text-gray-500">
                        {{ ucfirst(Auth::user()->gender) }}, {{ \Carbon\Carbon::now()->year - Auth::user()->year_of_birth }} Years
                    </p>
                    {{-- <p class="text-gray-500">
                        {{ Auth::user()->email }}
                    </p> --}}

                    @if(Auth::user()->description)
                    <p class="text-sm italic text-gray-800">
                        {{ Auth::user()->description }}
                    </p>
                    @else
                    <p class="text-sm italic text-gray-800">
                        No description provided.
                    </p>
                    @endif
                </div>
                <div class="flex w-1/4 items-start justify-end">
                    <x-external-logos src="{{ asset('storage/images/Github_Logo.png') }}" alt="External app logo"/>
                    <x-external-logos src="{{ asset('storage/images/Gmail_Logo.png') }}" alt="External app logo"/>
                    <x-external-logos src="{{ asset('storage/images/LinkedIn_Logo.png') }}" alt="External app logo"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>