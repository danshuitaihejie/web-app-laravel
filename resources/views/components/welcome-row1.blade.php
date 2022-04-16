

<div {{ $attributes->merge(['class'=>'container mx-auto my-10'])}}>
    <div class="flex justify-between">
       <h1 {{ $rowTitle->attributes->class(['font-semibold']) }} >{{$rowTitle}}</h1>
       <a {{ $rowLink->attributes->merge(['href' => '',
           'class' => 'no-underline text-sm font-normal text-gray-800 dark:text-gray-500']) }}>See All >></a>
    </div>
    <div class="flex flex-row flex-nowrap overflow-x-auto  flex-start gap-8 pt-5 pb-10">
        {{$slot}}
    </div>


</div>

