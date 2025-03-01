@extends('frontend.layouts.app')

@if (Auth::check())
    @php
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $u2 = DB::table('last_billing_address')->where('user_id', $user_id)->orderBy('id', 'desc')->first();
        if ($u2) {
            $user = $u2;
        }
    @endphp
@endif
@section('content')
    <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size"
            role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader">
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
                <div id="order-details-modal-body" style="background: #F6F7FB;">

                </div>
            </div>
        </div>
    </div>

    <section class="checkout4_page">
        <div class="che_s1">
            <div class="dashboard_s1">
                <h1 class="dashboard_title" data-aos="fade-up">Welcome Back User</h1>
                <p class="dashboard_subtitle" data-aos="fade-up">Update your shipping and billing addresses password and
                    view your order history.</p>
                <div class="dashobard_tab_button" id="pills-tab" role="tablist">
                    <button class="btn dashboard_btn active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Account&nbsp;Details</button>

                    <button class="btn dashboard_btn" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">Order&nbsp;History</button>

                    <button class="btn dashboard_btn" id="pills-contact-tab"
                        onclick="window.location.href='{{ route('logout') }}'">Sign&nbsp;Out
                        <img src="{{ asset('frontend/capturecraze/images/signout_logo.svg') }}" alt=""
                            class="img-fluid">
                    </button>
                </div>
            </div>
        </div>
        <div class="dashboard_s2">
            <div class="container">
                <div class="dashboard_inner">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <form class="account_form" id="form-profile-update"
                                action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data"
                                onsubmit="return check_agree(this);">
                                @csrf
                                <div class="interim">
                                    <div class="dashboard_tab_1">
                                        <div class="dashtab_left">
                                            <div class="">
                                                <input type="text" class="form-control input_global"
                                                    form="form-profile-update" name="name"
                                                    value="{{ Auth::user()->name }}" placeholder="Full Name">
                                            </div>

                                            <div class="">
                                                <input type="email" class="form-control input_global"
                                                    form="form-profile-update" name="email"
                                                    value="{{ Auth::user()->email }}" placeholder="Email Address" readonly>
                                            </div>

                                            <div class="">
                                                <input type="password" class="form-control input_global"
                                                    form="form-profile-update" id="new_password" name="new_password"
                                                    placeholder="Password">
                                            </div>
                                            <div class="">
                                                <input type="password" class="form-control input_global"
                                                    form="form-profile-update" id="confirm_password" name="confirm_password"
                                                    required placeholder="Confirm New Password">
                                            </div>
                                        </div>
                                        <div class="dashtab_right">
                                            <div class="">
                                                <input type="text" class="form-control input_global" readonly
                                                    value="{{ $user->address }}" placeholder="Address Line 1">
                                            </div>
                                            <div class="">
                                                <input type="text" class="form-control input_global" readonly
                                                    value="{{ $user->addressL2 }}" placeholder="Address Line 2">
                                            </div>
                                            <div class="">
                                                <input type="email" class="form-control input_global"
                                                    value="{{ $user->postal_code }}" readonly placeholder="City/Town">
                                            </div>
                                            <div class="">
                                                <select class="form-select inpi_boxx " id="country-select"
                                                    aria-label="Default select example">
                                                    @foreach (\App\Models\Country::all() as $key => $country)
                                                        <option value="{{ $country->code }}"
                                                            @if ($country->code == $user->country || $country->code == $user->country) selected @endif>
                                                            {{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="">
                                                <input type="email" class="form-control input_global" readonly
                                                    value="{{ $user->country }}" placeholder="Country/State/Province">
                                            </div>
                                            <div class="">
                                                <input type="email" class="form-control input_global"
                                                    value="{{ $user->postal_code }}" readonly
                                                    placeholder="Zip Code/Postal Code">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn_redd" type="submit" form="form-profile-update">Submit</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            <div class="tab_table">
                                <div class="mobile_none">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <p class="t_head_text">Order&nbsp;#</p>
                                                </th>
                                                <th scope="col">
                                                    <p class="t_head_text">Date</p>
                                                </th>
                                                <th scope="col">
                                                    <p class="t_head_text">QTY</p>
                                                </th>
                                                <th scope="col">
                                                    <p class="t_head_text">Total</p>
                                                </th>
                                                <th scope="col">
                                                    <p class="t_head_text text-center">Status</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $key => $order)
                                                <tr>
                                                    <th scope="row">
                                                        <p class="t_body_text">{{ $order->code }}</p>
                                                    </th>
                                                    <td>
                                                        <p class="t_body_text">{{ date('d-m-Y', $order->date) }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="t_body_text">4 pages</p>
                                                    </td>
                                                    <td>
                                                        <p class="t_body_text">{{ single_price($order->grand_total) }}</p>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn_table_light mx-auto"
                                                            onclick="show_purchase_history_details({{ $order->id }})">
                                                            In Progress
                                                        </button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center py-4">
                                                        <div class="no-orders-container">
                                                            <h4 class="text-muted">No Orders Found</h4>
                                                            <p class="text-muted">Start shopping to see your orders here!
                                                            </p>
                                                            <center>
                                                            <a href="{{ route('standard_translation') }}"
                                                                class="btn btn_redd mt-2 w-25">Browse Products</a>
                                                            </center>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                            <div class="desktop_none">
                                <div class="table_mob">
                                    @forelse ($orders as $key => $order)
                                        <div class="table_disput">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="t_head_text">Order #</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="t_head_text text-end">{{ $order->code }}</p>
                                                </div>
                                            </div>
                                            <div class="table_bord"></div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="t_body_title">Date</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="t_body_text">{{ date('d-m-Y', $order->date) }}</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="t_body_title">QTY</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="t_body_text">4 pages</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="t_body_title">Total</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="t_body_text">{{ single_price($order->grand_total) }}</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="t_body_title mb-0">Status</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="t_body_text mb-0"
                                                        onclick="show_purchase_history_details({{ $order->id }})"> In
                                                        Progress</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="no-orders-container text-center py-4">
                                            <img src="{{ asset('frontend/Lingosphere/img/no-orders.svg') }}"
                                                alt="No Orders" class="img-fluid mb-3" style="max-width: 150px;">
                                            <h4 class="text-muted">No Orders Found</h4>
                                            <p class="text-muted">Start shopping to see your orders here!</p>
                                            <a href="{{ route('products') }}" class="btn btn-primary mt-2">Browse
                                                Products</a>
                                        </div>
                                    @endforelse

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
