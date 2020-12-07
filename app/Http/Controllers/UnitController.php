<?php

namespace App\Http\Controllers;

use App\Amenity;
use App\AmenityRules;
use App\Building;
use App\FacilityRules;
use App\ImageRules;
use App\Unit;
use App\UnitImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UnitController extends Controller
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
        $unit = Unit::all();
        $amenity = AmenityRules::all();
        $image = UnitImage::all();

        return view('/unit/index', compact('unit', 'amenity', 'image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $building = Building::all();
        $amenity = Amenity::all();
        $image = UnitImage::max('id_image');

        return view('unit/create', compact('building', 'amenity' ,'image'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit = new Unit;
        $unit->id_building  = $request->id_building;
        $unit->nama         = $request->nama;
        $unit->deskripsi    = $request->deskripsi;
        $unit->harga_jual   = $request->harga_jual;
        $unit->harga_sewa   = $request->harga_sewa;
        $unit->harga_cicil  = $request->harga_cicil;
        $unit->diskon       = $request->diskon;
        $unit->vr_link      = $request->vr_link;
        $unit->save();

        $loop1 = $request->get('id_amenity');
        foreach ($loop1 as $key) {
            $amenity = new AmenityRules;
            $amenity->id_unit = $unit->id_unit;
            $amenity->id_amenity = $key;
            $amenity->save();
        };

        if (request()->has('utama')) {
            $utama = new UnitImage;
            $name = $request->utama->getClientOriginalName();
            $utama->id_unit = $unit->id_unit;
            $utama->path = $request->utama->storeAs('Unit', $name);
            $utama->role = '1';
            $utama->save();
        }
        

        if (request()->has('tri')) {
            $tri = new UnitImage;
            $name = $request->tri->getClientOriginalName();
            $tri->id_unit = $unit->id_unit;
            $tri->path = $request->tri->storeAs('Unit', $name);
            $tri->role = '2';
            $tri->save();
        }

        if (request()->has('denah')) {
            $denah = new UnitImage;
            $name = $request->denah->getClientOriginalName();
            $denah->id_unit = $unit->id_unit;
            $denah->path = $request->denah->storeAs('Unit', $name);
            $denah->role = '4';
            $denah->save();
        }
        
        if(request()->has('path')){
            $loop2 = $request->file('path');
            foreach ($loop2 as $key) {
                $image = new UnitImage;
                $name = $key->getClientOriginalName();
                $image->id_unit = $unit->id_unit;
                $image->path = $key->storeAs('Unit', $name);
                $image->role = '3';
                $image->save();
            };
        }

        return redirect()->action('UnitController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = Unit::where('id_unit', $id)->first();
        $amenity = AmenityRules::all();

        return view('/unit/show', compact('unit', 'amenity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = new Amenity;
        $unit = Unit::where('id_unit', $id)->first();
        $rules = AmenityRules::select('id_amenity')->where('id_unit', $id);
        $amenity = $list->whereHas('rules', function ($query) use ($rules){
            $query->whereIn('id_amenity', $rules);
        })->get();
        $ame = $list->get();
        $building = Building::all();
        $image = UnitImage::where('id_unit', $id)->get();

        // dd($ame);

        return view('/unit/edit', compact('unit', 'amenity', 'ame', 'building', 'image'));
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
        if (Unit::where('id_unit',$id)->exists()) {
            $unit = Unit::find($id);
            $unit->id_building  = is_null($request->id_building) ? $unit->id_building : $request->id_building ;
            $unit->nama         = is_null($request->nama) ? $unit->nama : $request->nama ;
            $unit->deskripsi    = is_null($request->deskripsi) ? $unit->deskripsi : $request->deskripsi ;
            $unit->harga_jual   = is_null($request->harga_jual) ? $unit->harga_jual : $request->harga_jual ;
            $unit->harga_sewa   = is_null($request->harga_sewa) ? $unit->harga_sewa : $request->harga_sewa ;
            $unit->harga_cicil  = is_null($request->harga_cicil) ? $unit->harga_cicil : $request->harga_cicil ;
            $unit->diskon       = is_null($request->diskon) ? $unit->diskon : $request->diskon ;
            $unit->vr_link      = is_null($request->vr_link) ? $unit->vr_link : $request->vr_link ;
            $unit->save();

            if (request()->has('utama')) {
                $name = $request->utama->getClientOriginalName();
                UnitImage::where([
                    ['id_unit', $id],
                    ['role', 1]
                ])->update([
                    'path' => $request->utama->storeAs('Unit', $name)
                ]);
            }
            
            if (request()->has('tri')) {
                $name = $request->tri->getClientOriginalName();
                UnitImage::where([
                    ['id_unit', $id],
                    ['role', 2]
                ])->update([
                    'path' => $request->tri->storeAs('Unit', $name)
                ]);
            }

            if (request()->has('denah')) {
                $name = $request->denah->getClientOriginalName();
                UnitImage::where([
                    ['id_unit', $id],
                    ['role', 4]
                ])->update([
                    'path' => $request->denah->storeAs('Unit', $name)
                ]);
            }

            if(request()->has('path')){
                UnitImage::where([
                    ['id_unit', $id],
                    ['role', 3]
                ])->delete();
                $loop2 = $request->file('path');
                foreach ($loop2 as $key) {
                    $image = new UnitImage;
                    $name = $key->getClientOriginalName();
                    $image->id_unit = $unit->id_unit;
                    $image->path = $key->storeAs('Unit', $name);
                    $image->role = '3';
                    $image->save();
                };
        }
            


            return redirect()->action('UnitController@index');
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
        Unit::destroy($id);

        return redirect()->action('UnitController@index');
    }

    public function check($unit,  $amenity)
    {
        $check = AmenityRules::where([
            ['id_unit', $unit],
            ['id_amenity', $amenity]
        ])->count();
        
        if ($check == 0) {
            AmenityRules::create([
                'id_unit'       => $unit,
                'id_amenity'    => $amenity
            ]);

            return response()->json('Input');
        } else {
            AmenityRules::where([
                ['id_unit', $unit],
                ['id_amenity', $amenity]
            ])->delete();

            return response()->json('Hapus');
        }
        
        
        // return response()->json($check);
    }
}
