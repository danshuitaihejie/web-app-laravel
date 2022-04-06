<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use App\Models\Diagram;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        $this->diagrams = Diagram::all();
        return view('dashboard');
    }

}
