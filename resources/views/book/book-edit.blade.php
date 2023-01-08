@extends('layouts.main')

@section('title', 'Book Edit')
@section('page')
    Book Edit - {{ $book->name }}
@endsection

@section('content')

    <div class="row">
        <div class="col"></div>
        <div class="col-md-6 col-sm-12">
            <form action="/book-update/{{ $book->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Book name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter Book Name" value="{{ $book->name }}">
                    </div>
                    <div class="form-group">
                        <label>Book author</label>
                        <input type="text" name="author" class="form-control" id="exampleInputEmail1"
                            placeholder="Enter Book Author" value="{{ $book->author }}">
                    </div>
                    <div class="form-group">
                        <label>Book publisher</label>
                        <input type="text" name="publisher" class="form-control" placeholder="Enter Book Publisher"
                            value="{{ $book->publisher }}">
                    </div>

                    <div class="form-group">
                        <label>Release year</label>
                        <input type="text" name="release" class="form-control" placeholder="Enter Release Year"
                            value="{{ $book->release }}">
                    </div>
                    <div class="form-group">
                        <label>Book description</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Enter Book Description">{{ $book->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Book category</label>
                        <div class="select2-blue">
                            <select class="select2" multiple="multiple" data-placeholder="Select a Category"
                                name="categories_id[]" data-dropdown-css-class="select2-blue" style="width: 100%;">
                                @foreach ($categories as $category)
                                    {{-- <option selected="selected">orange</option> --}}
                                    <option
                                        @foreach ($book->categories as $key) {
                        @selected($key->id == $category->id)
                        } @endforeach
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @if ($book->image != null)
                        <div class="form-group">
                            <img class="img-thumbnail" src="{{ asset('storage/books/' . $book->image) }}" alt=""
                                width="200px">
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleInputFile">Book image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="picture" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">{{ $book->image }}</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>

@endsection

@push('scripts')
    <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <script src="../../plugins/select2/js/select2.full.min.js"></script>
    <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2();
            bsCustomFileInput.init();
        })
    </script>
@endpush
