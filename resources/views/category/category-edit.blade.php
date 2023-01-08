@extends('layouts.main')

@section('title', 'Category Edit')
@section('page')
    Category Edit - {{ $category->name }}
@endsection

@section('content')

    <div class="row">
        <div class="col"></div>
        <div class="col-md-6 col-sm-12">
            <form action="/category-update/{{ $category->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Category name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            value="{{ $category->name }}" placeholder="Enter Book Name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>

@endsection
