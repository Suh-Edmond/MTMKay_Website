@section('title', 'Contact us')
<x-guest-layout>
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Contact Us</h2>
                <div class="page_link">
                    <a href="{{route('home')}}">Home</a>
                    <a href="{{route('contact')}}">Contact</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Contact Area =================-->
<section class="contact_area p_120">
    <div class="container">
        <div id="mapBox" class="mapBox"
             data-lat="4.633327"
             data-lon="9.445044"
             data-zoom="13"
             data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
             data-mlat="4.633327"
             data-mlon="9.445044">
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="lnr lnr-home"></i>
                        <h6>Kumba, Cameroon</h6>
                        <p>Atlasca Street</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-phone-handset"></i>
                        <h6><a href="#">+1 612 224 1176</a></h6>
                        <p>Mon to Fri 9am to 6 pm</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-envelope"></i>
                        <h6><a href="mailto:mtmkay17@gmail.com">mtmkay17@gmail.com</a></h6>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <form class="row contact_form" action="{{route('on-inquire')}}"  method="post" id="contactForm" >
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control"  name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control"   name="email" placeholder="Enter email address" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"   name="subject" placeholder="Enter Subject" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="message"   rows="1" placeholder="Enter Message" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="btn main_btn">
                            <span class="btn-text">Send Message</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================Contact Area =================-->

<!--================Contact Success and Error message Area =================-->
<div id="success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
                <h2>Thank you</h2>
                <p>Your message is successfully sent...</p>
            </div>
        </div>
    </div>
</div>

<!-- Modals error -->

<div id="error" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
                <h2>Sorry !</h2>
                <p> Something went wrong </p>
            </div>
        </div>
    </div>
</div>
<!--================End Contact Success and Error message Area =================-->



</x-guest-layout>
