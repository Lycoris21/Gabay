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

        <div class="flex-1 ml-64 py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Dashboard</h1>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg min-h-full">
                    <div class="p-6 text-gray-900 h-600">
                        <x-application-table :applications="$applications" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
