<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Scripts -->
    <link href="/css/nunito-fonts.css" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="antialiased bg-gray-100 overflow-x-hidden">
<x-welcome-header>
    <x-welcome-link-button class="mx-3 mt-1 font-bold text-gray-700 dark:text-gray-600"
                           href="{{ url('/') }}">Home
    </x-welcome-link-button>
    <x-welcome-link-button class="mx-3 mt-1" href="{{ url('/uml') }}">UML</x-welcome-link-button>
    <x-welcome-link-button class="mx-3 mt-1" href="{{ url('/market') }}">Market</x-welcome-link-button>
    <x-welcome-link-button class="mx-3 mt-1" href="{{ url('/app') }}">App</x-welcome-link-button>
</x-welcome-header>
<!-- Content -->
<x-welcome-row-cards>
    <x-slot name="rowTitle">Top</x-slot>
    <x-slot name="rowLink" href="{{ url('/top') }}"></x-slot>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
</x-welcome-row-cards>
<x-welcome-row-cards>
    <x-slot name="rowTitle">New</x-slot>
    <x-slot name="rowLink" href="{{ url('/new') }}"></x-slot>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
    <x-welcome-card >
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="forkUrl" href="{{ url('/fork?xxxx') }}"></x-slot>
    </x-welcome-card>
</x-welcome-row-cards>
<x-welcome-row-cards>
    <x-slot name="rowTitle">Collections</x-slot>
    <x-slot name="rowLink" href="{{ url('/collections') }}"></x-slot>
    <x-welcome-card>
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="collection">63</x-slot>
    </x-welcome-card>
    <x-welcome-card>
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="collection">63</x-slot>
    </x-welcome-card>
    <x-welcome-card>
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="collection">63</x-slot>
    </x-welcome-card>
    <x-welcome-card>
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="collection">63</x-slot>
    </x-welcome-card>
    <x-welcome-card>
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="collection">63</x-slot>
    </x-welcome-card>
    <x-welcome-card>
        <x-slot name="click">32k</x-slot>
        <x-slot name="vote">12m</x-slot>
        <x-slot name="collection">63</x-slot>
    </x-welcome-card>
</x-welcome-row-cards>
<x-welcome-row-tags>
    <x-slot name="rowTitle">Tags</x-slot>
    <x-welcome-card-tag>
        <x-slot name="tagTitle">#Backend</x-slot>
        12k
    </x-welcome-card-tag>
    <x-welcome-card-tag>
        <x-slot name="tagTitle">#Backend</x-slot>
        12k
    </x-welcome-card-tag>
    <x-welcome-card-tag>
        <x-slot name="tagTitle">#Backend</x-slot>
        12k
    </x-welcome-card-tag>
    <x-welcome-card-tag>
        <x-slot name="tagTitle">#Backend</x-slot>
        12k
    </x-welcome-card-tag>
    <x-welcome-card-tag>
        <x-slot name="tagTitle">#Backend</x-slot>
        12k
    </x-welcome-card-tag>
    <x-welcome-card-tag>
        <x-slot name="tagTitle">#Backend</x-slot>
        12k
    </x-welcome-card-tag>
    <x-welcome-card-tag>
        <x-slot name="tagTitle">#Backend</x-slot>
        12k
    </x-welcome-card-tag>
    <x-welcome-card-tag>
        <x-slot name="tagTitle">#Backend</x-slot>
        12k
    </x-welcome-card-tag>
</x-welcome-row-tags>
</body>
</html>
