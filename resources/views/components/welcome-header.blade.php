<header>
    <div class="relative bg-white top-0 w-full lg:h-28 md:h-14 sm:h-14">
        <div class="container justify-center max-w-screen-lg m-auto">
            <div class="flex-col ">
                <div class="container justify-between flex items-center">
                    <div class="flex pt-2 pl-5 flex-nowrap items-center">
                        <img src="/image/Logo.png" width="60" height="60"/>
                        <x-welcome-link-button class="pl-3 font-bold text-2xl">{{ config('app.name', 'Laravel')}}
                        </x-welcome-link-button>
                    </div>
                    <x-jet-input class="w-1/3" type="text" placeholder="Search"></x-jet-input>
                    @if (Route::has('login'))
                    <div class="">
                        @auth
                        <x-welcome-link-button href="{{ url('/dashboard') }}">Dashboard</x-welcome-link-button>
                        @else
                        <x-welcome-link-button href="{{ route('login') }}" class="pr-4">Log in</x-welcome-link-button>

                        @if (Route::has('register'))
                        <x-welcome-link-button href="{{ route('register') }}">Register</x-welcome-link-button>
                        @endif
                        @endauth
                    </div>
                    @endif
                </div>
                <div class="flex justify-center items-center">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</header>
