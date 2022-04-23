<div {{ $attributes->merge(['class'=>'container mx-auto my-10 rounded-xl bg-white'])}}>

    <div class="flex justify-between mx-5 pt-5">
        <h1 {{ $rowTitle->attributes->class(['font-semibold']) }} >{{$rowTitle}}</h1>
    </div>
    <div class="grid grid-flow-row lg:grid-cols-8 sm:grid-cols-4 gap-8 px-4 max-w-full">
        {{$slot}}
    </div>
</div>

