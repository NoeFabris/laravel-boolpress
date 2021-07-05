@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                
                    {{-- {{ __('Dashboard') }} --}}
                    <div class='d-flex flex-row-reverse'>
                        <a class='px-2' href="{{route('admin.index')}}"><button class='btn btn-primary'>Torna alla Home</button></a>
                        <a class='px-2' href="{{route('admin.posts.create')}}"><button class='btn btn-primary'>Crea un post</button></a>
                        {{-- <a class='p-2' href="{{route('admin.posts.index')}}"><button class='btn btn-primary'>Torna all'Index</button></a> --}}
                    </div>
                
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __("Benvenuto nell'index") }} --}}
                    @foreach($posts as $post)
                        <div>

                            <h1>{{ $post->title }}</h1>
                            <p>{{ $post->content }}</p>
                            <p>Categoria : {{ $post->category->name }}</p>
                            <p>Pubblicato da: {{ $post->user->name }}</p>
                            <a href="{{ route('admin.posts.show', $post->slug) }}"><button class='btn btn-info'>Dettagli</button></a>
                            <a class='px-2' href="{{ route('admin.posts.edit', $post->slug) }}"><button class='btn btn-info'>Modifica</button></a>
                            <form class="d-inline-block" action="{{ route('admin.posts.destroy', $post->slug) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </form>
                            
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
