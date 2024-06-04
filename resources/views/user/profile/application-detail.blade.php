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
                                <div class="">
                                    <div class="px-4 d-flex">
                                        <a style="color: black;"
                                    href="{{ route('candidate.profile.details', $applicationDetails->seller->id) }}">
                                            <h2 class="mb-1">{{ $applicationDetails->seller->fullname }}</h2>
                                        </a>
                                       
                                        <div>{{ $applicationDetails->seller->job_title }}</div>
                                    </div>

                                    <div class="row px-4">
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
                                <a id="hireButton" class="recet_job_apply_btn bc" href="#">Engagez moi</a>
                                @else
                                <span class="recet_job_apply_btn bc mx-2"><i class="fas fa-clipboard-check"></i>
                                    Déjà embauché !</span>
                                @endif
                                <a class=" recet_job_apply_btn bc mx-2"
                                    href="{{ url('message/'.$applicationDetails->seller_id) }}">Contactez moi</a>
                            </div>


                        </div>


                        <!-- <div class="col-md-2">
                            <div class="candidate_pic">
                                <img class="img-fluid job_deta_com_icon" src="{{ asset($applicationDetails->seller->photo) }}" alt="">
                            </div>
                        </div> -->
                        <div class="col-md-10 d-flex justify-content-between align-items-center">
                            <!-- <div>
                                <h2 class="mb-3">{{ $applicationDetails->seller->fullname }}</h2>
                                <div class="d-flex">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <i class="fa-solid fa-location-dot p-1"></i><span>{{ $applicationDetails->seller->country.','.$applicationDetails->seller->city }}</span>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center job_status p-2">
                                        <i class="fa-solid fa-suitcase p-1"></i><span>{{ $applicationDetails->seller->job_title }}</span>
                                    </div>
                                </div>

                            </div> -->


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
    <script src="{{ asset('user') }}//flipdown/countdown.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src=https://touchpay.gutouch.net/touchpayv2/script/touchpaynr/prod_touchpay-0.0.1.js type="text/javascript"></script>
        <script>
            document.getElementById('hireButton').addEventListener('click', function(e) {
                e.preventDefault();
                let url = '{{ route("hire.person", $applicationDetails->id) }}';

                // Perform the AJAX request to submit the hire
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Call the payment function
                        calltouchpay();
                    },
                    error: function(xhr) {
                        console.error("There was an error with the hiring process.");
                    }
                });
            });

            function calltouchpay() {
                var email = {!! json_encode($email) !!};
                var id = {!! json_encode($applicationDetails->id) !!};
                var first = {!! json_encode($first) !!};
                var last = {!! json_encode($last) !!};
                var phone = {!! json_encode($phone) !!};
                var amount = {!! json_encode($applicationDetails->seller_amount) !!};

                sendPaymentInfos(new Date().getTime(),
                    'XCPNY11168', 'v4GE9BuvtAA9tuDS9xZsmPLVpAZ0wZFcZFAb9OBcauTQeS3Dw4',
                    'xcompnay.com', 'http://127.0.0.1:8000/seller/job-order-complete' + id,
                    'http://127.0.0.1:8000/test-fail' + id, amount,
                    'Abidjan', email, first, last, phone);
            }
        </script>
</x-app-layout>