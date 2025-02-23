<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lingosphere</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/Lingosphere/img/Fav.png') }}">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Essential CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick-theme.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/Lingosphere/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/Lingosphere/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/Lingosphere/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/Lingosphere/css/m_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/Lingosphere/css/tirthak_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/Lingosphere/css/saakshi.css') }}">

    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

</head>

<body>
    @php
        if (Session::has('currency_code')) {
            $currency_code = Session::get('currency_code');
        } else {
            $currency_code = $currency_code = \App\Models\Currency::getDefaultCurrency();
        }
        Session::put('currency_code', $currency_code);
    @endphp
    <header class="fixed-top">
        <div class="header_top">
            <div class="container desktop_header p-0">
                <div class="header_main_container">
                    <div class="header_left">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('frontend/Lingosphere/img/header_logo.svg') }}" alt="Logo"
                                class="img-fluid">
                        </a>
                    </div>
                    <div class="header_right">
                        <!-- Navigation Links -->
                        <div class="currency_drop_container">
                            <button class="btn btn_currency_drop" onclick="justDrop('service_drop', 'roter1')">
                                Our Services
                                <img src="{{ asset('frontend/Lingosphere/img/drop.svg') }}" alt=""
                                    class="img-fluid" id="roter1">
                            </button>
                            <div class="dropped_div d-none" id="service_drop">
                                <img src="{{ asset('frontend/Lingosphere/img/polygon_trigonal.svg') }}" alt=""
                                    class="img-fluid poly_img">
                                <button
                                    class="btn btn_header_service {{ request()->routeIs('certified_translation') ? 'active' : '' }}"
                                    onclick="window.location.href='{{ route('certified_translation') }}'">Certified
                                    translation</button>
                                <button
                                    class="btn btn_header_service {{ request()->routeIs('standard_translation') ? 'active' : '' }}"
                                    onclick="window.location.href='{{ route('standard_translation') }}'">Standard
                                    translation</button>
                                <div class="dotted"></div>
                                <button
                                    class="btn btn_header_service {{ request()->routeIs('languages') ? 'active' : '' }}"
                                    onclick="window.location.href='{{ route('languages') }}'">Supported
                                    languages</button>
                                <button
                                    class="btn btn_header_service {{ request()->routeIs('documents') ? 'active' : '' }}"
                                    onclick="window.location.href='{{ route('documents') }}'">Supported
                                    documents</button>
                            </div>
                        </div>
                        <button class="btn btn_header_link {{ request()->routeIs('aboutus') ? 'active' : '' }}"
                            onclick="window.location.href='{{ route('aboutus') }}'">
                            About Us
                        </button>
                        <button class="btn btn_header_link {{ request()->routeIs('careers') ? 'active' : '' }}"
                            onclick="window.location.href='{{ route('careers') }}'">
                            Join us
                        </button>
                        <button class="btn btn_header_link {{ request()->routeIs('faqs') ? 'active' : '' }}"
                            onclick="window.location.href='{{ route('faqs') }}'">
                            FAQ's
                        </button>
                        <button class="btn btn_header_link {{ request()->routeIs('contactus') ? 'active' : '' }}"
                            onclick="window.location.href='{{ route('contactus') }}'">
                            Support
                        </button>
                        <div class="vertical_bar"></div>
                        <div class="currency_drop_container">
                            <button class="btn btn_currency_drop" onclick="justDrop('desk_currency_drop', 'roter2')">
                                {{ $currency_code }}
                                <img src="{{ asset('frontend/Lingosphere/img/drop.svg') }}" alt=""
                                    class="img-fluid" id="roter2">
                            </button>
                            <div class="dropped_div_currency d-none" id="desk_currency_drop">
                                <img src="{{ asset('frontend/Lingosphere/img/polygon_trigonal.svg') }}" alt=""
                                    class="img-fluid poly_img">
                                @foreach (\App\Models\Currency::getActiveCurrencies() as $key => $currency)
                                    <button
                                        class="dropdown-item {{ $currency_code == $currency->code ? 'active' : '' }}"
                                        data-currency="{{ $currency->code }}">
                                        {{ $currency->code }} ({{ $currency->symbol }})
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        {{-- cart dropdown --}}
                        <button class="btn btn_header_link" onclick="justDrop('cart_drop1', 'cart_items_sidenav')">
                            <img src="{{ asset('frontend/Lingosphere/img/cart_basket.svg') }}" alt=""
                                class="img-fluid">
                            <span>
                                {{ Session::has('cart') ? count(Session::get('cart')) : '0' }}
                            </span>
                        </button>

                        <div class="cart-dropdown d-none" id="cart_drop1">
                            <div class="cart-items">
                                @if (Session::has('cart') && count(Session::get('cart')) > 0)
                                    @foreach (Session::get('cart') as $key => $cartItem)
                                        @php
                                            $product = \App\Models\Product::find($cartItem['id']);
                                        @endphp
                                        <div class="cart-item">
                                            <div class="cart-item-img">
                                                <img src="{{ asset($product->thumbnail_img) }}"
                                                    alt="{{ $product->name }}">
                                            </div>
                                            <div class="cart-item-details">
                                                <h4>{{ $product->name }}</h4>
                                                <p>Quantity: {{ $cartItem['quantity'] }}</p>
                                                <p>Price: {{ single_price($cartItem['price']) }}</p>
                                            </div>
                                            <button class="remove-cart-item"
                                                onclick="removeFromCart({{ $key }})">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                    <div class="cart-footer">
                                        <div class="total">
                                            Total:
                                            {{ single_price(array_sum(array_column(Session::get('cart'), 'price'))) }}c
                                        </div>
                                        <a href="{{ route('cart') }}" class="btn btn_redd">View Cart</a>
                                    </div>
                                @else
                                    <div class="empty-cart">
                                        <p>Your cart is empty</p>
                                    </div>
                                @endif
                            </div>
                        </div>


                        <!-- Auth Links -->
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn_header_link">
                                <img src="{{ asset('frontend/Lingosphere/img/acc_logo.svg') }}" alt="Account"
                                    class="img-fluid">
                            </a>
                        @else
                            <a href="{{ route('user.login') }}" class="btn btn_header_link">
                                <img src="{{ asset('frontend/Lingosphere/img/acc_logo.svg') }}" alt="Login"
                                    class="img-fluid">
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
    @include('frontend.inc.footer')
    <!-- Essential JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/Lingosphere/dist/js/owl.carousel.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>


    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>

    <!-- Custom Scripts -->
    <script>
        $(function() {
            // Header scroll effect
            $(document).scroll(function() {
                var $nav = $(".fixed-top");
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".hamburger_menu").click(function() {
                $(".header_mobo_main_slide").fadeIn("slow");
                $(".hamburger_menu").fadeOut("slow");
                $(".hamburger_menu_close").fadeIn("slow");
                $(".header_cart_mobo_main_slide").fadeOut("slow");
            });
            $(".hamburger_menu_close").click(function() {
                $(".header_mobo_main_slide").fadeOut("slow");
                $(".hamburger_menu").fadeIn("slow");
                $(".hamburger_menu_close").fadeOut("slow");
            });
            $(".cart_menu").click(function() {
                $(".header_cart_mobo_main_slide").fadeIn("slow");
                $(".cart_menu").fadeOut("slow");
                $(".cart_menu_close").fadeIn("slow");
                $(".header_mobo_main_slide").fadeOut("slow");
            });
            $(".cart_menu_close").click(function() {
                $(".header_cart_mobo_main_slide").fadeOut("slow");
                $(".cart_menu").fadeIn("slow");
                $(".cart_menu_close").fadeOut("slow");
            });
        });

        function justDrop(droperId, roterId) {
            const theId = document.getElementById(droperId);
            const theId2 = document.getElementById(roterId);
            if (theId.classList.contains('d-none')) {
                theId.classList.remove('d-none');
                theId2.style.rotate = '180deg';
            } else {
                theId.classList.add('d-none');
                theId2.style.rotate = '0deg';
            }
        }

        function counterMinus(indexPosition) {
            const myId = 'cart_product_units' + indexPosition;
            const inputElement = document.getElementById(myId);
            let currentValue = parseInt(inputElement.value, 10);

            if (isNaN(currentValue)) {
                currentValue = 0;
            }

            if (currentValue > 1) {
                const newValue = currentValue - 1;
                inputElement.value = newValue;
            } else {
                inputElement.value = currentValue;
            }
        }


        function counterPlus(indexPosition) {
            const myId = 'cart_product_units' + indexPosition;
            const inputElement = document.getElementById(myId);
            let currentValue = parseInt(inputElement.value, 10);

            if (isNaN(currentValue)) {
                currentValue = 0;
            }

            if (currentValue < 10) {
                const newValue = currentValue + 1;
                inputElement.value = newValue;
            } else {
                inputElement.value = currentValue;
            }
        }

        //Change Currency
        $(document).ready(function() {
            $('#desk_currency_drop button').on('click', function() {
                let currency_code = $(this).data('currency');

                $.ajax({
                    url: '/currency',
                    type: 'POST',
                    data: {
                        currency_code: currency_code,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status) {
                            location.reload();
                        }
                    }
                });
            });
        });
    </script>

    <script>
        function showFrontendAlert(type, message) {
            let icon = type;
            if (type == 'danger') {
                icon = 'error';
            }

            Swal.fire({
                position: 'center',
                icon: icon,
                title: '<h1 class="text-blue">' + message + '</h1>',
                html: '<p class="body-large text-grey">Please wait while page refreshes</p>',
                showConfirmButton: true,
                confirmButtonText: 'Ok',
                width: 'auto'
            });
        }
    </script>
    @foreach (session('flash_notification', collect())->toArray() as $message)
        <script>
            showFrontendAlert('{{ $message['level'] }}', '{{ $message['message'] }}');
        </script>
    @endforeach

    {{-- cart section --}}
    <script>
        function updateNavCart() {
            $.post('{{ route('cart.nav_cart') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#cart_items_sidenav').html(data.count);
                $('#cart_drop1').html(data.cart_view);
            });
        }

        function updateCartSummary(data) {
            $('#cart-summary').html(data);
            showFrontendAlert('success', 'Cart updated successfully');
        }

        function removeFromCart(key) {
            $.post('{{ route('cart.removeFromCart') }}', {
                _token: '{{ csrf_token() }}',
                key: key
            }, function(data) {
                updateNavCart();
                updateCartSummary(data);
                if (data.success) {
                    location.reload();
                }
            });
        }

        function updateQuantity(key, element) {
            $.post('{{ route('cart.updateQuantity') }}', {
                _token: '{{ csrf_token() }}',
                key: key,
                quantity: element.value
            }, function(data) {
                updateNavCart();
                updateCartSummary(data);
            });
        }
    </script>



    @yield('scripts')
</body>

</html>
