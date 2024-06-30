<x-guest-layout>
    <div class="mb-3">
        <form action="{{ route('find.job') }}" method="GET">
            <div class="row justify-content-center text-center pt-5 pb-5 find_banner">
                <h1 class="find_banner_title">Les métiers les plus passionnants</h1>
                <div class="col-md-8">
                    <div class="row mt-3 find_banner_form_div  justify-content-around">
                        <div class="d-flex justify-content-center align-items-lg-center col-md-5">
                            <i class="fa-solid fa-magnifying-glass find_banner_form_icon"></i>
                            <input name="keyword" class="form-control me-2" type="search"
                                value="{{ request('keyword') }}" placeholder="Titre du poste, mot clé ou entreprise">
                        </div>
                        <div class="d-flex justify-content-center align-items-lg-center col-md-4">
                            <i class="fa-solid fa-location-crosshairs find_banner_form_icon"></i>
                            <input name="location" value="{{ request('location') }}" class="form-control me-2"
                                type="search" placeholder="Emplacement">
                        </div>

                        <div class="d-flex justify-content-center align-items-lg-center col-md-3">
                            <button class="btn btn-outline-success" onclick="click()">Trouver un emploi</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="recet_job_con mt-3">
                            <h4 class="p-3">Filtre de recherche</h4>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button cate_title" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Catégories d’emploi
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($developmentWebLogical){{
                                                    $developmentWebLogical ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Développement Web et Logiciel"
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Développement Web et Logiciel
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($designEtCreation){{
                                                    $designEtCreation ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Design et Création"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Design et Création
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($redictionEtTraduction){{
                                                    $redictionEtTraduction ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Rédaction et Traduction"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Rédaction et Traduction
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($marketingEtVente){{
                                                    $marketingEtVente ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Marketing et Vente"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Marketing et Vente
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($supportAdminstratif){{
                                                    $supportAdminstratif ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Support Administratif"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Support Administratif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($servicesClient){{
                                                    $servicesClient ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Services Clients"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Services Clients
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($formationEtCoacing){{
                                                    $formationEtCoacing ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Formation et Coaching"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Formation et Coaching
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($servicesTecnic){{
                                                    $servicesTecnic ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Services Techniques"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Services Techniques
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($photographieEtVidéographie){{
                                                    $photographieEtVidéographie ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Photographie et Vidéographie" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Photographie et Vidéographie
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($santéEtBienêtre){{
                                                    $santéEtBienêtre ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Santé et Bien-être"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Santé et Bien-être
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($ArtetDivertissement){{
                                                    $ArtetDivertissement ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Art et Divertissement"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Art et Divertissement
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($ÉducationetTutorat){{
                                                    $ÉducationetTutorat ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Éducation et Tutorat"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Éducation et Tutorat
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($ConstructionetRénovation){{
                                                    $ConstructionetRénovation ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Construction et Rénovation" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Construction et Rénovation
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($LogistiqueetTransport){{
                                                    $LogistiqueetTransport ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Logistique et Transport"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Logistique et Transport
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($FinanceetComptabilité){{
                                                    $FinanceetComptabilité ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Finance et Comptabilité"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Finance et Comptabilité
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($ConseiletStratégie){{
                                                    $ConseiletStratégie ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Conseil et Stratégie"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Conseil et Stratégie
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($PlomberieetÉlectricité){{
                                                    $PlomberieetÉlectricité ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Plomberie et Électricité" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Plomberie et Électricité
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($JardinageetPaysagisme){{
                                                    $JardinageetPaysagisme ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Jardinage et Paysagisme"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Jardinage et Paysagisme
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($NettoyageetEntretien){{
                                                    $NettoyageetEntretien ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Nettoyage et Entretien"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Nettoyage et Entretien
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($SécuritéetSurveillance){{
                                                    $SécuritéetSurveillance ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Sécurité et Surveillance" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Sécurité et Surveillance
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($CuisineetRestauration){{
                                                    $CuisineetRestauration ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Cuisine et Restauration"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Cuisine et Restauration
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($CoiffureetEsthétique){{
                                                    $CoiffureetEsthétique ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Coiffure et Esthétique"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Coiffure et Esthétique
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input"
                                                    @isset($MaintenanceetRéparationÉquipements){{
                                                    $MaintenanceetRéparationÉquipements ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Maintenance et Réparation d'Équipements"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Maintenance et Réparation d'Équipements
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($EvénementieletAnimation){{
                                                    $EvénementieletAnimation ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Evénementiel et Animation" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Evénementiel et Animation
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($BricolageetPetitsTravaux){{
                                                    $BricolageetPetitsTravaux ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Bricolage et Petits Travaux" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Bricolage et Petits Travaux
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($BabysittingetGardedEnfants){{
                                                    $BabysittingetGardedEnfants ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Baby-sitting et Garde d'Enfants" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Baby-sitting et Garde d'Enfants
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($ServicesauxAnimaux){{
                                                    $ServicesauxAnimaux ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Services aux Animaux"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Services aux Animaux
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($EnseignementetFormation){{
                                                    $EnseignementetFormation ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Enseignement et Formation" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Enseignement et Formation
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($DéveloppementPersonnel){{
                                                    $DéveloppementPersonnel ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Développement Personnel" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Développement Personnel
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input"
                                                    @isset($RédactiondeCVetLettresdeMotivation){{
                                                    $RédactiondeCVetLettresdeMotivation ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Rédaction de CV et Lettres de Motivation"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Rédaction de CV et Lettres de Motivation
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($GraphismeetIllustration){{
                                                    $GraphismeetIllustration ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Graphisme et Illustration" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Graphisme et Illustration
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($DéveloppementMobile){{
                                                    $DéveloppementMobile ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Développement Mobile"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Développement Mobile
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($EcommerceetDropshipping){{
                                                    $EcommerceetDropshipping ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="E-commerce et Dropshipping" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    E-commerce et Dropshipping
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($RéparationdeVéhicules){{
                                                    $RéparationdeVéhicules ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Réparation de Véhicules"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Réparation de Véhicules
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($BienêtreetSpa){{ $BienêtreetSpa
                                                    ? 'checked' : '' }} @endisset type="checkbox" name="job_category[]"
                                                    value="Bien-être et Spa" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Bien-être et Spa
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input"
                                                    @isset($AccompagnementetServicesauxPersonnesÂgées){{
                                                    $AccompagnementetServicesauxPersonnesÂgées ? 'checked' : '' }}
                                                    @endisset type="checkbox" name="job_category[]"
                                                    value="Accompagnement et Services aux Personnes Âgées"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Accompagnement et Services aux Personnes Âgées
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($AssistanceJuridique){{
                                                    $AssistanceJuridique ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Assistance Juridique"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Assistance Juridique
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input"
                                                    @isset($ArchitectureetDesigndIntérieur){{
                                                    $ArchitectureetDesigndIntérieur ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Architecture et Design d'Intérieur" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Architecture et Design d'Intérieur
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($ServicesFunéraires){{
                                                    $ServicesFunéraires ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Services Funéraires"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Services Funéraires
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($AgricultureetElevage){{
                                                    $AgricultureetElevage ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Agriculture et Elevage"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Agriculture et Elevage
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input"
                                                    @isset($ProductionetRéalisationAudiovisuelle){{
                                                    $ProductionetRéalisationAudiovisuelle ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Production et Réalisation Audiovisuelle"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Production et Réalisation Audiovisuelle
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($RestaurationetHôtellerie){{
                                                    $RestaurationetHôtellerie ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Restauration et Hôtellerie" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Restauration et Hôtellerie
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($DécorationetAmeublement){{
                                                    $DécorationetAmeublement ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Décoration et Ameublement" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Décoration et Ameublement
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($RecrutementetChassedeTêtes){{
                                                    $RecrutementetChassedeTêtes ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Recrutement et Chasse de Têtes" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Recrutement et Chasse de Têtes
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input"
                                                    @isset($GestiondePropriétésImmobilières){{
                                                    $GestiondePropriétésImmobilières ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Gestion de Propriétés Immobilières" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Gestion de Propriétés Immobilières
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($NutritionetDiététique){{
                                                    $NutritionetDiététique ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Nutrition et Diététique"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Nutrition et Diététique
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($ProgrammationetAutomatisation){{
                                                    $ProgrammationetAutomatisation ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Programmation et Automatisation" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Programmation et Automatisation
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($CommunityManagement){{
                                                    $CommunityManagement ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Community Management"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Community Management
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input"
                                                    @isset($ServicedeTraductionetInterprétation){{
                                                    $ServicedeTraductionetInterprétation ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Service de Traduction et Interprétation"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Service de Traduction et Interprétation
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input"
                                                    @isset($IntelligenceArtificielleetMachineLearning){{
                                                    $IntelligenceArtificielleetMachineLearning ? 'checked' : '' }}
                                                    @endisset type="checkbox" name="job_category[]"
                                                    value="Intelligence Artificielle et Machine Learning"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Intelligence Artificielle et Machine Learning
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($ConceptiondeJeuxVidéo){{
                                                    $ConceptiondeJeuxVidéo ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Conception de Jeux Vidéo"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Conception de Jeux Vidéo
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($GestiondeProjets){{
                                                    $GestiondeProjets ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Gestion de Projets"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Gestion de Projets
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($ServicesPhotographiques){{
                                                    $ServicesPhotographiques ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Services Photographiques" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Services Photographiques
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($RechercheetDéveloppement){{
                                                    $RechercheetDéveloppement ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Recherche et Développement" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Recherche et Développement
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($ServicesdAssurance){{
                                                    $ServicesdAssurance ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Services d'Assurance"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Services d'Assurance
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($DesigndeMode){{ $DesigndeMode
                                                    ? 'checked' : '' }} @endisset type="checkbox" name="job_category[]"
                                                    value="Design de Mode" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Design de Mode
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($InformatiqueetRéseaux){{
                                                    $InformatiqueetRéseaux ? 'checked' : '' }} @endisset type="checkbox"
                                                    name="job_category[]" value="Informatique et Réseaux"
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Informatique et Réseaux
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($GestiondesDéchetsetRecyclage){{
                                                    $GestiondesDéchetsetRecyclage ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Gestion des Déchets et Recyclage" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Gestion des Déchets et Recyclage
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" @isset($BiensdeConsommationetRetail){{
                                                    $BiensdeConsommationetRetail ? 'checked' : '' }} @endisset
                                                    type="checkbox" name="job_category[]"
                                                    value="Biens de Consommation et Retail" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Biens de Consommation et Retail
                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Type d'emploi
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($fulltime){{ $fulltime
                                                    ? 'checked' : '' }} @endisset name="job_type[]"
                                                    value="à temps plein" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    à temps plein
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($parttime){{ $parttime
                                                    ? 'checked' : '' }} @endisset name="job_type[]"
                                                    value="à temps partiel" type="checkbox" value=""
                                                    id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    à temps partiel
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($freelance){{ $freelance
                                                    ? 'checked' : '' }} @endisset value="free-lance" name="job_type[]"
                                                    type="checkbox" value="" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    free-lance
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Niveau de carrière
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($Débutant){{ $Débutant
                                                    ? 'checked' : '' }} @endisset type="checkbox" value="Débutant"
                                                    name="career_level[]" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Débutant
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" @isset($Intermédiaire){{ $Intermédiaire
                                                    ? 'checked' : '' }} @endisset type="checkbox" value="Intermédiaire"
                                                    name="career_level[]" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Intermédiaire
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" @isset($Expert){{
                                                    $Expert ? 'checked' : '' }} @endisset value="Expert"
                                                    name="career_level[]" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Expert
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="">
                                    <input class="w-100 show_r_btn" type="submit" value="Afficher le résultat">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">

                        @if(!empty($jobs) && $jobs->count())

                        @foreach($jobs as $job)
                        <div class="p-2 recet_job_con d-flex  align-items-center flex-wrap mt-3">
                            <div class="recet_job_title_div col-md-8">

                                <h5 class="p-1">{{ ucwords(Str::limit($job->job_title, 50, '...')) }}</h5>
                                <div class="d-flex flex-wrap">
                                    <div class="d-flex justify-content-start align-items-center">
                                        @if(!empty($job->user->country) && !empty($job->user->city))
                                        <i class="fa-solid fa-location-dot p-1"></i><span>{{
                                            $job->user->country.','.$job->user->city }}</span>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center job_status p-2">
                                        <i class="fa-solid fa-suitcase p-1"></i><span>{{ $job->job_type }}</span>
                                    </div>

                                    <div class="d-flex justify-content-start align-items-center job_price p-2">
                                        <i class="fa-regular fa-star"></i><span>{{ $job->when_needed }}</span>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center job_urgent p-2">
                                        <span><i class="fa-solid fa-franc-sign"></i></span>
                                        <span class="p-1">{{ $job->amount }}</span>
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex flex-wrap mt-2">
                                    @php
                                    $skills = $job->skill;
                                    @endphp

                                    @if ($skills)
                                    @foreach($skills as $skill)
                                    <div class="tag_btn">{{ $skill }}</div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 ap-btn">
                                <a class=" recet_job_apply_btn bc"
                                    href="{{ route('job.post.details', ['slug' => $job->slug, 'id' => $job->id]) }}">Postuler
                                    à un emploi<i class="fa-regular fa-circle-right mx-2"></i></a>
                            </div>
                        </div>
                        @endforeach

                        @else
                        <div class="recet_job_title_div col-md-10">
                            <h5 class="text-danger text-center" colspan="10">Emplois non trouvés!</h5>
                        </div>
                        @endif

                        <div class="row mt-3">
                            <div class="col-xl-12">
                                {!! $jobs->appends(Request::all())->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-guest-layout>