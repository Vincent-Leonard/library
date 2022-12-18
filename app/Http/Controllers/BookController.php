<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::all();
        $user = Auth::user();
        // $logs = Log::all()->where('lecturer_id', '<>', null);
        // dd($books);
        return view('book.index', compact('books', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::all()->where('lecturer_id', '<>', null);
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'synopsis' => $request->synopsis
        ]);

        // $event->users()->attach($request->user_id);
        // $event->users()->attach(Auth::user()->id);
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $book = Book::find($id);
        $user = Auth::user();
        $log = Logs::all()->where('book_id', $id)->last();
        $userBorrow = '';
        if ($log != null){
            $logUser = $log->user_id;
            $userBorrow = User::all()->where('id', $logUser)->first();
        }
        // dd($userBorrow);
        return view('book.detail', compact('book', 'user', 'log', 'userBorrow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::Find($id);
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'synopsis' => $request->synopsis,
            'is_borrowed' => $request->is_borrowed,
        ]);

        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::Find($id);
        $book->users()->detach();
        $book->delete();
        return redirect()->route('book.index')->with('Success', 'Book Deleted');
    }
}
