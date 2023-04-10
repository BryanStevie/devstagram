<div>
    @if ( $posts->count() )
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    {{-- NO IMPORTA EL ORDER DEL ENDPOINT SI ESTA NOMBRADO --}}
                    <a href="{{ route('posts.show',['post'=>$post, 'user'=>$post->user]) }}">
                        <img src="{{asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post {{$post->titulo}}"/>
                    </a>
                </div>
            @endforeach
        </div>
        <div>
            {{$posts->links()}}
        </div>
    @else
        <p class="text-center">No Hay Post, sigue a alquien para poder mostrar sus posts</p>
    @endif


    {{--
    esta directiva es igual que un if con foreach
    @forelse ( $posts as $post )
        <h1>{{ $post->titulo }}</h1>
    @empty
        <p>No hay post</p>
    @endforelse
    --}}
</div>