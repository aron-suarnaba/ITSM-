<x-dashboard>
    <x-slot:aside>
        @include('partials._aside')
    </x-slot:aside>

    <x-slot:header>
        @include('partials._header')
    </x-slot:header>

    <x-slot:content>
        @include('content.dashboard')
    </x-slot:content>

    <x-slot:footer>
        @include('partials._footer')
    </x-slot:footer>

</x-dashboard>
