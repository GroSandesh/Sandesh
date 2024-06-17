@extends('website.app')

@section('title', 'Home Page')

@section('content')

    <section id="bannerInner" class="bannerInner" role="banner"
             style="background-image:url({{ asset('website/images/bannerimage.png') }}); min-height: 400px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">

                </div>
                <div class="col-md-5">
                    @if (!Auth::check())
                        <form method="POST" action="{{ route('login') }}" class="formContact" data-validate>
                            @csrf
                            @if ($errors->any())
                                <div class="font-medium text-red-600 rederror ">{{ __('Whoops! Something went wrong.') }}</div>
                                <ul class="mt-1 mb-2 list-disc list-inside text-sm text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <li class="rederror">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            @if(Session::has('Success'))
                                <div class="alert alert-success hide500">
                                    <strong>Success ! </strong> {{Session::get('Success')}}
                                </div>
                            @endif
                            @if(Session::has('Failed'))
                                <div class="alert alert-danger hide500">
                                    <strong>Failed ! </strong> {{Session::get('Failed')}}
                                </div>
                            @endif
                            <h3>welcome Sandesh </h3>
                            <p>Lorem ipsum dolor sit amet, labores nostrum eam te.</p>
                            <div class="form-group showind ">
                                <input type="text" class="form-control @error('otp') redborder @enderror"
                                       placeholder="Phone or Email address *"
                                       name="email" required value="{{Request::old('email')}}"
                                       minlength="4" maxlength="50">
                                <span class="infoicos" data-toggle="tooltip" data-placement="top" title="Hint :   Minimum 4 Characters">
                                                            <i class="fa fa-info" aria-hidden="true"></i>
                                                        </span>
                                @error('otp')
                                    <div class="rederror">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group showind" style="position: relative;">
                                <input id="password-field" type="password" class="form-control pr30px @error('password') redborder @enderror"
                                       placeholder="Password *"  name="password" minlength="8" maxlength="16" required autocomplete="off">
                                <i toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></i>
                                <span class="infoicos" data-toggle="tooltip" data-placement="top" title="Hint : 1 Capital, 1 Small, 1 Special Character required">
                                    <i class="fa fa-info" aria-hidden="true"></i>
                                </span>
                                @error('password')
                                    <div class="rederror">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="forgotPwd"><span class="forgotpassword">Forgot password ?</span>
                                <p> <span class="anaccount">Don't have an account?</span>
                                    <a href="{{ route('registeruser') }}">
                                        <span class="forgotpassword">Sign Up</span>
                                    </a>
                                </p>
                            </div>
                            <button class="Loginbtn" type="submit">Log In</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
        </div>
    </section>
    <section id="aboutUs" class="aboutus" role="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="aboutPara">
                        <h4 class="sefeHeading">About</h4>
                        <h2 class="customHeading">labores nostrum eam te.
                            Mel tantas alienum pertinacia
                        </h2>
                        <p>Lorem ipsum dolor sit amet, labores nostrum eam te. Mel tantas alienum pertinacia id. Lorem ipsum
                            dolor sit amet, labores nostrum eam te. Mel tantas alienum pertinacia i Lorem ipsum dolor sit
                            amet, labores nostrum eam te. Mel tantas alienum pertinacia id.d.
                        </P>
                        <ul>
                            <li><span class="checkImage"><img src="{{ asset('website/images/checkimg.png') }}" class="img-fluid" alt="">
                            </span>
                                We provide the best logistic service for globally
                            </li>
                            <li><span class="checkImage"><img src="{{ asset('website/images/checkimg.png') }}" class="img-fluid" alt="">
                            </span>
                                We know how to make it in time and set the right terms
                            </li>
                            <li><span class="checkImage"><img src="{{ asset('website/images/checkimg.png') }}" class="img-fluid" alt="">
                            </span>
                                All payment methods are acceptable for ordering our services.
                            </li>
                        </ul>
                        <hr>
                    </div>

                    <div class="signImage">
                        <img src="{{ asset('website/images/signimg.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="aboutImage">
                        <img src="{{ asset('website/images/img1.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="questionPage" class="questionPage" role=Faq>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="questionPara">
                        <h2 class="customHeading">FAQ</h2>
                        <p>Lorem ipsum dolor sit amet, labores nostrum eam te. Mel tantas alienum pertinacia id.Lorem ipsum
                            dolor sit amet, labores nostrum eam te. Mel tantas </p>
                    </div>


                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                        <!-- Accordion card -->
                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="headingOne1">
                                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1"
                                   aria-expanded="true" aria-controls="collapseOne1">
                                    <span class="number">1</span>
                                    <h5 class="cardHeading mb-0">
                                        Lorem ipsum dolor sit amet, labores nostrum eam te. <i
                                            class="fa fa-angle-down rotate-icon rotate-icon fa-1x"></i>
                                    </h5>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                                 data-parent="#accordionEx">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, labores nostrum eam te. Mel tantas alienum
                                    pertinacia
                                    id.Lorem ipsum dolor sit amet, labores nostrum eam te. Mel tantas Mel tantas
                                    alienum
                                    pertinacia id.Lorem ipsum dolor sit amet, labores nostrum eam te.
                                </div>
                            </div>

                        </div>

                        <!-- Accordion card -->

                        <!-- Accordion card -->

                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="headingTwo2">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                                   aria-expanded="false" aria-controls="collapseTwo2">
                                    <span class="number">2</span>
                                    <h5 class="cardHeading mb-0">
                                        Lorem ipsum dolor sit amet, labores nostrum eam te. Mel
                                        tantas alienum pertinacia id.Lorem ipsum dolor sit amet, <i
                                            class="fa fa-angle-down rotate-icon"></i>
                                    </h5>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                                 data-parent="#accordionEx">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, labores nostrum eam te. Mel tantas alienum pertinacia
                                    id.Lorem ipsum dolor sit amet, labores nostrum eam te. Mel tantas Mel tantas alienum
                                    pertinacia id.Lorem ipsum dolor sit amet, labores nostrum eam te.
                                </div>
                            </div>

                        </div>

                        <!-- Accordion card -->

                        <!-- Accordion card -->

                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="headingThree3">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx"
                                   href="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                                    <span class="number">3</span>
                                    <h5 class="cardHeading mb-0">
                                        All payment methods are acceptable for ordering our services. <i
                                            class="fa fa-angle-down rotate-icon"></i>
                                    </h5>
                                </a>
                            </div>
                            <!-- Card body -->
                            <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
                                 data-parent="#accordionEx">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, labores nostrum eam te. Mel tantas alienum pertinacia
                                    id.Lorem ipsum dolor sit amet, labores nostrum eam te. Mel tantas Mel tantas alienum
                                    pertinacia id.Lorem ipsum dolor sit amet, labores nostrum eam te.
                                </div>
                            </div>

                        </div>

                        <!-- Accordion card -->

                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="headingOne4">
                                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne4"
                                   aria-expanded="true" aria-controls="collapseOne1">
                                    <span class="number">4</span>
                                    <h5 class="cardHeading mb-0">
                                        All payment methods are acceptable for ordering our services.<i
                                            class="fa fa-angle-down rotate-icon"></i>
                                    </h5>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapseOne4" class="collapse show" role="tabpanel" aria-labelledby="headingOne4"
                                 data-parent="#accordionEx">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, labores nostrum eam te. Mel tantas alienum pertinacia
                                    id.Lorem ipsum dolor sit amet, labores nostrum eam te. Mel tantas Mel tantas alienum
                                    pertinacia id.Lorem ipsum dolor sit amet, labores nostrum eam te.
                                </div>
                            </div>

                        </div>

                        <div class="card">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="headingOne5">
                                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne5"
                                   aria-expanded="true" aria-controls="collapseOne1">
                                    <span class="number">5</span>
                                    <h5 class="cardHeading mb-0">
                                        All payment methods are acceptable for ordering our services. <i
                                            class="fa fa-angle-down rotate-icon"></i>
                                    </h5>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapseOne5" class="collapse show" role="tabpanel" aria-labelledby="headingOne5"
                                 data-parent="#accordionEx">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, labores nostrum eam te. Mel tantas alienum pertinacia
                                    id.Lorem ipsum dolor sit amet, labores nostrum eam te. Mel tantas Mel tantas alienum
                                    pertinacia id.Lorem ipsum dolor sit amet, labores nostrum eam te.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="questionimage">
                        <img src="{{ asset('website/images/questionimg.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section id="contactFeedback" class="contactFeedback" role="feedback">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="googlemap">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.606112739776!2d72.52113961403036!3d23.03823028494509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84b45f72b935%3A0x8701ed08268cf6a7!2sSandesh%20Press%20Rd%2C%20Vastrapur%2C%20Ahmedabad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1617195035975!5m2!1sen!2sin"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feedbackPara">
                        <h2 class="customHeading">Give Us Feedback</h2>
                        <p>How satisfied update blog posts and spccial offers in your inbox</p>
                        <ul>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        </ul>
                        <form>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"placeholder="Message"></textarea>
                            <button class="submit1 btn">Submit Now</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
