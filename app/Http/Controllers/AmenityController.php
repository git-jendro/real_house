<?php

namespace App\Http\Controllers;

use App\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AmenityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $amenity = Amenity::all();

        return view('/dashboard/amenity/index', compact('amenity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/dashboard/amenity/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $request->validate([
            'nama' => 'required|string|min:2',
            'icon' => 'required',
        ]);

        $amenity = new Amenity;
        $amenity->nama = $request->nama;
        $amenity->icon = Storage::put('Amenity', $request->icon);
        $amenity->save();

        return redirect()->action('AmenityController@index')->with('store', 'Data amenity berhasil ditambahkan');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $amenity = Amenity::where('id', $id)->first();

        return view('/dashboard/amenity/edit', compact('amenity'));
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
        $request->validate([
            'nama' => 'required|string|min:2',
        ]);

        $amenity = Amenity::find($id);
        $amenity->nama = $request->nama;

        if (request()->has('icon')) {
            $amenity->icon = Storage::put('Amenity', $request->icon);
            $amenity->save();
        }

        return redirect()->action('AmenityController@index')->with('update', 'Data amenity berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Amenity::destroy($id);

        return redirect()->action('AmenityController@index')->with('delete', 'Data amenity berhasil dihapus');
    }
}