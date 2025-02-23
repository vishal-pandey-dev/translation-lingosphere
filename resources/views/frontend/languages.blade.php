@extends('frontend.layouts.app')

@section('content')
    <section>
        <div class="extra_space">

        </div>
        <div class="section1_sl">
            <div class="in_sec1_sl">
                <div class="left_sec1_sl">
                    <img src="{{ asset('frontend/Lingosphere/img/sound1_sl.svg') }}" alt=""
                        class="img-fluid sound1_sl mobile_none">
                    <img src="{{ asset('frontend/Lingosphere/img/sound2_stt.svg') }}" alt=""
                        class="img-fluid sound2_stt mobile_none">
                    <div class="inside_left_sl">

                        <h1 class="sl_tt" data-aos="fade-up">
                            Supported<br>languages
                        </h1>

                        <p class="sl_pp" data-aos="fade-up">Explore our wide range of languages - expert translations in
                            every language you could need!
                        </p>
                        <button class="btn green_btn forphone_100width"
                            onclick="window.location.href='{{ route('request_translation') }}'">
                            Translate now!
                        </button>
                    </div>

                </div>

                <div class="right_sec1_sl">

                </div>


            </div>
        </div>
        <div class="section2_sl">
            <div class="in_sec2_sl">
                <div class="container p-0">

                    <div class="title_sl">
                        <h1 class="title_sl_tt">All&nbsp;Languages</h1>
                        <div class="horizontal-line mobile_none"></div>
                    </div>

                    <div class="mobile_none">
                        <div class="all_languages_sec">

                            <div class="per_column_lang">

                                <div class="languages_div_div">
                                    Arabic
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Belarusian
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Bengali
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Bulgarian
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Chinese
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                            </div>


                            <div class="per_column_lang">

                                <div class="languages_div_div">
                                    Czech
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    English
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    French
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    German
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Greek
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                            </div>

                            <div class="per_column_lang">

                                <div class="languages_div_div">
                                    Hungarian
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Hindi
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Indonesian
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Italian
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Japanese
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                            </div>



                            <div class="per_column_lang">

                                <div class="languages_div_div">
                                    Kazakh
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Korean
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Nigerian
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Portuguese

                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Polish
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                            </div>

                            <div class="per_column_lang">

                                <div class="languages_div_div">
                                    Persian
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Romanian
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Russian
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Serbian

                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Spanish
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                            </div>




                            <div class="per_column_lang">

                                <div class="languages_div_div">
                                    Swedish
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Thai
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Turkish
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Ukrainian

                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                                <div class="languages_div_div">
                                    Urdu
                                    <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                        class="img-fluid blackcircle">
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="desktop_none">
                        <div class="all_languages_sec_mobile">

                            <div class="languages_div_div">
                                Arabic
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Belarusian
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Bengali
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Bulgarian
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Chinese
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Czech
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                English
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                French
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                German
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Greek
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>




                            <div class="languages_div_div">
                                Hungarian
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Hindi
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Indonesian
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Italian
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Japanese
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>


                            <div class="languages_div_div">
                                Kazakh
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Korean
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Nigerian
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Portuguese

                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Polish
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Persian
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Romanian
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Russian
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Serbian

                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Spanish
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Swedish
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Thai
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Turkish
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Ukrainian

                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>

                            <div class="languages_div_div">
                                Urdu
                                <img src="{{ asset('frontend/Lingosphere/img/blackcircle.svg') }}" alt=""
                                    class="img-fluid blackcircle">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cont-form">
            <img src="{{ asset('frontend/Lingosphere/img/left_icon_sound.svg') }}" alt=""
                class="img-fluid left_icon_sound mobile_none">
            <img src="{{ asset('frontend/Lingosphere/img/right_icon_sound.svg') }}" alt=""
                class="img-fluid right_icon_sound mobile_none">
            <form id="contactform" action="{{ route('contactus.store') }}" method="post"
                onsubmit="return check_agree(this);">
                @csrf
                <input type="hidden" name="from_page" value="documents">
                <div class="form-cont">
                    <p class="c-btxt">Get in touch</p>
                    <div class="inf-f">
                        <input type="text" class="form-control input_main" id="name" name="fullname"
                            aria-describedby="emailHelp" placeholder="First Name" required>
                        <input type="email" class="form-control input_main" id="email" name="email"
                            aria-describedby="emailHelp" placeholder="Email Address" required>
                    </div>
                    <textarea id="message" name="message" class="message-f" placeholder="Subject" required></textarea>
                    <div class="checkbox-cont">
                        <div class="c-checkbox">
                            <div class="c-div">
                                <label class="d-flex justify-content-center justify-content-lg-start">
                                    <input type="checkbox" id="terms" name="terms">
                                    <label for="terms"></label>
                                </label>
                            </div>
                            <div class="c-text">
                                <p class="login_strong">By ticking this box, you agree to <a
                                        href="{{ route('termsandconditions') }}">Terms and Conditions</a>
                                    and <a href="{{ route('termsandconditions') }}">Privacy Policy.</a></p>
                            </div>
                        </div>
                        <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
                        <div class="col h-captcha mx-auto my_mob_24" data-sitekey="{{ env('H_CAPTCHA_SITE_KEY') }}">
                        </div>
                    </div>
                    <button type="submit" class="cont-btn btn">Submit Your message</button>
                </div>
            </form>
        </div>
        <div class="sec7_au">
            <div class="in_sec3_sl">
            </div>
        </div>
    </section>

    <script>
        function check_agree(form) {
            if (form.terms.checked) {
                $('#submit-btn').attr('disabled', true);
                return true;
            } else if (!form.terms.checked) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please Accept T&C'
                })
                return false;
            }
            return false;
        }
    </script>
@endsection
