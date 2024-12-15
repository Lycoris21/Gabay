@if($user)
    <div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 z-50">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex my-2 flex-col space-y-4 rounded-3xl">
            <div class="flex mt-7">
                <!-- Profile Picture -->
                <div class="mr-4">
                    <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/profile-picture/default-image.jpg') }}" 
                         alt="Profile Picture" class="w-40 h-40 rounded-full" />
                </div>
                <!-- Personal Information -->
                <div class="flex-grow ml-2">
                    <div class="text-xl font-bold text-gray-800 px-4">PERSONAL INFORMATION</div>
                    <dl class="grid grid-cols-2 py-3 px-4 mb-6">
                        <!-- ID -->
                        <div>
                            <dt class="mt-1 text-sm font-medium text-gray-500">ID</dt>
                            <dt class="mt-1 text-sm font-medium text-gray-500">Name</dt>
                            <dt class="mt-1 text-sm font-medium text-gray-500">Gender</dt>
                            <dt class="mt-1 text-sm font-medium text-gray-500">Year of Birth</dt>
                            <dt class="mt-1 text-sm font-medium text-gray-500">Email</dt>
                            <dt class="mt-1 text-sm font-medium text-gray-500">Description</dt>
                            <dt class="mt-1 text-sm font-medium text-gray-500">Role</dt>
                            <dt class="mt-1 text-sm font-medium text-gray-500">Created At</dt>
                            <dt class="mt-1 text-sm font-medium text-gray-500">Updated At</dt>
                        </div>
                        <!-- Name -->
                        <div>
                            <dd class="mt-1 text-sm text-gray-900">{{ $user->id }}</dd>
                            <dd class="mt-1 text-sm text-gray-900">{{ $user->first_name }} {{ $user->last_name }}</dd>
                            <dd class="mt-1 text-sm text-gray-900">{{ $user->gender }}</dd>
                            <dd class="mt-1 text-sm text-gray-900">{{ $user->year_of_birth }}</dd>
                            <dd class="mt-1 text-sm text-gray-900">{{ $user->email }}</dd>
                            <dd class="mt-1 text-sm text-gray-900">{{ $user->description }}</dd>
                            <dd class="mt-1 text-sm text-gray-900">{{ $user->is_tutor ? 'Yes' : 'No' }}</dd>
                            <dd class="mt-1 text-sm text-gray-900">{{ $user->created_at }}</dd>
                            <dd class="mt-1 text-sm text-gray-900">{{ $user->updated_at }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
            <!-- Tutor-Specific Details -->
            @if($user->tutor)
                <div class="bg-gray-100 p-4 rounded-md">
                    <h2 class="text-lg font-medium text-gray-900">Tutor Details</h2>
                    <div class="mt-2 space-y-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Subjects to Teach</dt>
                            <dd class="text-sm text-gray-900">
                                @foreach($user->tutor->subjects as $subject)
                                    {{ $subject->subject }}<br>
                                @endforeach
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Hourly Rate</dt>
                            <dd class="text-sm text-gray-900">
                                @foreach($user->tutor->subjects as $subject)
                                    PHP {{ $subject->hourly_rate }}/hr<br>
                                @endforeach
                            </dd>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Action Buttons -->
            <div class="flex justify-end space-x-2">
                <form method="POST" action="{{ route('users.update', ['id' => $user->id]) }}">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Update User
                    </button>
                </form>
                <form method="POST" action="{{ route('users.delete', ['id' => $user->id]) }}">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Delete User
                    </button>
                </form>
                <form method="POST" action="{{ route('users.popup.close') }}">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Close
                    </button>
                </form>
            </div>
        </div>
    </div>
@else
    <p>No user data available.</p>
@endif
