@section('title', 'MTMKay-IT Services')

<x-guest-layout>
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_services d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2 class="banner_hero_text">Services</h2>
                <div class="page_link banner_hero_btn">
                    <a href="{{route('home')}}">Home</a>
                    <a href="{{route('services')}}">Services</a>
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
            <h2>Key Services</h2>
            <p style="font-size: 16px">
                MTMKay offers a unique blend of services tailored to the needs of our community.<br>
                We provide IT consulting and managed services to help local businesses improve their technology infrastructure.
            </p>
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
                            <li><a href="#" style="font-size: medium">CompTIA Security+</a></li>
                            <li><a href="#" style="font-size: medium">Microsoft Azure Fundamentals</a></li>
                            <li><a href="#" style="font-size: medium">Cisco Certified Network Associate (CCNA)</a></li>
                            <li><a href="#" style="font-size: medium">Industry-leading IT Certification and Corporate Training</a></li>
                        </ul>
                    </div>
                    <div class="pack_footer mt-5" style="margin-bottom: 90px !important;">
                        <a class="main_btn" href="{{route('contact')}}">Apply Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="packages_item">
                    <div class="pack_head">
                        <i class="lnr lnr-cloud-upload"></i>
                        <h3>Cloud & Infrastructure Services</h3>
                    </div>
                    <div class="pack_body">
                        <ul class="list">
                            <li><a href="#" style="font-size: medium">Infrastructure Design</a></li>
                            <li><a href="#" style="font-size: medium">Cloud Migration and Virtualization</a></li>
                            <li><a href="#" style="font-size: medium">Scalable, reliable IT environments</a></li>
                            <li><a href="#" style="font-size: medium">Cloud Hosting and Management of Services</a></li>
                        </ul>
                    </div>
                    <div class="pack_footer mt-5" style="margin-bottom: 90px !important;">
                        <a class="main_btn" href="{{route('contact')}}">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row packages_inner mt-4">
            <div class="col-md-6">
                <div class="packages_item">
                    <div class="pack_head">
                        <i class="lnr lnr-cog"></i>
                        <h3>IT Consulting & Managed Services</h3>
                    </div>
                    <div class="pack_body">
                        <ul class="list">
                            <li><a href="#" style="font-size: medium">Technical Support</a></li>
                            <li><a href="#" style="font-size: medium">Managed IT Services</a></li>
                            <li><a href="#" style="font-size: medium">IT Strategy and System Integration</a></li>
                            <li><a href="#" style="font-size: medium">Optimize Technology for efficiency and growth</a></li>
                        </ul>
                    </div>
                    <div class="pack_footer mt-5" style="margin-bottom: 90px !important;">
                        <a class="main_btn" href="{{route('contact')}}">Apply Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="packages_item">
                    <div class="pack_head">
                        <i class="lnr lnr-lock"></i>
                        <h3>CyberSecurity Solutions</h3>
                    </div>
                    <div class="pack_body">
                        <ul class="list">
                            <li><a href="#" style="font-size: medium">Compliance Audits</a></li>
                            <li><a href="#" style="font-size: medium">Security Monitoring</a></li>
                            <li><a href="#" style="font-size: medium">Vulnerability Assessments and Penetration Testing</a></li>
                            <li><a href="#" style="font-size: medium">Protect digital assets with advanced security protocols</a></li>
                        </ul>
                    </div>
                    <div class="pack_footer mt-5" style="margin-bottom: 90px !important;">
                        <a class="main_btn" href="{{route('contact')}}">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row packages_inner mt-4">
            <div class="col-md-6">
                <div class="packages_item">
                    <div class="pack_head">
                        <i class="lnr lnr-laptop-phone"></i>
                        <h3>Web and Digital Solutions</h3>
                    </div>
                    <div class="pack_body">
                        <ul class="list">
                            <li><a href="#" style="font-size: medium">E-Commerce Solutions</a></li>
                            <li><a href="#" style="font-size: medium">SEO and Digital Marketing</a></li>
                            <li><a href="#" style="font-size: medium">Custom Website Development</a></li>
                            <li><a href="#" style="font-size: medium">Optimize Technology for efficiency and growth</a></li>
                        </ul>
                    </div>
                    <div class="pack_footer mt-5" style="margin-bottom: 90px !important;">
                        <a class="main_btn" href="{{route('contact')}}">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Courses Area =================-->

<!--============ Why Choose us ========================-->
<section class="testimonials_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Why Choose Us</h2>
                <p style="font-size: 15px">We bring together Expertise, Commitment, and Strong Industry Partnerships to deliver reliable, tailored solutions that meet the unique needs of businesses and individuals in our region.</p>
            </div>
            <div class="row mt-lg-5">
                <div class="col-md-6 mt-sm-20 left-align-p">
                    <h3 class="mb-30 title_color">Our Impact</h3>
                    <p style="font-size: 15px">
                        We believe that by providing access to IT education and affordable tech solutions, we can empower our community, create job opportunities, and foster innovation. Through partnerships with leading tech companies and dedicated training, MTMKay aims to uplift our local workforce and position our clients for success in a digital economy.
                    </p>
                    <a class="main_btn" href="{{route('blog')}}">Learn more</a>
                </div>
                <div class="col-md-6">
                    <img src="img/company/all-impact.png" alt="" class="img-fluid" height="100%" width="100%">
                </div>
            </div>
        </div>
    </section>
<!--============ End of Why Choose us ================--->


<!--=============Clients Testimonials ===============-->
<section class="team_area p_120">
    <div class="container">
        <div class="main_title">
            <h2>Testimonials</h2>
            <p style="font-size: 15px">Your Path to Success! Discover What Our Clients Say!</p>
        </div>
        <div class="testi_slider owl-carousel">
            <div class="item">
                <div class="testi_item">
                    <img src="{{asset('img/company/human_2.png')}}" alt="" width="120px" height="120px" style="border-radius: 50%">
                    <h4>Mrs. Kenchi Vivian</h4>
                    <ul class="list">
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                    <p>Their IT team conducted a comprehensive network assessment, identifying outdated hardware and configuration issues. They upgraded the network infrastructure and implemented a robust monitoring system.5% reduction in network downtime. Sales improved significantly, with seamless transactions during peak hours.</p>
                </div>
            </div>
            <div class="item">
                <div class="testi_item">
                    <img src="{{asset('img/company/human_2.png')}}" alt="" width="120px" height="120px" style="border-radius: 50%">
                    <h4>Mr. Igoja Steven</h4>
                    <ul class="list">
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                    <p>Their team performed an in-depth analysis of the network performance and identified bandwidth limitations. They optimized the existing setup and implemented Quality of Service (QoS) protocols to prioritize critical applications. This resulted to a 50% improvement in network speed. Staff could access patient records without delays, enhancing patient care and satisfaction.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============= End of clients Testimonials =======-->


<!--================Impress Area =================-->
<section class="impress_area service_impress p_120">
    <div class="container">
        <div class="impress_inner text-center ">
            <h2>Let's Do Something together</h2>
            <p style="font-size: 15px">We offer IT consulting and managed services to empower local businesses in enhancing their technology infrastructure</p>
            <a class="main_btn2" href="{{route('contact')}}">Contact Us</a>
        </div>
    </div>
</section>
<!--================End Impress Area =================-->

<!--================Pagkages Area =================-->
<section class="testimonials_area p_120">
    <div class="container">
        <div class="main_title">
            <h2>Choose Packages</h2>
            <p style="font-size: 15px">
                Thank you for considering MTMKay, where we believe that technology should be accessible to all, empowering our community one step at a time.
            </p>
        </div>
        <div class="row packages_inner">
            <div class="col-lg-6">
                <div class="packages_item">
                    <div class="pack_head">
                        <i class="lnr lnr-heart-pulse"></i>
                        <h3>Premium</h3>
                        <p>For individuals</p>
                    </div>
                    <div class="pack_body">
                        <ul class="list">
                            <li><a href="#" style="font-size: medium"><i class="lnr lnr-checkmark-circle mr-lg-2" style="color: #385abe; font-size: large;font-weight: bolder"></i>Technical Support</a></li>
                            <li><a href="#" style="font-size: medium"> <i class="lnr lnr-checkmark-circle mr-lg-3" style="color: #385abe; font-size: large;font-weight: bolder"></i>Managed IT Services</a></li>
                            <li><a href="#"><i class="lnr lnr-checkmark-circle mr-lg-3" style="color: #385abe; font-size: large;font-weight: bolder"></i>Custom Website Development</a></li>
                            <li><a href="#" style="font-size: medium"><i class="lnr lnr-checkmark-circle mr-lg-3" style="color: #385abe; font-size: large;font-weight: bolder"></i>IT Strategy and System Integration</a></li>
                            <li><a href="#" style="font-size: medium"><i class="lnr lnr-cross mr-lg-3" style="color: red;font-size: large;font-weight: bolder"></i>Cloud Hosting and Management of Services</a></li>
                        </ul>
                    </div>
                    <div class="pack_footer mt-5" style="margin-bottom: 90px !important;">
                        <a class="main_btn" href="{{route('contact')}}">Apply Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="packages_item">
                    <div class="pack_head">
                        <i class="lnr lnr-diamond"></i>
                        <h3>Exclusive</h3>
                        <p>For Startups and Enterprises</p>
                    </div>
                    <div class="pack_body">
                        <ul class="list">
                            <li><a href="#" style="font-size: medium"><i class="lnr lnr-checkmark-circle mr-lg-2" style="color: #385abe; font-size: large;font-weight: bolder"></i>Technical Support</a></li>
                            <li><a href="#" style="font-size: medium"><i class="lnr lnr-checkmark-circle mr-lg-3" style="color: #385abe; font-size: large;font-weight: bolder"></i>Managed IT Services</a></li>
                            <li><a href="#"><i class="lnr lnr-checkmark-circle mr-lg-3" style="color: #385abe; font-size: large;font-weight: bolder"></i>Custom Website Development</a></li>
                            <li><a href="#" style="font-size: medium"><i class="lnr lnr-checkmark-circle mr-lg-3" style="color: #385abe; font-size: large;font-weight: bolder"></i>IT Strategy and System Integration</a></li>
                            <li><a href="#" style="font-size: medium"><i class="lnr lnr-checkmark-circle mr-lg-3" style="color: #385abe; font-size: large;font-weight: bolder"></i>Cloud Hosting and Management of Services</a></li>
                        </ul>
                    </div>
                    <div class="pack_footer mt-5" style="margin-bottom: 90px !important;">
                        <a class="main_btn" href="{{route('contact')}}">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Pagkages Area =================-->
</x-guest-layout>
