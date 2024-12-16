<div class="bg-gray-800 w-64 h-screen fixed">
    <div class="flex flex-col items-start mt-8 space-y-2">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 w-full 
        {{ Request::is('admin/dashboard') ? 'bg-gray-100 text-gray-800 font-black group' : 'text-white hover:bg-gray-700 group' }}">
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                    class="{{ Request::is('admin/dashboard') ? 'fill-gray-800' : 'fill-white' }}">
                    <path d="M264-216h96v-240h240v240h96v-348L480-726 264-564v348Zm-72 72v-456l288-216 288 216v456H528v-240h-96v240H192Zm288-327Z" />
                </svg>
                <span>Dashboard</span>
            </div>
        </a>
        <!-- Manage Tutor Applications -->
        <a href="{{ route('admin.manageTutorApplications') }}" class="block px-3 py-2 w-full
        {{ Request::is('admin/manage-tutor-applications') ? 'bg-gray-100 text-gray-800 font-black group' : 'text-white hover:bg-gray-700 group' }}">
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#666666"
                    class="{{ Request::is('admin/manage-tutor-applications') ? 'fill-gray-800' : 'fill-white' }}">
                    <path d="M336-240h288v-72H336v72Zm0-144h288v-72H336v72ZM263.72-96Q234-96 213-117.15T192-168v-624q0-29.7 21.15-50.85Q234.3-864 264-864h312l192 192v504q0 29.7-21.16 50.85Q725.68-96 695.96-96H263.72ZM528-624v-168H264v624h432v-456H528ZM264-792v189-189 624-624Z" />
                </svg>
                <span>Manage Tutor Applications</span>
            </div>
        </a>
        <!-- Manage Users -->
        <a href="{{ route('admin.manageUsers') }}" class="block px-3 py-2 w-full
        {{ Request::is('admin/manage-users') ? 'bg-gray-100 text-gray-800 font-black' : 'text-white hover:bg-gray-700' }}">
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#666666"
                    class="{{ Request::is('admin/manage-users') ? 'fill-gray-800' : 'fill-white' }}">
                    <path d="M480-480q-60 0-102-42t-42-102q0-60 42-102t102-42q60 0 102 42t42 102q0 60-42 102t-102 42ZM192-192v-96q0-23 12.5-43.5T239-366q55-32 116.29-49 61.29-17 124.5-17t124.71 17Q666-398 721-366q22 13 34.5 34t12.5 44v96H192Zm72-72h432v-24q0-5.18-3.03-9.41-3.02-4.24-7.97-6.59-46-28-98-42t-107-14q-55 0-107 14t-98 42q-5 4-8 7.72-3 3.73-3 8.28v24Zm216.21-288Q510-552 531-573.21t21-51Q552-654 530.79-675t-51-21Q450-696 429-674.79t-21 51Q408-594 429.21-573t51 21Zm-.21-72Zm0 360Z" />
                </svg>
                <span>Manage Users</span>
            </div>
        </a>
        <!-- Rejected Applications -->
        <a href="{{ route('admin.manageRejectedApplications') }}" class="block px-3 py-2 w-full
        {{ Request::is('admin/rejected-applications') ? 'bg-gray-100 text-gray-800 font-black group' : 'text-white hover:bg-gray-700 group' }}">
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#666666"
                    class="{{ Request::is('admin/rejected-applications') ? 'fill-gray-800' : 'fill-white' }}">
                    <path d="M480 480q-60 0-102-42t-42-102q0-60 42-102t102-42q60 0 102 42t42 102q0 60-42 102t-102 42ZM192 192v-96q0-23 12.5-43.5T239 34q55-32 116.29-49 61.29-17 124.5-17t124.71 17Q666 2 721 34q22 13 34.5 34t12.5 44v96H192Zm72-72h432v-24q0-5.18-3.03-9.41-3.02-4.24-7.97-6.59-46-28-98-42t-107-14q-55 0-107 14t-98 42q-5 4-8 7.72-3 3.73-3 8.28v24Zm216.21-288Q510 552 531 573.21t21 51Q552 654 530.79 675t-51 21Q450 696 429 674.79t-21-51Q408 594 429.21 573t51-21Zm-.21-72Zm0 360Z" />
                </svg>
                <span>Rejected Applications</span>
            </div>
        </a>
    </div>
</div>