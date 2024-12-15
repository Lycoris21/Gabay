<div class="w-full h-40 p-4 flex items-center relative bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @if(Auth::user()->profile_picture)
        <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="w-28 h-28 rounded-full shadow-xl">
    @else
        <img src="{{ asset('storage/profile-picture/default-image.jpg') }}" alt="Default Profile Picture" class="w-28 h-28 rounded-full shadow-xl">
    @endif
    <div class="w-[80%] flex-col p-6 text-gray-900">
        <div class="flex items-center">
            <x-header class="text-2xl">
                {{ Auth::user()->last_name }}, {{ Auth::user()->first_name }}
            </x-header>
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
        @if(Auth::user()->description)
        <p class="text-sm italic text-gray-800">
            {{ Auth::user()->description }}
        </p>
        @else
        <p class="text-sm italic text-gray-800">
            No description provided.
        </p>
        @endif

        @if(Auth::user()->is_tutor)
            <div class="flex items-center mt-0.5">
                <p class=" text-sm text-gray-800">
                    P200/hour
                </p>
                <p class="mx-3">|</p>
                <div class="flex items-center flex-wrap">
                    @foreach ($subjectTags as $subjectTag)
                        <x-subject-tag :tag="$subjectTag->subject"/>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    @if (Route::is('browse.index'))
        <div class="flex-col h-full justify-between">
            <div class="flex flex-row flex-wrap w-44 -mr-4">
                <x-external-logos src="{{ asset('storage/images/Github_Logo.png') }}" alt="External app logo" class="w-8 h-8"/>
                <x-external-logos src="{{ asset('storage/images/Gmail_Logo.png') }}" alt="External app logo" class="w-8 h-8"/>
                <x-external-logos src="{{ asset('storage/images/LinkedIn_Logo.png') }}" alt="External app logo" class="w-8 h-8"/>
            </div>
            <div class="flex flex-row flex-wrap w-36 mt-8 -mr-4">
                <x-primary-button class="block h-8 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-[12px] text-gray-700 appearance-none py-0 pl-2" 
                style="line-height: 1.5; padding-top: 0; padding-bottom: 0;">
                    Book Tutor
                </x-primary-button>
            </div>
        </div>
    @else
        <div class="flex flex-row flex-wrap w-44 -mt-20 -mr-4">
            <x-external-logos src="{{ asset('storage/images/Github_Logo.png') }}" alt="External app logo" class="w-8 h-8"/>
            <x-external-logos src="{{ asset('storage/images/Gmail_Logo.png') }}" alt="External app logo" class="w-8 h-8"/>
            <x-external-logos src="{{ asset('storage/images/LinkedIn_Logo.png') }}" alt="External app logo" class="w-8 h-8"/>
        </div>
    @endif
</div>