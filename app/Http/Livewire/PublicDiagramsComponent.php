<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use App\Models\Diagram;
use Livewire\Component;

class PublicDiagramsComponent extends Component
{
    public $diagrams;
    public $isModalOpen = 0;
    public $isMyDiagramOnly = 0;

    public function render()
    {
        $this->diagrams = Diagram::publicDiagrams()->get();
        return view('livewire.diagram');
    }

}
