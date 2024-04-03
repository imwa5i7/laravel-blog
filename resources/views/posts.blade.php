<x-layout>
        {{-- <?php foreach ($posts as $post) : ?> --}}
        @foreach ($posts as $post)
        <article class="{{$loop->even? 'mb-6':''}}">
            <h1>
                <a href="/posts/{{ $post->slug}}">
                    {{$post->title}}</a>
            </h1>

            <p><a href="/categories/{{$post->category->slug}}">{{ $post->category->title}}</a></p>

            <div>
                {{-- <?= $post->excerpt ?> --}}
                {{$post->excerpt}}
            </div>

        </article>
        {{-- <?php endforeach;?> --}}
        @endforeach

</x-layout>

