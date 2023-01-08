@extends('layouts.main')

@section('title', 'Dashboard')
@section('page', 'Dashboard')

@section('content')
    <div class="row">
        {{-- {{ $books }} --}}
        @foreach ($books as $book)
            @if ($book->transaction == null || $book->transaction->confirmed == 2)
                <div class="col-md-4 col-sm-6">
                    <a href="/user-book-detail/{{ $book->id }}">
                        <div class="card">
                            @if ($book->image != null)
                                <img src="{{ asset('storage/books/' . $book->image) }}" class="card-img-top" alt="...">
                            @else
                                <img src="https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg"
                                    class="card-img-top" alt="...">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">{{ $book->name }}</h5>
                                <p class="card-text">Category :
                                    @foreach ($book->categories as $bookcategory)
                                        {{ $bookcategory->name }} ,
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @else
            @endif
        @endforeach
    </div>
@endsection
