@props(['applications'])
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=radio_button_checked" />
<div class="container mx-auto p-4">
    <div class="overflow-x-auto">
        <div class="min-w-full bg-white rounded-lg shadow-md max-h-80 overflow-y-auto">
            <table class="min-w-full bg-white">
                <thead class="text-gray-700 sticky top-0" style="background-color: #C1CBD1;">
                    <tr>
                        <th class="px-6 py-3 text-left text-black font-black">Application ID</th>
                        <th class="px-6 py-3 text-left text-black font-black">Name</th>
                        <th class="px-6 py-3 text-left text-black font-black">Status</th>
                        <th class="px-6 py-3 text-left text-black font-black">Last Modified</th>
                        <th class="px-6 py-3 text-left text-black font-black">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $application)
                        <tr class="border-t border-gray-200">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $application->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $application->user->first_name }} {{ $application->user->last_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-black 
                                    @if($application->status == 'Pending') bg-yellow-100 text-yellow-800
                                    @elseif($application->status == 'Approved') bg-green-100 text-green-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    <span class="material-symbols-outlined w-8">
                                        radio_button_checked
                                    </span>
                                    {{ $application->status }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $application->updated_at->format('M d, Y, g:i:s A') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-admin-modal.application :application="$application" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
