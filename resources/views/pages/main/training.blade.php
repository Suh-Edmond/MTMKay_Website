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
            <div class="main_title">
                <h2>Testimonials</h2>
            </div>
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
    <section class="impress_area p_120">
        <div class="container">
            <div class="impress_inner text-center">
                <h2>Improve Your Skills</h2>
                <p>It is not too late to grow your IT skills in CyberSecurity solutions or Cloud Infrastructure. Get the certifications and training required to become the next IT consultant</p>
                <a class="main_btn2" href="#">Apply here</a>
            </div>
        </div>
    </section>
    <!--================End Pagkages Area =================-->
@endsection
