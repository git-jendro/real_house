<?php

namespace App\Http\Controllers;

use App\AmenityRules;
use App\FacilityRules;
use App\Unit;
use App\UnitImage;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $unit = Unit::all(); 
        $marketing = User::where('role_id', '3')->get();
        $image = UnitImage::all();
        $amenity = AmenityRules::all();

        return view('welcome', compact('unit', 'marketing', 'image', 'amenity'));
    }

    public function index()
    {
        return view('dashboard/index');
    }
    
    public function dashboard()
    {
        return view('dashboard/index');
    }

    public function list()
    {
        $unit = Unit::all(); 
        $image = UnitImage::all();
        $amenity = AmenityRules::all();

        return view('list', compact('unit', 'image', 'amenity'));
    }

    public function detail($id)
    {
        $uuid = null;
        $unit = Unit::where('id',  $id)->first();
        $image = UnitImage::where('unit_id', $id)->get();
        $amenity = AmenityRules::where('unit_id', $id)->get();
        $facility = FacilityRules::where('building_id', $unit->building_id)->get();
        // dd($facility);
        return view('detail', compact('unit', 'image', 'amenity', 'facility', 'uuid'));
    }

    public function tiga($id)
    {;
        $image = UnitImage::where([
            ['unit_id', $id],
            ['role', 2]
        ])->get();

        return response()->json($image);
    }

    public function vr($id)
    {;
        $vr = Unit::where('id', $id)->get();

        return response()->json($vr);
    }
}
