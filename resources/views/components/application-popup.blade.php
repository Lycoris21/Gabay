<div id="popup" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-75">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex my-2 flex-col space-y-4">
        <div class="flex">
            <div class="mr-4">
                <img id="popup-pfp" src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=200&d=identicon" alt="Profile Picture" class="w-32 h-32 rounded-full" />
            </div>
            <div class="flex-grow">
                <div class="mb-4">
                    <div class="text-lg font-medium text-gray-900">PERSONAL INFORMATION</div>
                </div>
                <div class="mt-4">
                    <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="px-4 py-5 sm:p-6">
                            <dt class="text-sm font-medium text-gray-500">Name</dt>
                            <dd class="mt-1 text-sm text-gray-900" id="popup-name">Default Name</dd>
                        </div>
                        <div class="px-4 py-5 sm:p-6">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900" id="popup-email">default@email.com</dd>
                        </div>
                        <div class="px-4 py-5 sm:p-6">
                            <dt class="text-sm font-medium text-gray-500">Gender</dt>
                            <dd class="mt-1 text-sm text-gray-900" id="popup-gender">Unknown</dd>
                        </div>
                        <div class="px-4 py-5 sm:p-6">
                            <dt class="text-sm font-medium text-gray-500">Year of Birth</dt>
                            <dd class="mt-1 text-sm text-gray-900" id="popup-birth-year">0000</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
        <div class="bg-gray-100 p-4 rounded-md">
            <h2 class="text-lg font-medium text-gray-900">Application Details</h2>
            <div class="mt-2 space-y-2">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Subject to Teach</dt>
                    <dd class="text-sm text-gray-900" id="popup-subject">Mathematics</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Hourly Rate</dt>
                    <dd class="text-sm text-gray-900" id="popup-hourly-rate">$25/hr</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Resume</dt>
                    <dd class="text-sm text-gray-900">
                        <a href="#" id="popup-resume-link" class="text-blue-500 hover:underline">View Resume</a>
                    </dd>
                </div>
            </div>
        </div>
        <div class="flex justify-end space-x-2">
            <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Approve</button>
            <button onclick="openConfirmPopup({{ 2 }})" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Deny</button>
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="togglePopup()">Close</button>
        </div>
    </div>
</div>