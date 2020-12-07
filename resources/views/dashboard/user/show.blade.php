@extends('layouts.layout')

@section('header')
Edit Data {{$user->name}}
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
                <label class="float">: {{$user->name}}</label>
            </div>
            <div class="form-group">
                <label>Email</label>
                <label class="float">: {{$user->email}}</label>
            </div>
            <div class="form-group">
                <label>Role</label>
                <label class="float">: {{$user->role->nama}}</label>
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
                <td>: {{$user->name}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: {{$user->email}}</td>
            </tr>
            <tr>
                <td>Role</td>
                <td>: {{$user->role->nama}}</td>
            </tr>
        </tbody>
    </table> --}}
    <div class="d-flex flex-column bd-highlight mb-3">
        <div class="p-2 bd-highlight">
            <div class="d-flex justify-content-start">
                <div class="col-4">
                    <label>Nama</label>
                </div>
                <div class="col-4">
                    : {{$user->name}}
                </div>
            </div>
        </div>
        <div class="p-2 bd-highlight">
            <div class="d-flex justify-content-start">
                <div class="col-4">
                    <label>Email</label>
                </div>
                <div class="col-4">
                    : {{$user->email}}
                </div>
            </div>
        </div>
        <div class="p-2 bd-highlight">
            <div class="d-flex justify-content-start">
                <div class="col-4">
                    <label>Role</label>
                </div>
                <div class="col-4">
                    : {{$user->role->nama}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection