@extends('frontend.layouts.app')

@section('content')
    <section class="contactus-cont">
        <div class="cont-top">
            <div class="c-info">
                <h1>Our Contact details</h1>
                <div class="info-txt">
                    <p>TBC</p>
                    <p>support@lingosphere.co</p>
                    <p>TBC</p>
                </div>
            </div>
        </div>
        <div class="cont-form">

            <img src="{{ asset('frontend/Lingosphere/img/left_icon_sound.svg') }}" alt=""
                class="img-fluid left_icon_sound mobile_none">
            <img src="{{ asset('frontend/Lingosphere/img/right_icon_sound.svg') }}" alt=""
                class="img-fluid right_icon_sound mobile_none">

            <div class="form-cont">
                <p class="c-btxt">Get in touch</p>

                <div class="inf-f">
                    <input type="text" class="form-control input_main" id="fullname" aria-describedby="emailHelp"
                        placeholder="Full Name" form="contactform" name="fullname" required>
                </div>
                <div class="inf-f">
                    <input type="email" class="form-control input_main" id="email" aria-describedby="emailHelp"
                        placeholder="Email" form="contactform"name="email" required>
                    <input type="tel" class="form-control input_main" id="phone" aria-describedby="emailHelp"
                        placeholder="Phone Number" form="contactform"name="phone" required>

                </div>
                <textarea name="message" id="message" class="message-f" form="contactform"placeholder="Your Message"></textarea>
                <form id="contactform" role="form" action="{{ route('contactus.store') }}" method="post"
                    onsubmit="return check_agree(this);">
                    @csrf
                    <input type="hidden" name="from_page" class="form-control" value="contactus">
                    <div class="checkbox-cont">
                        <div class="c-checkbox">
                            <div class="c-div">
                                <label class="d-flex justify-content-center justify-content-lg-start">
                                    <input type="checkbox" id="terms" name="terms" form="contactform">
                                    <label for="terms"></label>
                                </label>
                            </div>
                            <div class="c-text">
                                <p class="login_strong">By ticking this box, you agree to <a
                                        href=" {{ route('termsandconditions') }}">Terms and
                                        Conditions</a> and <a href="{{ route('privacypolicy') }}">Privacy Policy.</a></p>
                            </div>
                        </div>
                        <div class="h-captcha mx-auto my_mob_24" data-sitekey="{{ env('H_CAPTCHA_SITE_KEY') }}"
                            form="contactform"></div>
                    </div>

                    <button class="cont-btn btn" type="submit">Submit Your message</a>
                </form>
            </div>
        </div>
    </section>
    <script>
        function check_agree(form) {
            console.log(form.email.valid);
            if (form.fullname && form.email && form.phone && form.message && form.terms.checked) {

                $('#submit-btn').attr('disabled', true);
                return true;
            } else if (!form.fullname.value) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please Enter Fullname'
                })
                return false;
            } else if (!form.email.value) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please Enter Email'
                })
                return false;
            } else if (!form.phone.value) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please Enter Phone'
                })
                return false;
            } else if (!form.message.value) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please Enter Comments'
                })
                return false;
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
