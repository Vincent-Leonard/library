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
                @if($book->is_borrowed == 1)
                    @if ($user->is_admin == 1)
                        <br>Borrower by: {{$userBorrow->name}}, {{$userBorrow->email}}<br>
                        @if ($log != null)
                            <br>Borrow Date: {{$log->borrow_date}}<br>
                            <br>Due Date: {{$log->due_date}}<br>
                        @endif
                    @endif
                    @if ($log != null)
                        <br>Expected Return Date: {{$log->due_date}}<br>
                    @endif
                @endif
                <br>
                <div style=" display:flex; justify-content: center; align-items: center;">
                    @if ($user->is_admin == 1)
                        <div style="margin-right: 20px">
                        @if ($book->is_borrowed == 0)
                        <form action="{{ route('log.show', $book) }}" method="GET">
                            @csrf
                            <input name="id" type="hidden" value="{{ $book->id }}">
                            <button class="btn btn-primary" type="submit">Borrow</button>
                        </form>
                        @elseif ($book->is_borrowed == 1)
                        
                        @endif
                        </div>
                    
                        <form action="{{route('book.edit', $book)}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="GET">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                        <div style="margin-left: 20px">
                        <form action="{{route('book.destroy', $book)}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </div>
                    @elseif ($user->is_admin == 0)
                        @if ($book->is_borrowed == 0)
                        <form action="{{ route('book.borrow', $book) }}" method="POST">
                            @csrf
                            <input name="user_id" type="hidden" value="{{ $user->id }}">
                            <input name="id" type="hidden" value="{{ $book->id }}">
                            <button class="btn btn-primary" type="submit">Borrow</button>
                        </form>
                        @elseif ($book->is_borrowed == 1)
                        
                        @endif
                    @endif
            </div>
            </div>
        </div>
    </div>
@endsection
