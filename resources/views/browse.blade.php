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

            <!-- Tutors -->
            <div class="items-start">
                <div class="rounded-xl p-10 shadow-lg bg-white">
                    <p>for loop here</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>