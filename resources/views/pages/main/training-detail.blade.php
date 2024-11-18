@extends('layouts.app')

@section('content')

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>{{$program->title}}</h2>
                <div class="page_link">
                    <a href="{{route('home')}}">Home</a>
                    <a href="{{route('training')}}">Program</a>
                    <a href="#">Program Details</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Course Details Area =================-->
<section class="course_details_area p_120">
    <div class="container">
        <div class="row course_details_inner">
            <div class="col-lg-8">
                <div class="c_details_img">
                    <img class="img-fluid" src="{{$program->image_path}}" alt="" width="100%">
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Objectives</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Eligibility</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Course Outline</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="objctive_text">
                            <p>{{$program->objective}}</p>
                         </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="objctive_text">
                            <p>{{$program->eligibility}}</p>
                         </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="objctive_text">
                            <ul class="list">
                                @foreach($program->programOutlines as $key => $outline)
                                    <li><h5>{{substr($outline->period, 0, strlen($outline->period) - 1 )}} {{$key+1}}</h5> <a href="#">{{$outline->topic}}</a></li>
                                @endforeach
                            </ul>
                            <p>Each 12-month program includes an internship during the final quarter, where students gain real-world experience and apply their skills in industry settings. This hands-on exposure ensures students are job-ready upon completion.</p>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="c_details_list">
                    <ul class="list">
                        <li><a href="#">Trainer’s Name <span>{{$program->trainer_name}}</span></a></li>
                        <li><a href="#">Program Fee <span>{{number_format($program->cost)}} XAF</span></a></li>
                        <li><a href="#">Available Seats <span>{{$program->available_seats}}</span></a></li>
                        <li><a href="#">Schedule <span>Monday - Friday</span></a></li>
                        <li><a href="#">Time <span>8.00 am to 4.00 pm</span></a></li>
                    </ul>
                    <a class="main_btn" href="#">Enroll the Program</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Course Details Area =================-->
@endsection
