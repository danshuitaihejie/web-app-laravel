<x-app-layout>

    <div class="container mx-auto">
        <div class="grid grid-cols-4 gap-10 h-20 my-6 ">
            <x-jet-button class="items-center">+ New Diagram</x-jet-button>
            <x-jet-button class="items-center">+ Import a Diagram</x-jet-button>
            <x-jet-button class="items-center">+ Invite People!</x-jet-button>
        </div>

    </div>

    <div class="bg-white">
        <div class="container mx-auto">
            <div class="container pt-5 mx-auto ">
                <x-jet-label class="text-lg">Explore:</x-jet-label>
            </div>
            <div class="flex flex-row flex-nowrap overflow-x-auto  flex-start gap-8 pt-5 pb-10">

                <x-dashboard-explore-card></x-dashboard-explore-card>
                <x-dashboard-explore-card></x-dashboard-explore-card>
                <x-dashboard-explore-card></x-dashboard-explore-card>
                <x-dashboard-explore-card></x-dashboard-explore-card>
                <x-dashboard-explore-card></x-dashboard-explore-card>
                <x-dashboard-explore-card></x-dashboard-explore-card>
                <x-dashboard-explore-card></x-dashboard-explore-card>
                <x-dashboard-explore-card></x-dashboard-explore-card>
                <x-dashboard-explore-card></x-dashboard-explore-card>
                <x-dashboard-explore-card></x-dashboard-explore-card>
                <x-dashboard-explore-card></x-dashboard-explore-card>
                <x-dashboard-explore-card></x-dashboard-explore-card>
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

</x-app-layout>
