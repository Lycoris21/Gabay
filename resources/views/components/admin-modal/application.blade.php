<!-- filepath: /c:/Users/Christine Ann Dejito/Documents/GitHub/Gabay/resources/views/components/admin-modal/application.blade.php -->
@props(['application'])
<x-admin-modal.base :application="$application">
    <div class="h-full w-full">
        <div x-data="{ step: 1 }">
            <!-- Step 1 -->
            <div x-show="step === 1">
                <!-- Personal Information and Application Details -->
                <div class="flex justify-evenly items-center">
                    <div class="w-35%">
                        <img src="{{ $application->user->profile_picture ? asset('storage/' . $application->user->profile_picture) : asset('storage/profile-picture/default-image.jpg')}}" 
                             alt="Profile Picture" class="w-36 h-36 rounded-full" >
                    </div>
    
                    <div class="flex-row w-65% -p-16 mb-6">
                        <div class="mb-4">
                            <div class="text-lg font-medium text-gray-900">PERSONAL INFORMATION</div>
                        </div>
                        <div class="mt-4">
                            <dl class="flex-row">
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">User ID</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $application->user->id }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Name</dt>
                                    <dd class="text-sm text-gray-900">{{ $application->user->first_name }} {{ $application->user->last_name }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Gender</dt>
                                    <dd class="text-sm text-gray-900">{{ $application->user->gender }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Birth Year</dt>
                                    <dd class="text-sm text-gray-900">{{ $application->user->year_of_birth }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                                    <dd class="text-sm text-gray-900">{{ $application->user->email }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Joined On</dt>
                                    <dd class="text-sm text-gray-900">{{ $application->user->created_at }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="border-2 border-black p-5 rounded-xl">
                    <h2 class="text-lg font-medium text-gray-900">Application Details</h2>
                    <div class="mt-2 space-y-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Subject to Teach</dt>
                            <dd class="text-sm text-gray-900">{{ $application->subject }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Hourly Rate</dt>
                            <dd class="text-sm text-gray-900">PHP {{ $application->hourly_rate }}/hr</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Resume</dt>
                            <dd class="text-sm text-gray-900">
                                <a href="{{ asset('storage/' . $application->resume_path) }}" 
                                   class="text-blue-500 hover:underline">View Resume</a>
                            </dd>
                        </div>
                    </div>
                </div>
            
                <!-- Buttons to Change Steps -->
                <div class="mt-4 flex justify-end gap-3">
                    <div>
                        <x-primary-button @click="step = 2" class="px-4 py-2" style="background-color: #dc2626 !important;">Reject</x-primary-button>
                    </div>
                    <div>
                        <x-primary-button @click="step = 4" class="px-4 py-2" style="background-color: #26dc29 !important;">Approve</x-primary-button>
                    </div>
                    <div>
                        <x-secondary-button @click="open = false" class="px-4 py-2">Cancel</x-secondary-button>
                    </div>
                </div>
            </div>
        
            
            <div x-show="step === 2">
                <div class="mb-8">
                    <div class="font-black text-2xl text-start text-red-600 "> 
                            <p>Reject Application?</p>
                    </div>
                    <div class="font-normal text-sm mb-2 text-start"> <p>This action cannot be undone.</p> </div>
                </div>
                <div class="flex justify-end gap-3">
                    <div>
                        <x-primary-button @click="step = 3" class="px-4 py-2">
                                Reject
                        </x-primary-button>
                    </div>
                    <x-secondary-button @click="open = false, step = 1" class="px-4 py-2 text-left">Cancel</x-secondary-button>
                </div>
            </div>

            <div x-show="step === 3" class="flex-row justify-items-center gap-y-2">
                <img src="{{ asset('storage/images/sent.png') }}" alt="sent" class="pl-1 block h-20 fill-current mb-2">
                    <p class="text-3xl font-black m-2">Application Rejected</p>
                    <p class="text-sm font-base mb-6">User will be notified of the status of their application.</p>
                <div class="mb-8">
                    <x-nav-link :href="route('admin.manageTutorApplications')" :active="request()->routeIs('admin.manageTutorApplications')" @click="open = false" class="font-bold text-lg">
                        {{ __('Back to Manage Tutor Applications') }}
                    </x-nav-link>
                </div>
            </div>

            <div x-show="step === 4">
                <div class="mb-8">
                    <div class="font-black text-2xl text-start text-green-600 "> 
                            <p>Approve Application?</p>
                    </div>
                    <div class="font-normal text-sm mb-2 text-start"> <p>This action cannot be undone.</p> </div>
                </div>
                <div class="flex justify-end gap-3">
                    <div>
                        <x-primary-button @click="step = 5" class="px-4 py-2">
                                Approve Application
                        </x-primary-button>
                    </div>
                    <x-secondary-button @click="open = false, step = 1" class="px-4 py-2 text-left">Cancel</x-secondary-button>
                </div>
            </div>

            <div x-show="step === 5" class="flex-row justify-items-center gap-y-2">
                <img src="{{ asset('storage/images/sent.png') }}" alt="sent" class="pl-1 block h-20 fill-current mb-2">
                    <p class="text-3xl font-black m-2">Application Approved</p>
                    <p class="text-sm font-base mb-6">User will be notified of the status of their application.</p>
                <div class="mb-8">
                    <x-nav-link :href="route('admin.manageTutorApplications')" :active="request()->routeIs('admin.manageTutorApplications')" @click="open = false" class="font-bold text-lg">
                        {{ __('Back to Manage Tutor Applications') }}
                    </x-nav-link>
                </div>
            </div>
    
    </div>
</x-admin-modal.base>