@extends('Admin.layout.default')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Blog</li>
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
                        <form action="{{ route('adminEditBlog', $blog->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body pad">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input value="{{ $blog->title }}" type="text" name="title" class="form-control" id="" placeholder="Enter Title" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Meta Title</label>
                                    <input value="{{ $blog->meta_title }}" type="text" name="metaTitle" class="form-control" id="" placeholder="Enter Meta Title" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Slug (Separated by hyphen(-) without space) </label>
                                    <input value="{{ $blog->slug }}" type="text" name="slug" class="form-control" id="" placeholder="Enter Slug" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Tags (Separated by comma without space) Leave Empty if you dont want to change</label>
                                    <input type="text" name="tags" class="form-control" id="" placeholder="Enter Tags">
                                </div>

                                <div class="form-group">
                                    <label>Summary</label>
                                    <textarea required name="summary" class="form-control" rows="3" placeholder="Enter Summary">{{ $blog->summary }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Featured Image (787 x 344) Leave Empty if you dont want to change</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="" name="fImage">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Recent Blog Image (246 x 155) Leave Empty if you dont want to change</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="" name="rImage">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <select  required name="category" class="form-control select2bs4" style="width: 100%;">
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <textarea class="textarea" name="content"
                                              placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px;
                                              line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $blog->content }}</textarea>
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
