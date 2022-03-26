<x-app-layout>

<link href="/sequence-viewer/css/app.601d2ada.css" rel="preload" as="style">
<link href="/sequence-viewer/css/chunk-vendors.d27486a6.css" rel="preload" as="style">
<link href="/sequence-viewer/js/app.492b16ef.js" rel="preload" as="script">
<link href="/sequence-viewer/js/chunk-vendors.a8db43b4.js" rel="preload" as="script">
<link href="/sequence-viewer/css/chunk-vendors.d27486a6.css" rel="stylesheet">
<link href="/sequence-viewer/css/app.601d2ada.css" rel="stylesheet">

<div class="bg-white">
  <main class="pt-10 sm:pt-16">

    <div class="mt-6 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:gap-x-8 lg:px-8">

      <div id="app"></div>

      <script src="/sequence-viewer/js/chunk-vendors.a8db43b4.js"></script>
      <script src="/sequence-viewer/js/app.492b16ef.js"></script>
      <script>
          let app = document.getElementById('app');
          if (app.__vue__) {
              app.__vue__.$store.commit('code',`{{!! $diagram->content !!}}`)
          }
      </script>

    </div>

    <div class="max-w-2xl mx-auto pt-10 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
      <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
        <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">{{ $diagram->name }}</h1>
        <div>Created at {{ $diagram->created_at }} by {{ $diagram->author_id }}</div>
      </div>

      <!-- Options -->
      <div class="mt-4 lg:mt-0 lg:row-span-3">

        <form class="mt-10">
          <!-- Colors -->
          <div>
            <h3 class="text-sm text-gray-900 font-medium">Theme</h3>

            <fieldset class="mt-4">
              <legend class="sr-only">Choose a color</legend>
              <div class="flex items-center space-x-3">

                <label class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-400">
                  <input type="radio" name="color-choice" value="White" class="sr-only" aria-labelledby="color-choice-0-label">
                  <p id="color-choice-0-label" class="sr-only">White</p>
                  <span aria-hidden="true" class="h-8 w-8 bg-white border border-black border-opacity-10 rounded-full"></span>
                </label>

                <label class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-400">
                  <input type="radio" name="color-choice" value="Gray" class="sr-only" aria-labelledby="color-choice-1-label">
                  <p id="color-choice-1-label" class="sr-only">Gray</p>
                  <span aria-hidden="true" class="h-8 w-8 bg-gray-200 border border-black border-opacity-10 rounded-full"></span>
                </label>

                <label class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-900">
                  <input type="radio" name="color-choice" value="Black" class="sr-only" aria-labelledby="color-choice-2-label">
                  <p id="color-choice-2-label" class="sr-only">Black</p>
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

  </main>

</div>
</x-app-layout>
