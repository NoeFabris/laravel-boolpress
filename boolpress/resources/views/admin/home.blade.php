@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __("Benvenuto") }} --}}
                    <div class='d-flex justify-content-center'>
                    
                        <a class='px-2' href="{{ route('admin.posts.index') }}"><button class='btn btn-primary'>Visualizza tutti i post</button></a>
                        <a class='px-2' href="{{ route('admin.posts.create') }}"><button class='btn btn-primary'>Crea un post</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
