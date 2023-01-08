@extends('layouts.main')

@section('title', 'Book Detail')
@section('page')
    Book Detail - {{ $book->name }}
@endsection

@section('content')
    <p>Name : {{ $book->name }}</p>
    <p>Author : {{ $book->author }}</p>
    <p>Publisher: {{ $book->publisher }}</p>
    <p>Release Year: {{ $book->release }}</p>
    <p>Description: {{ $book->description }}</p>
    <p>Categories:</p>
    <ul>
        @foreach ($book->categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>

    @if ($book->image != null)
        <img class="img-thumbnail" src="{{ asset('storage/books/' . $book->image) }}" alt="" width="200px">
    @else
        <img class="img-thumbnail"
            src="https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg"
            alt="" width="200px">
    @endif



@endsection
