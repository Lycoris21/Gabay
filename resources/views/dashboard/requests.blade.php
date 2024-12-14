@php
    $requests = [
            [
                'name' => 'John Doe',
                'subject' => 'Math',
                'date' => 'November 12, 2024',
                'time' => '12:00-13:30',
                'status' => 'Pending'
            ],
            [
                'name' => 'Jane Smith',
                'subject' => 'Science',
                'date' => 'November 13, 2024',
                'time' => '14:00-15:30',
                'status' => 'Approved'
            ],
            [
                'name' => 'Alice Johnson',
                'subject' => 'History',
                'date' => 'November 14, 2024',
                'time' => '09:00-10:30',
                'status' => 'Rejected'
            ],
            [
                'name' => 'Bob Brown',
                'subject' => 'Geography',
                'date' => 'November 15, 2024',
                'time' => '11:00-12:30',
                'status' => 'Pending'
            ],
            [
                'name' => 'Charlie Davis',
                'subject' => 'Physics',
                'date' => 'November 16, 2024',
                'time' => '13:00-14:30',
                'status' => 'Approved'
            ],
            [
                'name' => 'Diana Evans',
                'subject' => 'Chemistry',
                'date' => 'November 17, 2024',
                'time' => '15:00-16:30',
                'status' => 'Rejected'
            ],
            [
                'name' => 'Ethan Foster',
                'subject' => 'Biology',
                'date' => 'November 18, 2024',
                'time' => '10:00-11:30',
                'status' => 'Pending'
            ],
            [
                'name' => 'Fiona Green',
                'subject' => 'English',
                'date' => 'November 19, 2024',
                'time' => '08:00-09:30',
                'status' => 'Approved'
            ],
            [
                'name' => 'George Harris',
                'subject' => 'Literature',
                'date' => 'November 20, 2024',
                'time' => '12:00-13:30',
                'status' => 'Rejected'
            ],
            [
                'name' => 'Hannah Irving',
                'subject' => 'Art',
                'date' => 'November 21, 2024',
                'time' => '14:00-15:30',
                'status' => 'Pending'
            ],
        ];
@endphp
<div class="h-full">
    <div class="h-[85%] overflow-y-auto">
        <table class="w-full bg-white">
            <thead class="bg-sky-900 border border-transparent text-white text-sm sticky top-0 h-12">
                <tr class="bg-sky-900 text-white text-sm">
                    <th class="px-4 py-2 ">Name</th>
                    <th class="px-4 py-2 ">Subject</th>
                    <th class="px-4 py-2 ">Date</th>
                    <th class="px-4 py-2 ">Time</th>
                    <th class="px-4 py-2 ">Status</th>
                    <th class="px-4 py-2 ">Action</th>
                </tr>
            </thead>

            <tbody class="text-sm text-center">
                @foreach ($requests as $request)
                    <x-request-item 
                        name="{{ $request['name'] }}" 
                        subject="{{ $request['subject'] }}" 
                        date="{{ $request['date'] }}" 
                        time="{{ $request['time'] }}" 
                        status="{{ $request['status'] }}" 
                    />  
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>
