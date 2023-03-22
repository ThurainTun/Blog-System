<x-layout>
    @foreach ($blogs as $blog)
    <x-slot name="title">
        <title>All Blogs</title>
    </x-slot>
        <a href="blogs/{{ $blog->slug }}">
            <h1>{{ $blog->title }} </h1>
        </a>
        <div>
            <p>
                published at -
                {{ $blog->date }}
            </p>
            <p>
                {{ $blog->intro }}
            </p>
        </div>
    @endforeach
</x-layout>
