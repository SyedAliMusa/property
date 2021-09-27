@extends('Admin.layout.default')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminHome') }}">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

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

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
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
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">All Listing</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Sold Properties</a></li>
{{--                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>--}}
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Agent Name</th>
                                            <th>Property ID</th>
                                            <th>Status</th>
                                            <th>Date</th>
{{--                                            <th>Action</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->properties as $property)
                                            <tr>
                                                <td>{{ $property->title }}</td>
                                                <td>{{ $property->user->name }}</td>
                                                <td>{{ $property->property_id }}</td>
                                                <td>{{ $property->type }}</td>
                                                <td>{{ $property->created_at->format('Y-m-d') }}</td>
                                                {{--<td>
                                                    {!! getModal($property->is_feature, $property->id, 'Featured', 'Property') !!}
                                                    {!! getModal($property->is_active, $property->id, 'Deactivate', 'Property') !!}
                                                    {!! getModal($property->is_sold, $property->id, 'Sold', 'Property') !!}
                                                </td>--}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Agent Name</th>
                                            <th>Property ID</th>
                                            <th>Status</th>
                                            <th>Date</th>
{{--                                            <th>Action</th>--}}
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Agent Name</th>
                                            <th>Property ID</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            {{--                                            <th>Action</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->soldProperties as $property)
                                            <tr>
                                                <td>{{ $property->title }}</td>
                                                <td>{{ $property->user->name }}</td>
                                                <td>{{ $property->property_id }}</td>
                                                <td>{{ $property->type }}</td>
                                                <td>{{ $property->created_at->format('Y-m-d') }}</td>
                                                {{--<td>
                                                    {!! getModal($property->is_feature, $property->id, 'Featured', 'Property') !!}
                                                    {!! getModal($property->is_active, $property->id, 'Deactivate', 'Property') !!}
                                                    {!! getModal($property->is_sold, $property->id, 'Sold', 'Property') !!}
                                                </td>--}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Agent Name</th>
                                            <th>Property ID</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            {{--                                            <th>Action</th>--}}
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    Add here
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop
