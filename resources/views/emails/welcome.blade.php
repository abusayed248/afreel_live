<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Email Verification with OTP</title>
</head>

<body>
    <div style="margin: auto;">
        <div style="width: 500px; text-align: center; border: black 1px solid;">
            <div style="background-color: #EDEADE;padding: 5px 5px;">
                <a href="https://afreel.com/"><img style="max-width: 300px;" src="https://afreel.com/user/img/logo.png" alt=""></a>
                <p>Connecter l’Afrique pour libérer le talent</p>
            </div>
            <h1>Hi <span>{{ $get_user_name}}</span></h1>
            <h2>-Merci d’être avec nous!</h2>
            <h2>Vérifier votre email</h2>
            <div>
                <span style="background: red; color: white; padding: 15px 10px; font-size: 30px; border-radius: 5px;">{{
                    $validToken}}</span>
            </div>
            <div style="margin-top: 20px;">
                <a href="https://afreel.com/">aller sur le site</a>
            </div>
            <div style="background-color: #172228; padding: 5px 5px; color: white;">
                <p style="padding: 10px;">À propos de la société</p>
                <p style="padding: 10px;">XCompany Côte d’Ivoire, entreprise de création de solutions web et de mise en
                    place de
                    systèmes démotiques et
                    électroniques de maisons connectés et d’installations de dispositifs électroniques</p>
            </div>
        </div>
    </div>
</body>

</html>