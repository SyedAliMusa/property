<!-- LOADER -->
<!-- LOADER -->
<div id="site-loader" class="load-complete">
    <div class="load-position">
        <div class="logo logo-block"><a href="index.html"><img src="{{ asset('frontEnd') }}/images/logo.png" alt="logo" /></a></div>
        <h6>Please wait, loading...</h6>
        <div class="loading">
            <div class="loading-line"></div>
            <div class="loading-break loading-dot-1"></div>
            <div class="loading-break loading-dot-2"></div>
            <div class="loading-break loading-dot-3"></div>
        </div>
    </div>
</div><!-- Loader /- -->
<a id="top"></a>
<!-- Header Section -->
<header id="header-section" class="header header1 container-fluid p_z">
    <!-- container -->
    <div class="container">
        <!-- Top Header -->
        <div class="top-header">
            <p class="col-md-6 col-sm-9">
                <span><i class="fa fa-phone"></i>1-200-666-1234</span>
                <span><a title="mail-to" href="mailto:info@propertyexpert.com"><i class="fa fa-envelope-o"></i> info@propertyexpert.com</a></span>
            </p>
            <div class="col-md-6 col-sm-3 p_r_z">
                <ul class="property-social p_l_z m_b_z">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
            </div>
        </div><!-- Top Header -->
        <!-- Navigation Block -->
        <div class="navigation-block">
            <!-- Logo Block -->
            <div class="col-md-2 logo-block no-padding">
                <a title="logo" href="index.html"><img src="{{ asset('frontEnd') }}/images/logo.png" alt="logo" /></a>
            </div><!-- Logo Block /- -->
            <!-- Menu Block -->
            <div class="col-md-10 menu-block">
                <!-- nav -->
                <nav class="navbar navbar-default primary-navigation">
                    <div class="navbar-header">
                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="#">Listing</a></li>
                            <li><a href="#">Property</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact Us</a></li>
                            @if (Route::has('login'))
                                @auth
                                @else
                                    <li><a href="#">Sign in</a></li>
                                    <li><a href="{{ route('signUp') }}">Sign Up</a></li>
                                @endauth
                            @endif
                        </ul>
                    </div><!--/.nav-collapse -->
                </nav><!-- nav /- -->
                <a title="Add Property" href="{{ route('addProperty') }}" class="pull-right">Add Property</a>
            </div><!-- Menu Block /- -->
        </div><!-- Navigation Block /- -->
        <div class="pull-right">
            <a title="User" href="#" class="user-icon"><img src="{{ asset('frontEnd') }}/images/icon/user-icon.png" alt="user icon" /></a>
            <div id="sb-search" class="sb-search">
                <form>
                    <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
                    <button class="sb-search-submit"><i class="fa fa-search"></i></button>
                    <span class="sb-icon-search"></span>
                </form>
            </div>
        </div>
    </div><!-- container /- -->
</header><!-- Header Section /- -->
