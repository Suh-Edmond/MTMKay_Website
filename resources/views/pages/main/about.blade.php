@section('title', 'About us')

<x-guest-layout>
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_about d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2 class="banner_hero_text">About Us</h2>
                <div class="page_link banner_hero_btn">
                    <a href="{{route('home')}}">Home</a>
                    <a href="{{route('about')}}">About Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================About Area =================-->
<section class="about_area p_120">
    <div class="container">
        <div class="main_title">
            <h2>Our Mission</h2>
            <p style="font-size: 15px">With our strong background in IT and CyberSecurity, we have a vision to bridge the digital divide and create opportunities through Technology.<br>
            Our main values are;</p>
        </div>
        <div class="row about_inner">
            <div class="col-lg-6">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Innovation
                                <i class="lnr lnr-chevron-down"></i>
                                <i class="lnr lnr-chevron-up"></i>
                            </button>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                At MTMKay, we are dedicated to continuously innovating and integrating the latest technologies. Our focus is on leveraging advanced solutions to enhance efficiency, drive growth, and deliver exceptional results for our clients. By staying at the forefront of industry trends, we empower businesses to navigate the digital landscape with confidence and agility.
                             </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Integrity
                                <i class="lnr lnr-chevron-down"></i>
                                <i class="lnr lnr-chevron-up"></i>
                            </button>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                Our IT company is committed to upholding the highest standards of integrity through ethical practices and transparency. We believe that trust is the foundation of successful partnerships, which is why we prioritize honesty in all our communications and actions. Our team is dedicated to providing clear insights into our processes, ensuring that our clients are informed and confident in their decisions. By fostering an environment of openness and accountability, we not only enhance our relationships but also contribute to a more responsible and sustainable tech industry.
                             </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Excellence
                                <i class="lnr lnr-chevron-down"></i>
                                <i class="lnr lnr-chevron-up"></i>
                            </button>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                Our IT company is committed to excellence by delivering high-quality solutions that meet and exceed global standards. We understand that every business is unique, which is why we provide tailored IT solutions designed to address specific challenges and goals. Our clients have experienced significant improvements in operational efficiency, ensuring their processes run smoothly and effectively
                             </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Impact
                                <i class="lnr lnr-chevron-down"></i>
                                <i class="lnr lnr-chevron-up"></i>
                            </button>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
                                We believe that by providing access to IT education and affordable tech solutions, we can empower our community, create job opportunities, and foster innovation. Through partnerships with leading tech companies and dedicated training, MTMKay aims to uplift our local workforce and position our clients for success in a digital economy
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="video_area" id="video">
                    <img class="img-fluid" src="img/company/comp-mission.jpg" alt="">
{{--                    <img src="img/icon/video-icon-1.png" alt="">--}}
                </div>
            </div>
        </div>
        <div class="about_details">
            <p style="font-size: 15px">MTMKay Technology Solutions combines technical expertise, strategic partnerships with top technology providers, and a commitment to bridging the digital divide. Our team delivers tailored IT solutions that drive business success.
                At MTMKay Technology Solutions, our mission is to empower businesses and individuals through innovative IT solutions, advanced CyberSecurity, and industry-leading training programs.
                We are committed to driving digital transformation and fostering growth within our community and beyond.</p>
        </div>
    </div>
</section>
<!--================End About Area =================-->

<!--================Team Area =================-->
<section class="team_area p_120">
    <div class="container">
        <div class="main_title">
            <h2>Meet Our Team</h2>
            <p style="font-size: 15px">Our dynamic, certified and well-trained instructors available to provide the top-notch services and training to our clients and students.</p>
        </div>
        <div class="row team_inner">
            <div class="col-lg-3 col-sm-6">
                <div class="team_item">
                    <div class="team_img">
                        <img class="rounded-circle" src="img/team/team-1.png" alt="" style="border-radius: 50%" height="310px">
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
                        <img class="rounded-circle" src="img/team/team-2.jpeg" alt="" style="border-radius: 50%" height="310px">
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
                        <img class="rounded-circle" src="img/team/team-3.jpeg" alt="" style="border-radius: 50%" height="310px">
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
                        <img class="rounded-circle" src="img/team/team-3.jpeg" alt="" style="border-radius: 50%" height="310px">
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
        </div>
    </div>
</section>
<!--================End Team Area =================-->

<!--================Partner Area =================-->
    <section class="testimonials_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Our Partners</h2>
                <p style="font-size: 15px">MTMKay partners with leading Tech Providers, to deliver certified training and solutions backed by global standards</p>
            </div>
            <div class="testi_slider owl-carousel">
                <div class="item">
                    <div class="testi_item">
                        <img src="img/company/cisco-logo.png" alt="" width="120px" height="120px">
                        <h4>Cisco Networking</h4>
                        <p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <img src="img/company/comptia.png" alt="" width="100px" height="100px">
                        <h4>CompTia Security +</h4>
                        <p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <img src="img/company/microsoft_1.png" alt="" width="100px" height="90px">
                        <h4>Microsoft</h4>
                        <p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <img src="img/company/paloalto-logo.jpg" alt="" width="110px" height="110px">
                        <h4>Microsoft</h4>
                        <p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--================End Partner Area =================-->

<!--================Team Area =================-->
<section class="team_area p_120">
    <div class="container">
        <div class="main_title">
            <h2>Award-Winning Agency</h2>
            <p style="font-size: 15px">MTMKay Technology Solutions has successfully supported clients across various industries.</p>
        </div>
        <div class="row team_inner">
            <div class="col-md-4">
                <div class="packages_item">
                    <div class="pack_head">
                        <i class="lnr lnr-lock"></i>
                        <h1 data-to="30" data-speed="2000" class="timer count-title count-number" style="font-size: 40px"></h1>
                    </div>
                    <div class="pack_body">
                        <p>CyberSecurity Audits Completed</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="packages_item">
                    <div class="pack_head">
                        <i class="lnr lnr-checkmark-circle"></i>
                        <h1 data-to="20" data-speed="2000" class="timer count-title count-number" style="font-size: 40px"> </h1>
                    </div>
                    <div class="pack_body">
                        <p>Clients Served</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="packages_item">
                    <div class="pack_head">
                        <i class="lnr lnr-graduation-hat"></i>
                        <h1 data-to="200" data-speed="2000" class="timer count-title count-number" style="font-size: 40px"> </h1>
                    </div>
                    <div class="pack_body">
                        <p>Students Certified</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Team Area =================-->

<!--================Impress Area =================-->
<section class="impress_area p_120">
    <div class="container">
        <div class="impress_inner text-center">
            <h2>Improve Your Skills</h2>
            <p style="font-size: 15px">Enhance your IT skills in CyberSecurity or Cloud Infrastructure. Obtain the certifications and training needed to become a successful IT consultant</p>
            <a class="main_btn2" href="#">Apply here</a>
        </div>
    </div>
</section>
<!--================End Impress Area =================-->


</x-guest-layout>
