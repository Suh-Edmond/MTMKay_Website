@extends('layouts.app')


@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Services</h2>
                <div class="page_link">
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
            <h4>
                MTMKay offers a unique blend of services tailored to the needs of our community.
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
        <div class="row packages_inner mt-4">
            <div class="col-md-6">
                <div class="packages_item">
                    <div class="pack_head">
                        <i class="lnr lnr-graduation-hat"></i>
                        <h3>Web and Digital Solutions</h3>
                    </div>
                    <div class="pack_body">
                        <ul class="list">
                            <li><a href="#" style="font-size: medium">Optimize Technology for efficiency and growth</a></li>
                            <li><a href="#" style="font-size: medium">Custom Website Development</a></li>
                            <li><a href="#" style="font-size: medium">E-Commerce Solutions</a></li>
                            <li><a href="#" style="font-size: medium">SEO and Digital Marketing</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Courses Area =================-->

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
