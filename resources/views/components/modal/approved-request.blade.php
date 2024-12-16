@props(['request_id', 'subject_topic', 'subject_name', 'date', 'time', 'tutorName', 'tuteeName', 'platform', 'link'])

<x-modal.base-modal :triggerText="'View Details'" :title="'View session'">
    <div x-data="{ step: 1, title: 'View session', reason: ''}" x-init="$watch('step', value => {
        if (value === 1) title = 'View session';
        if (value === 2) title = 'Cancel session';
        if (value === 3) title = 'Confirm details';
        if (value === 4) title = '';
        $dispatch('update-title', title);
    })">

        
    <div x-show="step === 1">
        <!-- Display the details for confirmation -->
        <div class="mb-4">
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
            <div class="flex gap-2 mb-2">
                <img src="{{ asset('storage/images/link.png') }}" alt="link" class="pl-1 block h-5 fill-current">
                <p class="text-sm">{{ $link }}</p>
            </div>
        </div>
        <div class="text-end">
            <div class="text-end">
                <x-primary-button @click="step = 2" class="px-4 py-2" style="background-color: #dc2626 !important;">Cancel Session</x-primary-button>
            </div>
        </div>
    </div>

    <div x-show="step === 2">
        <div class="mb-8">
            <x-input-label for="reason" :value="__('Reason for cancellation')" class="mb-1 text-left"/>
            <textarea id="reason" name="reason" x-model="reason" class="mt-1 block w-full h-20 resize-none" placeholder="Write your reason for cancellation here..." maxlength="500"></textarea>
            <x-input-error :messages="$errors->get('reason')" class="mt-2" />
        </div>
        <div class="flex justify-between">
            <x-secondary-button @click="step = 1" class="px-4 py-2 text-left">Back</x-secondary-button>
            <div>
                <x-primary-button @click="step = 3" class="px-4 py-2">Next</x-primary-button>
            </div>
        </div>
    </div>

    <div x-show="step === 3">
        <!-- Display the details for confirmation -->
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
            <div class="flex gap-2 mb-2">
                <img src="{{ asset('storage/images/link.png') }}" alt="link" class="pl-1 block h-5 fill-current">
                <p class="text-sm">{{ $link }}</p>
            </div>
            <div class="font-black text-sm mb-1 mt-5 text-start"> <p> Reason for cancellation </p> </div>
            <div class="font-normal text-sm mb-2 text-start"> <p x-text="reason"> </p> </div>
        </div>
        <div class="flex justify-between">
            <x-secondary-button @click="step = 2" class="px-4 py-2 text-left">Back</x-secondary-button>
            <div class="text-end">
                <form action="{{ route('booking.cancel', ['id' => $request_id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="reason" :value="reason">
                    
                    <x-primary-button @click="step = 4" class="px-4 py-2" style="background-color: #dc2626 !important;">Confirm cancellation</x-primary-button>
                </form>                
            </div>
        </div>
    </div>

    <div x-show="step === 4" class="flex-row justify-items-center gap-y-2">
        <img src="{{ asset('storage/images/sent.png') }}" alt="sent" class="pl-1 block h-20 fill-current mb-2">
        <p class="text-3xl font-black mb-6">Booking Cancelled Successfully</p>
        <div class="mb-8">
            <x-nav-link :href="route('dashboard.userProfile')" :active="request()->routeIs('dashboard.userProfile')" @click="open = false" class="font-bold text-lg">
                {{ __('Back to Dashboard') }}
            </x-nav-link>
        </div>
    </div>











    </div>
</x-modal.base-modal>