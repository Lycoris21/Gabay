<!-- filepath: resources/views/components/modals/pending-request-modal.blade.php -->
<x-modal.base-modal :triggerText="'View Details'" :title="'View details'">
    <div x-data="{ step: 1, title: 'View details' }" x-init="$watch('step', value => {
        if (value === 1) title = 'View details';
        if (value === 2) title = 'Provide session link';
        if (value === 3) title = 'Confirm details';
        if (value > 3) title = '';
        $dispatch('update-title', title);
    })">
    

    {{-- 1 = View details
    2 = (Approved) Provide session sink
    3 = (Approved) Confirm details
    4 = (Approved) Confirmation
    5 = (Rejected) Confirm rejection
    6 = (Rejected) Confirmation --}}

        <div x-show="step === 1">
            <div class="mb-4">
                @csrf
                <div class="font-medium text-2xl text-start"> <p> Reading Comprehension </p> </div>
                <div class="font-normal text-sm mb-2 text-start"> <p> December 10, 2024 : 12:00 - 13:30 </p> </div>
                <div class="flex  mb-2">
                    <x-subject-tag class="text-xs h-5 mb-0.5 text-gray-800 rounded-xl bg-cyan-400 mr-1.5 py-0.5 px-3" tag="Mathematics" />
                </div>
                <div class="flex gap-2  mb-2">
                    <img src="{{ asset('storage/images/people.png') }}" alt="people" class="block h-8 fill-current">
                    <p class="block h-8 border-2 rounded-md border-gray-500 text-sm p-1 text-wrap"> John Doe </p>
                    <p class="block h-8 border-2 rounded-md border-gray-500 text-sm p-1 text-wrap"> Lycoris Ann </p>
                </div>
                <div class="flex gap-2 mb-2">
                    <img src="{{ asset('storage/images/meet.png') }}" alt="people" class="pl-1 block h-6 fill-current">
                    <p class="text-sm"> Google Meet </p>
                </div>
            </div>
            @if(Auth::user()->is_tutor)
                <div class="flex justify-end gap-3">
                    <div>
                        <x-primary-button @click="step = 2" class="px-4 py-2 text-left" style="background-color: #16a34a !important;">Approve</x-primary-button>
                    </div>
                    <div>
                        <x-primary-button @click="step = 5" class="px-4 py-2" style="background-color: #dc2626 !important;">Reject</x-primary-button>
                    </div>
                </div>
            @else
                <div class="text-end">
                    <x-primary-button @click="step = 5" class="px-4 py-2" style="background-color: #dc2626 !important;">Delete Request</x-primary-button>
                </div>
            @endif
        </div>

        <div x-show="step === 2">
            <div class="mb-8">
                <x-input-label for="sessionLink" :value="__('Meeting Link')" class="mb-1 text-left"/>
                <x-text-input id="sessionLink" name="sessionLinke" type="text" class="h-9 w-full mt-0.5" required autofocus/>
                <x-input-error :messages="$errors->get('sessionLink')" class="mt-2" />
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
            <div class="mb-4">
                <div class="font-medium text-2xl text-start"> <p> Reading Comprehension </p> </div>
                <div class="font-normal text-sm mb-2 text-start"> <p> December 10, 2024 : 12:00 - 13:30 </p> </div>
                <div class="flex  mb-2">
                    <x-subject-tag class="text-xs h-5 mb-0.5 text-gray-800 rounded-xl bg-cyan-400 mr-1.5 py-0.5 px-3" tag="Mathematics" />
                </div>
                <div class="flex gap-2  mb-2">
                    <img src="{{ asset('storage/images/people.png') }}" alt="people" class="block h-8 fill-current">
                    <p class="block h-8 border-2 rounded-md border-gray-500 text-sm p-1 text-wrap"> John Doe </p>
                    <p class="block h-8 border-2 rounded-md border-gray-500 text-sm p-1 text-wrap"> Lycoris Ann </p>
                </div>
                <div class="flex gap-2 mb-2">
                    <img src="{{ asset('storage/images/meet.png') }}" alt="meet" class="pl-1 block h-6 fill-current">
                    <p class="text-sm"> Google Meet </p>
                </div>
                <div class="flex gap-2 mb-2">
                    <img src="{{ asset('storage/images/link.png') }}" alt="link" class="pl-1 block h-5 fill-current">
                    <p class="text-sm">https://meet.google.com/landing</p>
                </div>
            </div>
            <div class="flex justify-between">
                <x-secondary-button @click="step = 2" class="px-4 py-2 text-left">Back</x-secondary-button>
                <div>
                    <x-primary-button @click="step = 4" class="px-4 py-2">Confirm booking </x-primary-button>
                </div>
            </div>
        </div>

        <div x-show="step === 4" class="flex-row justify-items-center gap-y-2">
            <img src="{{ asset('storage/images/sent.png') }}" alt="sent" class="pl-1 block h-20 fill-current mb-2">
            <p class="text-3xl font-black">Booking Approved Successfully</p>
            <div class="mb-8">
                <x-nav-link :href="route('dashboard.userProfile')" :active="request()->routeIs('dashboard.userProfile')" @click="open = false" class="font-bold text-lg">
                    {{ __('Back to Dashboard') }}
                </x-nav-link>
            </div>
        </div>

        <div x-show="step === 5">
            <div class="mb-8">
                <div class="font-black text-2xl text-start text-red-600 "> 
                    @if (Auth::user()->is_tutor)
                        <p>Reject Request?</p>
                    @else    
                        <p>Delete Request?</p>    
                    @endif
                </div>
                <div class="font-normal text-sm mb-2 text-start"> <p>This action cannot be undone.</p> </div>
            </div>
            <div class="flex justify-end gap-3">
                <div>
                    <x-primary-button @click="step = 6" class="px-4 py-2">
                        @if (Auth::user()->is_tutor)
                            Reject
                        @else    
                            Delete                           
                        @endif
                    </x-primary-button>
                </div>
                <x-secondary-button @click="open = false" class="px-4 py-2 text-left">Cancel</x-secondary-button>
            </div>
        </div>

        <div x-show="step === 6" class="flex-row justify-items-center gap-y-2">
            <img src="{{ asset('storage/images/sent.png') }}" alt="sent" class="pl-1 block h-20 fill-current mb-2">
            @if (Auth::user()->is_tutor)
                <p class="text-3xl font-black mb-6">Booking Rejected Successfully</p>
            @else
                <p class="text-3xl font-black mb-6">Request Deleted Successfully</p>
            @endif
            <div class="mb-8">
                <x-nav-link :href="route('dashboard.userProfile')" :active="request()->routeIs('dashboard.userProfile')" @click="open = false" class="font-bold text-lg">
                    {{ __('Back to Dashboard') }}
                </x-nav-link>
            </div>
        </div>
    </div>
</x-modal.base-modal>