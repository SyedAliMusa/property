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
                        <h2>Login</h2>
                    </div>
                </div>
                <div class="pages-breadcrumb">
                    <div class="container">
                        <!-- Page breadcrumb -->
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Login</li>
                        </ol>
                    </div>
                </div>
            </div><!-- Banner Inner /- -->
        </div>
        <!--edit-profile-section-->
        <div class="property-profile">
            <!-- container -->
            <div class="container">
                <div class="property-profile-block">
                    <div class="property-profile-form">
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="col-md-12 p_l_z">
                                <div class="col-md-6 p_l_z">
                                    <input required id="email" type="text" name="email" placeholder="Enter Email" autofocus>
                                </div>
                                <div class="col-md-6 p_r_z">
                                    <input id="password"
                                           type="password"
                                           name="password"
                                           required autocomplete="current-password" placeholder="Password">
                                </div>
                                <div class="col-md-5"></div>
                                <div class="col-md-2">
                                    <input type="submit" value="Login" />
                                </div>
                                <div class="col-md-5"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--edit-profile-section/- -->
    </div><!-- Page Content -->


@stop
