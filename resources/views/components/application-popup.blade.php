@if($application)
    <div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 z-50">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex my-2 flex-col space-y-4">
            <div class="flex">
                <div class="mr-4">
                    <img src="{{ $application->user->profile_picture ? asset('storage/' . $application->user->profile_picture) : asset('storage/profile-picture/default-image.jpg')}}" 
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
                                <dd class="mt-1 text-sm text-gray-900">{{ $application->user->first_name }} {{ $application->user->last_name }}</dd>
                            </div>
                            <div class="px-4 py-5 sm:p-6">
                                <dt class="text-sm font-medium text-gray-500">Email</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $application->user->email }}</dd>
                            </div>
                            <div class="px-4 py-5 sm:p-6">
                                <dt class="text-sm font-medium text-gray-500">Gender</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $application->user->gender }}</dd>
                            </div>
                            <div class="px-4 py-5 sm:p-6">
                                <dt class="text-sm font-medium text-gray-500">Year of Birth</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $application->user->year_of_birth }}</dd>
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
                        <dd class="text-sm text-gray-900">{{ $application->subject }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Hourly Rate</dt>
                        <dd class="text-sm text-gray-900">PHP {{ $application->hourly_rate }}/hr</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Resume</dt>
                        <dd class="text-sm text-gray-900">
                            <a href="{{ asset('storage/' . $application->resume_path) }}" 
                               class="text-blue-500 hover:underline">View Resume</a>
                        </dd>
                    </div>
                </div>
            </div>
            <div class="flex justify-end space-x-2">
                <form method="POST" action="{{ route('applications.confirm', ['id' => $application->id, 'action' => 'approve']) }}">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Approve
                    </button>
                </form>
                <form method="POST" action="{{ route('applications.confirm', ['id' => $application->id, 'action' => 'deny']) }}">
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
@else
    <p>No application data available.</p>
@endif
