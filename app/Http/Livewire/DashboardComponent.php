<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use App\Models\Diagram;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        $this->publicDiagrams = Diagram::where('public', 1)->take(5)->get();

        $this->myDiagrams = Diagram::where('author_id', auth()->user()->name ?? null)->take(10)->get();
        
        return view('dashboard');
    }

}
