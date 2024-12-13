@section('title', 'Program details')

<x-guest-layout>

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
                    <img class="img-fluid" src="{{$program->getImagePath($program, $program->image_path) ?? ''}}" alt="" width="100%" height="20px">
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="objectives-tab" data-toggle="tab" href="#objectives" role="tab" aria-controls="objectives" aria-selected="true">Objectives</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="eligibility-tab" data-toggle="tab" href="#eligibility" role="tab" aria-controls="eligibility" aria-selected="false">Eligibility</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="outline-tab" data-toggle="tab" href="#outline" role="tab" aria-controls="outline" aria-selected="false">Course Outline</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="job_opportunities-tab" data-toggle="tab" href="#job_opportunities" role="tab" aria-controls="job_opportunities" aria-selected="false">Job Opportunities</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="objectives" role="tabpanel" aria-labelledby="objectives-tab">
                        <div class="objctive_text">
                            <p>{!!($program->objective) !!}</p>
                         </div>
                    </div>
                    <div class="tab-pane fade" id="eligibility" role="tabpanel" aria-labelledby="eligibility-tab">
                        <div class="objctive_text">
                            <p>{!! $program->eligibility !!}</p>
                         </div>
                    </div>
                    <div class="tab-pane fade" id="outline" role="tabpanel" aria-labelledby="outline-tab">
                        <div class="objctive_text">
                            <ul class="list">
                                @foreach($program->programOutlines as $key => $outline)
                                    <li><h5>{{substr($outline->period, 0, strlen($outline->period) - 1 )}} {{$key+1}}</h5> <a href="#">{{$outline->topic}}</a></li>
                                @endforeach
                            </ul>
                            <p>The program includes an internship during the final quarter, where students gain real-world experience and apply their skills in industry settings. This hands-on exposure ensures students are job-ready upon completion.</p>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="job_opportunities" role="tabpanel" aria-labelledby="job_opportunities-tab">
                        <div class="objctive_text">
                            <p>{!! $program->job_opportunities !!}</p>
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
                        <li><a href="#">Duration <span>{{$program->duration}} months</span></a></li>
                        <li><a href="#">Schedule <span>Monday - Friday</span></a></li>
                        <li><a href="#">Time <span>8.00 am to 4.00 pm</span></a></li>
                    </ul>
                    <a class="main_btn" href="#" id="enrollmentBtn">Enroll for Program</a>
                 </div>
            </div>
        </div>
    </div>
</section>
<!--================End Course Details Area =================-->

<!--=================Enrollment Form ========================-->
<div id="success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
                <h2 class="mb-30 title_color">Enrollment Form</h2>
                <div>
                    <form action="{{route('enroll-student', ['slug' => $program->slug])}}"  id="enrollmentForm" method="POST" >
                        @csrf
                        <div class="my-md-4">
                            <input type="text" id="name" name="name" placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" required class="single-input py-lg-2">
                            <span class="error text-danger d-none"></span>
                        </div>
                        <div class="my-md-4">
                            <input type="email" id="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required class="single-input py-lg-2">
                            <span class="error text-danger d-none"></span>
                        </div>
                        <div class="my-md-4">
                            <input type="tel" id="telephone" name="telephone" placeholder="Telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Telephone'" required class="single-input py-lg-2">
                            <span class="error text-danger d-none"></span>
                        </div>
                        <div class="my-md-4">
                            <input type="text" id="address" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required class="single-input py-lg-2">
                            <span class="error text-danger d-none"></span>
                        </div>
                        <div class="mt-lg-5 mb-lg-4">
                            <button type="submit" value="submit"  class="btn main_btn" id="submitEnrollment">
                                <span class="btn-text">Enroll Now</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End of Enrollment Form====================-->

<!--================Contact Success and Error message Area =================-->
<div id="success_new_account" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
                <h2>Thank you</h2>
                <p>Please verify your student account to complete your enrollment...</p>
            </div>
        </div>
    </div>
</div>

<div id="success_exist_acc" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
                <h2>Thank you</h2>
                <p>Your enrollment completed successfully...</p>
            </div>
        </div>
    </div>
</div>

<div id="success_enrolled" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
                <h2>Thank you</h2>
                <p>You have already Enrolled for this program...</p>
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
