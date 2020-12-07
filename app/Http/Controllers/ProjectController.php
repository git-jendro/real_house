<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
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
        $project = Project::all();

        return view('/dashboard/project/index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/dashboard/project/create');
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
            'nama_pt' => 'required',
            'nama_project' => 'required|min:5|',
            'alamat' => 'required|min:10',
        ]);

        $project = new Project;
        $project->nama_pt = $request->nama_pt;
        $project->nama_project = $request->nama_project;
        $project->alamat = $request->alamat;
        $project->save();

        return redirect()->action('ProjectController@index')->with('stored', 'Data project berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::where('id', $id)->first();

        return view('/dashboard/project/show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::where('id', $id)->first();

        return view('/dashboard/project/edit', compact('project'));
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
            'nama_pt' => 'required',
            'nama_project' => 'required|min:5|',
            'alamat' => 'required|min:10',
        ]);

        $project = Project::find($id);
        $project->nama_pt = is_null($request->nama_pt) ? $project->nama_pt : $request->nama_pt;
        $project->nama_project = is_null($request->nama_project) ? $project->nama_project : $request->nama_project;
        $project->alamat = is_null($request->alamat) ? $project->alamat : $request->alamat;
        $project->save();

        return redirect()->action('ProjectController@index')->with('update', 'Data project berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::destroy($id);

        return redirect()->action('ProjectController@index')->with('delete', 'Data project berhasil dihapus');
    }
}
