<!-- filepath: resources/views/components/modals/base-modal.blade.php -->
<div x-data="{ open: false, title: '{{ $title ?? '' }}' }" @update-title.window="title = $event.detail">
    <!-- Trigger Button -->
    <x-primary-button @click="open = true; $dispatch('update-title', '{{ $title ?? '' }}')" class="px-4 py-2 bg-blue-500 text-white rounded">
        {{ $triggerText }}
    </x-primary-button>

    <!-- Modal Background -->
    <div x-show="open" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50" style="display: none;">
        <!-- Modal Content -->
        <div class="relative top-20 mx-auto p-5 border w-[35%] shadow-lg rounded-md bg-white">
            <!-- Modal Header -->
            <div class="flex justify-between items-center pb-2">
                <p class="text-2xl font-bold" x-text="title"></p>
                <div class="cursor-pointer z-50" @click="open = false">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 3.47a.75.75 0 00-1.06 0L9 7.94 4.53 3.47a.75.75 0 10-1.06 1.06L7.94 9l-4.47 4.47a.75.75 0 101.06 1.06L9 10.06l4.47 4.47a.75.75 0 101.06-1.06L10.06 9l4.47-4.47a.75.75 0 000-1.06z"/>
                    </svg>
                </div>
            </div>
            <!-- Modal Body -->
            <div class="my-1">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>