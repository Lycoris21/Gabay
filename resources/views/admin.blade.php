<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadgot ow-sm sm:rounded-lg min-h-full">
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
                                    <td class="px-6 py-4 whitespace-nowrap"><a href="#" class="text-blue-500 hover:text-blue-700">Gretchen Marie Calisto</a></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium bg-yellow-100 text-yellow-800">
                                            <svg class="w-4 h-4 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2 .0/svg">
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
</x-app-layout>
