@props(['applications'])

<div class="container mx-auto p-4">
    <div class="overflow-x-auto">
        <div class="min-w-full bg-white rounded-lg shadow-md max-h-80 overflow-y-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200 text-gray-700 sticky top-0">
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
                                <a href="{{ route('applications.view', ['id' => $application->id]) }}" class="text-blue-500 hover:text-blue-700">
                                    {{ $application->user->first_name }} {{ $application->user->last_name }}
                                </a>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
