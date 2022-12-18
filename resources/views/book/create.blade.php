@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Add Book</h1>
        </div>
        <div class="row">
            <div class="col">
            <form action="{{route('book.store')}}" method="post">
                {{csrf_field()}}
                    <div class="form-group">
                        <label for="nama">Title:</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="nama">Author:</label>
                        <input type="text" class="form-control" id="author" name="author">
                    </div>
                    <div class="form-group">
                        <label for="nama">Synopsis:</label>
                        {{-- <input type="text" class="form-control" id="synopsis" name="synopsis"> --}}
                        <textarea class="form-control" id="synopsis" rows="5" name="synopsis"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
