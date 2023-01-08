@extends('layouts.main')

@section('title', 'Book Detail')
@section('page')
    Book Detail - {{ $book->name }}
@endsection

@section('content')
    {{ $book }}
@endsection
