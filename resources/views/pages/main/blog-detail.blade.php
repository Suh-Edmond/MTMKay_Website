@extends('layouts.app')

@section('content')

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Blog Details</h2>
                <div class="page_link">
                    <a href="{{route('home')}}">Home</a>
                    <a href="{{route('blog')}}">Blog</a>
                    <a href="#">Blog Details</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Blog Area =================-->
<section class="blog_area single-post-area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{$blog->getSingleBlogImage($blog->id)->file_path}}" alt="" width="100%" height="100%">
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-3">
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
                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 blog_details">
                        <h2>{{$blog->title}}</h2>
                        <p class="excert">
                            {{$blog->description}}
                         </p>

                    </div>
                    <div class="col-lg-12">

                        <div class="row">
                            @foreach($blog->blogImages as $image)
                                <div class="col-6">
                                    <img class="img-fluid" src="{{$image->file_path}}" alt="">
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="navigation-area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                            <div class="thumb">
                                <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                            </div>
                            <div class="arrow">
                                <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                            </div>
                            <div class="detials">
                                <p>Prev Post</p>
                                <a href="#"><h4>Space The Final Frontier</h4></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                            <div class="detials">
                                <p>Next Post</p>
                                <a href="#"><h4>Telescopes 101</h4></a>
                            </div>
                            <div class="arrow">
                                <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                            </div>
                            <div class="thumb">
                                <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comments-area">
                    <h4>{{$blog->blogComments->count()}} Comments</h4>
                    @foreach($blog->blogComments as $comment)
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c1.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">{{$comment->name}}</a></h5>
                                        <p class="date">{{$comment->created_at->format('D, d M Y')}} </p>
                                        <p class="comment">
                                            {{$comment->message}}
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form action="{{route('create-comment', ['id' => $blog->id])}}" method="post" id="contactForm">
                        @csrf
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-6 name">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 email">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                        </div>
                        <button type="submit" value="submit" class="btn submit_btn">Post Comment</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget author_widget">
                        <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                        <h4>Micheal Mbu</h4>
                        <p>IT and CyberSecurity Expert</p>
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
                                    <p>02 Hours ago</p>
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
                        <h4 class="widget_title">Post Catgories</h4>
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
                            <a href="#" class="bbtns">Subcribe</a>
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
