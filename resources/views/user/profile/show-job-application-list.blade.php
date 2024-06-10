<x-app-layout>


    <div class="container mt-4 mb-3">
        <div class="row">
            <div class="col-md-12">
                  <h3 class="mb-3"><span class="mx-3 bc"><i class="fas fa-users"></i></span>Candidats</h3>

                @foreach($showAppliedLists as $showAppliedList)
                <div class="row db_div recent_activities p-2">
                    <div class="p-2 recet_job_con d-flex  align-items-center flex-wrap mt-3">
                        <div class="d-flex candi_det_div col-md-6">
                                <div class="px-4">
                                    <div class="candidate_pic">
                                        <img class="img-fluid" src="{{ asset($showAppliedList->seller->photo) }}" alt="">
                                    </div>
                                </div>
                                <div class="">
                                    <div class="px-4 d-flex">
                                         <a style="color: black;"
                                    href="{{ route('candidate.profile.details', $showAppliedList->seller->id) }}">
                                             <h2 class="mb-1">{{ $showAppliedList->seller->fullname }}</h2>
                                         </a>
                                        
                                    </div>
                                      <div class="row px-4">
                                        <div class="mt-2 mb-2">
                                            <div class="d-flex justify-content-start align-items-center">
                                    <i class="fa-solid fa-location-dot p-1"></i><span>{{ $showAppliedList->seller->country.','.$showAppliedList->seller->city }}</span>
                                </div>
                                        </div>
                                     </div>
                                 </div>
                             </div>

                        <div class="col-md-6 d-flex justify-content-sm-start justify-content-md-end align-items-center">
                            <a class=" recet_job_apply_btn bc mx-2" href="{{ route('application.details', $showAppliedList->id) }}">Afficher les détails</a>
                            <a class=" recet_job_apply_btn bc mx-2" href="{{ url('message/' . $showAppliedList->seller_id) }}">Contactez moi</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


</x-app-layout>