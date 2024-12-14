<x-app-layout>
    @php
        function formatSession($booking) {
            $date = \Carbon\Carbon::parse($booking->date);
            $startTime = \Carbon\Carbon::parse($booking->start_time)->format('H:i');
            $endTime = \Carbon\Carbon::parse($booking->end_time)->format('H:i');

            return [
                'dayOfWeek' => $date->format('D'),
                'day' => $date->format('d'),
                'subject' => $booking->subject_name,
                'topic' => $booking->subject_topic,
                'time' => $startTime . ' - ' . $endTime,
            ];
        }

        $upcomingSessions = $upcomingSessions->map(fn($b) => formatSession($b))->toArray();
    @endphp 

    <div class="py-5">
        <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8 h-[calc(100vh-120px)]">
            <div class="mr-5 h-full w-[28.50%] flex-col items-center">
                <div class="mb-2 h-1/2 p-5 pb-12 bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
                    Notifications
                    <div class="overflow-y-scroll mt-2 h-full"> {{-- div for all notifications --}}
                        @foreach ($notifications as $notification)
                            {{-- call the notification component here --}}
                            <x-notification-item 
                                :name="$notification['name']" 
                                :action="$notification['action']" 
                                :booking="$notification['booking']" 
                                :time="$notification['time']" 
                            />
                        @endforeach
                    </div>
                </div>

                
                <div class="mb-2 h-1/2 p-5 pb-12 bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
                    <p> Upcoming Sessions </p>
                    <div class="h-full flex flex-col">
                        <div class="overflow-y-scroll mt-2 flex-grow"> {{-- div for all upcoming sessions --}}
                            @foreach ($upcomingSessions as $upcomingSession)
                                {{-- call the upcomingSessions component here --}}
                                <x-upcoming-session-item 
                                    :dayOfWeek="$upcomingSession['dayOfWeek']" 
                                    :day="$upcomingSession['day']" 
                                    :subject="$upcomingSession['subject']" 
                                    :topic="$upcomingSession['topic']" 
                                    :time="$upcomingSession['time']" 
                                />
                            @endforeach
                        </div>
                    
                        @unless (Auth::user()->is_tutor)
                            <div class="mt-4 h-1/4">
                                <x-primary-button class="w-full">
                                    Book a session
                                </x-primary-button>
                            </div>
                        @endunless

                    </div>
                    
                </div>
            </div>
            <div class="w-3/4 h-[calc(100vh-280px)]">
                <div class="w-full h-40 p-10 flex items-center relative bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if(Auth::user()->profile_picture)
                        <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="w-28 h-28 rounded-full shadow-xl">
                    @else
                        <img src="{{ asset('storage/profile-picture/default-image.jpg') }}" alt="Default Profile Picture" class="w-28 h-28 rounded-full shadow-xl">
                    @endif
                    <div class="w-3/4 flex-col p-6 text-gray-900">
                        <div class="flex items-center">
                            <x-header class="text-2xl">
                                {{ Auth::user()->last_name }}, {{ Auth::user()->first_name }}
                            </x-header>
                            {{-- <p class="text-gray-500">
                                Profile ID: {{ Auth::user()->id }}
                            </p> --}}

                            <p class="mx-5">|</p>
                            
                            <p class=" text-l text-gray-800">
                                @if(Auth::user()->is_tutor)
                                {{ __('TUTOR') }}
                                @else
                                {{ __('STUDENT') }}
                                @endif
                            </p>
                        </div>
                        <p class="text-sm text-gray-500">
                            {{ ucfirst(Auth::user()->gender) }}, {{ \Carbon\Carbon::now()->year - Auth::user()->year_of_birth }} Years
                        </p>
                        {{-- <p class="text-gray-500">
                            {{ Auth::user()->email }}
                        </p> --}}

                        @if(Auth::user()->description)
                        <p class="text-sm italic text-gray-800">
                            {{ Auth::user()->description }}
                        </p>
                        @else
                        <p class="text-sm italic text-gray-800">
                            No description provided.
                        </p>
                        @endif

                        @if(Auth::user()->is_tutor)
                            <div class="flex items-center mt-0.5">
                                <p class=" text-sm text-gray-800">
                                    P200/hour
                                </p>

                                <p class="mx-3">|</p>
                                <div class="flex items-center flex-wrap">
                                    @foreach ($subjectTags as $subjectTag)
                                        <x-subject-tag :tag="$subjectTag"/>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="flex w-1/4 items-start justify-end">
                        <x-external-logos src="{{ asset('storage/images/Github_Logo.png') }}" alt="External app logo"/>
                        <x-external-logos src="{{ asset('storage/images/Gmail_Logo.png') }}" alt="External app logo"/>
                        <x-external-logos src="{{ asset('storage/images/LinkedIn_Logo.png') }}" alt="External app logo"/>
                    </div>
                </div>
                
                <div class="w-full mt-2 h-full p-5 flex-row items-center relative bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- User Dashboard Navigation -->
                    <x-user-dashboard-navigation :currentSection="$section" />
                
                    <!-- Dynamic Content -->
                    <div class="m-5 h-full">
                        @include($content)
                    </div>                        
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>