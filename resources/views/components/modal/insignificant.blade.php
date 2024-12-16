@props(['request_id', 'subject_topic', 'subject_name', 'date', 'time', 'tutorName', 'tuteeName', 'platform', 'link', 'status', 'reason'])

<x-modal.base-modal :triggerText="'View Details'" :title="'View session'">
    <div x-data="{ title: 'View details' }" x-init="$dispatch('update-title', title)">
    
 
        <div class="mb-6">
            <div class="font-medium text-2xl text-start"> <p> {{ $subject_topic }} </p> </div>
            <div class="font-normal text-sm mb-2 text-start"> <p> {{ $date." ".$time }} </p> </div>
            <div class="flex  mb-2">
                <x-subject-tag class="text-xs h-5 mb-0.5 text-gray-800 rounded-xl bg-cyan-400 mr-1.5 py-0.5 px-3" :tag="$subject_name" />
            </div>
            <div class="flex gap-2  mb-2">
                <img src="{{ asset('storage/images/people.png') }}" alt="people" class="block h-8 fill-current">
                <p class="block h-8 border-2 rounded-md border-gray-500 text-sm p-1 text-wrap"> {{ $tuteeName }} </p>
                <p class="block h-8 border-2 rounded-md border-gray-500 text-sm p-1 text-wrap"> {{ $tutorName }} </p>
            </div>
            <div class="flex gap-2 mb-2">
                <img src="{{ asset('storage/images/meet.png') }}" alt="people" class="pl-1 block h-6 fill-current">
                <p class="text-sm"> {{ $platform }} </p>
            </div>
            @if ($status == 'Completed' || $status == 'Cancelled')
            <div class="flex gap-2 mb-2 justify-start items-center">
                <img src="{{ asset('storage/images/link.png') }}" alt="link" class="pl-1 block h-5 fill-current">
                <p class="text-sm text-start">{{ $link }}</p>
            </div>
            @endif
            @if ($status == 'Cancelled')
                <div class="font-black text-sm mb-1 mt-5 text-start"> <p> Reason for cancellation </p> </div>
                <div class="font-normal text-sm mb-2 text-start"> <p> {{$reason}} </p> </div>
            @endif
            
        </div>



    </div>
</x-modal.base-modal>
    