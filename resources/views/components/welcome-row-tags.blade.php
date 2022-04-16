<div {{ $attributes->merge(['class'=>'container mx-auto my-10 rounded-xl bg-white'])}}>

    <div class="flex justify-between mx-5 pt-5">
        <h1 {{ $rowTitle->attributes->class(['font-semibold']) }} >{{$rowTitle}}</h1>
    </div>
    <div class="flex flex-row flex-nowrap overflow-x-auto gap-8 justify-start px-4 ">
        {{$slot}}
    </div>


</div>

