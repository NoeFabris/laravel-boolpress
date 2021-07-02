@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                
                    <button><a href="{{route('index')}}">Torna alla Home</a></button>
                
                </div>

                <div class="card-body">

                    @foreach($posts as $post)
                        <div>
                            <h1>{{ $post->title }}</h1>
                            <p>{{ $post->post }}</p>
                            <p>Pubblicato da: {{ $post->user }}</p>
                            {{-- <button><a href="{{ route('posts.show', $post->id) }}">Dettagli</a></button> --}}
                            {{-- <button><a href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a></button> --}}
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
