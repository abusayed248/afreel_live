<x-app-layout>

    <div class="container mb-3">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="recent_activities p-3">

                    <h3 class="d-flex align-content-center "><i class="fa-regular fa-file bc mx-2"></i>Publier une offre
                        d'emploi</h3>

                    <form action="{{ route('store.job') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="m-3 row">
                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Titre d'emploi</label>
                                </div>
                                <input type="text" name="job_title" value="{{ old('job_title') }}" class="form-control"
                                    placeholder="Titre d'emploi">

                                @error('job_title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Type d'emploi</label>
                                </div>
                                <select class="form-select w-100" name="job_type">
                                    <option selected disabled selected>Sélectionnez-en un</option>
                                    <option {{ old('job_type')=='à temps plein' ?'selected':'' }} value="à temps plein">
                                        à temps plein</option>
                                    <option {{ old('job_type')=='à temps partiel' ?'selected':'' }}
                                        value="à temps partiel">à temps partiel</option>
                                    <option {{ old('job_type')=='free-lance' ?'selected':'' }} value="free-lance">
                                        free-lance</option>
                                </select>

                                @error('job_type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="m-3 row">
                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">catégorie d'emploi</label>
                                </div>
                                <select class="form-select w-100" name="job_category">
                                    <option selected disabled selected>Sélectionnez-en un</option>
                                    <option {{ old('job_category')=='Développement Web et Logiciel' ?'selected':'' }}
                                        value="Développement Web et Logiciel">Développement Web et Logiciel</option>
                                    <option {{ old('job_category')=='Design et Création' ?'selected':'' }}
                                        value="Design et Création">Design et Création</option>
                                    <option {{ old('job_category')=='Rédaction et Traduction' ?'selected':'' }}
                                        value="Rédaction et Traduction">Rédaction et Traduction</option>
                                    <option {{ old('job_category')=='Marketing et Vente' ?'selected':'' }}
                                        value="Marketing et Vente">Marketing et Vente</option>
                                    <option {{ old('job_category')=='Support Administratif' ?'selected':'' }}
                                        value="Support Administratif">Support Administratif</option>
                                    <option {{ old('job_category')=='Services Clients' ?'selected':'' }}
                                        value="Services Clients">Services Clients</option>
                                    <option {{ old('job_category')=='Formation et Coaching' ?'selected':'' }}
                                        value="Formation et Coaching">Formation et Coaching</option>
                                    <option {{ old('job_category')=='Services Techniques' ?'selected':'' }}
                                        value="Services Techniques">Services Techniques</option>
                                    <option {{ old('job_category')=='Photographie et Vidéographie' ?'selected':'' }}
                                        value="Photographie et Vidéographie">Photographie et Vidéographie</option>
                                    <option {{ old('job_category')=='Santé et Bien-être' ?'selected':'' }}
                                        value="Santé et Bien-être">Santé et Bien-être</option>
                                    <option {{ old('job_category')=='Art et Divertissement' ?'selected':'' }}
                                        value="Art et Divertissement">Art et Divertissement</option>
                                    <option {{ old('job_category')=='Éducation et Tutorat' ?'selected':'' }}
                                        value="Éducation et Tutorat">Éducation et Tutorat</option>
                                    <option {{ old('job_category')=='Construction et Rénovation' ?'selected':'' }}
                                        value="Construction et Rénovation">Construction et Rénovation</option>
                                    <option {{ old('job_category')=='Logistique et Transport' ?'selected':'' }}
                                        value="Logistique et Transport">Logistique et Transport</option>
                                    <option {{ old('job_category')=='Finance et Comptabilité' ?'selected':'' }}
                                        value="Finance et Comptabilité">Finance et Comptabilité</option>
                                    <option {{ old('job_category')=='Conseil et Stratégie' ?'selected':'' }}
                                        value="Conseil et Stratégie">Conseil et Stratégie</option>
                                    <option {{ old('job_category')=='Plomberie et Électricité' ?'selected':'' }}
                                        value="Plomberie et Électricité">Plomberie et Électricité</option>
                                    <option {{ old('job_category')=='Jardinage et Paysagisme' ?'selected':'' }}
                                        value="Jardinage et Paysagisme">Jardinage et Paysagisme</option>
                                    <option {{ old('job_category')=='Nettoyage et Entretien' ?'selected':'' }}
                                        value="Nettoyage et Entretien">Nettoyage et Entretien</option>
                                    <option {{ old('job_category')=='Sécurité et Surveillance' ?'selected':'' }}
                                        value="Sécurité et Surveillance">Sécurité et Surveillance</option>
                                    <option {{ old('job_category')=='Cuisine et Restauration' ?'selected':'' }}
                                        value="Cuisine et Restauration">Cuisine et Restauration</option>
                                    <option {{ old('job_category')=='Coiffure et Esthétique' ?'selected':'' }}
                                        value="Coiffure et Esthétique">Coiffure et Esthétique</option>
                                    <option {{ old('job_category')=='Maintenance et Réparation dÉquipements'
                                        ?'selected':'' }} value="Maintenance et Réparation d'Équipements">Maintenance et
                                        Réparation d'Équipements</option>
                                    <option {{ old('job_category')=='Evénementiel et Animation' ?'selected':'' }}
                                        value="Evénementiel et Animation">Evénementiel et Animation</option>
                                    <option {{ old('job_category')=='Bricolage et Petits Travaux' ?'selected':'' }}
                                        value="Bricolage et Petits Travaux">Bricolage et Petits Travaux</option>
                                    <option {{ old('job_category')=="Baby-sitting et Garde d'Enfants" ?'selected':'' }}
                                        value="Baby-sitting et Garde d'Enfants">Baby-sitting et Garde d'Enfants</option>
                                    <option {{ old('job_category')=='Services aux Animaux' ?'selected':'' }}
                                        value="Services aux Animaux">Services aux Animaux</option>
                                    <option {{ old('job_category')=='Enseignement et Formation' ?'selected':'' }}
                                        value="Enseignement et Formation">Enseignement et Formation</option>
                                    <option {{ old('job_category')=='Développement Personnel' ?'selected':'' }}
                                        value="Développement Personnel">Développement Personnel</option>
                                    <option {{ old('job_category')=='Rédaction de CV et Lettres de Motivation'
                                        ?'selected':'' }} value="Rédaction de CV et Lettres de Motivation">Rédaction de
                                        CV et Lettres de Motivation</option>
                                    <option {{ old('job_category')=='Graphisme et Illustration' ?'selected':'' }}
                                        value="Graphisme et Illustration">Graphisme et Illustration</option>
                                    <option {{ old('job_category')=='Développement Mobile' ?'selected':'' }}
                                        value="Développement Mobile">Développement Mobile</option>
                                    <option {{ old('job_category')=='E-commerce et Dropshipping' ?'selected':'' }}
                                        value="E-commerce et Dropshipping">E-commerce et Dropshipping</option>
                                    <option {{ old('job_category')=='Réparation de Véhicules' ?'selected':'' }}
                                        value="Réparation de Véhicules">Réparation de Véhicules</option>
                                    <option {{ old('job_category')=='Bien-être et Spa' ?'selected':'' }}
                                        value="Bien-être et Spa">Bien-être et Spa</option>
                                    <option {{ old('job_category')=='Accompagnement et Services aux Personnes Âgées'
                                        ?'selected':'' }} value="Accompagnement et Services aux Personnes Âgées">
                                        Accompagnement et Services aux Personnes Âgées</option>
                                    <option {{ old('job_category')=='Assistance Juridique' ?'selected':'' }}
                                        value="Assistance Juridique">Assistance Juridique</option>
                                    <option {{ old('job_category')=="Architecture et Design d'Intérieur" ?'selected':''
                                        }} value="Architecture et Design d'Intérieur">Architecture et Design d'Intérieur
                                    </option>
                                    <option {{ old('job_category')=='Services Funéraires' ?'selected':'' }}
                                        value="Services Funéraires">Services Funéraires</option>
                                    <option {{ old('job_category')=='Agriculture et Elevage' ?'selected':'' }}
                                        value="Agriculture et Elevage">Agriculture et Elevage</option>
                                    <option {{ old('job_category')=='Production et Réalisation Audiovisuelle'
                                        ?'selected':'' }} value="Production et Réalisation Audiovisuelle">Production et
                                        Réalisation Audiovisuelle</option>
                                    <option {{ old('job_category')=='Restauration et Hôtellerie' ?'selected':'' }}
                                        value="Restauration et Hôtellerie">Restauration et Hôtellerie</option>
                                    <option {{ old('job_category')=='Décoration et Ameublement' ?'selected':'' }}
                                        value="Décoration et Ameublement">Décoration et Ameublement</option>
                                    <option {{ old('job_category')=='Recrutement et Chasse de Têtes' ?'selected':'' }}
                                        value="Recrutement et Chasse de Têtes">Recrutement et Chasse de Têtes</option>
                                    <option {{ old('job_category')=='Gestion de Propriétés Immobilières' ?'selected':''
                                        }} value="Gestion de Propriétés Immobilières">Gestion de Propriétés Immobilières
                                    </option>
                                    <option {{ old('job_category')=='Nutrition et Diététique' ?'selected':'' }}
                                        value="Nutrition et Diététique">Nutrition et Diététique</option>
                                    <option {{ old('job_category')=='Programmation et Automatisation' ?'selected':'' }}
                                        value="Programmation et Automatisation">Programmation et Automatisation</option>
                                    <option {{ old('job_category')=='Community Management' ?'selected':'' }}
                                        value="Community Management">Community Management</option>
                                    <option {{ old('job_category')=='Service de Traduction et Interprétation'
                                        ?'selected':'' }} value="Service de Traduction et Interprétation">Service de
                                        Traduction et Interprétation</option>
                                    <option {{ old('job_category')=='Intelligence Artificielle et Machine Learning'
                                        ?'selected':'' }} value="Intelligence Artificielle et Machine Learning">
                                        Intelligence Artificielle et Machine Learning</option>
                                    <option {{ old('job_category')=='Conception de Jeux Vidéo' ?'selected':'' }}
                                        value="Conception de Jeux Vidéo">Conception de Jeux Vidéo</option>
                                    <option {{ old('job_category')=='Gestion de Projets' ?'selected':'' }}
                                        value="Gestion de Projets">Gestion de Projets</option>
                                    <option {{ old('job_category')=='Services Photographiques' ?'selected':'' }}
                                        value="Services Photographiques">Services Photographiques</option>
                                    <option {{ old('job_category')=='Recherche et Développement' ?'selected':'' }}
                                        value="Recherche et Développement">Recherche et Développement</option>
                                    <option {{ old('job_category')=="Services d'Assurance" ?'selected':'' }}
                                        value="Services d'Assurance">Services d'Assurance</option>
                                    <option {{ old('job_category')=='Design de Mode' ?'selected':'' }}
                                        value="Design de Mode">Design de Mode</option>
                                    <option {{ old('job_category')=='Informatique et Réseaux' ?'selected':'' }}
                                        value="Informatique et Réseaux">Informatique et Réseaux</option>
                                    <option {{ old('job_category')=='Gestion des Déchets et Recyclage' ?'selected':'' }}
                                        value="Gestion des Déchets et Recyclage">Gestion des Déchets et Recyclage
                                    </option>
                                    <option {{ old('job_category')=='Biens de Consommation et Retail' ?'selected':'' }}
                                        value="Biens de Consommation et Retail">Biens de Consommation et Retail</option>


                                </select>

                                @error('job_category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Niveau de carrière</label>
                                </div>
                                <select class="form-select w-100" name="career_level">
                                    <option selected disabled selected>Sélectionnez-en un</option>
                                    <option {{ old('career_level')=='Débutant' ?'selected':'' }} value="Débutant">
                                        Débutant</option>
                                    <option {{ old('career_level')=='Intermédiaire' ?'selected':'' }} value="Intermédiaire ">Intermédiaire
                                    </option>
                                    <option {{ old('career_level')=='Expert' ?'selected':'' }} value="Expert ">Expert
                                    </option>
                                </select>

                                @error('career_level')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row m-3 ">
                            <div class="col-md-12">
                                <div>
                                    <label class="col-form-label">Description de l'emploi</label>
                                </div>
                                <div>
                                    <textarea id="editor" class="col-form-label w-100 p-3" name="job_description"
                                        placeholder="Description de l'emploi">{{ old('job_description') }}</textarea>

                                    @error('job_description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="m-3 row">
                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Compétences fondamentales</label>
                                </div>
                                <input type="text" id="tag" class="form-control w-100" name="skill"
                                    data-role="tagsinput">

                                @error('skill')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Date limite d'inscription</label>
                                </div>
                                <input class="w-100 form-control" type="text" name="deadline" id="deadline">

                                @error('deadline')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="m-3 row">
                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Montant</label>
                                </div>
                                <input type="number" class="form-control w-100" name="amount"
                                    value="{{ old('amount') }}" placeholder="Montant">

                                @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Besoin</label>
                                </div>

                                <select class="form-select w-100" name="when_needed">
                                    <option selected disabled selected>Sélectionnez-en un</option>
                                    <option {{ old('when_needed')=='Régulier' ?'selected':'' }} value="Régulier">
                                        régulier</option>
                                    <option {{ old('when_needed')=='Urgent' ?'selected':'' }} value="urgent ">Urgent
                                    </option>
                                </select>

                            </div>
                        </div>


                        <div class="m-3 row">
                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Déposer (docx,pdf,zip)</label>
                                </div>
                                <input type="file" class="form-control w-100" name="file">
                                @error('file')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Genre</label>
                                </div>

                                <select class="form-select w-100" name="gender">
                                    <option selected disabled selected>Sélectionnez-en un</option>
                                    <option {{ old('gender')=='homme' ?'selected':'' }} value="Homme">Homme
                                    </option>
                                    <option {{ old('gender')=='femme' ?'selected':'' }} value="Femme">Femme
                                    </option>
                                    <option {{ old('gender')=='Mixte' ?'selected':'' }} value="Mixte">Mixte
                                    </option>
                                   </select>

                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="m-3 row">
                            <div class=" mt-3">
                                <input class="w-100 btn btn-success" type="submit" value="Publier le travail">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    @push('script')
    <link rel="stylesheet" href="{{ asset('user') }}/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="{{ asset('user') }}/js/bootstrap-tagsinput.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <script>
        //tag
        $("#tag").tagsinput();

        //datepicker 
        $("#deadline").flatpickr({
            enableTime: false,
            dateFormat: "Y/m/d",
            defaultDate: "2024-04-02"
        });



    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

    @endpush

</x-app-layout>