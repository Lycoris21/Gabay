<div class="h-full">
    <div class="h-[85%] overflow-y-auto">
        <table class="w-full bg-white">
            <thead class="bg-sky-900 border border-transparent text-white text-sm sticky top-0 h-12">
                <tr class="bg-sky-900 text-white text-sm">
                    <th class="px-4 py-2 ">Name</th>
                    <th class="px-4 py-2 ">Subject</th>
                    <th class="px-4 py-2 ">Date</th>
                    <th class="px-4 py-2 ">Time</th>
                    <th class="px-4 py-2 ">Status</th>
                    <th class="px-4 py-2 ">Action</th>
                </tr>
            </thead>

            <tbody class="text-sm text-center">
                @foreach ($requests as $request)
                    <x-request-item 
                        name="{{ $request['name'] }}" 
                        subject="{{ $request['subject'] }}" 
                        date="{{ $request['date'] }}" 
                        time="{{ $request['time'] }}" 
                        status="{{ $request['status'] }}"
                        :request="$request"
                    />  
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>
