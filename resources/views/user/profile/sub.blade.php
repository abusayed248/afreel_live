<x-app-layout>


    <div class="container ">
        <div class="row">

           <div class="col-md-12">
                <div class="row db_div">
                    <div class="col-md-6">
                        <div class="basic_div1 text-center ">
                            <h4 class=""> Prix ​​de base : 3000 </h4>
                            <h6>Par mois 11 emplois Postuler</h6>
                                <div class="btm btn-success w-100 p-3 mt-3" href="#" onclick='calltouchpay()'>S'abonner</div>
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="basic_div2 text-center ">
                            <h4 class="">  Prix ​​premium : 5 000</h4>
                              <h6>Par mois, emploi illimité Postuler</h6>
                                <div class="btm btn-success w-100 p-3 mt-3" href="#" onclick='calltouchpay2()'>S'abonner</div>
                          </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>

    @php
        $email = Auth::user()->email;
        $first = Auth::user()->name;
        $last = Auth::user()->fullname;
        $phone = Auth::user()->phone;
    @endphp


    <script src=https://touchpay.gutouch.net/touchpayv2/script/touchpaynr/prod_touchpay-0.0.1.js  type="text/javascript"></script>
          <script type="text/javascript">
            function calltouchpay(){

                var email = {!! json_encode($email) !!};
                var first = {!! json_encode($first) !!};
                var last = {!! json_encode($last) !!};
                var phone = {!! json_encode($phone) !!};



                sendPaymentInfos(new Date().getTime(),
                                 'XCPNY11168','v4GE9BuvtAA9tuDS9xZsmPLVpAZ0wZFcZFAb9OBcauTQeS3Dw4',
                                 'xcompnay.com',  {!! json_encode(url('test-success')) !!},
            {!! json_encode(url('test-fail')) !!}, 3000,
                                 'Abidjan',email,first,last,phone);
            }
        </script>

<script type="text/javascript">
    function calltouchpay2(){

        var email = {!! json_encode($email) !!};
        var first = {!! json_encode($first) !!};
        var last = {!! json_encode($last) !!};
        var phone = {!! json_encode($phone) !!};


        sendPaymentInfos(new Date().getTime(),
                         'XCPNY11168','v4GE9BuvtAA9tuDS9xZsmPLVpAZ0wZFcZFAb9OBcauTQeS3Dw4',
                         'xcompnay.com',  {!! json_encode(url('test-success')) !!},
            {!! json_encode(url('test-fail')) !!}, 5000,
                         'Abidjan', email, first, last,  phone);
    }
</script>


</x-app-layout>