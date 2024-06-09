<x-app-layout>
    <div class="container mb-3">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="recent_activities px-5 py-3">
                    <div class="row">
                        <div class="candi_det_div d-flex  align-items-center">
                            <div class="col-md-6 d-flex">
                                <div class="px-4">
                                    <div class="candidate_pic">
                                        <img class="img-fluid" src="{{ asset($applicationDetails->seller->photo) }}"
                                            alt="">
                                    </div>
                                </div>
                                <div >
                                    <div class="px-2">
                                        <a style="color: black;"
                                    href="{{ route('candidate.profile.details', $applicationDetails->seller->id) }}">
                                            <h2 class="mb-1">{{ $applicationDetails->seller->fullname }}</h2>
                                        </a>
                                     </div>

                                    <div class="row px-4">
                                         <div>
                                            <i class="fa-solid fa-briefcase"></i>
                                            {{ $applicationDetails->seller->job_title }}
                                        </div>
                                        <div class="mt-2 mb-2">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <samp class="bc">{{
                                                $applicationDetails->seller->country.",".$applicationDetails->seller->city
                                                }}</samp>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 d-flex justify-content-sm-start justify-content-md-end">
                                @php
                                $checkhired = \App\Models\Hire::where('aplicant_id', '=',
                                $applicationDetails->id)->first();
                                @endphp

                                @if(!$checkhired)
                                <a onclick="calltouchpay()" class="recet_job_apply_btn bc" href="#">Engagez moi</a>
                                @else
                                <span class="recet_job_apply_btn bc mx-2"><i class="fas fa-clipboard-check"></i>
                                    Déjà embauché !</span>
                                @endif
                                <a class=" recet_job_apply_btn bc mx-2"
                                    href="{{ url('message/'.$applicationDetails->seller_id) }}">Contactez moi</a>
                            </div>
                        </div>

                        <div class="col-md-12 mt-4 p-2">
                            <h6 class="mb-3 fw-bold">Lettre de motivation</h6>
                            <p>{!! $applicationDetails->cover_letter !!}</p>
                            <h6 class="mt-3 fw-bold">Exigence</h6>
                            <div class="d-flex mt-2">
                                <div class="col-md-4 px-3 ">Montant requis</div>
                                <div class="col-md-8 px-3">${{ $applicationDetails->seller_amount }} </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="col-md-4 px-3 ">Temps requis</div>
                                <div class="col-md-8 px-3 ">{{ $applicationDetails->seller_deadline }}</div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="col-md-4 px-3 ">Déposer</div>
                                <div class="col-md-8 px-3 ">
                                    @if($applicationDetails->file)
                                    <a href="{{ route('download.applicant.file', $applicationDetails->id) }}"
                                        class="bc">Télécharger un fichier</a>
                                    @endif
                                </div>
                            </div>
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
   <script src=https://touchpay.gutouch.net/touchpayv2/script/touchpaynr/prod_touchpay-0.0.1.js type="text/javascript"></script>
    <script>

        function calltouchpay() {
            var email = {!! json_encode($email) !!};
            var id = {!! json_encode($applicationDetails->id) !!};
            var first = {!! json_encode($first) !!};
            var last = {!! json_encode($last) !!};
            var phone = {!! json_encode($phone) !!};
            var amount = {!! json_encode($applicationDetails->seller_amount) !!};
            var s_url = '{{ route("hire.person", $applicationDetails->id) }}';
            var f_url = '{{ route("application.details", $applicationDetails->id) }}';

            sendPaymentInfos(new Date().getTime(),
                'XCPNY11168', 'v4GE9BuvtAA9tuDS9xZsmPLVpAZ0wZFcZFAb9OBcauTQeS3Dw4',
                'xcompnay.com', s_url,
                f_url, amount,
                'Abidjan', email, first, last, phone);
        }
    </script>


</x-app-layout>
