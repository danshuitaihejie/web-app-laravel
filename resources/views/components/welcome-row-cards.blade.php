

<div {{ $attributes->merge(['class'=>'container  mx-auto my-10  w-full'])}}>
    <div class="flex justify-between mx-5">
        <h1 {{ $rowTitle->attributes->class(['font-semibold']) }} >{{$rowTitle}}</h1>
        <a {{ $rowLink->attributes->merge(['href' => '',
            'class' => 'no-underline text-sm font-normal text-gray-800 dark:text-gray-500']) }}>See All >></a>
    </div>
    <div class="flex flex-row  overflow-x-scroll flex-start gap-8 pt-5 pb-10 w-fill max-w-full">
        {{$slot}}
    </div>
</div>

