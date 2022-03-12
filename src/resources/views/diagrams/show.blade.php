<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Diagram') }}
        </h2>
        
    <link href="/sequence-viewer/css/app.601d2ada.css" rel="preload" as="style">
    <link href="/sequence-viewer/css/chunk-vendors.d27486a6.css" rel="preload" as="style">
    <link href="/sequence-viewer/js/app.96bc52c6.js" rel="preload" as="script">
    <link href="/sequence-viewer/js/chunk-vendors.a42931a3.js" rel="preload" as="script">
    <link href="/sequence-viewer/css/chunk-vendors.d27486a6.css" rel="stylesheet">
    <link href="/sequence-viewer/css/app.601d2ada.css" rel="stylesheet">
        
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

    <div id="app"></div>

    <script src="/sequence-viewer/js/chunk-vendors.a42931a3.js"></script>
    <script src="/sequence-viewer/js/app.96bc52c6.js"></script>
    <script>
        let app = document.getElementById('app');
        if (app.__vue__) {
            app.__vue__.$store.commit('code',`{{ $diagram->content }}`)
        }
    </script>
</x-app-layout>
