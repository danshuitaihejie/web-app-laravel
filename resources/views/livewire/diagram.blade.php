<div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                     role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                @if($isModalOpen)
                @include('livewire.create')
                @endif
                <table class="table-fixed w-full">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Last Modified at</th>
                        <th class="px-4 py-2">Created at</th>
                        @if($isMyDiagramOnly)
                        <th class="px-4 py-2">Action</th>
                        @else
                        <th class="px-4 py-2">Author</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($diagrams as $diagram)
                    <tr>
                        <td class="border px-4 py-2">{{ $diagram->id }}</td>
                        <td class="border px-4 py-2">
                            <a href="/diagrams/{{ $diagram->id }}">{{ $diagram->name }}</a>
                        </td>
                        <td class="border px-4 py-2">{{ $diagram->description }}</td>
                        <td class="border px-4 py-2">{{ $diagram->updated_at }}</td>
                        <td class="border px-4 py-2">{{ $diagram->created_at }}</td>
                        
                        <td class="border px-4 py-2">
                        @if($isMyDiagramOnly)
                            <button wire:click="edit({{ $diagram->id }})"
                                    class="px-4 py-2 bg-gray-500 text-gray-900 cursor-pointer">Edit</button>
                            <button wire:click="delete({{ $diagram->id }})"
                                    class="px-4 py-2 bg-red-100 text-gray-900 cursor-pointer">Delete</button>
                        @else
                            {{ $diagram->author->name}}
                        @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
