@if (session('success'))
    <div data-flash-message class="mb-6 flex items-start justify-between gap-4 rounded-md border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800 shadow-sm transition-opacity duration-500">
        <p>{{ session('success') }}</p>
        <button type="button" data-flash-close class="shrink-0 rounded p-0.5 text-green-700 hover:bg-green-100 hover:text-green-900" aria-label="Fermer le message">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
            </svg>
        </button>
    </div>
@endif

@if (session('error'))
    <div data-flash-message class="mb-6 flex items-start justify-between gap-4 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800 shadow-sm transition-opacity duration-500">
        <p>{{ session('error') }}</p>
        <button type="button" data-flash-close class="shrink-0 rounded p-0.5 text-red-700 hover:bg-red-100 hover:text-red-900" aria-label="Fermer le message">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
            </svg>
        </button>
    </div>
@endif

@if (session('success') || session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var messages = document.querySelectorAll('[data-flash-message]');

            messages.forEach(function (message) {
                var closeButton = message.querySelector('[data-flash-close]');
                var dismiss = function () {
                    message.style.opacity = '0';
                    setTimeout(function () {
                        message.remove();
                    }, 500);
                };

                if (closeButton) {
                    closeButton.addEventListener('click', dismiss);
                }

                setTimeout(dismiss, 5000);
            });
        });
    </script>
@endif
