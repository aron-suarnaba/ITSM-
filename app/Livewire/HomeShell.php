<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;


class HomeShell extends Component
{
    #[Layout('layouts.home')]

    public $currentPage = 'dashboard';

    public function switchToPage($pageName)
    {
        $this->currentPage = $pageName;
    }

    public function render()
    {
        return view('livewire.home-shell');
    }
}
