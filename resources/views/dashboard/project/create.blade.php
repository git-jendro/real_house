@extends('layouts.layout')

@section('header')
Tambah Data Project
@endsection
@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">From Input</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/dashboard/project/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama PT</label>
                    <input type="text" class="form-control @error('nama_pt') is-invalid @enderror" name="nama_pt"
                        placeholder="Nama PT">
                    @error('nama_pt')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Project</label>
                    <input type="nama_project" class="form-control @error('nama_project') is-invalid @enderror" name="nama_project" placeholder="Nama Project">
                    @error('nama_project')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat">
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