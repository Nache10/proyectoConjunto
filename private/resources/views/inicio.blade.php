{{ get_header() }}

    <div class="shap_big_2 d-none d-lg-block">
        <img src="{{ url('public/img/ilstrator/body_shap_2.png')}}" alt="">
    </div>
    
    <div class="slider_area">
        
        <div class="shap_img_1 d-none d-lg-block">
            <img src="{{ url('public/img/ilstrator/body_shap_1.png')}}" alt="">
        </div>
        <div class="poly_img">
            <img src="{{ url('public/img/ilstrator/poly.png')}}" alt="">
        </div>
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="slider_text text-center">
                            <div class="text">
                                    @if(Session::has('alerta'))
                                      <div class="alert alert-{{ Session::get('status')}}" role="alert">
                                        {{ Session::get('mensaje')}}
                                      </div>
                                      <?php Session::forget('alerta');Session::forget('status');Session::forget('mensaje'); ?>
                                    @endif
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $error }}
                                            </div>
                                        @endforeach
                                    @endif
                                <h3>
                                    Connect to the world through our access points<br>
                                </h3>
                            <!--<a class="boxed-btn3" href="#">Get Started</a>-->
                            </div>
                            <div class="ilstrator_thumb">
                                <img src="{{ url('public/img/ilstrator/illustration.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    
    <div class="service_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center">
                        <div class="icon">
                            <img src="{{ url('public/img/svg_icon/seo_1.svg')}}" alt="">
                        </div>
                        <h3>We know what we do</h3>
                        <p>We take care of analyzing the data for you and we offer you great possibilities.</p>
                        <a href="#" class="boxed-btn3-text">Learn More</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center">
                        <div class="icon">
                            <img src="{{ url('public/img/svg_icon/seo_2.svg')}}" alt="">
                        </div>
                        <h3>Make yourself show</h3>
                        <p>Thanks to our analyzes we can present you with strategies so that more people pass through your area and do not go unnoticed</p>
                        <a href="#" class="boxed-btn3-text">Learn More</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center">
                        <div class="icon">
                            <img src="{{ url('public/img/svg_icon/seo_3.svg')}}" alt="">
                        </div>
                        <h3>Connectivity</h3>
                        <p>We help you know if many people pass through the area where your store is located and we offer quick solutions.</p>
                        <a href="#" class="boxed-btn3-text">Learn More</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    

    
    <!--<div class="compapy_info">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-xl-5 col-md-5">-->
    <!--                <div class="man_thumb">-->
    <!--                    <img src="{{ url('public/img/ilstrator/man.png')}}" alt="">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-xl-7 col-md-7">-->
    <!--                <div class="company_info">-->
    <!--                    <h3>We are an SEO company that <br>-->
    <!--                        specializes in developing.</h3>-->
    <!--                        <p>Esteem spirit temper too say adieus who direct esteem. It esteems luckily or picture placing drawing. Apartments frequently or motionless on reasonable.-->
    <!--                            Steem spirit temper too say adieus who direct esteem.</p>-->

    <!--                    <a href="#" class="boxed-btn3">About Us</a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <a id="features"></a>
    <div class="features_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center">
                        <h3>We have some awesome features <br>
                            to rank your business</h3>
                            <p>Our service is excellent we offer a unique service for our users </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_feature">
                        <div class="icon">
                            <img src="{{ url('public/img/svg_icon/feature_1.svg')}}" alt="">
                        </div>
                        <h4>Accessibility</h4>
                        <p>You can check your information at any time</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_feature">
                        <div class="icon">
                            <img src="{{ url('public/img/svg_icon/feature_2.svg')}}" alt="">
                        </div>
                        <h4>Instant Results</h4>
                        <p>You won't have to wait to see the changes</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_feature">
                        <div class="icon">
                            <img src="{{ url('public/img/svg_icon/feature_3.svg')}}" alt="">
                        </div>
                        <h4>Global Service</h4>
                        <p>We send a specialist to the area where you are</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_feature">
                        <div class="icon">
                            <img src="{{ url('public/img/svg_icon/feature_4.svg')}}" alt="">
                        </div>
                        <h4>Email Marketing</h4>
                        <p>Mail us if you have any inconvenient with our service.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_feature">
                        <div class="icon">
                            <img src="{{ url('public/img/svg_icon/feature_5.svg')}}" alt="">
                        </div>
                        <h4>Custom Software</h4>
                        <p>Your service will be fully adapted to you.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_feature">
                        <div class="icon">
                            <img src="{{ url('public/img/svg_icon/feature_6.svg')}}" alt="">
                        </div>
                        <h4>Custom goals</h4>
                        <p>We are going to help you achieve your goals</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a id="statistics"></a>
    <div class="case_study_area case_bg_1">
        <div class="patrn_1 d-none d-lg-block">
            <img src="{{ url('public/img/pattern/patrn_1.png')}}" alt="">
        </div>
        <div class="patrn_2 d-none d-lg-block">
            <img src="{{ url('public/img/pattern/patrn.png')}}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-95 white_text">
                        <h3>Our Access Points</h3>
                        <p>We have access points distributed all over Granada and we offer you the posibility to make ur own access point.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="case_active owl-carousel">
                            <div class="single_study text-center">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{ url('public/img/case_study/1.png')}}" alt="">
                                        </a>                                    </div>
                                    <div class="subheading">
                                        <h4><a href="#">CPT-A</a></h4>
                                        <p>Granada, España</p>
                                    </div>
                                </div>
                            <div class="single_study text-center">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{ url('public/img/case_study/2.png')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="subheading">
                                        <h4><a href="#">CPT-B</a></h4>
                                        <p>Granada, España</p>
                                    </div>
                                </div>
                            <div class="single_study text-center">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{ url('public/img/case_study/3.png')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="subheading">
                                        <h4><a href="#">CPT-C</a></h4>
                                        <p>Granada, España</p>
                                    </div>
                                </div>
                            <div class="single_study text-center">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{ url('public/img/case_study/1.png')}}" alt="">
                                    </a>
                                </div>
                                <div class="subheading">
                                    <h4><a href="#">CPT-D</a></h4>
                                    <p>UI/UX, Design</p>
                                </div>
                            </div>
                            <div class="single_study text-center">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{ url('public/img/case_study/2.png')}}" alt="">
                                    </a>
                                </div>
                                <div class="subheading">
                                    <h4><a href="#">CPT-E</a></h4>
                                    <p>UI/UX, Design</p>
                                </div>
                            </div>
                        <div class="single_study text-center">
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{ url('public/img/case_study/3.png')}}" alt="">
                                </a>
                            </div>
                            <div class="subheading">
                                <h4><a href="#">CPT-F</a></h4>
                                <p>UI/UX, Design</p>
                            </div>
                        </div>
                        <div class="single_study text-center">
                            <div class="thumb">
                                <a href="#">
                                    <img src="{{ url('public/img/case_study/3.png')}}" alt="">
                                </a>
                            </div>
                            <div class="subheading">
                                <h4><a href="#">CPT-G</a></h4>
                                <p>UI/UX, Design</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    
    
    


    
    
    
    <a id="APoints"></a>
    <div class="accordion_area">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-xl-6 col-lg-6">
                    <div class="faq_ask">
                        <h3>Frequent Questions</h3>
                            <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Do you work in weekends?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <p>Yes, we work 24 hours per day 7 days at week</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    Can i apply to work here?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                            <div class="card-body">At this moment we dont offer any job in our business but we can do it at any time. Be ready!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Where are you located?
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion" style="">
                                            <div class="card-body">We're still an online company but if everything goes correctly we will be located in Granada, Spain soon!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="accordion_thumb">
                        <img src="{{ url('public/img/banner/accordion.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <div class="testimonial_area ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="testmonial_active owl-carousel">
                            <div class="single_carousel">
                                    <div class="single_testmonial text-center">
                                            <div class="quote">
                                                <img src="{{ url('public/img/testmonial/quote.svg')}}" alt="">
                                            </div>
                                            <p>The service they offer is very close and personal,
                                                since they do personalized analysis. <br> Thank you
                                                They and the council of changing my shop have made it fill up at parties. </p>
                                            <div class="testmonial_author">
                                                <div class="thumb">
                                                        <img src="{{ url('public/img/testmonial/thumb.png')}}" alt="">
                                                </div>
                                                <h3>Robert Thomson</h3>
                                                <span>Business Owner</span>
                                            </div>
                                        </div>
                            </div>
                            <div class="single_carousel">
                                    <div class="single_testmonial text-center">
                                            <div class="quote">
                                                <img src="{{ url('public/img/testmonial/quote.svg')}}" alt="">
                                            </div>
                                            <p>They helped me keep my restaurant full tables, <br>
                                                    I do not stop receiving reservations thanks to the advice of this company </p>
                                            <div class="testmonial_author">
                                                <div class="thumb">
                                                        <img src="{{ url('public/img/testmonial/thumb.png')}}" alt="">
                                                </div>
                                                <h3>Robert Thomson</h3>
                                                <span>Business Owner</span>
                                            </div>
                                        </div>
                            </div>
                            <div class="single_carousel">
                                    <div class="single_testmonial text-center">
                                            <div class="quote">
                                                <img src="{{ url('public/img/testmonial/quote.svg')}}" alt="">
                                            </div>
                                            <p>The service they offer is very close and personal,
                                                since they do personalized analysis. <br> Thank you
                                                They and the council of changing my shop have made it fill up at parties. </p>
                                            <div class="testmonial_author">
                                                <div class="thumb">
                                                        <img src="{{ url('public/img/testmonial/thumb.png')}}" alt="">
                                                </div>
                                                <h3>Robert Thomson</h3>
                                                <span>Business Owner</span>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        





<div class="modal fade zindexmodal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
       <div class="modal-header" id="resetTitle">
        <h5 class="modal-title" id="exampleModalLongTitle" >Log In Form</h5>
        <button type="button" class="close" id="botoncerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('login') }}" class="formReset">
            @csrf

            <!--<div class="form-group row">-->
            <!--    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>-->

            <!--    <div class="col-md-6">-->
            <!--        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>-->

            <!--        @error('email')-->
            <!--            <span class="invalid-feedback" role="alert">-->
            <!--                <strong>{{ $message }}</strong>-->
            <!--            </span>-->
            <!--        @enderror-->
            <!--    </div>-->
            <!--</div>-->
            
            <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                <div class="col-md-6">
                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link nachoreset" href="#" data-toggle="modal" data-target="#resetModal">
                            Forgot your password?
                        </a>
                    @endif
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade zindexmodal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Register Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                <div class="col-md-6">
                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade zindexmodal" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Reset Password Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/wordpressconjunto/resetpassword">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Reset Password
                    </button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@auth
<div class="modal fade zindexmodal" id="changepass" tabindex="-1" role="dialog" aria-labelledby="changepass" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change Password Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/wordpressconjunto/changepassword">
            @csrf
            <input type="hidden" value="{{Auth::user()->id}}" name="userid">
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                <div class="col-md-6">
                    <input id="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror" name="newpassword" required autocomplete="new-password">

                    @error('newpassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm old Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Change Password
                    </button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endauth
<script src=" https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js "></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="{{url('public/assets/js/nacho.js')}}"></script>
<script src="{{url('public/assets/js/mail.js')}}"></script>
<script src="{{url('public/assets/js/iniciocharts.js')}}"></script>
{{ get_footer() }}