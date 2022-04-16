<div {{ $attributes->merge(['class'=>'container mx-auto my-10 rounded-lg min-w-fit px-5 py-2'])}} style="box-shadow: 0 0 3px 1px rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0.5 0.5 0.5 / 0.1);">
    <div>
        <x-welcome-link-button class="font-semibold text-sm" href="{{url(substr_replace('/tags?/', strtolower($tagTitle), -1, 1))}}">{{$tagTitle}}</x-welcome-link-button>
    </div>

    <label class="text-xs" >{{$slot}} Diagrams</label>
</div>
