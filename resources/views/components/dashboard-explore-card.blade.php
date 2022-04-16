<div class="flex flex-col rounded-lg shadow-lg overflow-hidden min-w-fit">
    <div class="flex-shrink-0">
        <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80" alt="">
    </div>
    <div class="flex-1 bg-white p-6 flex flex-col justify-between flex-wrap max-w-fit">
        <div class="flex-1">
            <a href="/diagrams/{{ $diagram->id }}" class="block mt-2">
                <p class="text-xl font-semibold text-gray-900">{{ $diagram->name }}</p>
                <p class="mt-3 text-base text-gray-500">{{ $diagram->description }}</p>
            </a>
        </div>
        <div class="mt-6 flex items-center">
            <div class="flex-shrink-0">
                <a href="#">
                    <span class="sr-only">{{ $diagram->author->name }}</span>
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </a>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">
                    <a href="#" class="hover:underline"> {{ $diagram->author->name }} </a>
                </p>
                <div class="flex space-x-1 text-sm text-gray-500">
                    <time datetime="2020-03-16"> {{ $diagram->created_at }} </time>
                </div>
            </div>
        </div>
    </div>
</div>
