<x-app-layout>


    <div class="container mb-3">
        <div class="row">

            <div class="col-md-12">

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="recent_activities">
                            <div class="invoice p-4">
                                <h3>Travaux terminés</h3>
                            </div>

                            @if(!empty($completeJobs) && count($completeJobs) > 0)

                            @foreach($completeJobs as $key => $completeJob)


                            <div
                                class="p-2 recet_job_con d-flex justify-content-between  align-items-center flex-wrap mt-3">

                                <div class="recet_job_title_div col-md-12 d-flex justify-content-between p-3">
                                    <div class="col-md-4 d-flex justify-content-sm-start  align-items-center">
                                        <h5>{{ $completeJob->job_title }}</h5>
                                    </div>
                                    <div class="col-md-4 d-flex justify-content-sm-start align-items-center">
                                        <h6><span class="mx-1"><i class="fa-solid fa-franc-sign"></i></span>{{ $completeJob->amount }}</h6>
                                    </div>
                                    <div class="col-md-4 d-flex justify-content-sm-start  align-items-center">
                                        <h5>
                                            <a class="bc" href="{{ route('candidate.profile.details', $completeJob->seller->id) }}"> {{ $completeJob->seller->fullname }} </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>