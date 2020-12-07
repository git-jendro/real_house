<?php

namespace App\Http\Controllers;

use App\Building;
use App\Facility;
use App\FacilityRules;
use App\Project;
use Illuminate\Http\Request;

class BuildingController extends Controller
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
        $building = Building::all();
        $facility = FacilityRules::all();

        return view('/building/index', compact('building', 'facility'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = Project::all();
        $facility = Facility::all();

        return view('/building/create', compact('project', 'facility'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $building = new Building;
        $building->id_project   = $request->id_project;
        $building->nama         = $request->nama;
        $building->lantai       = $request->lantai;
        $building->luas         = $request->luas;
        $building->deskripsi    = $request->deskripsi;
        $building->save();
        

        $loop = $request->get('id_facility');
        foreach ($loop as $key) {
            $facility = new FacilityRules;
            $facility->id_building = $building->id_building;
            $facility->id_facility = $key;
            $facility->save();
        };

        return redirect()->action('BuildingController@index');
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
        $building = Building::where('id_building', $id)->first();
        $project = Project::all();
        $list = new Facility;
        $rules = FacilityRules::select('id_facility')->where('id_building', $id);
        $facility = $list->whereHas('rules', function ($query) use ($rules){
            $query->whereIn('id_facility', $rules);
        })->get();
        $fac = $list->get();

        return view('/building/edit', compact('building', 'project', 'facility', 'fac'));
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
        Building::where('id_building', $id)
            ->update([
                'id_project'    => $request->id_project,
                'nama'          => $request->nama,
                'lantai'        => $request->lantai,
                'luas'          => $request->luas,
                'deskripsi'     => $request->deskripsi
            ]);

        return redirect()->action('BuildingController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Building::destroy($id);

        return redirect()->action('BuildingController@index');
    }

    public function check($building,  $facility)
    {
        $check = FacilityRules::where([
            ['id_building', $building],
            ['id_facility', $facility]
        ])->count();
        
        if ($check == 0) {
            FacilityRules::create([
                'id_building'       => $building,
                'id_facility'    => $facility
            ]);

            return response()->json('Input');
        } else {
            FacilityRules::where([
                ['id_building', $building],
                ['id_facility', $facility]
            ])->delete();

            return response()->json('Hapus');
        }
    }
}
