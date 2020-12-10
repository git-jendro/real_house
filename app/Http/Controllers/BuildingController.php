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
        $rules = FacilityRules::all();

        return view('/dashboard/building/index', compact('building', 'rules'));
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

        return view('/dashboard/building/create', compact('project', 'facility'));
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
            'project_id' => 'required',
            'nama' => 'required|string|min:3',
            'lantai' => 'required|numeric',
            'luas' => 'required|numeric',
            'deskripsi' => 'required|min:8'
        ]);

        $building = new Building;
        $building->project_id   = $request->project_id;
        $building->nama         = $request->nama;
        $building->lantai       = $request->lantai;
        $building->luas         = $request->luas;
        $building->deskripsi    = $request->deskripsi;
        $building->save();
        
        if (request()->has('facility_id')) {
            $loop = $request->get('facility_id');
            foreach ($loop as $key) {
                $facility = new FacilityRules;
                $facility->building_id = $building->id;
                $facility->facility_id = $key;
                $facility->save();
            };
        }
        
        return redirect()->action('BuildingController@index')->with('store', 'Data building berhasil ditambahkan');
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
        $building = Building::where('id', $id)->first();
        $project = Project::all();
        $list = new Facility;
        $rules = FacilityRules::select('facility_id')->where('building_id', $id)->get();
        $facility = $list->whereHas('rules', function ($query) use ($rules){
            $query->whereIn('facility_id', $rules);
        })->get();
        $fac = $list->get();

        // dd($facility);
        return view('/dashboard/building/edit', compact('building', 'project', 'facility', 'fac' ,'rules'));
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
        // dd($request->facility_id);
        $request->validate([
            'project_id' => 'required',
            'nama' => 'required|string|min:3',
            'lantai' => 'required|numeric',
            'luas' => 'required|numeric',
            'deskripsi' => 'required|min:8'
        ]);

        $building = Building::find($id);
        $building->project_id   = $request->project_id;
        $building->nama         = $request->nama;
        $building->lantai       = $request->lantai;
        $building->luas         = $request->luas;
        $building->deskripsi    = $request->deskripsi;
        $building->save();

        if ($request->facility_id != null) {
            FacilityRules::where('building_id', $building->id)->delete();

            $loop = $request->get('facility_id');
            foreach ($loop as $key) {
                $facility = new FacilityRules;
                $facility->building_id = $building->id;
                $facility->facility_id = $key;
                $facility->save();
            };
        } else {
            FacilityRules::where('building_id', $building->id)->delete();
        }

        return redirect()->action('BuildingController@index')->with('update', 'Data building berhasil diupdate');
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
            ['building_id', $building],
            ['facility_id', $facility]
        ])->count();
        
        if ($check == 0) {
            FacilityRules::create([
                'building_id'       => $building,
                'facility_id'    => $facility
            ]);

            return response()->json('Input');
        } else {
            FacilityRules::where([
                ['building_id', $building],
                ['facility_id', $facility]
            ])->delete();

            return response()->json('Hapus');
        }
    }

    public function facility()
    {
        return response()->json('Hello');
    }
}
