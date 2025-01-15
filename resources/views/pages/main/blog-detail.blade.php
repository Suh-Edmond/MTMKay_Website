@section('title', 'MTMKay-Blog-News details')

<x-guest-layout>
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
                            <img class="img-fluid" src="{{asset($blog->getSingleBlogImage($blog->id) ?? '')}}" alt="" width="100%" height="100%">
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-3">
                        <div class="blog_info text-right">
                            <div class="post_tag">
                                <a href="{{route('blog', ['title' => $blog->category->name, 'id'=>$blog->category->id])}}" class="active">{{$blog->category->name}}</a>
                            </div>
                            <ul class="blog_meta list">
                                <li><a >{{$blog->created_at->format('D, d M Y')}}<i class="lnr lnr-calendar-full"></i></a></li>
                                <li><a href="#blog_comments">{{ $blog->getApprovedBlogComments($blog->id)->count()}} Comments<i class="lnr lnr-bubble"></i></a></li>
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
                            {!! $blog->description !!}
                         </p>

                        <div>
                            <label><h6>Tags:</h6></label>
                            @foreach($blog->tags as $tag)
                                <a href="{{route('blog', ['tag' => $tag->name])}}" class="genric-btn default circle">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-12">

                        <div class="row">
                            @foreach($blog->blogImages as $image)
                                <div class="col-6 col-md-6 mt-4 blog_image_list">
                                    <img class="img-fluid" src="{{ asset($blog->getImagePath($blog, $image->file_path))}}" alt="" height="40%" width="40%">
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="comments-area" id="blog_comments">
                    <h4>{{$blog->getApprovedBlogComments($blog->id)->count()}} Comments</h4>
                    @foreach($blog->getApprovedBlogComments($blog->id) as $comment)
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">

                                        <img src="img/company/human_2.png" alt="" width="60px" height="60px">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">{{$comment->name}}</a></h5>
                                        <p class="date">{{$comment->created_at->format('D, d M Y')}} </p>
                                        <p class="comment" style="color: darkgray !important;">{{$comment->subject}} </p>
                                        <p class="comment">
                                            {!! $comment->message !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if(session('success'))
                    <div class="d-flex justify-content-center session_message">
                        <div class=" my-4 font-bold text-primary session_message">
                            {{session('success')}}
                        </div>
                    </div>
                @endif
                <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form action="{{route('create-comment', ['id' => $blog->id])}}" method="post">
                        @csrf
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-6 name">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'" required value="{{old('name')}}">
                                @if($errors->has('name'))
                                    @foreach($errors->get('name') as $message )
                                        <span style="color: red">{{ $message }}</span><br>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group col-lg-6 col-md-6 email">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" required value="{{old('email')}}">
                                @if($errors->has('email'))
                                    @foreach($errors->get('email') as $message )
                                        <span style="color: red">{{ $message }}</span><br>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'" required value="{{old('subject')}}">
                            @if($errors->has('subject'))
                                @foreach($errors->get('subject') as $message )
                                    <span style="color: red">{{ $message }}</span><br>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required="">{{old('message')}}</textarea>
                            @if($errors->has('message'))
                                @foreach($errors->get('message') as $message )
                                    <span style="color: red">{{ $message }}</span><br>
                                @endforeach
                            @endif
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
                        <p>Why spend so much money on Boot Camps, when you can be trained and certified from our rich catalog of programs. Fully design with resources to meet your career goals.</p>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Popular Posts</h3>
                        @foreach($popularBlogs as $popularBlog)
                            <div class="media post_item">
                                <img src="{{asset($popularBlog->getSingleBlogImage($popularBlog->id))}}" alt="post" height="25%" width="25%">
                                <div class="media-body">
                                    <a href="{{route('show-blog', ['slug'=> $popularBlog->slug])}}"><h3>{{$popularBlog->title}}</h3></a>
                                    <p>{{$popularBlog->getBlogCreatedHours($popularBlog->id) }}</p>
                                </div>
                            </div>
                        @endforeach
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget ads_widget">
                        <a href="#"><img class="img-fluid" src="img/company/comp-impact.jpg" alt=""></a>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Post Categories</h4>
                        <ul class="list cat-list">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{route('blog', ['title' => $category->name, 'id'=>$category->id])}}" class="d-flex justify-content-between">
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
                            <form id="myForm">
                                @csrf
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    </div>
                                    <input  name="email" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" required type="email">
                                    <button  class="bbtns btn  sub-btn" type="submit" >Subscribe</button>
                                </div>
                                <div class="mt-10 info" id="show_subscription_process" style="display: none; background-color: #385abe !important;color: white!important;">Subscribing...</div>
                            </form>
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

<script>
    $(document).ready(function () {
        setTimeout(showFeedback, 3000)
    });

    function showFeedback() {
        $(".session_message").css("display", "none");
    }
</script>
