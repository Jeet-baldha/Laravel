@extends('layout')

@section('content')

<div class="container">
    <h1>{{ $post->title}}</h1>
    {!! $post->body !!}
    <a href="/">Go Back</a>
</div>
@endsection