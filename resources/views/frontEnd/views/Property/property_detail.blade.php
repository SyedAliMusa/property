@extends('frontEnd.layout.default')
@section('content')

    <div class="page-content">
        <!-- Banner Section -->
        <div id="page-banner-section" class="page-banner-section container-fluid p_z">
            <img src="{{ asset('frontEnd') }}/banner/propertyDetailBanner.jpg" alt="banner">
            <!-- Banner Inner -->
            <div class="page-title">
                <div class="container ">
                    <div class="banner-inner">
                        <h2>Property Detail</h2>
                    </div>
                </div>
                <div class="pages-breadcrumb">
                    <div class="container">
                        <!-- Page breadcrumb -->
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Detail page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- Banner Inner /- -->
        </div><!-- Banner Section /- -->

        <!-- Property Detail Page -->
        <div class="property-main-details">
            <!-- container -->
            @if(isset($property) && !empty($property))
                <div class="container">
                <div class="property-header">
                    <h3> {{ $property->title }} <span>For {{ $property->type }}</span></h3>
                    <ul>
                        @if($property->type == 'Rent')
                            <li>{{ $property->price }}/mon</li>
                        @else
                            <li>{{ $property->price }}</li>
                        @endif
                        <li>Product ID : {{ $property->property_id }}</li>
                        <li><i class="fa fa-expand"></i>{{ $property->area }} {{ $property->area_unit }}</li>
                        <li><i><img src="{{ asset('frontEnd') }}/images/icon/bed-icon.png" alt="bed-icon" /></i>{{ $property->bedrooms }}</li>
                        <li><i><img src="{{ asset('frontEnd') }}/images/icon/bath-icon.png" alt="bath-icon" /></i>{{ $property->bathrooms }}</li>
                        @if($property->garage)
                            <li><i class="fa fa-car"></i>Yes</li>
                        @else
                            <li><i class="fa fa-car"></i>N/A</li>
                        @endif
                    </ul>
                    <a title="print" href="#"><i class="fa fa-print"></i> Print</a>
                </div>
                <div class="property-details-content container-fluid p_z">
                    <!-- col-md-9 -->
                    <div class="col-md-9 col-sm-6 p_z">
                        <!-- Slider Section -->
                        <div id="property-detail1-slider" class="carousel slide property-detail1-slider" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                @if($property->propertyImages)
                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach($property->propertyImages as $image)
                                        @if($count == 0)
                                            @php $count++; continue; @endphp
                                        @endif
                                        @if($count == 1)
                                            <div class="item active">
                                                <img src="{{ asset('PropertyImages') }}/{{ $path }}/{{ $image->image_name }}" alt="Slide">
                                            </div>
                                        @else
                                            <div class="item">
                                                <img src="{{ asset('PropertyImages') }}/{{ $path }}/{{ $image->image_name }}" alt="Slide">
                                            </div>
                                        @endif
                                        @php $count++; @endphp
                                    @endforeach
                                @else
                                    <div class="item active">
                                        <img src="{{ asset('frontEnd') }}/images/details/detail-slide-1.jpg" alt="Slide">
                                    </div>
                                @endif
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#property-detail1-slider" role="button" data-slide="prev">
                                <span class="fa fa-long-arrow-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#property-detail1-slider" role="button" data-slide="next">
                                <span class="fa fa-long-arrow-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div><!-- Slider Section /- -->
                        <div class="single-property-details">
                            <h3>Description</h3>
                            <p>{{ $property->description }}</p>
                        </div>
                        <div class="property-direction pull-left">
                            <h3>Get Direction</h3>
                            <div class="property-map">
                                <p>{{ $property->address }}</p>
                            </div>
                        </div>
                        @if($property->propertyFeatures)
                            <div class="general-amenities pull-left">
                                <h3>General amenities</h3>
                                <div class="amenities-list pull-left">
                                    @foreach($property->propertyFeatures as $feature)
                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" id="checkbox-1" checked>
                                            <label>{{ $feature->features }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="property-direction pull-left">
                            <div class="property-map">
                                <h3>Share This Property :</h3>
                                <ul>
                                    <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" title="google-plus"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" title="linkedin-square"><i class="fa fa-linkedin-square"></i></a></li>
                                    <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#" title="instagram"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- col-md-9 /- -->
                    <div class="col-md-3 col-sm-6 p_z property-sidebar single-property-sidebar">
                        <div class="agent-details">
                            <div class="agent-header">
                                <div class="agent-img">
                                    <img src="{{ asset('frontEnd') }}/images/single-property/agent.jpg" alt="agent" /></div>
                                <div class="agent-name">
                                    <h5>{{ $property->user->name }}</h5>
                                    <ul class="property-social p_l_z m_b_z">
                                        <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" title="google-plus"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                                <p>{{ $property->user->bio }}</p>
                            </div>
                            <p><i class="fa fa-phone"></i>{{ $property->user->mobile }}</p>
                            <p><i class="fa fa-envelope-o"></i><a href="mailto:info@johndoe.com" title="mail">{{ $property->user->email }}</a></p>
                            <a title="View More" href="{{ route('profile', $property->user->id) }}" class="view-more">View Profile</a>
                        </div>
                        <aside class="widget widget-search"></aside>
                        {{--<aside class="widget widget-search">
                            <h2 class="widget-title">Send Message to<span>John Doe</span></h2>
                            <form>
                                <input type="text" placeholder="Your Name" />
                                <input type="text" placeholder="Your Email ID" />
                                <textarea placeholder="Message"></textarea>
                                <input type="submit" value="Submit" class="btn">
                            </form>
                        </aside>--}}
                        <aside class="widget widget-property-featured">
                            <h2 class="widget-title">Most<span>Recent</span></h2>
                            @if($latest)
                                @foreach($latest as $lat)
                                    @php $pth = 'Rent'; if($lat->type == 'Sale') { $pth = 'Sale';} @endphp
                                    <div class="property-featured-inner">
                                        <div class="col-md-4 col-sm-3 col-xs-2 p_z">
                                            <a href="#" title="Featured Property"><img src="{{ asset('PropertyImages') }}/{{ $pth }}/{{ $lat->featured_image }}" alt="featured" /></a>
                                        </div>
                                        <div class="col-md-8 col-sm-9 col-xs-10 featured-content">
                                            <a href="#" title="Fetured Property">{{ $lat->title }}</a>
                                            @if($lat->type == 'Rent')
                                                <h3>{{ $lat->price }}/pm</h3>
                                            @else
                                                <h3>{{ $lat->price }}</h3>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </aside>
                    </div>
                </div>
            </div>
            @endif
            <!-- container /- -->
        </div><!-- Property Detail Page /- -->
    </div><!-- Page Content -->

@stop
