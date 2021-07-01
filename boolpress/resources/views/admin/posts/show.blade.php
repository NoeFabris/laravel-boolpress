@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                
                    {{ __('Dashboard') }}
                    <button><a href="{{route('admin.index')}}">Torna alla Home</a></button>
                    <button><a href="{{route('admin.posts.index')}}">Torna all'Index</a></button>
                    <button><a href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a></button>
                    <button><a href="{{route('admin.posts.create')}}">Crea un post</a></button>
                
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>

                        <h1>{{ $post->title }}</h1>
                        <p>{{ $post->post }}</p>
                        <p>Pubblicato da: {{ $post->user }}</p>
                        <p>Ora pubblicazione: {{ $post->created_at }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
