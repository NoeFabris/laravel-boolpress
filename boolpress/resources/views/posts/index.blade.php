@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                
                    <div class='d-flex flex-row-reverse'>
                        <a class='py-2' href="{{route('admin.index')}}"><button class='btn btn-primary'>Torna alla Home</button></a>
                        {{-- <a class='p-2' href="{{route('admin.posts.index')}}"><button class='btn btn-primary'>Torna all'Index</button></a> --}}
                    </div>
                
                </div>

                <div class="card-body">

                    @foreach($posts as $post)
                        <div>
                            <h1>{{ $post->title }}</h1>
                            <p>{{ $post->content }}</p>
                            <p>Pubblicato da: {{ $post->user_id }}</p>
                            <button><a href="{{ route('posts.show', ['slug' => $post->slug]) }}">Dettagli</a></button> 
                            {{-- <button><a href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a></button> --}}

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
