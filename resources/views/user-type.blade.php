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
        <div class="row justify-content-center align-items-center otp_div ">
            <div class="col-md-5 otp_sec p-4 bg-white">
                <h3 class="mt-3 text-center text-success" style="font-weight: bold;">Choisissez votre type de compte</h3>
     <form action="{{ route('user.type.add') }}" method="post" enctype="multipart/form-data">
                        @csrf

                <div class="row">
            <div class="col-md-12">

                <div>
                    <label class="col-form-label">Type d'utilisateur</label>
                </div>
                <div>
                    <select class="form-select w-100 p-2 user_type" name="user_type" required>
                        <option  disabled selected>Sélectionnez-en un</option>
                        <option {{ old('user_type')=='Travailleurs' ?'selected':'' }}
                            value="Travailleurs">Travailleurs
                        </option>
                        <option {{ old('user_type')=='Clients' ?'selected':'' }}
                            value="Clients">Clients
                        </option>
                    </select>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="meth client_design">

                </div>
            </div>
        </div>

           <div class=" mt-3">
                   <input class="w-100 btn btn-success" type="submit" value="Soumettre">
                </div>
       </form>
            </div>
        </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         $(document).ready(function() {
            $('.user_type').on('change', function() {
                var val = $('.user_type').val();
                var html = ''; // Declare the html variable

                $('.meth').empty(); // Clear the .meth element

                if (val == 'Clientes') {
                    html = `<br>
                    <label>Type de client</label>
                    <select name='client_type' class='form-control'>
                        <option value="Entreprises">Entreprises</option>
                        <option value="Particulier">Particulier</option>
                    </select>`;
                }

                $('.meth').html(html); // Add the HTML to the .meth element
            });
        });

    </script>

</body>

</html>
