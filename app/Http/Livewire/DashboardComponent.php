<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use App\Models\Diagram;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        $this->publicDiagrams = Diagram::publicDiagrams()->take(5)->get();

        $this->myDiagrams = Diagram::myDiagrams()->take(10)->get();

        return view('dashboard');
    }

}
