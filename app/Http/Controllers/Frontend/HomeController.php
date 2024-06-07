<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\SocialMedia;
use App\Models\Job_aplication;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    // for home page
    public function index()
    {
        $latestPosts = Post::take(6)->latest()->get();
        $hireTopCandidates = User::take(3)->orderByDesc('hire_count')->get();
        $jobPostCategory = Post::all();

        $jobCats = Post::selectRaw('job_category, COUNT(*) as count')
            ->groupBy('job_category')
            ->get();

        $appliedJobs = Job_aplication::selectRaw('post_id, COUNT(*) as count')
            ->groupBy('post_id')->get();

        

        return view('homepage', compact('latestPosts', 'hireTopCandidates', 'jobCats', 'appliedJobs'));
    }

    //candidate profile details
    public function candidateProfile($id)
    {
        $user = User::whereId($id)->first();
        $socialMedia = SocialMedia::first();
        return view('user.profile.candidate-detail', compact('user', 'socialMedia'));
    }


    //find jobs
    public function findJobs(Request $request)
    {
        // dd($request->all());
        $keywords = $request->keyword;
        $location = $request->location;
        $job_type = $request->job_type;
        $job_category = $request->job_category;
        $career_level = $request->career_level;
        $amount     = $request->amount;
        $per_page   = $request->per_page ?: 15;

        $jobs = Post::query()->with('user')->latest('id');

        if ($keywords || $location || $job_category || $job_type || $career_level || $amount) {
            $jobs->where(function ($query) use ($keywords, $location, $job_type,  $job_category, $career_level, $amount) {
                if ($keywords) {
                    $query->where('job_title', 'like', '%' . $keywords . '%')
                          ->orWhere('slug', 'like', '%' . $keywords . '%');
                }
                if ($location) {
                    $query->orWhereHas('user', function ($query) use ($location) {
                        $query->where('country', 'like', '%' . $location . '%')
                              ->orWhere('city', 'like', '%' . $location . '%');
                    });
                }

                if ($job_category && is_array($job_category)) {
                    $query->whereIn('job_category', $job_category);
                }

                if ($job_type && is_array($job_type)) {
                    $query->whereIn('job_type', $job_type);
                }
                
                if ($career_level && is_array($career_level)) {
                    $query->whereIn('career_level', $career_level);
                }
                
                if ($amount && is_array($amount)) {
                    foreach ($amount as $range) {
                        list($min, $max) = explode('-', $range);
                        $query->orWhereBetween('amount', [$min, $max]);
                    }
                }
            });
        }

        $jobs = $jobs->paginate($per_page);

        //check for job_type old values
        $fulltime = in_array('Full Time', $request->input('job_type', []));
        $parttime = in_array('Part Time', $request->input('job_type', []));
        $freelance = in_array('Freelance', $request->input('job_type', []));

        //check for career_level old values
        $Débutant = in_array("Débutant", $request->input('career_level', []));
        $Intermédiaire = in_array('Intermédiaire', $request->input('career_level', []));
        $Expert = in_array('Expert', $request->input('career_level', []));

        //check for amount old values
        $oneTwoHund = in_array('1-100', $request->input('amount', []));
        $oneHunOneThu = in_array('101-1000', $request->input('amount', []));
        $OneThuOneTwoThu = in_array('1001-2000', $request->input('amount', []));

        //check for job_category old values
        $developmentWebLogical = in_array('Développement Web et Logiciel', $request->input('job_category', []));
        $designEtCreation = in_array('Design et Création', $request->input('job_category', []));
        $redictionEtTraduction = in_array('Rédaction et Traduction', $request->input('job_category', []));
        $marketingEtVente = in_array('Marketing et Vente', $request->input('job_category', []));
        $supportAdminstratif = in_array('Support Administratif', $request->input('job_category', []));
        $servicesClient = in_array('Services Clients', $request->input('job_category', []));
        $formationEtCoacing = in_array('Formation et Coaching', $request->input('job_category', []));
        $servicesTecnic = in_array('Services Techniques', $request->input('job_category', []));
        $photographieEtVidéographie = in_array('Photographie et Vidéographie', $request->input('job_category', []));
        $santéEtBienêtre = in_array('Santé et Bien-être', $request->input('job_category', []));
        $ArtetDivertissement = in_array('Art et Divertissement', $request->input('job_category', []));
        $ÉducationetTutorat = in_array('Éducation et Tutorat', $request->input('job_category', []));
        $ConstructionetRénovation = in_array('Construction et Rénovation', $request->input('job_category', []));
        $LogistiqueetTransport = in_array('Logistique et Transport', $request->input('job_category', []));
        $FinanceetComptabilité = in_array('Finance et Comptabilité', $request->input('job_category', []));
        $ConseiletStratégie = in_array('Conseil et Stratégie', $request->input('job_category', []));
        $PlomberieetÉlectricité = in_array('Plomberie et Électricité', $request->input('job_category', []));
        $JardinageetPaysagisme = in_array('Jardinage et Paysagisme', $request->input('job_category', []));
        $NettoyageetEntretien = in_array('Nettoyage et Entretien', $request->input('job_category', []));
        $SécuritéetSurveillance = in_array('Sécurité et Surveillance', $request->input('job_category', []));
        $CuisineetRestauration = in_array('Cuisine et Restauration', $request->input('job_category', []));
        $CoiffureetEsthétique = in_array('Coiffure et Esthétique', $request->input('job_category', []));
        $MaintenanceetRéparationÉquipements = in_array("Maintenance et Réparation d'Équipements", $request->input('job_category', []));
        $EvénementieletAnimation = in_array('Evénementiel et Animation', $request->input('job_category', []));
        $BricolageetPetitsTravaux = in_array('Bricolage et Petits Travaux', $request->input('job_category', []));
        $BabysittingetGardedEnfants = in_array("Baby-sitting et Garde d'Enfants", $request->input('job_category', []));
        $ServicesauxAnimaux = in_array("Services aux Animaux", $request->input('job_category', []));
        $EnseignementetFormation = in_array("Enseignement et Formation", $request->input('job_category', []));
        $DéveloppementPersonnel = in_array("Développement Personnel", $request->input('job_category', []));
        $RédactiondeCVetLettresdeMotivation = in_array("Rédaction de CV et Lettres de Motivation", $request->input('job_category', []));
        $GraphismeetIllustration = in_array("Graphisme et Illustration", $request->input('job_category', []));
        $DéveloppementMobile = in_array("Développement Mobile", $request->input('job_category', []));
        $EcommerceetDropshipping = in_array("E-commerce et Dropshipping", $request->input('job_category', []));
        $RéparationdeVéhicules = in_array("Réparation de Véhicules", $request->input('job_category', []));
        $BienêtreetSpa = in_array("Bien-être et Spa", $request->input('job_category', []));
        $AccompagnementetServicesauxPersonnesÂgées = in_array("Accompagnement et Services aux Personnes Âgées", $request->input('job_category', []));
        $AssistanceJuridique = in_array("Assistance Juridique", $request->input('job_category', []));
        $ArchitectureetDesigndIntérieur = in_array("Architecture et Design d'Intérieur", $request->input('job_category', []));
        $ServicesFunéraires = in_array("Services Funéraires", $request->input('job_category', []));
        $AgricultureetElevage = in_array("Agriculture et Elevage", $request->input('job_category', []));
        $ProductionetRéalisationAudiovisuelle = in_array("Production et Réalisation Audiovisuelle", $request->input('job_category', []));
        $RestaurationetHôtellerie = in_array("Restauration et Hôtellerie", $request->input('job_category', []));
        $DécorationetAmeublement = in_array("Décoration et Ameublement", $request->input('job_category', []));
        $RecrutementetChassedeTêtes = in_array("Recrutement et Chasse de Têtes", $request->input('job_category', []));
        $GestiondePropriétésImmobilières = in_array("Gestion de Propriétés Immobilières", $request->input('job_category', []));
        $NutritionetDiététique = in_array("Nutrition et Diététique", $request->input('job_category', []));
        $ProgrammationetAutomatisation = in_array("Programmation et Automatisation", $request->input('job_category', []));
        $CommunityManagement = in_array("Community Management", $request->input('job_category', []));
        $ServicedeTraductionetInterprétation = in_array("Service de Traduction et Interprétation", $request->input('job_category', []));
        $IntelligenceArtificielleetMachineLearning = in_array("Intelligence Artificielle et Machine Learning", $request->input('job_category', []));

        $ConceptiondeJeuxVidéo = in_array("Conception de Jeux Vidéo", $request->input('job_category', []));
        $GestiondeProjets = in_array("Gestion de Projets", $request->input('job_category', []));
        $ServicesPhotographiques = in_array("Services Photographiques", $request->input('job_category', []));
        $RechercheetDéveloppement = in_array("Recherche et Développement", $request->input('job_category', []));
        $ServicesdAssurance = in_array("Services d'Assurance", $request->input('job_category', []));
        $DesigndeMode = in_array("Design de Mode", $request->input('job_category', []));
        $InformatiqueetRéseaux = in_array("Informatique et Réseaux", $request->input('job_category', []));
        $GestiondesDéchetsetRecyclage = in_array("Gestion des Déchets et Recyclage", $request->input('job_category', []));
        $BiensdeConsommationetRetail = in_array("Biens de Consommation et Retail", $request->input('job_category', []));

        return view('find-job', compact('jobs', 'fulltime', 'parttime', 'freelance', 'Débutant', 'Intermédiaire', 'Expert', 'oneTwoHund', 'oneHunOneThu', 'OneThuOneTwoThu', 'developmentWebLogical', 'designEtCreation', 'redictionEtTraduction', 'marketingEtVente', 'supportAdminstratif', 'servicesClient', 'formationEtCoacing', 'servicesTecnic', 'photographieEtVidéographie', 'santéEtBienêtre', 'ArtetDivertissement', 'ÉducationetTutorat', 'ConstructionetRénovation', 'LogistiqueetTransport', 'FinanceetComptabilité', 'ConseiletStratégie', 'PlomberieetÉlectricité', 'JardinageetPaysagisme', 'NettoyageetEntretien', 'SécuritéetSurveillance', 'CuisineetRestauration', 'CoiffureetEsthétique', 'MaintenanceetRéparationÉquipements', 'EvénementieletAnimation', 'BricolageetPetitsTravaux', 'BabysittingetGardedEnfants', 'ServicesauxAnimaux', 'EnseignementetFormation', 'DéveloppementPersonnel', 'RédactiondeCVetLettresdeMotivation', 'GraphismeetIllustration', 'DéveloppementMobile', 'EcommerceetDropshipping', 'RéparationdeVéhicules', 'BienêtreetSpa', 'AccompagnementetServicesauxPersonnesÂgées', 'AssistanceJuridique', 'ArchitectureetDesigndIntérieur', 'ServicesFunéraires', 'AgricultureetElevage', 'ProductionetRéalisationAudiovisuelle', 'RestaurationetHôtellerie', 'DécorationetAmeublement', 'RecrutementetChassedeTêtes', 'GestiondePropriétésImmobilières', 'NutritionetDiététique', 'ProgrammationetAutomatisation', 'CommunityManagement', 'ServicedeTraductionetInterprétation', 'IntelligenceArtificielleetMachineLearning', 'ConceptiondeJeuxVidéo', 'GestiondeProjets', 'ServicesPhotographiques', 'RechercheetDéveloppement', 'ServicesdAssurance', 'DesigndeMode', 'InformatiqueetRéseaux', 'GestiondesDéchetsetRecyclage', 'BiensdeConsommationetRetail'));
    }



    // all candidates list 
    public function allCandidates(Request $request)
    {
        $keywords = $request->keyword;
        $candidatesQuery = User::query()->inRandomOrder();

        if ($keywords) {
            $keywords = '%' . strtolower($keywords) . '%'; 
            $candidatesQuery->whereRaw('LOWER(fullname) like ?', [$keywords])
                            ->orWhereRaw('LOWER(username) like ?', [$keywords])
                            ->orWhereRaw('LOWER(job_category) like ?', [$keywords])
                            ->orWhereRaw('LOWER(tag) like ?', [$keywords]);
        }
        $candidates = $candidatesQuery->paginate(12);
        return view('all-candidates', compact('candidates'));
    }

      // for policy page
    public function policy()
    {
       return view('policy-and-confidentiality');
    }

}
