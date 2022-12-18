@extends('layouts.app')
@section('content')

        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <h1 class="col">List of Books</h1>
            </div>
            <div class="row">
                @auth
                <div class="col-md-2 offset-md-10">
                    <a href="{{route('book.create')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">Add Book</a>
                </div>
                @endauth
            </div>
            <div class="row" style="margin-top: 30px;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Status</th>
                            <th scope="col">Borrow Date</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Borrow</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{$book->title}}</td>
                                <td>{{$book->author}}</td>
                                <td>
                                    @if ($book->is_borrowed == 0)
                                        Available
                                    @elseif ($book->is_borrowed == 1)
                                        Not Available
                                    @endif
                                </td>
                                {{-- <td>{{$book->users->borrow_date}}</td> --}}
                                @auth
                                <td>
                                    @if ($book->is_borrowed == 0)
                                    <form action="{{ route('book.show', $book) }}" method="GET">
                                        @csrf
                                        <input name="id" type="hidden" value="{{ $book->id }}">
                                        <button class="btn btn-primary" type="submit">Details</button>
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
                                @endauth
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
@endsection