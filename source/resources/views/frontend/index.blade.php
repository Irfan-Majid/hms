@extends('layout.fronend')
@section('title','about')
@section('content')
<main>
    <!--? slider Area Start-->
    <div class="slider-area position-relative">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span>Committed to success</span>
                                <h1 class="cd-headline letters scale">We care about your 
                                    <strong class="cd-words-wrapper">
                                        <b class="is-visible">health</b>
                                        <b>sushi</b>
                                        <b>steak</b>
                                    </strong>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay="0.1s">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi uquip ex ea commodo consequat is aute irure.</p>
                                <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Appointment <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span>Committed to success</span>
                                <h1 class="cd-headline letters scale">We care about your 
                                    <strong class="cd-words-wrapper">
                                        <b class="is-visible">health</b>
                                        <b>sushi</b>
                                        <b>steak</b>
                                    </strong>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay="0.1s">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi uquip ex ea commodo consequat is aute irure.</p>
                                <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Appointment <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!--? About Start-->
    <div class="about-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-35">
                            <span>About Our Company</span>
                            <h2>Welcome To Our Hospital</h2>
                        </div>
                        <p>There arge many variations ohf pacgssages of sorem gpsum ilable, but the majority have suffered alteration in some form, by ected humour, or randomised words whi.</p>
                        <div class="about-btn1 mb-30">
                            <a href="about.html" class="btn about-btn">Find Doctors .<i class="ti-arrow-right"></i></a>
                        </div>
                        <div class="about-btn1 mb-30">
                            <a href="about.html" class="btn about-btn2">Appointment <i class="ti-arrow-right"></i></a>
                        </div>
                        <div class="about-btn1 mb-30">
                            <a href="about.html" class="btn about-btn2">Emargency 1 <i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="asset/site_assets/img/gallery/about2.png" alt="">
                        </div>
                        <div class="about-back-img ">
                            <img src="asset/site_assets/img/gallery/about1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About  End-->
    <!--? department_area_start  -->
    <div class="department_area section-padding2">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center mb-100">
                        <span>Our Departments</span>
                        <h2>Our Medical Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="depart_ment_tab mb-30">
                        <!-- Tabs Buttons -->
                        <ul class="nav" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                    <i class="flaticon-teeth"></i>
                                    <h4>Dentistry</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                    <i class="flaticon-cardiovascular"></i>
                                    <h4>Cardiology</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                    <i class="flaticon-ear"></i>
                                    <h4>ENT Specialists</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Astrology-tab" data-toggle="tab" href="#Astrology" role="tab" aria-controls="contact" aria-selected="false">
                                    <i class="flaticon-bone"></i>
                                    <h4>Astrology</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Neuroanatomy-tab" data-toggle="tab" href="#Neuroanatomy" role="tab" aria-controls="contact" aria-selected="false">
                                    <i class="flaticon-lung"></i>
                                    <h4>Neuroanatomy</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Blood-tab" data-toggle="tab" href="#Blood" role="tab" aria-controls="contact" aria-selected="false">
                                    <i class="flaticon-cell"></i>
                                    <h4>Blood Screening</h4>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="dept_main_info white-bg">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center no-gutters">
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Dentist with surgical mask holding <br> scaler near patient</h3 >
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                                    <a href="#" class="dep-btn">Appointment<i class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="asset/site_assets/img/gallery/department_man.png" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center no-gutters">
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Dentist with surgical mask holding <br> scaler near patient</h3 >
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                                    <a href="#" class="dep-btn">Appointment<i class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="asset/site_assets/img/gallery/department_man.png" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center no-gutters">
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Dentist with surgical mask holding <br> scaler near patient</h3 >
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                                    <a href="#" class="dep-btn">Appointment<i class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="asset/site_assets/img/gallery/department_man.png" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="Astrology" role="tabpanel" aria-labelledby="Astrology-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center no-gutters">
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Dentist with surgical mask holding <br> scaler near patient</h3 >
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                                    <a href="#" class="dep-btn">Appointment<i class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="asset/site_assets/img/gallery/department_man.png" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="Neuroanatomy" role="tabpanel" aria-labelledby="Neuroanatomy-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center no-gutters">
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Dentist with surgical mask holding <br> scaler near patient</h3 >
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                                    <a href="#" class="dep-btn">Appointment<i class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="asset/site_assets/img/gallery/department_man.png" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="Blood" role="tabpanel" aria-labelledby="Blood-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center no-gutters">
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>Dentist with surgical mask holding <br> scaler near patient</h3 >
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                                    <a href="#" class="dep-btn">Appointment<i class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="asset/site_assets/img/gallery/department_man.png" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    </div>
            </div>

        </div>
    </div>
    <!-- depertment area end  -->
     <!--? Gallery Area Start -->
     <div class="gallery-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center mb-100">
                        <span>Our Gellary</span>
                        <h2>Our Medical Camp</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Left -->
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img big-img" style="background-image: url(/hms/asset/site_assets/img/gallery/gallery1.png);"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img" style="background-image: url(/hms/asset/site_assets/img/gallery/gallery2.png);"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img" style="background-image: url(/hms/asset/site_assets/img/gallery/gallery3.png);"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right -->
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img" style="background-image: url(/hms/asset/site_assets/img/gallery/gallery4.png);"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img" style="background-image: url(/hms/asset/site_assets/img/gallery/gallery5.png);"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img big-img" style="background-image: url(/hms/asset/site_assets/img/gallery/gallery6.png);"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Area End -->
    <!--? All startups Start -->
    <div class="all-starups-area testimonial-area fix">
        <!-- left Contents -->
        <div class="starups">
            <!--? Testimonial Start -->
            <div class="h1-testimonial-active">
                <!-- Single Testimonial -->
                <div class="single-testimonial text-center">
                    <!-- Testimonial Content -->
                    <div class="testimonial-caption ">
                        <div class="testimonial-top-cap">
                            <img src="asset/site_assets/img/gallery/Homepage_testi.png" alt="">
                            <p>“I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you. Eat clean it will care for yout hard.”</p>
                        </div>
                        <!-- founder -->
                        <div class="testimonial-founder d-flex align-items-center justify-content-center">
                            <div class="founder-img">
                                <img src="asset/site_assets/img/gallery/Homepage_testi.png" alt="">
                            </div>
                            <div class="founder-text">
                                <span>Margaret Lawson</span>
                                <p>Chif Photographer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial End -->
        </div>
        <!--Right Contents  -->
        <div class="starups-img"></div>
    </div>
    <!--All startups End -->
     <!--? Team Start -->
     <div class="team-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center mb-100">
                        <span>Our Doctors</span>
                        <h2>Our Specialist</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single Tem -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="asset/site_assets/img/gallery/team2.png" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Alvin Maxwell</a></h3>
                            <span>Creative UI Designer</span>
                            <!-- Team social -->
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="asset/site_assets/img/gallery/team3.png" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Maria Smith</a></h3>
                            <span>Agency Manager</span>
                            <!-- Team social -->
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{asset('asset/site_assets/img/gallery/team1.png')}}" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Angela Doe</a></h3>
                            <span>Designer</span>
                            <!-- Team social -->
                            <div class="team-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
     <!--? Contact form Start -->
     <div class="contact-form-main">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-7 col-lg-7">
                    <div class="form-wrapper">
                        <!--Section Tittle  -->
                        <div class="form-tittle">
                            <div class="row ">
                                <div class="col-xl-12">
                                    <div class="section-tittle section-tittle2">
                                        <span>Appointment Apply Form</span>
                                        <h2>Appointment Form</h2>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="m-t-20 text-danger ml-100" id="msg" style="display:none;">
                            No Schedule available
                        </div>
                        <!--End Section Tittle  -->
                        <form id="contact-form" action="#" method="">


                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-box user-icon mb-30">
                                        <input type="text" id="patit_id" name="patient_id" placeholder="Name">
                                        <input type="hidden" name="p_id" id="p_id"/>
                                        <div id="pa_data" style="color:green;font-size:14px;"></div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-md-6 mb-30">
                                    <div class="select-itms">
                                        <select name="dep_id" id="department">
                                            <option>--Select department--</option>
                                            @if($deps)
                                            @foreach($deps as $dep)
                                                <option value="{{$dep->id}}">{{$dep->name}}</option>
                                            @endforeach
                                        @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-30">
                                    <div class="">
                                        <select name="doctor_id" id="doctor">
                                            <option>--Select doctor--</option>
                                            
                                        </select>
                                        <div id="sch_data" style="z-index:9999;"></div>
                                    </div>
                                </div>
                                

                                <div class="col-lg-6 col-md-6">
                                    <div class="mb-30">
                                        <input id="datetimepicker" type="text" placeholder="DD-MM-YYYY" name="date">
                                    </div>
                                    
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="m-t-20 text-danger" id="ee" style="display:none;">
                                        No Schedule available
                                    </div>
                                    <div class="form-box subject-icon mb-30" id="ss">
                                        @for ($i=0; $i < 10; $i++)
                                <button type="button" id="serial{{$i+1}}" style="width: 5px!important; margin-bottom: 10px!important;padding: 1px 25px 1px 20px;" class="btn genric-btn circle small primary-border serial">{{$i+1}}</button>
                                </button>    
                                
                                @endfor
                                    </div>
                                    <input type="hidden" name="serial" id="serial_div" /> 
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box message-icon mb-65">
                                        <textarea name="prob" id="message" placeholder="Problem"></textarea>
                                    </div>
                                    <div class="submit-info">
                                        <button class="btn" type="submit">Submit Now <i class="ti-arrow-right"></i> </button>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact left Img-->
        <div class="from-left d-none d-lg-block">
            <img src="{{asset('asset/site_assets/img/gallery/contact_form.png')}}" alt="">
        </div>
    </div>
    <!-- Contact form End -->
    <!--? gallery Products Start -->
    <div class="gallery-area fix">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(/hms/asset/site_assets/img/gallery/gallery1.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(/hms/asset/site_assets/img/gallery/gallery2.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(/hms/asset/site_assets/img/gallery/gallery3.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(/hms/asset/site_assets/img/gallery/gallery4.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                             <div class="gallery-img " style="background-image: url(/hms/asset/site_assets/img/gallery/gallery5.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(/hms/asset/site_assets/img/gallery/gallery6.png);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- gallery Products End -->
    <!--? Blog start -->
    <div class="home_blog-area section-padding30">
        <div class="container">
            <div class="row justify-content-sm-center">
                <div class="cl-xl-7 col-lg-8 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-70">
                        <span>Oure recent news</span>
                        <h2>OurNews From Blog</h2>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <img src="{{asset('asset/site_assets/img/gallery/blog1.png')}}" alt="">
                        </div>
                        <div class="blogs-cap">
                            <div class="date-info">
                                <span>Health</span>
                                <p>Nov 30, 2020</p>
                            </div>
                            <h4><a href="blog_details.html">Amazing Places To Visit In Summer</a></h4>
                            <a href="blog_details.html" class="read-more1">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <img src="{{asset('asset/site_assets/img/gallery/blog2.png')}}" alt="">
                        </div>
                        <div class="blogs-cap">
                            <div class="date-info">
                                <span>Checkup</span>
                                <p>Nov 30, 2020</p>
                            </div>
                            <h4><a href="blog_details.html">Developing Creativithout Losing Visual</a></h4>
                            <a href="blog_details.html" class="read-more1">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-blogs mb-30">
                        <div class="blog-img">
                            <img src="{{asset('asset/site_assets/img/gallery/blog3.png')}}" alt="">
                        </div>
                        <div class="blogs-cap">
                            <div class="date-info">
                                <span>Operation</span>
                                <p>Nov 30, 2020</p>
                            </div>
                            <h4><a href="blog_details.html">Winter Photography Tips from Glenn</a></h4>
                            <a href="blog_details.html" class="read-more1">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
    </main>
    @endsection




 @push('style')
 <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">

@endpush
@push('script')

<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
$(document).ready(function(){
			
    // /*keyup function for patient name*/
	// $('#patit_id').keyup(function(){
    //     var pa = '<div class="text-danger">Invalid patient ID</div>';
	// 			$('#pa_data').html('');
	// 			$('#pa_data').append(pa);
    // var name = $(this).val();
    // $.ajax({
    //     url: "{{route('ffindpatient')}}",
    //     type: "GET",
    //     data: {
    //         id:name,
    //     },
    //     success:function(data){
    //         if(data){
    //            var pa = '<div class="text-success">'+data[0].name+'</div>';
    //            $('#pa_data').html('');
	// 			$('#pa_data').append(pa);
    //             }
    //         }
    //     })
    // });


    /*keyup function for patient name*/
			$('#patit_id').keyup(function(){
				
				var pa = '<div style="color:red">Invalid patient ID</div>';
				$('#pa_data').html('');
				$('#pa_data').append(pa);
				
				var patient = $(this).val();
				$.ajax({
					type:"GET",
					url:"{{route('ffindpatient')}}",
					data:{'id':patient},
					
					success:function(data){
						if(data){
							console.log(data);
							var id = data[0].id;
							var name = data[0].name;
							
							/*get id from patient table*/
							$('#p_id').val('');
							$('#p_id').val(id); 
							
							/*get firstname and lastname from patient table*/
							$('#pa_data').html('');
							$('#pa_data').append(name); 
						} 
					}
				});
			});

    $('#department').change(function(){
    var department_id = $(this).val();
    $('#doctor').html('');
    oppp= "<option value='0' selected disabled>-- select Doctor--</option>";
    $('#doctor').append(oppp);
    $('select').niceSelect('update');
    $.ajax({
        url: "{{route('ffinddoctor')}}",
        type: "GET",
        data: {
            id:department_id,
        },
        success:function(data){
            if(data){
                var op= "<option value='0' selected disabled>-- Select doctor--</option>"+data;
                // console.log(op);
						$('#doctor').html('');
						$('#doctor').append(op);
                        $('select').niceSelect('update');
                }
            }
        })
    });


    /*------select doctor name option and show schedule------*/
			$('#doctor').on('change', function(){
				var doctor = $(this).val();
				$.ajax({
					type:'get',
					url: "{{route('ffindschedule')}}",
					data:{'id':doctor},
					success:function(data){
						if(data==''){
							var err = '<div style="color:red">No Schedule Available</div>';
							$('#sch_data').html('');
							$('#sch_data').append(err);
                            $('#ss').css('display','none');
							$('#ee').css('display','block'); 
						}else{
							$('#sch_data').html('');
							$('#sch_data').append(data);
                            $('#ss').css('display','block');
							$('#ee').css('display','none');  
						}
					}
				});
			
			});

            $( "#datetimepicker" ).datepicker({
                appendText:"(dd-mm-yy)",
               dateFormat:"dd-mm-yy",
            });

$('.serial').click(function(){
				var s = $(this).addClass('danger').text().trim();
				$('.serial').attr('disabled',true);
				$('#serial_div').val('');
				$('#serial_div').val(s); 
			});


/*------select doctor name option and show serial number active or inactive------*/
$('#datetimepicker').on('change', function(){
				$('.serial').removeClass('btn-danger').attr('disabled',false);
				var doctor_id = $('#doctor').val();
				var appoint_date = $(this).val();
                // console.log(appoint_date);/*5.5.2021*/
                // var asas = Date.parse('appoint_date');
                // console.log(asas);
                // appoint_date=appoint_date.split(' ');
				// var app_data=appoint_date[1];
				$.ajax({
					type:'GET',
					url:"{{route('ffindserial')}}",
					data:{'id':doctor_id, 'date':appoint_date},
					success:function(data){
						// console.log(data);
						if(data == 'daYnotfind'){
							$('#ss').css('display','none');
							$('#ee').css('display','block');
						}else if(data == 'rownotfind'){
							$('#ss').css('display','block');
							$('#ee').css('display','none');
						}else{
							$('#ss').css('display','block');
							$('#ee').css('display','none');
							var ser = '';
							for(var i=0;i<data.length;i++){
                                ser = data[i].serial;
                                if(ser){
                                    for(var j=1;j<11;j++){
                                        if(ser == j){
									    $('#serial'+j).addClass('danger').attr('disabled','disabled');
                                        }
                                    }
                                }
								
							} 
						} 
					},
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                }  
				}); 
			});




$( '#contact-form' ).on( 'submit', function(e) {
                e.preventDefault();
                // var prob = $('#message').val();
                // var serial = $('#serial_div').val();
                // var date = $('#datetimepicker').val();
                // var p_id = $('#p_id').val();
                // var doctor_id = $('#doctor').val();
                // var _token=$('input[name=_token]').val();
                // var a = {'prob':prob, 'serial':serial ,'date':date ,'p_id':p_id ,'doctor_id':doctor_id , '_token':_token};
                $.ajax({
                    type: "POST",
                    url: "{{route('appointment.save')}}",
                    data: $(this).serialize(),
                    success: function(data) {
                        if(data.success){
                        $('#msg').css('display','none').html('').removeClass('text-danger').addClass('text-success').html(data.success).css('display','block'); ;
                        }else{
                        $('#msg').css('display','none').html('').removeClass('text-success').addClass('text-danger').html(data.error).css('display','block');
                        }
                    }
                });

                // $.ajax({
                //     type: "POST",
                //     url: appointment.save',
                // }).done(function( msg ) {
                //     alert( msg );
                // });

});
            
})
</script>
@endpush

    