<x-app-layout>
    <div class="flex">
        <x-sidebar />

        {{-- Confirmation Popup --}}
        @if(session('confirmAction'))
        <x-confirmation-popup />
        @endif

        {{-- Application Popup --}}
        @if(session('showApplication'))
        <x-application-popup :application="session('showApplication')" />
        @endif

        <div class="flex-1 ml-64 py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Manage Rejected Applications</h1>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg min-h-full">
                    <div class="p-6 text-gray-900 h-600">
                        <form method="GET" action="{{ route('admin.manageRejectedApplications') }}">
                            <x-text-input name="searchQuery" placeholder="Search by ID or Name" class="w-[98.5%] my-2 shadow-lg" value="{{ request('searchQuery') }}" />

                            <div class="flex justify-between mb-3 text-sm">
                                <div class="flex">
                                    <p class="self-end">
                                        {{ count($applications) }} Users Found
                                    </p>
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