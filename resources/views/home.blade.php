<x-layouts.home title="Welcome">

    <x-slot:header>
        @include('partials._nav')
    </x-slot:header>

    <x-slot:content>
        @include('page.landing-page')
    </x-slot:content>
</x-layouts.home>
