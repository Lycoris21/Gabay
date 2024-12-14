<!-- Just the dashboard for now -->

<x-app-layout>
    <div class="bg-[#375E97] mt-4 p-10"></div>

    <div class="flex flex-col justify-center items-center mt-10 ">
        <!-- Attempt at Sort By Dropdown -->

        <!-- <div class="flex flex-row justify-end mb-5">
            <button class="bg-[#375E97] text-white rounded-lg p-3">Sort By</button>

        </div> -->

        <div class="flex flex-row gap-5">
            <div class="items-start">
                <div class="rounded-xl p-8 shadow-lg bg-white">
                    <div class="mb-8">
                        <h1 class="font-bold text-xl mb-3">Subject</h1>
                        <input type="text" class="rounded-lg w-[15rem]">
                    </div>
                    <div>
                        <h1 class="font-bold text-xl mb-3">Gender Preference</h1>
                        <div class="flex flex-row items-center">
                            <input type="checkbox" value="male" class="rounded-sm mr-3" />
                            <p>Male</p>
                        </div>
                        <div class="flex flex-row items-center">
                            <input type="checkbox" value="female" class="rounded-sm mr-3" />
                            <p>Female</p>
                        </div>
                        <div class="flex flex-row items-center">
                            <input type="checkbox" value="other" class="rounded-sm mr-3" />
                            <p>Others</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Temporary copy paste -->
            <div class="flex flex-col gap-3 items-start">
                <div class="rounded-xl p-5 shadow-lg bg-white">
                    <div class="w-[50rem] h-40 p-5 flex items-center bg-white shadow-sm sm:rounded-lg">
                        @if(Auth::user()->profile_picture)
                        <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="w-28 h-28 rounded-full shadow-xl">
                        @else
                        <img src="{{ asset('storage/profile-picture/default-image.jpg') }}" alt="Default Profile Picture" class="w-28 h-28 rounded-full shadow-xl">
                        @endif
                        <div class="w-3/4 flex-col p-6 text-gray-900">
                            <div class="flex items-center">
                                <p class="text-2xl font-bold">
                                    {{ Auth::user()->last_name }}, {{ Auth::user()->first_name }}
                                </p>
                            </div>
                            <p class="text-sm text-gray-500">
                                {{ ucfirst(Auth::user()->gender) }}, {{ \Carbon\Carbon::now()->year - Auth::user()->year_of_birth }} Years
                            </p>



                            @if(Auth::user()->description)
                            <p class="text-sm italic text-gray-800">
                                {{ Auth::user()->description }}
                            </p>
                            @else
                            <p class="text-sm italic text-gray-800">
                                No description provided.
                            </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="rounded-xl p-5 shadow-lg bg-white">
                    <div class="max-w-[50rem] h-40 p-5 flex items-center bg-white shadow-sm sm:rounded-lg">
                        @if(Auth::user()->profile_picture)
                        <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="w-28 h-28 rounded-full shadow-xl">
                        @else
                        <img src="{{ asset('storage/profile-picture/default-image.jpg') }}" alt="Default Profile Picture" class="w-28 h-28 rounded-full shadow-xl">
                        @endif
                        <div class="w-3/4 flex-col p-6 text-gray-900">
                            <div class="flex items-center">
                                <p class="text-2xl font-bold">
                                    {{ Auth::user()->last_name }}, {{ Auth::user()->first_name }}
                                </p>
                            </div>
                            <p class="text-sm text-gray-500">
                                {{ ucfirst(Auth::user()->gender) }}, {{ \Carbon\Carbon::now()->year - Auth::user()->year_of_birth }} Years
                            </p>



                            @if(Auth::user()->description)
                            <p class="text-sm italic text-gray-800">
                                {{ Auth::user()->description }}
                            </p>
                            @else
                            <p class="text-sm italic text-gray-800">
                                No description provided.
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>