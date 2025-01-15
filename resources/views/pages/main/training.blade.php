@section('title', 'MTMKay-Trainings-Programs')

<x-guest-layout>
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_training d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2 class="banner_hero_text">Training</h2>
                    <div class="page_link banner_hero_btn">
                        <a href="{{route('home')}}">Home</a>
                        <a href="{{route('services')}}">Training</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Courses Area =================-->
    <section class="packages_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Our Programs</h2>
                <p style="font-size: 15px">
                    One of MTMKay's core pillars is training and certification. We offer globally recognized IT certification courses to equip our students with valuable, in-demand skills.
                </p>
            </div>
            <div class="row courses_inner">
                @foreach($programs as $key => $program)
                    <div class="col-md-4 mt-4">
                        <a href="{{route('show-training', ['slug' => $program->slug])}}">
                            <div class="course_item">
                            <img src="{{$program->getImagePath($program, $program->image_path)}}" alt="" width="100%" height="100%">
                            <div class="hover_text">
                                <a href="{{route('show-training', ['slug' => $program->slug])}}"><h4>{{$program->title}}</h4></a>
                                <ul class="list">
                                    <li><a href="#"><i class="lnr lnr-user"></i> {{$program->trainer_name}}</a></li>
                                </ul>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================End Courses Area =================-->

    <!--================Strength Area =================-->
    <section class="courses_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Our Strengths and Uniqueness</h2>
                <p style="font-size: 15px">
                    At MTMKay, we embrace our unique strengths, setting us apart in the tech industry. Our individuality drives innovation and excellence, making us a standout leader in our field.
                </p>
            </div>
            <div class="row packages_inner">
                <div class="col-md-4">
                    <div class="packages_item_training">
                        <div class="pack_head">
                            <i class="lnr lnr-graduation-hat"></i>
                            <h4>Certified and Experienced Trainers</h4>
                        </div>
                        <div class="pack_body">
                            <ul class="list">
                                <li><a href="#"  >Teaching Expertise</a></li>
                                <li><a href="#" class="first">Hands-On Experience</a></li>
                                <li><a href="#">Professional Networking</a></li>
                                <li><a href="#">Curriculum Development</a></li>
                                <li><a href="#">Strong Communication Skills</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="packages_item_training">
                        <div class="pack_head">
                            <i class="lnr lnr-briefcase"></i>
                            <h4>Internship and Placement Opportunities
                            </h4>
                        </div>
                        <div class="pack_body">
                            <ul class="list">
                                <li><a href="#">Alumni Network</a></li>
                                <li><a href="#">Industry Partnerships</a></li>
                                <li><a href="#" class="second">Career Services Support</a></li>
                                <li><a href="#">Skill Development Workshops</a></li>
                                <li><a href="#">Internship Feedback Mechanism</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="packages_item_training">
                        <div class="pack_head">
                            <i class="lnr lnr-laptop"></i>
                            <h4>Modern Infrastructures
                            </h4>
                        </div>
                        <div class="pack_body">
                            <ul class="list">
                                <li><a href="#">Smart Classrooms</a></li>
                                <li><a href="#">Flexible Learning Spaces</a></li>
                                <li><a href="#">Dedicated and Equipped Labs</a></li>
                                <li><a href="#">Advanced Technology and Internet Support</a></li>
                                <li><a href="#" class="third">Robust CyberSecurity and Physical Security Systems </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Strength Area =================-->

    <!--================Schedule Area =================-->
    <section class="packages_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Our Flexible Learning Schedule</h2>
                <p style="font-size: 15px">
                    At MTMKay, we recognize that many learners have diverse commitments. That's why our programs are designed to accommodate all types of learners, offering the flexibility to study at your convenience.
                </p>
            </div>
            <div class="row team_inner">
                <div class="col-md-4">
                    <div class="packages_item">
                        <div class="pack_head">
                            <i class="lnr lnr-sun"></i>
                            <h4>Morning Session</h4>
                        </div>
                        <div class="pack_body">
                            <p><span><i class="lnr lnr-clock mr-2"></i>09:00 AM</span> -  <span>12:00 PM</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="packages_item">
                        <div class="pack_head">
                            <i class="lnr lnr-sun"></i>
                            <h4>Afternoon Session</h4>
                        </div>
                        <div class="pack_body">
                            <p><span><i class="lnr lnr-clock mr-2"></i>13:00 AM</span> -  <span>16:00 PM</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="packages_item">
                        <div class="pack_head">
                            <i class="lnr lnr-moon"></i>
                            <h4>Evening Session</h4>
                        </div>
                        <div class="pack_body">
                            <p><span><i class="lnr lnr-clock mr-2"></i>17:00 PM</span> -  <span>20:00 PM</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Schedule Area =================-->

    <!--================Infrastructure Area =================-->
    <section class="courses_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Our Infrastructure</h2>
                <p style="font-size: 15px">Visit our well-equipped laboratories with the latest tools and equipments available to enable have a well-grounded practical experience.</p>
            </div>
            <div class="row courses_inner">
                <div class="col-lg-9">
                    <div class="grid_inner">
                        <div class="grid_item wd55">
                            <div class="courses_item infrastructure">
                                <a href="#">
                                    <img src="img/company/office.jpg" alt="" height="220px" width="500px" style="border-radius: 5px;">
                                </a>
                            </div>
                        </div>
                        <div class="grid_item wd44">
                            <div class="courses_item infrastructure">
                                <a href="#">
                                    <img src="img/company/starLink.png" alt="" height="220px" width="500px" style="border-radius: 5px;">
                                </a>
                            </div>
                        </div>
                        <div class="grid_item wd44">
                            <div class="courses_item infrastructure">
                                <a href="#">
                                    <img src="img/company/ccna_lab.jpg" alt="" width="500px" style="border-radius: 5px;">
                                </a>
                            </div>
                        </div>
                        <div class="grid_item wd55">
                            <div class="courses_item infrastructure">
                                <a href="#">
                                    <img src="img/company/ccna_2_lab.jpg" alt="" height="283px" width="500px" style="border-radius: 5px;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="course_item infrastructure">
                        <a href="#">
                            <img src="img/company/cisco-side-img.png" alt="" height="530px" width="300px" style="border-radius: 5px;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Infrastructure Area =================-->

    <!--================Testimonials Area =================-->
    <section class="packages_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Testimonials</h2>
                <p style="font-size: 15px">Unlocking Potential: Student Voices on Their Training Experience!</p>
            </div>
            <div class="testi_slider owl-carousel">
                @foreach($successes as $success)
                    <div class="item">
                        <div class="testi_item">
                            <img src="{{asset('img/success/success_1.png')}}" alt="" width="120px" height="120px" style="border-radius: 50%">
                            <h4>{{$success->user->name ?? 'Enow James'}}</h4>
                            <h4>{{$success->user->enrollments[0]->trainingSlot->program->title ?? ''}}</h4>
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
                <p style="font-size: 15px"> It is not too late to grow your IT skills in CyberSecurity solutions or Cloud Infrastructure. Get the certifications and training required to become the next IT consultant</p>
                <a class="main_btn2" href="#">Apply here</a>
            </div>
        </div>
    </section>
    <!--================End Pagkages Area =================-->
</x-guest-layout>
