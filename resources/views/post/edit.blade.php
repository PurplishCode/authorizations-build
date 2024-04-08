<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>{{ $post->id }}</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    @extends('layouts.app')
    @section('content')

<main>
    <section class="d-flex justify-content-center">
        <div class="container">
           <form action="{{ route('edit.post', ['post_id' => $post->id]) }}" method="POST" class="form-group card p-3">
            @csrf
            @method('PUT')
            <div class="title"><h1 class="fw-bold">Edit Your POST</h1></div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="" class="fw-bold">Title:</label>
                    <input type="text" class="form-control" name="title" required value="{{ $post->title }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="" class="fw-bold">Description:</label>
                    <input type="text" class="form-control" name="description" required value="{{ $post->description }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="" class="fw-bold">Categories:</label>
                    <input type="text" class="form-control" name="categories" required value="{{ $post->categories }}">
                </div>

                <div class="col-md-12 mb-3">
                    <button class="btn btn-success w-100 btn-md" type="submit">Submit</button>
                </div>
            </div>
           </form>
        </div>
    </section>
</main>
    @endsection
</body>
</html>
