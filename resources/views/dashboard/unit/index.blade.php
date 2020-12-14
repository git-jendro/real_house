@extends('layouts.layout')

@section('header')
    Data Unit
@endsection
@section('content')
<div class="container">
    @if (Auth::user()->role_id == 1)
    <div class="py-2">
        <a href="/dashboard/unit/create" class="btn btn-primary">Tambah Unit</a>
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
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th class="col-auto">Nama</th>
                        <th class="col-auto">Building</th>
                        <th class="col-auto">Kelengkapan</th>
                        <th class="col-auto">Gambar</th>
                        <th class="col-auto">Harga Jual</th>
                        <th class="col-auto">Stock</th>
                        <th class="col-auto">Diskon</th>
                        @if (Auth::user()->role_id != 5)
                        <th class="col-auto">Bonus Marketing</th>
                        @if (Auth::user()->role_id == 1)
                        <th colspan="3" class="text-center">Action</th>
                        @endif
                        @endif
                        <th colspan="3" class="text-center">Share</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unit as $item)
                    <tr>
                        <td></td>
                        <td class="col-auto">
                            {{Str::limit($item->nama, 15)}}
                        </td>
                        <td class="col-auto">
                            {{Str::limit($item->building->nama, 20)}}
                        </td>
                        <td>
                            @foreach ($rules as $row)
                                @if ($item->id == $row->unit_id)
                                    <img src="{{ asset('storage/'.$row->amenity->icon) }}" width="20px" height="20px">
                                @endif
                            @endforeach
                        </td>
                        <td class="col-auto">
                            @foreach ($image as $row)
                                @if ($item->id == $row->unit_id)
                                    <img src="{{ asset('storage/'.$row->path) }}" width="20px" height="20px">
                                @endif
                            @endforeach
                        </td>
                        <td class="col-auto">
                            {{$item->harga_jual}}
                        </td>
                        <td class="col-auto">
                            {{$item->stock}}
                        </td>
                        <td class="col-auto">
                            {{$item->diskon}}
                        </td>
                        @if (Auth::user()->role_id != 5)
                        <td>
                            {{$item->bonus->bonus_marketing}}
                        </td>
                        @if (Auth::user()->role_id == 1)
                        <td class="text-center">
                            <a href="/dashboard/unit/{{$item->id}}">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="/dashboard/unit/{{$item->id}}/edit">
                                <i class="fas fa-pen"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="/dashboard/unit/{{$item->id}}/delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        @endif
                        @endif
                        <td class="text-center">
                            <a href="whatsapp://send?text=www.real-house.com/ref/{{$item->reseller->uuid}}" data-action="share/whatsapp/share"><i class="fab fa-whatsapp"></i></a>
                            {{-- <a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share">
                                <a href="/ref/{{$item->reseller->uuid}}">/ref/{{$item->reseller->uuid}}</a>
                            </a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection