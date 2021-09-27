@extends('Admin.layout.default')
@section('content')

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Property Detail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminHome') }}">Home</a></li>
                        <li class="breadcrumb-item active">Property Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Property Detail</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <h3 style="text-align: center">{{ $property->title }}</h3>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Price</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ $property->price }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Bedrooms</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ $property->bedrooms }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Bathrooms</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ $property->bathrooms }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Type</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ $property->type }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Status</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ $property->style }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Area</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ $property->area }}{{ $property->area_unit }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Garage</span>
                                        <span class="info-box-number text-center text-muted mb-0">{!! isTrue($property->garage) !!}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Featured</span>
                                        <span class="info-box-number text-center text-muted mb-0">{!! isTrue($property->is_featured) !!}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Sold</span>
                                        <span class="info-box-number text-center text-muted mb-0">{!! isTrue($property->is_sold) !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3>Agent's Details</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            {!! userProfileView($user->profile) !!}
                                        </div>

                                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                                        <p class="text-muted text-center">Agent</p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Total Listing</b> <a class="float-right">@php echo count($user->properties) @endphp</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Total Sold</b> <a class="float-right">@php echo count($user->soldProperties) @endphp</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Sign Up</b> <a class="float-right">{{ $user->created_at->format('d-M-Y') }}</a>
                                            </li>
                                        </ul>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Description</h3>
                        <p class="text-muted">{{ $property->description }}</p>
                        <br>
                        <div class="text-muted">
                            <p class="text-sm">Location
                                <b class="d-block">{{ $property->address }}</b>
                            </p>
                            <p class="text-sm">City
                                <b class="d-block">{{ $property->city }}</b>
                            </p>
                            <p class="text-sm">State
                                <b class="d-block">{{ $property->state }}</b>
                            </p>
                        </div>

                        @if(count($property->propertyFeatures) > 0)
                            <h5 class="mt-5 text-muted">Features</h5>
                            <ul class="list-unstyled">
                                @foreach($property->propertyFeatures as $feature)
                                    <li>
                                        <a href="" class="btn-link text-secondary"><i class="far fa-image"></i> {{ $feature->features }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Agent</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted">{{ $user->address }}</p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Bio</strong>

                                <p class="text-muted">{{ $user->bio }}</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop
