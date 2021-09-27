@extends('Admin.layout.default')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Featured Agent Listing</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('adminHome') }}">Home</a></li>
                            <li class="breadcrumb-item active">Featured Agent List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="overflow-x: scroll">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Profile</th>
                                    <th>Mobile</th>
                                    <th>Office No</th>
                                    <th>Featured</th>
                                    <th>Confirmed</th>
                                    <th>Total Listing</th>
                                    <th>Total Sold</th>
                                    <th>Address</th>
                                    <th>Account Created</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{!! isTrue(isProfileHas($user->profile)) !!}</td>
                                        <td>{{ $user->mobile }}</td>
                                        <td>{{ $user->telephone }}</td>
                                        <td>{!! isTrue($user->is_feature) !!}</td>
                                        <td>{!! isTrue($user->is_confirmed) !!}</td>
                                        <td>@php echo count($user->properties) @endphp</td>
                                        <td>@php echo count($user->soldProperties) @endphp</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="{{ route('adminSeeUserProfile', $user->id) }}"><i class="fas fa-eye"></i></a>
                                            |
                                            {!! getModal($user->is_feature, $user->id, 'Featured') !!}
                                            |
                                            {!! getModal($user->is_active, $user->id, 'Deactivate') !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Profile</th>
                                    <th>Mobile</th>
                                    <th>Office No</th>
                                    <th>Featured</th>
                                    <th>Confirmed</th>
                                    <th>Total Listing</th>
                                    <th>Total Sold</th>
                                    <th>Address</th>
                                    <th>Account Created</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <div class="modal fade" id="modal-success">
        <div class="modal-dialog">
            <div class="modal-content bg-success">
                <div class="modal-header">
                    <h4 class="modal-title">Success Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <form action="{{ route('SetType') }}" method="post">
                        @csrf
                        <input type="hidden" value="" name="userId" id="setUserId">
                        <input type="hidden" value="" name="type" id="setType">
                        <button type="submit" class="btn btn-outline-light">Save changes</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Danger Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <form action="{{ route('SetType') }}" method="post">
                        @csrf
                        <input type="hidden" value="" name="userId" id="setUserIdDan">
                        <input type="hidden" value="" name="type" id="setTypeDan">
                        <button type="submit" class="btn btn-outline-light">Save changes</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@stop
