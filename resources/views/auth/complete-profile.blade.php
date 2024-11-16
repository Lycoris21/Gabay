<x-guest-layout>
    <div>
        <x-auth-header heading="Hello {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}! Enter the below information and continue." />
    </div>
    <form method="POST" action="{{ route('complete-profile.store') }}">
        @csrf

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <select id="gender" name="gender" class="block mt-1 w-full" required>
                <option value="">{{ __('Select Gender') }}</option>
                <option value="Male">{{ __('Male') }}</option>
                <option value="Female">{{ __('Female') }}</option>
                <option value="Other">{{ __('Other') }}</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Year of Birth -->
        <div class="mt-4">
            <x-input-label for="year_of_birth" :value="__('Year of Birth')" />
            <x-text-input id="year_of_birth" type="number" name="year_of_birth" class="block mt-1 w-full" required />
            <x-input-error :messages="$errors->get('year_of_birth')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <x-primary-button>{{ __('Register') }}</x-primary-button>
        </div>
    </form>
</x-guest-layout>