<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-[calc(100vh-250px)]">
            <x-text-input placeholder="Enter a subject" class="w-[98.5%] my-5 shadow-lg"/>
            <div class="flex justify-between mb-3 text-sm">
                <p class="self-end">10 Tutors Found</p>
                <div class="w-24 mr-5">
                    <select id="sort" name="sort" 
                        class="block h-7 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-[12px] text-gray-700 appearance-none py-0 pl-2" 
                        style="line-height: 1.5; padding-top: 0; padding-bottom: 0;" 
                        required>
                        <option value="" disabled selected>{{ __('Sort by') }}</option>
                        <option value="Female">{{ __('A-Z') }}</option>
                        <option value="Other">{{ __('Z-A') }}</option>
                        <option value="Male">{{ __('Hourly Rate') }}</option>
                    </select>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>
                
                
            </div>
            <div class="flex flex-col gap-5 w-full h-full overflow-y-scroll">
                <!-- To for loop here -->
                <div class="w-full pr-1">
                    <x-user-card :subjectTags="$subjectTags"/>
                </div>
                <div class="w-full pr-1">
                    <x-user-card :subjectTags="$subjectTags"/>
                </div>
                <div class="w-full pr-1">
                    <x-user-card :subjectTags="$subjectTags"/>
                </div>
                <div class="w-full pr-1">
                    <x-user-card :subjectTags="$subjectTags"/>
                </div>
                <div class="w-full pr-1">
                    <x-user-card :subjectTags="$subjectTags"/>
                </div>
                <div class="w-full pr-1">
                    <x-user-card :subjectTags="$subjectTags"/>
                </div>
                <div class="w-full pr-1">
                    <x-user-card :subjectTags="$subjectTags"/>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>