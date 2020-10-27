<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Inventory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (new Response(\App\Books::all(), 200))
            ->header('Content-Type', 'json');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new \App\Books;

        $book->title = $request->title;
        $book->subtitle = $request->subtitle??'';
        $book->author = $request->author;
        $book->image = $request->image??'';
        $book->description = $request->description??'';
        $book->quantity = '5';

        $book->save();

        return (new Response($book, 200))
            ->header('Content-Type', 'json');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = \App\Books::find($id);

        return (new Response($book, 200))
            ->header('Content-Type', 'json');
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
        $book = \App\Books::find($id);

        $book->title = $request->title;
        $book->subtitle = $request->subtitle??'';
        $book->author = $request->author;
        $book->image = $request->image??'';
        $book->description = $request->description??'';

        $book->save();

        return (new Response($book, 200))
            ->header('Content-Type', 'json');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = \App\Books::destroy($id);

        return (new Response($book, 200))
            ->header('Content-Type', 'json');
    }
}
