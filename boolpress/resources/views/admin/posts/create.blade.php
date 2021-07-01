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

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __("Pubblica Un Post") }}
                    <form action="{{ route('admin.posts.store')}}" method="post">
                        @csrf
                    
                        <label for="title">Title</label>
                        <input type="text" name='title' id='title'>
                    
                        <label for="post">Post</label>
                        <input type="text" name='post' id='post'>

                        <label for="user">User</label>
                        <input type="text" name='user' id='user' value='{{ Auth::user()->name }}' readonly>

                        <input type="submit" value='Invia'>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
