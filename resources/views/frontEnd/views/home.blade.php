@extends('frontEnd.layout.default')
@section('content')

    <div class="page-content">
        <!-- Slider block -->
        <div class="slider-block container-fluid p_z">
            <!-- Slider Section -->
            <div id="property-slider" class="carousel slide slider-section" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#property-slider" data-slide-to="0" class="active"><img src="{{ asset('frontEnd') }}/images/slider/header.png" alt="Slide 1"></li>
                    <li data-target="#property-slider" data-slide-to="1"><img src="{{ asset('frontEnd') }}/images/slider/header.png" alt="Slide 2"></li>
                    <li data-target="#property-slider" data-slide-to="2"><img src="{{ asset('frontEnd') }}/images/slider/header.png" alt="Slide 1"></li>
{{--                    <li data-target="#property-slider" data-slide-to="3"><img src="{{ asset('frontEnd') }}/images/slider/slide-2.jpg" alt="Slide 2"></li>--}}
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{ asset('frontEnd') }}/images/slider/header.png" alt="Slide 1">
                        {{--<div class="carousel-caption">
                            <div class="slider-content">
                                <h4>$480,000 </h4>
                                <h3>Florida 5, Pinecrest, FL</h3>
                                <p>Lorem ipsum our Latest listed properties and check out the facilities on</p>
                                <a href="#" title="caption-arrow" class="caption-arrow"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>--}}
                    </div>
                    <div class="item">
                        <img src="{{ asset('frontEnd') }}/images/slider/header.png" alt="Slide 2">
                        {{--<div class="carousel-caption">
                            <div class="slider-content">
                                <h4>$480,000 </h4>
                                <h3>Florida 5, Pinecrest, FL</h3>
                                <p>Lorem ipsum our Latest listed properties and check out the facilities on</p>
                                <a href="#" title="caption-arrow" class="caption-arrow"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>--}}
                    </div>
                    <div class="item">
                        <img src="{{ asset('frontEnd') }}/images/slider/header.png" alt="Slide 3">
                        {{--<div class="carousel-caption">
                            <div class="slider-content">
                                <h4>$480,000 </h4>
                                <h3>Florida 5, Pinecrest, FL</h3>
                                <p>Lorem ipsum our Latest listed properties and check out the facilities on</p>
                                <a href="#" title="caption-arrow" class="caption-arrow"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>--}}
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#property-slider" role="button" data-slide="prev">
                    <span class="fa fa-long-arrow-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#property-slider" role="button" data-slide="next">
                    <span class="fa fa-long-arrow-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div><!-- Slider Section /- -->
        </div><!-- Slider Block /- -->

        <!-- Search Section -->
        <div id="search-section" class="search-section container-fluid p_z">
            <!-- Container -->
            <div class="container">
                <!-- col-md-10 -->
                <form id="searchForm" action="{{ route('searchProperty') }}" method="get" enctype="multipart/form-data">
                    <div class="col-md-10 col-sm-9 p_l_z">
                        <input type="text" name="propertyId" placeholder="Property ID" class="search-property">
                        <input type="text" name="location" placeholder="Location" class="search-property">

                        <select name="type">
                            <option value=''>Select Type</option>
                            <option>Rent</option>
                            <option>Sale</option>
                        </select>

                        <select name="style">
                            <option value=''>Select Status</option>
                            <option>Luxurious</option>
                            <option>bungalow</option>
                            <option>House</option>
                            <option>Shop</option>
                        </select>
                        <input type="text" name="bedrooms" placeholder="Bedrooms" class="search-property" onkeypress="return onlyNumberKey(event)" >
                        <input type="text" name="bathrooms" placeholder="Bathrooms" class="search-property" onkeypress="return onlyNumberKey(event)" >
                        <input type="text" name="minPrice" placeholder="Min Price" class="search-property" onkeypress="return onlyNumberKey(event)" >
                        <input type="text" name="maxPrice" placeholder="Max Price" class="search-property" onkeypress="return onlyNumberKey(event)" >
                        <input type="text" name="minSq" placeholder="Min Sqft" class="search-property" onkeypress="return onlyNumberKey(event)" >
                        <input type="text" name="maxSq" placeholder="Max Sqft" class="search-property" onkeypress="return onlyNumberKey(event)" >

                    </div><!-- col-md-10 /- -->
                    <!-- col-md-2 -->
                    <div class="col-md-2 col-sm-3">
                        <div class="section-header">
                            <h3><span>Search</span>Property</h3>
                            <a title="search" class="btn" href="#" onclick="yourFunction()">Search</a>
                        </div>
                    </div>
                </form>
                <!-- col-md-2 /- -->
            </div><!-- Container /- -->
        </div><!-- Search Section /- -->

        <!-- Property Rent And Sale Section -->
        <div id="rent-and-sale-section" class="rent-and-sale-section">
            <!-- container -->
            <div class="container">
                <!-- Rent Property -->
                <div class="rent-property">
                    <div class="col-md-3">
                        <div class="section-header">
                            <h3><span>Property</span>For Rent</h3>
                            <p>Our Latest listed properties and check out the facilities on them.</p>
                        </div>
                    </div>
                    <div class="col-md-9 p_r_z">
                        <div id="rent-property-block" class="rent-property-block">
                            @if(isset($propertyRent) && $propertyRent != null)
                                @foreach($propertyRent as $property)
                                    <div class="item">
                                        <!-- col-md-12 -->
                                        <div class="col-md-12 rent-block">
                                            <!-- Property Main Box -->
                                            <div class="property-main-box">
                                                <div class="property-images-box">
                                                    <a title="Property Image" href="{{ route('showProperty', $property->id) }}"><img src="{{ fileExist262($property->type, $property->home_image) }}" alt="rent" /></a>
                                                    <h4>{{ $property->price }}/pm</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="property-details">
                                                    <a title="Property Title" href="{{ route('showProperty', $property->id) }}">{{ $property->title }}</a>
                                                    <ul>
                                                        <li><i class="fa fa-expand"></i>{{ $property->area }} {{ $property->area_unit }}</li>
                                                        <li><i><img src="{{ asset('frontEnd') }}/images/icon/bed-icon.png" alt="bed-icon" /></i>{{ $property->bedrooms }}</li>
                                                        <li><i><img src="{{ asset('frontEnd') }}/images/icon/bath-icon.png" alt="bath-icon" /></i>{{ $property->bathrooms }}</li>
                                                    </ul>
                                                </div>
                                            </div><!-- Property Main Box /- -->
                                        </div><!-- col-md-12 /- -->
                                    </div>
                                @endforeach
                            @else
                                @for($i = 0; $i < 6; $i++)
                                    <div class="item">
                                    <!-- Col-md-12 -->
                                    <div class="col-md-12 rent-block">
                                        <!-- Property Main Box -->
                                        <div class="property-main-box">
                                            <div class="property-images-box">
                                                <span>R</span>
                                                <a title="Property Image" href="#"><img src="images/featured/featured-1.jpg" alt="featured" /></a>
                                                <h4>&dollar;380 / pm</h4>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="property-details">
                                                <a title="Property Title" href="#">For Rent Dummy</a>
                                                <ul>
                                                    <li><i class="fa fa-expand"></i>3326 sq</li>
                                                    <li><i><img src="images/icon/bed-icon.png" alt="bed-icon" /></i>3</li>
                                                    <li><i><img src="images/icon/bath-icon.png" alt="bath-icon" /></i>2</li>
                                                </ul>
                                            </div>
                                        </div><!-- Property Main Box /- -->
                                    </div><!-- Col-md-12 -->
                                </div>
                                @endfor
                            @endif
                        </div>
                    </div>
                </div><!-- Rent Property /- -->
                <div class="clearfix"></div>
                <!-- Sale Property -->
                <div class="sale-property">
                    <div class="col-md-3">
                        <div class="section-header">
                            <h3><span>Property</span>For Sale</h3>
                            <p>Our Latest listed properties and check out the facilities on them.</p>
                        </div>
                    </div>
                    <div class="col-md-9 p_r_z">
                        <div id="sale-property-block" class="sale-property-block">
                            @if(isset($propertySale) && $propertySale != null)
                                @foreach($propertySale as $property)
                                    <div class="item">
                                        <!-- col-md-12 -->
                                        <div class="col-md-12 sale-block">
                                            <!-- Property Main Box -->
                                            <div class="property-main-box">
                                                <div class="property-images-box">
                                                    <a title="Property Image" href="{{ route('showProperty', $property->id) }}"><img src="{{ fileExist262($property->type, $property->home_image) }}" alt="rent" /></a>
                                                    <h4>{{ $property->price }}</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="property-details">
                                                    <a title="Property Title" href="{{ route('showProperty', $property->id) }}">{{ $property->title }}</a>
                                                    <ul>
                                                        <li><i class="fa fa-expand"></i>{{ $property->area }} {{ $property->area_unit }}</li>
                                                        <li><i><img src="{{ asset('frontEnd') }}/images/icon/bed-icon.png" alt="bed-icon" /></i>{{ $property->bedrooms }}</li>
                                                        <li><i><img src="{{ asset('frontEnd') }}/images/icon/bath-icon.png" alt="bath-icon" /></i>{{ $property->bathrooms }}</li>
                                                    </ul>
                                                </div>
                                            </div><!-- Property Main Box /- -->
                                        </div><!-- Col-md-12 /- -->
                                    </div>
                                @endforeach
                            @else
                                @for($i = 0; $i < 6; $i++)
                                    <div class="item">
                                    <!-- Col-md-12 -->
                                    <div class="col-md-12 sale-block">
                                        <!-- Property Main Box -->
                                        <div class="property-main-box">
                                            <div class="property-images-box">
                                                <span>S</span>
                                                <a title="Property Image" href="#"><img src="images/featured/featured-4.jpg" alt="featured" /></a>
                                                <h4>&dollar;380000</h4>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="property-details">
                                                <a title="Property Title" href="#">For Sale Dummy</a>
                                                <ul>
                                                    <li><i class="fa fa-expand"></i>3326 sq</li>
                                                    <li><i><img src="images/icon/bed-icon.png" alt="bed-icon" /></i>3</li>
                                                    <li><i><img src="images/icon/bath-icon.png" alt="bath-icon" /></i>2</li>
                                                </ul>
                                            </div>
                                        </div><!-- Property Main Box -->
                                    </div><!-- Col-md-12 /- -->
                                </div>
                                @endfor
                            @endif
                        </div>
                    </div>
                </div><!-- Sale Property /- -->
            </div><!-- container /- -->
        </div><!-- Property Rent And Sale Section /- -->

        <!-- Featured Section -->
        <div id="featured-section" class="featured-section container-fluid p_z">
            <div class="container">
                <div class="section-header">
                    <p>Trending</p>
                    <h3>Featured Property</h3>
                </div>
                <div id="featured-property" class="featured-property row">
                    @if(isset($propertyFeatured) && count($propertyFeatured) != 0)
                        @foreach($propertyFeatured as $property)
                            <div class="item">
                                <!-- col-md-12 -->
                                <div class="col-md-12 {{ propertyBlock($property->type) }}">
                                    <!-- Property Main Box -->
                                    <div class="property-main-box">
                                        <div class="property-images-box">
                                            <span>{{ propertyType($property->type) }}</span>
                                            <a title="Property Image" href="{{ route('showProperty', $property->id) }}"><img src="{{ fileExist262($property->type, $property->home_image)  }}" alt="featured" /></a>
                                            <h4>{{ propertyPrice($property->type, $property->price) }}</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="property-details">
                                            <a title="Property Title" href="{{ route('showProperty', $property->id) }}">{{ $property->title }}</a>
                                            <ul>
                                                <li><i class="fa fa-expand"></i>3326 sq</li>
                                                <li><i><img src="{{ asset('frontEnd') }}/images/icon/bed-icon.png" alt="bed-icon" /></i>{{ $property->bedrooms }}</li>
                                                <li><i><img src="{{ asset('frontEnd') }}/images/icon/bath-icon.png" alt="bath-icon" /></i>{{ $property->bathrooms }}</li>
                                            </ul>
                                        </div>
                                    </div><!-- Property Main Box -->
                                </div>
                            </div>
                        @endforeach
                    @else
                        @for($i = 0; $i < 10; $i++)
                            <div class="item">
                            <div class="col-md-12 sale-block">
                                <!-- Property Main Box -->
                                <div class="property-main-box">
                                    <div class="property-images-box">
                                        <span>S</span>
                                        <a title="Property Image" href="#"><img src="{{ asset('frontEnd') }}/images/featured/featured-2.jpg" alt="featured" /></a>
                                        <h4>&dollar;330000</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="property-details">
                                        <a title="Property Title" href="#">Featured Property Here</a>
                                        <ul>
                                            <li><i class="fa fa-expand"></i>3326 sq</li>
                                            <li><i><img src="{{ asset('frontEnd') }}/images/icon/bed-icon.png" alt="bed-icon" /></i>3</li>
                                            <li><i><img src="{{ asset('frontEnd') }}/images/icon/bath-icon.png" alt="bath-icon" /></i>2</li>
                                        </ul>
                                    </div>
                                </div><!-- Property Main Box /- -->
                            </div><!-- col-md-12 /- -->
                        </div>
                        @endfor
                    @endif
                </div>
            </div>
        </div><!-- Featured Section /- -->

        <!-- Property Guide Section -->
        <div id="property-guide-section" class="property-guide-section">
            <!-- container -->
            <div class="container">
                <!-- col-md-4 -->
                <div class="col-md-4 col-sm-4">
                    <div class="section-header">
                        <p>In simple three step</p>
                        <h3>Add Property</h3>
                    </div>
                    <div class="add-property">
                        <div class="property-guide">
                            <div class="col-md-3 col-sm-4 col-xs-2 p_z">
                                <span class="guide-icon icon-green"><i class="fa fa-laptop"></i></span>
                            </div>
                            <div class="col-md-9 col-sm-8 col-xs-10">
                                <h3>1. Register</h3>
                                <p>Our Latest listed properties and check out the facilities on them.</p>
                            </div>
                        </div>
                        <div class="property-guide">
                            <div class="col-md-3 col-sm-4 col-xs-2 p_z">
                                <span class="guide-icon icon-yellow"><i class="fa fa-laptop"></i></span>
                            </div>
                            <div class="col-md-9 col-sm-8 col-xs-10">
                                <h3>2. Add Property Detail</h3>
                                <p>Our Latest listed properties and check out the facilities on them.</p>
                            </div>
                        </div>
                        <div class="property-guide">
                            <div class="col-md-3 col-sm-4 col-xs-2 p_z">
                                <span class="guide-icon icon-blue"><i class="fa fa-laptop"></i></span>
                            </div>
                            <div class="col-md-9 col-sm-8 col-xs-10">
                                <h3>3. You are Done</h3>
                                <p>Our Latest listed properties and check out the facilities on them.</p>
                            </div>
                        </div>
                        <a title="Add Now" href="{{ route('propertyForm') }}">Add Now</a>
                    </div>
                </div><!-- col-md-4 /- -->

                <!-- col-md-4 -->
                <div class="col-md-4 col-sm-4">
                    <div class="section-header">
                        <p>Lookout</p>
                        <h3>Agents</h3>
                    </div>
                    <div class="agent-property">
                        @if(isset($users) && $users != null)
                            @foreach($users as $user)
                                <div class="property-guide">
                                    <div class="col-md-3 col-sm-4 col-xs-2 p_l_z">
                                            <span class="guide-icon"><img src="{{ agentProfileImage($user->small_profile)  }}" alt="agent-1" /></span>
                                    </div>
                                    <div class="col-md-9 col-sm-8 col-xs-10">
                                        <h3>{{ $user->name }}</h3>
                                        <p>{{ \Illuminate\Support\Str::limit($user->bio, 66, '...') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="property-guide">
                                <div class="col-md-3 col-sm-4 col-xs-2 p_l_z">
                                    <span class="guide-icon"><img src="{{ asset('frontEnd') }}/images/guide/agent-1.jpg" alt="agent-1" /></span>
                                </div>
                                <div class="col-md-9 col-sm-8 col-xs-10">
                                    <h3>John Doe Dummy</h3>
                                    <p>Our Latest listed properties and check out the facilities on them.</p>
                                </div>
                            </div>
                            <div class="property-guide">
                                <div class="col-md-3 col-sm-4 col-xs-2 p_l_z">
                                    <span class="guide-icon"><img src="{{ asset('frontEnd') }}/images/guide/agent-1.jpg" alt="agent-1" /></span>
                                </div>
                                <div class="col-md-9 col-sm-8 col-xs-10">
                                    <h3>John Doe Dummy</h3>
                                    <p>Our Latest listed properties and check out the facilities on them.</p>
                                </div>
                            </div>
                            <div class="property-guide">
                                <div class="col-md-3 col-sm-4 col-xs-2 p_l_z">
                                    <span class="guide-icon"><img src="{{ asset('frontEnd') }}/images/guide/agent-1.jpg" alt="agent-1" /></span>
                                </div>
                                <div class="col-md-9 col-sm-8 col-xs-10">
                                    <h3>John Doe Dummy</h3>
                                    <p>Our Latest listed properties and check out the facilities on them.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div><!-- col-md-4 /- -->

                <!-- col-md-4 -->
                <div class="col-md-4 col-sm-4">
                    <div class="section-header">
                        <p>Checkout some</p>
                        <h3>LAtest News</h3>
                    </div>
                    <div class="news-property">
                        <div class="property-guide">
                            <div class="col-md-3 col-sm-4 col-xs-2 p_l_z">
                                <span class="guide-icon"><img src="{{ asset('frontEnd') }}/images/guide/news-1.jpg" alt="news-1" /></span>
                            </div>
                            <div class="col-md-9 col-sm-8 col-xs-10">
                                <h3><a title="News Title" href="#">Lorem Post With Image</a></h3>
                                <p>Our Latest listed properties and check out the facilities on them.</p>
                            </div>
                        </div>
                        <div class="property-guide">
                            <div class="col-md-3 col-sm-4 col-xs-2 p_l_z">
                                <span class="guide-icon"><img src="{{ asset('frontEnd') }}/images/guide/news-2.jpg" alt="news-2" /></span>
                            </div>
                            <div class="col-md-9 col-sm-8 col-xs-10">
                                <h3><a title="News Title" href="#">Lorem Post With Image</a></h3>
                                <p>Our Latest listed properties and check out the facilities on them.</p>
                            </div>
                        </div>
                        <div class="property-guide">
                            <div class="col-md-3 col-sm-4 col-xs-2 p_l_z">
                                <span class="guide-icon"><img src="{{ asset('frontEnd') }}/images/guide/news-3.jpg" alt="news-3" /></span>
                            </div>
                            <div class="col-md-9 col-sm-8 col-xs-10">
                                <h3><a title="News Title" href="#">Lorem Post With Image</a></h3>
                                <p>Our Latest listed properties and check out the facilities on them.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- col-md-4 /- -->
            </div><!-- container /- -->
        </div><!-- Property Guide Section /- -->
    </div><!-- Page Content -->

    <script>

        function onlyNumberKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }

        function yourFunction(){
            document.getElementById("searchForm").submit();// Form submission
        }

    </script>

@stop
