<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Afreel</title>
       <link rel="icon" type="image/x-icon" href="{{ asset('user') }}/img/WhatsApp.png">
    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Dropify css -->
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Include Slick Slider CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="{{ asset('user') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('user') }}/css/responsive.css">
</head>

<body>

    <!-- navbar section start  -->

    <section class="bg-light">
        <div class="container">
            <div class="row">
                @include('user.component.header')
            </div>
        </div>
    </section>
    <!-- navbar section end  -->
    <!-- banner section start  -->
    <section>
        {{ $slot }}
    </section>


    {{-- footer section --}}
    @include('user.component.footer')
    
    <!-- login modal start  -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">{{ Lang::get('login.modal') }}</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf                

                        <div class="mb-3 row">
                            <div>
                                <x-input-label class="col-form-label" for="loginname" :value="__('Email ou numéro de téléphone')" />
                            </div>
                            <div class="">
                                <x-text-input id="loginname" class="form-control" placeholder="Votre e-mail" type="text"
                                    name="loginname" :value="old('loginname')" required />
                            </div>
                        </div>

                        <div class="mb-3">
                            <div>
                                <x-input-label class="col-form-label" for="password" value="{{ Lang::get('login.page.password') }}" />
                            </div>

                            <div>
                                <x-text-input class="form-control password_log" placeholder="Mot de passe" id="password" type="password" name="password" />
                                 <i onclick="myFunctionlog()" id="password_log"
                                        class="fa-regular fa-eye pas-eye"></i>
                            </div>
                        </div>
                        <x-input-error class="text-danger" :messages="$errors->get('password')" class="mt-2" />

                        <div class="mb-3 row">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="flex-1">
                                    <input id="remember_me" type="checkbox"  class="checkbox-custom" name="remember">
                                    <label for="remember_me" class="checkbox-custom-label">{{ Lang::get('login.page.rememberme') }}</label>
                                </div>
                                <div class="eltio_k2">
                                    <a href="{{ route('password.request') }}" class="theme-cl">{{ Lang::get('login.page.lost.password') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="d-flex align-items-center justify-content-between">
                                <input class="w-100 btn btn-success" type="submit" value="{{ Lang::get('login.modal') }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="d-flex align-items-center justify-content-center">
                                <span>{{ Lang::get('login.page.notamembertext') }} <span><a class="fw-bold register_btn" href="{{ route('register') }}">{{ Lang::get('login.page.registertext') }}</a></span></span>
                            </div>
                        </div>
                    </form>

                <div class="social-login">
                            <a class="d-flex align-items-center justify-content-center bc btn-success mb-3 p-2"
                                href="{{ url('/login/google') }}" class="d-flex social-pd">
                                <span><i class="fa-brands fa-google"></i></span>
                                <span class="mx-3">{{ Lang::get('login.page.continuewithgoogletext') }}</span>
                            </a>
                        </div>

                </div>
            </div>
        </div>
    </div>
    <!--login modal end  -->

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Dropify jQuery -->
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <!-- Include Slick Slider JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('user') }}/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>


</body>
</html>

