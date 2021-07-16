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
                
{{-- 
                <div v-for='i in 10' :key='i'>
                    <span v-text='"testo di Vue" + i'></span>
                </div> --}}

                <post-card>

                </post-card>

                <div class="card-body">

                    @foreach($posts as $post)
                        <div>
                            <h1>{{ $post->title }}</h1>
                            <p>{{ $post->content }}</p>
                            <p>Pubblicato da: {{ $post->user->name }}</p>
                            <a href="{{ route('posts.show', $post->slug) }}"><button class='btn btn-info'>Dettagli</button></a>

                        </div>
                    @endforeach

                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
