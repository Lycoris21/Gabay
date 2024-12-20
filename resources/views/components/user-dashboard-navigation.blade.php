<div class="border-b-2 mx-2">
    <x-nav-link :href="route('dashboard.userProfile')" :active="$currentSection === 'profile'" class="w-20 justify-center mr-2">
        {{ __('Profile') }}
    </x-nav-link>
    
    <x-nav-link :href="route('dashboard.bookings')" :active="$currentSection === 'bookings'" class="w-25 justify-center mr-2">
        {{ __('My Bookings') }}
    </x-nav-link>

    <x-nav-link :href="route('dashboard.requests')" :active="$currentSection === 'requests'" class="w-25 justify-center mr-2">
        {{ __('Tutoring Requests') }}
    </x-nav-link>
</div>
