@extends('Admin.layout.default')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blog Listing</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('adminHome') }}">Home</a></li>
                            <li class="breadcrumb-item active">Blogs List</li>
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
                                    <th>Sr#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Meta Title</th>
                                    <th>Slug</th>
                                    <th>summary</th>
                                    <th>Published</th>
                                    <th>Featured Image</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $counter = 1; @endphp
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->category->name }}</td>
                                        <td>{{ $blog->meta_title }}</td>
                                        <td>{{ $blog->slug }}</td>
                                        <td>{{ $blog->summary }}</td>
                                        <td>{!! isTrue(isProfileHas($blog->published)) !!}</td>
                                        <td>{!! isTrue(isProfileHas($blog->banner_image)) !!}</td>
                                        <td>{{ $blog->created_at }}</td>
                                        <td>
                                            <a href="{{ route('adminEditBlogHtml', $blog->id) }}"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('adminDeleteBlog', $blog->id) }}"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Meta Title</th>
                                    <th>Slug</th>
                                    <th>summary</th>
                                    <th>Published</th>
                                    <th>Featured Image</th>
                                    <th>Created At</th>
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
@stop
