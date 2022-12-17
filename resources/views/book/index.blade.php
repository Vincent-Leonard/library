@extends('layouts.app')
@section('content')

        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <h1 class="col">List of Books</h1>
            </div>
            {{-- <div class="row">
                @auth
                <div class="col-md-2 offset-md-10">
                    <a href="{{route('event.create')}}" class="btn btn-danger btn-block" role="button" aria-pressed="true">Tambah</a>
                </div>
                @endauth
            </div> --}}
            <div class="row" style="margin-top: 30px;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td><a href="@auth{{route('book.edit', $book)}}@endauth">{{$book->title}}</td>
                                <td>{{$book->author}}</td>
                                <td>{{$book->is_borrowed}}</td>
                                @auth
                                <td>
                                    <form action="{{route('book.destroy', $book)}}" method="post">
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