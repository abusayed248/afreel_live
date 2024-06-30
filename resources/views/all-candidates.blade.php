<x-guest-layout>
    <div class="mb-3">
        <form action="{{ route('all.candidates') }}" method="GET">
            <div class="row justify-content-center text-center pt-5 pb-5 find_banner">
                <h1 class="find_banner_title">Les métiers les plus passionnants</h1>
                <div class="col-md-8">
                    <div class="row mt-3 find_banner_form_div ">
                        <div class="d-flex justify-content-center align-items-lg-center col-md-8">
                            <i class="fa-solid fa-magnifying-glass find_banner_form_icon"></i>
                            <input name="keyword" class="form-control me-2" type="search"
                                value="{{ request('keyword') }}" placeholder="Titre du poste, mot clé ou entreprise">
                        </div>

                        <div class="d-flex justify-content-end align-items-lg-center col-md-4">
                            <button class="btn btn-outline-success" onclick="click()">Trouver un emploi</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-3">

                    <div class="col-md-12">

                        @if(!empty($candidates) && $candidates->count())

                        <section class="bg-white pb-5 pt-3">
                            <div class="container">
                                <div class="text-center">
                                    <h1>Tous les<span class="bc"> candidats</span></h1>
                                </div>
                                <div class="row mt-3 flex-wrap">

                                    @foreach($candidates as $candidate)
                                    <div class="col-md-3 p-2">
                                        <div class="recet_job_con p-2">
                                            <div class="d-flex justify-content-center align-items-center flex-column">
                                                <div class="candidates_logo col-md-2">
                                                    <img class="img-fluid" src="{{ asset($candidate->photo) }}" alt="">
                                                </div>
                                                <h6 class="fw-bold mt-2 mb-2">{{ $candidate->fullname }}</h6>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <i class="fa-solid fa-briefcase p-2"></i>
                                                    <span>{{ $candidate->job_title }}</span>
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center">
                                                  @if( !empty($candidate->country) && !empty($candidate->city))
                                    <i class="fa-solid fa-location-dot p-1"></i>
                                    <span>
                                       {{ ucwords(Str::limit( $candidate->country.','.$candidate->city, 20, '...')) }}
                                    </span>
                                  @endif
                                                </div>

                                                <div class="m-3">
                                                    <a class="popular_apply_btn d-flex justify-content-center"
                                                        href="{{ route('candidate.profile.details', $candidate->id) }}">Voir le candidat<i class="fa-regular fa-circle-right m-1"></i></a>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                        @endif

                        <div class="row mt-3">
                            <div class="col-xl-12">
                                {!! $candidates->appends(Request::all())->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-guest-layout>
