<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <script> function togglePopup() { const popup = document.getElementById('popup'); popup.classList.toggle('hidden'); } </script> 
    
    <div class="flex">
        
      <div class="bg-gray-800 w-64 h-screen fixed">
        <div class="flex flex-col items-start mt-8 px-4 space-y-2">
          <a href="#" class="text-gray-300 hover:text-gray-100 block px-4 py-2 rounded-md">
            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001 -1h3a1 1 0 011-1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-3a1 1 0 011-1h3a1 1 0 011 1" />
            </svg>
            Home
          </a>
          <a href="#" class="text-gray-300 hover:text-gray-100 block px-4 py-2 rounded-md">
            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12v4a4 4 0 01-8 0v-4m8-4V8a4 4 0 00-8 0v4m8 0H8" />
            </svg>
            Manage Users
          </a>
          <a href="#" class="text-gray-300 hover:text-gray-100 block px-4 py-2 rounded-md">
            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m-3-3H9" />
            </svg>
            Analytics
          </a>
          <a href="#" class="text-gray-300 hover:text-gray-100 block px-4 py-2 rounded-md">
            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m-3-3H9" />
            </svg>
            Settings
          </a>
        </div>
      </div>

     
    <div id="popup" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-75">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex my-2">
            <!-- Profile Picture Section -->
            <div class="mr-4">
                <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200&d=identicon" alt="Profile Picture" class="w-64 h-32 rounded-full" />
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
                            <dd class="mt-1 text-sm text-gray-900">Gretchen Marie Calisto</dd>
                        </div>
                        <div class="px-4 py-5 sm:p-6">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900">gretchen@example.com</dd>
                        </div>
                        <div class="px-4 py-5 sm:p-6">
                            <dt class="text-sm font-medium text-gray-500">Phone</dt>
                            <dd class="mt-1 text-sm text-gray-900">(123) 456-7890</dd>
                        </div>
                        <div class="px-4 py-5 sm:p-6">
                            <dt class="text-sm font-medium text-gray-500">Address</dt>
                            <dd class="mt-1 text-sm text-gray-900">123 Main St, Anytown, USA</dd>
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
                    <tr class="border-t border-gray-200">
                      <td class="px-6 py-4 whitespace-nowrap">3045</td>
                      <td class="px-6 py-4 whitespace-nowrap"><a href="#" class="text-blue-500 hover:text-blue-700" onclick="togglePopup()">Gretchen Marie Calisto</a></td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium bg-yellow-100 text-yellow-800">
                          <svg class="w-4 h-4 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m-3-3H9m3-4a4 4 0 100 8 4 4 0 000-8z" />
                          </svg>
                          Pending
                </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">2023-10-01</td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <button class="text-red-600 hover:text-red-800">Delete</button>
                      </td>
                    </tr>
                    <tr class="border-t border-gray-200">
                      <td class="px-6 py-4 whitespace-nowrap">3046</td>
                      <td class="px-6 py-4 whitespace-nowrap"><a href="#" class="text-blue-500 hover:text-blue-700">John Doe</a></td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium bg-green-100 text-green-800">
                          <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m0 0a9 9 0 11-9-9 9 9 0 019 9z" />
                          </svg>
                          Approved
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">2023-09-28</td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <button class="text-red-600 hover:text-red-800">Delete</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
