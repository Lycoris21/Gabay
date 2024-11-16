@props(['currentPage' => 1])

<div class="w-1/2 flex-col">
    @if ($currentPage < 4)
        <div class="flex justify-start">
            <x-indicator :isActive="1" />
            <x-indicator :isActive="$currentPage >= 2" />
            <x-indicator :isActive="$currentPage > 2" />
        </div>
    @endif
    <div>
        <x-header>
            {{ $slot }}
        </x-header>
    </div>
    <div class="mt-5">
        @if ($currentPage > 1)
            <a href="{{ route('pageSection.show', ['pageNumber' => $currentPage - 1]) }}">
                <x-secondary-button class="mr-5">
                    Previous
                </x-secondary-button>
            </a>
        @endif
        
        <a href="{{ route('pageSection.show', ['pageNumber' => $currentPage + 1]) }}">
            <x-primary-button>
                @if ($currentPage <4)
                    Next
                @else
                    Submit
                @endif
            </x-primary-button>
        </a>
    </div>
</div>