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
                        <div class="form-group">
                            <label>User:</label>
                            <select name="user_id" class="custom-select">
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ 'Name: '.$user->name.', Email: '. $user->email }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <input name="id" type="hidden" value="{{ $book->id }}">
                        <button class="btn btn-info" type="submit">Borrow</button>
                    </form>
                    @elseif ($book->is_borrowed == 1)
                    -
                    @endif
                </td>
                <br>
            </div>
        </div>
    </div>
@endsection
