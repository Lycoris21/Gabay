<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Picture') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Upload a picture for your profile.") }}
        </p>
    </header>

    <div class="mt-4">
        <input id="profile_picture" type="file" name="profile_picture" class="block mt-1 w-full" accept="image/*" />
        <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
    </div>

</section>