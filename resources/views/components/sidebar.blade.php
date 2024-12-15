<div class="bg-gray-800 w-64 h-screen fixed">
    <div class="flex flex-col items-start mt-8 space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 w-full 
        {{ Request::is('admin/dashboard') ? 'bg-gray-100 text-gray-800 font-black' : 'text-white hover:bg-gray-700' }}">    
            Dashboard
        </a>
        <a href="{{ route('admin.manageTutorApplications') }}" class="block px-4 py-2 w-full
        {{ Request::is('admin/manage-tutor-applications') ? 'bg-gray-100 text-gray-800 font-black' : 'text-white hover:bg-gray-700' }}">
            Manage Tutor Applications
        </a>
        <a href="{{ route('admin.manageUsers') }}" class="block px-4 py-2 w-full
        {{ Request::is('admin/manage-users') ? 'bg-gray-100 text-gray-800 font-black' : 'text-white hover:bg-gray-700' }}">
            Manage Users
        </a>
    </div>
</div>
