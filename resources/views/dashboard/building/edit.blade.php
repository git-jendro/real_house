@extends('layouts.layout')

@section('header')
Edit Data {{$project->nama}}
@endsection
@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">From Input</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/dashboard/project/{{$project->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama PT</label>
                    <input type="text" class="form-control @error('nama_pt') is-invalid @enderror" name="nama_pt"
                        value="{{$project->nama_pt}}">
                    @error('nama_pt')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Project</label>
                    <input type="text" class="form-control @error('nama_project') is-invalid @enderror" name="nama_project" value="{{$project->nama_project}}">
                    @error('nama_project')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{$project->alamat}}">
                    @error('alamat')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection