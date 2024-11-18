<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- {{ __("You're logged in!") }} -->

                    @if(Auth::user()->profile_picture)
                        <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="w-16 h-16 rounded-full mb-4">
                    @endif

                    <p class="font-semibold text-3xl">
                        {{ Auth::user()->last_name }}, {{ Auth::user()->first_name }}
                    </p>
                    <p class="text-gray-500">
                        Profile ID: {{ Auth::user()->id }}
                    </p>
                    <p class="text-gray-500">
                        {{ ucfirst(Auth::user()->gender) }}, {{ \Carbon\Carbon::now()->year - Auth::user()->year_of_birth }} Years
                    </p>
                    <p class="text-gray-500">
                        {{ Auth::user()->email }}
                    </p>

                    @if(Auth::user()->description)
                        <p class="text-gray-500">
                            {{ Auth::user()->description }}
                        </p>
                    @else
                        <p class="text-gray-500">
                            No description provided.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>