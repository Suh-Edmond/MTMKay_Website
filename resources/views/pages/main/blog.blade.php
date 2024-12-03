@section('title', 'Blogs')
<x-guest-layout>
<!--================Home Banner Area =================-->
<section class="home_banner_area blog_banner">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            @if(isset($filteredCategory))
                <div class="blog_b_text text-center">
                    <h2>Our Blogs on {{$filteredCategory->name}}</h2>
                    <p>{{$filteredCategory->caption_text}}. </p>
                    <a class="main_btn" href="{{route('blog')}}">All Blogs</a>
                </div>
            @elseif(isset($tag)){
            <div class="blog_b_text text-center">
                <h2>Our Blogs on {{$tag}}</h2>
                <a class="main_btn" href="{{route('blog')}}">View More</a>
            </div>
            @else
                <div class="blog_b_text text-center">
                    <h2>Our Blogs</h2>
                    <p>Get to know MTMKay expertize, the events and new programs we launch. </p>
                    <a class="main_btn" href="{{route('blog')}}">View More</a>
                </div>
            @endif
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Blog Categorie Area =================-->
<section class="blog_categorie_area">
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="{{$category->image_path}}" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="{{route('blog', ['title' => $category->name, 'slug' => $category->slug])}}"><h5>{{$category->name}}</h5></a>
                                <div class="border_line"></div>
                                <p>{{$category->caption_text}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
                                        <a href="#" class="active">{{$blog->category->name}}</a>
                                    </div>
                                    <ul class="blog_meta list">
                                        <li><a href="#">{{$blog->created_at->format('D, d M Y')}}<i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#">{{ $blog->blogComments()->count()}} Comments<i class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="{{asset($blog->getSingleBlogImage($blog->id))}}" alt="" width="100%">
                                    <div class="blog_details">
                                        <a href="{{route('show-blog', ['slug'=>$blog->slug])}}"><h2>{{$blog->title}}</h2></a>
                                        <p>{{$blog->description}}.</p>
                                        <a href="{{route('show-blog', ['slug'=>$blog->slug])}}" class="white_bg_btn">View More</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    @if(($blogs->count() > 0))
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li   class="{{$blogs->currentPage() == 1 ? 'page-item disabled':'page-item'}}">
                                <a href="{{route('blog', ['page' =>$blogs->currentPage() - 1, 'tag' => $tag, 'slug' => $slug, 'search'=> $search, 'title' => $title])}}" class="page-link" aria-label="Previous">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-left"></span>
		                                    </span>
                                </a>
                            </li>
                            @for($i = 1; $i <= $blogs->lastPage(); $i++)
                                <li class="{{$blogs->currentPage() == $i ? 'page-item active':'page-item'}}">
                                    <a class="page-link" href="{{route('blog', ['page' => $i, 'tag' => $tag, 'slug' => $slug, 'search'=> $search, 'title' => $title])}}">{{$i}}</a>
                                </li>
                            @endfor

                            <li   class="{{$blogs->currentPage() == $blogs->lastPage() ? 'page-item disabled': 'page-item'}}">
                                <a href="{{route('blog', ['page' =>$blogs->currentPage() + 1, 'tag' => $tag, 'slug' => $slug, 'search'=> $search, 'title' => $title])}}" class="page-link" aria-label="Next">
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
                                <h6 class="typo-list">Oops! The is no blog post that matches your search</h6>

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
                        <p>Why spend so much money on Boot Camps, when you can be trained and certified from our rich catalog of programs. Fully design with resources to meet your career goals.</p>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Popular Posts</h3>
                        @foreach($popularBlogs as $popularBlog)
                            <div class="media post_item">
                                <img src="{{$popularBlog->getSingleBlogImage($popularBlog->id)->file_path ?? ''}}" alt="post" height="25%" width="25%">
                                <div class="media-body">
                                    <a href="{{route('show-blog', ['slug'=> $popularBlog->slug])}}"><h3>{{$popularBlog->title}}</h3></a>
                                    @if($popularBlog->getBlogCreatedHours($popularBlog->id) < 1)
                                        <p>Few Minutes Ago</p>
                                    @else
                                        <p>{{$popularBlog->getBlogCreatedHours($popularBlog->id) }} Hours ago</p>
                                    @endif
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
                                    <a href="{{route('blog', ['title' => $category->name, 'slug'=>$category->slug])}}" class="d-flex justify-content-between">
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
                            @foreach($tags as $tag)
                                <li><a href="{{route('blog', ['tag' => $tag->name])}}">{{$tag->name}}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

</x-guest-layout>
