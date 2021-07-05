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
                    <form action="{{ route('admin.posts.update', $post->slug)}}" method="post">
                        @csrf
                        @method('PUT')
                    
                        <label class='px-2 m-0' for="title">Title</label>
                        <input class="form-control" type="text" name='title' id='title' value='{{ $post->title }}'>
                    
                        <label class='px-2 m-0' for="content">Post</label>
                        <textarea class="form-control" rows="5" cols="80" id="content" name='content'>{{ $post->content }}</textarea>

                        <label>Category</label>
                        <select name="category_id" class='form-control' id="">
                            <option value="">Choose a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <input class='btn btn-primary mt-2' type="submit" value='Invia Modifiche'>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
