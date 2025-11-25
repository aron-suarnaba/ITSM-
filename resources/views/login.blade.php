<x-layouts.login title="Login">

    <x-slot:header>
        @include('partials._nav')
    </x-slot:header>

    <x-slot:content>
        @include('authentication.login')
    </x-slot:content>

    <x-slot:footer>
        @include('partials._footer')
    </x-slot:footer>

</x-layouts.login>
