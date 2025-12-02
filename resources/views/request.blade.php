<x-layouts.app>
    <x-slot:aside>
        @include('partials._aside')
    </x-slot:aside>

    <x-slot:header>
        @include('partials._header')
    </x-slot:header>

    <x-slot:content>
        @include('page.request-user-page')
    </x-slot:content>

    <x-slot:footer>
        @include('partials._footer')
    </x-slot:footer>
</x-layouts.app>

@include('modals.request')
@include('modals.requestDetailsModals')

@if (session('success'))
    <script>
        $(document).ready(function () {
            Toastify({
                text: '{{ session('success') }}',
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                stopOnFocus: true,
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                }
            }).showToast();
        });
    </script>
@endif

@push('scripts')
    @vite([
        'resources/js/request/request.js',
        'resources/js/request/requestDetailsModals.js',
        'resources/js/request/request-real-time-data.js'
    ])
@endpush
