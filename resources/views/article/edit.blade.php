@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Application</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #333333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333333;
        }

        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 14px;
            color: #333333;
        }

        .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
            border-color: #007bff;
            outline: none;
        }

        .btn-primary {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            color: #ffffff;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div id="blog">
        @yield('content')
    </div>
</body>
</html>

    <div class="container">
        <h1>Edit Blog Post</h1>
        <form action="/article/{{$article['id']}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $article->title }}">
            </div>
            <div class="form-group">
                <label for="blog_description">Blog Description</label>
                <textarea name="blog_description" id="blog_description" class="form-control">{{ $article->blog_description }}</textarea>
            </div>
            <div class="col">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category"
                        aria-label="Default select example"
                        required="" name="category">
                    <option selected disabled>Select</option>
                    @foreach(Config::get('articles') as $value)
                                        <option value="{{$value}}" @if ($article->category == $value)
                                            {{'selected'}}
                                        @endif>{{$value}}</option>
                                        @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
