
<div class="bg-white">
    <div class="container mx-auto">
        <div class="flex pt-5 mx-auto justify-between items-center">
            <x-jet-label class="text-lg font-semibold">
                <a href="/public-diagrams">Explore</a>
            </x-jet-label>
            <x-jet-label class="text-sm font-semibold">
                <a href="/public-diagrams">See All >></a>
            </x-jet-label>
        </div>
        <div class="@auth flex flex-row flex-nowrap overflow-x-auto flex-start gap-8 pt-5 pb-10 @else grid grid-cols-4 gap-8 py-5 @endif ">
            @foreach($publicDiagrams as $diagram)
            <x-dashboard-explore-card :diagram="$diagram"></x-dashboard-explore-card>
            @endforeach
        </div>
    </div>
</div>

@auth
<div class="">
    <div class="container py-1 mx-auto">
        <div class="flex py-1 mx-auto pt-5 justify-between items-center">
            <x-jet-label class="text-lg font-semibold">
                <a href="/diagrams">My Diagrams</a>
            </x-jet-label>
            <x-jet-label class="text-sm font-semibold">
                <a href="/diagrams">See All >></a>
            </x-jet-label>
            <div class="flex justify-end items-center hidden">
                <x-jet-label class="font-semibold">Search:</x-jet-label>
                <x-jet-input class="ml-2 mr-5" type="text" placeholder="Search"></x-jet-input>

                <select id="sort" name="sort"
                        class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option selected>Most recent</option>
                    <option>Newest first</option>
                    <option>Oldest first</option>
                    <option>Name A to Z</option>
                    <option>Name Z to A</option>
                </select>

            </div>
        </div>
        <div class="grid grid-cols-4 gap-8 py-5">
            @foreach($myDiagrams as $diagram)
            <x-dashboard-explore-card :diagram="$diagram"></x-dashboard-explore-card>
            @endforeach
        </div>
    </div>
</div>
@endif