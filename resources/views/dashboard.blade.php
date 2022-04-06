
    <div class="container mx-auto">
        <div class="grid grid-flow-col gap-10 h-15 my-6 ">
            <x-dashboard-button>+ New Diagram</x-dashboard-button>
            <x-dashboard-button>+ Import a Diagram</x-dashboard-button>
            <x-dashboard-button class="text-center">+ Invite People!</x-dashboard-button>
        </div>

    </div>

    <div class="bg-white">
        <div class="container mx-auto">
            <div class="container pt-5 mx-auto ">
                <x-jet-label class="text-lg">Explore:</x-jet-label>
            </div>
            <div class="flex flex-row flex-nowrap overflow-x-auto  flex-start gap-8 pt-5 pb-10">
                @foreach($diagrams as $diagram)
                <x-dashboard-explore-card :diagram="$diagram"></x-dashboard-explore-card>
                @endforeach
            </div>
        </div>
    </div>

    <div class="">
        <div class="container py-1 mx-auto">
            <div class="container py-1 mx-auto pt-5">
                <x-jet-label class="text-lg">My Diagrams:</x-jet-label>
            </div>
            <div class="grid grid-cols-4 gap-8 py-5">
                <x-dashboard-my-card></x-dashboard-my-card>
                <x-dashboard-my-card></x-dashboard-my-card>
                <x-dashboard-my-card></x-dashboard-my-card>
                <x-dashboard-my-card></x-dashboard-my-card>
                <x-dashboard-my-card></x-dashboard-my-card>
                <x-dashboard-my-card></x-dashboard-my-card>
                <x-dashboard-my-card></x-dashboard-my-card>
                <x-dashboard-my-card></x-dashboard-my-card>
                <x-dashboard-my-card></x-dashboard-my-card>
                <x-dashboard-my-card></x-dashboard-my-card>
            </div>
        </div>
    </div>
