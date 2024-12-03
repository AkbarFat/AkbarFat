@props(['active' => false])

<a class="{{$active ? 'bg-indigo-500': 'text-indigo-50'}} whitespace-nowrap mb-2 rounded-full border border-pink-500 px-2 py-0.5 text-pink-500 hover:bg-indigo-500 hover:text-indigo-50"
    aria-current="{{ $active ? 'page': 'false'}}"
    {{$attributes}}
>{{$slot}}</a>
