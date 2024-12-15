<x-app-layout>
    <div class="flex">
        <x-sidebar />

        {{-- Confirmation Popup --}}
        @if(session('confirmAction'))
            <x-confirmation-popup />
        @endif

        {{-- Application Popup --}}
        @if(session('showUser'))
            <x-user-popup :user="session('showUser')" />
        @endif

        <div class="flex-1 ml-64 py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Manage Users</h1>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg min-h-full">
                    <div class="p-6 text-gray-900 h-600">

                        {{-- Search and Filter Form --}}
                        <form method="GET" action="{{ route('admin.manageUsers') }}">
                            <x-text-input name="searchQuery" placeholder="Search by ID or Name" class="w-[98.5%] my-2 shadow-lg" value="{{ request('searchQuery') }}" />

                            <div class="flex justify-between mb-3 text-sm">
                                <div class="flex">
                                    <p class="self-end">
                                    {{-- Display the count of users depending on the search --}}
                                        @if($searchQuery || request('roleFilter'))
                                            {{ $users->count() }} Users Found
                                        @else
                                            {{ count($users) }} Total Users
                                        @endif
                                    </p>
                                </div>

                                {{-- Sorting and Role Filter Dropdowns --}}
                                <div class="flex space-x-4 mr-4">
                                    {{-- Sorting Dropdown --}}
                                    <div class="w-24">
                                        <select name="sortOrder"
                                                class="block h-7 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-[12px] text-gray-700 appearance-none py-0 pl-2"
                                                onchange="this.form.submit()">
                                            <option value="" disabled selected>{{ __('Sort by') }}</option>
                                            <option value="Newest" {{ request('sortOrder') == 'Newest' ? 'selected' : '' }}>{{ __('Newest') }}</option>
                                            <option value="Oldest" {{ request('sortOrder') == 'Oldest' ? 'selected' : '' }}>{{ __('Oldest') }}</option>
                                        </select>
                                    </div>

                                    {{-- Role Filter Dropdown --}}
                                    <div class="w-34">
                                        <select name="roleFilter"
                                                class="block h-7 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-[12px] text-gray-700 appearance-none py-0 pl-2"
                                                onchange="this.form.submit()">
                                            <option value="" disabled selected>{{ __('Filter by Role') }}</option>
                                            <option value="Tutor" {{ request('roleFilter') == 'Tutor' ? 'selected' : '' }}>{{ __('Tutor') }}</option>
                                            <option value="Student" {{ request('roleFilter') == 'Student' ? 'selected' : '' }}>{{ __('Student') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>

                        {{-- User Table --}}
                        <x-user-table :users="$users" />
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
