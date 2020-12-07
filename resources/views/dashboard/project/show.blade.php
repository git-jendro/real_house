@extends('layouts.layout')

@section('header')
Edit Data {{$project->nama_pt}}
@endsection
@section('content')
<div class="container">
    {{-- <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Profil</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <label class="float">: {{$project->nama_pt}}</label>
            </div>
            <div class="form-group">
                <label>Email</label>
                <label class="float">: {{$project->email}}</label>
            </div>
            <div class="form-group">
                <label>Role</label>
                <label class="float">: {{$project->role->nama}}</label>
            </div>
        </div>
    </div> --}}
    {{-- <table class="table table-striped borderless">
        <thead>
            <tr>
                <th>Profil</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nama</td>
                <td>: {{$project->nama_pt}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: {{$project->email}}</td>
            </tr>
            <tr>
                <td>Role</td>
                <td>: {{$project->role->nama}}</td>
            </tr>
        </tbody>
    </table> --}}
    <div class="d-flex flex-column bd-highlight mb-3">
        <div class="p-2 bd-highlight">
            <div class="d-flex justify-content-start">
                <div class="col-4">
                    <label>Nama PT</label>
                </div>
                <div class="col-4">
                    : {{$project->nama_pt}}
                </div>
            </div>
        </div>
        <div class="p-2 bd-highlight">
            <div class="d-flex justify-content-start">
                <div class="col-4">
                    <label>Nama Project</label>
                </div>
                <div class="col-4">
                    : {{$project->nama_project}}
                </div>
            </div>
        </div>
        <div class="p-2 bd-highlight">
            <div class="d-flex justify-content-start">
                <div class="col-4">
                    <label>Alamat</label>
                </div>
                <div class="col-4">
                    : {{$project->alamat}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection