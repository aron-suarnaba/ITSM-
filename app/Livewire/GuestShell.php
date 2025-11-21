<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class GuestShell extends Component
{
    #[Layout('layouts.app')]

    public $currentView = 'welcome';

    public function mount()
    {
        // Redirect to home if the user is already authenticated
        if (auth()->check()) {
            return redirect()->route('home');
        }
    }

    public function switchToView($viewName)
    {
        $this->currentView = $viewName;
    }

    public function render()
    {
        return view('livewire.guest-shell');
    }
}
