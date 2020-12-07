@extends('layouts.layout')

@section('header')
    Data Building
@endsection
@section('content')
<div class="container">
    <div class="py-2">
        <a href="/dashboard/building/create" class="btn btn-primary">Tambah Building</a>
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nama</th>
                        <th>Project</th>
                        <th>Jumlah Lantai</th>
                        <th>Luas Building</th>
                        <th>deskripsi</th>
                        <th colspan="3" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($building as $item)
                    <tr>
                        <td></td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->project_id}}</td>
                        <td>{{$item->lantai}}</td>
                        <td>{{$item->luas}}</td>
                        <td>{{$item->deskripsi}}</td>
                        <td class="text-center">
                            <a href="/dashboard/building/{{$item->id}}">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="/dashboard/building/{{$item->id}}/edit">
                                <i class="fas fa-pen"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="/dashboard/building/{{$item->id}}/delete">
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