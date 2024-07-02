<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Etudiants;
use App\Models\Annee_scolaire;
use Illuminate\Support\Facades\Session;
class EtudiantController extends Controller
{
    public function list_etudiant()
    {
        //$nom de variable = nom de modele corespondants::all
        //requete de selection
        $etudiants = Etudiants::all();
        return view('etudiant.liste', compact('etudiants'));
    }
    public function ajouter_etudiant()
    {
        $annee_scolaire = Annee_scolaire::pluck('Annee','id');
        $code_ecoles_ceg = DB::table('users')->select('Nom_ecol','code_Nom_ecol')->where('divisins','=','ceg')->get();
        $ID_dernier_element_ajouter = DB::table('etudiants')->select('code_Nom_ecol')->orderBy('id','desc')->take(1)->get();
        $option = [];
        foreach ($ID_dernier_element_ajouter as $element) {
            $dernier_nom_ecoles_ceg = DB::table('users')->select('Nom_ecol')->where('code_Nom_ecol',$element->code_Nom_ecol)->get();
            foreach ($dernier_nom_ecoles_ceg as $nom_dernier) {
                $option1[$nom_dernier->Nom_ecol] = $nom_dernier->Nom_ecol; 
                $option[$element->code_Nom_ecol] = $element->code_Nom_ecol; 
            }
            
        }
        $dernier_IM_Ajout= Etudiants::latest()->first();
        $IM_Ajout=$dernier_IM_Ajout->IM + 1;
        // dd($code_ecoles_ceg);
        $IM=sprintf("%04d", $IM_Ajout);
        
        $valeure = Session::get('key');
        // Pour récupérer une valeur d'un tableau
        $tableauValeurs = Session::get('tableau_key');
        return view('etudiant.ajouter', compact('annee_scolaire', 'code_ecoles_ceg', 'IM', 'option', 'option1', 'valeure'));
    }
    public function ajouter_etudiant_traitement(Request $request)
    {
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
        //instancier les objet etudiant
        //$nom de variable = new nom de la modele
        $etudiant = new Etudiants();
        //$user->nom_delaformat_ao_@_view=$Request->nom_de colone dans la bd
        $etudiant->Nom_elev = $request->Nom_elev;
        $etudiant->Prenom_eleve = $request->input('Prenom_eleve');
        $etudiant->Cycle = $request->Cycle;
        $etudiant->IM = $request->IM;
        $etudiant->Annee_scolaire = $request->Annee_scolaire;
        $etudiant->Date_naissance = $request->Date_naissance;
        $etudiant->Lieu_naissances = $request->Lieu_naissances;
        $etudiant->code_Nom_ecol = $request->code_Nom_ecol;
        if ($request->input('Nom_parents')!=null) {
            $request->validate(['profession_parents'=>'required',]);
            $etudiant->Nom_parents = $request->input('Nom_parents');
            $etudiant->profession_parents = $request->profession_parents;
        }
        elseif ($request->input('profession_parents')!=null) {
            $request->validate(['Nom_parents'=>'required',]);
            $etudiant->Nom_parents = $request->Nom_parents;
            $etudiant->profession_parents = $request->input('profession_parents');
        }
        else {
            $etudiant->Nom_parents = $request->input('Nom_parents');
            $etudiant->profession_parents = $request->input('profession_parents');
        }

        if ($request->input('Nom_mere')!=null) {
            $request->validate(['profession_mere'=>'required',]);
            $etudiant->Nom_mere = $request->input('Nom_mere');
            $etudiant->profession_mere = $request->profession_mere;
        }
        elseif ($request->input('profession_mere')!=null) {
            $request->validate(['Nom_mere'=>'required',]);
            $etudiant->Nom_mere = $request->Nom_mere;
            $etudiant->profession_mere = $request->input('profession_mere');
        }
        else {
            $etudiant->Nom_mere = $request->input('Nom_mere');
            $etudiant->profession_mere = $request->input('profession_mere');
        }

        if ($request->input('Nom_tuteur')!=null) {
            $request->validate(['profession_tuteurs'=>'required',]);
            $etudiant->Nom_tuteur = $request->input('Nom_tuteur');
            $etudiant->profession_tuteurs = $request->profession_tuteurs;
        }
        elseif ($request->input('profession_tuteurs')!=null) {
            $request->validate(['Nom_tuteur'=>'required',]);
            $etudiant->Nom_tuteur = $request->Nom_tuteur;
            $etudiant->profession_tuteurs = $request->input('profession_tuteurs');
        }
        else {
            $etudiant->Nom_tuteur = $request->input('Nom_tuteur');
            $etudiant->profession_tuteurs = $request->input('profession_tuteurs');
        }
       
        $etudiant->Adresse_parents = $request->Adresse_parents;
        //methode save enregistrer dans la base de donne
        $etudiant->save();
        if ($etudiant->save()) {
            return redirect('/ajouter')->with('status', 'inscription successss');
        }
        else {
            return redirect()->back()->withErrors($request)->withInput();
            
        }
        //retour dans un page
        //return redirect('/nom du route de rediriger')->with('status','messege afficher');
        
    }
    //recuperetion des element dans la base de donne sur la modification
    public function update_etudiant($id)
    {
        $valeure = Session::get('key');
        // Pour récupérer une valeur d'un tableau
        $tableauValeurs = Session::get('tableau_key');
        //recherche l'objet etudiant dans la model
        $etudiants = Etudiants::find($id);
        $nom_ecoles_ceg = DB::table('users')->select('Nom_ecol')->where('code_Nom_ecol',$etudiants->code_Nom_ecol)->get();
        // dd($nom_ecoles_ceg);
        $annee_scolaire = Annee_scolaire::pluck('Annee','id');
        $code_ecoles_ceg = DB::table('users')->select('Nom_ecol','code_Nom_ecol')->where('divisins','=','ceg')->get();
        return view('etudiant.etudiant_ceg_update', compact('etudiants','annee_scolaire','code_ecoles_ceg','nom_ecoles_ceg', 'valeure'));
    }
    //modifier fonction
    public function update_etudiant_traitement(Request $request)
    {
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
        //instancier les objet etudiant
        //$nom de variable = new nom de la modele
        $etudiant = Etudiants::find($request->id);
        //$user->nom_delaformat_ao_@_view=$Request->nom_de colone dans la bd
        $etudiant->Nom_elev = $request->Nom_elev;
        $etudiant->Prenom_eleve = $request->input('Prenom_eleve');
        $etudiant->Cycle = $request->Cycle;
        $etudiant->IM = $request->IM;
        $etudiant->Annee_scolaire = $request->Annee_scolaire;
        $etudiant->Date_naissance = $request->Date_naissance;
        $etudiant->Lieu_naissances = $request->Lieu_naissances;
        $etudiant->code_Nom_ecol = $request->code_Nom_ecol;
        if ($request->input('Nom_parents')!=null) {
            $request->validate(['profession_parents'=>'required',]);
            $etudiant->Nom_parents = $request->input('Nom_parents');
            $etudiant->profession_parents = $request->profession_parents;
        }
        elseif ($request->input('profession_parents')!=null) {
            $request->validate(['Nom_parents'=>'required',]);
            $etudiant->Nom_parents = $request->Nom_parents;
            $etudiant->profession_parents = $request->input('profession_parents');
        }
        else {
            $etudiant->Nom_parents = $request->input('Nom_parents');
            $etudiant->profession_parents = $request->input('profession_parents');
        }

        if ($request->input('Nom_mere')!=null) {
            $request->validate(['profession_mere'=>'required',]);
            $etudiant->Nom_mere = $request->input('Nom_mere');
            $etudiant->profession_mere = $request->profession_mere;
        }
        elseif ($request->input('profession_mere')!=null) {
            $request->validate(['Nom_mere'=>'required',]);
            $etudiant->Nom_mere = $request->Nom_mere;
            $etudiant->profession_mere = $request->input('profession_mere');
        }
        else {
            $etudiant->Nom_mere = $request->input('Nom_mere');
            $etudiant->profession_mere = $request->input('profession_mere');
        }

        if ($request->input('Nom_tuteur')!=null) {
            $request->validate(['profession_tuteurs'=>'required',]);
            $etudiant->Nom_tuteur = $request->input('Nom_tuteur');
            $etudiant->profession_tuteurs = $request->profession_tuteurs;
        }
        elseif ($request->input('profession_tuteurs')!=null) {
            $request->validate(['Nom_tuteur'=>'required',]);
            $etudiant->Nom_tuteur = $request->Nom_tuteur;
            $etudiant->profession_tuteurs = $request->input('profession_tuteurs');
        }
        else {
            $etudiant->Nom_tuteur = $request->input('Nom_tuteur');
            $etudiant->profession_tuteurs = $request->input('profession_tuteurs');
        }
        
        //methode save enregistrer dans la base de donne
        $etudiant->update();
        //retour dans un page
        //return redirect('/nom du route de rediriger')->with('status','messege afficher');
        return redirect('/students')->with('status', 'modification succes');
    }
    public function delete_etudiant_ceg($id)
    {
        // cherchel l'id dans la base de donne
        $etudiant = Etudiants::find($id);
        // methode suorimer
        $etudiant->delete();
        return redirect('/students')->with('status', 'Supression succes');
    }
}
