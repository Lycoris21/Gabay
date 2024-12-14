<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Tutor Applications</h1>
    <table class="min-w-full bg-white rounded-lg shadow-md">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="px-6 py-3 text-left font-medium">Application ID</th>
                <th class="px-6 py-3 text-left font-medium">Name</th>
                <th class="px-6 py-3 text-left font-medium">Status</th>
                <th class="px-6 py-3 text-left font-medium">Last Modified</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
                <tr class="border-t border-gray-200">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $application->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="#" class="text-blue-500 hover:text-blue-700" 
                        onclick="togglePopup(); 
                        document.getElementById('popup-name').innerText = '{{ $application->user->first_name }} {{ $application->user->last_name }}'; 
                        document.getElementById('popup-email').innerText = '{{ $application->user->email }}'; 
                        document.getElementById('popup-gender').innerText = '{{ $application->user->gender }}'; 
                        document.getElementById('popup-birth-year').innerText = '{{ $application->user->year_of_birth }}'; 
                        document.getElementById('popup-subject').innerText = '{{ $application->subject }}'; 
                        document.getElementById('popup-hourly-rate').innerText = 'PHP {{ $application->hourly_rate }}/hr'; 
                        document.getElementById('popup-resume-link').href = '{{ asset('storage/' . $application->resume_path) }}'; 
                        @if(Auth::user()->profile_picture)
                            document.getElementById('popup-pfp').src = '{{ asset('storage/' . $application->user->profile_picture) }}';
                        @else
                            document.getElementById('popup-pfp').src = '{{ asset('storage/profile-picture/default-image.jpg') }}';
                        @endif">{{ $application->user->first_name }} {{ $application->user->last_name }}</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium 
                            @if($application->status == 'Pending') bg-yellow-100 text-yellow-800
                            @elseif($application->status == 'Approved') bg-green-100 text-green-800
                            @else bg-gray-100 text-gray-800
                            @endif">
                            {{ $application->status }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $application->updated_at->format('Y-m-d') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <form id="approve-form-{{ $application->id }}" action="{{ route('applications.approve', $application->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PATCH')
                        </form>
                        <form id="deny-form-{{ $application->id }}" action="{{ route('applications.deny', $application->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PATCH')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>