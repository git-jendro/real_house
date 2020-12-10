@extends('layouts.user')

@section('content')

<!-- Banner start -->
<div class="banner" id="banner">
    <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item banner-max-height active">
                <img class="d-block w-100" src="real-house/img/banner/banner-1.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-center">
                            <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                            <p data-animation="animated fadeInUp delay-10s">
                                This is real estate website template based on Bootstrap 4 framework.
                            </p>
                            <a href="index.html" class="btn btn-white">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item banner-max-height">
                <img class="d-block w-100" src="real-house/img/banner/banner-3.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-right">
                            <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                            <p data-animation="animated fadeInUp delay-10s">
                                This is real estate website template based on Bootstrap 4 framework.
                            </p>
                            <a href="index.html" class="btn btn-white">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item banner-max-height">
                <img class="d-block w-100" src="real-house/img/banner/banner-2.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-left">
                            <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                            <p data-animation="animated fadeInUp delay-10s">
                                This is real estate website template based on Bootstrap 4 framework.
                            </p>
                            <a href="index.html" class="btn btn-white">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#bannerCarousole" role="button" data-slide="prev">
            <span class="slider-mover-left" aria-hidden="true">
                <i class="fa fa-angle-left"></i>
            </span>
        </a>
        <a class="carousel-control-next" href="#bannerCarousole" role="button" data-slide="next">
            <span class="slider-mover-right" aria-hidden="true">
                <i class="fa fa-angle-right"></i>
            </span>
        </a>
    </div>
</div>
<!-- banner end -->

<!-- Featured Properties start -->
<div class="featured-properties content-area-9">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Featured Properties</h1>
            <p>Find Your Properties In Your City</p>
        </div>

        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                @foreach ($unit as $item)
                <div class="slick-slide-item">
                    <div class="property-box">
                        <div class="property-thumbnail" style="height: 20rem">
                            <a href="#" class="property-img">
                                @if ($item->diskon != null)
                                <div class="listing-badges">
                                    <span class="featured">Disc {{$item->diskon}} %</span>
                                </div>
                                @endif
                                <div class="price-ratings-box">
                                    <p class="price">
                                        Price : {{$item->harga_jual}}
                                    </p>
                                </div>

                                <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach ($image as $row)
                                            @if ($row->unit_id == $item->id)
                                                @if ($row->role == 1)
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" src="{{ asset('storage/'.$row->path) }}" alt="properties">
                                                    </div>
                                                @endif
                                                @if ($row->role == 3)
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="{{ asset('storage/'.$row->path) }}" alt="properties">
                                                </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="detail mt-2" style="height:13rem">
                            <h1 class="title">
                                <a href="properties-details.html">{{$item->nama}}</a>
                            </h1>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>{{$item->building->project->alamat}}
                                </a>
                            </div>
                            <ul class="facilities-list clearfix">
                                @foreach ($amenity as $row)
                                    @if ($row->unit_id == $item->id)
                                    <li class="py-2" style="line-height: 20px">
                                        <img src="{{ asset('storage/'.$row->amenity->icon) }}" width="10%" class="slick-slide mr-2">{{$row->amenity->nama}}
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="footer clearfix">
                            <div class="pull-left days">
                                <p><i class="flaticon-time"></i>
                                    @if ($item->updated_at == null)
                                        Uploaded at : {{$item->created_at}}
                                    @endif
                                    Updated at : {{$item->updated_at}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
        <div class="text-center read-more-1">
            <a href="/list" class="btn-white">Read More</a>
        </div>
    </div>
</div>
<!-- Featured Properties end -->

<!-- Services 2 start -->
<div class="services-2 content-area-5 bg-grea-3">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>What are you looking for?</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ac tortor.</p>
        </div>
        <div class="row wow">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInLeft delay-04s">
                <div class="service-info-5">
                    <i class="flaticon-apartment"></i>
                    <h4>Apartments</h4>
                    <p>Lorem ipsum dolor sit amet, consectur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInLeft delay-04s">
                <div class="service-info-5">
                    <i class="flaticon-internet"></i>
                    <h4>Houses</h4>
                    <p>Lorem ipsum dolor sit amet, consectur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInRight delay-04s">
                <div class="service-info-5">
                    <i class="flaticon-vehicle"></i>
                    <h4>Garages</h4>
                    <p>Lorem ipsum dolor sit amet, consectur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInRight delay-04s">
                <div class="service-info-5">
                    <i class="flaticon-coins"></i>
                    <h4>Commercial</h4>
                    <p>Lorem ipsum dolor sit amet, consectur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                </div>
            </div>
        </div>
        <div class="text-center read-more-2">
            <a href="services-1.html" class="btn-white">Read More</a>
        </div>
    </div>
</div>
<!-- Services 2 end -->

<!-- Our team 2 start -->
<div class="our-team-2 content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Agent</h1>
            <p>Meet out small team that make those great products.</p>
        </div>
        <div class="row">
            @foreach ($marketing as $item)
            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInLeft delay-04s">
                <div class="team-1">
                    <div class="team-photo">
                        <a href="#">
                            <img src="real-house/img/avatar/avatar-7.jpg" alt="agent-2" class="img-fluid">
                        </a>
                    </div>
                    <div class="team-details">
                        <h5><a href="#">{{$item->name}}</a></h5>
                        <h6>{{$item->role->nama}}</h6>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Our team 2 end -->
@endsection