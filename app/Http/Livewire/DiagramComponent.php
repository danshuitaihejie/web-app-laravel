<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use App\Models\Diagram;
use Livewire\Component;

class DiagramComponent extends Component
{
    public $diagrams, $diagramId, $name,
        $description,
        $content, $author_id,
        $image, $public,
        $created_at, $updated_at;
    public $isModalOpen = 0;

    public function render()
    {
        $this->diagrams = Diagram::all();
        return view('livewire.diagram');
    }

    public function show($id)
    {
        return view('diagrams.show', ['diagram' => Diagram::findOrFail($id)]);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm()
    {
        $this->diagramId = '';
        $this->name = '';
        $this->description = '';
        $this->content = '';
        $this->author_id = auth()->user()->name ?? null;
        $this->image = '';
        $this->public = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'content' => 'required|min:3',
        ]);

        Diagram::updateOrCreate(['id' => $this->diagramId], [
            'name' => $this->name,
            'description' => $this->description,
            'content' => $this->content,
            'author_id' => $this->author_id,
            'image' => '$this->image',
            'public' => true,
        ]);

        session()->flash('message', 'Diagram created successfully.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function updateContent(Request $request, $id) 
    {
        $content = $request->input('content');
        $diagram = Diagram::findOrFail($id);
        $diagram->content = $content;
        $diagram->save();
    }

    public function edit($id)
    {
        $diagram = Diagram::findOrFail($id);
        $this->diagramId = $id;
        $this->name = $diagram->name;
        $this->description = $diagram->description;
        $this->content = $diagram->content;
        $this->author_id = auth()->user()->name ?? null;
        $this->image = $diagram->image;
        $this->public = $diagram->public;

        $this->openModalPopover();
    }

    // delete
    public function delete($id)
    {
        Diagram::find($id)->delete();
        session()->flash('message', 'Diagram deleted successfully.');
    }

}
