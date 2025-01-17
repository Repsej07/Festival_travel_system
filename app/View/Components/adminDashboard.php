<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class admindashboard extends Component
{
    /**

     * Create a new component instance.
     */
    public $users;
    public $festivals;
    
    public function __construct($users, $festivals)
    {
        $this->users = $users;
        $this->festivals = $festivals;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.adminDashboard');
    }
}
