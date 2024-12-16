@props(['user'])
<x-admin-modal.base :user="$user" class="w-[60%]">
    <div class="h-full w-full">
        <div x-data="{ step: 1 }">

            <div x-show="step === 1">
                <div class="flex mt-7">
                    <!-- Profile Picture -->
                    <div class="ml-10 w-35%">
                        <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/profile-picture/default-image.jpg') }}"
                            alt="Profile Picture" class="w-60 h-60 rounded-full" />
                    </div>
                    <!-- Personal Information -->
                    <div class="flex-grow ml-2 mr-7 ml-7">
                        <div class="text-xl font-extrabold text-gray-800 px-4 justify-self-center">PERSONAL INFORMATION</div>
                        <dl class="flex justify-evenly mb-6">
                            <!-- ID -->
                            <div>
                                <dt class="mt-1 text-sm font-bold text-gray-500">ID</dt>
                                <dt class="mt-1 text-sm font-medium text-gray-500">Name</dt>
                                <dt class="mt-1 text-sm font-medium text-gray-500">Gender</dt>
                                <dt class="mt-1 text-sm font-medium text-gray-500">Year of Birth</dt>
                                <dt class="mt-1 text-sm font-medium text-gray-500">Email</dt>
                                <dt class="mt-1 text-sm font-medium text-gray-500">Description</dt>
                                <dt class="mt-1 text-sm font-medium text-gray-500">Role</dt>
                                <dt class="mt-1 text-sm font-medium text-gray-500">Created At</dt>
                                <dt class="mt-1 text-sm font-medium text-gray-500">Updated At</dt>
                            </div>
                            <!-- Name -->
                            <div>
                                <dd class="mt-1 text-sm text-gray-900">{{ $user->id }}</dd>
                                <dd class="mt-1 text-sm text-gray-900">{{ $user->first_name }} {{ $user->last_name }}</dd>
                                <dd class="mt-1 text-sm text-gray-900">{{ $user->gender }}</dd>
                                <dd class="mt-1 text-sm text-gray-900">{{ $user->year_of_birth }}</dd>
                                <dd class="mt-1 text-sm text-gray-900">{{ $user->email }}</dd>
                                <dd class="mt-1 text-sm text-gray-900">{{ $user->description }}</dd>
                                <dd class="mt-1 text-sm text-gray-900">{{ $user->is_tutor ? 'Yes' : 'No' }}</dd>
                                <dd class="mt-1 text-sm text-gray-900">{{ $user->created_at }}</dd>
                                <dd class="mt-1 text-sm text-gray-900">{{ $user->updated_at }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Tutor-Specific Details -->
                @if($user->tutor)
                <div class="bg-gray-100 p-4 rounded-md">
                    <h2 class="text-lg font-medium text-gray-900">Tutor Details</h2>
                    <div class="mt-2 space-y-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Subjects to Teach</dt>
                            <dd class="text-sm text-gray-900">
                                @foreach($user->tutor->subjects as $subject)
                                {{ $subject->subject }}<br>
                                @endforeach
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Hourly Rate</dt>
                            <dd class="text-sm text-gray-900">
                                @foreach($user->tutor->subjects as $subject)
                                PHP {{ $subject->hourly_rate }}/hr<br>
                                @endforeach
                            </dd>
                        </div>
                    </div>
                </div>
                @endif

                <div class="flex justify-end gap-3">
                    <div>
                        <x-primary-button @click="step = 2" class="px-4 py-2">
                            Edit
                        </x-primary-button>
                    </div>
                    <x-secondary-button @click="open = false" class="px-4 py-2 text-left">Cancel</x-secondary-button>
                </div>
            </div>

            <div x-show="step === 2">
                <form method="POST" action="{{ route('admin.updateUser', $user->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="flex mt-7">
                        <!-- Profile Picture -->
                        <div class="w-35% flex flex-col self-center items-center">
                            <div class="flex -mt-10 mb-8">
                                <div class="text-xl font-extrabold text-gray-800 px-4 justify-self-center">Edit Profile</div>
                            </div>
                            <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/profile-picture/default-image.jpg') }}"
                                alt="Profile Picture" class="w-60 h-60 rounded-full" />
                        </div>
                        <!-- Personal Information -->

                        <div class="flex-grow mr-7 ml-10 mb-4">
                            <!-- First Name and Last Name -->
                            <div class="flex w-full gap-4 mb-1">
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
                            <div class="flex w-full gap-4 mb-1">
                                <div class="w-full">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" name="email" type="email" class="h-9 w-full mt-0.5" :value="old('email', $user->email)" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>

                            <!-- Year of Birth and Gender -->
                            <div class="flex w-full gap-4 mb-1">
                                <div class="w-1/2">
                                    <x-input-label for="year_of_birth" :value="__('Year of Birth')" />
                                    <x-text-input id="year_of_birth" name="year_of_birth" type="number" class="h-9 w-full mt-0.5 text-xs" :value="old('year_of_birth', $user->year_of_birth)" required />
                                    <x-input-error :messages="$errors->get('year_of_birth')" class="mt-2" />
                                </div>
                                <div class="w-1/2">
                                    <x-input-label for="gender" :value="__('Gender')" />
                                    <select id="gender" name="gender" class="block h-9 w-full mt-0.5 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-sm text-gray-900">
                                        <option value="" disabled {{ old('gender', $user->gender) === null ? 'selected' : '' }}>{{ __('Select Gender') }}</option>
                                        <option value="Male" {{ old('gender', $user->gender) === 'Male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                                        <option value="Female" {{ old('gender', $user->gender) === 'Female' ? 'selected' : '' }}>{{ __('Female') }}</option>
                                        <option value="Other" {{ old('gender', $user->gender) === 'Other' ? 'selected' : '' }}>{{ __('Other') }}</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                </div>
                            </div>

                            <div class="flex w-full gap-4 mb-1">
                                <div class="w-full">
                                    <x-input-label for="description" :value="__('Description')" />
                                    <textarea id="description" name="description" class="mt-1 block w-full h-10 resize-none" rows="3" placeholder="Write a brief description..." maxlength="500">{{ old('description', $user->description) }}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                </div>
                            </div>

                            @if ($user->tutor)
                            <!-- Subjects -->
                            <div class="flex w-full gap-4 mb-1">
                                <div class="w-full">
                                    <x-input-label for="subjects" :value="__('Subjects')" />
                                    <x-text-input id="subjects" name="subjects" type="text" class="h-9 w-full mt-0.5" :value="old('subjects', $user->tutor->subjects)" required autocomplete="subjects" />
                                    <x-input-error :messages="$errors->get('subjects')" class="mt-2" />
                                </div>
                            </div>

                            <!-- Hourly Rate and Resume -->
                            <div class="flex w-full gap-4 mb-1">
                                <div class="w-1/2">
                                    <x-input-label for="hourly_rate" :value="__('Hourly Rate')" />
                                    <x-text-input id="hourly_rate" name="hourly_rate" type="text" class="h-9 w-full mt-0.5" :value="old('hourly_rate', $user->tutor->hourly_rate)" required autofocus autocomplete="hourly_rate" />
                                    <x-input-error :messages="$errors->get('hourly_rate')" class="mt-2" />
                                </div>
                                <div class="w-1/2">
                                    <x-input-label for="resume" :value="__('Resume')" />
                                    <x-text-input id="resume" name="resume" type="text" class="h-9 w-full mt-0.5" :value="old('resume', $user->tutor->resume)" required autocomplete="resume" />
                                    <x-input-error :messages="$errors->get('resume')" class="mt-2" />
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-end gap-3">
                        <div>
                            <x-primary-button type="submit" class="px-4 py-2">Save Changes</x-primary-button>
                        </div>
                        <x-secondary-button @click="open = false, step = 1" class="px-4 py-2 text-left">Cancel</x-secondary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-modal.base>