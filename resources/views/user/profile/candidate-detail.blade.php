<x-guest-layout>



    <div class="container mb-3">


        <div class="row mt-5">
            <div class="col-md-12">
                <div class="recent_activities p-4">
                    <div class="row justify-content-between">

                        <div class="col-md-5">
                            <div class="d-flex candi_det_div">
                                <div class="px-4">
                                    <div class="candidate_pic" onmousemove="hiIcon()" onmouseout="viIcon()">
                                        <img class="img-fluid" src="{{asset($user->photo)}}" alt="">

                                    </div>
                                    @if(Request::url() === route('candidate.detail'))
                                    <div class="up_date_div">
                                        <i class="fa-solid fa-circle-plus in_fo_add "
                                            onclick="document.getElementById('getFile').click()"> </i>
                                        <form method="post" action="{{ route('user.update.info') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input id="getFile" style="display:none" type="file"
                                                onchange="form.submit()" name="photo" />
                                            <input type="hidden" name="old_photo" value="{{$user->photo}}" />
                                            <input type="hidden" name="fullname" value="{{$user->fullname}}" />
                                        </form>
                                    </div>
                                    @else

                                    @endif
                                </div>


                                <div class="">
                                    <div class="px-4">
                                        <h2 class="mb-1">{{ $user->fullname }}</h2>
                                    </div>

                                    <div class="row px-4">
                                        <div class="mt-2 mb-2">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <samp class="bc">{{ $user->country.",".$user->city }}</samp>
                                        </div>
                                         @if (!empty($user->user_type))
                                            @if ($user->user_type == "Travailleurs")
                                                        <div class="mt-2 mb-2 px-2">
                                                        <i class="fa-solid fa-business-time"></i>
                                                        <span class="bc">
                                                            {{ $user->job_title}}
                                                        </span>
                                                    </div>
                                            @endif
                                 @endif

                                    </div>

                                </div>


                            </div>
                        </div>
                        @if(Request::url() === route('candidate.detail'))

                        @if (!empty($user->user_type))
                                @if ($user->user_type == "Travailleurs")
                                <a class="applied_job2 w-100 h-100" href="{{ route('user.sub') }}">
                                <div class=" pt-3 pb-3">


                                    <div class="d-flex justify-content-end flex-column text-center">
                                        @php

                                        // Get the user's created date
                                        $createdDate = Auth::user()->created_at;

                                        // Parse the created date
                                        $start = \Carbon\Carbon::parse($createdDate);

                                        // Calculate the end date by adding 30 days to the start date
                                        $endDate = $start->copy()->addDays(30);

                                        // Calculate the remaining days from today to the end date
                                        $remainingDays = \Carbon\Carbon::now()->diffInDays($endDate, false);
                                        @endphp

                                        @if (Auth::user()->sub_id == null)
                                        <span>Essai ({{ $remainingDays }} jours restants!)</span>
                                        @elseif(Auth::user()->sub_id == 1)
                                        <span>Basic</span>
                                        @elseif(Auth::user()->sub_id == 2)
                                        <span>Prime</span>
                                        @endif

                                        <p>abonnement</p>
                                        <i class="fa-regular fa-bell app_icon"></i>

                                    </div>



                                </div>
                            </a>
                                 @endif
                                 @endif
                        <div class="col-md-3 d-flex justify-content-end align-items-center">

                        </div>
                        @endif

                        <div class="col-md-4 d-flex justify-content-sm-start justify-content-md-end align-items-center">
                            <div class=" d-flex justify-content-center align-items-center w-100 text-center mt-2">
                                <a class="w-100 recet_job_apply_btn bc" href="{{ url('message/'.$user->id) }}">Contactez
                                    moi</a>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 mt-4 p-2">
                        <div class="mt-5">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-3 fw-bold">À propos du candidat</h6>

                                @if(Request::url() === route('candidate.detail'))
                                <i class="fa-solid fa-circle-plus in_fo_add" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop1"></i>
                                @else

                                @endif
                            </div>
                            <div class="exslio-list mt-3">
                                <ul>
                                    <li>
                                        <div class="esclio-110 bg-light rounded px-3 py-3">
                                            <div class="esclio-110-decs full-width">
                                                <p class="text-justify">{{ $user->about_info }}</p>
                                            </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                               @if (!empty($user->user_type))
                                @if ($user->user_type == "Travailleurs")
                                <div class="mt-5">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-3 fw-bold">Qualification</h6>
                                @if(Request::url() === route('candidate.detail'))
                                <i class="fa-solid fa-circle-plus in_fo_add" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop2"></i>

                                @else

                                @endif

                            </div>
                            <div class="mt-5">
                                <div class="exslio-list mt-3">
                                    <ul>
                                        <li>
                                            <div class="esclio-110 bg-light rounded px-3 py-3">
                                                <h4 class="mb-0 ft-medium fs-md">Collège</h4>
                                                <div class="esclio-110-info full-width mb-2">
                                                    <span class="text-muted me-2">
                                                        <i class="fa-solid fa-graduation-cap"></i>
                                                        {{ $user->inter }}
                                                    </span>
                                                    <span class="text-muted me-2">
                                                        <i class="fa-regular fa-calendar-days"></i>
                                                        {{ $user->inter_passing_year }}
                                                    </span>
                                                </div>

                                            </div>
                                        </li>

                                        <li>
                                            <div class="esclio-110 bg-light rounded px-3 py-3">
                                                <h4 class="mb-0 ft-medium fs-md">Université</h4>
                                                <div class="esclio-110-info full-width mb-2">
                                                    <span class="text-muted me-2">
                                                        <i class="fa-solid fa-graduation-cap"></i>
                                                        {{ $user->graduation }}
                                                    </span>
                                                    <span class="text-muted me-2">
                                                        <i class="fa-regular fa-calendar-days"></i>
                                                        {{ $user->graduation_passing_year }}
                                                    </span>
                                                </div>

                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <div class="mt-5">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-3 fw-bold">Expérience</h6>
                                    @if(Request::url() === route('candidate.detail'))
                                    <i class="fa-solid fa-circle-plus in_fo_add" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop3"></i>
                                    @else
                                    @endif

                                </div>
                                <div>
                                    <div class="exslio-list mt-3">
                                        <ul>
                                            <li>
                                                <div class="esclio-110 bg-light rounded px-3 py-3">
                                                    <h4 class="mb-0 ft-medium fs-md">{{ $user->company_name }}</h4>

                                                    <div class="esclio-110-info full-width mb-2">
                                                        <span class="text-muted me-2">
                                                            {{ $user->about_company }}
                                                        </span>
                                                    </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>


                            <div class="mt-5">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-3 fw-bold">Compétences fondamentales</h6>
                                    @if(Request::url() === route('candidate.detail'))
                                    <i class="fa-solid fa-circle-plus in_fo_add" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop4"></i>

                                    @else

                                    @endif

                                </div>
                                <div class="exslio-list mt-3">

                                    <ul>
                                        <li>
                                            <div class="esclio-110 bg-light rounded px-3 py-3">
                                                <div class="esclio-110-decs full-width">
                                                    @isset($user->tag)
                                                    @foreach($user->tag as $tag)
                                                    @php
                                                    $values = explode(' ', $tag);
                                                    @endphp

                                                    @foreach($values as $value)
                                                    <span class="tag_btn">{{ ucfirst($value) }}</span>
                                                    @endforeach
                                                    @endforeach
                                                    @endisset

                                                </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-5">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-3 fw-bold">Portofolio</h6>
                                    @if(Request::url() === route('candidate.detail'))
                                    <i class="fa-solid fa-circle-plus in_fo_add" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop5"></i>
                                    @else
                                    @endif

                                </div>
                                <div class="exslio-list mt-3">

                                    <ul>
                                        <li class="d-flex flex-wrap justify-content-between w-100">

                                            <div
                                                class="col-md-6 col-sm-12 p-3 recent_activities d-flex justify-content-center align-items-center">
                                                <img class="img-fluid porft_div "
                                                    src="{{asset($user->protfolio_photo)}}" alt="Téléchargez une photo">
                                            </div>
                                            <div
                                                class="col-md-6 col-sm-12 p-3 recent_activities d-flex justify-content-center align-items-center">
                                                <video class="porft_div" controls
                                                    src="{{asset($user->protfolio_video)}}"></video>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                                @endif
                                @endif


                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--About Name of candidate Modal -->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">À propos Nom du candidat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('user.update.info') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                         @if (!empty($user->user_type))
                                @if ($user->user_type == "Travailleurs")
   <div class="mb-3 row">
                            <div>
                                <label class="col-form-label">Catégorie d'emploi</label>
                            </div>
                            <div>
                                <select class="form-select w-100 p-2" name="job_title">
                                    <option selected disabled selected>Sélectionnez-en un</option>
                                    <option {{ old('job_title')=='Développement Web et Logiciel' ?'selected':'' }}
                                        value="Développement Web et Logiciel">Développement Web et Logiciel
                                    </option>
                                    <option {{ old('job_title')=='Design et Création' ?'selected':'' }}
                                        value="Design et Création">Design et
                                        Création
                                    </option>
                                    <option {{ old('job_title')=='Rédaction et Traduction' ?'selected':'' }}
                                        value="Rédaction et Traduction">
                                        Rédaction et Traduction</option>
                                    <option {{ old('job_title')=='Marketing et Vente' ?'selected':'' }}
                                        value="Marketing et Vente">Marketing et
                                        Vente
                                    </option>
                                    <option {{ old('job_title')=='Support Administratif' ?'selected':'' }}
                                        value="Support Administratif">Support
                                        Administratif</option>
                                    <option {{ old('job_title')=='Services Clients' ?'selected':'' }}
                                        value="Services Clients">Services Clients
                                    </option>
                                    <option {{ old('job_title')=='Formation et Coaching' ?'selected':'' }}
                                        value="Formation et Coaching">
                                        Formation et
                                        Coaching</option>
                                    <option {{ old('job_title')=='Services Techniques' ?'selected':'' }}
                                        value="Services Techniques">Services
                                        Techniques</option>
                                    <option {{ old('job_title')=='Photographie et Vidéographie' ?'selected':'' }}
                                        value="Photographie et Vidéographie">Photographie et Vidéographie</option>
                                    <option {{ old('job_title')=='Santé et Bien-être' ?'selected':'' }}
                                        value="Santé et Bien-être">Santé et
                                        Bien-être
                                    </option>
                                    <option {{ old('job_title')=='Art et Divertissement' ?'selected':'' }}
                                        value="Art et Divertissement">Art et
                                        Divertissement</option>
                                    <option {{ old('job_title')=='Éducation et Tutorat' ?'selected':'' }}
                                        value="Éducation et Tutorat">Éducation
                                        et
                                        Tutorat</option>
                                    <option {{ old('job_title')=='Construction et Rénovation' ?'selected':'' }}
                                        value="Construction et Rénovation">
                                        Construction et Rénovation</option>
                                    <option {{ old('job_title')=='Logistique et Transport' ?'selected':'' }}
                                        value="Logistique et Transport">
                                        Logistique et Transport</option>
                                    <option {{ old('job_title')=='Finance et Comptabilité' ?'selected':'' }}
                                        value="Finance et Comptabilité">
                                        Finance
                                        et Comptabilité</option>
                                    <option {{ old('job_title')=='Conseil et Stratégie' ?'selected':'' }}
                                        value="Conseil et Stratégie">Conseil
                                        et
                                        Stratégie</option>
                                    <option {{ old('job_title')=='Plomberie et Électricité' ?'selected':'' }}
                                        value="Plomberie et Électricité">
                                        Plomberie et Électricité</option>
                                    <option {{ old('job_title')=='Jardinage et Paysagisme' ?'selected':'' }}
                                        value="Jardinage et Paysagisme">
                                        Jardinage et Paysagisme</option>
                                    <option {{ old('job_title')=='Nettoyage et Entretien' ?'selected':'' }}
                                        value="Nettoyage et Entretien">
                                        Nettoyage
                                        et Entretien</option>
                                    <option {{ old('job_title')=='Sécurité et Surveillance' ?'selected':'' }}
                                        value="Sécurité et Surveillance">
                                        Sécurité et Surveillance</option>
                                    <option {{ old('job_title')=='Cuisine et Restauration' ?'selected':'' }}
                                        value="Cuisine et Restauration">
                                        Cuisine
                                        et Restauration</option>
                                    <option {{ old('job_title')=='Coiffure et Esthétique' ?'selected':'' }}
                                        value="Coiffure et Esthétique">
                                        Coiffure
                                        et Esthétique</option>
                                    <option {{ old('job_title')=='Maintenance et Réparation dÉquipements' ?'selected':''
                                        }} value="Maintenance et Réparation d'Équipements">
                                        Maintenance et
                                        Réparation d'Équipements</option>
                                    <option {{ old('job_title')=='Evénementiel et Animation' ?'selected':'' }}
                                        value="Evénementiel et Animation">
                                        Evénementiel et Animation</option>
                                    <option {{ old('job_title')=='Bricolage et Petits Travaux' ?'selected':'' }}
                                        value="Bricolage et Petits Travaux">
                                        Bricolage et Petits Travaux</option>
                                    <option {{ old('job_title')=="Baby-sitting et Garde d'Enfants" ?'selected':'' }}
                                        value="Baby-sitting et Garde d'Enfants">Baby-sitting et Garde d'Enfants
                                    </option>
                                    <option {{ old('job_title')=='Services aux Animaux' ?'selected':'' }}
                                        value="Services aux Animaux">Services
                                        aux
                                        Animaux</option>
                                    <option {{ old('job_title')=='Enseignement et Formation' ?'selected':'' }}
                                        value="Enseignement et Formation">
                                        Enseignement et Formation</option>
                                    <option {{ old('job_title')=='Développement Personnel' ?'selected':'' }}
                                        value="Développement Personnel">
                                        Développement Personnel</option>
                                    <option {{ old('job_title')=='Rédaction de CV et Lettres de Motivation'
                                        ?'selected':'' }} value="Rédaction de CV et Lettres de Motivation">Rédaction
                                        de
                                        CV et Lettres de Motivation</option>
                                    <option {{ old('job_title')=='Graphisme et Illustration' ?'selected':'' }}
                                        value="Graphisme et Illustration">
                                        Graphisme et Illustration</option>
                                    <option {{ old('job_title')=='Développement Mobile' ?'selected':'' }}
                                        value="Développement Mobile">
                                        Développement
                                        Mobile</option>
                                    <option {{ old('job_title')=='E-commerce et Dropshipping' ?'selected':'' }}
                                        value="E-commerce et Dropshipping">
                                        E-commerce et Dropshipping</option>
                                    <option {{ old('job_title')=='Réparation de Véhicules' ?'selected':'' }}
                                        value="Réparation de Véhicules">
                                        Réparation de Véhicules</option>
                                    <option {{ old('job_title')=='Bien-être et Spa' ?'selected':'' }}
                                        value="Bien-être et Spa">Bien-être et Spa
                                    </option>
                                    <option {{ old('job_title')=='Accompagnement et Services aux Personnes Âgées'
                                        ?'selected':'' }} value="Accompagnement et Services aux Personnes Âgées">
                                        Accompagnement et Services aux Personnes Âgées</option>
                                    <option {{ old('job_title')=='Assistance Juridique' ?'selected':'' }}
                                        value="Assistance Juridique">
                                        Assistance
                                        Juridique</option>
                                    <option {{ old('job_title')=="Architecture et Design d'Intérieur" ?'selected':'' }}
                                        value="Architecture et Design d'Intérieur">Architecture et
                                        Design d'Intérieur
                                    </option>
                                    <option {{ old('job_title')=='Services Funéraires' ?'selected':'' }}
                                        value="Services Funéraires">Services
                                        Funéraires</option>
                                    <option {{ old('job_title')=='Agriculture et Elevage' ?'selected':'' }}
                                        value="Agriculture et Elevage">
                                        Agriculture et Elevage</option>
                                    <option {{ old('job_title')=='Production et Réalisation Audiovisuelle'
                                        ?'selected':'' }} value="Production et Réalisation Audiovisuelle">Production
                                        et
                                        Réalisation Audiovisuelle</option>
                                    <option {{ old('job_title')=='Restauration et Hôtellerie' ?'selected':'' }}
                                        value="Restauration et Hôtellerie">
                                        Restauration et Hôtellerie</option>
                                    <option {{ old('job_title')=='Décoration et Ameublement' ?'selected':'' }}
                                        value="Décoration et Ameublement">
                                        Décoration et Ameublement</option>
                                    <option {{ old('job_title')=='Recrutement et Chasse de Têtes' ?'selected':'' }}
                                        value="Recrutement et Chasse de Têtes">Recrutement et Chasse de Têtes
                                    </option>
                                    <option {{ old('job_title')=='Gestion de Propriétés Immobilières' ?'selected':'' }}
                                        value="Gestion de Propriétés Immobilières">Gestion de
                                        Propriétés Immobilières
                                    </option>
                                    <option {{ old('job_title')=='Nutrition et Diététique' ?'selected':'' }}
                                        value="Nutrition et Diététique">
                                        Nutrition et Diététique</option>
                                    <option {{ old('job_title')=='Programmation et Automatisation' ?'selected':'' }}
                                        value="Programmation et Automatisation">Programmation et Automatisation
                                    </option>
                                    <option {{ old('job_title')=='Community Management' ?'selected':'' }}
                                        value="Community Management">Community
                                        Management</option>
                                    <option {{ old('job_title')=='Service de Traduction et Interprétation'
                                        ?'selected':'' }} value="Service de Traduction et Interprétation">Service de
                                        Traduction et Interprétation</option>
                                    <option {{ old('job_title')=='Intelligence Artificielle et Machine Learning'
                                        ?'selected':'' }} value="Intelligence Artificielle et Machine Learning">
                                        Intelligence Artificielle et Machine Learning</option>
                                    <option {{ old('job_title')=='Conception de Jeux Vidéo' ?'selected':'' }}
                                        value="Conception de Jeux Vidéo">
                                        Conception de Jeux Vidéo</option>
                                    <option {{ old('job_title')=='Gestion de Projets' ?'selected':'' }}
                                        value="Gestion de Projets">Gestion de
                                        Projets
                                    </option>
                                    <option {{ old('job_title')=='Services Photographiques' ?'selected':'' }}
                                        value="Services Photographiques">
                                        Services Photographiques</option>
                                    <option {{ old('job_title')=='Recherche et Développement' ?'selected':'' }}
                                        value="Recherche et Développement">
                                        Recherche et Développement</option>
                                    <option {{ old('job_title')=="Services d'Assurance" ?'selected':'' }}
                                        value="Services d'Assurance">Services
                                        d'Assurance</option>
                                    <option {{ old('job_title')=='Design de Mode' ?'selected':'' }}
                                        value="Design de Mode">Design de Mode
                                    </option>
                                    <option {{ old('job_title')=='Informatique et Réseaux' ?'selected':'' }}
                                        value="Informatique et Réseaux">
                                        Informatique et Réseaux</option>
                                    <option {{ old('job_title')=='Gestion des Déchets et Recyclage' ?'selected':'' }}
                                        value="Gestion des Déchets et Recyclage">Gestion des
                                        Déchets et Recyclage
                                    </option>
                                    <option {{ old('job_title')=='Biens de Consommation et Retail' ?'selected':'' }}
                                        value="Biens de Consommation et Retail">Biens de Consommation et Retail
                                    </option>


                                </select>
                            </div>

                            @error('job_title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                                @endif
                         @endif


                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <div><label for="country">Pays</label></div>
                                <input class="col-form-label w-100" type="text" placeholder="Pays"
                                    value="{{ $user->country }}" name="country">
                            </div>

                            @error('country')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="col-md-6">
                                <div>
                                    <label for="country">Ville</label>
                                </div>
                                <input class="col-form-label w-100" type="text" placeholder="Ville"
                                    value="{{ $user->city }}" name="city">
                            </div>

                            @error('city')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class=" mt-3">
                            <div class="accoun_btn_div">

                                <textarea class="col-form-label w-100 p-3" name="bio"
                                    placeholder="À propos Nom du candidat">{{ $user->about_info }}</textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <div class="accoun_btn_div">
                            <input class="w-100 btn btn-success" type="submit" value="Ajouter">
                        </div>
                    </div>
                </form>



            </div>

        </div>
    </div>
    <!--Qualification Modal -->
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Qualification</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('user.update.info') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Collège</label>
                                </div>
                                <input type="text" name="inter" value="{{ $user->inter }}" class="form-control"
                                    placeholder="Inter Medium Name">
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Passage à l'université</label>
                                </div>
                                <input type="text" name="inter_passing_year" value="{{ $user->inter_passing_year }}"
                                    class="form-control" placeholder="Passage à l'université">

                                @error('inter_passing_year')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            @error('school_passing_year')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Université</label>
                                </div>
                                <input type="text" name="graduation" value="{{ $user->graduation }}"
                                    class="form-control" placeholder="Graduation">
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Passage universitaire</label>
                                </div>
                                <input type="text" name="graduation_passing_year"
                                    value="{{ $user->graduation_passing_year }}" class="form-control"
                                    placeholder="Graduation Passing Year">

                                @error('graduation_passing_year')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <div class="accoun_btn_div">
                            <input class="w-100 btn btn-success" type="submit" value="Ajouter">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Experience Modal -->
    <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">à propos de votre expérience</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('user.update.info') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="col-md-12">
                                <div>
                                    <label class="col-form-label">Nom de l'entreprise</label>
                                </div>
                                <input type="text" name="company_name" value="{{ $user->company_name }}"
                                    class="form-control" placeholder="Nom de l'entreprise">
                            </div>

                            <div class="col-md-12">
                                <div>
                                    <label class="col-form-label">à propos de la société</label>
                                </div>
                                <textarea type="text" name="about_company" class="form-control"
                                    placeholder="à propos de la société">{{ $user->about_company }}</textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <div class="accoun_btn_div">
                            <input class="w-100 btn btn-success" type="submit" value="Ajouter">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Tag Modal -->
    <div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Compétences fondamentales</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" action="{{ route('user.update.info') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label class="col-form-label">Tag</label>
                            {{-- {{ dd($user->tag) }} --}}

                            <input type="text" id="tag"
                                value="@isset($user->tag) @foreach($user->tag as $key => $tag) {{ $tag }} @endforeach @endisset"
                                name="tag" class="form-control" data-role="tagsinput">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <div class="accoun_btn_div">
                            <input class="w-100 btn btn-success" type="submit" value="Ajouter">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Portefeuille -->
    <div class="modal fade" id="staticBackdrop5" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Portfolio publicitaire vidéo sa photo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" action="{{ route('user.update.info') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <x-input-label class="col-form-label" for="photo" :value="__('Photos et vidéos')" />
                            <div class="">
                                <input type="file" class="dropify2" data-height="145" name="photo_or_video"
                                    value="{{ $user->school }}" />
                                <input type="hidden" value="{{ $user->protfolio_photo }}" name="old_protfolio_photo">
                                <input type="hidden" value="{{ $user->protfolio_video }}" name="old_protfolio_video">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <div class="accoun_btn_div">
                            <input class="w-100 btn btn-success" type="submit" value="Ajouter">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('script')
    <link rel="stylesheet" href="{{ asset('user') }}/css/bootstrap-tagsinput.css">
    <script src="{{ asset('user') }}/js/bootstrap-tagsinput.js"></script>

    <script>
        $("#tag").tagsinput()
    </script>
    @endpush
</x-guest-layout>
