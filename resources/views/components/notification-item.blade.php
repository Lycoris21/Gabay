<div class="notification flex flex-row items-center p-2 border-b">
    <div>
        <img src="{{ asset('storage/profile-picture/default-image.jpg') }}" alt="Default Profile Picture" class="mr-2 w-10 h-10 rounded-full shadow-xl">
    </div>
    <div class="flex-col ml-2">
        <p class="text-sm">
            {{ $name }}
            {{ $action }}
            {{ $booking }}. 
        </p>
        <p class="font-light text-xs">
            <span>{{ $time }}</span>
        </p>
    </div>

</div>