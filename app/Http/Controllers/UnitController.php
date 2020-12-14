<?php

namespace App\Http\Controllers;

use App\Amenity;
use App\AmenityRules;
use App\Bonus;
use App\Building;
use App\Reseller;
use App\Unit;
use App\UnitImage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::user()->role_id == 3) {
            $unit = Unit::where('user_id', Auth::user()->id)->get();
            // dd(Auth::user()->id);
            $rules = AmenityRules::all();
            $image = UnitImage::all();

            return view('/dashboard/unit/index', compact('unit', 'rules', 'image'));
        } elseif (Auth::user()->role_id == 5) {
            $reseller = Reseller::where('nama', Auth::user()->name)->first();
            $unit = Unit::where('id', $reseller->unit_id)->get();
            // dd($unit);
            $rules = AmenityRules::all();
            $image = UnitImage::all();

            return view('/dashboard/unit/index', compact('unit', 'rules', 'image'));
        } else {
            $unit = Unit::all();
            $rules = AmenityRules::all();
            $image = UnitImage::all();
    
            return view('/dashboard/unit/index', compact('unit', 'rules', 'image'));
        }
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
        $image = UnitImage::max('id');
        $user = User::where('role_id', 3)->get();

        return view('/dashboard/unit/create', compact('building', 'amenity' ,'image', 'user'));
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
            'building_id' => 'required',
            'user_id' => 'required',
            'nama' => 'required|string|min:3',
            'harga_jual' => 'required|numeric|min:6',
            'harga_cicil' => 'required|numeric|min:6',
            'diskon' => 'required|numeric',
            'bonus_marketing' => 'required|numeric',
            'deskripsi' => 'required|min:8',
            'stock' => 'required|numeric',
        ]);

        $unit = new Unit;
        $unit->building_id  = $request->building_id;
        $unit->nama         = $request->nama;
        $unit->deskripsi    = $request->deskripsi;
        $unit->harga_jual   = $request->harga_jual;
        $unit->harga_cicil  = $request->harga_cicil;
        $unit->diskon       = $request->diskon;
        $unit->user_id       = $request->user_id;
        $unit->stock       = $request->stock;
        $unit->save();

        $bonus = new Bonus;
        $bonus->unit_id = $unit->id;
        $bonus->bonus_marketing = $request->bonus_marketing;
        $bonus->bonus_reseller = 0;
        $bonus->save();
        
        if (request()->has('vr_link')) {
        $unit->vr_link = $request->vr_link;
        $unit->save();
        }

        if (request()->has('amenity_id')) {
            $loop1 = $request->get('amenity_id');
            foreach ($loop1 as $key) {
                $amenity = new AmenityRules;
                $amenity->unit_id = $unit->id;
                $amenity->amenity_id = $key;
                $amenity->save();
            };
        }

        if (request()->has('utama')) {
            $utama = new UnitImage;
            $name = $request->utama->getClientOriginalName();
            $utama->unit_id = $unit->id;
            $utama->path = $request->utama->storeAs('Unit', $name);
            $utama->role = '1';
            $utama->save();
        }
        

        if (request()->has('tri')) {
            $tri = new UnitImage;
            $name = $request->tri->getClientOriginalName();
            $tri->unit_id = $unit->id;
            $tri->path = $request->tri->storeAs('Unit', $name);
            $tri->role = '2';
            $tri->save();
        }

        if (request()->has('denah')) {
            $denah = new UnitImage;
            $name = $request->denah->getClientOriginalName();
            $denah->unit_id = $unit->id;
            $denah->path = $request->denah->storeAs('Unit', $name);
            $denah->role = '4';
            $denah->save();
        }
        
        if(request()->has('path')){
            $loop2 = $request->file('path');
            foreach ($loop2 as $key) {
                $image = new UnitImage;
                $name = $key->getClientOriginalName();
                $image->unit_id = $unit->id;
                $image->path = $key->storeAs('Unit', $name);
                $image->role = '3';
                $image->save();
            };
        }

        return redirect()->action('UnitController@index')->with('store', 'Data unit berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = Unit::where('id', $id)->first();
        $amenity = AmenityRules::all();

        return view('/dashboard/unit/show', compact('unit', 'amenity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::where('id', $id)->first();
        $list = new Amenity;
        $rules = AmenityRules::select('amenity_id')->where('unit_id', $id);
        $amenity = $list->whereHas('rules', function ($query) use ($rules){
            $query->whereIn('amenity_id', $rules);
        })->get();
        $ame = $list->get();
        $building = Building::all();
        $image = UnitImage::where('unit_id', $id)->get();
        $user = User::where('role_id', 3)->get();


        return view('/dashboard/unit/edit', compact('unit', 'amenity', 'ame', 'building', 'image', 'user'));
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
            'building_id' => 'required',
            'user_id' => 'required',
            'nama' => 'required|string|min:3',
            'harga_jual' => 'required|numeric|min:6',
            'harga_cicil' => 'required|numeric|min:6',
            'diskon' => 'required|numeric',
            'bonus_marketing' => 'required|numeric',
            'deskripsi' => 'required|min:8',
            'stock' => 'required|numeric',
        ]);

        $unit = Unit::find($id);
        $unit->building_id  = $request->building_id ;
        $unit->nama         = $request->nama ;
        $unit->deskripsi    = $request->deskripsi ;
        $unit->harga_jual   = $request->harga_jual ;
        $unit->harga_cicil  = $request->harga_cicil ;
        $unit->diskon       = $request->diskon ;
        $unit->stock        = $request->stock;
        $unit->user_id      = $request->user_id;
        $unit->save();

        if (request()->has('vr_link')) {
            $unit->vr_link = $request->vr_link;
            $unit->save();
        } else {
            AmenityRules::where('unit_id', $unit->id)->delete('vr_link');
        }

        if (request()->has('amenity_id')) {
            AmenityRules::where('unit_id', $unit->id)->delete();

            $loop = $request->get('amenity_id');
            foreach ($loop as $key) {
                $facility = new AmenityRules;
                $facility->unit_id = $unit->id;
                $facility->amenity_id = $key;
                $facility->save();
            };
            } else {
                AmenityRules::where('unit_id', $unit->id)->delete();
            }

        if (request()->has('utama')) {
            UnitImage::where([
                ['unit_id', $id],
                ['role', 1]
            ])->delete();
            $image = new UnitImage;
            $name = $request->utama->getClientOriginalName();
            $image->unit_id = $unit->id;
            $image->path = $request->utama->storeAs('Unit', $name);
            $image->role = '1';
            $image->save();
        } 
        
        if (request()->has('tri')) {
            UnitImage::where([
                ['unit_id', $id],
                ['role', 2]
            ])->delete();
            $image = new UnitImage;
            $name = $request->tri->getClientOriginalName();
            $image->unit_id = $unit->id;
            $image->path = $request->tri->storeAs('Unit', $name);
            $image->role = '2';
            $image->save();
        } 

        if (request()->has('denah')) {
            UnitImage::where([
                ['unit_id', $id],
                ['role', 4]
            ])->delete();
            $image = new UnitImage;
            $name = $request->denah->getClientOriginalName();
            $image->unit_id = $unit->id;
            $image->path = $request->denah->storeAs('Unit', $name);
            $image->role = '4';
            $image->save();
        } 

        if(request()->has('path')){
            UnitImage::where([
                ['unit_id', $id],
                ['role', 3]
            ])->delete();
            $loop2 = $request->file('path');
            foreach ($loop2 as $key) {
                $image = new UnitImage;
                $name = $key->getClientOriginalName();
                $image->unit_id = $unit->id;
                $image->path = $key->storeAs('Unit', $name);
                $image->role = '3';
                $image->save();
            };
        } 

        Bonus::where('unit_id', $id)
            ->update([
                'bonus_marketing' => $request->bonus_marketing
            ]);

        return redirect()->action('UnitController@index')->with('update', 'Data unit berhasil diupdate');

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

        return redirect()->action('UnitController@index')->with('delete', 'Data unit berhasil dihapus');
    }

    // public function check($unit,  $amenity)
    // {
    //     $check = AmenityRules::where([
    //         ['unit_id', $unit],
    //         ['id_amenity', $amenity]
    //     ])->count();
        
    //     if ($check == 0) {
    //         AmenityRules::create([
    //             'unit_id'       => $unit,
    //             'id_amenity'    => $amenity
    //         ]);

    //         return response()->json('Input');
    //     } else {
    //         AmenityRules::where([
    //             ['unit_id', $unit],
    //             ['id_amenity', $amenity]
    //         ])->delete();

    //         return response()->json('Hapus');
    //     }
        
        
    //     // return response()->json($check);
    // }
}
