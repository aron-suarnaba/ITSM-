<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class GuestShell extends Component
{
    #[Layout('layouts.app')]

    public $currentView = 'welcome';

    public function switchToView($viewName)
    {
        $this->currentView = $viewName;
    }

    public function render()
    {
        return view('livewire.guest-shell');
    }
}
