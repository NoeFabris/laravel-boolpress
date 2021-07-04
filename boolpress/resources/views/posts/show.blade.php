@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                
                    {{-- {{ __('Dashboard') }} --}}
                    <div class='d-flex flex-row-reverse'>
                        <a class='py-2' href="{{route('index')}}"><button class='btn btn-primary'>Torna alla Home</button></a>
                    </div>
                
                </div>

                <div class="card-body">

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
