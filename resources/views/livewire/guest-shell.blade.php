<div class="livewire-guest-shell-wrapper">
    @include('partials._nav', [
        'livewireComponent' => $this,
        'currentView' => $currentView
    ])

    <div class="page-wire">
       @if ($currentView === 'welcome')
        @include('content.main', ['cv' => $currentView])
    @elseif ($currentView === 'login')
            @include('authentication.login')
        @endif
    </div>
</div>
