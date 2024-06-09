<x-app-layout>


    <div class="container mb-3">
        <div class="row">

            <div class="col-md-12">
                <div class="row db_div">


                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="recent_activities">
                            <div class="invoice p-4">
                                <h3>Activités récentes</h3>
                            </div>

                            @foreach($job_posts as $key => $job_post)


                            <div
                                class="p-2 recet_job_con d-flex justify-content-between  align-items-center flex-wrap mt-3">

                                <div class="recet_job_title_div col-md-12 d-flex justify-content-between p-3">
                                    <h5>{{ ucwords(Str::limit($job_post->job_title, 50, '...')) }}</h5>

                                    @php
                                    $checkhired = \App\Models\Hire::where('post_id', '=', $job_post->id)->first();
                                    $aplicant = \App\Models\Job_aplication::where('post_id', '=',
                                    $job_post->id)->first();
                                    @endphp
                                    <div
                                        class="col-md-4 d-flex justify-content-sm-start justify-content-md-end align-items-center">

                                        @if(!$checkhired)
                                        <a class=" recet_job_apply_btn bc"
                                            href="{{ route('show.job.application.list', ['slug' => $job_post->slug, 'id' => $job_post->id]) }}">Afficher
                                            les détails du travail <i class="fa-regular fa-circle-right"></i></a>
                                        @else
                                        <a class=" recet_job_apply_btn bc"
                                            href="{{ route('seller.job.order.details', $aplicant->id) }}">Voir l'ordre<i
                                                class="fa-regular fa-circle-right"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            @php
                            $authenticUserAppliedLists = \App\Models\Job_aplication::where('seller_id', '=',
                            \Auth::id())->get();
                            // dd($authenticUserAppliedLists->toArray());
                            @endphp

                            @foreach($authenticUserAppliedLists as $key => $authenticUserAppliedList)

                            @php
                            $checkHired = \App\Models\Hire::where('post_id', '=',
                            $authenticUserAppliedList->post->id)->first();
                            // dd($authenticUserAppliedLists->toArray());
                            @endphp

                            <div class="p-2 recet_job_con d-flex  align-items-center flex-wrap mt-3">

                                <div class="recet_job_title_div col-md-12 d-flex justify-content-between  p-3">
                                    <h5>{{ $authenticUserAppliedList->post->job_title }}</h5>


                                    <div
                                        class="col-md-5 d-flex justify-content-sm-start justify-content-md-end align-items-center">
                                        @if(!$checkHired)
                                        <a class=" recet_job_apply_btn bc"
                                            href="{{ route('job.post.details', ['slug' => $authenticUserAppliedList->post->slug, 'id' => $authenticUserAppliedList->post->id]) }}">Afficher
                                            les détails de la candidature</a>
                                        @else
                                        <a class=" recet_job_apply_btn bc"
                                            href="{{ route('seller.job.order.details', $authenticUserAppliedList->id) }}">Voir
                                            l'ordre </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>