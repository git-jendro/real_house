@extends('layouts.layout')

@section('header')
Tambah Data Building
@endsection
@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">From Input</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/dashboard/building/{{$building->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Building</label>
                    <input type="hidden" id="building" value="{{$building->id}}">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        value="{{$building->nama}}">
                    @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Project</label>
                    <select name="project_id" class="form-control @error('project_id') is-invalid @enderror"
                        name="project_id">
                        <option value="{{$building->project_id}}">{{$building->project->nama_project}}</option>
                        @foreach ($project as $item)
                        <option value="{{$item->id}}">{{$item->nama_project}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Facility</label>
                    <div class="d-flex justify-content-evenly col-5">
                        @foreach ($fac as $item)
                        {{-- {{dd($rules)}} --}}
                        <div class="col-3 text-center">
                            <div>
                                <input type="checkbox" name="facility_id[]" value="{{$item->id}}" class="form-control" @foreach ($facility as $row) {{$item->id == $row->id ? 'checked' : ''}} @endforeach>
                                {{$item->nama}}
                            </div>
                            <div>
                                <img src="{{ asset('storage/'.$item->icon) }}" alt="{{$item->id}}" width="30px"
                                    height="30px">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-2 form-group">
                            <label>Jumlah Lantai</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Lt.</span>
                                </div>
                                <input type="text" class="form-control @error('lantai') is-invalid @enderror"
                                    name="lantai" value="{{$building->lantai}}">
                                @error('lantai')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-2 form-group">
                            <label>Luas Building</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('luas') is-invalid @enderror" name="luas"
                                    value="{{$building->luas}}">
                                <div class="input-group-append">
                                    <span class="input-group-text">m<sup>2</sup></span>
                                </div>
                                @error('luas')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi Building</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" cols="30" rows="10">{{$building->deskripsi}}</textarea>
                    @error('deskripsi')
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
