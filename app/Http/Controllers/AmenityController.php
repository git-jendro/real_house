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

        return view('/kelengkapan/index', compact('amenity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/kelengkapan/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        Amenity::create([
            'nama'  => $request->nama,
            'icon'  => Storage::put('Amenity', $request->icon),
        ]);

        return redirect()->action('AmenityController@index');
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
        $amenity = Amenity::where('id_amenity', $id)->first();

        return view('/kelengkapan/edit', compact('amenity'));
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
        Amenity::where('id_amenity', $id)
        ->update([
            'nama'  => $request->nama
        ]);

        if (request()->has('icon')) {
            Amenity::where('id_amenity', $id)
                ->update([
                    'icon' => Storage::put('Amenity', request()->icon)
                ]);
        }

        return redirect()->action('AmenityController@index');
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

        return redirect()->action('AmenityController@index');
    }
}
