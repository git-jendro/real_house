@extends('layouts.layout')

@section('header')
    Data User
@endsection
@section('content')
<div class="container">
    <div class="py-2">
        <a href="/dashboard/user/create" class="btn btn-primary">Tambah User</a>
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
                        <th>Email</th>
                        <th>Role</th>
                        <th colspan="3" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                    <tr>
                        <td></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->role->nama}}</td>
                        <td class="text-center">
                            <a href="/dashboard/user/{{$item->id}}">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="/dashboard/user/{{$item->id}}/edit">
                                <i class="fas fa-pen"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="/dashboard/user/{{$item->id}}/delete">
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