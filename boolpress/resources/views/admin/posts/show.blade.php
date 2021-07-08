@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                
                    {{-- {{ __('Dashboard') }} --}}
                    <div class='d-flex flex-row-reverse'>
                        <a class='px-2' href="{{route('admin.posts.index')}}"><button class='btn btn-primary'>Torna Indietro</button></a>
                        <a class='px-2' href="{{route('admin.index')}}"><button class='btn btn-primary'>Torna alla Home</button></a>
                        <a class='px-2' href="{{route('admin.posts.create')}}"><button class='btn btn-primary'>Crea un post</button></a>
                    </div>
                
                </div>

                <div class="card-body">

                    <div>
                        
                            @if(isset($post->cover_url))
                                <img src="{{ asset('storage/ . $post->cover_url') }}" alt="">
                            @endif
                        <h1>{{ $post->title }}</h1>
                        <p>{{ $post->content }}</p>
                            @if(!isset($post->category))
                                <em>Nessuna categoria disponibile...</em>
                            @else 
                                <p>Categoria : {{ $post->category->name }}</p>
                            @endif
                        <p>Tags:
                            @if(count($post->tags) > 0)
                                @foreach($post->tags as $tag)
                                    <span class="badge badge-primary">{{ $tag->name }}</span>
                                @endforeach
                            @else
                                <em>Nessun tag disponibile...</em>
                            @endif
                        </p>
                        <p>Pubblicato da: {{ $user->name }}</p> 
                        <p>Ora pubblicazione: {{ $post->created_at }}</p>

                    </div>
                    <a class='py-2' href="{{ route('admin.posts.edit', $post->slug) }}"><button class='btn btn-primary'>Modifica</button></a>
                    <form class="d-inline-block" action="{{ route('admin.posts.destroy', $post->slug) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 