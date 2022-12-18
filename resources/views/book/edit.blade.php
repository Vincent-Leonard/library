@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Book</h1>
        </div>
        <div class="row">
            <div class="col">
            <form action="{{route('book.update', $book)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="nama">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Author:</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Synopsis:</label>
                        {{-- <input type="text" class="form-control" id="synopsis" name="synopsis"> --}}
                        <textarea class="form-control" id="synopsis" rows="5" name="synopsis" value="{{ $book->synopsis }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="user">Status:</label>
                        <select name = "is_borrowed" class = "custom-select">
                            @if($book->is_borrowed == "0")
                                <option value="0" selected>Available</option>
                                <option value="1">Not Available</option>
                            @else
                                <option value="0">Available</option>
                                <option value="1" selected>Not Available</option>
                            @endif
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
