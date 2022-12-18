@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Book Details</h1>
        </div>
        <div class="row">
            <div class="col">
                <br>Title: {{$book->title}}<br>
                <br>Author: {{$book->author}}<br>
                <br>Synopsis: 
                <br>{{$book->synopsis}}<br>
                <br>Status:
                    @if ($book->is_borrowed == 0)
                        Available
                    @elseif ($book->is_borrowed == 1)
                        Not Available
                    @endif
                <br>
                <br>
                <td>
                    @if ($book->is_borrowed == 0)
                    <form action="{{ route('book.borrow', $book) }}" method="POST">
                        @csrf
                        <input name="id" type="hidden" value="{{ $book->id }}">
                        <button class="btn btn-primary" type="submit">Borrow</button>
                    </form>
                    @elseif ($book->is_borrowed == 1)
                    -
                    @endif
                </td>
                <td>
                    <form action="{{route('book.edit', $book)}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('book.destroy', $book)}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </div>
        </div>
    </div>
@endsection
