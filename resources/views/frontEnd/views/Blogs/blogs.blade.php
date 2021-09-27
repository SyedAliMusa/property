@extends('frontEnd.layout.default')
@section('content')

    <!-- Page Content -->
    <div class="page-content">
        <!-- Banner Section -->
        <div id="page-banner-section" class="page-banner-section container-fluid p_z">
            <img src="{{ asset('frontEnd') }}/banner/propertyDetailBanner.jpg" alt="banner">
            <!-- Banner Inner -->
            <div class="page-title">
                <div class="container ">
                    <div class="banner-inner">
                        <h2>Knowledge is the key to success</h2>
                    </div>
                </div>
                <div class="pages-breadcrumb">
                    <div class="container">
                        <!-- Page breadcrumb -->
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Blogs</li>
                        </ol>
                    </div>
                </div>
            </div><!-- Banner Inner /- -->
        </div><!-- Banner Section /- -->
        <!-- container -->
        <div class="container">
            <!-- container fluid -->
            <div class="container-fluid p_z">
                <!-- col-md-9 -->
                <div class="col-md-9 col-sm-6 p_l_z content-area">
                    <div class="blog-listing">

                        @foreach($blogs as $blog)
                            <article>
                            <div class="entry-cover">
                                <a title="entry-cover" href="{{ route('blogDetail', $blog->id ) }}">{!! BlogsImages($blog->banner_image) !!}</a>
                                <i class="fa fa-image"></i>
                            </div>
                            <div class="entry-header">
                                <h3 class="entry-title"><a href="{{ route('blogDetail', $blog->id ) }}" title="Blog Title">{{ $blog->title }}</a></h3>
                                <div class="entry-meta">
									<span class="posted-on">
										<a title="Blog Date" href="#"><i class="fa fa-clock-o"></i> Posted On {{ $blog->created_at->format('d M Y') }}</a>
									</span>
                                    <span class="byline">
										<i class="fa fa-user"></i><a title="Author" href="#">Admin</a>
									</span>
                                    <span class="tag-link">
										<i class="fa fa-list-alt"></i><a title="Category" href="#">{{ $blog->category->name }}</a>
									</span>
                                    <span class="tag-link">
										<i class="fa fa-tags"></i><a title="Tags" href="#">
                                            @foreach($blog->tags as $tag)
                                                <button disabled>{{ $tag->name }}</button>
                                            @endforeach
                                        </a>
									</span>
                                </div>
                            </div>
                            <div class="entry-content">
                                <p>{{ $blog->summary }}</p>
                                <a href="{{ route('blogDetail', $blog->id ) }}" title="Read more" class="read-more">Read More</a>
                            </div>
                        </article>
                        @endforeach
                    </div>
                    <div class="listing-pagination">
                        <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div>
                </div><!-- col-md-9 /- -->
                <!-- col-md-3 -->
                <div class="col-md-3 col-sm-6 p_r_z blog-sidebar widget-area">
                    <!-- Widget Popular Post -->
                    <aside class="widget widget-property-featured">
                        <h2 class="widget-title">Popular<span>Post</span></h2>
                        @if(count($popularPost) > 0)
                            @foreach($popularPost as $post)
                                <div class="property-featured-inner">
                                    <div class="col-md-4 col-sm-3 col-xs-2 p_z">
                                        <a title="Popular Post" href="{{ route('blogDetail', $post->id) }}"><img src="{{ asset('BlogsImages') }}/{{ $post->small_image }}" alt="feacture1"></a>
                                    </div>
                                    <div class="col-md-8 col-sm-9 col-xs-10 featured-content">
                                        <a title="Popular Post" href="{{ route('blogDetail', $post->id) }}">{{ $post->title }}</a>
                                        <span><i class="fa fa-clock-o"></i> {{ $post->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            There is no Popular Blogs
                        @endif
                    </aside><!-- Widget Popular Post /- -->

                    <!-- Widget Featured Property -->
                    <aside class="widget widget-property-featured">
                        <h2 class="widget-title">featured<span>property</span></h2>
                        @if(count($property) > 0)
                            @foreach($property as $pro)
                                <div class="property-featured-inner">
                                    <div class="col-md-4 col-sm-3 col-xs-2 p_z">
                                        <a title="Featured Post" href="{{ route('showProperty', $pro->id) }}"><img src="{{ fileExist85($pro->type, $pro->featured_image) }}" alt="feacture1"></a>
                                    </div>
                                    <div class="col-md-8 col-sm-9 col-xs-10 featured-content">
                                        <a title="Featured Post" href="{{ route('showProperty', $pro->id) }}">{{ $pro->title }}</a>
                                        <h3>&dollar;350000</h3>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            There is no Featured Property
                        @endif
                    </aside><!-- Widget Featured Property /- -->
                </div><!-- col-md-3 /- -->
            </div><!-- container fluid /- -->
        </div><!-- container /- -->
    </div><!-- Page Content -->

@stop
