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
                        <a class='px-2' href="{{route('admin.posts.create')}}"><button class='btn btn-primary'>Crea un post</button></a>
                        {{-- <a class='p-2' href="{{route('admin.posts.index')}}"><button class='btn btn-primary'>Torna all'Index</button></a> --}}
                    </div>
                
                </div>

                <div class="card-body">


                    @foreach($posts as $post)
                        <div class='mt-3'>

                            @if(isset($post->cover_url))
                                <img src="{{ asset('storage/ . $post->cover_url') }}" alt="">
                            @endif
                            <h1>Titolo: {{ $post->title }}</h1>
                            <p>Id: {{ $post->id }}</p>
                            {{-- <p>Contenuto: {{ $post->content }}</p> --}}
                            @if(isset($post->category))
                                <p>Categoria : {{ $post->category->name }}</p>
                            @else 
                                <p><em>Nessuna categoria disponibile...</em></p>
                            @endif
                            <p>Pubblicato da: {{ $post->user->name }}</p>
                            <p>Data Pubblicazione: {{ $post->createdAt }}</p>
                            <a class='btn btn-info' href="{{ route('admin.posts.show', $post->slug) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            </a>
                            <a class='btn btn-info' class='px-2' href="{{ route('admin.posts.edit', $post->slug) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon><line x1="3" y1="22" x2="21" y2="22"></line></svg>
                            </a>
                            <form class="d-inline-block" action="{{ route('admin.posts.destroy', $post->slug) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </form>
                            
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

                    {{-- <table class='table'>

                        <thead>
                        
                            <tr>
                            
                                <th>ID</th>
                                <th>Titolo</th>
                                <th>Slug</th>
                                <th>Categoria</th>
                                <th>Utente</th>
                                <th>Data Creazione</th>
                                <th>Azioni</th>

                            </tr>
                        
                        </thead>
                        <tbody>
                        
                            @foreach($posts as $post)
                                <tr>

                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->slug }}</td>
                                    @if(!isset($post->category))
                                        <td> ----- </td>
                                    @else
                                        <td>{{ $post->category->name }}</td>
                                    @endif

                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->createdAt }}</td>
                                    <td>
                                    
                                        <a class='btn btn-info' href="{{ route('admin.posts.show', $post->slug) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </a>
                                        <a class='btn btn-info' class='px-2' href="{{ route('admin.posts.edit', $post->slug) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon><line x1="3" y1="22" x2="21" y2="22"></line></svg>
                                        </a>
                                        <form class="d-inline-block" action="{{ route('admin.posts.destroy', $post->slug) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                            </button>
                                        </form>

                                    
                                    </td>
                            
                                </tr>
                            @endforeach
                        
                        </tbody>
                    
                    </table> --}}