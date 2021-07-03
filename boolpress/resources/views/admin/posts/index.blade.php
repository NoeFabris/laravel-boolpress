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
                            <p>{{ $post->post }}</p>
                            <p>Pubblicato da: {{ $post->user }}</p>
                            <button><a href="{{ route('admin.posts.show', $post->id) }}"></a>Dettagli</button>
                            <button><a href="{{ route('admin.posts.edit', $post->id) }}"></a>Modifica</button>
                            
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
