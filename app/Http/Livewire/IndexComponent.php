<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use App\Models\Diagram;
use Livewire\Component;

class IndexComponent extends Component
{
    public function render()
    {
        $this->publicDiagrams = Diagram::publicDiagrams()->take(20)->get();
        return view('dashboard');
    }
}
