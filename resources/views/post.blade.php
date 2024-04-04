<x-layout>
    <article>
        <h1>
            {{-- <?= $post->title; ?> --}}
            {{$post->title}}
        </h1>
        <p>By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{ $post->category->title}}</a></p>

        <div>
            {{-- <?= $post->body; ?> --}}
            {!! $post->body !!}

        </div>
    </article>
    <a href="/">Go Back</a>
</x-layout>

