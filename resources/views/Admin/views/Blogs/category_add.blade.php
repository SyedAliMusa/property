@extends('Admin.layout.default')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <button class="btn btn-block btn-primary btn-lg" readonly="true">
                                Stay Strong!!!
                            </button>
                            <!-- tools box -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                        title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('addBlogCategory') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body pad">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="title" class="form-control" id="" placeholder="Enter Title" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Meta Title</label>
                                    <input type="text" name="metaTitle" class="form-control" id="" placeholder="Enter Meta Title" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Slug (Separated by hyphen(-) without space)</label>
                                    <input type="text" name="slug" class="form-control" id="" placeholder="Enter Slug" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="active" value="Active" class="form-control" readonly>
                                </div>

                                <button type="submit" class="btn btn-block btn-primary btn-lg">Submit Blog</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@stop
