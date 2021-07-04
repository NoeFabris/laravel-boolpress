@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                
                    {{-- {{ __('Dashboard') }} --}}
                    <div class='d-flex flex-row-reverse'>
                        <a class='py-2' href="{{route('admin.index')}}"><button class='btn btn-primary'>Torna alla Home</button></a>
                        {{-- <a class='p-2' href="{{route('admin.posts.index')}}"><button class='btn btn-primary'>Torna all'Index</button></a> --}}
                        <a class='py-2' href="{{ route('admin.posts.edit', $post->slug) }}"><button class='btn btn-primary'>Modifica</button></a>
                        <a class='py-2' href="{{route('admin.posts.create')}}"><button class='btn btn-primary'>Crea un post</button></a>
                    </div>
                
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>

                        <h1>{{ $post->title }}</h1>
                        <p>{{ $post->content }}</p>
                        <p>Pubblicato da: {{ $post->user_id }}</p>
                        <p>Ora pubblicazione: {{ $post->created_at }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
