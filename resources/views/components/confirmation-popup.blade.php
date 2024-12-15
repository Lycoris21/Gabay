<div id="confirm-popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex my-2 flex-col space-y-4">
        <p>Are you sure you want to {{ session('confirmAction') }} this application?</p>
        <div class="flex justify-end space-x-2">
            {{-- Approve Button --}}
            @if(session('confirmAction') === 'approve')
                <form method="POST" action="{{ route('applications.approve', ['id' => session('currentFormId')]) }}">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Confirm
                    </button>
                </form>
            @endif

            {{-- Deny Button --}}
            @if(session('confirmAction') === 'deny')
                <form method="POST" action="{{ route('applications.deny', ['id' => session('currentFormId')]) }}">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Confirm
                    </button>
                </form>
            @endif

            {{-- Cancel Button --}}
            <form method="GET" action="{{ route('admin.dashboard') }}">
                <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Cancel
                </button>
            </form>
        </div>
    </div>
</div>