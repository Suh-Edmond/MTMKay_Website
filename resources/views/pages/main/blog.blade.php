@extends('layouts.app')


@section('content')

<!--================Home Banner Area =================-->
<section class="home_banner_area blog_banner">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="blog_b_text text-center">
                <h2>Our Blogs</h2>
                <p>Get to know MTMKay expertize, the events and new programs we launch. </p>
                <a class="main_btn" href="#">View More</a>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Blog Categorie Area =================-->
<section class="blog_categorie_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="categories_post">
                    <img src="img/blog/cat-post/cat-post-3.jpg" alt="post">
                    <div class="categories_details">
                        <div class="categories_text">
                            <a href="#"><h5>CyberSecurity</h5></a>
                            <div class="border_line"></div>
                            <p>The Importance of CyberSecurity for Small Businesses</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="categories_post">
                    <img src="img/blog/cat-post/cat-post-2.jpg" alt="post">
                    <div class="categories_details">
                        <div class="categories_text">
                            <a href="#"><h5>IT Certifications</h5></a>
                            <div class="border_line"></div>
                            <p>Top IT Certifications to Boost Your Career in 2024</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="categories_post">
                    <img src="img/blog/cat-post/cat-post-1.jpg" alt="post">
                    <div class="categories_details">
                        <div class="categories_text">
                            <a href="#"><h5>Cloud Computing</h5></a>
                            <div class="border_line"></div>
                            <p>How Cloud Computing is Revolutionizing Business Operations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Categorie Area =================-->

<!--================Blog Area =================-->
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_left_sidebar">
                    @foreach($blogs as $key => $blog)
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        <a href="#" class="active">{{$blog->categories[0]->name}}</a><br>
                                        @for($i = 1; $i < $blog->categories->count(); $i++)
                                            <a href="#">{{$blog->categories[$i]->name}}</a><br>
                                        @endfor
                                    </div>
                                    <ul class="blog_meta list">
                                        <li><a href="#">{{$blog->created_at->format('D, d M Y')}}<i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#">{{ $blog->blogComments()->count()}} Comments<i class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="{{$blog->getSingleBlogImage($blog->id)->file_path ?? ''}}" alt="" width="100%">
                                    <div class="blog_details">
                                        <a href="{{route('show-blog', ['id'=>$blog->id])}}"><h2>{{$blog->title}}</h2></a>
                                        <p>{{$blog->description}}.</p>
                                        <a href="{{route('show-blog', ['id'=>$blog->id])}}" class="white_bg_btn">View More</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    @if(($blogs->count() > 0))
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li   class="{{$blogs->currentPage() == 1 ? 'page-item disabled':'page-item'}}">
                                <a href="{{route('blog', ['page' =>$blogs->currentPage() - 1])}}" class="page-link" aria-label="Previous">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-left"></span>
		                                    </span>
                                </a>
                            </li>
                            @for($i = 1; $i <= $blogs->lastPage(); $i++)
                                <li class="{{$blogs->currentPage() == $i ? 'page-item active':'page-item'}}">
                                    <a class="page-link" href="{{route('blog', ['page' => $i])}}">{{$i}}</a>
                                </li>
                            @endfor

                            <li   class="{{$blogs->currentPage() == $blogs->lastPage() ? 'page-item disabled': 'page-item'}}">
                                <a href="{{route('blog', ['page' =>$blogs->currentPage() + 1])}}" class="page-link" aria-label="Next">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-right"></span>
		                                    </span>
                                </a>
                            </li>
                        </ul>

                    </nav>
                    @endif
                    @if(($blogs->count() == 0))
                            <div class="single-input p-5 text-center">
                                <h6 class="typo-list">Ooops! The is no blog post that matches your search</h6>

                                <a href="{{route('blog')}}" class="primary-btn btn-sm mt-4 submit_btn"><span class="lnr lnr-arrow-left"></span> Back to Blogs</a>
                            </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="{{route('blog')}}" method="get" id="contactForm">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Posts" name="search">
                                <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="lnr lnr-magnifier"></i></button>
                            </span>
                            </div>
                        </form>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget author_widget">
                        <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                        <h4>Charlie Barber</h4>
                        <p>Senior blog writer</p>
                        <div class="social_icon">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                        <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits detractors.</p>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Popular Posts</h3>
                        @foreach($popularBlogs as $popularBlog)
                            <div class="media post_item">
                                <img src="{{$popularBlog->getSingleBlogImage($popularBlog->id)->file_path}}" alt="post" height="25%" width="25%">
                                <div class="media-body">
                                    <a href="{{route('show-blog', ['id'=> $popularBlog->id])}}"><h3>{{$popularBlog->title}}</h3></a>
                                    <p>{{$popularBlog->getBlogCreatedHours($popularBlog->id) }} Hours ago</p>
                                </div>
                            </div>
                        @endforeach


                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget ads_widget">
                        <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Post Categories</h4>
                        <ul class="list cat-list">
                            @foreach($categories as $category)
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>{{$category->name}}</p>
                                        <p>{{$category->blogs()->count()}}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="br"></div>
                    </aside>
                    <aside class="single-sidebar-widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>
                        <p>
                            Stay up-to-date with recent Technology Advancements and Certifications.
                        </p>
                        <div class="form-group d-flex flex-row">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                            </div>
                            <a href="#" class="bbtns">Subscribe</a>
                        </div>
                        <p class="text-bottom">You can unsubscribe at any time</p>
                        <div class="br"></div>
                    </aside>
                    <aside class="single-sidebar-widget tag_cloud_widget">
                        <h4 class="widget_title">Tag Clouds</h4>
                        <ul class="list">
                            @foreach($categories as $category)
                                <li><a href="#">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->



@endsection
