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

        <div class="flex-1 ml-64 py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Dashboard</h1>
                <div class="flex space-x-8">
                    {{-- Display the Total Students Card --}}
                    <x-total-students-card :totalStudents="$totalStudents" />
                    
                    {{-- Display the Total Tutors Card --}}
                    <x-total-tutors-card :totalTutors="$totalTutors" />
                    
                    {{-- Display the Pending Applications Card --}}
                    <x-pending-applications-card :pendingApplications="$pendingApplications" />
                </div>
                {{-- Display First Five Pending Applications --}}
                <div class="bg-white p-6 rounded-lg shadow-md mt-4">
                    <h3 class="text-lg font-semibold text-gray-800">Pending Applications</h3>
                    <div class="mt-2">
                        <x-application-table :applications="$pendingApplications" />
                    </div>

                    {{-- Link to manage all tutor applications --}}
                    <div class="mt-4">
                        <a href="{{ route('admin.manageTutorApplications') }}" class="text-blue-500 hover:text-blue-700">
                            View all pending applications
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
