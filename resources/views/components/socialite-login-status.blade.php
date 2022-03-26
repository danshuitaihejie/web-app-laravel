@if($hasSocialiteUser)
<div class="flex items-center space-x-4 lg:space-x-6">
    <img class="w-16 h-16 rounded-full lg:w-20 lg:h-20" src="{{$avatar}}" alt="">
    <div class="font-medium text-lg leading-6 space-y-1">
        <h3>{{$name}}</h3>
        <p class="text-indigo-600">{{__('Complete the following login information')}}</p>
    </div>
</div>
@endif
