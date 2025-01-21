@extends("layout")

@section("content")

@foreach ($posts as $post)
    <div class="container">
        <h1><a href="/post/{{$post->slug}}">{{$post->title}}</a></h1>
        <p> Written by <a href="/author/{{$post->author->username}}">{{$post->author->name}}</a> in <a
                href="/category/{{$post->category->slug}}">
                {{$post->category->name}} </a></p>
        <p>{{$post->excerpt}}</p>

        <p><a href="/">Go Back</a></p>
    </div>

@endforeach
@endsection