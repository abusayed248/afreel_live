<x-guest-layout>
    <section class="bg-light pb-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center flex-column">
                    <div>
                        <span class="title_sub bc">{{Lang::get('home.page.Trending.text')}}</span>

                    </div>

                    <h1 class="title pb-2 ">Explorez plus de <spen class="bc">7840+</spen> Jobs</h1>

                    <p class="title_p ptc">Votre avenir commence ici, découvrez des opportunités sans limites avec notre large éventail de catégories</p>
                </div>
                <div class="col-md-6 text-end">
                    <div class="slider-banar">
                        <img class="img-fluid" src="{{ asset('user') }}/img/bn-3.png" alt="">
                        <img class="img-fluid" src="{{ asset('user') }}/img/view.png" alt="">
                        <img class="img-fluid" src="{{ asset('user') }}/img/laptop_23.png" alt="">
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="bg-white pb-5 pt-3">
        <div class="container">
            <div class="row justify-content-between active_job">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <div class="active_job_div mt-3">
                        <div class="active_job_icon">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <div class="active_job_con">
                            <h4 class="pb-2 fw-bold">{{Lang::get('home.page.emploi.text')}}</h4>
                            <p class="ptc">Des opportunités de carrière en constante évolution prêtes à être saisies
</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <div class="active_job_div mt-3">
                        <div class="active_job_icon">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div class="active_job_con">
                            <h4 class="pb-2 fw-bold">{{Lang::get('home.page.Employeurs.text')}}</h4>
                            <p class="ptc"> Collaborez avec des employeurs visionnaires qui transforment <br>l’industrie
</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <div class="active_job_div mt-3">
                        <div class="active_job_icon">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div class="active_job_con">
                            <h4 class="pb-2 fw-bold">{{Lang::get('home.page.inscrits.text')}}</h4>
                            <p class="ptc">Rejoignez une communauté dynamique de professionnels ambitieux</p>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="bg-light mt-5 pb-5 pt-3">
        <div class="container">
            <div class="text-center">

                <p class="ptc">Emplois récents</p>
                <h1>Emplois <span class="bc">Récents</span> répertoriés actif</h1>
            </div>
            <div class="row mt-3">

                @foreach($latestPosts as $latestPost)
                <div class="col-md-6">
                    <div class="p-2 recet_job_con d-flex justify-content-between  align-items-center flex-wrap mt-3">
                        <div class="recet_job_title_div col-md-7">
                            <h5 class="p-1">{{ ucwords(Str::limit($latestPost->job_title, 35, '...')) }}</h5>
                            <div class="d-flex justify-content-start align-items-center">
                                 @if( !empty($latestPost->user->country) && !empty($latestPost->user->city))
                                    <i class="fa-solid fa-location-dot p-1"></i>
                                    <span>
                                       {{ ucwords(Str::limit( $latestPost->user->country.','.$latestPost->user->city, 25, '...')) }}
                                    </span>
                                  @endif
                            </div>

                            <div class="d-flex">
                                <div class="d-flex justify-content-start align-items-center job_status p-2">
                                    <i class="fa-solid fa-suitcase p-1"></i>
                                    <span>
                                        {{ ucwords(implode(' ',preg_split('/(?=[A-Z])/', $latestPost->job_type))) }}
                                    </span>
                                </div>

                                @if($latestPost->when_needed == 'urgent')
                                <div class="d-flex justify-content-start align-items-center job_price p-2">
                                    <i class="fa-regular fa-star"></i><span>Urgent</span>
                                </div>
                                @endif

                                <div class="d-flex justify-content-start align-items-center job_urgent p-2">
                                    <i class="fa-solid fa-franc-sign"></i>
                                    <span class="p-1">{{ $latestPost->amount }}</span>

                                </div>
                            </div>
                            <div class="col-md-12 d-flex flex-wrap mt-2">
                                @php
                                $skills = $latestPost->skill; // This is already an array
                                @endphp

                                @if ($skills)
                                @foreach($skills as $skill)
                                <div class="tag_btn">{{ $skill }}</div>
                                @endforeach
                                @endif

                            </div>
                        </div>
                        <div class="col-md-5 ap-btn">
                            <a class=" recet_job_apply_btn bc"
                                href="{{ route('job.post.details', ['slug' => $latestPost->slug, 'id' => $latestPost->id]) }}">Postuler
                                à un emploi <i class="fa-regular fa-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="text-center pt-3 pb-5">
            <a href="{{ route('find.job') }}" class="btn btn-success px-5">Voir plus</a>
        </div>
    </section>

    <section class="bg-white pb-5 pt-3">
        <div class="container">
            <div class="text-center">
                <p class="ptc">{{Lang::get('home.page.Catégories.text')}}</p>
                <h1>Parcourir les <span class="bc">catégories</span> populaires </h1>
            </div>
            <div class="row mt-3 flex-wrap">

                <div class="center">
                    {{-- {{ dd($jobCats->toArray()) }} --}}
                    @foreach($jobCats as $popularCategory)
                    <div class="col-md-2 p-2">
                        <div class="recet_job_con p-2">
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <div class="h_cat_ion">
                                    <i class="fa-solid fa-user-tie"></i>
                                </div>
                                <h6 class="fw-bold mt-2 mb-2">{{ $popularCategory->job_category }}</h6>
                                <p>{{ $popularCategory->count }} Emplois</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white pb-5 pt-3">
        <div class="container">
            <div class="text-center">
                <p class="ptc">{{Lang::get('home.page.Meilleurs.text')}}</p>
                <h1>Embaucher les <span class="bc">meilleurs</span>  candidats </h1>
            </div>
            <div class="row mt-3 flex-wrap">

                @foreach($hireTopCandidates as $hireTopCandidate)
                <div class="col-md-4 p-2">
                    <div class="recet_job_con p-2">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <div class="candidates_logo col-md-2">
                                <img class="img-fluid" src="{{ asset($hireTopCandidate->photo) }}" alt="">
                            </div>
                            <h6 class="fw-bold mt-2 mb-2">{{ $hireTopCandidate->fullname }}</h6>
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-location-dot p-2"></i><span>{{
                                    $hireTopCandidate->country.','.$hireTopCandidate->city }}</span>
                            </div>

                            <div class="m-3">
                                <a class="popular_apply_btn d-flex justify-content-center"
                                    href="{{ route('candidate.profile.details', $hireTopCandidate->id) }}">Voir le
                                    candidat<i class="fa-regular fa-circle-right m-1"></i></a>
                            </div>

                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
        <div class="text-center pt-3 pb-5">
            <a href="{{ route('all.candidates') }}" class="btn btn-success px-5">Voir plus</a>
        </div>
    </section>
</x-guest-layout>
