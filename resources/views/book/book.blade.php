@extends('layouts.main')

@section('title', 'Book')
@section('page', 'Book')

@section('content')

    @include('book.book-create')

    <div class="float-right">
        {{ $books->links() }}
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Book Name</th>
                <th style="width: 30%">Book Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->name }}</td>
                    <td>
                        <ul>
                            @foreach ($book->categories as $bookcategory)
                                <li>
                                    {{ $bookcategory->name }}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-md-4 col-sm-12 my-1">
                                <a href="/book/{{ $book->id }}">
                                    <button type="button" class="btn btn-block btn-info btn-sm">Detail</button>
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-12 my-1">
                                <a href="/book-edit/{{ $book->id }}">
                                    <button type="button" class="btn btn-block btn-warning btn-sm">Edit</button>
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-12 my-1">
                                <form action="/book-delete/{{ $book->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-block btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="float-right mb-5">
        {{ $books->links() }}
    </div>
@endsection
