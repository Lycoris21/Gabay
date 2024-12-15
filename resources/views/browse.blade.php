<!-- filepath: resources/views/browse.blade.php -->
<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-[calc(100vh-250px)]">
            <form method="GET" action="{{ route('browse.index') }}">
                <x-text-input name="search" placeholder="Enter a subject" class="w-[98.5%] my-5 shadow-lg" value="{{ request('search') }}" />
                <div class="flex justify-between mb-3 text-sm">
                    <div class="flex">
                        @if(request('search'))
                        <p class="self-end pr-8">Showing results for "{{ request('search') }}"</p>
                        @elseif(request('sort'))
                        <p class="self-end pr-8">Sorted by: {{ request('sort') == 'A-Z' ? 'A-Z' : (request('sort') == 'Z-A' ? 'Z-A' : 'Hourly Rate') }}</p>
                        @endif
                        <p class="self-end">{{ $tutors->count() }} Tutors Found</p>
                    </div>
                    <div class="w-24 mr-5">
                        <select id="sort" name="sort"
                            class="block h-7 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-[12px] text-gray-700 appearance-none py-0 pl-2"
                            style="line-height: 1.5; padding-top: 0; padding-bottom: 0;"
                            required
                            onchange="this.form.submit()">
                            <option value="" disabled selected>{{ __('Sort by') }}</option>
                            <option value="A-Z" {{ request('sort') == 'A-Z' ? 'selected' : '' }}>{{ __('A-Z') }}</option>
                            <option value="Z-A" {{ request('sort') == 'Z-A' ? 'selected' : '' }}>{{ __('Z-A') }}</option>
                            <option value="hourly_rate" {{ request('sort') == 'hourly_rate' ? 'selected' : '' }}>{{ __('Hourly Rate') }}</option>
                        </select>
                    </div>
                </div>
            </form>
            <div class="flex flex-col gap-5 w-full h-full overflow-y-scroll">
                @foreach ($tutors as $tutor)
                <div class="w-full pr-1">
                    <x-tutor-card :subjectTags="$tutor->subjects" :tutor="$tutor" />
                </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>