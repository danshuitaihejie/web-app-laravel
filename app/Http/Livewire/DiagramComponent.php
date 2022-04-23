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
        $this->diagrams = Diagram::myDiagrams()->get();
        return view('livewire.diagram');
    }

    public function show($id)
    {
        return view('diagrams.show', ['diagram' => Diagram::findOrFail($id)]);
    }

    public function new()
    {
        $diagram = new Diagram;
        $diagram->diagramId = '';
        $diagram->name = '';
        $diagram->description = '';
        $diagram->content = '';
        $diagram->author_id = auth()->user()->id;
        $diagram->image = '';
        $diagram->public = '';
        return view('diagrams.show', ['diagram' => $diagram]);
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
        $this->author_id = auth()->user()->id;
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
        $name = $request->input('name');
        $description = $request->input('description');

        $diagram = Diagram::findOrFail($id);

        $this->checkDiagram($diagram);

        $diagram->content = $content;
        $diagram->name = $name;
        $diagram->description = $description;

        $diagram->touch();
        $diagram->save();
    }

    public function updateImage(Request $request, $id) 
    {
        $file = $request->file;
        $path = $file->storeAs($this->imageStoragePath(), $id . '.png'); //TODO: error handling

        $diagram = Diagram::findOrFail($id);
        $this->checkDiagram($diagram);
        $diagram->image = $path;
        $diagram->touch();
        $diagram->save();
    }


    public function createNew(Request $request) 
    {
        $content = $request->input('content');
        $name = $request->input('name');
        $description = $request->input('description');

        $diagram = new Diagram;
        $diagram->name = $name;
        $diagram->description = $description;
        $diagram->content = $content;
        $diagram->author_id = auth()->user()->id;
        $diagram->image = '';
        $diagram->public = '';
        $diagram->save();

        $file = $request->file;
        $path = $file->storeAs($this->imageStoragePath(), $diagram->id . '.png'); //TODO: error handling
        $diagram->image = $path;
        $diagram->touch();
        $diagram->save();
    }

    public function edit($id)
    {
        $diagram = Diagram::findOrFail($id);
        $this->checkDiagram($diagram);

        $this->diagramId = $id;
        $this->name = $diagram->name;
        $this->description = $diagram->description;
        $this->content = $diagram->content;
        $this->author_id = auth()->user()->id;
        $this->image = $diagram->image;
        $this->public = $diagram->public;
        $this->openModalPopover();
    }

    public function delete($id)
    {
        Diagram::find($id)->delete();
        session()->flash('message', 'Diagram deleted successfully.');
    }

    private function checkDiagram($diagram)
    {
        if($diagram->author_id != auth()->user()->id) {
            throw new \ErrorException('Unauthorised diagram');
        }
    }

    private function imageStoragePath()
    {
        return 'public/diagrams/' . auth()->user()->id;
    }

}
