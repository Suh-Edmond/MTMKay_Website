@extends('layouts.app')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h3>Empowering Businesses with Innovative <br />IT Solutions and Training</h3>
                    <p>MTMKay Technology Solutions offers comprehensive IT consulting, cybersecurity, and certification training to drive digital transformation.</p>
                    <a class="main_btn" href="#">Get Started</a>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Courses Area =================-->
    <section class="packages_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Key Services</h2>
                <h4>We provide the strategic IT insights needed to scale your operations securely and efficiently.
                    Our CyberSecurity Experts, offer essential protections to keep companies secure and compliant in an increasingly digital world.</p>
            </div>
            <div class="row packages_inner">
                <div class="col-md-6">
                    <div class="packages_item">
                        <div class="pack_head">
                            <i class="lnr lnr-graduation-hat"></i>
                            <h3>IT Training & Certification</h3>
                        </div>
                        <div class="pack_body">
                            <ul class="list">
                                <li><a href="#" style="font-size: medium">Industry-leading IT Certification and Corporate Training</a></li>
                                <li><a href="#" style="font-size: medium">Cisco Certified Network Associate (CCNA)</a></li>
                                <li><a href="#" style="font-size: medium">Microsoft Azure Fundamentals</a></li>
                                <li><a href="#" style="font-size: medium">CompTIA Security+</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="packages_item">
                        <div class="pack_head">
                            <i class="lnr lnr-graduation-hat"></i>
                            <h3>Cloud & Infrastructure Services</h3>
                        </div>
                        <div class="pack_body">
                            <ul class="list">
                                <li><a href="#" style="font-size: medium">Cloud Hosting and Management of Services</a></li>
                                <li><a href="#" style="font-size: medium">Cloud Migration and Virtualization</a></li>
                                <li><a href="#" style="font-size: medium">Scalable, reliable IT environments</a></li>
                                <li><a href="#" style="font-size: medium">Infrastructure Design</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row packages_inner mt-4">
                <div class="col-md-6">
                    <div class="packages_item">
                        <div class="pack_head">
                            <i class="lnr lnr-graduation-hat"></i>
                            <h3>IT Consulting & Managed Services</h3>
                        </div>
                        <div class="pack_body">
                            <ul class="list">
                                <li><a href="#" style="font-size: medium">Optimize Technology for efficiency and growth</a></li>
                                <li><a href="#" style="font-size: medium">IT Strategy and System Integration</a></li>
                                <li><a href="#" style="font-size: medium">Managed IT Services</a></li>
                                <li><a href="#" style="font-size: medium">Technical Support</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="packages_item">
                        <div class="pack_head">
                            <i class="lnr lnr-graduation-hat"></i>
                            <h3>CyberSecurity Solutions</h3>
                        </div>
                        <div class="pack_body">
                            <ul class="list">
                                <li><a href="#" style="font-size: medium">Protect digital assets with advanced security protocols</a></li>
                                <li><a href="#" style="font-size: medium">Vulnerability Assessments and Penetration Testing</a></li>
                                <li><a href="#" style="font-size: medium">Compliance Audits</a></li>
                                <li><a href="#" style="font-size: medium">Security Monitoring</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Courses Area =================-->

    <!--================ Why Choose Us ===================-->
    <section class="testimonials_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Why Choose Us</h2>
                <h4>We bring together Expertise, Commitment, and Strong Industry Partnerships to deliver reliable, tailored solutions that meet the unique needs of businesses and individuals in our region.</h4>
            </div>
            <div class="row mb-lg-4">
                <div class="col-md-6">
                    <img src="img/company/company-image-2.jpg" alt="" class="img-fluid" height="100%" width="100%">
                </div>
                <div class="col-md-6 mt-sm-20 left-align-p">
                    <h3 class="mb-30 title_color">Our Mission</h3>
                    <p style="font-size: large" class="typo-list">
                        MTMKay Technology Solutions combines technical expertise, strategic partnerships with top technology providers, and a commitment to bridging the digital divide. Our team delivers tailored IT solutions that drive business success.
                        At MTMKay Technology Solutions, our mission is to empower businesses and individuals through innovative IT solutions, advanced CyberSecurity, and industry-leading training programs.
                        We are committed to driving digital transformation and fostering growth within our community and beyond.
                    </p>
                    <p style="display: flex;justify-content: center" class="my-3">
                        <a class="main_btn" href="{{route('services')}}">Our Services</a>
                    </p>
                </div>
            </div>
            <div class="row mt-lg-5">
                <div class="col-md-6 mt-sm-20 left-align-p">
                    <h3 class="mb-30 title_color">Our Impact</h3>
                    <p style="font-size: large">
                        We believe that by providing access to IT education and affordable tech solutions, we can empower our community, create job opportunities, and foster innovation. Through partnerships with leading tech companies and dedicated training, MTMKay aims to uplift our local workforce and position our clients for success in a digital economy.
                    </p>
                    <p style="display: flex;justify-content: center" class="my-4">
                        <a class="main_btn " href="{{route('training')}}">Training Programs</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="img/company/company-image-2.jpg" alt="" class="img-fluid" height="100%" width="100%">
                </div>
            </div>
        </div>
    </section>
    <!--================ End of why choose us ===========--->

    <!--================Team Area =================-->
    <section class="team_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Meet Our Team</h2>
                <h4>Our dynamic. certified and well-trained instructors available to provide the top-notch services and training to our clients and students.</h4>
            </div>
            <div class="row team_inner">
                <div class="col-lg-3 col-sm-6">
                    <div class="team_item">
                        <div class="team_img">
                            <img class="rounded-circle" src="img/team/team-1.jpg" alt="">
                            <div class="hover">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="team_name">
                            <h4>Micheal Mbu</h4>
                            <p>CEO</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="team_item">
                        <div class="team_img">
                            <img class="rounded-circle" src="img/team/team-2.jpg" alt="">
                            <div class="hover">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="team_name">
                            <h4>Ethel Davis</h4>
                            <p>IT Consultant</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="team_item">
                        <div class="team_img">
                            <img class="rounded-circle" src="img/team/team-3.jpg" alt="">
                            <div class="hover">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="team_name">
                            <h4>Ben Joseph</h4>
                            <p>CyberSecurity Specialist</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="team_item">
                        <div class="team_img">
                            <img class="rounded-circle" src="img/team/team-4.jpg" alt="">
                            <div class="hover">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="team_name">
                            <h4>Enow Takang</h4>
                            <p>Cloud and Infrastructure Engineer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Team Area =================-->

    <!--================Testimonials Area =================-->
    <section class="testimonials_area p_120">
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
                        <p>MTMKay provided us with the strategic IT insights we needed to scale our operations securely and efficiently</p>
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
                        <p>MTMKay provided us with the strategic IT insights we needed to scale our operations securely and efficiently</p>
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
                        <p>MTMKay provided us with the strategic IT insights we needed to scale our operations securely and efficiently</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Testimonials Area =================-->

    <!--================Packages Area =================-->
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
    <!--================End Packages Area =================-->

    <!--================Impress Area =================-->
    <section class="impress_area p_120">
        <div class="container">
            <div class="impress_inner text-center">
                <h2>Become a Student</h2>
                <p>It is not too late to grow your IT skills in CyberSecurity solutions or Cloud Infrastructure. Get the certifications and training required to become the next IT consultant</p>
                <a class="main_btn2" href="{{route('training')}}">Apply here</a>
            </div>
        </div>
    </section>
    <!--================End Impress Area =================-->

@endsection
