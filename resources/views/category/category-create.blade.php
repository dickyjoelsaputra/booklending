<!-- Button trigger modal -->
<button type="button" class="btn btn-success float-left mb-3" data-toggle="modal" data-target="#exampleModal">
    Add Category
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
                <form action="/category-store" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Category name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter Category Name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
