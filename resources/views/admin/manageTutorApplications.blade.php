<x-app-layout>
    <div class="flex">
        <x-sidebar />
        
        {{-- Confirmation Popup --}}
        @if(session('confirmAction'))
            <x-confirmation-popup/>
        @endif

        {{-- Application Popup --}}
        @if(session('showApplication'))
            <x-application-popup :application="session('showApplication')" />
        @endif

        <div class="flex-1 ml-64 py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Manage Tutor Applications</h1>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg min-h-full">
                    <div class="p-6 text-gray-900 h-600">

                        {{-- Search and Filter Form --}}
                        <form method="GET" action="{{ route('admin.manageTutorApplications') }}">
                            <x-text-input name="searchQuery" placeholder="Search by ID or Name" class="w-[98.5%] my-2 shadow-lg" value="{{ request('searchQuery') }}" />

                            <div class="flex justify-between mb-3 text-sm">
                                <div class="flex">
                                    <p class="self-end">
                                        {{-- Display the count of applications depending on the search --}}
                                        {{ count($applications) }} Users Found
                                    </p>
                                </div>

                                {{-- Sorting Dropdown --}}
                                <div class="w-24 mr-5">
                                    <select name="sortOrder"
                                            class="block h-7 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-[12px] text-gray-700 appearance-none py-0 pl-2"
                                            onchange="this.form.submit()">
                                        <option value="" disabled selected>{{ __('Sort by') }}</option>
                                        <option value="Newest" {{ request('sortOrder') == 'Newest' ? 'selected' : '' }}>{{ __('Newest') }}</option>
                                        <option value="Oldest" {{ request('sortOrder') == 'Oldest' ? 'selected' : '' }}>{{ __('Oldest') }}</option>
                                    </select>
                                </div>
                            </div>
                        </form>

                        <x-application-table :applications="$applications" />

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
