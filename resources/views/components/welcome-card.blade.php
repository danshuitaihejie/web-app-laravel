<div class="flex flex-col rounded-lg shadow-lg overflow-hidden min-w-fit bg-white">
    <div class="flex-shrink-0">
        <img class="h-32 w-64 object-cover" src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80" alt="">
    </div>
    <div class="flex-1 py-3 px-3 flex flex-col justify-between flex-wrap max-w-auto">
        <div class=" flex items-center">
            <div class="flex-shrink-0">
                <a href="#">
                    <span class="sr-only">$diagram->author->name</span>
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </a>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">
                    <a href="#" class="no-underline">$diagram->name</a>
                </p>
                <div class="flex space-x-1 text-sm text-gray-500">
                    <label >$diagram->description</label>
                </div>
            </div>
        </div>
        <hr class="mt-3 mb-2"/>
        <div class=" flex items-center justify-around">
            <label class="text-xs">{{$click}} Clicks</label>
            <label class="text-xs">{{$vote}} Votes</label>
            @if (isset($collection))
                <label class="text-xs">{{$collection}} Diagrams</label>
            @else
                <a {{ $forkUrl->attributes->merge(['href' => '',
                'class' => 'flex justify-center py-0.5 px-3 border border-transparent rounded-md shadow-sm text-xs font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) }}>Fork</a>
            @endif
        </div>
    </div>
</div>
