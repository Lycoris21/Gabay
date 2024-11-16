<x-app-layout name="tutor/1">
    <div class="relative flex flex-col items-center justify-start pt-36">                
            
        <section class="h-[calc(100vh-350px)] relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div>
                
                    <x-page-section :currentPage="$currentPage">
                        @if ($currentPage === 1)
                            <x-header>
                                1
                            </x-header>
                            <x-text-input/>
                        @elseif ($currentPage === 2)
                            <x-header>
                                2
                            </x-header>
                            <x-text-input/>
                        @elseif ($currentPage === 3)
                            <x-header>
                                3
                            </x-header>
                            <x-text-input/>
                        @else
                            <x-header>
                                Confirm Details
                            </x-header>
                            <x-text-input/>
                        @endif
                    </x-page-section>
                
                <div class="absolute top-1 left-2/3">
                    <img src="{{ asset('storage/images/owl.png') }}" alt="Owl" class="block w-auto fill-current scale-150">
                </div>
            </div>
        </section>

        <div class="bg-customOrange w-full h-32 mt-3"/>
    </div>
</x-app-layout>
