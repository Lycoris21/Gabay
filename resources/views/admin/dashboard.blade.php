<x-app-layout>
    <div class="flex">
        <x-sidebar />
        
        {{-- Confirmation Popup --}}
        @if(session('confirmAction'))
            <div id="confirm-popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex my-2 flex-col space-y-4">
                    <p>Are you sure you want to {{ session('confirmAction') }} this application?</p>
                    <div class="flex justify-end space-x-2">
                        {{-- Approve Button --}}
                        @if(session('confirmAction') === 'approve')
                            <form method="POST" action="{{ route('applications.approve', ['id' => session('currentFormId')]) }}">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                    Confirm
                                </button>
                            </form>
                        @endif

                        {{-- Deny Button --}}
                        @if(session('confirmAction') === 'deny')
                            <form method="POST" action="{{ route('applications.deny', ['id' => session('currentFormId')]) }}">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                    Confirm
                                </button>
                            </form>
                        @endif

                        {{-- Cancel Button --}}
                        <form method="GET" action="{{ route('admin.dashboard') }}">
                            <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                                Cancel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        {{-- Application Popup --}}
        @if(session('showApplication'))
            <div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex my-2 flex-col space-y-4">
                    <div class="flex">
                        <div class="mr-4">
                            <img src="{{ session('application')->user->profile_picture ? asset('storage/' . session('application')->user->profile_picture) : asset('storage/profile-picture/default-image.jpg')}}" 
                                alt="Profile Picture" class="w-32 h-32 rounded-full" />
                        </div>

                        <div class="flex-grow">
                            <div class="mb-4">
                                <div class="text-lg font-medium text-gray-900">PERSONAL INFORMATION</div>
                            </div>
                            <div class="mt-4">
                                <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <div class="px-4 py-5 sm:p-6">
                                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ session('application')->user->first_name }} {{ session('application')->user->last_name }}</dd>
                                    </div>
                                    <div class="px-4 py-5 sm:p-6">
                                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ session('application')->user->email }}</dd>
                                    </div>
                                    <div class="px-4 py-5 sm:p-6">
                                        <dt class="text-sm font-medium text-gray-500">Gender</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ session('application')->user->gender }}</dd>
                                    </div>
                                    <div class="px-4 py-5 sm:p-6">
                                        <dt class="text-sm font-medium text-gray-500">Year of Birth</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ session('application')->user->year_of_birth }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-md">
                        <h2 class="text-lg font-medium text-gray-900">Application Details</h2>
                        <div class="mt-2 space-y-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Subject to Teach</dt>
                                <dd class="text-sm text-gray-900">{{ session('application')->subject }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Hourly Rate</dt>
                                <dd class="text-sm text-gray-900">PHP {{ session('application')->hourly_rate }}/hr</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Resume</dt>
                                <dd class="text-sm text-gray-900">
                                    <a href="{{ asset('storage/' . session('application')->resume_path) }}" 
                                       class="text-blue-500 hover:underline">View Resume</a>
                                </dd>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <form method="POST" action="{{ route('applications.confirm', ['id' => session('application')->id, 'action' => 'approve']) }}">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                Approve
                            </button>
                        </form>
                        <form method="POST" action="{{ route('applications.confirm', ['id' => session('application')->id, 'action' => 'deny']) }}">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                Deny
                            </button>
                        </form>
                        <form method="POST" action="{{ route('applications.popup.close') }}">
                            @csrf
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Close
                            </button>
                        </form>
                    </div>
                </div>
            </div>
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
