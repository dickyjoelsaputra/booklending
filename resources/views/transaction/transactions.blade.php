@extends('layouts.main')

@section('title', 'Transaction List')
@section('page', 'Transaction List')

@section('content')

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Book Name</th>
                <th>Rent Date</th>
                <th>Return Date</th>
                <th style="width: 20%;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->book->name }}</td>
                    <td>{{ $transaction->rent_date }}</td>
                    <td>{{ $transaction->return_date }}</td>
                    <td>
                        @if ($transaction->confirmed == 1)
                            <div class="badge badge-success d-flex justify-content-center">Confirmed</div>
                        @elseif ($transaction->confirmed == 2)
                            <div class="badge badge-danger d-flex justify-content-center">Denied</div>
                        @else
                            <div class="row">
                                <div class="col-md-6 col-sm-12 my-1">
                                    <form action="/transaction-accept/{{ $transaction->id }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-block btn-success btn-sm">Accept</button>
                                    </form>
                                </div>
                                <div class="col-md-6 col-sm-12 my-1">
                                    <form action="/transaction-denied/{{ $transaction->id }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-block btn-danger btn-sm">Denied</button>
                                    </form>
                                </div>
                            </div>
                        @endif

                    </td>
                </tr>
                <tr class="expandable-body d-none">
                    <td colspan="6">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                @if ($transaction->book->image != null)
                                    <img class="img-thumbnail"
                                        src="{{ asset('storage/books/' . $transaction->book->image) }}" alt=""
                                        width="200px">
                                @else
                                    <img class="img-thumbnail"
                                        src="https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg"
                                        alt="" width="200px">
                                @endif
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <p class="font-weight-bold">Categories :</p>
                                <p>
                                    {{-- {{ $transaction->book->categories }} --}}
                                    @foreach ($transaction->book->categories as $bookcategory)
                                        @if ($bookcategory == [])
                                            tidak ada kategori
                                        @else
                                            {{ $bookcategory->name }} ,
                                        @endif
                                    @endforeach

                                </p>
                                <p class="font-weight-bold">Author :</p>
                                <p>{{ $transaction->book->author }}</p>
                                <p class="font-weight-bold">Publisher :</p>
                                <p>{{ $transaction->book->publisher }}</p>
                                <p class="font-weight-bold">Release :</p>
                                <p>{{ $transaction->book->release }}</p>
                            </div>
                            <div class="col-md col-sm-12">
                                <p class="font-weight-bold">Description :</p>
                                <p>{{ $transaction->book->description }}</p>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
