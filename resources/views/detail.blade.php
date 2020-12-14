@extends('layouts.user')

@section('title')
| {{$unit->nama}}
@endsection

@section('content')
<div id="content">
    <div class="properties-details-page content-area-7">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="properties-details-section">
                        <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                            <!-- Heading properties start -->
                            <div class="heading-properties-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-left">
                                            <h3>{{$unit->nama}}</h3>
                                            <p><i class="fa fa-map-marker"></i>{{$unit->building->project->alamat}},</p>
                                        </div>
                                        <div class="pull-right">
                                            {{-- {{dd($uuid)}} --}}
                                            <h3><span class="text-right">{{$unit->harga_jual}} <a @if ($uuid !=null) href="/buy/{{$uuid}}/{{$unit->id}}/ref" @endif href="/buy/{{$unit->id}}" class="btn btn-primary">Beli</a></span></h3>
                                            {{-- <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star-half-o"></i></p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Heading properties end -->

                            <!-- main slider carousel items -->
                            <div class="carousel-inner">
                                @foreach ($image as $row)
                                @if ($row->role == 1)
                                <div class="item carousel-item active" data-slide-number="{{$row->id}}">
                                    <img src="{{ asset('storage/'.$row->path) }}" class="img-fluid"
                                        alt="slider-properties">
                                </div>
                                @elseif ($row->role == 3)
                                <div class="item carousel-item" data-slide-number="{{$row->id}}">
                                    <img src="{{ asset('storage/'.$row->path) }}" class="img-fluid"
                                        alt="slider-properties">
                                </div>
                                @endif
                                @endforeach
                                <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                                    @foreach ($image as $row)
                                    @if ($row->role == 1 || $row->role == 3)
                                    <li class="list-inline-item active">
                                        <a id="carousel-selector-0" class="selected" data-slide-to="{{$row->id}}"
                                            data-target="#propertiesDetailsSlider">
                                            <img src="{{ asset('storage/'.$row->path) }}" class="img-fluid"
                                                alt="properties-small">
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Tabbing box start -->
                        <div class="tabbing tabbing-box mb-40">
                            <ul class="nav nav-tabs" id="carTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one"
                                        role="tab" aria-controls="one" aria-selected="false">Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab"
                                        aria-controls="two" aria-selected="false">Floor Plans</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab"
                                        aria-controls="three" aria-selected="true" onclick="vr({{$unit->id}})">Video</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="4-tab" data-toggle="tab" href="#4" role="tab"
                                        aria-controls="4" aria-selected="true" onclick="tiga({{$unit->id}})">360</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="5-tab" data-toggle="tab" href="#5" role="tab"
                                        aria-controls="5" aria-selected="true">AR</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="6-tab" data-toggle="tab" href="#6" role="tab" aria-controls="6" aria-selected="true">Similar Properties</a>
                                </li> --}}
                            </ul>
                            <div class="tab-content" id="carTabContent">
                                <div class="tab-pane fade active show" id="one" role="tabpanel"
                                    aria-labelledby="one-tab">
                                    <div class="properties-description mb-50">
                                        <h3 class="heading-2">
                                            Deskripsi
                                        </h3>
                                        <p>
                                            {{$unit->deskripsi}}
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                                    <div class="floor-plans mb-50">
                                        <h3 class="heading-2">Floor Plans</h3>
                                        @foreach ($image as $row)
                                        @if ($row->role == 4)
                                        <img src="{{ asset('storage/'.$row->path) }}" alt="floor-plans"
                                            class="img-fluid">
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="three-tab">
                                    <div class="property-details mb-40" id="vr">
                                        <h3 class="heading-2">Video</h3>
                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade " id="4" role="tabpanel" aria-labelledby="4-tab">
                                    <div class="inside-properties mb-50">
                                        <h3 class="heading-2">
                                            360
                                        </h3>
                                        <iframe src="https://www.youtube.com/embed/5e0LxrLSzok" allowfullscreen=""></iframe>
                                    </div>
                                </div> --}}
                                <div class="tab-pane fade " id="5" role="tabpanel" aria-labelledby="5-tab">
                                    <div class="location mb-50">
                                        <div class="map">
                                            <h3 class="heading-2">Property Location</h3>
                                            <div id="map" class="contact-map"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Properties condition start -->
                        <div class="properties-condition mb-40">
                            <h3 class="heading-2">
                                Fasilitas Gedung
                            </h3>
                            <div class="row">
                                @foreach ($facility as $row)
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <ul class="facilities-list clearfix">
                                        @if ($row->building_id == $unit->building_id)
                                        <li class="py-2" style="line-height: 20px">
                                            <img src="{{ asset('storage/'.$row->facility->icon) }}" width="10%"
                                                class="mr-2">{{$row->facility->nama}}
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Properties condition end -->

                        <!-- Properties amenities start -->
                        <div class="properties-amenities mb-40">
                            <h3 class="heading-2">
                                Kelengkapan Unit
                            </h3>
                            <div class="row">
                                @foreach ($amenity as $row)
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <ul class="facilities-list clearfix">
                                        @if ($row->unit_id == $unit->id)
                                        <li class="py-2" style="line-height: 20px">
                                            <img src="{{ asset('storage/'.$row->amenity->icon) }}" width="10%"
                                                class="mr-2">{{$row->amenity->nama}}
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-left">
                        <!-- Advanced search start -->
                        <div class="widget search-area advanced-search d-none d-xl-block d-lg-block">
                            <h3 class="sidebar-title">Advanced Search</h3>
                            <form method="GET">
                                <div class="form-group">
                                    <div class="dropdown bootstrap-select search-fields"><select
                                            class="selectpicker search-fields" name="all-status" tabindex="-98">
                                            <option>All Status</option>
                                            <option>For Sale</option>
                                            <option>For Rent</option>
                                        </select><button type="button" class="btn dropdown-toggle btn-light"
                                            data-toggle="dropdown" role="button" title="All Status">
                                            <div class="filter-option">
                                                <div class="filter-option-inner">All Status</div>
                                            </div>&nbsp;<span class="bs-caret"><span class="caret"></span></span>
                                        </button>
                                        <div class="dropdown-menu " role="combobox">
                                            <div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
                                                <ul class="dropdown-menu inner show"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="dropdown bootstrap-select search-fields"><select
                                            class="selectpicker search-fields" name="all-type" tabindex="-98">
                                            <option>All Type</option>
                                            <option>Apartments</option>
                                            <option>Houses</option>
                                            <option>Commercial</option>
                                            <option>Garages</option>
                                        </select><button type="button" class="btn dropdown-toggle btn-light"
                                            data-toggle="dropdown" role="button" title="All Type">
                                            <div class="filter-option">
                                                <div class="filter-option-inner">All Type</div>
                                            </div>&nbsp;<span class="bs-caret"><span class="caret"></span></span>
                                        </button>
                                        <div class="dropdown-menu " role="combobox">
                                            <div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
                                                <ul class="dropdown-menu inner show"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="dropdown bootstrap-select search-fields"><select
                                            class="selectpicker search-fields" name="commercial" tabindex="-98">
                                            <option>Commercial</option>
                                            <option>Residential</option>
                                            <option>Land</option>
                                            <option>Hotels</option>
                                        </select><button type="button" class="btn dropdown-toggle btn-light"
                                            data-toggle="dropdown" role="button" title="Commercial">
                                            <div class="filter-option">
                                                <div class="filter-option-inner">Commercial</div>
                                            </div>&nbsp;<span class="bs-caret"><span class="caret"></span></span>
                                        </button>
                                        <div class="dropdown-menu " role="combobox">
                                            <div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
                                                <ul class="dropdown-menu inner show"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="dropdown bootstrap-select search-fields"><select
                                            class="selectpicker search-fields" name="location" tabindex="-98">
                                            <option>location</option>
                                            <option>New York</option>
                                            <option>Bangladesh</option>
                                            <option>India</option>
                                            <option>Canada</option>
                                        </select><button type="button" class="btn dropdown-toggle btn-light"
                                            data-toggle="dropdown" role="button" title="location">
                                            <div class="filter-option">
                                                <div class="filter-option-inner">location</div>
                                            </div>&nbsp;<span class="bs-caret"><span class="caret"></span></span>
                                        </button>
                                        <div class="dropdown-menu " role="combobox">
                                            <div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
                                                <ul class="dropdown-menu inner show"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="dropdown bootstrap-select search-fields"><select
                                                    class="selectpicker search-fields" name="bedrooms" tabindex="-98">
                                                    <option>Bedrooms</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select><button type="button" class="btn dropdown-toggle btn-light"
                                                    data-toggle="dropdown" role="button" title="Bedrooms">
                                                    <div class="filter-option">
                                                        <div class="filter-option-inner">Bedrooms</div>
                                                    </div>&nbsp;<span class="bs-caret"><span
                                                            class="caret"></span></span>
                                                </button>
                                                <div class="dropdown-menu " role="combobox">
                                                    <div class="inner show" role="listbox" aria-expanded="false"
                                                        tabindex="-1">
                                                        <ul class="dropdown-menu inner show"></ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="dropdown bootstrap-select search-fields"><select
                                                    class="selectpicker search-fields" name="bathroom" tabindex="-98">
                                                    <option>Bathroom</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select><button type="button" class="btn dropdown-toggle btn-light"
                                                    data-toggle="dropdown" role="button" title="Bathroom">
                                                    <div class="filter-option">
                                                        <div class="filter-option-inner">Bathroom</div>
                                                    </div>&nbsp;<span class="bs-caret"><span
                                                            class="caret"></span></span>
                                                </button>
                                                <div class="dropdown-menu " role="combobox">
                                                    <div class="inner show" role="listbox" aria-expanded="false"
                                                        tabindex="-1">
                                                        <ul class="dropdown-menu inner show"></ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="dropdown bootstrap-select search-fields"><select
                                                    class="selectpicker search-fields" name="balcony" tabindex="-98">
                                                    <option>Balcony</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select><button type="button" class="btn dropdown-toggle btn-light"
                                                    data-toggle="dropdown" role="button" title="Balcony">
                                                    <div class="filter-option">
                                                        <div class="filter-option-inner">Balcony</div>
                                                    </div>&nbsp;<span class="bs-caret"><span
                                                            class="caret"></span></span>
                                                </button>
                                                <div class="dropdown-menu " role="combobox">
                                                    <div class="inner show" role="listbox" aria-expanded="false"
                                                        tabindex="-1">
                                                        <ul class="dropdown-menu inner show"></ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="dropdown bootstrap-select search-fields"><select
                                                    class="selectpicker search-fields" name="garage" tabindex="-98">
                                                    <option>Garage</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select><button type="button" class="btn dropdown-toggle btn-light"
                                                    data-toggle="dropdown" role="button" title="Garage">
                                                    <div class="filter-option">
                                                        <div class="filter-option-inner">Garage</div>
                                                    </div>&nbsp;<span class="bs-caret"><span
                                                            class="caret"></span></span>
                                                </button>
                                                <div class="dropdown-menu " role="combobox">
                                                    <div class="inner show" role="listbox" aria-expanded="false"
                                                        tabindex="-1">
                                                        <ul class="dropdown-menu inner show"></ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="range-slider">
                                    <label>Area</label>
                                    <div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area"
                                        data-unit="Sq ft"
                                        class="range-slider-ui ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                        aria-disabled="false"><span class="min-value">0 Sq ft</span> <span
                                            class="max-value">10000 Sq ft</span><input class="current-min" type="hidden"
                                            name="min_area" value="0"><input class="current-max" type="hidden"
                                            name="max_area" value="10000">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"
                                            style="left: 0%; width: 100%;"></div><a
                                            class="ui-slider-handle ui-state-default ui-corner-all" href="#"
                                            style="left: 0%;"></a><a
                                            class="ui-slider-handle ui-state-default ui-corner-all" href="#"
                                            style="left: 100%;"></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="range-slider">
                                    <label>Price</label>
                                    <div data-min="0" data-max="150000" data-min-name="min_price"
                                        data-max-name="max_price" data-unit="USD"
                                        class="range-slider-ui ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                        aria-disabled="false"><span class="min-value">0 USD</span> <span
                                            class="max-value">150000 USD</span><input class="current-min" type="hidden"
                                            name="min_price" value="0"><input class="current-max" type="hidden"
                                            name="max_price" value="150000">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"
                                            style="left: 0%; width: 100%;"></div><a
                                            class="ui-slider-handle ui-state-default ui-corner-all" href="#"
                                            style="left: 0%;"></a><a
                                            class="ui-slider-handle ui-state-default ui-corner-all" href="#"
                                            style="left: 100%;"></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <a class="show-more-options" data-toggle="collapse" data-target="#options-content">
                                    <i class="fa fa-plus-circle"></i> Show More Options
                                </a>
                                <div id="options-content" class="collapse">
                                    <label class="margin-t-10">Features</label>
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox1" type="checkbox">
                                        <label for="checkbox1">
                                            Free Parking
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox2" type="checkbox">
                                        <label for="checkbox2">
                                            Air Condition
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox3" type="checkbox">
                                        <label for="checkbox3">
                                            Places to seat
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox4" type="checkbox">
                                        <label for="checkbox4">
                                            Swimming Pool
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox5" type="checkbox">
                                        <label for="checkbox5">
                                            Laundry Room
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox6" type="checkbox">
                                        <label for="checkbox6">
                                            Window Covering
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox7" type="checkbox">
                                        <label for="checkbox7">
                                            Central Heating
                                        </label>
                                    </div>
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox8" type="checkbox">
                                        <label for="checkbox8">
                                            Alarm
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <button class="search-button">Search</button>
                                </div>
                            </form>
                        </div>
                        {{-- <!-- Posts by category start -->
                        <div class="posts-by-category widget">
                            <h3 class="sidebar-title">Category</h3>
                            <ul class="list-unstyled list-cat">
                                <li><a href="#">Single Family <span>(45)</span></a></li>
                                <li><a href="#">Apartment <span>(21)</span> </a></li>
                                <li><a href="#">Condo <span>(23)</span></a></li>
                                <li><a href="#">Multi Family <span>(19)</span></a></li>
                                <li><a href="#">Villa <span>(19)</span></a> </li>
                                <li><a href="#">Other <span>(22) </span></a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript" src="{{asset('pannellum/pannellum.js')}}"></script>
<script>
    function tiga(id) {
        $('#content').html('');
        $('#footer').html('');
        $('#content').append('<div id="panel"><button onclick="back('+id+')" class="w3-button w3-block w3-white" type="button">Back</button></div></div></div>');
        $.ajax({
            type : 'GET',
            url : 'http://localhost:8000/360/'+id,
            success : function(res){
                $.each(res, function(i, item){
                    pannellum.viewer('panel', {
                        "type": "equirectangular",
                        "autoLoad" : true,
                        "panorama": "http://localhost:8000/storage/"+item.path,
                    });
                })
            }
        })
    }
    function vr(id) {
        $.ajax({
            type : 'GET',
            url : 'http://localhost:8000/vr/'+id,
            success : function(res){
                $.each(res, function(i, item){
                    console.log(item.vr_link);
                    $('#vr').append(item.vr_link);
                })
            }
        })
    }
    function back(id) {
        window.location.href = "http://localhost:8000/detail/"+id;
    }
</script>