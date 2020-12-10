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
                                            <h3><span class="text-right">{{$unit->harga_jual}}</span></h3>
                                            <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></p>
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
                                            <img src="{{ asset('storage/'.$row->path) }}" class="img-fluid" alt="slider-properties">
                                        </div>
                                    @elseif ($row->role == 3)
                                        <div class="item carousel-item" data-slide-number="{{$row->id}}">
                                            <img src="{{ asset('storage/'.$row->path) }}" class="img-fluid" alt="slider-properties">
                                        </div>
                                    @endif
                                @endforeach
                                <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                                    @foreach ($image as $row)
                                       @if ($row->role == 1 || $row->role == 3)
                                       <li class="list-inline-item active">
                                       <a id="carousel-selector-0" class="selected" data-slide-to="{{$row->id}}" data-target="#propertiesDetailsSlider">
                                            <img src="{{ asset('storage/'.$row->path) }}" class="img-fluid" alt="properties-small">
                                        </a>
                                    </li>
                                       @endif 
                                    @endforeach
                                </ul>
                            </div>
                        </div>
    
                        <!-- Advanced search start -->
                        <div class="widget-2 advanced-search-2 d-lg-none d-xl-none">
                            <h3 class="sidebar-title">Advanced Search</h3>
                            <form method="GET">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="all-status">
                                        <option>All Status</option>
                                        <option>For Sale</option>
                                        <option>For Rent</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="all-type">
                                        <option>All Type</option>
                                        <option>Apartments</option>
                                        <option>Houses</option>
                                        <option>Commercial</option>
                                        <option>Garages</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="commercial">
                                        <option>Commercial</option>
                                        <option>Residential</option>
                                        <option>Land</option>
                                        <option>Hotels</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="location">
                                        <option>location</option>
                                        <option>New York</option>
                                        <option>Bangladesh</option>
                                        <option>India</option>
                                        <option>Canada</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="bedrooms">
                                                <option>Bedrooms</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="bathroom">
                                                <option>Bathroom</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="balcony">
                                                <option>Balcony</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select class="selectpicker search-fields" name="garage">
                                                <option>Garage</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="range-slider">
                                    <label>Area</label>
                                    <div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area" data-unit="Sq ft" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="range-slider">
                                    <label>Price</label>
                                    <div data-min="0" data-max="150000"  data-min-name="min_price" data-max-name="max_price" data-unit="USD" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="search-button">Search</button>
                                </div>
                            </form>
                        </div>
                        <!-- Advanced search end -->
    
                        <!-- Tabbing box start -->
                        <div class="tabbing tabbing-box mb-40">
                            <ul class="nav nav-tabs" id="carTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="false">Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false">Floor Plans</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="true" onclick="vr({{$unit->id}})">Video</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="4-tab" data-toggle="tab" href="#4" role="tab" aria-controls="4" aria-selected="true" onclick="tiga({{$unit->id}})">360</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="5-tab" data-toggle="tab" href="#5" role="tab" aria-controls="5" aria-selected="true">AR</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="6-tab" data-toggle="tab" href="#6" role="tab" aria-controls="6" aria-selected="true">Similar Properties</a>
                                </li> --}}
                            </ul>
                            <div class="tab-content" id="carTabContent">
                                <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
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
                                                <img src="{{ asset('storage/'.$row->path) }}" alt="floor-plans" class="img-fluid">
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
                                <div class="tab-pane fade " id="6" role="tabpanel" aria-labelledby="6-tab">
                                    <div class="similar-properties mb-30">
                                        <h3 class="heading-2">Similar Properties</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="property-box">
                                                    <div class="property-thumbnail">
                                                        <a href="properties-details.html" class="property-img">
                                                            <div class="listing-badges">
                                                                <span class="featured">Featured</span>
                                                            </div>
                                                            <div class="price-ratings-box">
                                                                <p class="price">
                                                                    $178,000
                                                                </p>
                                                                <div class="ratings">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                            </div>
    
                                                            <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                                                                <ol class="carousel-indicators">
                                                                    <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
                                                                    <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
                                                                    <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
                                                                </ol>
                                                                <div class="carousel-inner">
                                                                    <div class="carousel-item active">
                                                                        <img class="d-block w-100" src="img/properties/properties-2.jpg" alt="properties">
                                                                    </div>
                                                                    <div class="carousel-item">
                                                                        <img class="d-block w-100" src="img/properties/properties-2.jpg" alt="properties">
                                                                    </div>
                                                                    <div class="carousel-item">
                                                                        <img class="d-block w-100" src="img/properties/properties-2.jpg" alt="properties">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="detail">
                                                        <h1 class="title">
                                                            <a href="properties-details.html">Modern Family Home</a>
                                                        </h1>
                                                        <div class="location">
                                                            <a href="properties-details.html">
                                                                <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                                            </a>
                                                        </div>
                                                        <ul class="facilities-list clearfix">
                                                            <li>
                                                                <i class="flaticon-furniture"></i> 3 Bedrooms
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-holidays"></i> 2 Bathrooms
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-square"></i> Sq Ft:3400
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-vehicle"></i> 1 Garage
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="footer clearfix">
                                                        <div class="pull-left days">
                                                            <p><i class="flaticon-time"></i> 5 Days ago</p>
                                                        </div>
                                                        <ul class="pull-right">
                                                            <li><a href="#"><i class="flaticon-favorite"></i></a></li>
                                                            <li><a href="#"><i class="flaticon-multimedia"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="property-box">
                                                    <div class="property-thumbnail">
                                                        <a href="properties-details.html" class="property-img">
                                                            <div class="listing-badges">
                                                                <span class="featured">Featured</span>
                                                            </div>
                                                            <div class="price-ratings-box">
                                                                <p class="price">
                                                                    $178,000
                                                                </p>
                                                                <div class="ratings">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                            </div>
                                                            <img class="d-block w-100" src="img/properties/properties-5.jpg" alt="properties">
                                                        </a>
                                                    </div>
                                                    <div class="detail">
                                                        <h1 class="title">
                                                            <a href="properties-details.html">Relaxing Apartment</a>
                                                        </h1>
                                                        <div class="location">
                                                            <a href="properties-details.html">
                                                                <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                                            </a>
                                                        </div>
                                                        <ul class="facilities-list clearfix">
                                                            <li>
                                                                <i class="flaticon-furniture"></i> 3 Bedrooms
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-holidays"></i> 2 Bathrooms
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-square"></i> Sq Ft:3400
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-vehicle"></i> 1 Garage
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="footer clearfix">
                                                        <div class="pull-left days">
                                                            <p><i class="flaticon-time"></i> 5 Days ago</p>
                                                        </div>
                                                        <ul class="pull-right">
                                                            <li><a href="#"><i class="flaticon-favorite"></i></a></li>
                                                            <li><a href="#"><i class="flaticon-multimedia"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <!-- Properties condition start -->
                        <div class="properties-condition mb-40">
                            <h3 class="heading-2">
                                Condition
                            </h3>
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <ul class="condition">
                                        <li>
                                            <i class="flaticon-furniture"></i>2 Bedroom
                                        </li>
                                        <li>
                                            <i class="flaticon-holidays"></i>Bathroom
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <ul class="condition">
                                        <li>
                                            <i class="flaticon-square"></i>4800 sq ft
                                        </li>
                                        <li>
                                            <i class="flaticon-monitor"></i>TV Lounge
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <ul class="condition">
                                        <li>
                                            <i class="flaticon-vehicle"></i>1 Garage
                                        </li>
                                        <li>
                                            <i class="flaticon-window"></i>Balcony
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Properties condition end -->
    
                        <!-- Properties amenities start -->
                        <div class="properties-amenities mb-40">
                            <h3 class="heading-2">
                                Features
                            </h3>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <ul class="amenities">
                                        <li>
                                            <i class="flaticon-technology"></i>Air conditioning
                                        </li>
                                        <li>
                                            <i class="flaticon-window"></i>Balcony
                                        </li>
                                        <li>
                                            <i class="flaticon-beach"></i>Pool
                                        </li>
                                        <li>
                                            <i class="flaticon-holidays-1"></i>Room service
                                        </li>
                                        <li>
                                            <i class="flaticon-people-2"></i>Gym
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <ul class="amenities">
                                        <li>
                                            <i class="flaticon-connection"></i>Wifi
                                        </li>
                                        <li>
                                            <i class="flaticon-vehicle"></i>Parking
                                        </li>
                                        <li>
                                            <i class="flaticon-furniture"></i>Double Bed
                                        </li>
                                        <li>
                                            <i class="flaticon-comedy"></i>Home Theater
                                        </li>
                                        <li>
                                            <i class="flaticon-technology-3"></i>Electric
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <ul class="amenities">
                                        <li>
                                            <i class="flaticon-technology-1"></i>Telephone
                                        </li>
                                        <li>
                                            <i class="flaticon-people-3"></i>Jacuzzi
                                        </li>
                                        <li>
                                            <i class="flaticon-clock"></i>Alarm
                                        </li>
                                        <li>
                                            <i class="flaticon-vehicle"></i>Garage
                                        </li>
                                        <li>
                                            <i class="flaticon-lock"></i>Security
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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