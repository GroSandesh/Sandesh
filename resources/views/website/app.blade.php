<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sandhesh Home page</title>
    <title>{{ env('APP_NAME') }} - @yield('title')</title>
    @yield('headerscripts')
    <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('website/font/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/style.css') }}">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><img class="img-fluid" src="{{ asset('website/images/logo.svg') }}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto justify-content-end">
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="#">Faq</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="#">Contact Us</a>
                    </li>
                    @auth
                        <li class="nav-item navbar-dropdown ">
                            <a class="nav-item nav-link" href="#">My Account<span class="down-caretmen"></span></a>

                            <div class="dropdown">
                                <a href="#" id="showprofilemodal">My profile</a>
                                <a href="#">My post</a>
                                <a href="#" id="showpasswordmodal">Change password</a>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="menu-icon typcn typcn-user-outline"></i>
                                    <span class="menu-title">Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </li>
                            </div>
                        </li>
                    @endauth
                    <li class="nav-item last">
                        <a class="nav-item nav-link last" href="{{ route('addmypost') }}">Add/Create/Post</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer id="footer" class="footer" role="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ url('/') }}">
                        <img class="img-fluid" src="{{ asset('website/images/logo.svg') }}">
                    </a>

                    <div class="footerLink">
                        <ul>
                            <li>
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li>
                                <a href="#">About</a>
                            </li>
                            <li>
                                <a href="#">Faq</a>
                            </li>
                            <li >
                                <a href="#">Blog</a>
                            </li>
                            <li >
                                <a href="#">Contact Us</a>
                            </li>
                        </ul>
                    </div>

                    <div class="footerSocialIcon mt-4">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></li>
                        </ul>
                    </div>
                    <hr>
                    <div class="col-sm-12">
                        <div class="cptext">
                            <ul>
                                <li><span class="footerContact"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                    15, Usol'skaya Str., 614064, Perm, Russia
                                </</li>
                                <li><span class="footerContact"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></span>
                                    <a class="phoneControl" href="tel: +7 (342) 249-5509">+7 (342) 249-5509</a>
                                </li>
                                <li><span class="footerContact"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                    <a class="phoneControl" href="mailto: td_dami@Mail.Ru">td_dami@Mail.Ru</a>

                                </li>
                            </ul>
                            <p>© 2021 SANDESH</p>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/bouncer@1/dist/bouncer.polyfills.min.js"></script>
    @auth
        <style>
            .pac-container {
                z-index: 2000 !important;
            }
        </style>
        <div class="modal fade" id="myProfileModal" tabindex="-1" role="dialog" aria-labelledby="myProfileModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <section id="verifyOtp" class="verifyOtp p-5" role="verifyOtp">
                            <div class="container p-0">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @if(Session::has('Succcessprofile'))
                                            <div class="alert alert-success hide500">
                                                <strong>Success ! </strong> {{Session::get('Succcessprofile')}}
                                            </div>
                                        @endif
                                        <div class="forgotPage">
                                            <button type="submit" class="close1" onclick="window.location.reload()"><i class="flaticon-cancel"></i></button>
                                            <h4>Edit Profile</h4>
                                            <form class="form-sample js-form formForgot" method="post" action="{{route('myprofileUpdate')}}" data-validate >
                                                @csrf
                                                <div class="form-group showind mb-2">
                                                    <input type="text" class="form-control @error('fname') redborder @enderror"
                                                           placeholder="Name * " name="fname" minlength="4" maxlength="15" required
                                                           value="{{ empty(Request::old('fname')) ? Auth::user()->fname : Request::old('fname') }}">
                                                    @error('fname')
                                                        <div class="rederror">{{ $message }}</div>
                                                    @enderror
                                                    <span class="infoicos" data-toggle="tooltip" data-placement="top" title="Hint : Only Characters allowed">
                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                    </span>
                                                </div>

                                                <div class="form-group showind mb-2">
                                                    <input type="text" class="form-control @error('lname') redborder @enderror"
                                                           placeholder="Surname *" name="lname" minlength="4" maxlength="15" required
                                                           value="{{ empty(Request::old('lname')) ? Auth::user()->lname : Request::old('lname') }}">
                                                    <span class="infoicos" data-toggle="tooltip" data-placement="top" title="Hint : Only Characters allowed">
                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                    </span>
                                                    @error('lname')
                                                    <div class="rederror">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-2">
                                                    <input type="email" class="form-control @error('email') redborder @enderror"
                                                           placeholder="Email Address" name="email" minlength="4" maxlength="50"
                                                           value="{{ empty(Request::old('email')) ? Auth::user()->email : Request::old('email') }}" autocomplete="off">
                                                    @error('email')
                                                        <div class="rederror">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-2">
                                                    <input class="form-control datepkr @error('dob') redborder @enderror" type="date"
                                                           placeholder="Date Of Birth" name="dob"  required
                                                           value="{{ empty(Request::old('dob')) ? date('Y-m-d', strtotime(Auth::user()->dob)) : Request::old('dob') }}" >
                                                    @error('dob')
                                                        <div class="rederror">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group showind mb-2">
                                                    <input type="text" class="form-control @error('mobile') redborder @enderror"
                                                           placeholder="Mobile Number *" name="mobile" required disabled
                                                           value="{{ empty(Request::old('mobile')) ? Auth::user()->mobile : Request::old('mobile') }}"
                                                           pattern="^[0-9]\d{9}$">
                                                    <span class="infoicos" data-toggle="tooltip" data-placement="top" title="Hint : Only Numbers Allowed, Minimum 10 Digits">
                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                    </span>
                                                    @error('mobile')
                                                        <div class="rederror">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-2 showind">
                                                    <input id="searchTextField" type="text" class="form-control @error('address') redborder @enderror"
                                                           placeholder="Location" name="address" required
                                                           value="{{ empty(Request::old('address')) ? Auth::user()->address : Request::old('address') }}" >
                                                    <span class="infoicos" onclick="autoDetectPickup()">
                                                        <i class="fa fa-location-arrow"  aria-hidden="true"></i>
                                                    </span>
                                                    <input type="hidden" id="ulocationlat" name="lat"
                                                           value="{{ empty(Request::old('lat')) ? Auth::user()->lat : Request::old('lat') }}">
                                                    <input type="hidden" id="ulocationlong" name="long"
                                                           value="{{ empty(Request::old('long')) ? Auth::user()->long : Request::old('long') }}">
                                                    @error('address')
                                                        <div class="rederror">{{ $message }}</div>
                                                    @enderror
                                                    <div id="map" style="height:600px;display:none;"> </div>
                                                </div>

                                                <div class="form-group showind mb-2">
                                                    <input type="text" class="form-control @error('adhaar') redborder @enderror"
                                                           placeholder="Aadhaar Number" name="adhaar" required
                                                           value="{{ empty(Request::old('adhaar')) ? Auth::user()->adhaar : Request::old('adhaar') }}" pattern="^[0-9]\d{15}$">
                                                    <span class="infoicos" data-toggle="tooltip" data-placement="top" title="Hint : Only Numbers Allowed, Minimum 16 Digits">
                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                    </span>
                                                    @error('adhaar')
                                                        <div class="rederror">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="Loginbtn mt-2">Update Profile</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="passwordmodal" tabindex="-1" role="dialog" aria-labelledby="passwordmodalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <section id="verifyOtp" class="verifyOtp p-5" role="verifyOtp">
                            <div class="container p-0">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @if(Session::has('Succcesspassword'))
                                            <div class="alert alert-success hide500">
                                                <strong>Success ! </strong> {{Session::get('Succcesspassword')}}
                                            </div>
                                        @endif

                                        <div class="forgotPage">
                                            <button type="submit" class="close1" onclick="window.location.reload()"><i class="flaticon-cancel"></i></button>
                                            <h4>Change Password</h4>
                                            <p class="changeP">To change your account password please
                                                fill in fields below</p>
                                            <form class="form-sample js-form formForgot" method="post" action="{{route('passwordupdate')}}" data-validate >
                                                @csrf
                                                <div class="form-group showind mb-2" style="position: relative;">
                                                    <input id="password-field1" type="password" class="form-control pr30px @error('current_password') redborder @enderror"
                                                           placeholder="Current Password"  name="current_password" minlength="8" maxlength="16" required autocomplete="off">
                                                    <i toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password"></i>
                                                    <span class="infoicos" data-toggle="tooltip" data-placement="top" title="Hint : 1 Capital, 1 Small, 1 Special Character required">
                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                    </span>
                                                    @error('current_password')
                                                        <div class="rederror">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group showind mb-2" style="position: relative;">
                                                    <input id="password-field2" type="password" class="form-control pr30px @error('password') redborder @enderror"
                                                           placeholder="New Password"  name="password" minlength="8" maxlength="16" required autocomplete="off">
                                                    <i toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password"></i>
                                                    <span class="infoicos" data-toggle="tooltip" data-placement="top" title="Hint : 1 Capital, 1 Small, 1 Special Character required">
                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                    </span>
                                                    @error('password')
                                                        <div class="rederror">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group showind mb-2" style="position: relative;">
                                                    <input id="password-field3" type="password" class="form-control pr30px @error('password_confirmation') redborder @enderror"
                                                           placeholder="Confirm Password"  name="password_confirmation" minlength="8" maxlength="16" required autocomplete="off">
                                                    <i toggle="#password-field3" class="fa fa-fw fa-eye field-icon toggle-password"></i>
                                                    <span class="infoicos" data-toggle="tooltip" data-placement="top" title="Hint : 1 Capital, 1 Small, 1 Special Character required">
                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                    </span>
                                                    @error('password_confirmation')
                                                        <div class="rederror">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="Loginbtn mt-2">Update Profile</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <script>
            (function ($) {
                $('#showprofilemodal').on('click', function(){
                    $('#myProfileModal').modal({backdrop: 'static', keyboard: false});
                });

                @if(Session::has('openprofilemodal'))
                    $('#myProfileModal').modal({backdrop: 'static', keyboard: false});
                @endif

                $('#showpasswordmodal').on('click', function(){
                    $('#passwordmodal').modal({backdrop: 'static', keyboard: false});
                });

                @if(Session::has('openpasswordmodal'))
                $('#passwordmodal').modal({backdrop: 'static', keyboard: false});
                @endif

            })(jQuery);

            function imageData(url) {
                const originalUrl = url || '';
                return {
                    previewPhoto: originalUrl,
                    fileName: null,
                    emptyText: originalUrl ? 'No new file chosen' : 'No file chosen',
                    updatePreview($refs) {
                        var reader,
                            files = $refs.input.files;
                        reader = new FileReader();
                        reader.onload = (e) => {
                            this.previewPhoto = e.target.result;
                            this.fileName = files[0].name;
                        };
                        reader.readAsDataURL(files[0]);
                    },
                    clearPreview($refs) {
                        $refs.input.value = null;
                        this.previewPhoto = originalUrl;
                        this.fileName = false;
                    }
                };
            }

            function autoDetectPickup(){
                if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var lat=position.coords.latitude;
                        var lang=position.coords.longitude;
                        var geocoder = new google.maps.Geocoder();

                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: lat, lng: lang},
                            zoom: 13,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        });
                        var myLatlng = new google.maps.LatLng(lat,lang);

                        marker = new google.maps.Marker({
                            map: map,
                            position: myLatlng,
                            draggable: true,
                            icon:'{{ asset('website/images/marker.png') }}'
                        });

                        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                    console.log(results[0]);
                                    $('#searchTextField').val(results[0].formatted_address);
                                    $('#ulocationlat').val(marker.getPosition().lat());
                                    $('#ulocationlong').val(marker.getPosition().lng());
                                }
                            }
                        });

                        google.maps.event.addListener(marker, 'dragend', function() {
                            //console.log(marker.getPosition());
                            geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                    if (results[0]) {
                                        console.log(results[0]);
                                        $('#searchTextField').val(results[0].formatted_address);
                                        $('#ulocationlat').val(marker.getPosition().lat());
                                        $('#ulocationlong').val(marker.getPosition().lng());
                                    }
                                }
                            });
                        });

                    });
                }else{
                    var lat=26.9124;
                    var lang=75.7873;
                    var geocoder = new google.maps.Geocoder();

                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: lat, lng: lang},
                        zoom: 13,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });
                    var myLatlng = new google.maps.LatLng(lat,lang);

                    marker = new google.maps.Marker({
                        map: map,
                        position: myLatlng,
                        draggable: true,
                        icon:'https://seekho.i4dev.in/public/icons/marker.png'
                    });

                    google.maps.event.addListener(marker, 'dragend', function() {

                        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                    $('#searchTextField').val(results[0].formatted_address);
                                    $('#ulocationlat').val(marker.getPosition().lat());
                                    $('#ulocationlong').val(marker.getPosition().lng());
                                }
                            }
                        });
                    });

                }
            }
            $(document).ready(function (){
                var input = document.getElementById('searchTextField');
                console.log('sdfsdf');
                var autocomplete = new google.maps.places.Autocomplete(input);

                autocomplete.addListener('place_changed', function() {
                    console.log('asdasdsssas');
                    var place = autocomplete.getPlace();
                    if (!place.geometry) {
                        window.alert("No details available for input: '" + place.name + "'");
                        return;
                    }
                    var address = '';
                    if (place.address_components) {
                        address = [
                            (place.address_components[0] && place.address_components[0].short_name || ''),
                            (place.address_components[1] && place.address_components[1].short_name || ''),
                            (place.address_components[2] && place.address_components[2].short_name || '')
                        ].join(' ');

                    }
                    ;

                    var lat= place.geometry.location.lat();
                    var lng= place.geometry.location.lng();
                    $('#ulocationlat').val(lat);
                    $('#ulocationlong').val(lng);
                });
            });

        </script>
    @endauth

    <script>
        var swiper = new Swiper(".swiper-container", {
            slidesPerView: 1,
            centeredSlides: true,
            freeMode: true,
            grabCursor: true,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            breakpoints: {
                500: {
                    slidesPerView: 1
                },
                700: {
                    slidesPerView: 1
                }
            }
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCNdiZ-QFwFBld5GxQAs0XiDQF5G8NE0U&libraries=places" async></script>
    @yield('pagescripts')
    <script src="{{ asset('website/js/main.js') }}"></script>
</body>
</html>
