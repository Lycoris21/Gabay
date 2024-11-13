<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Become a Tutor') }}
        </h2>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You sure you wanna be a tutor? B)") }}
                </div>
            </div>
        </div>
    </div> --}}

    <div class="relative flex flex-col items-center justify-start pt-36">                
            
        <section class="h-[calc(100vh-350px)] relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <div class="w-1/2 flex-col">
                    <div class="flex justify-start">
                        <x-indicator :isActive="1 {{-- $currentPage === 1 --}}" />
                        <x-indicator :isActive="0 {{-- $currentPage === 2 --}}" />
                        <x-indicator :isActive="0 {{-- $currentPage === 3 --}}" />
                    </div>
                    <div>
                        <h1 class="my-5 text-4xl font-bold text-black">
                            Which subject would you like to teach?
                        </h1>
                        <x-text-input class="w-1/2">
                        </x-text-input>
                    </div>
                    <div class="mt-5">
                        <x-primary-button class="">
                            Next
                        </x-primary-button>
                    </div>
                </div>
                <div class="absolute top-1 left-2/3">
                    <img src="{{ asset('storage/images/owl.png') }}" alt="Owl" class="block w-auto fill-current scale-150">
                </div>
            </div>
        </section>

        <div class="bg-customOrange w-full h-32 mt-3">
        </div>
    </div>
</div>
</x-app-layout>
