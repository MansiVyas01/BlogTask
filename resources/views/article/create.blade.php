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

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .alert-danger ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
</head>
<body>
    <div id="blog">
        @yield('content')
    </div>
</body>
</html>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
 <hr>
  @endif

    <div class="container">
        <h1>Create Blog Post</h1>
        {{-- <form action="{{ route('blog-posts.store') }}" method="POST"> --}}
        <form action="{{ route('article.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" style="height: 150px; min-height: 100px; max-height: 300px; overflow-y: auto; resize: vertical;"></textarea>
            </div>
            <div class="form-group">
                <label for="category">Choose category</label>
                {{-- <textarea name="category" id="category" class="form-select"></textarea> --}}
                    <select class="form-select" name="category" id="category">
                        <option selected disabled>Select</option>
                        @foreach(Config::get('articles') as $value)
                        <option value="{{$value}}">{{$value}}</option>
                        @endforeach
                        {{-- <option value="technology">Technology</option>
                <option value="regular">Regular</option> --}}
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
