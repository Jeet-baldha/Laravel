@extends('layout')

@section('content')

<div class="container">
    <h1>{{ $post->title}}</h1>
    <p> Written by <a href="/author/{{$post->author->username}}">{{$post->author->name}}</a> in <a
            href="/category/{{$post->category->slug}}">
            {{$post->category->name}} </a></p>
    <p>{!! $post->body !!}</p>
    <a href="/">Go Back</a>
</div>
@endsection