@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    {{-- <div class='d-flex flex-row'>
                        {{ __('Dashboard') }} 
                    </div> --}}
                    <div class='d-flex flex-row-reverse'>
                        <a class='px-2' href="{{route('admin.index')}}"><button class='btn btn-primary'>Torna alla Home</button></a>
                        {{-- <a class='p-2' href="{{route('admin.posts.index')}}"><button class='btn btn-primary'>Torna all'Index</button></a> --}}
                    </div>

                </div>

                <div class="card-body">

                    {{ __("Pubblica Un Post") }}
                    <form action="{{ route('admin.posts.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                        
                            <label class='py-2 m-0' for="title">Title</label>
                            <input type="text" name='title' id='title' class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                            <div class='invalid-feedback'>{{ $message }}</div>
                            @enderror
                        
                        </div>
                        <div class="form-group">
                        
                            <label class='py-2 m-0' for="content">Post</label>
                            <textarea rows="5" cols="80" id="content" name='content' class="form-control @error('title') is-invalid @enderror"></textarea>
                            @error('content')
                            <div class='invalid-feedback'>{{ $message }}</div>
                            @enderror
                        
                        </div>
                        <div class="form-group">
                        
                            <label>Category</label>
                            <select name="category_id" class='form-control' id="">
                                <option value="">Choose a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        
                        </div>

                        <div class="form-group">
                        
                            <label>Tags</label><br>
                            
                            @foreach($tags as $tag) 
                                <div class="form-check form-check-inline">
                                    <label for="form-check-label">
                                        <input name='tags[]' type="checkbox" value='{{ $tag->id }}'>
                                        {{ $tag->name }}
                                    </label>
                                </div>
                            @endforeach
                        
                        </div>
                        <div class="form-group">
                        
                            <input class='btn btn-primary mt-2' type="submit" value='Publish'>
                        
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
