@props(['request'])

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
    <td class="py-3">
        @if ($status === 'Pending')
            <x-modal.pending-request
                :tutor_id="$request['tutor_id']"
                :request_id="$request['id']" 
                :subject_topic="$request['subject_topic']" 
                :subject_name="$request['subject_name']" 
                :date="$request['date']"
                :time="$request['time']"
                :platform="$request['platform']" 
                :tutorName="$request['tutor_name']"
                :tuteeName="$request['tutee_name']"
                />
        @elseif ($status === 'Approved')
            <x-modal.approved-request
                :request_id="$request['id']" 
                :subject_topic="$request['subject_topic']" 
                :subject_name="$request['subject_name']" 
                :date="$request['date']"
                :time="$request['time']"
                :platform="$request['platform']" 
                :link="$request['link']" 
                :tutorName="$request['tutor_name']"
                :tuteeName="$request['tutee_name']"/>
        @else
            <x-modal.insignificant 
                :status="$status"
                :request_id="$request['id']" 
                :subject_topic="$request['subject_topic']" 
                :subject_name="$request['subject_name']" 
                :date="$request['date']"
                :time="$request['time']"
                :platform="$request['platform']" 
                :tutorName="$request['tutor_name']"
                :tuteeName="$request['tutee_name']"/>
        @endif
    </td>
</tr>