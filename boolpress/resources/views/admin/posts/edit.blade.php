@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    {{ __('Dashboard') }}
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

                    {{ __("Pubblica Un Post") }}
                    <form action="{{ route('admin.posts.update', $post->id)}}" method="post">
                        @csrf
                        @method('PUT')
                    
                        <label for="title">Title</label>
                        <input type="text" name='title' id='title' value='{{ $post->title }}'>
                    
                        <label for="post">Post</label>
                        <input type="text" name='post' id='post' value='{{ $post->content }}'>

                        <label for="user">User</label>
                        <input type="text" name='user' id='user' value='{{ Auth::user()->name }}' readonly>

                        <input type="submit" value='Invia Modifiche'>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
