<x-layout>
    <x-slot name="title">
        <title>{{$blog->title}}</title>
    </x-slot>
    
    <title>{{ $blog->title }}</title>

    <h1>
        {{ $blog->title }}
    </h1>
    <p>{{ $blog->body }}</p>
    <a href="/">back</a>

</x-layout>
