<x-app-layout>

<link href="/sequence-viewer/css/app.3631bc76.css" rel="preload" as="style">
<link href="/sequence-viewer/css/chunk-vendors.2fc1308b.css" rel="preload" as="style">
<link href="/sequence-viewer/js/app.e5cbeb74.js" rel="preload" as="script">
<link href="/sequence-viewer/js/chunk-vendors.e8dcf893.js" rel="preload" as="script">
<link href="/sequence-viewer/css/chunk-vendors.2fc1308b.css" rel="stylesheet">
<link href="/sequence-viewer/css/app.3631bc76.css" rel="stylesheet">

<div class="bg-white main-container">
  <div class="mt-6 mx-auto sm:px-6 lg:gap-x-8 lg:px-8">

    <div id="app"></div>

    <script src="/sequence-viewer/js/chunk-vendors.e8dcf893.js"></script>
    <script src="/sequence-viewer/js/app.e5cbeb74.js"></script>
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
