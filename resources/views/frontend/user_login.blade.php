@extends('frontend.layouts.app')

@section('content')
    {{-- NEW CODE Starts here --}}
    <section class="authentication_page">
        <div class="authentication_main">
            <div class="auth_inner">
                <div class="auth_left">
                    <div class="auth_content ms-auto">
                        <h1 class="auth_title">Log in</h1>
                        <div class="auth_content_inner">
                            <form id="loginform" role="form" action="{{ route('login') }}" method="POST">
                                @csrf
                            </form>
                            <div class="auth_body">
                                <div class="">
                                    <input type="email" class="form-control input_global" id="email" name="email"
                                        aria-describedby="emailHelp" placeholder="Email address" required form="loginform">
                                </div>
                                <div class="posre">
                                    <input type="password" class="form-control input_global" id="password"
                                        aria-describedby="emailHelp" placeholder="Password" name="password" required
                                        form="loginform">

                                    <img class="eyeico" src="{{ asset('frontend/Lingosphere/img/eyeico.png') }}"
                                        id="togglePassword">
                                </div>
                                <button class="btn btn_redd" type="submit" form="loginform">Sign
                                    In</button>
                            </div>
                            <div class="auth_footer">
                                <a href=" {{ route('password.request') }}" class="forgot_pass_link">Forgot your
                                    password?</a>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('frontend/Lingosphere/img/patternL.png') }}" alt=""
                        class="img-fluid patternL">
                    <img src="{{ asset('frontend/Lingosphere/img/pattern_R_new.png') }}" alt=""
                        class="img-fluid patternRnew">
                </div>
                <div class="auth_right">
                    <div class="auth_content">
                        <h1 class="auth_title">or Sign up</h1>
                        <div class="auth_content_inner">
                            <div class="auth_body">
                                <div class="">
                                    <input type="text" class="form-control input_global" id="name" name="name"
                                        aria-describedby="emailHelp" placeholder="Full name" form="registerform" required>
                                </div>
                                <div class="">
                                    <input type="email" class="form-control input_global" id="email" name="email"
                                        aria-describedby="emailHelp" placeholder="email" form="registerform" required>
                                </div>
                                <div class="">
                                    <input type="password" class="form-control input_global" id="password" name="password"
                                        aria-describedby="emailHelp" placeholder="Password ( at least 6 characters)"
                                        form="registerform" required>
                                </div>
                                <div class="">
                                    <input type="password" class="form-control input_global" name="password_confirmation"
                                        id="password_confirmation" aria-describedby="emailHelp"
                                        placeholder="Confirm Password" form="registerform" required>
                                </div>
                                <div class="">
                                    <div class="c-checkbox">
                                        <div class="c-div">
                                            <label class="d-flex justify-content-center justify-content-lg-start">
                                                <input type="checkbox" id="terms" name="terms">
                                                <label for="terms"></label>
                                            </label>
                                        </div>
                                        <div class="c-text">
                                            {{-- <p class="login_strong">By ticking this box, you agree to <a
                                                    href="{{ route('termsandconditions') }}">Terms and
                                                    Conditions</a> and <a href="{{ route('privacypolicy') }}">Privacy Policy.</a></p> --}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <form id="registerform" role="form" action="{{ route('register') }}" method="POST"
                                onsubmit="return check_agree(this);">
                                @csrf
                                <div class="auth_footer">


                                    <div class="dual_btn align-items-center">
                                        <div>
                                            <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
                                            <div class="h-captcha mx-auto my_mob_24"
                                                data-sitekey="{{ env('H_CAPTCHA_SITE_KEY') }}">
                                            </div>
                                        </div>
                                        <button class="btn btn_redd">Create
                                            an account
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Success Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal_dialog">
                <div class="modal-content modal_content">
                    <div class="custom_modal_body">
                        <div class="modal_inner">
                            <div class="modal_content">
                                <h1 class="modal_title">Account Successfully Created!</h1>
                                <p class="modal_subtitle">Diam tincidunt vestibulum pharetra nulla non nullam. Tellus
                                    lobortis.</p>
                                <button class="btn btn_redd mx-auto mowid100" data-bs-dismiss="modal">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Failure Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal_dialog">
                <div class="modal-content modal_content">
                    <div class="custom_modal_body">
                        <div class="modal_inner bg_fail">
                            <div class="modal_content">
                                <h1 class="modal_title">Something went wrong</h1>
                                <p class="modal_subtitle" style="color: #B33951;">Diam tincidunt vestibulum pharetra nulla
                                    non nullam. Tellus lobortis.</p>
                                <button class="btn btn_redd mx-auto mowid100" data-bs-dismiss="modal">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </section>


    <script>
        function check_agree(form) {


            if (form.terms.checked) {
                return true;
            } else if (!form.terms.checked) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please accept terms and conditions'
                })
            }
            return false;
        }
    </script>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
@endsection
