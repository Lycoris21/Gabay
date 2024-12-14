<tr class="mx-5">
    <td class="px-2 py-1 border-b">{{ $name }}</td>
    <td class="px-2 py-1 border-b">{{ $subject }}</td>
    <td class="px-2 py-1 border-b">{{ $date }}</td>
    <td class="px-2 py-1 border-b">{{ $time }}</td>
    <td class="px-2 py-1 border-b font-bold">
            @if ($status === 'Approved')
                <span class="px-2 py-1 bg-green-200 text-gray-700 rounded-full">
                    {{ $status }}
                </span>
            @elseif ($status === 'Pending')
                <span class="px-2 py-1 bg-yellow-200 text-gray-700 rounded-full">
                    {{ $status }}
                </span>
            @else
                <span class="px-2 py-1 bg-red-200 text-gray-700 rounded-full">
                    {{ $status }}
                </span>
            @endif
    </td>
    <td class="px-1 py-3 border-b w-32">
        <x-primary-button class="h-8 w-full text-xs">
            View Details
        </x-primary-butto>
    </td>
</tr>