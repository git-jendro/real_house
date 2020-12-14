@extends('layouts.layout')

@section('header')
Tambah Data Unit
@endsection
@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">From Input</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/dashboard/unit/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Unit</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        placeholder="Nama Unit">
                    @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-4 form-group">
                            <label>Nama Building</label>
                            <select name="building_id" class="form-control @error('building_id') is-invalid @enderror"
                                name="building_id">
                                <option value="">Pilih Building</option>
                                @foreach ($building as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 form-group">
                            <label>Marketing Agent</label>
                            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror"
                                name="user_id">
                                <option value="">Pilih Agent</option>
                                @foreach ($user as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Kelengkapan</label>
                    <div class="d-flex justify-content-evenly col-5">
                        @foreach ($amenity as $item)
                        <div class="col-3 text-center">
                            <div>
                                <input type="checkbox" name="amenity_id[]" value="{{$item->id}}" class="form-control">
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
                            <label>Harga Jual</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input type="text" class="form-control @error('harga_jual') is-invalid @enderror"
                                    name="harga_jual" placeholder="Harga Jual">
                                @error('harga_jual')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col-2 form-group">
                            <label>Harga Sewa</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input type="text" class="form-control @error('harga_sewa') is-invalid @enderror"
                                    name="harga_sewa" placeholder="Harga Sewa">
                                @error('harga_sewa')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="col-2 form-group">
                            <label>Harga Cicil</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input type="text" class="form-control @error('harga_cicil') is-invalid @enderror"
                                    name="harga_cicil" placeholder="Harga Cicil">
                                @error('harga_cicil')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-2 form-group">
                            <label>Diskon</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('diskon') is-invalid @enderror"
                                    name="diskon" placeholder="Diskon">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                                @error('diskon')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-2 form-group">
                            <label>Stock</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('stock') is-invalid @enderror" name="stock"
                                    placeholder="Stock">
                                @error('stock')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-2 form-group">
                            <label>Bonus Marketing</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input type="text" class="form-control @error('bonus_marketing') is-invalid @enderror" name="bonus_marketing"
                                    placeholder="Bonus Marketing">
                                @error('bonus_marketing')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Deskripsi Building</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                        placeholder="Deskripsi Building" id="" cols="30" rows="10"></textarea>
                    @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Link Video VR</label>
                    <div class="vid py-2">
                        <div class="iframe"></div>
                    </div>
                    <input type="text" id="vr_link" class="form-control @error('vr_link') is-invalid @enderror"
                        name="vr_link" onkeyup="link()">
                    @error('vr_link')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Gambar Utama</label>
                    <div class="ugallery py-2">

                    </div>
                    <input type="file" class="form-control @error('utama') is-invalid @enderror" id="utama"
                        name="utama">
                    @error('utama')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>List Gambar</label>
                    <div class="lgallery py-2">

                    </div>
                    <input type="file" class="form-control @error('path') is-invalid @enderror" multiple name="path[]"
                        id="foto">
                    @error('path')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Gambar 360</label>
                    <div class="tgallery py-2">

                    </div>
                    <input type="file" class="form-control @error('tri') is-invalid @enderror" name="tri" id="360">
                    @error('tri')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Denah</label>
                    <div class="dgallery py-2">

                    </div>
                    <input type="file" class="form-control @error('denah') is-invalid @enderror" name="denah"
                        id="denah">
                    @error('denah')
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
<style>
    .ugallery img {
        width: 20%;
    }

    .lgallery img {
        width: 20%;
    }

    .tgallery img {
        width: 20%;
    }
</style>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(function() {
        var imagesPreview = function(input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                        $('.lgallery').html('');
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr({src: event.target.result, class: "mr-1", onclick:""}).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#foto').on('change', function() {
            imagesPreview(this, 'div.lgallery');
        });
    });
    $(function() {
        var imagesPreview = function(input, placeToInsertImagePreview) {
            
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $('.ugallery').html('');
                        $($.parseHTML('<img>')).attr({src: event.target.result, class: "mr-1", onclick:""}).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#utama').on('change', function() {
            imagesPreview(this, 'div.ugallery');
        });
    });
    $(function() {
        var imagesPreview = function(input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $('.tgallery').html('');
                        $($.parseHTML('<img>')).attr({src: event.target.result, class: "mr-1", onclick:""}).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#360').on('change', function() {
            imagesPreview(this, 'div.tgallery');
        });
    });
    $(function() {
        var imagesPreview = function(input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $('.dgallery').html('');
                        $($.parseHTML('<img>')).attr({src: event.target.result, class: "mr-1", onclick:""}).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#denah').on('change', function() {
            imagesPreview(this, 'div.dgallery');
        });
    });
    function link() {
        var vr_link = $("#vr_link").val();
        $.ajax({
            success : function(res) {
                console.log(vr_link);
                $('.iframe').html(vr_link);
            }
        })
    }
</script>