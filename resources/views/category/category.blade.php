@extends('layouts.main')

@section('title', 'Category')
@section('page', 'Category')

@section('content')
    @include('category.category-create')

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Category Name</th>
                <th>Book with Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <ul>
                            @foreach ($category->books as $categorybook)
                                <li>
                                    {{ $categorybook->name }}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 my-1">
                                <a href="/category-edit/{{ $category->id }}">
                                    <button type="button" class="btn btn-block btn-warning btn-sm">Edit</button>
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-12 my-1">
                                <form action="/category-delete/{{ $category->id }}" method="POST">
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
@endsection
