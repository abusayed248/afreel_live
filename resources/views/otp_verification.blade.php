<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Afreel</title>


    <!-- Dropify css -->
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <!-- selectize CSS -->

    <!-- Include Slick Slider CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="{{ asset('user') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('user') }}/css/responsive.css">

    <style>
        .otp_div {
            height: 100vh;
        }

        .otp_sec {
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
        }

        .post_btn {
            background-color: #10c558;
        }

        .post_btn:hover {
            background-color: #15804e;
        }
    </style>

</head>

<body class="bbg">

    <div class="container">
        <div class="row justify-content-center align-items-center otp_div">
            <div class="col-md-5 otp_sec bg-white p-4">
                <h3 class="mt-3 text-center text-warning" style="font-weight: bold;">Vérification de l'E-mail</h3>

                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                @if(session()->has('invalid'))
                <div class="alert alert-success">
                    {{ session()->get('invalid') }}
                </div>
                @endif
                <br />
                @if(session()->has('incorrect'))
                <div class="alert alert-success">
                    {{ session()->get('incorrect') }}
                </div>
                @endif
                <!-- Modal -->
                <form action="{{ route('verifyotp')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Entrez OTP</label>
                        <input type="hidden" name="user" value="{{ $user->id }}" class="form-control" placeholder="Entrez OTP">
                        <input type="number" name="token" class="form-control" placeholder="Entrez OTP">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 w-100 post_btn">Soumettre</button>
                    <a href="{{ route('resend-otp', $user->id) }}" class="btn btn-primary mt-3 w-100 post_btn">Vous n’avez pas reçu? Renvoyer</a>
                </form>
            </div>
        </div>
    </div>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Dropify jQuery -->
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>


    <!-- Selectize JS -->

    <!-- Include Slick Slider JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('user') }}/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>


    @stack('script')

</body>

</html>
