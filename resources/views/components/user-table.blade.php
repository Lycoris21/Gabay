@props(['users'])

<div class="container mx-auto p-4">
    <div class="overflow-x-auto">
        <div class="min-w-full bg-white rounded-lg shadow-md max-h-80 overflow-y-auto">
            <table class="min-w-full bg-white">
                <thead class="text-gray-700 sticky top-0" style="background-color: #C1CBD1;">
                    <tr>
                        <th class="px-6 py-3 text-left text-black font-black">User ID</th>
                        <th class="px-6 py-3 text-left text-black font-black">Name</th>
                        <th class="px-6 py-3 text-left text-black font-black">Email</th>
                        <th class="px-6 py-3 text-left text-black font-black">Role</th>
                        <th class="px-6 py-3 text-left text-black font-black">Year Of Birth</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="border-t border-gray-200">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('users.manageView', ['id' => $user->id]) }}" class="text-black hover:underline hover:underline-offset-2">
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
