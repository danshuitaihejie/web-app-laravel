<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use App\Models\Diagram;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        $this->publicDiagrams = Diagram::publicDiagrams()->take(20)->get();

        if(auth()->check()) {
            $this->myDiagrams = Diagram::myDiagrams()->take(10)->get();
        }

        return view('dashboard');
    }

}
