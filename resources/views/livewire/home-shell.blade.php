<div class="page livewire-home-shell-wrapper">
    @include('partials._aside')
    @include('partials._header')

    <div class="page-wire">

        @if ($currentPage === 'dashboard')
            @include('components.maintenance-page')
        @endif

    </div>

    @include('partials._footer')
</div>
