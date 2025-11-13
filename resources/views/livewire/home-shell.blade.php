<div class="page livewire-guest-shell-wrapper">
    @include('partials._header')

    <div class="page-wire">

        @if ($currentView === 'welcome')
            @include('components.maintenance-page')
        @elseif ($currentView === 'login')
            @include('authentication.login')
        @endif

    </div>

    @include('partials._footer')
</div>
