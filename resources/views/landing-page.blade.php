<x-layouts.welcome title="Welcome to ITSM+">
    <x-slot:header>
        @include('partials._nav')
    </x-slot:header>

    <x-slot:content>
        @include('page.landing-page')
    </x-slot:content>

    <x-slot:footer>
        @include('partials._footer')
    </x-slot:footer>
</x-layouts.welcome>
