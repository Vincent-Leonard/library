@extends('layouts.app')
@section('content')

        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <h1 class="col">List of Books</h1>
            </div>
            <div class="row">
                @auth
                    @if ($user->is_admin == 1)
                    <div class="col-md-2 offset-md-10">
                        <a href="{{route('book.create')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">Add Book</a>
                    </div>
                    @endif
                @endauth
            </div>
            <div class="row" style="margin-top: 30px;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Status</th>
                            <th scope="col">Details</th>
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
                                @auth
                                <td>
                                    <form action="{{ route('book.show', $book) }}" method="GET">
                                        @csrf
                                        <input name="id" type="hidden" value="{{ $book->id }}">
                                        <button class="btn btn-primary" type="submit">Details</button>
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