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
                        <h2>SUBMIT PROPERTY</h2>
                    </div>
                </div>
                <div class="pages-breadcrumb">
                    <div class="container">
                        <!-- Page breadcrumb -->
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Submit Property</li>
                        </ol>
                    </div>
                </div>
            </div><!-- Banner Inner /- -->
        </div><!-- Banner Section /- -->

        <!-- submit-property-1 -->
        <div class="submit-property">
            <div class="container">
                @if (isset($success))
                    <h4 style="color: green">{{ $success }}</h4>
                @endif
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#property_information" aria-controls="property_information" role="tab" data-toggle="tab">Property Information</a></li>
                        <li role="presentation"><a href="#property_images" aria-controls="property_images" role="tab" data-toggle="tab">Property Images</a></li>
                        <li role="presentation"><a href="#features" aria-controls="features" role="tab" data-toggle="tab">Features</a></li>
                        <li role="presentation"><a href="#add_location" aria-controls="add_location" role="tab" data-toggle="tab">Add Location</a></li>
                       </ul>
                    <!-- Tab panes -->
                    <form action="{{ route('addProperty') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="property_information">
                                <div class="contact-feedback-form">
                                    <div class="col-md-12">
                                        <input type="text" required id="property-title" name="title" placeholder="Property Title">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea  rows="4" required name="description" placeholder="Property Description"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="status" required>
                                            <option value="" disabled selected>Status (select)</option>
                                            <option>Sale</option>
                                            <option>Rent</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="type" required>
                                            <option  value="" disabled selected>Type (select)</option>
                                            <option>Luxurious</option>
                                            <option>bungalow</option>
                                            <option>House</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="state" required>
                                            <option value="" disabled selected>state (select)</option>
                                            <option>Federal</option>
                                            <option>Punjab</option>
                                            <option>Sindh</option>
                                            <option>KPK</option>
                                            <option>Balochistan</option>
                                            <option>Gilgit-Baltistan</option>
                                            <option>Kashmir</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" required name="city" placeholder="City"  >
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" required name="bedrooms" placeholder="Bedrooms" onkeypress="return onlyNumberKey(event)" >
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" required name="bathrooms" placeholder="Bathrooms" onkeypress="return onlyNumberKey(event)" >
                                    </div>
                                    <div class="col-md-6">
                                        <select name="garage" required>
                                            <option value="" disabled selected>Garage (select)</option>
                                            <option value="true">True</option>
                                            <option value="false">False</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" required name="price" placeholder="Price Without Rs" onkeypress="return onlyNumberKey(event)" >
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" required name="area" placeholder="Area" onkeypress="return onlyNumberKey(event)" >
                                    </div>
                                    <div class="col-md-6">
                                        <select name="unit" required>
{{--                                            <option value="" disabled selected>Area Unit (select)</option>--}}
                                            <option value="sq">Sq</option>
{{--                                            <option>Cm</option>--}}
                                        </select>
                                    </div>
                                    {{--<div class="col-md-12">
                                        <input type="text" required name="propertyId" placeholder="Property Id">
                                    </div>--}}
                                    <div class="col-md-12">
                                        <input type="text" name="videoUrl" placeholder="VirtualTour Video URL">
                                    </div>
                                </div>
                            </div><!-- submit-property-1/- -->
                            <div role="tabpanel" class="tab-pane" id="property_images">
                                <div class="contact-feedback-form">
                                    <div class="col-md-10" style="margin-bottom: 1%">Featured Image | Recommended size 85x64</div>
                                    <div class="col-md-10" style="margin-bottom: 5%">
                                        <input type="file" required name="featureImage" placeholder="Value">
                                    </div>
                                    <div class="col-md-10" style="margin-bottom: 1%">Home Page Image | Recommended size 262x166</div>
                                    <div class="col-md-10" style="margin-bottom: 5%">
                                        <input type="file" required name="homeImage" placeholder="Value">
                                    </div>
                                    <div class="col-md-10" style="margin-bottom: 1%">Add Multiple Images | Recommended size 847x424</div>
                                    <div class="col-md-10">
                                        <input type="file" required name="file[]" placeholder="Value" multiple>
                                    </div>
                                </div>
                            </div><!-- submit-property-2/- -->
                            <div role="tabpanel" class="tab-pane" id="features">
                                <div class="contact-feedback-form">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Pound" type="checkbox" id="checkbox-1" checked>
                                            <label for="checkbox-1">Pound</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Back Yard" type="checkbox" id="checkbox-2">
                                            <label for="checkbox-2">Back Yard</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Back Yard" type="checkbox" id="checkbox-3">
                                            <label for="checkbox-3">Back Yard</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Back Yard" type="checkbox" id="checkbox-4">
                                            <label for="checkbox-4">Back Yard</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Attic" type="checkbox" id="checkbox-5" checked>
                                            <label for="checkbox-5">Attic</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input  name="features[]" value="Sprinklers" type="checkbox" id="checkbox-6">
                                            <label for="checkbox-6">Sprinklers</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Sprinklers" type="checkbox" id="checkbox-7">
                                            <label for="checkbox-7">Sprinklers</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Sprinklers" type="checkbox" id="checkbox-8">
                                            <label for="checkbox-8">Sprinklers</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Pool" type="checkbox" id="checkbox-9" checked>
                                            <label for="checkbox-9">Pool</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Doorman" type="checkbox" id="checkbox-10">
                                            <label for="checkbox-10">Doorman</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Doorman" type="checkbox" id="checkbox-11">
                                            <label for="checkbox-11">Doorman</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Doorman" type="checkbox" id="checkbox-12">
                                            <label for="checkbox-12">Doorman</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Fenced Yard" type="checkbox" id="checkbox-13" checked>
                                            <label for="checkbox-13">Fenced Yard</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Basketball Court" type="checkbox" id="checkbox-14">
                                            <label for="checkbox-14">Basketball Court</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Balcony" type="checkbox" id="checkbox-17" checked>
                                            <label for="checkbox-17">Balcony</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Lake View" type="checkbox" id="checkbox-18">
                                            <label for="checkbox-18">Lake View</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input  name="features[]" value="Wine Cellar" type="checkbox" id="checkbox-21" checked>
                                            <label for="checkbox-21">Wine Cellar</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Front Yard" type="checkbox" id="checkbox-22">
                                            <label for="checkbox-22">Front Yard</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input  name="features[]" value="Fire Place" type="checkbox" id="checkbox-25" checked>
                                            <label for="checkbox-25">Fire Place</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="amenities-checkbox">
                                            <input name="features[]" value="Washer and Dryer" type="checkbox" id="checkbox-26">
                                            <label for="checkbox-26">Washer and Dryer</label>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- submit-property-3/- -->
                            <div role="tabpanel" class="tab-pane" id="add_location">
                                <div class="contact-feedback-form">
                                    <div class="col-md-10 col-sm-9 col-xs-12 p_z">
                                        <input type="text" required  name="address" id="address" placeholder="Address">
                                    </div>
                                    <div class="col-md-2 col-sm-3 col-xs-12 p_r_z">
                                        <button class="btn">Find Address</button>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 p_z">
                                        <div id="gmap2" class="mapping"></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 p_z">
                                        <h1></h1>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="submit" value="Submit Property" />
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div><!-- submit-property-4/- -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function onlyNumberKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>
@stop
