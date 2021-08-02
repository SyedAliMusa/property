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
                        <h2>SUBMIT PROPERTY</h2>
                    </div>
                </div>
                <div class="pages-breadcrumb">
                    <div class="container">
                        <!-- Page breadcrumb -->
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><a href="#">Home</a></li>
                            <li class="active">Submit Property</li>
                        </ol>
                    </div>
                </div>
            </div><!-- Banner Inner /- -->
        </div><!-- Banner Section /- -->

        <!-- submit-property-1 -->
        <div class="submit-property">
            <div class="container">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#property_information" aria-controls="property_information" role="tab" data-toggle="tab">Property Information</a></li>
                        <li role="presentation"><a href="#property_images" aria-controls="property_images" role="tab" data-toggle="tab">Property Images</a></li>
                        <li role="presentation"><a href="#features" aria-controls="features" role="tab" data-toggle="tab">Features</a></li>
                        <li role="presentation"><a href="#add_location" aria-controls="add_location" role="tab" data-toggle="tab">Add Location</a></li>
                        <li role="presentation"><a href="#additional_details" aria-controls="additional_details" role="tab" data-toggle="tab">Additional Details</a></li>
                        <li role="presentation"><a href="#agent" aria-controls="agent" role="tab" data-toggle="tab">Agent / Owner Info</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="property_information">
                            <div class="contact-feedback-form">
                                <form>
                                    <div class="col-md-12">
                                        <input type="text" id="property-title" placeholder="Property Title">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea  rows="4" placeholder="Property Description"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <select>
                                            <option>Type (select)</option>
                                            <option>Luxurious</option>
                                            <option>bungalow</option>
                                            <option>House</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select>
                                            <option>City (select)</option>
                                            <option>New York</option>
                                            <option>Illinois</option>
                                            <option>Texas</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select>
                                            <option>Status (select)</option>
                                            <option>Buy</option>
                                            <option>Sale</option>
                                            <option>Rent</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Bedrooms">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Bathrooms">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Garages">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Sale or Rent Price">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Price Postfix Text">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Area">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Area Postfix Text">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Property Id">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="VirtualTour Video URL">
                                    </div>
                                    <div class="col-md-12">
                                        <a href="#" title="Next Step" class="next-step">Next Step</a>
                                    </div>
                                </form>
                            </div>
                        </div><!-- submit-property-1/- -->

                        <div role="tabpanel" class="tab-pane" id="property_images">
                            <div class="contact-feedback-form">
                                <!-- Drop Zone -->
                                <div id="droparea" class="col-md-6 droparea">
                                    <div class="dropareainner">
                                        <p class="dropfiletext">Drag and drop images here</p>
                                        <p>or</p>
                                        <p><input id="uploadbtn" class="uploadbtn" type="button" value="Select images"/></p>

                                    </div>
                                    <input id="upload" type="file" multiple />
                                </div>
                                <div id="result" class="result">
                                    <div class="col-md-3 col-sm-3 col-xs-6 m_r_z">
                                        <img src="{{ asset('frontEnd') }}/images/drag-drop/drag-image-1.jpg" alt="drag-image-1">
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 m_r_z">
                                        <img src="{{ asset('frontEnd') }}/images/drag-drop/drag-image-2.jpg" alt="drag-image-2">
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 m_r_z">
                                        <img src="{{ asset('frontEnd') }}/images/drag-drop/drag-image-1.jpg" alt="drag-image-1">
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 m_r_z">
                                        <img src="{{ asset('frontEnd') }}/images/drag-drop/drag-image-2.jpg" alt="drag-image-2">
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-6 m_r_z">
                                        <img src="{{ asset('frontEnd') }}/images/drag-drop/drag-image-1.jpg" alt="drag-image-1">
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 m_r_z">
                                        <img src="{{ asset('frontEnd') }}/images/drag-drop/drag-image-2.jpg" alt="drag-image-2">
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 m_r_z">
                                        <img src="{{ asset('frontEnd') }}/images/drag-drop/drag-image-1.jpg" alt="drag-image-1">
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 m_r_z">
                                        <img src="{{ asset('frontEnd') }}/images/drag-drop/drag-image-2.jpg" alt="drag-image-2">
                                    </div>
                                    <div class="col-md-12">
                                        <a href="#" title="Next Step" class="next-step">Next Step</a>
                                    </div>
                                </div><!-- Drop Zone/- -->
                            </div>
                        </div><!-- submit-property-2/- -->

                        <div role="tabpanel" class="tab-pane" id="features">
                            <div class="contact-feedback-form">
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-1" checked>
                                        <label for="checkbox-1">Pound</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-2">
                                        <label for="checkbox-2">Back Yard</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-3">
                                        <label for="checkbox-3">Back Yard</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-4">
                                        <label for="checkbox-4">Back Yard</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-5" checked>
                                        <label for="checkbox-5">Attic</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-6">
                                        <label for="checkbox-6">Sprinklers</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-7">
                                        <label for="checkbox-7">Sprinklers</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-8">
                                        <label for="checkbox-8">Sprinklers</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-9" checked>
                                        <label for="checkbox-9">Pool</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-10">
                                        <label for="checkbox-10">Doorman</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-11">
                                        <label for="checkbox-11">Doorman</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-12">
                                        <label for="checkbox-12">Doorman</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-13" checked>
                                        <label for="checkbox-13">Fenced Yard</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-14">
                                        <label for="checkbox-14">Basketball Court</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-15">
                                        <label for="checkbox-15">Basketball Court</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-16">
                                        <label for="checkbox-16">Basketball Court</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-17" checked>
                                        <label for="checkbox-17">Balcony</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-18">
                                        <label for="checkbox-18">Lake View</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-19">
                                        <label for="checkbox-19">Lake View</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-20">
                                        <label for="checkbox-20">Lake View</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-21" checked>
                                        <label for="checkbox-21">Wine Cellar</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-22">
                                        <label for="checkbox-22">Front Yard</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-23">
                                        <label for="checkbox-23">Front Yard</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-24">
                                        <label for="checkbox-24">Front Yard</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-25" checked>
                                        <label for="checkbox-25">Fire Place</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-26">
                                        <label for="checkbox-26">Washer and Dryer</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-27">
                                        <label for="checkbox-27">Washer and Dryer</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-28">
                                        <label for="checkbox-28">Washer and Dryer</label>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <a href="#" title="Next Step" class="next-step">Next Step</a>
                                </div>
                            </div>
                        </div><!-- submit-property-3/- -->

                        <div role="tabpanel" class="tab-pane" id="add_location">
                            <div class="contact-feedback-form">
                                <form>
                                    <div class="col-md-10 col-sm-9 col-xs-12 p_z">
                                        <input type="text" id="address" placeholder="Address">
                                    </div>
                                    <div class="col-md-2 col-sm-3 col-xs-12 p_r_z">
                                        <button class="btn">Find Address</button>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 p_z">
                                        <div id="gmap2" class="mapping"></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 p_z"><a href="#" title="Next Step" class="next-step">Next Step</a></div>
                                </form>
                            </div>
                        </div><!-- submit-property-4/- -->
                        <div role="tabpanel" class="tab-pane" id="additional_details">
                            <div class="contact-feedback-form">
                                <form>
                                    <div class="input-group">
                                        <div class="col-md-4 col-sm-4">
                                            <input type="text" name="add-title1" placeholder="Title">
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <input type="text" name="add-value1" placeholder="Value">
                                        </div>
                                        <a href="#"><i class="fa fa-times-circle"></i></a>
                                    </div>

                                    <div class="input-group">
                                        <div class="col-md-4 col-sm-4">
                                            <input type="text" name="add-title2" placeholder="Title">
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <input type="text" name="add-value2" placeholder="Value">
                                        </div>
                                        <a href="#"><i class="fa fa-times-circle"></i></a>
                                    </div>

                                    <div class="input-group">
                                        <div class="col-md-4 col-sm-4">
                                            <input type="text" name="add-title3" placeholder="Title">
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <input type="text" name="add-value3" placeholder="Value">
                                        </div>
                                        <a href="#"><i class="fa fa-times-circle"></i></a>
                                    </div>

                                    <div class="input-group">
                                        <div class="col-md-4 col-sm-4">
                                            <input type="text" name="add-title4" placeholder="Title">
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <input type="text" name="add-value4" placeholder="Value">
                                        </div>
                                        <a href="#"><i class="fa fa-times-circle"></i></a>
                                    </div>
                                </form>
                                <div class="col-md-12 col-sm-12">
                                    <a href="#" title="Next Step" id="add-item" class="next-step">Add More</a>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <a href="#" title="Next Step" class="next-step">Next Step</a>
                                </div>
                            </div>
                        </div><!-- submit-property-5/- -->
                        <div role="tabpanel" class="tab-pane" id="agent">
                            <div class="contact-feedback-form owner-form">
                                <h4>What to display in agent information box ?</h4>
                                <form>
                                    <div class="col-md-12 p_l_z">
                                        <input type="radio" name="optionsRadios" id="radio1" value="option1" checked>
                                        <label for="radio1">None <span>(Agent information box will not be	displayed)</span></label>
                                    </div>
                                    <div class="col-md-12 p_l_z">
                                        <input type="radio" name="optionsRadios" id="radio2" value="option2">
                                        <label for="radio2">My profile information <span>(You can add your profile information)</span></label>
                                    </div>
                                    <div class="col-md-3 p_l_z">
                                        <input type="radio" name="optionsRadios" id="radio3" value="option3">
                                        <label for="radio3">Display an agent's information</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="agent-select">
                                            <select>
                                                <option>Type (select)</option>
                                                <option>Luxurious</option>
                                                <option>bungalow</option>
                                                <option>House</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 p_l_z">
                                        <input type="text" id="agent-msg-riview" placeholder="Message to the Reviewer">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="checkbox" value="" id="checkbox1" checked>
                                        <label for="checkbox1">Mark this property as featured property</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" value="Submit Property" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Page Content -->


@stop
