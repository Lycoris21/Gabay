<x-app-layout>
    <script>
        function togglePopup() {
            const popup = document.getElementById('popup');
            popup.classList.toggle('hidden');
        }
    </script>

    
    <div class="flex">
        
        <div class="bg-gray-800 w-64 h-screen fixed">
            <div class="flex flex-col items-start mt-8 px-4 space-y-2">
                <a href="#" class="text-gray-300 hover:text-gray-100 block px-4 py-2 rounded-md">
                    <!-- Home link SVG here -->
                    Home
                </a>
                <a href="#" class="text-gray-300 hover:text-gray-100 block px-4 py-2 rounded-md">
                    <!-- Manage Users link SVG here -->
                    Manage Users
                </a>
                <a href="#" class="text-gray-300 hover:text-gray-100 block px-4 py-2 rounded-md">
                    <!-- Analytics link SVG here -->
                    Analytics
                </a>
                <a href="#" class="text-gray-300 hover:text-gray-100 block px-4 py-2 rounded-md">
                    <!-- Settings link SVG here -->
                    Settings
                </a>
            </div>
        </div>

        <div id="popup" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-75">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex my-2">
                <!-- Profile Picture Section -->
                <div class="mr-4">
                    <img id="popup-pfp" src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200&d=identicon" alt="Profile Picture" class="w-64 h-32 rounded-full" />
                </div>

                <!-- Personal Information Section -->
                <div class="flex-grow">
                    <div class="mb-4">
                        <div class="text-lg font-medium text-gray-900">
                            PERSONAL INFORMATION
                        </div>
                    </div>

                    <div class="mt-4">
                        <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="px-4 py-5 sm:p-6">
                                <dt class="text-sm font-medium text-gray-500">Name</dt>
                                <dd class="mt-1 text-sm text-gray-900" id="popup-name">Gretchen Marie Calisto</dd> <!-- This will be dynamically updated -->
                            </div>
                            <div class="px-4 py-5 sm:p-6">
                                <dt class="text-sm font-medium text-gray-500">Email</dt>
                                <dd class="mt-1 text-sm text-gray-900" id="popup-email">gretchen@example.com</dd> <!-- This will be dynamically updated -->
                            </div>
                            <div class="px-4 py-5 sm:p-6">
                                <dt class="text-sm font-medium text-gray-500">Phone</dt>
                                <dd class="mt-1 text-sm text-gray-900" id="popup-phone">(123) 456-7890</dd> <!-- This will be dynamically updated -->
                            </div>
                            <div class="px-4 py-5 sm:p-6">
                                <dt class="text-sm font-medium text-gray-500">Address</dt>
                                <dd class="mt-1 text-sm text-gray-900" id="popup-address">123 Main St, Anytown, USA</dd> <!-- This will be dynamically updated -->
                            </div>
                        </dl>
                    </div>
                </div>

                <div class="flex justify-end w-full">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="togglePopup()">Close</button>
                </div>
            </div>
        </div>

        <div class="flex-1 ml-64 py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Dashboard</h1>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg min-h-full">
                    <div class="p-6 text-gray-900 h-600">
                        <div class="container mx-auto p-4">
                            <h1 class="text-2xl font-bold text-gray-800 mb-4">Tutor Applications</h1>
                            <table class="min-w-full bg-white rounded-lg shadow-md">
                                <thead class="bg-gray-200 text-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left font-medium">Application ID</th>
                                        <th class="px-6 py-3 text-left font-medium">Name</th>
                                        <th class="px-6 py-3 text-left font-medium">Status</th>
                                        <th class="px-6 py-3 text-left font-medium">Last Modified</th>
                                        <th class="px-6 py-3 text-left font-medium">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($applications as $application)
                                        <tr class="border-t border-gray-200">
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $application->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <!-- Update this part to trigger popup and pass all the user data -->
                                                <a href="#" class="text-blue-500 hover:text-blue-700" 
                                                onclick="togglePopup(); 
                                                        document.getElementById('popup-name').innerText = '{{ $application->user->first_name }} {{ $application->user->last_name }}'; 
                                                        document.getElementById('popup-email').innerText = '{{ $application->user->email }}'; 
                                                        document.getElementById('popup-phone').innerText = '{{ $application->user->phone }}'; 
                                                        document.getElementById('popup-address').innerText = '{{ $application->user->address }}'; 
                                                        document.getElementById('popup-pfp').src = '{{ asset('storage/' . $application->user->profile_picture) }}';">
                                                {{ $application->user->first_name }} {{ $application->user->last_name }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium 
                                                    @if($application->status == 'Pending') bg-yellow-100 text-yellow-800
                                                    @elseif($application->status == 'Approved') bg-green-100 text-green-800
                                                    @else bg-gray-100 text-gray-800
                                                    @endif">
                                                    <svg class="w-4 h-4 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m-3-3H9m3-4a4 4 0 100 8 4 4 0 000-8z" />
                                                    </svg>
                                                    {{ $application->status }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $application->updated_at->format('Y-m-d') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <button class="text-red-600 hover:text-red-800">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
