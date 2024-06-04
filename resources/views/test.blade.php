<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>pageWebTest</title>

          <script src=https://touchpay.gutouch.net/touchpayv2/script/touchpaynr/prod_touchpay-0.0.1.js  type="text/javascript"></script>
        <script type="text/javascript">
            function calltouchpay(){
                sendPaymentInfos(new Date().getTime(),
                                 'XCPNY11168','v4GE9BuvtAA9tuDS9xZsmPLVpAZ0wZFcZFAb9OBcauTQeS3Dw4',
                                 'xcompnay.com',  'https://www.google.fr/',
                                 'https://www.msn.com/fr-fr', 100,
                                 'Abidjan', 'test1','tes2', 'test2',  'test3');
            }
        </script>

    </head>



    <body>


        <input type=button onclick='calltouchpay()' value=continuer />
    </body>
</html>

<form method="post" action="" target="TouchPay">
