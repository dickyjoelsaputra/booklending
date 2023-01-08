@extends('layouts.main')

@section('title', 'Student')
@section('page', 'Student')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="mx-auto" style="width: 50%;">
                            <form action="/student-delete/{{ $user->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-block btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
