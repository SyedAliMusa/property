@extends('Admin.layout.default')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">PakLand Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
{{--                        <li class="breadcrumb-item active">Dashboard v2</li>--}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Agents</span>
                            <span class="info-box-number">{{ $data['tAgents'] }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Featured Agents</span>
                            <span class="info-box-number">{{ $data['tFeaturedAgents'] }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-home"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Property</span>
                            <span class="info-box-number">{{ $data['tProperty'] }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-home"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Sold</span>
                            <span class="info-box-number">{{ $data['tSoldProperty'] }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Main row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Latest Agents</h3>

                            <div class="card-tools">
                                <span class="badge badge-danger">8 New Agents</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <ul class="users-list clearfix">
                                @foreach($data['latestAgents'] as $agent)
                                    <li>
                                        <img src="{{ asset('backEnd') }}/img/user1-128x128.jpg" alt="Agent Image">
                                        <a class="users-list-name" href="{{ route('agentProfileView', $agent->id) }}">{{ $agent->name }}</a>
                                        <span class="users-list-date">{{ $agent->created_at->format('Y-m-d') }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="{{ route('adminUserList') }}">View All Users</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Latest Rental Property List</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Agent Name</th>
                                            <th>Property ID</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['latestRentalProperty'] as $rent)
                                        <tr>
                                            <td><a href="{{ route('agentProfileView', $rent->user->id) }}">{{ $rent->user->name }}</a></td>
                                            <td>{{ $rent->property_id }}</td>
                                            <td>{{ $rent->title }}</td>
                                            <td><span class="badge badge-success">{{ $rent->style }}</span></td>
                                            <td>{{ $rent->created_at->format('Y-m-d') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{--                            <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>--}}
                            <a href="{{ route('adminPropertyList') }}" class="btn btn-sm btn-secondary float-right">View All Products</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Latest Sales Property List</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>Agent Name</th>
                                        <th>Property ID</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['latestSaleProperty'] as $sale)
                                        <tr>
                                            <td><a href="{{ route('agentProfileView', $sale->user->id) }}">{{ $sale->user->name }}</a></td>
                                            <td>{{ $sale->property_id }}</td>
                                            <td>{{ $sale->title }}</td>
                                            <td><span class="badge badge-success">{{ $sale->style }}</span></td>
                                            <td>{{ $sale->created_at->format('Y-m-d') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{--                            <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>--}}
                            <a href="{{ route('adminPropertyList') }}" class="btn btn-sm btn-secondary float-right">View All Products</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Latest Featured Property</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>Agent Name</th>
                                        <th>Property ID</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['latestFeaturedProperty'] as $feature)
                                        <tr>
                                            <td><a href="{{ route('agentProfileView', $feature->user->id) }}">{{ $feature->user->name }}</a></td>
                                            <td>{{ $feature->property_id }}</td>
                                            <td>{{ $feature->title }}</td>
                                            <td><span class="badge badge-success">{{ $feature->style }}</span></td>
                                            <td>{{ $feature->created_at->format('Y-m-d') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{--                            <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>--}}
                            <a href="{{ route('adminPropertyList') }}" class="btn btn-sm btn-secondary float-right">View All Products</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Latest Sold Property</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>Agent Name</th>
                                        <th>Property ID</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['latestSoldProperty'] as $sold)
                                        <tr>
                                            <td><a href="{{ route('agentProfileView', $sold->user->id) }}">{{ $sold->user->name }}</a></td>
                                            <td>{{ $sold->property_id }}</td>
                                            <td>{{ $sold->title }}</td>
                                            <td><span class="badge badge-success">{{ $sold->style }}</span></td>
                                            <td>{{ $sold->created_at->format('Y-m-d') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{--                            <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>--}}
                            <a href="{{ route('adminPropertyList') }}" class="btn btn-sm btn-secondary float-right">View All Products</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

@stop
