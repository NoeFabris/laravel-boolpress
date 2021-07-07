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
                        <div class="form-group">
                        
                            <label class='px-2 m-0' for="title">Title</label>
                            <input class="form-control" type="text" name='title' id='title' value='{{ $post->title }}'>
                        
                        </div>
                        <div class="form-group">
                        
                            <label class='px-2 m-0' for="content">Post</label>
                            <textarea class="form-control" rows="5" cols="80" id="content" name='content'>{{ $post->content }}</textarea>
                        
                        </div>
                        <div class="form-group">
                        
                            <label>Category</label>
                            <select name="category_id" class='form-control' id="">
                                <option value="">Choose a Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        
                        </div>
                        <div class="form-group">
                        
                            <label>Tags</label><br>
                            
                            @foreach($tags as $tag) 
                                <div class="form-check form-check-inline">
                                    <label for="form-check-label">
                                        <input name='tags[]' type="checkbox" value='{{ $tag->id }}' {{$post->tags->contains($tag) ? 'checked' : ''}}>
                                        {{ $tag->name }}
                                    </label>
                                </div>
                            @endforeach
                        
                        </div>
                        {{-- <select name="tags[]" class='form-select' multiple height='5'>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>  --}}
                        <div class="form-group">

                            <input class='btn btn-primary mt-2' type="submit" value='Invia Modifiche'>
                        
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
