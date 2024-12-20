<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserList extends Component {
    public $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function render()
    {
        return view('components.user-list');
    }
}
