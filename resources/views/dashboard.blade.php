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
    'role' => $booking->role
    ];
    }

    $upcomingSessions = $upcomingSessions->map(fn($b) => formatSession($b))->toArray();
    @endphp

    <div class="py-5">
        <div class="flex flex-row-reverse max-w-7xl mx-auto sm:px-6 lg:px-8 h-[calc(100vh-120px)] gap-2">
            <div class="mr-5 h-full w-[28.50%] flex-col items-center">
                <div class="mb-2 h-1/2 p-5 pb-12 bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
                    Notifications
                    <div class="overflow-y-scroll mt-2 h-full"> {{-- div for all notifications --}}
                        @foreach ($notifications as $notification)
                        {{-- call the notification component here --}}
                        <x-notification-item
                            :name="$notification['name']"
                            :action="$notification['action']"
                            :booking="$notification['subject_name']"
                            :time="$notification['updated_at']"
                            :profile_picture="$notification['profile_picture']" />
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
                                :role="$upcomingSession['role']" />
                            @endforeach
                        </div>

                        @unless (Auth::user()->is_tutor)
                        <div class="mt-4 h-1/4">
                            <x-primary-button onclick="window.location.href='{{ route('browse.index') }}'" class=" w-full">
                                Book a session
                            </x-primary-button>
                        </div>
                        @endunless

                    </div>

                </div>
            </div>
            <div class="w-3/4 h-[calc(100vh-280px)]">
                <x-user-card :user="Auth::user()" :subjectTags="$subjectTags" />

                <div class="w-full mt-2 h-full p-5 flex-row items-center relative bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- User Dashboard Navigation -->
                    <x-user-dashboard-navigation :currentSection="$section" />

                    <!-- Dynamic Content -->
                    <div class="m-2 h-full">
                        @include($content, ['user' => $user])
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>