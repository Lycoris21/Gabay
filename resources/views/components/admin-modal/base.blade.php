<div x-data="{ open: false }">
    <x-primary-button @click="open = true" class="px-4 py-2 bg-blue-500 text-white rounded">
        View Details
    </x-primary-button>
    <!-- Modal Background -->
    <div x-show="open" class="fixed inset-0 bg-gray-600 flex items-center bg-opacity-50 overflow-y-auto h-full w-full z-50" style="display: none;">
        <!-- Modal Content -->
        <div class="relative mx-auto p-10 border w-[35%] shadow-lg rounded-2xl bg-white">
            <!-- Modal Body -->
            <div class="my-1">
                {{ $slot }}
            </div>
        </div>
    </div>

</div>