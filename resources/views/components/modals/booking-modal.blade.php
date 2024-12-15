<!-- filepath: resources/views/components/modals/booking-modal.blade.php -->
<x-modals.base-modal title="Book Tutor" triggerText="Book Tutor">
    <form method="POST" action="{{ route('book.tutor') }}">
        @csrf
        <!-- Form fields for booking a tutor -->
        <!-- Email -->
        <div class="flex-row">
            <div class="w-full mb-1">
                <x-input-label for="title" :value="__('SessionTitle')" />
                <x-text-input id="title" name="title" type="text" class="h-9 w-full mt-0.5" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="w-full mb-1">
                <x-input-label for="title" :value="__('Subject')" />
                <x-text-input id="title" name="title" type="text" class="h-9 w-full mt-0.5" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="w-full mb-1">
                <x-input-label for="title" :value="__('Date')" />
                <x-text-input id="title" name="title" type="date" class="h-9 w-full mt-0.5" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="w-full mb-1">
                <x-input-label for="title" :value="__('SessionTitle')" />
                <x-text-input id="title" name="title" type="text" class="h-9 w-full mt-0.5" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="flex gap-x-2 mb-1">
                <div class="w-full">
                    <x-input-label for="title" :value="__('From')" />
                    <x-text-input id="title" name="title" type="time" class="h-9 w-full mt-0.5" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-input-label for="title" :value="__('To')" />
                    <x-text-input id="title" name="title" type="time" class="h-9 w-full mt-0.5" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
            </div>
            <div class="w-full mb-1">
                <x-input-label for="title" :value="__('Tutor')" />
                <x-text-input id="title" name="title" type="text" class="h-9 w-full mt-0.5" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="w-full mb-1">
                <x-input-label for="gender" :value="__('Platform')" />
                <select id="gender" name="gender" class="block h-9 w-full mt-0.5 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm text-gray-700" required>
                    <option value="" disabled selected>{{ __('Select Platform') }}</option>
                        <option value="Google Meet">{{ __('A-Z') }}</option>
                        <option value="Zoom">{{ __('Z-A') }}</option>
                        <option value="Discord">{{ __('Hourly Rate') }}</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>
        </div>
        
        <div class="text-right">
            <x-primary-button class="mt-2 px-4 py-2 bg-green-500 text-white text-xs rounded">Book session</x-primary-button>
        </div>
    </form>
</x-modals.base-modal>