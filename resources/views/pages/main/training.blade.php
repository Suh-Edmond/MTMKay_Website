@extends('layouts.app')


@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Traning</h2>
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
                <h2>Popular Programs</h2>
                <p>MTMKay Technology Solutions offers certifications to meet the growing demand for skilled IT professionals.</p>
            </div>
            <div class="row courses_inner">
                <div class="col-lg-9">
                    <div class="grid_inner">
                        <div class="grid_item wd55">
                            <div class="courses_item">
                                <img src="img/courses/course-1.jpg" alt="">
                                <div class="hover_text">
                                    <a class="cat" href="{{route('show-training', ['id' => 1])}}">View</a>
                                    <a href="#"><h4>Microsoft Azure Fundamentals</h4></a>
                                    <ul class="list">
                                        <li><a href="#"><i class="lnr lnr-users"></i> 355</a></li>
                                        <li><a href="#"><i class="lnr lnr-bubble"></i> 35</a></li>
                                        <li><a href="#"><i class="lnr lnr-user"></i> T. Robert</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="grid_item wd44">
                            <div class="courses_item">
                                <img src="img/courses/course-2.jpg" alt="">
                                <div class="hover_text">
                                    <a class="cat" href="{{route('show-training', ['id' => 1])}}">View</a>
                                    <a href="#"><h4>Cisco Certified Network Associate (CCNA)</h4></a>
                                    <ul class="list">
                                        <li><a href="#"><i class="lnr lnr-users"></i> 355</a></li>
                                        <li><a href="#"><i class="lnr lnr-bubble"></i> 35</a></li>
                                        <li><a href="#"><i class="lnr lnr-user"></i> T. Robert</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="grid_item wd44">
                            <div class="courses_item">
                                <img src="img/courses/course-4.jpg" alt="">
                                <div class="hover_text">
                                    <a class="cat" href="{{route('show-training', ['id' => 1])}}">View</a>
                                    <a href="#"><h4>CompTIA Security+</h4></a>
                                    <ul class="list">
                                        <li><a href="#"><i class="lnr lnr-users"></i> 355</a></li>
                                        <li><a href="#"><i class="lnr lnr-bubble"></i> 35</a></li>
                                        <li><a href="#"><i class="lnr lnr-user"></i> T. Robert</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="grid_item wd55">
                            <div class="courses_item">
                                <img src="img/courses/course-5.jpg" alt="">
                                <div class="hover_text">
                                    <a class="cat" href="{{route('show-training', ['id' => 1])}}">View</a>
                                    <a href="#"><h4>Corporate Training</h4></a>
                                    <ul class="list">
                                        <li><a href="#"><i class="lnr lnr-users"></i> 355</a></li>
                                        <li><a href="#"><i class="lnr lnr-bubble"></i> 35</a></li>
                                        <li><a href="#"><i class="lnr lnr-user"></i> T. Robert</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="course_item">
                        <img src="img/courses/course-3.jpg" alt="">
                        <div class="hover_text">
                            <a class="cat" href="{{route('show-training', ['id' => 1])}}">View</a>
                            <a href="#"><h4>Comptia a+</h4></a>
                            <ul class="list">
                                <li><a href="#"><i class="lnr lnr-users"></i> 355</a></li>
                                <li><a href="#"><i class="lnr lnr-bubble"></i> 35</a></li>
                                <li><a href="#"><i class="lnr lnr-user"></i> T. Robert</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Courses Area =================-->


    <!--================Testimonials Area =================-->
    <section class="packages_area p_120">
        <div class="container">
            <div class="testi_slider owl-carousel">
                <div class="item">
                    <div class="testi_item">
                        <img src="img/testimonials/testi-3.png" alt="">
                        <h4>Fannie Rowe</h4>
                        <ul class="list">
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                        <p>Thanks to MTMKay, I gained the skills needed to pass my certification exams and secure my first IT job</p>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <img src="img/testimonials/testi-3.png" alt="">
                        <h4>Fannie Rowe</h4>
                        <ul class="list">
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                        <p>Thanks to MTMKay, I gained the skills needed to pass my certification exams and secure my first IT job</p>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <img src="img/testimonials/testi-3.png" alt="">
                        <h4>Fannie Rowe</h4>
                        <ul class="list">
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                        <p>Thanks to MTMKay, I gained the skills needed to pass my certification exams and secure my first IT job</p>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <img src="img/testimonials/testi-3.png" alt="">
                        <h4>Fannie Rowe</h4>
                        <ul class="list">
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                        <p>Thanks to MTMKay, I gained the skills needed to pass my certification exams and secure my first IT job</p>
                    </div>
                </div>
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
