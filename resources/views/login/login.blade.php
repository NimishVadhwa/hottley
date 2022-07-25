<!DOCTYPE html>
<html lang="en">

<head>
    <!------- META TAGS START ------->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <!------- META TAGS END ------->

    <!------- PROJECT TITLE ------->
    <title>Hottley Properties</title>

    <!------- ALL CSS LINKS STARTS ------->

    <!---- Website title icon ---->
    <link rel="icon" href="{{ asset('image/favicon.png') }}" type="image/x-icon">


    <!---- Google fonts ---->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Bootstrap v5.0.0-beta1 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">

    <!---- Project stylesheet ---->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <!---- Responsive css ---->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">

    <!---- Font Awesome 4.7.0 ---->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!------- ALL CSS LINKS END ------->
</head>

<!------- Body Starts ------->

<body>
    <!------- Loader Starts ------->
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>

    @if (Session::has('msg'))
        <?php $msg = Session::get('msg'); ?>
        <input type="hidden" name="msg" id="msg" value='{{ $msg }}'>
    @endif
    <!------- Loader End ------->

    <!------- Main Container Starts ------->
    <div class="main-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{asset('image/hotley-half-logo.svg')}}"
                        alt="looginpage">
                </div>
                <div class="col-xl-7 p-0">
                    <div class="login-card">
                        <form class="theme-form login-form" action="{{ url('login_data') }}" method="post">
                            @csrf
                            <h4>Login</h4>

                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group"><span class="input-group-text"><i
                                            class="far fa-envelope"></i></span>
                                    <input class="form-control" type="email" name="email" id="email" required=""
                                        placeholder="Test@gmail.com">
                                    {{-- <div class="invalid-tooltip">Please enter proper email.</div> --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group"><span class="input-group-text"><i
                                            class="fas fa-unlock-alt"></i></span>
                                    <input class="form-control" type="password" name="password" id="password"
                                        required="" placeholder="*********">
                                    {{-- <div class="invalid-tooltip">Please Enter Password.</div> --}}

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox" name="login_check" id="login_check">
                                    <label class="text-muted" for="checkbox1">Remember Password</label>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------- Main Container End ------->

    <!------- ALL JAVASCRIPT AND JS LINKS STARTS  ------->


    <!---- Jquery v3.5.1  ---->
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>

    <!---- Bootstrap js ---->
    <script src=" {{ asset('js/bootstrap/popper.min.js') }} "></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }} "></script>



    <!---- Sidebar jquery ---->
    <script src="{{ asset('js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>

    <!---- Theme js ---->
    <script src="{{ asset('js/script.js') }}"></script>

    <script src="{{ asset('js/fontawesome.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
        integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha512-OmBbzhZ6lgh87tQFDVBHtwfi6MS9raGmNvUNTjDIBb/cgv707v9OuBVpsN6tVVTLOehRFns+o14Nd0/If0lE/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script type="text/javascript">
        var msg = $('#msg').val();
        if (msg != '') {
            iziToast.error({
                message: msg,
                position: "topCenter"

            });
        }

    </script>

    <!------- ALL JAVASCRIPT AND JS LINKS STARTS  ------->
</body>
<!------- Body End ------->

</html>
