@extends('frontend.layouts.app')

@section('content')
    {{-- New Code Start --}}

    <section class="comon_bg">
        <div class="container sign_up_cont px-0 ">
            <div class="down_box">
                <div class="left_box">
                    <div class="sing_up_box">
                        <h4 class="sing_title">Sign Up</h4>
                        <p class="sign_sub">You will need to make an account to use our services. Please use the form below
                            to sign up. </p>
                        <p class="log_in">Have an account? <a href="{{ route('user.login') }}" class="odd">Log in</a></p>
                    </div>
                    <div class="form_box">
                        <div class="split_box">
                            <div class="form-group name_form">
                                <div class="lable_forget">
                                    <label for="name" class="full_namee">Full Name</label>
                                </div>
                                <input type="text" class="form-control inpi_boxx " form="registerform" name="name"
                                    id="name" placeholder="Full Name" required>
                            </div>
                            {{-- <div class="form-group name_form">
                            <div class="lable_forget">
                                <label for="email" class="full_namee">last Name</label>
                            </div>
                            <input type="email" class="form-control inpi_boxx " name="email" id="email" placeholder="Email Address" required>
                        </div> --}}
                        </div>
                        <div class="form-group name_form">
                            <div class="lable_forget">
                                <label for="email" class="full_namee">Email</label>
                            </div>
                            <input type="email" class="form-control inpi_boxx " form="registerform" name="email"
                                id="email" placeholder="Email Address" required>
                        </div>
                        <div class="form-group name_form">
                            <div class="lable_forget">
                                <label for="password" class="full_namee">Password</label>
                            </div>
                            <input type="password" class="form-control inpi_boxx " form="registerform" name="password"
                                id="password" class="form-control pass-icon"
                                placeholder="Password ( at least 6 characters)" required>
                        </div>

                        <div class="form-group name_form">
                            <div class="lable_forget">
                                <label for="password_confirmation" class="full_namee">Confirm password</label>
                            </div>
                            <input type="password" class="form-control inpi_boxx " form="registerform"
                                name="password_confirmation" id="password_confirmation" class="form-control pass-icon"
                                placeholder="Password ( at least 6 characters)" required>
                        </div>
                        <div class="terms_captachabox">
                            <div class="custom-control custom_checkbox">
                                <input type="checkbox" class="form-check-input  tick_box" form="registerform" name="terms"
                                    id="terms">
                                <label class="custom-control-label terms_line" for="terms">I agree with the <a
                                        href="{{ route('termsandconditions') }}" class="odd">Terms & Conditions</a> &
                                    <a href="{{ route('privacypolicy') }}" class="odd">Privacy Policy</a></label>
                            </div>
                            <form id="registerform" role="form" action="{{ route('register') }}" method="POST"
                                onsubmit="return check_agree(this);">
                                @csrf
                                <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
                                <div class="h-captcha mx-auto my_mob_24" data-sitekey="{{ env('H_CAPTCHA_SITE_KEY') }}">
                                </div>
                                {{-- <img src="{{ asset('frontend/TranslatorTongue/img/reCAPTCHA.png') }}" alt="" class=" img-fluid  captacha"> --}}
                            </form>
                        </div>

                        <button type="submit" form="registerform" class="btn btn_local1"> Sign up </button>
                    </div>
                </div>
                <div class="rght_box">
                    <img src="{{ asset('frontend/TranslatorTongue/img/right_side.png') }}"
                        alt=""class="sign_upp img-fluid ">
                </div>
            </div>
    </section>

    <script type="text/javascript">
        function check_agree(form) {

            var password1 = form.password.value;
            var password2 = form.password_confirmation.value;

            if (password2 == password1 && form.terms.checked) {
                return true;
            } else if (password1.length < 6) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password is too short, please try again !'
                })
            } else if (password2 != password1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password does not matched, please try again !'
                })
            } else if (!form.terms.checked) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You must agree to the Terms and Conditions and Privacy Policy before continuing.'
                })
                return false;
            }
            return false;
        }
    </script>
@endsection
