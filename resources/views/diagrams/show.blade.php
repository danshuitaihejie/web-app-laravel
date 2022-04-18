<x-app-layout>

@section('navigation_actions')
  <script>
    let isEdit = false;
    const getCode = () => {
        const app = document.getElementById('app');
        const vue = app && app.__vue__;
        return vue && vue.$store.state.code;
    };
    const toggleDisplay = (id, display) => {
        const e = document.querySelector(`#${id}`);
        if(e) {
            e.style.display = display;
        }
    };
    const show = (id) => toggleDisplay(id, '');
    const hide = (id) => toggleDisplay(id, 'none');

    function dispatch(action) {
        const app = document.getElementById('app');
        const vue = app && app.__vue__;
        vue && vue.$store.dispatch(action);
    }

    function edit() {
        dispatch('setEditMode');
        isEdit = true;
        hide('edit-button');
        show('publish-button');
        show('cancel-button');
    }

    async function publish() {
        const content = getCode();
        await fetch(`/diagrams/${window.diagramId}/content`, {method: 'POST', headers: {'Content-Type': 'application/json'}, body: JSON.stringify({content})});

        const blob = await document.querySelector('.frame').__vue__.toBlob();
        const file = new File([blob], 'diagram.png', {type: 'image/png'});
        const formData  = new FormData();
        formData.append('file', file);
        await fetch(`/diagrams/${window.diagramId}/image`, {method: 'POST', body: formData});

        window.persistedDiagramCode = content;
        view();
        hide('cancel-button');
    }

    function view() {
        dispatch('setViewMode');

        isEdit = false;
        hide('publish-button');
        show('edit-button');
    }

    function cancel() {
        window.resetDiagramCode();
        view();
        hide('cancel-button');
    }

  </script>

  <!-- Edit button -->
  <span id="edit-button" class="ml-3">
    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="edit()">
        <!-- Heroicon name: solid/pencil -->
        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
        </svg>
        Edit
    </button>
  </span>

  <!-- Cancel button -->
  <span id='cancel-button' class="ml-3" style="display: none">
    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="cancel()">
        Cancel
    </button>
  </span>

  <!-- Publish button -->
  @if (Auth::check())
  <span id='publish-button' class="sm:ml-3" style="display: none">
    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500" onclick='publish()'>
        <!-- Heroicon name: solid/check -->
        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
        Publish
    </button>
  </span>
  @endif
@endsection

<link href="/sequence-viewer/css/app.3631bc76.css" rel="preload" as="style">
<link href="/sequence-viewer/css/chunk-vendors.6a957a39.css" rel="preload" as="style">
<link href="/sequence-viewer/js/app.e79e9023.js" rel="preload" as="script">
<link href="/sequence-viewer/js/chunk-vendors.f8cb7947.js" rel="preload" as="script">
<link href="/sequence-viewer/css/chunk-vendors.6a957a39.css" rel="stylesheet">
<link href="/sequence-viewer/css/app.3631bc76.css" rel="stylesheet">

<div class="bg-white main-container">
  <div class="mt-6 mx-auto sm:px-6 lg:gap-x-8 lg:px-8">

    <div id="app"></div>

    <script src="/sequence-viewer/js/chunk-vendors.f8cb7947.js"></script>
    <script src="/sequence-viewer/js/app.e79e9023.js"></script>
    <script>
        window.persistedDiagramCode = `{!! $diagram->content !!}`;
        
        function setDiagramCode(vueCallback) {
          let app = document.getElementById('app');
          const vue = app.__vue__;
          if (vue) {
              vue.$store.commit('code', window.persistedDiagramCode);
              vueCallback && vueCallback(vue);
          }
        }

        function setTheme(theme) {
          const e = document.querySelector('.main-container');
          if(e) {
            const defaultClass = 'bg-white main-container';
            e.setAttribute('class', `${defaultClass} ${theme || ''}`);
          }
        }

        function onEdit() {
          const e = document.querySelector('.diagram-info');
          if(e) {
            e.style.display = 'none';
          }
        }

        function onView() {
          const e = document.querySelector('.diagram-info');
          if(e) {
            e.style.display = '';
          }
        }

        setDiagramCode(vue => {
          vue.$store.dispatch('registerEditModeListener', onEdit);
            vue.$store.dispatch('registerViewModeListener', onView);
        });

        window.diagramId = '{{ $diagram->id }}';
        window.resetDiagramCode = setDiagramCode;
    </script>

  </div>

  <div class="diagram-info max-w-2xl mx-auto pt-10 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
    <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
      <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">{{ $diagram->name }}</h1>
      <div>Created at {{ $diagram->created_at }} by {{ $diagram->author->name }}</div>
    </div>

    <!-- Options -->
    <div class="mt-4 lg:mt-0 lg:row-span-3">

      <form class="mt-10">
        <!-- Colors -->
        <div>
          <h3 class="text-sm text-gray-900 font-medium">Theme</h3>

          <fieldset class="mt-4">
            <legend class="sr-only">Choose a theme</legend>
            <div class="flex items-center space-x-3">

              <label class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-400">
                <input type="radio" name="color-choice" value="White" class="sr-only" aria-labelledby="color-choice-0-label" onclick="setTheme()">
                <p id="color-choice-0-label" class="sr-only">White</p>
                <span aria-hidden="true" class="h-8 w-8 bg-white border border-black border-opacity-10 rounded-full"></span>
              </label>

              <label class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-400">
                <input type="radio" name="color-choice" value="Blue" class="sr-only" aria-labelledby="color-choice-1-label" onclick="setTheme('blue-river')">
                <p id="color-choice-1-label" class="sr-only">Blue</p>
                <span aria-hidden="true" class="h-8 w-8 bg-gray-900 border border-black border-opacity-10 rounded-full"></span>
              </label>
            </div>
          </fieldset>
        </div>

      </form>
    </div>

    <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
      <div>
        <h3 class="sr-only">Description</h3>

        <div class="space-y-6">
          <p class="text-base text-gray-900">{{$diagram->description}}</p>
        </div>
      </div>

    </div>

  </div>

</div>
</x-app-layout>
