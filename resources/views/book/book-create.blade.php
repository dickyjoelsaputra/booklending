<!-- Button trigger modal -->
<button type="button" class="btn btn-success float-left mb-3" data-toggle="modal" data-target="#exampleModal">
    Add Book
</button>

{{-- {{ $data[0] }} --}}
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/book-store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Book name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter Book Name">
                        </div>
                        <div class="form-group">
                            <label>Book author</label>
                            <input type="text" name="author" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter Book Author">
                        </div>
                        <div class="form-group">
                            <label>Book publisher</label>
                            <input type="text" name="publisher" class="form-control"
                                placeholder="Enter Book Publisher">
                        </div>

                        <div class="form-group">
                            <label>Release year</label>
                            <input type="text" name="release" class="form-control" placeholder="Enter Release Year">
                        </div>
                        <div class="form-group">
                            <label>Book description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter Book Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Book category</label>
                            <div class="select2-blue">
                                <select class="select2" multiple="multiple" data-placeholder="Select a Category"
                                    name="categories_id[]" data-dropdown-css-class="select2-blue" style="width: 100%;">
                                    @foreach ($categories as $category)
                                        {{-- <option selected="selected">orange</option> --}}
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Book image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="picture" class="custom-file-input"
                                        id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
