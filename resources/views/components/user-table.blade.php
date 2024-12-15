@props(['users'])

<div class="container mx-auto p-4">
    <div class="overflow-x-auto">
        <div class="min-w-full bg-white rounded-lg shadow-md max-h-80 overflow-y-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200 text-gray-700 sticky top-0">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium">User ID</th>
                        <th class="px-6 py-3 text-left font-medium">Name</th>
                        <th class="px-6 py-3 text-left font-medium">Email</th>
                        <th class="px-6 py-3 text-left font-medium">Role</th>
                        <th class="px-6 py-3 text-left font-medium">Year Of Birth</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="border-t border-gray-200">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('users.manageView', ['id' => $user->id]) }}" class="text-blue-500 hover:text-blue-700">
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $user->is_tutor ? 'Tutor' : 'Student' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->year_of_birth }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
