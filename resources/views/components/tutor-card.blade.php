<div class="w-full h-40 p-4 flex items-center relative bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @if($tutor->user->profile_picture)
    <img src="{{ asset('storage/' . $tutor->user->profile_picture) }}" alt="Profile Picture" class="w-28 h-28 rounded-full shadow-xl">
    @else
    <img src="{{ asset('storage/profile-picture/default-image.jpg') }}" alt="Default Profile Picture" class="w-28 h-28 rounded-full shadow-xl">
    @endif
    <div class="w-[80%] flex-col p-6 text-gray-900">
        <div class="flex items-center">
            <x-header class="text-2xl">
                {{ $tutor->user->last_name }}, {{ $tutor->user->first_name }}
            </x-header>
            <p class="mx-5">|</p>
            <p class="text-l text-gray-800">
                {{ __('TUTOR') }}
            </p>
        </div>
        <p class="text-sm text-gray-500">
            {{ ucfirst($tutor->user->gender) }}, {{ \Carbon\Carbon::now()->year - $tutor->user->year_of_birth }} Years Old
        </p>
        @if($tutor->user->description)
        <p class="text-sm text-gray-800">
            {{ $tutor->user->description }}
        </p>
        @else
        <p class="text-sm italic text-gray-800">
            No description provided.
        </p>
        @endif

        <div class="flex items-center mt-0.5">
            <p class="text-sm text-gray-800">
                P{{ $tutor->hourly_rate_range }}/hour
            </p>
            <p class="mx-3">|</p>
            <div class="flex items-center flex-wrap">
                @foreach ($subjectTags as $subjectTag)
                <x-subject-tag :tag="$subjectTag->subject" />
                @endforeach
            </div>
        </div>
    </div>

    @if (Route::is('browse.index'))
    <div class="flex-col h-full justify-between">
        <div class="flex flex-row flex-wrap w-44 -mr-4">
            <x-external-logos src="{{ asset('storage/images/Github_Logo.png') }}" alt="External app logo" class="w-8 h-8" />
            <x-external-logos src="{{ asset('storage/images/Gmail_Logo.png') }}" alt="External app logo" class="w-8 h-8" />
            <x-external-logos src="{{ asset('storage/images/LinkedIn_Logo.png') }}" alt="External app logo" class="w-8 h-8" />
        </div>
        <div class="flex flex-row flex-wrap w-36 mt-8 -mr-4">
            <x-modal.booking-modal :tutor="$tutor" />
        </div>
    </div>
    @else
    <div class="flex flex-row flex-wrap w-44 -mt-20 -mr-4">
        <x-external-logos src="{{ asset('storage/images/Github_Logo.png') }}" alt="External app logo" class="w-8 h-8" />
        <x-external-logos src="{{ asset('storage/images/Gmail_Logo.png') }}" alt="External app logo" class="w-8 h-8" />
        <x-external-logos src="{{ asset('storage/images/LinkedIn_Logo.png') }}" alt="External app logo" class="w-8 h-8" />
    </div>
    @endif
</div>