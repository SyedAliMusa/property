@extends('frontEnd.layout.default')
@section('content')

    <!-- Page Content -->
    <div class="page-content">
        <!-- Banner Section -->
        <div id="page-banner-section" class="page-banner-section container-fluid p_z">
            <img src="{{ asset('frontEnd') }}/banner/propertyDetailBanner.jpg" alt="banner">
            <!-- Banner Inner -->
            <div class="page-title">
                <div class="container">
                    <div class="banner-inner">
                        <h2>Property List</h2>
                    </div>
                </div>
                <div class="pages-breadcrumb">
                    <div class="container">
                        <!-- Page breadcrumb -->
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Listing</li>
                        </ol>
                    </div>
                </div>
            </div><!-- Banner Inner /- -->
        </div><!-- Banner Section /- -->

        <!-- Property Listing Section -->
        <div id="property-listing" class="property-listing">
            <div class="container">
                <div class="property-left col-md-9 col-sm-6 p_l_z content-area">
                    <div class="section-header p_l_z">
                        <div class="col-md-10 col-sm-10 p_l_z">
                            <p>property</p>
                            <h3>listing</h3>
                        </div>
                    </div>

                    <div class="property-listing-row row">
                        @if(isset($list) && $list != null)
                            @php $counter = 1; @endphp
                            @foreach($list as $l)
                                <div class="col-md-4 col-sm-12 {{ propertyBlock($l->type) }}">
                                     <!-- Property Main Box -->
                                    <div class="property-main-box">
                                        <div class="property-images-box">
                                            <span>{{ propertyType($l->type) }}</span>
                                            <a title="Property Image" href="{{ route('showProperty', $l->id) }}"><img src="{{ fileExist262($l->type, $l->home_image)  }}" alt="featured" /></a>
                                            <h4>{{ propertyPrice($l->type, $l->price) }}</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="property-details">
                                            <a title="Property Title" href="{{ route('showProperty', $l->id) }}">{{ $l->title }}</a>
                                            <ul>
                                                <li><i class="fa fa-expand"></i>{{ $l->area }} {{ $l->area_unit }}</li>
                                                <li><i><img src="{{ asset('frontEnd') }}/images/icon/bed-icon.png" alt="bed-icon" /></i>{{ $l->bedrooms }}</li>
                                                <li><i><img src="{{ asset('frontEnd') }}/images/icon/bath-icon.png" alt="bath-icon" /></i>{{ $l->bathrooms }}</li>
                                            </ul>
                                        </div>
                                    </div><!-- Property Main Box /- -->
                                </div><!-- Col-md-4 /- -->
                                @if($counter%3 == 0)
                                    </div>
                                    <div class="separator"></div>
                                    <div class="property-listing-row row">
                                @endif
                                @php $counter++; @endphp
                            @endforeach
                        @endif
                    </div>

                    <!-- Pagination -->
                    <div class="listing-pagination">
                        {{ $list->links() }}
                    </div><!-- Pagination /- -->
                </div>
                <div class="col-md-3 col-sm-6 p_r_z property-sidebar widget-area">
                    <aside class="widget widget-search">
                        <h2 class="widget-title">search<span>property</span></h2>
                        <form>
                            <select>
                                <option value="selected">Property ID</option>
                                <option value="one">One</option>
                                <option value="two">Two</option>
                                <option value="three">Three</option>
                                <option value="four">Four</option>
                                <option value="five">Five</option>
                            </select>
                            <select>
                                <option value="selected">Location</option>
                                <option value="one">One</option>
                                <option value="two">Two</option>
                                <option value="three">Three</option>
                                <option value="four">Four</option>
                                <option value="five">Five</option>
                            </select>
                            <select>
                                <option value="selected">Type</option>
                                <option value="one">One</option>
                                <option value="two">Two</option>
                                <option value="three">Three</option>
                                <option value="four">Four</option>
                                <option value="five">Five</option>
                            </select>
                            <select>
                                <option value="selected">Status</option>
                                <option value="one">One</option>
                                <option value="two">Two</option>
                                <option value="three">Three</option>
                                <option value="four">Four</option>
                                <option value="five">Five</option>
                            </select>
                            <div class="col-md-6 col-sm-12 p_l_z">
                                <select>
                                    <option value="selected">Beds</option>
                                    <option value="one">One</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                    <option value="four">Four</option>
                                    <option value="five">Five</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 p_r_z">
                                <select>
                                    <option value="selected">Baths</option>
                                    <option value="one">One</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                    <option value="four">Four</option>
                                    <option value="five">Five</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 p_l_z">
                                <select>
                                    <option value="selected">Min Price</option>
                                    <option value="one">One</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                    <option value="four">Four</option>
                                    <option value="five">Five</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 p_r_z">
                                <select>
                                    <option value="selected">Max Price</option>
                                    <option value="one">$3000</option>
                                    <option value="two">$30000</option>
                                    <option value="three">$300000</option>
                                    <option value="four">$3000000</option>
                                    <option value="five">$3000000000000000</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 p_l_z">
                                <select>
                                    <option value="selected">Min Sqft</option>
                                    <option value="one">One</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                    <option value="four">Four</option>
                                    <option value="five">Five</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 p_r_z">
                                <select>
                                    <option value="selected">Max Sqft</option>
                                    <option value="one">One</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                    <option value="four">Four</option>
                                    <option value="five">Five</option>
                                </select>
                            </div>
                            <input type="submit" value="Search Now" class="btn">
                        </form>
                    </aside>
                    <aside class="widget widget-property-featured">
                        <h2 class="widget-title">featured<span>property</span></h2>
                        @if($latest)
                            @foreach($latest as $lat)
                                <div class="property-featured-inner">
                                    <div class="col-md-4 col-sm-3 col-xs-2 p_z">
                                        <a title="Featured Property" href="#"><img src="{{ fileExist85($lat->type, $lat->featured_image) }}" alt="featured Image" /></a>
                                    </div>
                                    <div class="col-md-8 col-sm-9 col-xs-10 featured-content">
                                        <a title="Featured Property" href="{{ route('showProperty', $lat->id) }}">{{ $lat->title }}</a>
                                        <h3>{{ propertyPrice($lat->type, $lat->price) }}</h3>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </aside>
                </div>
            </div>
        </div><!-- Property Listing Section /- -->
    </div>

@stop
