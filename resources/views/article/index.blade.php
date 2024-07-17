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
            max-width: 800px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            text-align: center;
            color: #333333;
        }

        .post {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #cccccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .post h2 {
            font-size: 24px;
            color: #007bff;
            margin-bottom: 10px;
        }

        .post p {
            font-size: 16px;
            line-height: 1.6;
            color: #555555;
            margin-bottom: 15px;
        }

        .post p:last-child {
            color: #999999;
            font-size: 14px;
        }

        .btn {
            margin-top: 10px;
        }

        .btn-primary,
        .btn-danger {
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: #007bff;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #ffffff;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Blog Posts</h1>

        @foreach ($data as $datas)
            <div class="post">
                <h2>{{ $datas->title }}</h2>
                <p>{{ $datas->blog_description }}</p>
                <p>{{ $datas->category }}</p>
                {{-- <p>Author: {{ $datas->user->name }}</p> --}}
                <p>Published: {{ $datas->created_at->format('M d, Y') }}</p>
                <a href="/article/{{$datas['id']}}/edit" class="btn btn-primary">Edit</a>   
            
                <form action="/article/{{$datas['id']}}" method="post">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('Do you want to delete this record!')" class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>
@endsection
