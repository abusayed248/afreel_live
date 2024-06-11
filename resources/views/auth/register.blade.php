<x-guest-layout>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid" src="{{ asset('user') }}/img/banner-6-removebg.png" alt="" srcset="">
                </div>
                <div class="col-md-6">
                    <div class="col-md-10">
                        <h1 class="mb-2">{{ Lang::get('login.page.registertext') }}</h1>
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 row">
                                <div>
                                    <x-input-label class="col-form-label" for="fullname" value="Nom complet" />
                                </div>
                                <div class="">
                                    <x-text-input id="fullname" placeholder="Nom complet" class="form-control"
                                        type="text" name="fullname" :value="old('fullname')" required />
                                </div>
                            </div>

                            @error('fullname')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3 row">
                                <div>
                                    <x-input-label id="username" class="col-form-label" for="username"
                                        value="nom d'utilisateur" />
                                </div>
                                <div>
                                    <x-text-input id="username" class="form-control" placeholder="nom d'utilisateur"
                                        type="text" name="username" :value="old('username')" required />
                                </div>
                            </div>

                            @error('username')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3 row">
                                <div>
                                    <x-input-label class="col-form-label" for="email"
                                        value="{{ Lang::get('register.page.email.text') }}" />
                                </div>
                                <div class="">
                                    <x-text-input id="email" class="form-control"
                                        placeholder="{{ Lang::get('register.page.email.placeholder.text') }}"
                                        type="email" name="email" :value="old('email')" required />
                                </div>
                            </div>

                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3 row">
                                <div>
                                    <x-input-label class="col-form-label" for="phone"
                                        value="Numéro de portable" />
                                </div>
                                <div class="">
                                    <x-text-input id="phone" class="form-control"
                                        placeholder="Numéro de portable"
                                        type="number" name="phone" :value="old('phone')" required />
                                </div>
                            </div>

                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3 row">
                                <x-input-label for="password" class="col-form-label"
                                    value="{{ Lang::get('register.page.password.text') }}" />

                                <div class="pass_div">
                                    <x-text-input id="password" class="form-control pass_input w-100" type="password"
                                        placeholder="{{ Lang::get('register.page.password.placeholder.text') }}"
                                        name="password" />
                                    <i onclick="myFunctioncheckshow()" id="password_co"
                                        class="fa-regular fa-eye pas-eye"></i>
                                </div>
                            </div>

                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3 row">
                                <x-input-label for="password_confirmation" class="col-form-label"
                                    value="{{ Lang::get('register.page.confirm.password.text') }}" />

                                <div class="pass_div">
                                    <x-text-input id="password_confirmation" class="form-control w-100" type="password"
                                        placeholder="{{ Lang::get('register.page.confirm.password.placeholder.text') }}"
                                        name="password_confirmation" required />
                                    <i onclick="myFunctioncheck()" id="password_con"
                                        class="fa-regular fa-eye pas-eye"></i>
                                </div>
                            </div>

                            @error('password_confirmation')
                            <span class=" text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3 row">
                                <div>
                                    <label class="col-form-label">Catégorie d'emploi</label>
                                </div>
                                <div>
                                    <select class="form-select w-100 p-2" name="job_title" required>
                                        <option selected disabled selected>Sélectionnez-en un</option>
                                        <option {{ old('job_title')=='Développement Web et Logiciel' ?'selected':'' }}
                                            value="Développement Web et Logiciel">Développement Web et Logiciel
                                        </option>
                                        <option {{ old('job_title')=='Design et Création' ?'selected':'' }}
                                            value="Design et Création">Design et Création
                                        </option>
                                        <option {{ old('job_title')=='Rédaction et Traduction' ?'selected':'' }}
                                            value="Rédaction et Traduction">
                                            Rédaction et Traduction</option>
                                        <option {{ old('job_title')=='Marketing et Vente' ?'selected':'' }}
                                            value="Marketing et Vente">Marketing et Vente
                                        </option>
                                        <option {{ old('job_title')=='Support Administratif' ?'selected':'' }}
                                            value="Support Administratif">Support
                                            Administratif</option>
                                        <option {{ old('job_title')=='Services Clients' ?'selected':'' }}
                                            value="Services Clients">Services Clients
                                        </option>
                                        <option {{ old('job_title')=='Formation et Coaching' ?'selected':'' }}
                                            value="Formation et Coaching">Formation et
                                            Coaching</option>
                                        <option {{ old('job_title')=='Services Techniques' ?'selected':'' }}
                                            value="Services Techniques">Services
                                            Techniques</option>
                                        <option {{ old('job_title')=='Photographie et Vidéographie' ?'selected':'' }}
                                            value="Photographie et Vidéographie">Photographie et Vidéographie</option>
                                        <option {{ old('job_title')=='Santé et Bien-être' ?'selected':'' }}
                                            value="Santé et Bien-être">Santé et Bien-être
                                        </option>
                                        <option {{ old('job_title')=='Art et Divertissement' ?'selected':'' }}
                                            value="Art et Divertissement">Art et
                                            Divertissement</option>
                                        <option {{ old('job_title')=='Éducation et Tutorat' ?'selected':'' }}
                                            value="Éducation et Tutorat">Éducation et
                                            Tutorat</option>
                                        <option {{ old('job_title')=='Construction et Rénovation' ?'selected':'' }}
                                            value="Construction et Rénovation">
                                            Construction et Rénovation</option>
                                        <option {{ old('job_title')=='Logistique et Transport' ?'selected':'' }}
                                            value="Logistique et Transport">
                                            Logistique et Transport</option>
                                        <option {{ old('job_title')=='Finance et Comptabilité' ?'selected':'' }}
                                            value="Finance et Comptabilité">Finance
                                            et Comptabilité</option>
                                        <option {{ old('job_title')=='Conseil et Stratégie' ?'selected':'' }}
                                            value="Conseil et Stratégie">Conseil et
                                            Stratégie</option>
                                        <option {{ old('job_title')=='Plomberie et Électricité' ?'selected':'' }}
                                            value="Plomberie et Électricité">
                                            Plomberie et Électricité</option>
                                        <option {{ old('job_title')=='Jardinage et Paysagisme' ?'selected':'' }}
                                            value="Jardinage et Paysagisme">
                                            Jardinage et Paysagisme</option>
                                        <option {{ old('job_title')=='Nettoyage et Entretien' ?'selected':'' }}
                                            value="Nettoyage et Entretien">Nettoyage
                                            et Entretien</option>
                                        <option {{ old('job_title')=='Sécurité et Surveillance' ?'selected':'' }}
                                            value="Sécurité et Surveillance">
                                            Sécurité et Surveillance</option>
                                        <option {{ old('job_title')=='Cuisine et Restauration' ?'selected':'' }}
                                            value="Cuisine et Restauration">Cuisine
                                            et Restauration</option>
                                        <option {{ old('job_title')=='Coiffure et Esthétique' ?'selected':'' }}
                                            value="Coiffure et Esthétique">Coiffure
                                            et Esthétique</option>
                                        <option {{ old('job_title')=='Maintenance et Réparation dÉquipements'
                                            ?'selected':'' }} value="Maintenance et Réparation d'Équipements">
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
                                            value="Services aux Animaux">Services aux
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
                                            value="Développement Mobile">Développement
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
                                            value="Assistance Juridique">Assistance
                                            Juridique</option>
                                        <option {{ old('job_title')=="Architecture et Design d'Intérieur" ?'selected':''
                                            }} value="Architecture et Design d'Intérieur">Architecture et
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
                                        <option {{ old('job_title')=='Gestion de Propriétés Immobilières' ?'selected':''
                                            }} value="Gestion de Propriétés Immobilières">Gestion de
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
                                            value="Gestion de Projets">Gestion de Projets
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
                                            value="Design de Mode">Design de Mode</option>
                                        <option {{ old('job_title')=='Informatique et Réseaux' ?'selected':'' }}
                                            value="Informatique et Réseaux">
                                            Informatique et Réseaux</option>
                                        <option {{ old('job_title')=='Gestion des Déchets et Recyclage' ?'selected':''
                                            }} value="Gestion des Déchets et Recyclage">Gestion des
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


                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <x-input-label for="country" class="col-form-label"
                                        value="{{ Lang::get('register.page.country.text') }}" />

                                    <div class="">
                                        <x-text-input id="country" class="form-control" type="text"
                                            :value="old('country')"
                                            placeholder="{{ Lang::get('register.page.country.text') }}" name="country"
                                            required />
                                    </div>
                                </div>

                                @error('country')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <div class="col-md-6">
                                    <x-input-label for="city" class="col-form-label"
                                        value="{{ Lang::get('register.page.city.text') }}" />

                                    <div class="">
                                        <x-text-input id="city" class="form-control" :value="old('city')" type="text"
                                            placeholder="{{ Lang::get('register.page.city.text') }}" name="city"
                                            required />
                                    </div>
                                </div>

                                @error('city')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>



                            <div class="mb-3 row">
                                <x-input-label class="col-form-label" for="photo" :value="__('Photo')" />

                                <div class="">
                                    <input type="file" class="dropify" data-height="145" name="photo" />
                                </div>
                            </div>

                            @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mb-3 row">
                                <div class="d-flex align-items-center justify-content-between">
                                    <input class="w-100 btn btn-success" type="submit" value="Créer un compte">
                                </div>
                            </div>
                        </form>

                        <div class="social-login">
                            <a class="d-flex align-items-center justify-content-center bc btn-success mb-3 p-2"
                                href="{{ url('/login/google') }}" class="d-flex social-pd">
                                <span><i class="fa-brands fa-google"></i></span>
                                <span class="mx-3">{{ Lang::get('login.page.continuewithgoogletext') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-guest-layout>