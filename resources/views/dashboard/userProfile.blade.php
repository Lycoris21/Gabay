
<!-- Profile Section -->
<div class="flex h-full">
    <div class="w-[55%] h-full">
        <form method="post" action="{{ route('dashboard.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- First Name and Last Name -->
            <div class="flex w-full gap-4 mb-3">
                <div class="w-1/2">
                    <x-input-label for="first_name" :value="__('First Name')" />
                    <x-text-input id="first_name" name="first_name" type="text" class="h-9 w-full mt-0.5" :value="old('first_name', $user->first_name)" required autofocus autocomplete="given-name" />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                </div>
                <div class="w-1/2">
                    <x-input-label for="last_name" :value="__('Last Name')" />
                    <x-text-input id="last_name" name="last_name" type="text" class="h-9 w-full mt-0.5" :value="old('last_name', $user->last_name)" required autocomplete="family-name" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                </div>
            </div>

            <!-- Email -->
            <div class="flex w-full gap-4 mb-3">
                <div class="w-full">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="h-9 w-full mt-0.5" :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <!-- Year of Birth and Gender -->
            <div class="flex w-full gap-4 mb-3">
                <div class="w-1/2">
                    <x-input-label for="year_of_birth" :value="__('Year of Birth')" />
                    <x-text-input id="year_of_birth" name="year_of_birth" type="number" class="h-9 w-full mt-0.5 text-xs" :value="old('year_of_birth', $user->year_of_birth)" required />
                    <x-input-error :messages="$errors->get('year_of_birth')" class="mt-2" />
                </div>
                <div class="w-1/2">
                    <x-input-label for="gender" :value="__('Gender')" />
                    <select id="gender" name="gender" class="block h-9 w-full mt-0.5 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm text-gray-700" required>
                        <option value="" disabled {{ old('gender', $user->gender) === null ? 'selected' : '' }}>{{ __('Select Gender') }}</option>
                        <option value="Male" {{ old('gender', $user->gender) === 'Male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                        <option value="Female" {{ old('gender', $user->gender) === 'Female' ? 'selected' : '' }}>{{ __('Female') }}</option>
                        <option value="Other" {{ old('gender', $user->gender) === 'Other' ? 'selected' : '' }}>{{ __('Other') }}</option>
                    </select>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>
            </div>

            <!-- Save Changes Button -->
            <!-- Profile Picture Input -->
        
            <div class="w-full">
                    <x-input-label>
                        Upload Profile Picture
                    </x-input-label>
                <div class="border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-gray-700 h-9 w-full mt-0.5 text-xs ">
                    <input id="profile_picture" type="file" name="profile_picture" class=" pl-3 pt-1 block mt-1 w-full" accept="image/*">
                    <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />    
                </div>
            </div>

            <x-primary-button class="w-[35%] h-9 mt-4 text-sm items-center justify-center">
                    {{ __('Save Changes') }}
            </x-primary-button>
        </div>
    </form>
        <!-- Divider -->
    <div class="border-l-2 mt-2 border-gray-300 h-[80%] w-1 mx-8"></div>

    <!-- Password Section -->
    <div class="w-[40%] h-full">
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <!-- Old Password -->
            <div class="w-full mb-4">
                <x-input-label for="current_password" :value="__('Old Password')" />
                <x-text-input id="current_password" name="current_password" type="password" class="h-8 w-full mt-0.5" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <!-- New Password -->
            <div class="w-full mb-4">
                <x-input-label for="password" :value="__('New Password')" />
                <x-text-input id="password" name="password" type="password" class="h-9 w-full mt-0.5" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="w-full">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="h-9 w-full mt-0.5" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Change Password Button -->
            <x-primary-button class="w-[60%] h-9 mt-4 text-sm items-center justify-center">
                {{ __('Change Password') }}
            </x-primary-button>
        </form>
    </div>
</div>