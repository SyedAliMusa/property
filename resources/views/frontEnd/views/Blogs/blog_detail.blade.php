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
                        <h2>Blog Detail</h2>
                    </div>
                </div>
                <div class="pages-breadcrumb">
                    <div class="container">
                        <!-- Page breadcrumb -->
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><a href="#">Home</a></li>
                            <li class="active">Blog Detail</li>
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
                    <div class="blog-listing single-post col-md-12 p_z">
                        <article>
                            <div class="entry-cover">
                                <img src="{{ asset('BlogsImages') }}/{{ $blog->banner_image  }}" alt="blog" />
                                <i class="fa fa-image"></i>
                            </div>
                            <div class="entry-header">
                                <h3 class="entry-title">{{ $blog->title }}</h3>
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
                                {!! $blog->content !!}
                            </div>
                        </article>
                        <!-- Related Post -->
                        <div class="related-post p_z row">
                            <h3>Related Post</h3>
                            @if(count($related_post) > 0)
                                @foreach($related_post as $post)
                                    <div class="col-md-4 col-sm-12">
                                        <a title="Related post" href="{{ route('blogDetail', $post->id ) }}"><img src="{{ asset('BlogsImages') }}/{{ $post->recent_image }}" alt="releted-post-1" /></a>
                                        <a title="Related post" href="{{ route('blogDetail', $post->id ) }}">{{ $post->title }}</a>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-4 col-sm-12">
                                    <p>There is no Recent Blog</p>
                                </div>
                            @endif
                        </div><!-- Related Post /- -->

                        <!-- Entry Author -->

                        <div class="comments-area">
                            <h3>Comments</h3>

                            <!-- Post -->
                            <ul class="commentlist">
                                @if(count($blog->comments) > 0)
                                    @foreach($blog->comments as $comment)
                                        <li>
                                            <div class="comment">
                                                <span class="comment-image">
                                                    <img src="{{ asset('frontEnd') }}/images/single-property/agent.jpg" alt="disha-seth">
                                                </span>
                                                <h4 class="comment-info">
                                                    {{ $comment->name }} <span>{{ $comment->created_at->format('D') }}, {{ $comment->created_at->format('d M Y') }}</span>
                                                </h4>
                                                <p>{{ $comment->message }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    Be the first to comments on this
                                @endif
                            </ul>
                            <!-- Post /- -->

                            <div class="comment-respond" id="respond">
                                <h3>Leave a Comment</h3>
                                <form class="comment-form" id="commentform" method="post" action="{{ route('addBlogComment') }}">
                                    @csrf
                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}" class="comments-line" required>
                                    <div class="col-md-7">
                                        <label>Full Name</label>
                                        <input type="text" name="name" class="comments-line" required>
                                    </div>
                                    <div class="col-md-7">
                                        <label>E-Mail</label>
                                        <input type="text" name="email" class="comments-line" required>
                                    </div>
                                    <div class="col-md-7">
                                        <label>Subject</label>
                                        <input type="text" name="subject" required class="comments-line">
                                    </div>
                                    <div class="col-md-11">
                                        <label>Message</label>
                                        <textarea name="message" required class="comments-area"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" value="Submit Comment" id="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Comment Area /- -->
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
