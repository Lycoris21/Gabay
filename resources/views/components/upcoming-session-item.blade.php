<div class="upcoming-session-item flex p-2 border-b border-gray-200 h-16 w-full">
    <div class="flex-col justify-items-center w-12">
        <h4 class="font-light text-base ">{{ $dayOfWeek }}</h4>
        <h4 class="font-bold text-lg">{{ $day }}</h4>
    </div>
    <div class="flex-row ml-2 bg-cyan-500 rounded-xl w-10/12 pl-2 justify-center pt-1">
        <p class="text-sm text-gray-700 truncate w-11/12"><strong>{{ $subject }}: {{ $topic }}</strong> </p>
        <p class="text-sm text-gray-700"> {{ $time }}</p>
    </div>
</div>