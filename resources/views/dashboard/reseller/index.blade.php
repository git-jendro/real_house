@extends('layouts.layout')

@section('header')
    Data Reseller
@endsection
@section('content')
<div class="container">
    <div class="py-2">
        {{-- <a href="/dashboard/reseller/create" class="btn btn-primary">Tambah Reseller</a> --}}
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Reseller
        </button>
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
                        <th>Referral Link</th>
                        <th>Unit</th>
                        <th>Dilihat</th>
                        <th>Booking</th>
                        <th>Dibayar</th>
                        <th colspan="3" class="text-center">Action</th>
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
                        <td class="text-center">
                            <a href="/dashboard/reseller/{{$item->id}}/delete">
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
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control @error('role') is-invalid @enderror">
                        <option value="">Pilih Role</option>
                        @foreach ($role as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Unit</label>
                    <select name="unit_id" class="form-control @error('unit_id') is-invalid @enderror">
                        <option value="">Pilih Unit</option>
                        @foreach ($unit as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                    @error('unit')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Generate Referral Link</button>
            </div>
        </form>
      </div>
    </div>
  </div>