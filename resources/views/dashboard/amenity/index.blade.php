@extends('layouts.layout')

@section('header')
    Data Amenity
@endsection
@section('content')
<div class="container">
    <div class="py-2">
        <a href="/dashboard/amenity/create" class="btn btn-primary">Tambah Amenity</a>
    </div>
    @if (session('store'))
    <div class="alert alert-success">
        {{ session('store') }}
    </div>
    @elseif (session('update'))
    <div class="alert alert-success">
        {{ session('update') }}
    </div>
    @elseif (session('delete'))
    <div class="alert alert-danger">
        {{ session('delete') }}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nama</th>
                        <th>Icon</th>
                        <th colspan="3" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($amenity as $item)
                    <tr>
                        <td></td>
                        <td>{{$item->nama}}</td>
                        <td><img src="{{asset('storage/'.$item->icon)}}" width="20%"></td>
                        {{-- <td class="text-center">
                            <a href="/dashboard/amenity/{{$item->id}}">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td> --}}
                        <td class="text-center ">
                            <a href="/dashboard/amenity/{{$item->id}}/edit">
                                <i class="fas fa-pen"></i>
                            </a>
                        </td>
                        <td class="text-center ">
                            <a href="/dashboard/amenity/{{$item->id}}/delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection