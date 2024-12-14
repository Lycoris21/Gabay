<div class="flex h-full">
    <div class="w-[55%] h-full">
        <div class="flex w-full gap-4 mb-3">
            <div class="w-1/2">
                <x-input-label>
                    First Name
                </x-input-label>
                <x-text-input class="h-9 w-full mt-0.5"/>
            </div>
            <div class="w-1/2">
                <x-input-label>
                    Last Name
                </x-input-label>
                <x-text-input class="h-9 w-full mt-0.5"/>
            </div>
        </div>
        <div class="flex w-full gap-4 mb-3">
            <div class="w-full">
                <x-input-label>
                    Email
                </x-input-label>
                <x-text-input type="email" class="h-9 w-full mt-0.5"/>
            </div>
        </div>
        <div class="flex w-full gap-4 mb-3">
            <div class="w-1/2">
                <x-input-label>
                    Birthdate
                </x-input-label>
                <x-text-input type="date" class="text-gray-700 h-9 w-full mt-0.5 text-xs "/>
            </div>
            <div class="w-1/2">
                <x-input-label for="gender" :value="__('Gender')" />
                <select id="gender" name="gender" class="block mt-0.5 h-9 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm text-gray-700" required>
                    <option value="" disabled selected>{{ __('Select Gender') }}</option>
                    <option value="Male">{{ __('Male') }}</option>
                    <option value="Female">{{ __('Female') }}</option>
                    <option value="Other">{{ __('Other') }}</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>
        </div>
        <x-primary-button class="w-[35%] h-9 mt-2 text-sm items-center justify-center">
            Save Changes
        </x-primary-button>
    </div>

    <div class="border-l-2 mt-2 border-gray-300 h-[80%] w-1 mx-8">
    </div>

    <div class="w-[40%] h-full">
        <div class="w-full mb-3">
            <x-input-label>
                Old Password
            </x-input-label>
            <x-text-input type="password" class="h-8 w-full mt-0.5"/>
        </div>
        <div class="w-full">
            <x-input-label>
                New Password
            </x-input-label>
            <x-text-input type="password" class="h-9 w-full mt-0.5"/>
        </div>
        <x-primary-button class="w-[60%] h-9 mt-4 text-sm items-center justify-center">
            Change Password
        </x-primary-button>
    </div>
</div>