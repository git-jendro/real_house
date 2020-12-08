<?php

namespace App\Http\Controllers;

use App\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
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
        $facility = Facility::all();

        return view('/dashboard/facility/index', compact('facility'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/dashboard/facility/create');
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
        
        $facility = new Facility;
        $facility->nama = $request->nama;
        $facility->icon = Storage::put('Facilitty', $request->icon);
        $facility->save();
        
        return redirect()->action('FacilityController@index')->with('store', 'Data fasilitas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facility = Facility::where('id', $id)->first();

        return view('/dashboard/facility/edit', compact('facility'));
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
        $facility = Facility::find($id);
        $facility->nama = $request->nama;
        $facility->save();

        if (request()->has('icon')) {
            $facility->icon = Storage::put('Facility', $request->icon);
            $facility->save();
        }

        return redirect()->action('FacilityController@index')->with('update', 'Data fasilitas berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Facility::destroy($id);

        return redirect()->action('FacilityController@index')->with('delete', 'data Fasilitas berhasil dihapus');
    }
}
