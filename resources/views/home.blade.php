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

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($posts as $post)
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="width: 500px">
                <div class="card-body" style="position: relative;">
                    <div class="card-header fw-bold justify-content-between d-flex" style="border-bottom: 1px solid black; padding-bottom:5px;">{{ $post->title }} <div class="categories">Dibuat oleh {{ $post->name }}</div></div>
                    <div class="card-text">{{ $post->description }}</div>
                    <div class="card-footer text-muted">{{ $post->created_at->diffForHumans() }}</div>
                    @can('update-post', $post)
                    <div class="cta"><a href="{{ route('update.post', ['id' => $post->post_id]) }}" class="btn btn-sm text-end bg-success my-2 text-white">Edit</a></div>    
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
