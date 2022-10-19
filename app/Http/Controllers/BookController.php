<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $books = Book::all();
        if($books) {
            return response()->json([
                'succes' => true,
                'message' => 'Daftar data buku',
                'data' => $books
            ], 201);
        } else {
            return response()->json([
                'succes' => false,
                'message' => 'Gagal menampilkan data buku',
                'data' => $books
            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'description' => $request->description,
            'author' => $request->author,
            'publihser' => $request->publihser,
            'date_of_issue' => $request->date_of_issue
        ]);
        $book->save();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data buku berhasil disimpan',
            'data' => $book
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show detail data book 
        $book = Book::find($id);
        if ($book) {
            return response()->json([
                'success' => true,
                'message' => 'Data buku yang dicari berhasil ditemukan',
                'data' => $book
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data buku yang dicari tidak ditemukan',
                'data' => ''
            ], 404);
        }
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
        // $book = Book::find($id);
        // if($book) {
        //     $book->title = $request->title ? $request->title : $book->title;
        //     $book->description = $request->description ? $request->description : $book->description;
        //     $book->author = $request->author ? $request->author : $book->author;
        //     $book->publihser = $request->publihser ? $request->publihser : $book->publihser;
        //     $book->date_of_issue = $request->date_of_issue ? $request->date_of_issue : $book->date_of_issue;
        //     $book->save();

        //     return response()->json([
        //         'status' => true,
        //         'data' => $book,

        //     ], 200);
        // } else {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'id ke ' . $id . ' tidak ditemukan',
        //         'data' => ''
        //     ], 404);
        // }

        $book = Book::find($id);
        if ($book) {
            $book->title = $request->title;
            $book->description = $request->description;
            $book->author = $request->author;
            $book->publihser = $request->publihser;
            $book->date_of_issue = $request->date_of_issue;

            $book->save();
            return response()->json([
                'success' => true,
                'message' => 'Update data buku berhasil',
                'data' => $book
            ], 201);
        } else if ($book === null) {
            return response()->json([
                'success' => false,
                'message' => 'id ke ' . $id . ' tidak ditemukan',
                'data' => ''
            ], 404);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Update data buku gagal',
                'data' => ''
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete data book
        $book = Book::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Delete data buku berhasil',
            'data' => $book
        ], 201);

        $book = Book::where('id',$id)->first();
        if($book) {
            $book->delete();
            return response()->json([
                'status' => 200,
                'data' => $book
            ], 200);
        } else if ($book === null){
            return response()->json([
                'status' => 404,
                'data' => 'id ke ' . $id . ' tidak ditemukan'
            ], 404);
        } else {
            return response()->json([
                'status' => 404,
                'data' => $book
            ], 404);
        }
    }
}
