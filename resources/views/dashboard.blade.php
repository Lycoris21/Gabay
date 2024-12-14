<x-app-layout>
    @php
        $notifications = [
            [
                'name' => 'Mr. Alex Tan',
                'action' => 'approved',
                'booking' => 'SAT PREP',
                'time' => '2h'
            ],
            [
                'name' => 'Ms. Maya Crimson',
                'action' => 'canceled',
                'booking' => 'Theology',
                'time' => '12h'
            ],
            [
                'name' => 'Mr. James Teo',
                'action' => 'rejected',
                'booking' => 'Chemistry',
                'time' => '1d'
            ],
            [
                'name' => 'Mr. James Teo',
                'action' => 'rejected',
                'booking' => 'Chemistry',
                'time' => '1d'
            ],
            [
                'name' => 'Mr. James Teo',
                'action' => 'rejected',
                'booking' => 'Chemistry',
                'time' => '1d'
            ],
        ];

        $upcomingSessions = [
            [
                'dayOfWeek' => 'Mon',
                'day' => '14',
                'subject' => 'Math',
                'topic' => 'Algebra Basics',
                'time' => '10:00AM - 12:00PM',
            ],
            [
                'dayOfWeek' => 'Tue',
                'day' => '15',
                'subject' => 'Science',
                'topic' => 'Introduction to Physics',
                'time' => '1:00PM - 3:00PM',
            ],
            [
                'dayOfWeek' => 'Wed',
                'day' => '16',
                'subject' => 'English',
                'topic' => 'Essay Writing Skills',
                'time' => '9:00AM - 11:00AM',
            ],
            [
                'dayOfWeek' => 'Thu',
                'day' => '17',
                'subject' => 'History',
                'topic' => 'World War II',
                'time' => '2:00PM - 4:00PM',
            ],
            [
                'dayOfWeek' => 'Fri',
                'day' => '18',
                'subject' => 'Math',
                'topic' => 'Calculus Basics',
                'time' => '10:00AM - 12:00PM',
            ],
            [
                'dayOfWeek' => 'Mon',
                'day' => '21',
                'subject' => 'Chemistry',
                'topic' => 'Organic Chemistry Fundamentals',
                'time' => '1:00PM - 3:00PM',
            ],
            [
                'dayOfWeek' => 'Tue',
                'day' => '22',
                'subject' => 'Physics',
                'topic' => 'Electromagnetism',
                'time' => '11:00AM - 1:00PM',
            ],
            [
                'dayOfWeek' => 'Wed',
                'day' => '23',
                'subject' => 'Biology',
                'topic' => 'Human Anatomy',
                'time' => '3:00PM - 5:00PM',
            ],
            [
                'dayOfWeek' => 'Thu',
                'day' => '24',
                'subject' => 'Math',
                'topic' => 'Statistics and Probability',
                'time' => '9:00AM - 11:00AM',
            ],
            [
                'dayOfWeek' => 'Fri',
                'day' => '25',
                'subject' => 'English',
                'topic' => 'Literary Analysis',
                'time' => '2:00PM - 4:00PM',
            ],
        ];

    @endphp 
    <div class="py-5">
        <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8 h-[calc(100vh-120px)]">
            <div class="mr-5 h-full w-1/3 flex-col items-center">
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
                    <div class="h-3/4">
                        <div class="overflow-y-scroll mt-2 h-full"> {{-- div for all upcoming sessions --}}
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
                    </div>
                    <div class="mt-4">
                        <x-primary-button class="w-full">
                            Book a session
                        </x-primary-button>
                    </div>
                </div>
            </div>
            <div class="w-3/4 h-40 p-10 flex items-center relative bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                </div>
                <!-- TODO: Create working redirect links -->
                <div class="flex w-1/4 items-start justify-end">
                    <x-external-logos src="{{ asset('storage/images/Github_Logo.png') }}" alt="External app logo"/>
                    <x-external-logos src="{{ asset('storage/images/Gmail_Logo.png') }}" alt="External app logo"/>
                    <x-external-logos src="{{ asset('storage/images/LinkedIn_Logo.png') }}" alt="External app logo"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>