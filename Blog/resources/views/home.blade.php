@extends("layout")

@section("content")

@foreach ($posts as $post):
    <div class="container">
        <h1><a href="/post/{{$post->slug}}">{{$post->title}}</a></h1>
        <p>{{$post->excert}}
    </div>

@endforeach
@endsection