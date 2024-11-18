<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Picture') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Upload a picture for your profile.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form action="post" action=" {{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        @if(Auth::user()->profile_picture)
            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="w-16 h-16 rounded-full mb-4">
        @endif

        <!-- Profile Picture Input -->
        <div class="mt-4">
            <input id="profile_picture" type="file" name="profile_picture" class="block mt-1 w-full" accept="image/*">
            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
        </div>
    </form>
</section>