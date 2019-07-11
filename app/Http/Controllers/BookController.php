<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = App\Book::all();
        return view('index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = App\Genre::all();
        return view ('create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $genres = $request->genres;
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'required|numeric|min:1300',
        ]);
        $validatedData['year'] =(int)$validatedData['year'];
        try{
        $book = App\Book::create($validatedData);
        if (count($genres) > 0){
                $gen = array_values($genres);
                $addGenres = App\Book::find($book->id);
                $addGenres->genres()->sync($gen);

        }
        }
        catch(\Exception $e){
            $message = 'Not saved.';
        }
        if (!isset($message)) $message =  'Book saved!';
        return redirect('/books')->with('message', $message);
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = App\Book::find($id);
        return view('showbook', compact('book'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        public function destroy($id)
    {
        try {
        $book = App\Book::find($id);
        } catch(\Exception $exception){
            $errormsg = 'Error! No such book!' . $exception->getCode();
            return redirect('/books')->with('message', $errormsg);
        }
        $result = $book->delete();
        if ($result) {
            $message = "Successfully Deleted!";
        } else {
            $message = "Not Deleted!";
        }
        return redirect('/books')->with('message', $message);
    }

}
