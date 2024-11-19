@extends('layouts.app')


@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Training</h2>
                    <div class="page_link">
                        <a href="{{route('home')}}">Home</a>
                        <a href="{{route('services')}}">Training</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Courses Area =================-->
    <section class="courses_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Our Programs</h2>
                <p>
                    One of MTMKay's core pillars is training and certification. We offer globally recognized IT certification courses to equip our students with valuable, in-demand skills.
                    Our programs are designed to prepare participants for competitive careers in technology, with flexible options for individuals and customized training for businesses.
                </p>
            </div>
            <div class="row courses_inner">
                @foreach($programs as $key => $program)
                    <div class="col-6 col-md-6 col-sm-12 col-lg-6 mt-4">
                        <div class="course_item">
                            <img src="{{$program->image_path}}" alt="" width="100%" height="100%">
                            <div class="hover_text">
                                <a class="cat" href="{{route('show-training', ['id' => $program->id])}}">View</a>
                                <a href="{{route('show-training', ['id' => $program->id])}}"><h4>{{$program->title}}</h4></a>
                                <ul class="list">
                                    <li><a href="#"><i class="lnr lnr-users"></i> {{count($program->enrollments)}}</a></li>
                                    <li><a href="#"><i class="lnr lnr-user"></i> {{$program->trainer_name}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================End Courses Area =================-->


    <!--================Testimonials Area =================-->
    <section class="packages_area p_120">
        <div class="container">
            <div class="testi_slider owl-carousel">
               @foreach($successes as $success)
                    <div class="item">
                        <div class="testi_item">
                            <img src="{{$success->user->profile_pic}}" alt="">
                            <h4>{{$success->user->name}}</h4>
                            <h4>{{$success->user->enrollments[0]->program->title ?? ''}}</h4>
                            <ul class="list">
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                            </ul>
                            <p>{{$success->message}}</p>
                        </div>
                    </div>
               @endforeach
            </div>
        </div>
    </section>
    <!--================End Testimonials Area =================-->

    <!--================Pagkages Area =================-->
    <section class="packages_area p_120">
        <div class="container">
            <div class="row packages_inner">
                <div class="col-lg-4">
                    <div class="packages_text">
                        <h3>Choose <br />Course Packages</h3>
                        <p>There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope. It’s exciting to think about setting up your own viewing station.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="packages_item">
                        <div class="pack_head">
                            <i class="lnr lnr-graduation-hat"></i>
                            <h3>Premium</h3>
                            <p>For the individuals</p>
                        </div>
                        <div class="pack_body">
                            <ul class="list">
                                <li><a href="#">Secure Online Transfer</a></li>
                                <li><a href="#">Unlimited Styles for interface</a></li>
                                <li><a href="#">Reliable Customer Service</a></li>
                            </ul>
                        </div>
                        <div class="pack_footer">
                            <h4>£399.00</h4>
                            <a class="main_btn" href="#">Join Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="packages_item">
                        <div class="pack_head">
                            <i class="lnr lnr-diamond"></i>
                            <h3>Exclusive</h3>
                            <p>For the individuals</p>
                        </div>
                        <div class="pack_body">
                            <ul class="list">
                                <li><a href="#">Secure Online Transfer</a></li>
                                <li><a href="#">Unlimited Styles for interface</a></li>
                                <li><a href="#">Reliable Customer Service</a></li>
                            </ul>
                        </div>
                        <div class="pack_footer">
                            <h4>£399.00</h4>
                            <a class="main_btn" href="#">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Pagkages Area =================-->
@endsection
