@props(['tutor'])

<x-modal.base-modal :triggerText="'Book Now'" :title="'Book a session'">
    <div x-data="{
        step: 1, 
        subjectName: '',
        formData: {
            subject_topic: '',
            subject_name: '',
            date: '',
            start_time: '',
            end_time: '',
            platform: '',
            tutor_id: '{{ $tutor->id }}'
        },
        updateFormData(field, value) {
            this.formData[field] = value;
        },
        submitForm() {
            this.$refs.submitButton.click();
        },
    }" 
    x-init="$watch('step', value => {
        if (value === 1) title = 'Book a session';
        if (value === 2) title = 'Confirm details';
        if (value === 3) title = ' ';
        $dispatch('update-title', title);
    })">
        
        <!-- Step 1: Booking Form -->
        <div x-show="step === 1">
            <form method="POST" action="{{ route('booking.store') }}" x-ref="bookingForm">
                @csrf
                <!-- Session Title -->
                <div class="w-full mb-1">
                    <x-input-label for="subject_topic" :value="__('Subject Topic')" />
                    <x-text-input id="subject_topic" name="subject_topic" type="text" class="h-9 w-full mt-0.5"
                        x-model="formData.subject_topic" @input="updateFormData('subject_topic', $event.target.value)" />
                    <x-input-error :messages="$errors->get('subject_topic')" class="mt-2" />
                </div>

                <!-- Subject -->
                <div class="w-full mb-1">
                    <x-input-label for="subject_name" :value="__('Subject')" />
                    <select id="subject_name" name="subject_name" class="block h-9 w-full mt-0.5 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm text-gray-700" required
                    x-model="formData.subject_name" @change="updateFormData('subject_name', $event.target.value)">
                        <option value="" disabled {{ old('subject_name') === null ? 'selected' : '' }}>{{ __('Select Subject') }}</option>
                        @foreach($tutor->subjects as $subject)
                            <option value="{{ $subject->subject }}" {{ old('subject_name') == $subject->subject ? 'selected' : '' }}>
                                {{ $subject->subject }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('subject_name')" class="mt-2" />
                </div>


                <!-- Date -->
                <div class="w-full mb-1">
                    <x-input-label for="date" :value="__('Date')" />
                    <x-text-input id="date" name="date" type="date" class="h-9 w-full mt-0.5"
                        x-model="formData.date" @input="updateFormData('date', $event.target.value)" />
                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                </div>

                <!-- Time Range -->
                <div class="flex gap-x-2 mb-1">
                    <div class="w-full">
                        <x-input-label for="start_time" :value="__('From')" />
                        <x-text-input id="start_time" name="start_time" type="time" class="h-9 w-full mt-0.5"
                            x-model="formData.start_time" @input="updateFormData('start_time', $event.target.value)" />
                        <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
                    </div>
                    <div class="w-full">
                        <x-input-label for="end_time" :value="__('To')" />
                        <x-text-input id="end_time" name="end_time" type="time" class="h-9 w-full mt-0.5"
                            x-model="formData.end_time" @input="updateFormData('end_time', $event.target.value)" />
                        <x-input-error :messages="$errors->get('end_time')" class="mt-2" />
                    </div>
                </div>

                <!-- Platform -->
                <div class="w-full mb-1">
                    <x-input-label for="platform" :value="__('Platform')" />
                    <select id="platform" name="platform" class="block h-9 w-full mt-0.5 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm text-gray-700" required
                        x-model="formData.platform" @change="updateFormData('platform', $event.target.value)">
                        <option value="" disabled selected>{{ __('Select Platform') }}</option>
                        <option value="Google Meet">{{ __('Google Meet') }}</option>
                        <option value="Zoom">{{ __('Zoom') }}</option>
                        <option value="Discord">{{ __('Discord') }}</option>
                    </select>
                    <x-input-error :messages="$errors->get('platform')" class="mt-2" />
                </div>

                <!-- Hidden Tutor ID -->
                <input type="hidden" name="tutor_id" id="tutor_id" :value="formData.tutor_id" />

                <div class="text-right">
                    <!-- Step 1 Button -->
                    <x-primary-button type="button" @click="step = 2" class="mt-2 px-4 py-2 bg-green-500 text-white text-xs rounded">Next</x-primary-button>
                </div>
            </form>
        </div>

        <!-- Step 2: Confirmation Details -->
        <div x-show="step === 2">
            <!-- Display the details for confirmation -->
            <div class="mb-4">
                <div class="font-medium text-2xl">
                    <p x-text="formData.subject_topic"></p>
                </div>
                <div class="font-normal text-sm mb-2">
                    <p x-text="formData.date + ' : ' + formData.start_time + ' - ' + formData.end_time"></p>
                </div>

                <!-- yeah i gave up and just borrowed the whole class -->
                <div class="flex mb-2">
                    <p class="text-xs h-5 w-auto mb-0.5 text-gray-800 rounded-xl bg-cyan-400 mr-1.5 py-0.5 px-3" x-text="formData.subject_name">
                    </p>
                </div>

                <div class="flex gap-2 mb-2">
                    <img src="{{ asset('storage/images/people.png') }}" alt="people" class="block h-8 fill-current">
                    <p class="block h-8 border-2 rounded-md border-gray-500 text-sm p-1 text-wrap" x-text="'{{ auth() -> user()->first_name }} ' + '{{ auth() -> user() -> last_name }}'"></p>
                    <p class="block h-8 border-2 rounded-md border-gray-500 text-sm p-1 text-wrap" x-text="'{{ $tutor->user->first_name }} ' + '{{ $tutor->user->last_name }}'"></p>
                </div>
                <div class="flex gap-2 mb-2">
                    <img src="{{ asset('storage/images/meet.png') }}" alt="meet" class="pl-1 block h-6 fill-current">
                    <p class="text-sm" x-text="formData.platform"></p>
                </div>
            </div>

            <div class="flex justify-between">
                <x-secondary-button @click="step = 1" class="px-4 py-2 text-left">Back</x-secondary-button>
                <div>
                    <x-primary-button @click="step = 3; $refs.bookingForm.submit()" class="px-4 py-2">Confirm booking</x-primary-button>
                </div>
            </div>
        </div>

        <!-- Step 3: Confirmation -->
        <div x-show="step === 3" class="flex-row justify-items-center gap-y-2">
            <img src="{{ asset('storage/images/sent.png') }}" alt="sent" class="pl-1 block h-20 fill-current mb-2">
            <p class="text-3xl font-black">Session Booked Successfully</p>
            <p class="text-sm font-thin mb-5 text-gray-600">You will be notified of the status of your booking.</p>
            <div class="mb-8">
                <x-nav-link :href="route('dashboard.userProfile')" :active="request()->routeIs('dashboard.userProfile')" @click="open = false" class="font-bold text-lg">
                    {{ __('Back to Dashboard') }}
                </x-nav-link>
            </div>
        </div>
    </div>
</x-modal.base-modal>