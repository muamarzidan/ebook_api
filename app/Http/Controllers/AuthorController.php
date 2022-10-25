<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        if($authors) {
            return response()->json([
                'succes' => true,
                'message' => 'Daftar data Author',
                'data' => $authors
            ], 201);
        } else {
            return response()->json([
                'succes' => false,
                'message' => 'Gagal menampilkan data Author',
                'data' => $authors
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
        $authors = Author::create([  
            'name' => $request->name,
            'date_of_birh' => $request->date_of_birh,
            'place_of_birth' => $request->place_of_birth,
            'gender' => $request->gender,
            'email' => $request->email,
            'hp' => $request->hp
        ]);
        $authors->save();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data Author berhasil disimpan',
            'data' => $authors
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
        $authors = Author::find($id);
        if ($authors) {
            return response()->json([
                'success' => true,
                'message' => 'Data Author yang dicari berhasil ditemukan',
                'data' => $authors
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Author yang dicari tidak ditemukan',
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
        $authors = Author::find($id);
        if ($authors) {
            $authors->name = $request->name;
            $authors->date_of_birh = $request->date_of_birh;
            $authors->place_of_birth = $request->place_of_birth;
            $authors->gender = $request->gender;
            $authors->email = $request->email;
            $authors->hp = $request->hp;

            $authors->save();
            return response()->json([
                'success' => true,
                'message' => 'Update data Author berhasil',
                'data' => $authors
            ], 201);
        } else if ($authors === null) {
            return response()->json([
                'success' => false,
                'message' => 'id Author ke ' . $id . ' tidak ditemukan',
                'data' => ''
            ], 404);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Update data Author gagal',
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
        $authors = Author::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Delete data Author berhasil',
            'data' => $authors
        ], 201);

        $authors = Author::where('id',$id)->first();
        if($authors) {
            $authors->delete();
            return response()->json([
                'status' => 200,
                'data' => $authors
            ], 200);
        } else if ($authors === null){
            return response()->json([
                'status' => 404,
                'data' => 'id Author ke ' . $id . ' tidak ditemukan'
            ], 404);
        } else {
            return response()->json([
                'status' => 404,
                'data' => $authors
            ], 404);
        }
    }
}
