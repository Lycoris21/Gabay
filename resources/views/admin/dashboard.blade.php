<x-app-layout>
    <script>
        // Toggle visibility of the original popup (for Close action)
        function togglePopup() {
            const popup = document.getElementById('popup');
            popup.classList.toggle('hidden');
        }

        let currentFormId = null; // To store the current application ID
        let currentAction = null; // To store the current action (approve or deny)

        function openConfirmPopup(applicationId, action) {
            currentFormId = applicationId; // Set the application ID
            currentAction = action; // Set the action (approve or deny)
            document.getElementById('confirm-popup').classList.remove('hidden');
        }

        document.getElementById('confirm-approve').addEventListener('click', function() {
            if (currentFormId) {
                // Submit the form for approval
                document.getElementById('approve-form-' + currentFormId).submit();
            }
            closeConfirmPopup();
        });

        document.getElementById('confirm-deny').addEventListener('click', function() {
            if (currentFormId) {
                // Submit the form for denial
                document.getElementById('deny-form-' + currentFormId).submit();
            }
            closeConfirmPopup();
        });

        function closeConfirmPopup() {
            document.getElementById('confirm-popup').classList.add('hidden');
        }

        function openConfirmPopup(applicationId) {
            currentFormId = applicationId; // Set the application ID for the denial
            document.getElementById('confirm-popup').classList.remove('hidden');
        }

        function closeConfirmPopup() {
            document.getElementById('confirm-popup').classList.add('hidden');
        }
    </script>

    <div class="flex">
        <x-sidebar />
        <x-confirmation-popup />
        <x-application-popup />

        <div class="flex-1 ml-64 py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Dashboard</h1>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg min-h-full">
                    <div class="p-6 text-gray-900 h-600">
                        <x-application-table :applications="$applications" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>