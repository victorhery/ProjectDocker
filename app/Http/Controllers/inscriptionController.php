<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Eleves;
use App\Models\Etudiant_lycee;
use App\Models\Annee_scolaire;
use Illuminate\Support\Facades\Session;
class inscriptionController extends Controller
{
    //gerer le vue
    public function list_lyce()
    {
        $valeure = Session::get('key');
        //$nom de variable = nom de modele corespondants::all
        //requete de selection
        $eleves = Etudiant_lycee::all();
        return view('etudiant.liste_lyce', compact('eleves','valeure'));
    }
    public function inscription()
    {
        $valeure = Session::get('key');
        $annee_scolaire = Annee_scolaire::pluck('Annee','id');
        $code_ecoles_Lycee = DB::table('users')->select('Nom_ecol','code_Nom_ecol')->where('divisins','=','lycee')->get();
        $dernier_IM_Ajout= Etudiant_lycee::latest()->first();
        $IM_Ajout=$dernier_IM_Ajout->IM + 1;
        $IM=sprintf("%04d", $IM_Ajout);
        return view('etudiant.inscription', compact('annee_scolaire', 'IM','code_ecoles_Lycee','valeure'));
    }
    //fonction miappel ny controller
    //fonction d'ajout
    public function ajouter_etudiant_lycee_traitement(Request $request)
    {
        //instanciation de variable user

        $request->validate([
            //nom dela champ dans la formulaire=> required,
            'Nom_elev' => 'required',
            'Cycle' => 'required',
            'IM' => 'required',
            'Annee_scolaire' => 'required',
            'Date_naissance' => 'required',
            'Lieu_naissances' => 'required',
            'Adresse_parents' => 'required',
            'code_Nom_ecol' => 'required',
        ]);
        
        //$nom de model = new nom de model nom de model
        $Etudiant_lycee = new Etudiant_lycee();
        //$user->nom_delaformat_ao_@_view=$Request->nom_de colone dans la bd
        $Etudiant_lycee->Nom_elev = $request->Nom_elev;
        $Etudiant_lycee->Prenom_eleve = $request->input('Prenom_eleve');
        $Etudiant_lycee->Cycle = $request->Cycle;
        $Etudiant_lycee->IM = $request->IM;
        $Etudiant_lycee->Annee_scolaire = $request->Annee_scolaire;
        $Etudiant_lycee->Date_naissance = $request->Date_naissance;
        $Etudiant_lycee->Lieu_naissances = $request->Lieu_naissances;
        $Etudiant_lycee->code_Nom_ecol = $request->code_Nom_ecol;
        if ($request->input('Nom_parents')!=null) {
            $request->validate(['profession_parents'=>'required',]);
            $Etudiant_lycee->Nom_parents = $request->input('Nom_parents');
            $Etudiant_lycee->profession_parents = $request->profession_parents;
        }
        elseif ($request->input('profession_parents')!=null) {
            $request->validate(['Nom_parents'=>'required',]);
            $Etudiant_lycee->Nom_parents = $request->Nom_parents;
            $Etudiant_lycee->profession_parents = $request->input('profession_parents');
        }
        else {
            $Etudiant_lycee->Nom_parents = $request->input('Nom_parents');
            $Etudiant_lycee->profession_parents = $request->input('profession_parents');
        }

        
        if ($request->input('Nom_mere')!=null) {
            $request->validate(['profession_mere'=>'required',]);
            $Etudiant_lycee->Nom_mere = $request->input('Nom_mere');
            $Etudiant_lycee->profession_mere = $request->profession_mere;
        }
        elseif ($request->input('profession_mere')!=null) {
            $request->validate(['Nom_mere'=>'required',]);
            $Etudiant_lycee->Nom_mere = $request->Nom_mere;
            $Etudiant_lycee->profession_mere = $request->input('profession_mere');
        }
        else {
            $Etudiant_lycee->Nom_mere = $request->input('Nom_mere');
            $Etudiant_lycee->profession_mere = $request->input('profession_mere');
        }

        if ($request->input('Nom_tuteur')!=null) {
            $request->validate(['profession_tuteurs'=>'required',]);
            $Etudiant_lycee->Nom_tuteur = $request->input('Nom_tuteur');
            $Etudiant_lycee->profession_tuteurs = $request->profession_tuteurs;
        }
        elseif ($request->input('profession_tuteurs')!=null) {
            $request->validate(['Nom_tuteur'=>'required',]);
            $Etudiant_lycee->Nom_tuteur = $request->Nom_tuteur;
            $Etudiant_lycee->profession_tuteurs = $request->input('profession_tuteurs');
        }
        else {
            $Etudiant_lycee->Nom_tuteur = $request->input('Nom_tuteur');
            $Etudiant_lycee->profession_tuteurs = $request->input('profession_tuteurs');
        }
        $Etudiant_lycee->Adresse_parents = $request->Adresse_parents;
        //methode save enregistrer dans la base de donne
        $Etudiant_lycee->save();
        
        //retour dans un page
        if ($Etudiant_lycee->save()) {
            //return redirect('/nom du route de rediriger')->with('status','messege afficher');
            return redirect('/inscription')->with('status', 'inscription succes');
        }
        else {
            return redirect()->back()->withErrors($request)->withInput();
            
        }
    }
    public function update_etudiant_lycee($id)
    {
        $valeure = Session::get('key');
        //recherche l'objet etudiant dans la model
        $annee_scolaire = Annee_scolaire::pluck('Annee','id');
        $eleves = Etudiant_lycee::find($id);
        $nom_ecoles_Lycee = DB::table('users')->select('Nom_ecol')->where('code_Nom_ecol',$eleves->code_Nom_ecol)->get();
        $code_ecoles_Lycee = DB::table('users')->select('Nom_ecol','code_Nom_ecol')->where('divisins','=','lycee')->get();
        // return view('NOM DE LA VUE', compact('nom de la table dens la bd'));
        return view('etudiant.etudiant_lycee_update', compact('eleves', 'annee_scolaire', 'nom_ecoles_Lycee', 'code_ecoles_Lycee','valeure'));
    }
    public function update_etudiant_lycee_traitement(Request $request)
    {
        $request->validate([
            //nom dela champ dans la formulaire=> required,
            'Nom_elev' => 'required',
            // 'Prenom_eleve' => 'required',
            'Cycle' => 'required',
            'IM' => 'required',
            'Annee_scolaire' => 'required',
            'Date_naissance' => 'required',
            'Lieu_naissances' => 'required',
            'Nom_parents' => 'required',
            'Adresse_parents' => 'required',
            'code_Nom_ecol' => 'required',
        ]);
        //instancier les objet etudiant
        //$nom de variable = new nom de la modele
        $Etudiant_lycee = Etudiant_lycee::find($request->id);
        //$user->nom_delaformat_ao_@_view=$Request->nom_de colone dans la bd
        $Etudiant_lycee->Nom_elev = $request->Nom_elev;
        $Etudiant_lycee->Prenom_eleve = $request->input('Prenom_eleve');
        $Etudiant_lycee->Cycle = $request->Cycle;
        $Etudiant_lycee->IM = $request->IM;
        $Etudiant_lycee->Annee_scolaire = $request->Annee_scolaire;
        $Etudiant_lycee->Date_naissance = $request->Date_naissance;
        $Etudiant_lycee->Lieu_naissances = $request->Lieu_naissances;
        $Etudiant_lycee->code_Nom_ecol = $request->code_Nom_ecol;
        if ($request->input('Nom_parents')!=null) {
            $request->validate(['profession_parents'=>'required',]);
            $Etudiant_lycee->Nom_parents = $request->input('Nom_parents');
            $Etudiant_lycee->profession_parents = $request->profession_parents;
        }
        elseif ($request->input('profession_parents')!=null) {
            $request->validate(['Nom_parents'=>'required',]);
            $Etudiant_lycee->Nom_parents = $request->Nom_parents;
            $Etudiant_lycee->profession_parents = $request->input('profession_parents');
        }
        else {
            $Etudiant_lycee->Nom_parents = $request->input('Nom_parents');
            $Etudiant_lycee->profession_parents = $request->input('profession_parents');
        }

        if ($request->input('Nom_mere')!=null) {
            $request->validate(['profession_mere'=>'required',]);
            $Etudiant_lycee->Nom_mere = $request->input('Nom_mere');
            $Etudiant_lycee->profession_mere = $request->profession_mere;
        }
        elseif ($request->input('profession_mere')!=null) {
            $request->validate(['Nom_mere'=>'required',]);
            $Etudiant_lycee->Nom_mere = $request->Nom_mere;
            $Etudiant_lycee->profession_mere = $request->input('profession_mere');
        }
        else {
            $Etudiant_lycee->Nom_mere = $request->input('Nom_mere');
            $Etudiant_lycee->profession_mere = $request->input('profession_mere');
        }

        if ($request->input('Nom_tuteur')!=null) {
            $request->validate(['profession_tuteurs'=>'required',]);
            $Etudiant_lycee->Nom_tuteur = $request->input('Nom_tuteur');
            $Etudiant_lycee->profession_tuteurs = $request->profession_tuteurs;
        }
        elseif ($request->input('profession_tuteurs')!=null) {
            $request->validate(['Nom_tuteur'=>'required',]);
            $Etudiant_lycee->Nom_tuteur = $request->Nom_tuteur;
            $Etudiant_lycee->profession_tuteurs = $request->input('profession_tuteurs');
        }
        else {
            $Etudiant_lycee->Nom_tuteur = $request->input('Nom_tuteur');
            $Etudiant_lycee->profession_tuteurs = $request->input('profession_tuteurs');
        }
        // $Etudiant_lycee->Nom_parents = $request->Nom_parents;
        $Etudiant_lycee->Adresse_parents = $request->Adresse_parents;
        //methode save enregistrer dans la base de donne
        $Etudiant_lycee->update();
        //retour dans un page
        //return redirect('/nom du route de rediriger')->with('status','messege afficher');
        return redirect('/liste_lycee')->with('status', 'modification succes');
    }
    //fonction suprimer
    public function delete_etudiant_lycee($id)
    {
        // cherchel l'id dans la base de donne
        $eleve = Etudiant_lycee::find($id);
        // methode suorimer
        $eleve->delete();
        return redirect('/liste_lycee')->with('status', 'Supression succes');
    }
}
