@extends('frontEnd.layout.default')
@section('content')

    <div class="page-content">
        <!-- Banner Section -->
        <div id="page-banner-section" class="page-banner-section container-fluid p_z">
            <img src="{{ asset('frontEnd') }}/images/aa-listing/banner.jpg" alt="banner">
            <!-- Banner Inner -->
            <div class="page-title">
                <div class="container ">
                    <div class="banner-inner">
                        <h2>Register Your Self</h2>
                    </div>
                </div>
                <div class="pages-breadcrumb">
                    <div class="container">
                        <!-- Page breadcrumb -->
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Sign up</li>
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
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="col-md-12 p_l_z">
                                <div class="col-md-6 p_l_z">
                                    <input required type="text" name="name" placeholder="Display Name*(John Deo)">
                                </div>
                                <div class="col-md-6 p_r_z">
                                    <input required type="text" name="email" placeholder="Email*">
                                </div>
                                <div class="col-md-6 p_l_z">
                                    <input type="text" required name="password" placeholder="Password">
                                </div>
                                <div class="col-md-6 p_r_z">
                                    <input required type="text" name="cpassword" placeholder="Confirm Password">
                                </div>
                                <div class="col-md-6 p_l_z">
                                    <input required name="mobile" type="text" placeholder="Mobile Number">
                                </div>
                                <div class="col-md-6 p_r_z">
                                    <input name="telephone" type="text" placeholder="Office Number">
                                </div>
                                <div class="col-md-12 p_z">
                                    <textarea required name="bio" rows="4" placeholder="Biographical Information"></textarea>
                                </div>
                            </div>
                            <div class="col-md-5"></div>
                            <div class="col-md-2">
                                <input type="submit" value="Let's go" />
                            </div>
                            <div class="col-md-5"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--edit-profile-section/- -->
    </div><!-- Page Content -->


@stop
