<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Diagram') }}
        </h2>
    </x-slot>
    
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <span>{{ $diagram->name }}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description</strong>
                    <span>{{ $diagram->description }}</span>
                </div>
            </div>
          </div>
          <div class="row">
            <a class="btn btn-primary" href="/diagrams" title="Go back"> Go back </a>
          </div>
        </div>
    </div>
</x-app-layout>
