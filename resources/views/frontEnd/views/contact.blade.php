@extends('frontEnd.layout.default')
@section('content')

<!-- Page Content -->
<div class="page-content">
    <!-- Banner Section -->
    <div id="page-banner-section" class="page-banner-section container-fluid p_z">
        <div id="gmap" class="mapping"></div>
        <!-- Banner Inner -->
        <div class="page-title">
            <div class="container ">
                <div class="banner-inner">
                    <h2>Contact</h2>
                </div>
            </div>
            <div class="pages-breadcrumb">
                <div class="container">
                    <!-- Page breadcrumb -->
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><a href="#">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ol>
                </div>
            </div>
        </div><!-- Banner Inner /- -->
    </div><!-- Banner Section /- -->

    <!-- contact-detail -->
    <div id="contact-detail" class="contact-detail">
        <div class="container">
            <!-- contact-address-section -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="contact-logo-box">
                    <img src="images/logo.png" alt="logo">
                </div>
                <div class="contact-address">
                    <p>
                        <i class="fa fa-map-marker"></i>
                        <span> 3015 Name here, text here, sreet here, country 12345</span>
                    </p>
                    <p>
                        <i class="fa fa-phone"></i>
                        <span> 305 555 4555</span>
                    </p>
                    <p>
                        <i class="fa fa-mobile"></i>
                        <span> 305 555 4555</span>
                    </p>
                    <p>
                        <i class="fa fa-print"></i>
                        <span> 305 555 4555</span>
                    </p>
                    <p>
                        <i class="fa fa-envelope-o"></i>
                        <a title="mailto" href="mailto:john@propertyexpert.com">john@propertyexpert.com</a>
                    </p>
                </div>
                <ul class="contact-social-icon">
                    <li><a title="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a title="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a title="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a title="linkedin-square" href="#"><i class="fa fa-linkedin-square"></i></a></li>
                    <li><a title="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a title="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div><!---contact-address-section/- -->
            <!-- contact-feedback-form-section -->
            <div class="col-md-9 col-sm-6 col-xs-12">
                <div class="contact-feedback-form">
                    <h3>Send us a message</h3>
                    <form>
                        <div class="col-md-6 col-xs-12">
                            <input type="text" id="input_name" name="contact-name" placeholder="Your Name" required />
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <input type="email" id="input_email" name="contact-email" placeholder="Your Email ID" required />
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <textarea rows="3" id="textarea_message" name="contact-message" placeholder="Message"></textarea>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <input type="submit" id="btn_smt" value="Submit">
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div id="alert-msg" class="alert-msg"></div>
                        </div>
                    </form>
                </div>
            </div><!-- contact-feedback /- -->

            <div class="contact-address row-border">
                <div class="col-md-4 col-sm-4 p_l_z">
                    <h3>Office Address 1</h3>
                    <p>
                        <i class="fa fa-map-marker"></i>
                        <span>3015 Name here,  text here, sreet here, country 12345</span>
                    </p>
                    <p>
							<span class="col-md-6 p_l_z">
								<i class="fa fa-phone"></i>
								<span> 305 555 4555</span>
							</span>
                        <span class="col-md-6 p_l_z">
								<i class="fa fa-mobile"></i>
								<span> 305 555 4555</span>
							</span>
                    </p>
                    <p>
                        <i class="fa fa-print"></i>
                        <span> 305 555 4555</span>
                    </p>
                    <p>
                        <i class="fa fa-envelope-o"></i>
                        <a title="mailto" href="mailto:john@propertyexpert.com">john@propertyexpert.com</a>
                    </p>
                </div>

                <div class="col-md-4 col-sm-4">
                    <h3>Office Address 2</h3>
                    <p>
                        <i class="fa fa-map-marker"></i>
                        <span>3015 Name here,  text here, sreet here, country 12345</span>
                    </p>
                    <p>
							<span class="col-md-6 p_l_z">
								<i class="fa fa-phone"></i>
								<span> 305 555 4555</span>
							</span>
                        <span class="col-md-6 p_l_z">
								<i class="fa fa-mobile"></i>
								<span> 305 555 4555</span>
							</span>
                    </p>
                    <p>
                        <i class="fa fa-print"></i>
                        <span> 305 555 4555</span>
                    </p>
                    <p>
                        <i class="fa fa-envelope-o"></i>
                        <a title="mailto" href="mailto:john@propertyexpert.com">john@propertyexpert.com</a>
                    </p>
                </div>

                <div class="col-md-4 col-sm-4">
                    <h3>Office Address 3</h3>
                    <p>
                        <i class="fa fa-map-marker"></i>
                        <span>3015 Name here,  text here, sreet here, country 12345</span>
                    </p>
                    <p>
							<span class="col-md-6 p_l_z">
								<i class="fa fa-phone"></i>
								<span> 305 555 4555</span>
							</span>
                        <span class="col-md-6 p_l_z">
								<i class="fa fa-mobile"></i>
								<span> 305 555 4555</span>
							</span>
                    </p>
                    <p>
                        <i class="fa fa-print"></i>
                        <span> 305 555 4555</span>
                    </p>
                    <p>
                        <i class="fa fa-envelope-o"></i>
                        <a title="mailto" href="mailto:john@propertyexpert.com">john@propertyexpert.com</a>
                    </p>
                </div>
            </div>
        </div><!-- container /- -->
    </div><!-- contact-detail /- -->
    <!-- contact-address-group-section/- -->
</div><!-- Page Content -->

@stop
