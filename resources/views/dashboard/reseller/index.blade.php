@extends('layouts.layout')

@section('header')
Data Reseller
@endsection
@section('content')
<div class="container">
    @if (Auth::user()->role_id != 5)
    <div class="py-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Reseller
        </button>
    </div>
    @endif


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
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('unit')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('bonus_reseller')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nama</th>
                        <th>Referral Link</th>
                        <th>Unit</th>
                        <th>Dilihat</th>
                        <th>Booking</th>
                        <th>Dibayar</th>
                        <th>Bonus Reseller</th>
                        @if (Auth::user()->role_id != 5)
                        <th>Bonus Marketing</th>
                        <th class="text-center">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reseller as $item)
                    <tr>
                        {{-- {{dd($item->unit)}} --}}
                        <td></td>
                        <td>{{$item->nama}}</td>
                        <td><a href="/ref/{{$item->uuid}}">/reff/{{$item->uuid}}</a></td>
                        <td>{{$item->unit->nama}}</td>
                        <td>{{$item->log->lihat}}</td>
                        <td>{{$item->log->book}}</td>
                        <td>{{$item->log->bayar}}</td>
                        <td>{{$item->unit->bonus->bonus_reseller}}</td>
                        @if (Auth::user()->role_id != 5)
                        <td>{{$item->unit->bonus->bonus_marketing}}</td>
                        <td class="text-center">
                            <a href="/dashboard/reseller/{{$item->id}}/delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@if (Auth::user()->role_id != 5)
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generate Referral</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/dashboard/reseller/generate" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            placeholder="Masukan Nama Reseller">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>Unit</label>
                        <select name="unit_id" class="form-control @error('unit_id') is-invalid @enderror">
                            <option value="">Pilih Unit</option>
                            @foreach ($unit as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bonus Reseller</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp </span>
                            </div>
                            <input type="text" class="form-control @error('bonus_reseller') is-invalid @enderror"
                                name="bonus_reseller" placeholder="Bonus Reseller">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Reseller</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif