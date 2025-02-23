@extends('frontend.layouts.app')
@section('content')
    @if (Session::has('order_code'))
        @php
            $order_code = Session::get('order_code');
        @endphp
    @else
        @php
            $order_code = 'Session expired';
        @endphp
    @endif

    @if (Session::has('order_date'))
        @php
            $order_date = Session::get('order_date');
        @endphp
    @else
        @php
            $order_date = 'Session expired';
        @endphp
    @endif

    <div class="cf_div">

        <div class="left_cf">

            <img src="{{ asset('frontend/Lingosphere/img/cf_right_sound.svg') }}" alt=""
                class="img-fluid cf_right_sound mobile_none">
            <img src="{{ asset('frontend/Lingosphere/img/cf_left_sound.svg') }}" alt=""
                class="img-fluid cf_left_sound mobile_none">

            <div class="in_left_cf">

                <h1 class="cf_tt">
                    Payment Successful!
                </h1>

                <p class="cs_pp">Congratulations, your payment was successful! Thank you for your order.
                </p>
                <div class="btn_div">

                    <button class="btn cf_leftbtn forphone_100width" onclick="window.location.href='{{ route('home') }}'">
                        Return home
                    </button>

                    <button class="btn cf_rightbtn forphone_100width"
                        onclick="window.location.href='{{ route('dashboard') }}'">
                        View Order
                    </button>



                </div>
            </div>

        </div>

        <div class="right_cs">

        </div>

    </div>
@endsection
@section('script')
   
@endsection
