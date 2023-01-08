@extends('layouts.main')

@section('title', 'Book Detail')
@section('page')
    Book Detail - {{ $book->name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-8">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                        @if ($book->image != null)
                            <img src="{{ asset('storage/books/' . $book->image) }}" class="product-image" alt="Product Image">
                        @else
                            <img src="https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg"
                                class="product-image" alt="Product Image">
                        @endif
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <p>{{ $book->description }}</p>

                    <hr>
                    <h5>Categories :
                        @foreach ($book->categories as $bookcategory)
                            {{ $bookcategory->name }} ,
                        @endforeach
                    </h5>
                    <h5>Author : {{ $book->author }}</h5>
                    <h5>Publisher : {{ $book->publisher }}</h5>
                    <h5>Release : {{ $book->release }}</h5>

                </div>
            </div>
        </div>


        <div class="col-12 col-md-12 col-lg-4">
            <h4>Rent This Book</h4>
            <form action="/transaction-store" method="post">
                @csrf
                <div class="form-group">
                    <label>Rent Date</label>
                    <input type="date" name="rent_date" class="form-control" id="exampleInputEmail1"
                        placeholder="Enter Category Name">
                </div>
                <div class="form-group">
                    <label>Return Date</label>
                    <input type="date" name="return_date" class="form-control" id="exampleInputEmail1"
                        placeholder="Enter Category Name">
                </div>
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
