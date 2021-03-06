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
                        <th>Fasilitas</th>
                        <th>Jml Lantai</th>
                        <th>Luas</th>
                        <th>Deskripsi</th>
                        <th colspan="3" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($building as $item)
                    <tr>
                        <td></td>
                        <td class="col-auto">
                            {{Str::limit($item->nama, 15)}}
                        </td>
                        <td class="col-auto">
                            {{Str::limit($item->project->nama_project, 20)}}
                        </td>
                        <td>
                            @foreach ($rules as $row)
                                @if ($item->id == $row->building_id)
                                    <img src="{{ asset('storage/'.$row->facility->icon) }}" width="20px" height="20px">
                                @endif
                            @endforeach
                        </td>
                        <td class="col-auto">
                            {{$item->lantai}}
                        </td>
                        <td class="col-auto">
                            {{Str::limit($item->luas, 5)}}
                        </td>
                        <td>
                            {{Str::limit($item->deskripsi, 20)}}
                        </td>
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