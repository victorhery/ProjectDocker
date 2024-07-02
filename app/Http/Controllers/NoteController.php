<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Matiere_ceg;
use App\Models\matiere_lycee;
use App\Models\Classe_ceg;
use App\Models\Classe_lycee;
use App\Models\Etudiants;
use App\Models\Etudiant_lycee;
use App\Models\Eleves;
use App\Models\Annee_scolaire;
use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class NoteController extends Controller
{
    //
    public function note()
    {
        return view ('note.note');
    }

    public function matiere_ceg()
    {
        return view ('note.matiere_ceg');
    }
    public function matiere_ceg_traitement(Request $request)
    {
        $request->validate([
            //nom dela champ dans la formulaire=> required,
            'matieres' => 'required',
            'Code_matiere' => 'required',
            'Coef' => 'required',
        ]);
        //instancier les objet etudiant
        //$nom de variable = new nom de la modele
        $matiere_ceg = new Matiere_ceg();
        //$user->nom_delaformat_ao_@_view=$Request->nom_de colone dans la bd
        $matiere_ceg->matieres = $request->matieres;
        $matiere_ceg->Code_matiere = $request->Code_matiere;
        $matiere_ceg->Coef = $request->Coef;
        //methode save enregistrer dans la base de donne
        $matiere_ceg->save();
        //retour dans un page
        //return redirect('/nom du route de rediriger')->with('status','messege afficher');
        return redirect('/matiere_ceg')->with('status', 'Ajout matiere succes');
    }
    public function liste_matiere_ceg()
    {
        //$nom de variable = nom de modele corespondants::all
        //requete de selection
        $matiere_ceg = Matiere_ceg::all();
        return view('note.liste_matiere_ceg', compact('matiere_ceg'));
    }
    public function update_matiere_ceg($id)
    {
        //recherche l'objet etudiant dans la model
        $matiere_ceg = Matiere_ceg::find($id);
        // return view('NOM DE LA VUE', compact('nom de la table dens la bd'));
        return view('note.update_matiere_ceg', compact('matiere_ceg'));
    }
    public function update_matiere_ceg_traitement(Request $request)
    {
        $request->validate([
            //nom dela champ dans la formulaire=> required,
            'matieres' => 'required',
            'Code_matiere' => 'required',
            'Coef' => 'required',
        ]);
        //instancier les objet etudiant
        //$nom de variable = new nom de la modele
        $matiere_ceg = Matiere_ceg::find($request->id);
        //$user->nom_delaformat_ao_@_view=$Request->nom_de colone dans la bd
        $matiere_ceg->matieres = $request->matieres;
        $matiere_ceg->Code_matiere = $request->Code_matiere;
        $matiere_ceg->Coef = $request->Coef;
        //methode save enregistrer dans la base de donne
        $matiere_ceg->update();
        //retour dans un page
        //return redirect('/nom du route de rediriger')->with('status','messege afficher');
        return redirect('/liste_matiere_ceg')->with('status', 'modification succes');
    }
    public function delete_matiere_ceg($id)
    {
        // cherchel l'id dans la base de donne
        $matiere_ceg = Matiere_ceg::find($id);
        // methode suorimer
        $matiere_ceg->delete();
        return redirect('/liste_matiere_ceg')->with('status', 'Supression succes');
    }

    public function matiere_lycee()
    {
        return view ('note.matiere_lycee');
    }
    public function matiere_lycee_traitement(Request $request)
    {
        $request->validate([
            //nom dela champ dans la formulaire=> required,
            'matieres' => 'required',
            'Code_matiere' => 'required',
            'Coef' => 'required',
            'Cycle' => 'required',
        ]);
        //instancier les objet etudiant
        //$nom de variable = new nom de la modele
        $matiere_lycee = new matiere_lycee();
        //$user->nom_delaformat_ao_@_view=$Request->nom_de colone dans la bd
        $matiere_lycee->matieres = $request->matieres;
        $matiere_lycee->Code_matiere = $request->Code_matiere;
        $matiere_lycee->Coef = $request->Coef;
        $matiere_lycee->Cycle = $request->Cycle;
        //methode save enregistrer dans la base de donne
        $matiere_lycee->save();
        //retour dans un page
        //return redirect('/nom du route de rediriger')->with('status','messege afficher');
        return redirect('/matiere_lycee')->with('status', 'Ajout matiere succes');
    }
    public function liste_matiere_lycee()
    {
        //$nom de variable = nom de modele corespondants::all
        //requete de selection
        $matiere_lycee = matiere_lycee::all();
        return view('note.liste_matiere_lycee', compact('matiere_lycee'));
    }
    public function update_matiere_lycee($id)
    {
        //recherche l'objet etudiant dans la model
        $matiere_lycee = matiere_lycee::find($id);
        // return view('NOM DE LA VUE', compact('nom de la table dens la bd'));
        return view('note.update_matiere_lycee', compact('matiere_lycee'));
    }
    public function update_matiere_lycee_traitement(Request $request)
    {
        $request->validate([
            //nom dela champ dans la formulaire=> required,
            'matieres' => 'required',
            'Code_matiere' => 'required',
            'Coef' => 'required',
            'Cycle' => 'required',
        ]);
        //instancier les objet etudiant
        //$nom de variable = new nom de la modele
        $matiere_lycee = matiere_lycee::find($request->id);
        //$user->nom_delaformat_ao_@_view=$Request->nom_de colone dans la bd
        $matiere_lycee->matieres = $request->matieres;
        $matiere_lycee->Code_matiere = $request->Code_matiere;
        $matiere_lycee->Coef = $request->Coef;
        $matiere_lycee->Cycle = $request->Cycle;
        //methode save enregistrer dans la base de donne
        $matiere_lycee->update();
        //retour dans un page
        //return redirect('/nom du route de rediriger')->with('status','messege afficher');
        return redirect('/liste_matiere_lycee')->with('status', 'modification succes');
    }
    public function delete_matiere_lycee($id)
    {
        // cherchel l'id dans la base de donne
        $matiere_lycee = matiere_lycee::find($id);
        // methode suorimer
        $matiere_lycee->delete();
        return redirect('/liste_matiere_lycee')->with('status', 'Supression succes');
    }

    public function examin_lycee()
    {
        //recherche l'objet etudiant dans la model
        $classe_lycees = Classe_lycee::pluck('Cycle','id');
        // return view('NOM DE LA VUE', compact('nom de la table dens la bd'));
        return view('note.examin_lycee',compact('classe_lycees'));
    }
    public function examin()
    {
        //recherche l'objet etudiant dans la model
        $classe_cegs = Classe_ceg::pluck('Cycle','id');
        // return view('NOM DE LA VUE', compact('nom de la table dens la bd'));
        return view('note.examin',compact('classe_cegs'));
    }

   

    public function liste_eleve_parclass_ceg($Cycle)
    {
        // $Etudiants = Etudiants::find($Cycle);
        return view('note.liste_eleve_parclass_ceg', compact('standards', 'results'));
    }

    
    public function examin_action_affiche_liste_ceg(Request $Cycle)
    {
        //requette de annescollaire
        $annee_scolaire = Annee_scolaire::pluck('Annee','id');
        //recherche l'objet etudiant dans la model
        // dd($Cycle->Cycle);
        $Etudiants = Etudiants::where('Cycle', $Cycle->Cycle)->get();
        
        // $Etudiants = DB::table('etudiants')->where('Cycle', $Cycle)->where('Annee_scolaire', $Annee_scolaire)->get();
        // return view('NOM DE LA VUE', compact('nom de la table dens la bd'));
        return view('note.liste_eleve_parclass_ceg', compact('Etudiants','annee_scolaire'));
    }
    public function examin_action_affiche_information_eleve_lycee(Request $Cycle)
    {
        //recherche l'objet etudiant dans la model
        //dd($Cycle->Cycle); 
        $eleves = Eleves::where('Cycle', $Cycle->Cycle)->get();
        // return view('NOM DE LA VUE', compact('nom de la table dens la bd'));
        return view('note.ajout_note_lycee', compact('eleves'));
    }

    public function ajout_note_ceg()
    {
        // return view('NOM DE LA VUE', compact('nom de la table dens la bd'));
        //requete de selection
        return view('note.ajout_note_ceg');
    }
    public function ajout_note_lycee()
    {
        // return view('NOM DE LA VUE', compact('nom de la table dens la bd'));
        //requete de selection
        return view('note.ajout_note_lycee');
    }
    
    //recuperetion des element dans la base de donne sur la modification
    public function ajout_note_ceg_afiche($id, Request $matiere_cegs)
    {
        //recherche l'objet etudiant dans la model
        $etudiants = Etudiants::find($id);
        $matiere_cegs = Matiere_ceg::pluck('matieres','id','Coef','Code_matiere');
        //$annee_scolaire = Annee_scolaire::pluck('Annee','id');
        return view('note.ajout_note_ceg', compact('etudiants','matiere_cegs'));
    }
    
    public function ajouter_note_traitement(Request $request)
    {
        $request->validate([
            //nom dela champ dans la formulaire=> required,
            'matiere' => 'required',
            'Num_bulletin' => 'required',
            'Annee_scolaire' => 'required',
            'Note' => 'required',
            'IM' => 'required',
            'Nom_elev' => 'required',
            'Prenom_eleve' => 'required',
            'Cycle' => 'required',
            'id_elev' => 'required',
        ]);
        //instancier les objet etudiant
        //$nom de variable = new nom de la modele
        $note = new Note();
        //$user->nom_delaformat_ao_@_view=$Request->nom_de colone dans la bd
        $note->matiere = $request->matiere;
        $note->Num_bulletin = $request->Num_bulletin;
        $note->Annee_scolaire = $request->Annee_scolaire;
        $note->Note = $request->Note;
        $note->IM = $request->IM;
        $note->Nom_elev = $request->Nom_elev;
        $note->Prenom_eleve = $request->Prenom_eleve;
        $note->Cycle = $request->Cycle;
        $note->id_elev = $request->id_elev;
        //methode save enregistrer dans la base de donne
        $note->save();
        session()->flash('success', 'L\'élèment a étè ajouté avec succès.');
        //retour dans un page
        //return redirect('/nom du route de rediriger')->with('status','messege afficher');
        return redirect()->route('students');
    }
    public function liste_note_ceg()
    {
        //
        $Note = DB::table('notes')->join('matiere_cegs','notes.matiere','=','matiere_cegs.matieres')->select('*')->get();
        return view('note.liste_note_ceg', compact('Note'));
    }
    public function update_note_ceg($id)
    {
        //recherche l'objet etudiant dans la model
        $Note = Note::find($id);
        $matiere_cegs = Matiere_ceg::pluck('matieres','id','Coef','Code_matiere');
        // return view('NOM DE LA VUE', compact('nom de la table dens la bd'));
        return view('note.update_note_ceg', compact('Note', 'matiere_cegs'));
    }
    public function update_note_ceg_traitement(Request $request)
    {
        $request->validate([
            //nom dela champ dans la formulaire=> required,
            'matiere' => 'required',
            'Num_bulletin' => 'required',
            'Note' => 'required',
        ]);
        //instancier les objet etudiant
        //$nom de variable = new nom de la modele
        $note = Note::find($request->id);
        //$user->nom_delaformat_ao_@_view=$Request->nom_de colone dans la bd
        $note->matiere = $request->matiere;
        $note->Num_bulletin = $request->Num_bulletin;
        $note->Note = $request->Note;
        //methode save enregistrer dans la base de donne
        $note->update();
        //retour dans un page
        //return redirect('/nom du route de rediriger')->with('status','messege afficher');
        return redirect('/liste_note_ceg')->with('status', 'Modification note succes');
    }
    public function delete_note_ceg($id)
    {
        // cherchel l'id dans la base de donne
        $note = Note::find($id);
        // methode suorimer
        $note->delete();
        return redirect('/liste_note_ceg')->with('status', 'Supression succes');
    }
//Affiche le ongle bultin ceg
    public function bulletin_ceg()
    {
        //
        return view('note.bulletin_ceg');
    }
    //affiche les element dans la vullti ceg
    public function bulletin_ceg_afiche($id,Request $Cycle,Annee_scolaire $Annee_scolaire,Note $Num_bulletin )
    {
        //Session des chaque ecolle qui s'authentifier
        $valeure = Session::get('key');
        // Pour récupérer une valeur d'un tableau
        $tableauValeurs = Session::get('tableau_key');
        //recherche l'objet etudiant dans la model
        $etudiants = Etudiants::find($id);
        
        //moyenne de classe 1ere trimestre
        $malagasy_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_MJ1');
        $malagasy_EX1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_EX1');
        
        $francais_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_MJ1');
        $francais_EX1Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_EX1');
        
        $anglais_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_MJ1');
        $anglais_EX1Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_EX1');
        
        $hg_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_MJ1');
        $hg_EX1Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_EX1');
        
        $ec_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_MJ1');
        $ec_EX1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_EX1');
        
        $mths_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_MJ1');
        $mths_EX1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_EX1');
        
        $pc_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_MJ1');
        $pc_EX1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_EX1');
        
        $svt_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_MJ1');
        $svt_EX1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_EX1');
        
        $eps_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_MJ1');
        $eps_EX1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_EX1');
        $Note_classe_1Trimestre = $malagasy_MJ1_Sum + $malagasy_EX1_Sum + $francais_MJ1_Sum + $francais_EX1Sum + $anglais_MJ1_Sum + $anglais_EX1Sum + $hg_MJ1_Sum + $hg_EX1Sum + $ec_MJ1_Sum + $ec_EX1_Sum + $mths_MJ1_Sum + $mths_EX1_Sum + $pc_MJ1_Sum + $pc_EX1_Sum + $svt_MJ1_Sum + $svt_EX1_Sum + $eps_MJ1_Sum + $eps_EX1_Sum;
        //
        $count_nombre_elev=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->count('Nom_elev');
        $MOYENNE_CLASSE1=round($Note_classe_1Trimestre/($count_nombre_elev*40),2);

        //moyenne de classe 2eme trimestre
        $malagasy_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_MJ2');
        $malagasy_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_EX2');
        
        $francais_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_MJ2');
        $francais_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_EX2');
        
        $anglais_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_MJ2');
        $anglais_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_EX2');
        
        $hg_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_MJ2');
        $hg_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_EX2');
        
        $ec_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_MJ2');
        $ec_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_EX2');
        
        $mths_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_MJ2');
        $mths_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_EX2');
        
        $pc_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_MJ2');
        $pc_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_EX2');
        
        $svt_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_MJ2');
        $svt_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_EX2');
        
        $eps_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_MJ2');
        $eps_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_EX2');
        $Note_classe_2Trimestre = $malagasy_MJ2_Sum + $malagasy_EX2_Sum + $francais_MJ2_Sum + $francais_EX2_Sum + $anglais_MJ2_Sum + $anglais_EX2_Sum + $hg_MJ2_Sum + $hg_EX2_Sum + $ec_MJ2_Sum + $ec_EX2_Sum + $mths_MJ2_Sum + $mths_EX2_Sum + $pc_MJ2_Sum + $pc_EX2_Sum + $svt_MJ2_Sum + $svt_EX2_Sum + $eps_MJ2_Sum + $eps_EX2_Sum;
        //
        $MOYENNE_CLASSE2=round($Note_classe_2Trimestre/($count_nombre_elev*40),2);

        //moyenne de classe 3eme trimestre
        $malagasy_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_MJ3');
        $malagasy_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_EX3');
        
        $francais_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_MJ3');
        $francais_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_EX3');
        
        $anglais_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_MJ3');
        $anglais_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_EX3');
        
        $hg_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_MJ3');
        $hg_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_EX3');
        
        $ec_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_MJ3');
        $ec_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_EX3');
        
        $mths_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_MJ3');
        $mths_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_EX3');
        
        $pc_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_MJ3');
        $pc_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_EX3');
        
        $svt_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_MJ3');
        $svt_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_EX3');
        
        $eps_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_MJ3');
        $eps_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_EX3');
        $Note_classe_3Trimestre = $malagasy_MJ3_Sum + $malagasy_EX3_Sum + $francais_MJ3_Sum + $francais_EX3_Sum + $anglais_MJ3_Sum + $anglais_EX3_Sum + $hg_MJ3_Sum + $hg_EX3_Sum + $ec_MJ3_Sum + $ec_EX3_Sum + $mths_MJ3_Sum + $mths_EX3_Sum + $pc_MJ3_Sum + $pc_EX3_Sum + $svt_MJ3_Sum + $svt_EX3_Sum + $eps_MJ3_Sum + $eps_EX3_Sum;
        //
        $MOYENNE_CLASSE3=round($Note_classe_3Trimestre/($count_nombre_elev*40),2);
        
        //1er trimestre
        $TOTAL1 = round($etudiants->Mal_MJ1 + $etudiants->Frs_MJ1 + $etudiants->Ang_MJ1 + $etudiants->HG_MJ1 + $etudiants->EC_MJ1 + $etudiants->Mths_MJ1 +  $etudiants->PC_MJ1 + $etudiants->SVT_MJ1 + $etudiants->EPS_MJ1,2);
        $TOTAL2 = round($etudiants->Mal_EX1 + $etudiants->Frs_EX1 + $etudiants->Ang_EX1 + $etudiants->HG_EX1 + $etudiants->EC_EX1 + $etudiants->Mths_EX1 +  $etudiants->PC_EX1 + $etudiants->SVT_EX1 + $etudiants->EPS_EX1,2);
        
        $MG11 = round(($etudiants->Mal_MJ1 + $etudiants->Mal_EX1)/6,2);
        $MG12 = round(($etudiants->Frs_MJ1 + $etudiants->Frs_EX1)/4,2);
        $MG13 = round(($etudiants->Ang_MJ1 + $etudiants->Ang_EX1)/4,2);
        $MG14 = round(($etudiants->HG_MJ1 + $etudiants->HG_EX1)/6,2);
        $MG15 = round(($etudiants->EC_MJ1 + $etudiants->EC_EX1)/2,2);
        $MG16 = round(($etudiants->Mths_MJ1 + $etudiants->Mths_EX1)/6,2);
        $MG17 = round(($etudiants->PC_MJ1 + $etudiants->PC_EX1)/4,2);
        $MG18 = round(($etudiants->SVT_MJ1 + $etudiants->SVT_EX1)/6,2);
        $MG19 = round(($etudiants->EPS_MJ1 + $etudiants->EPS_EX1)/2,2);

        $MG1T = round(($TOTAL1 + $TOTAL2)/40,2);
        $Moyenne1 = round($TOTAL1/20,2);//Moyenne journaliere
        $Moyenne_Ex1 = round($TOTAL2/20,2);//Moyenne examin
        $TOTALMG1 = round($MG11+$MG12+$MG13+$MG14+$MG15+$MG16+$MG17+$MG18+$MG19,2);
        $MG1M = round($TOTALMG1/9,2); //moyenne 1ére trimestre
        
        //2eme trimestre
        $TOTAL3 = round($etudiants->Mal_MJ2 + $etudiants->Frs_MJ2 + $etudiants->Ang_MJ2 + $etudiants->HG_MJ2 + $etudiants->EC_MJ2 + $etudiants->Mths_MJ2 +  $etudiants->PC_MJ2 + $etudiants->SVT_MJ2 + $etudiants->EPS_MJ2,2);
        $TOTAL4 = round($etudiants->Mal_EX2 + $etudiants->Frs_EX2 + $etudiants->Ang_EX2 + $etudiants->HG_EX2 + $etudiants->EC_EX2 + $etudiants->Mths_EX2 +  $etudiants->PC_EX2 + $etudiants->SVT_EX2 + $etudiants->EPS_EX2,2);
        $MG2T = round(($TOTAL3 + $TOTAL4)/40,2);
        $Moyenne3 = round($TOTAL3/20,2);

        $MG21 = round(($etudiants->Mal_MJ2 + $etudiants->Mal_EX2)/6,2); 
        $MG22 = round(($etudiants->Frs_MJ2 + $etudiants->Frs_EX2)/4,2);
        $MG23 = round(($etudiants->Ang_MJ2 + $etudiants->Ang_EX2)/4,2);
        $MG24 = round(($etudiants->HG_MJ2 + $etudiants->HG_EX2)/6,2);
        $MG25 = round(($etudiants->EC_MJ2 + $etudiants->EC_EX2)/2,2);
        $MG26 = round(($etudiants->Mths_MJ2 + $etudiants->Mths_EX2)/6,2);
        $MG27 = round(($etudiants->PC_MJ2 + $etudiants->PC_EX2)/4,2);
        $MG28 = round(($etudiants->SVT_MJ2 + $etudiants->SVT_EX2)/6,2);
        $MG29 = round(($etudiants->EPS_MJ2 + $etudiants->EPS_EX2)/2,2);

        $TOTALMG2 = round($MG21+$MG22+$MG23+$MG24+$MG25+$MG26+$MG27+$MG28+$MG29,2);
        $Moyenne_Ex2 = round($TOTAL4/20,2);
        $MG2M = round($TOTALMG2/9,2); 
        
        //3éme trimestre
        $TOTAL5 = round($etudiants->Mal_MJ3 + $etudiants->Frs_MJ3 + $etudiants->Ang_MJ3 + $etudiants->HG_MJ3 + $etudiants->EC_MJ3 + $etudiants->Mths_MJ3 +  $etudiants->PC_MJ3 + $etudiants->SVT_MJ3 + $etudiants->EPS_MJ3,2);
        $TOTAL6 = round($etudiants->Mal_EX3 + $etudiants->Frs_EX3 + $etudiants->Ang_EX3 + $etudiants->HG_EX3 + $etudiants->EC_EX3 + $etudiants->Mths_EX3 +  $etudiants->PC_EX3 + $etudiants->SVT_EX3 + $etudiants->EPS_EX3,2);
        $MG3T = round(($TOTAL5 + $TOTAL6)/40,2);
        $Moyenne5 = round($TOTAL5/20,2);

        $MG31 = round(($etudiants->Mal_MJ3 + $etudiants->Mal_EX3)/6,2);
        $MG32 = round(($etudiants->Frs_MJ3 + $etudiants->Frs_EX3)/4,2);
        $MG33 = round(($etudiants->Ang_MJ3 + $etudiants->Ang_EX3)/4,2);
        $MG34 = round(($etudiants->HG_MJ3 + $etudiants->HG_EX3)/6,2);
        $MG35 = round(($etudiants->EC_MJ3 + $etudiants->EC_EX3)/2,2);
        $MG36 = round(($etudiants->Mths_MJ3 + $etudiants->Mths_EX3)/6,2);
        $MG37 = round(($etudiants->PC_MJ3 + $etudiants->PC_EX3)/4,2);
        $MG38 = round(($etudiants->SVT_MJ3 + $etudiants->SVT_EX3)/6,2);
        $MG39 = round(($etudiants->EPS_MJ3 + $etudiants->EPS_EX3)/2,2);

        $TOTALMG3 = round($MG31+$MG32+$MG33+$MG34+$MG35+$MG36+$MG37+$MG38+$MG39,2);
        $Moyenne_Ex3 = round($TOTAL6/20,2);
        $MG3M = round($TOTALMG3/9,2);

        //Moyenne generale
        $MOYENNE_GENERALE = round(($MG1M + $MG2M +$MG3M)/3,2);
         return view('note.bulletin_ceg', compact('etudiants', 'TOTAL1', 'TOTAL2','MG1T', 'Moyenne1','Moyenne_Ex1','MG11', 'MG12', 'MG13', 'MG14', 'MG15', 'MG16', 'MG17', 'MG18', 'MG19', 'MG1M','TOTALMG1','TOTAL3', 'TOTAL4','MG2T', 'Moyenne3', 'Moyenne_Ex2', 'MG21', 'MG22', 'MG23', 'MG24', 'MG25', 'MG26', 'MG27', 'MG28', 'MG29', 'TOTALMG2','MG2M', 'TOTAL5', 'TOTAL6', 'MG3T', 'Moyenne5', 'MG31', 'MG32', 'MG33', 'MG34', 'MG35', 'MG36', 'MG37', 'MG38', 'MG39', 'TOTALMG3', 'Moyenne_Ex3','MG3M', 'MOYENNE_GENERALE', 'MOYENNE_CLASSE1','MOYENNE_CLASSE2', 'MOYENNE_CLASSE3', 'valeure'));
    }
    public function Enregistrer_note_ceg_traitement(Request $request)
    {
         //Session des chaque ecolle qui s'authentifier
         $valeure = Session::get('key');
         // Pour récupérer une valeur d'un tableau
         $tableauValeurs = Session::get('tableau_key');
        //instancier les objet etudiant
        //$nom de variable = new nom de la modele
        $note_etudiants = Etudiants::find($request->id);
        // dd($note_etudiants->Etat_class);
        
        if ($note_etudiants->Etat_class=='0') {
            //$user->nom_delaformat_ao_@_view=$Request->nom_de colone dans la bd
            $note_etudiants->Mal_MJ1 = $request->input('Mal_MJ1');
            $note_etudiants->Frs_MJ1 = $request->input('Frs_MJ1');
            $note_etudiants->Ang_MJ1 = $request->input('Ang_MJ1');
            $note_etudiants->HG_MJ1 = $request->input('HG_MJ1');
            $note_etudiants->EC_MJ1 = $request->input('EC_MJ1');
            $note_etudiants->Mths_MJ1 = $request->input('Mths_MJ1');
            $note_etudiants->PC_MJ1 = $request->input('PC_MJ1');
            $note_etudiants->SVT_MJ1 = $request->input('SVT_MJ1');
            $note_etudiants->EPS_MJ1 = $request->input('EPS_MJ1');
            
            $note_etudiants->Mal_EX1 = $request->input('Mal_EX1');
            $note_etudiants->Frs_EX1 = $request->input('Frs_EX1');
            $note_etudiants->Ang_EX1 = $request->input('Ang_EX1');
            $note_etudiants->HG_EX1 = $request->input('HG_EX1');
            $note_etudiants->EC_EX1 = $request->input('EC_EX1');
            $note_etudiants->Mths_EX1 = $request->input('Mths_EX1');
            $note_etudiants->PC_EX1 = $request->input('PC_EX1');
            $note_etudiants->SVT_EX1 = $request->input('SVT_EX1');
            $note_etudiants->EPS_EX1 = $request->input('EPS_EX1');

            $note_etudiants->Mal_MJ2 = $request->input('Mal_MJ2');
            $note_etudiants->Frs_MJ2 = $request->input('Frs_MJ2');
            $note_etudiants->Ang_MJ2 = $request->input('Ang_MJ2');
            $note_etudiants->HG_MJ2 = $request->input('HG_MJ2');
            $note_etudiants->EC_MJ2 = $request->input('EC_MJ2');
            $note_etudiants->Mths_MJ2 = $request->input('Mths_MJ2');
            $note_etudiants->PC_MJ2 = $request->input('PC_MJ2');
            $note_etudiants->SVT_MJ2 = $request->input('SVT_MJ2');
            $note_etudiants->EPS_MJ2 = $request->input('EPS_MJ2');

            $note_etudiants->Mal_EX2 = $request->input('Mal_EX2');
            $note_etudiants->Frs_EX2 = $request->input('Frs_EX2');
            $note_etudiants->Ang_EX2 = $request->input('Ang_EX2');
            $note_etudiants->HG_EX2 = $request->input('HG_EX2');
            $note_etudiants->EC_EX2 = $request->input('EC_EX2');
            $note_etudiants->Mths_EX2 = $request->input('Mths_EX2');
            $note_etudiants->PC_EX2 = $request->input('PC_EX2');
            $note_etudiants->SVT_EX2 = $request->input('SVT_EX2');
            $note_etudiants->EPS_EX2 = $request->input('EPS_EX2');

            $note_etudiants->Mal_MJ3 = $request->input('Mal_MJ3');
            $note_etudiants->Frs_MJ3 = $request->input('Frs_MJ3');
            $note_etudiants->Ang_MJ3 = $request->input('Ang_MJ3');
            $note_etudiants->HG_MJ3 = $request->input('HG_MJ3');
            $note_etudiants->EC_MJ3 = $request->input('EC_MJ3');
            $note_etudiants->Mths_MJ3 = $request->input('Mths_MJ3');
            $note_etudiants->PC_MJ3 = $request->input('PC_MJ3');
            $note_etudiants->SVT_MJ3 = $request->input('SVT_MJ3');
            $note_etudiants->EPS_MJ3 = $request->input('EPS_MJ3');

            $note_etudiants->Mal_EX3 = $request->input('Mal_EX3');
            $note_etudiants->Frs_EX3 = $request->input('Frs_EX3');
            $note_etudiants->Ang_EX3 = $request->input('Ang_EX3');
            $note_etudiants->HG_EX3 = $request->input('HG_EX3');
            $note_etudiants->EC_EX3 = $request->input('EC_EX3');
            $note_etudiants->Mths_EX3 = $request->input('Mths_EX3');
            $note_etudiants->PC_EX3 = $request->input('PC_EX3');
            $note_etudiants->SVT_EX3 = $request->input('SVT_EX3');
            $note_etudiants->EPS_EX3 = $request->input('EPS_EX3');
            //methode save enregistrer dans la base de donne
            $note_etudiants->save();
            Session::flash('success', 'Enregistrement notes succès.');
            //retour dans un page
            //return redirect('/nom du route de rediriger')->with('status','messege afficher');
            return redirect()->route('students', compact('valeure'));
        }
        else {
            Session::flash('échoué', 'Enregistrement échoué. Car cette élève est deja délibérer. Alors son note est imodifiable');
            //retour dans un page
            //return redirect('/nom du route de rediriger')->with('status','messege afficher');
            return redirect()->route('students', compact('valeure'));
        }
    }
    public function bulletin_lycee()
    {
        //
        return view('note.bulletin_lycee');
    }
    public function Enregistrer_note_lycee_traitement(Request $request)
    {
        //instancier les objet etudiant
        //$nom de variable = new nom de la modele
        $note_etudiants = Etudiant_lycee::find($request->id);
        // dd($note_etudiants->Etat_class);
        
        if ($note_etudiants->Etat_class=='0') {
            //$user->nom_delaformat_ao_@_view=$Request->nom_de colone dans la bd
            $note_etudiants->Mal_MJ1 = $request->input('Mal_MJ1');
            $note_etudiants->Frs_MJ1 = $request->input('Frs_MJ1');
            $note_etudiants->Ang_MJ1 = $request->input('Ang_MJ1');
            $note_etudiants->Philo_MJ1 = $request->input('Philo_MJ1');
            $note_etudiants->HG_MJ1 = $request->input('HG_MJ1');
            $note_etudiants->EC_MJ1 = $request->input('EC_MJ1');
            // $note_etudiants->NES_MJ1 = $request->input('NES_MJ1');
            $note_etudiants->LEV_MJ1 = $request->input('LEV_MJ1');
            $note_etudiants->Mths_MJ1 = $request->input('Mths_MJ1');
            $note_etudiants->PC_MJ1 = $request->input('PC_MJ1');
            $note_etudiants->TICE_MJ1 = $request->input('TICE_MJ1');
            $note_etudiants->SVT_MJ1 = $request->input('SVT_MJ1');
            $note_etudiants->EPS_MJ1 = $request->input('EPS_MJ1');

            $note_etudiants->Mal_EX1 = $request->input('Mal_EX1');
            $note_etudiants->Frs_EX1 = $request->input('Frs_EX1');
            $note_etudiants->Ang_EX1 = $request->input('Ang_EX1');
            $note_etudiants->Philo_EX1 = $request->input('Philo_EX1');
            $note_etudiants->HG_EX1 = $request->input('HG_EX1');
            // $note_etudiants->NES_EX1 = $request->input('NES_EX1');
            $note_etudiants->LEV_EX1 = $request->input('LEV_EX1');
            $note_etudiants->EC_EX1 = $request->input('EC_EX1');
            $note_etudiants->Mths_EX1 = $request->input('Mths_EX1');
            $note_etudiants->PC_EX1 = $request->input('PC_EX1');
            $note_etudiants->TICE_EX1 = $request->input('TICE_EX1');
            $note_etudiants->SVT_EX1 = $request->input('SVT_EX1');
            $note_etudiants->EPS_EX1 = $request->input('EPS_EX1');

            $note_etudiants->Mal_MJ2 = $request->input('Mal_MJ2');
            $note_etudiants->Frs_MJ2 = $request->input('Frs_MJ2');
            $note_etudiants->Ang_MJ2 = $request->input('Ang_MJ2');
            $note_etudiants->Philo_MJ2 = $request->input('Philo_MJ2');
            $note_etudiants->HG_MJ2 = $request->input('HG_MJ2');
            // $note_etudiants->NES_MJ2 = $request->input('NES_MJ2');
            $note_etudiants->LEV_MJ2 = $request->input('LEV_MJ2');
            $note_etudiants->EC_MJ2 = $request->input('EC_MJ2');
            $note_etudiants->Mths_MJ2 = $request->input('Mths_MJ2');
            $note_etudiants->PC_MJ2 = $request->input('PC_MJ2');
            $note_etudiants->TICE_MJ2 = $request->input('TICE_MJ2');
            $note_etudiants->SVT_MJ2 = $request->input('SVT_MJ2');
            $note_etudiants->EPS_MJ2 = $request->input('EPS_MJ2');

            $note_etudiants->Mal_EX2 = $request->input('Mal_EX2');
            $note_etudiants->Frs_EX2 = $request->input('Frs_EX2');
            $note_etudiants->Ang_EX2 = $request->input('Ang_EX2');
            $note_etudiants->Philo_EX2 = $request->input('Philo_EX2');
            $note_etudiants->HG_EX2 = $request->input('HG_EX2');
            // $note_etudiants->NES_EX2 = $request->input('NES_EX2');
            $note_etudiants->LEV_EX2 = $request->input('LEV_EX2');
            $note_etudiants->EC_EX2 = $request->input('EC_EX2');
            $note_etudiants->Mths_EX2 = $request->input('Mths_EX2');
            $note_etudiants->PC_EX2 = $request->input('PC_EX2');
            $note_etudiants->TICE_EX2 = $request->input('TICE_EX2');
            $note_etudiants->SVT_EX2 = $request->input('SVT_EX2');
            $note_etudiants->EPS_EX2 = $request->input('EPS_EX2');

            $note_etudiants->Mal_MJ3 = $request->input('Mal_MJ3');
            $note_etudiants->Frs_MJ3 = $request->input('Frs_MJ3');
            $note_etudiants->Ang_MJ3 = $request->input('Ang_MJ3');
            $note_etudiants->Philo_MJ3 = $request->input('Philo_MJ3');
            $note_etudiants->HG_MJ3 = $request->input('HG_MJ3');
            // $note_etudiants->NES_MJ3 = $request->input('NES_MJ3');
            $note_etudiants->LEV_MJ3 = $request->input('LEV_MJ3');
            $note_etudiants->EC_MJ3 = $request->input('EC_MJ3');
            $note_etudiants->Mths_MJ3 = $request->input('Mths_MJ3');
            $note_etudiants->PC_MJ3 = $request->input('PC_MJ3');
            $note_etudiants->TICE_MJ3 = $request->input('TICE_MJ3');
            $note_etudiants->SVT_MJ3 = $request->input('SVT_MJ3');
            $note_etudiants->EPS_MJ3 = $request->input('EPS_MJ3');

            $note_etudiants->Mal_EX3 = $request->input('Mal_EX3');
            $note_etudiants->Frs_EX3 = $request->input('Frs_EX3');
            $note_etudiants->Ang_EX3 = $request->input('Ang_EX3');
            $note_etudiants->Philo_EX3 = $request->input('Philo_EX3');
            $note_etudiants->HG_EX3 = $request->input('HG_EX3');
            // $note_etudiants->NES_EX3 = $request->input('NES_EX3');
            $note_etudiants->LEV_EX3 = $request->input('LEV_EX3');
            $note_etudiants->EC_EX3 = $request->input('EC_EX3');
            $note_etudiants->Mths_EX3 = $request->input('Mths_EX3');
            $note_etudiants->PC_EX3 = $request->input('PC_EX3');
            $note_etudiants->TICE_EX3 = $request->input('TICE_EX3');
            $note_etudiants->SVT_EX3 = $request->input('SVT_EX3');
            $note_etudiants->EPS_EX3 = $request->input('EPS_EX3');
            //methode save enregistrer dans la base de donne
            $note_etudiants->save();
            Session::flash('success', 'Enregistrement notes succès.');
                //retour dans un page
                //return redirect('/nom du route de rediriger')->with('status','messege afficher');
            return redirect()->route('liste_lycee');
        }
        else {
            Session::flash('échoué', 'Enregistrement échoué. Car cette élève est deja délibérer. Alors son note est imodifiable');
            //retour dans un page
            //return redirect('/nom du route de rediriger')->with('status','messege afficher');
            return redirect()->route('liste_lycee');
        }
    }
    //affiche les element dans la vullti
    public function bulletin_lycee_afiche($id,Request $Cycle,Annee_scolaire $Annee_scolaire,Note $Num_bulletin )
    {
        //recherche l'objet etudiant dans la model
        $etudiants = Etudiant_lycee::find($id);
        
        //Matieres et coefficient
        $matier_lycee =DB::table('etudiant_lycees')->join('matiere_lycees','etudiant_lycees.Cycle','=','matiere_lycees.Cycle')->where('etudiant_lycees.id','=',$etudiants->id)->select('matiere_lycees.Coef','matiere_lycees.matieres','matiere_lycees.Cycle')->get();
        $matier_lycee_som_coef=DB::table('etudiant_lycees')->join('matiere_lycees','etudiant_lycees.Cycle','=','matiere_lycees.Cycle')->where('etudiant_lycees.id','=',$etudiants->id)->select(DB::raw('SUM(matiere_lycees.Coef) AS som_coef'))->get();
        $som_coef=$matier_lycee_som_coef[0]->som_coef;
        $count_nombre_matiere=DB::table('etudiant_lycees')->join('matiere_lycees','etudiant_lycees.Cycle','=','matiere_lycees.Cycle')->where('etudiant_lycees.id','=',$etudiants->id)->select(DB::raw('COUNT(matiere_lycees.Coef) AS nombre_matiere'))->get();
        $nombre_matiere = $count_nombre_matiere[0]->nombre_matiere;
        //moyenne de classe 1ere trimestre
        $malagasy_MJ1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_MJ1');
        $malagasy_EX1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_EX1');
        
        $francais_MJ1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_MJ1');
        $francais_EX1Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_EX1');
        
        $anglais_MJ1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_MJ1');
        $anglais_EX1Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_EX1');
        
        $hg_MJ1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_MJ1');
        $hg_EX1Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_EX1');
        
        $ec_MJ1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_MJ1');
        $ec_EX1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_EX1');
        
        $mths_MJ1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_MJ1');
        $mths_EX1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_EX1');
        
        $pc_MJ1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_MJ1');
        $pc_EX1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_EX1');
        
        $svt_MJ1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_MJ1');
        $svt_EX1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_EX1');
        
        $eps_MJ1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_MJ1');
        $eps_EX1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_EX1');
        
        $Philo_MJ1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Philo_Mj1');
        $Philo_EX1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Philo_EX1');

        // $NES_MJ1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('NES_MJ1');
        // $NES_EX1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('NES_EX1');

        $LEV_MJ1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('LEV_MJ1');
        $LEV_EX1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('LEV_EX1');
        
        $TICE_MJ1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('TICE_MJ1');
        $TICE_EX1_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('TICE_EX1');

        $Note_classe_1Trimestre = $malagasy_MJ1_Sum + $malagasy_EX1_Sum + $francais_MJ1_Sum + $francais_EX1Sum + $anglais_MJ1_Sum + $anglais_EX1Sum + $hg_MJ1_Sum + $hg_EX1Sum + $ec_MJ1_Sum + $ec_EX1_Sum + $mths_MJ1_Sum + $mths_EX1_Sum + $pc_MJ1_Sum + $pc_EX1_Sum + $svt_MJ1_Sum + $svt_EX1_Sum + $eps_MJ1_Sum + $eps_EX1_Sum + $Philo_MJ1_Sum + $Philo_EX1_Sum + $LEV_MJ1_Sum +$LEV_EX1_Sum + $TICE_MJ1_Sum + $TICE_EX1_Sum;
        //
        $count_nombre_elev=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->count('Nom_elev');
        $MOYENNE_CLASSE1=round($Note_classe_1Trimestre/($count_nombre_elev*$som_coef*2),2);

        //moyenne de classe 2eme trimestre
        $malagasy_MJ2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_MJ2');
        $malagasy_EX2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_EX2');
        
        $francais_MJ2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_MJ2');
        $francais_EX2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_EX2');
        
        $anglais_MJ2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_MJ2');
        $anglais_EX2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_EX2');
        
        $hg_MJ2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_MJ2');
        $hg_EX2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_EX2');
        
        $ec_MJ2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_MJ2');
        $ec_EX2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_EX2');
        
        $mths_MJ2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_MJ2');
        $mths_EX2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_EX2');
        
        $pc_MJ2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_MJ2');
        $pc_EX2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_EX2');
        
        $svt_MJ2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_MJ2');
        $svt_EX2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_EX2');
        
        $eps_MJ2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_MJ2');
        $eps_EX2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_EX2');
        
        $Philo_MJ2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Philo_Mj2');
        $Philo_EX2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Philo_EX2');

        // $NES_MJ2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('NES_MJ2');
        // $NES_EX2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('NES_EX2');

        $LEV_MJ2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('LEV_MJ2');
        $LEV_EX2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('LEV_EX2');
        
        $TICE_MJ2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('TICE_MJ2');
        $TICE_EX2_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('TICE_EX2');
        $Note_classe_2Trimestre = $malagasy_MJ2_Sum + $malagasy_EX2_Sum + $francais_MJ2_Sum + $francais_EX2_Sum + $anglais_MJ2_Sum + $anglais_EX2_Sum + $hg_MJ2_Sum + $hg_EX2_Sum + $ec_MJ2_Sum + $ec_EX2_Sum + $mths_MJ2_Sum + $mths_EX2_Sum + $pc_MJ2_Sum + $pc_EX2_Sum + $svt_MJ2_Sum + $svt_EX2_Sum + $eps_MJ2_Sum + $eps_EX2_Sum + $Philo_MJ2_Sum + $Philo_EX2_Sum + $LEV_MJ2_Sum +$LEV_EX2_Sum + $TICE_MJ2_Sum + $TICE_EX2_Sum;
        //
        
        $MOYENNE_CLASSE2=round($Note_classe_2Trimestre/($count_nombre_elev*$som_coef*2),2);

        //moyenne de classe 3eme trimestre
        $malagasy_MJ3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_MJ3');
        $malagasy_EX3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_EX3');
        
        $francais_MJ3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_MJ3');
        $francais_EX3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_EX3');
        
        $anglais_MJ3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_MJ3');
        $anglais_EX3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_EX3');
        
        $hg_MJ3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_MJ3');
        $hg_EX3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_EX3');
        
        $ec_MJ3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_MJ3');
        $ec_EX3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_EX3');
        
        $mths_MJ3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_MJ3');
        $mths_EX3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_EX3');
        
        $pc_MJ3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_MJ3');
        $pc_EX3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_EX3');
        
        $svt_MJ3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_MJ3');
        $svt_EX3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_EX3');
        
        $eps_MJ3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_MJ3');
        $eps_EX3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_EX3');

        $Philo_MJ3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Philo_Mj3');
        $Philo_EX3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Philo_EX3');

        // $NES_MJ3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('NES_MJ3');
        // $NES_EX3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('NES_EX3');

        $LEV_MJ3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('LEV_MJ3');
        $LEV_EX3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('LEV_EX3');
        
        $TICE_MJ3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('TICE_MJ3');
        $TICE_EX3_Sum=DB::table('etudiant_lycees')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('TICE_EX3');
        $Note_classe_3Trimestre = $malagasy_MJ3_Sum + $malagasy_EX3_Sum + $francais_MJ3_Sum + $francais_EX3_Sum + $anglais_MJ3_Sum + $anglais_EX3_Sum + $hg_MJ3_Sum + $hg_EX3_Sum + $ec_MJ3_Sum + $ec_EX3_Sum + $mths_MJ3_Sum + $mths_EX3_Sum + $pc_MJ3_Sum + $pc_EX3_Sum + $svt_MJ3_Sum + $svt_EX3_Sum + $eps_MJ3_Sum + $eps_EX3_Sum + $Philo_MJ3_Sum + $Philo_EX3_Sum + $LEV_MJ3_Sum +$LEV_EX3_Sum + $TICE_MJ3_Sum + $TICE_EX3_Sum;
        //
        $MOYENNE_CLASSE3=round($Note_classe_3Trimestre/($count_nombre_elev*$som_coef*2),2);
        
        //1er trimestre
        $TOTAL1 = round($etudiants->Mal_MJ1 + $etudiants->Frs_MJ1 + $etudiants->Ang_MJ1 + $etudiants->HG_MJ1 + $etudiants->EC_MJ1 + $etudiants->Mths_MJ1 +  $etudiants->PC_MJ1 + $etudiants->SVT_MJ1 + $etudiants->EPS_MJ1 + $etudiants->Philo_MJ1 + $etudiants->LEV_MJ1 + $etudiants->TICE_MJ1,2);
        $TOTAL2 = round($etudiants->Mal_EX1 + $etudiants->Frs_EX1 + $etudiants->Ang_EX1 + $etudiants->HG_EX1 + $etudiants->EC_EX1 + $etudiants->Mths_EX1 +  $etudiants->PC_EX1 + $etudiants->SVT_EX1 + $etudiants->EPS_EX1 + $etudiants->Philo_EX1 + $etudiants->LEV_EX1 + $etudiants->TICE_EX1,2);
        $MG1T = round(($TOTAL1 + $TOTAL2)/40,2);

        $MG11 = round(($etudiants->Mal_MJ1 + $etudiants->Mal_EX1)/2,2);
        $MG12 = round(($etudiants->Frs_MJ1 + $etudiants->Frs_EX1)/2,2);
        $MG13 = round(($etudiants->Ang_MJ1 + $etudiants->Ang_EX1)/2,2);
        $MG14 = round(($etudiants->Philo_MJ1 + $etudiants->Philo_MJ1)/2,2);
        $MG15 = round(($etudiants->HG_MJ1 + $etudiants->HG_EX1)/2,2);
        $MG16 = round(($etudiants->EC_MJ1 + $etudiants->EC_EX1)/2,2);
        // $MG17 = round(($etudiants->NES_MJ1 + $etudiants->NES_MJ1)/2,2);
        $MG18 = round(($etudiants->LEV_MJ1 + $etudiants->LEV_MJ1)/2,2);
        $MG19 = round(($etudiants->Mths_MJ1 + $etudiants->Mths_EX1)/2,2);
        $MG11A = round(($etudiants->PC_MJ1 + $etudiants->PC_EX1)/2,2);
        $MG12A = round(($etudiants->TICE_MJ1 + $etudiants->TICE_MJ1)/2,2);
        $MG13A = round(($etudiants->SVT_MJ1 + $etudiants->SVT_EX1)/2,2);
        $MG14A = round(($etudiants->EPS_MJ1 + $etudiants->EPS_EX1)/2,2);
        $TOTAL_MG1 = round($MG11 + $MG12 + $MG13 + $MG14 + $MG15 + $MG16 + $MG18+ $MG19 + $MG11A + $MG12A + $MG13A + $MG14A,2);
        $Moyenne1 = round($TOTAL1/$som_coef,2);//Moyenne journaliere
        $Moyenne_Ex1 = round($TOTAL2/$som_coef,2);//Moyenne examin
        
        $MG1M = round(($TOTAL_MG1)/$som_coef,2); //moyenne 1ére trimtre
        
        //2eme trimestre
        $TOTAL3 = round($etudiants->Mal_MJ2 + $etudiants->Frs_MJ2 + $etudiants->Ang_MJ2 + $etudiants->HG_MJ2 + $etudiants->EC_MJ2 + $etudiants->Mths_MJ2 +  $etudiants->PC_MJ2 + $etudiants->SVT_MJ2 + $etudiants->EPS_MJ2 + $etudiants->Philo_MJ2 + $etudiants->LEV_MJ2 + $etudiants->TICE_MJ2,2);
        $TOTAL4 = round($etudiants->Mal_EX2 + $etudiants->Frs_EX2 + $etudiants->Ang_EX2 + $etudiants->HG_EX2 + $etudiants->EC_EX2 + $etudiants->Mths_EX2 +  $etudiants->PC_EX2 + $etudiants->SVT_EX2 + $etudiants->EPS_EX2 + $etudiants->Philo_EX2 + $etudiants->LEV_EX2 + $etudiants->TICE_EX2,2);
        $MG2T = round(($TOTAL3 + $TOTAL4)/40,2);

        $MG21 = round(($etudiants->Mal_MJ2 + $etudiants->Mal_EX2)/2,2);
        $MG22 = round(($etudiants->Frs_MJ2 + $etudiants->Frs_EX2)/2,2);
        $MG23 = round(($etudiants->Ang_MJ2 + $etudiants->Ang_EX2)/2,2);
        $MG24 = round(($etudiants->Philo_MJ2 + $etudiants->Philo_MJ2)/2,2);
        $MG25 = round(($etudiants->HG_MJ2 + $etudiants->HG_EX2)/2,2);
        $MG26 = round(($etudiants->EC_MJ2 + $etudiants->EC_EX2)/2,2);
        // $MG27 = round(($etudiants->NES_MJ2 + $etudiants->NES_MJ2)/2,2);
        $MG28 = round(($etudiants->LEV_MJ2 + $etudiants->LEV_MJ2)/2,2);
        $MG29 = round(($etudiants->Mths_MJ2 + $etudiants->Mths_EX2)/2,2);
        $MG21A = round(($etudiants->PC_MJ2 + $etudiants->PC_EX2)/2,2);
        $MG22A = round(($etudiants->TICE_MJ2 + $etudiants->TICE_MJ2)/2,2);
        $MG23A = round(($etudiants->SVT_MJ2 + $etudiants->SVT_EX2)/2,2);
        $MG24A = round(($etudiants->EPS_MJ2 + $etudiants->EPS_EX2)/2,2);
        $TOTAL_MG2 = round($MG21 + $MG22 + $MG23 + $MG24 + $MG25 + $MG26 + $MG28+ $MG29 + $MG21A + $MG22A + $MG23A + $MG24A,2);
        
        $Moyenne3 = round($TOTAL3/$som_coef,2);//Moyenne journaliere2
        // $Moyenne4 = round($TOTAL4/20,2);
        $Moyenne_Ex2 = round($TOTAL4/$som_coef,2);
        $MG2M = round(($Moyenne3 + $Moyenne_Ex2)/2,2); 
        
        //3éme trimestre
        $TOTAL5 = round($etudiants->Mal_MJ3 + $etudiants->Frs_MJ3 + $etudiants->Ang_MJ3 + $etudiants->HG_MJ3 + $etudiants->EC_MJ3 + $etudiants->Mths_MJ3 +  $etudiants->PC_MJ3 + $etudiants->SVT_MJ3 + $etudiants->EPS_MJ3 + $etudiants->Philo_MJ3 + $etudiants->LEV_MJ3 + $etudiants->TICE_MJ3,2);
        $TOTAL6 = round($etudiants->Mal_EX3 + $etudiants->Frs_EX3 + $etudiants->Ang_EX3 + $etudiants->HG_EX3 + $etudiants->EC_EX3 + $etudiants->Mths_EX3 +  $etudiants->PC_EX3 + $etudiants->SVT_EX3 + $etudiants->EPS_EX3 + $etudiants->Philo_EX3 + $etudiants->LEV_EX3 + $etudiants->TICE_EX3,2);
        $MG3T = round(($TOTAL5 + $TOTAL6)/40,2);

        $MG31 = round(($etudiants->Mal_MJ3 + $etudiants->Mal_EX3)/2,2);
        $MG32 = round(($etudiants->Frs_MJ3 + $etudiants->Frs_EX3)/2,2);
        $MG33 = round(($etudiants->Ang_MJ3 + $etudiants->Ang_EX3)/2,2);
        $MG34 = round(($etudiants->Philo_MJ3 + $etudiants->Philo_MJ3)/2,2);
        $MG35 = round(($etudiants->HG_MJ3 + $etudiants->HG_EX3)/2,2);
        $MG36 = round(($etudiants->EC_MJ3 + $etudiants->EC_EX3)/2,2);
        // $MG37 = round(($etudiants->NES_MJ3 + $etudiants->NES_MJ3)/2,2);
        $MG38 = round(($etudiants->LEV_MJ3 + $etudiants->LEV_MJ3)/2,2);
        $MG39 = round(($etudiants->Mths_MJ3 + $etudiants->Mths_EX3)/2,2);
        $MG31A = round(($etudiants->PC_MJ3 + $etudiants->PC_EX3)/2,2);
        $MG32A = round(($etudiants->TICE_MJ3 + $etudiants->TICE_MJ3)/2,2);
        $MG33A = round(($etudiants->SVT_MJ3 + $etudiants->SVT_EX3)/2,2);
        $MG34A = round(($etudiants->EPS_MJ3 + $etudiants->EPS_EX3)/2,2);
        $TOTAL_MG3 = round($MG31 + $MG32 + $MG33 + $MG34 + $MG35 + $MG36 + $MG38+ $MG39 + $MG31A + $MG32A + $MG33A + $MG34A,2);
        

        $Moyenne5 = round($TOTAL5/$som_coef,2);
        // $Moyenne6 = round($TOTAL6/20,2);
        $Moyenne_Ex3 = round($TOTAL6/$som_coef,2);
        $MG3M = round(($Moyenne5 + $Moyenne_Ex3)/2, 2);

        //Moyenne generale
        $MOYENNE_GENERALE = round(($MG1M + $MG2M +$MG3M)/3,2);

    return view('note.bulletin_lycee', ['matier_lycee'=>$matier_lycee] ,compact('etudiants', 'TOTAL1', 'TOTAL2','MG1T', 'Moyenne1', 'MG11', 'MG12', 'MG13', 'MG14', 'MG15', 'MG16','MG18', 'MG19', 'MG11A', 'MG12A', 'MG13A', 'MG14A', 'TOTAL_MG1', 'Moyenne_Ex1', 'MG1M','TOTAL3', 'TOTAL4','MG2T', 'Moyenne3', 'MG21', 'MG22', 'MG23', 'MG24', 'MG25', 'MG26','MG28', 'MG29', 'MG21A', 'MG22A', 'MG23A', 'MG24A', 'TOTAL_MG2', 'Moyenne_Ex2','MG2M', 'TOTAL5', 'TOTAL6', 'MG3T', 'MG31', 'MG32', 'MG33', 'MG34', 'MG35', 'MG36','MG38', 'MG39', 'MG31A', 'MG32A', 'MG33A', 'MG34A', 'TOTAL_MG3', 'Moyenne5', 'Moyenne_Ex3','MG3M', 'MOYENNE_GENERALE', 'MOYENNE_CLASSE1','MOYENNE_CLASSE2', 'MOYENNE_CLASSE3','matier_lycee','som_coef'));
    }
    

    //test
    public function index()
    {
        //Session des chaque ecolle qui s'authentifier
        $valeure = Session::get('key');
        // Pour récupérer une valeur d'un tableau
        $tableauValeurs = Session::get('tableau_key');
        $Annee_scolaire = Etudiants::select('Annee_scolaire')->groupBy('Annee_scolaire')
            ->get();
 
        $results = Etudiants::select('Cycle')
            ->groupBy('Cycle')
            ->get();
        foreach ($valeure as $key) {
            $nom_ecol = $key->code_Nom_ecol;
        }
        
        $etudiants = Etudiants::select('*')->where('code_Nom_ecol',$nom_ecol);
        
        return view('students', compact('Annee_scolaire', 'results', 'etudiants', 'valeure', 'tableauValeurs'));
    }
 
    public function getStandard(Request $request)
    {
        if ($request->ajax()) {
            $standards = Etudiants::select('Annee_scolaire')->groupBy('Annee_scolaire')->get();
 
            return response()->json($standards);
        }
    }
 
    public function getResult(Request $request)
    {
        if ($request->ajax()) {
 
            $results = Etudiants::select('Cycle')->groupBy('Cycle')->get();
 
            return response()->json($results);
        }
    }
    
 
    public function records(Request $request)
    {
        //Session des chaque ecolle qui s'authentifier
        $valeure = Session::get('key');
        // Pour récupérer une valeur d'un tableau
        $tableauValeurs = Session::get('tableau_key');
        foreach ($valeure as $valeureot) {$code_ecol_connectee=$valeureot->code_Nom_ecol;} 
         
        if ($request->ajax()) {
 
            if (request('std') && request('res')) {
                $students = Etudiants::where('Annee_scolaire', '=', request('std'))
                    ->where('Cycle', '=', request('res'))
                    ->where('code_Nom_ecol', $code_ecol_connectee)
                    ->latest()
                    ->get();
            } else {
                $students = Etudiants::when(request('std'), function ($query) {
                    $query->where('Annee_scolaire', '=', request('std'))
                    ->where('code_Nom_ecol', $code_ecol_connectee);
                })
                    ->when(request('res'), function ($query) {
                        $query->where('Cycle', '=', request('res'))
                        ->where('code_Nom_ecol', $code_ecol_connectee);
                    })
                    ->latest()
                    ->get();
            }
 
            return response()->json([
                'students' => $students
            ]);
        } else {
            abort(403);
        }
    }
    public function liste_lycee()
    {
        $valeure = Session::get('key');
 
        return view('liste_lycee', compact('valeure'));
    }
    public function annescolaire_lycee(Request $request)
    {
        if ($request->ajax()) {
            $standards = Etudiant_lycee::select('Annee_scolaire')->groupBy('Annee_scolaire')->get();
 
            return response()->json($standards);
        }
    }
    public function cycle_lycce(Request $request)
    {
        if ($request->ajax()) {
 
            $results_lycee = Etudiant_lycee::select('Cycle')->groupBy('Cycle')->get();
 
            return response()->json($results_lycee);
        }
    }
    public function liste_elev_lycee(Request $request)
    {
        //Session des chaque ecolle qui s'authentifier
        $valeure = Session::get('key');
        // Pour récupérer une valeur d'un tableau
        $tableauValeurs = Session::get('tableau_key');
        foreach ($valeure as $valeureo) {$code_ecol_connecte=$valeureo->code_Nom_ecol;}
        if ($request->ajax()) {
 
            if (request('std') && request('res')) {
                $students = Etudiant_lycee::where('Annee_scolaire', '=', request('std'))
                                            ->where('Cycle', '=', request('res'))
                                            ->where('code_Nom_ecol', $code_ecol_connecte)
                    ->latest()
                    ->get();
            } else {
                $students = Etudiant_lycee::when(request('std'), function ($query) {
                    $query->where('Annee_scolaire', '=', request('std'))
                            ->where('code_Nom_ecol', $code_ecol_connecte);
                })
                    ->when(request('res'), function ($query) {
                        $query->where('Cycle', '=', request('res'))
                                ->where('code_Nom_ecol', $code_ecol_connecte);
                    })
                    ->latest()
                    ->get();
            }
 
            return response()->json([
                'students' => $students
            ]);
        } else {
            abort(403);
        }
    }
//Deliberation
    public function deliberation()
    {
        //Session des chaque ecolle qui s'authentifier
        $valeure = Session::get('key');
        // Pour récupérer une valeur d'un tableau
        $tableauValeurs = Session::get('tableau_key');
        $Annee_scolaire = Etudiants::select('Annee_scolaire')->groupBy('Annee_scolaire')->get();
        $Cycle = Etudiants::select('Cycle')->groupBy('Cycle')->get();
        return view('deliberation', compact('Annee_scolaire', 'Cycle', 'valeure'));
    }

    public function deliberation_resultat()
    {   
        //Session des chaque ecolle qui s'authentifier
        $valeure = Session::get('key');
        // Pour récupérer une valeur d'un tableau
        $tableauValeurs = Session::get('tableau_key');
        // $Annee_scolaire = Etudiants::select('Annee_scolaire')->groupBy('Annee_scolaire')->get();
        // $Cycle = Etudiants::select('Cycle')->groupBy('Cycle')->get();
        return view('deliberation_resultat', compact('valeure'));
    }
    public function deliberation_action_affiche_information_eleve_ceg(Request $request)
    {
        
         //Session des chaque ecolle qui s'authentifier
         $valeure = Session::get('key');
         // Pour récupérer une valeur d'un tableau
         $tableauValeurs = Session::get('tableau_key');
         foreach ($valeure as $valeureo) {$code_ecol_connecte=$valeureo->code_Nom_ecol;} 
        $Cycle=$request->input('Cycle');
        $Annee_scolaire=$request->input('Annee_scolaire');
        $note_eliminatoire=$request->input('note_eliminatoire');
        $Etat_class = Etudiants::select('Etat_class', 'Cycle', 'Annee_scolaire')
            ->where('Annee_scolaire', '=', $Annee_scolaire)
            ->where('Cycle', '=', $Cycle)
            ->groupBy('Etat_class', 'Cycle', 'Annee_scolaire')
            ->get();
         
        if ($note_eliminatoire<='20' && $note_eliminatoire>='7') {
            foreach ($Etat_class as $etudiant) {
                if ($etudiant->Etat_class=='0') {
                    $students =Etudiants::select('*', DB::raw('(Mal_MJ1+Frs_MJ1+Ang_MJ1+HG_MJ1+EC_MJ1+Mths_MJ1+PC_MJ1+SVT_MJ1+EPS_MJ1
                                                                +Mal_EX1+Frs_EX1+Ang_EX1+HG_EX1+EC_EX1+Mths_EX1+PC_EX1+SVT_EX1+EPS_EX1
                                                                +Mal_MJ2+Frs_MJ2+Ang_MJ2+HG_MJ2+EC_MJ2+Mths_MJ2+PC_MJ2+SVT_MJ2+EPS_MJ2
                                                                +Mal_EX2+Frs_EX2+Ang_EX2+HG_EX2+EC_EX2+Mths_EX2+PC_EX2+SVT_EX2+EPS_EX2
                                                                +Mal_MJ3+Frs_MJ3+Ang_MJ3+HG_MJ3+EC_MJ3+Mths_MJ3+PC_MJ3+SVT_MJ3+EPS_MJ3
                                                                +Mal_EX3+Frs_EX3+Ang_EX3+HG_EX3+EC_EX3+Mths_EX3+PC_EX3+SVT_EX3+EPS_EX3)/120 AS Moyenne'))
                                                                ->where('Annee_scolaire', $Annee_scolaire)->where('Cycle', $Cycle)
                                                                ->where('code_Nom_ecol', $code_ecol_connecte)->get();
                    $MOYENNE=$students->pluck('Moyenne');
                                                                // dd($MOYENNE);
                    $students_admis =DB::table('etudiants')
                                    ->select('*')
                                    ->where('Annee_scolaire', $Annee_scolaire)
                                    ->where('Cycle', $Cycle)
                                    ->where('code_Nom_ecol', $code_ecol_connecte)
                                    ->whereRaw("(Mal_MJ1+Frs_MJ1+Ang_MJ1+HG_MJ1+EC_MJ1+Mths_MJ1+PC_MJ1+SVT_MJ1+EPS_MJ1
                                                +Mal_EX1+Frs_EX1+Ang_EX1+HG_EX1+EC_EX1+Mths_EX1+PC_EX1+SVT_EX1+EPS_EX1
                                                +Mal_MJ2+Frs_MJ2+Ang_MJ2+HG_MJ2+EC_MJ2+Mths_MJ2+PC_MJ2+SVT_MJ2+EPS_MJ2
                                                +Mal_EX2+Frs_EX2+Ang_EX2+HG_EX2+EC_EX2+Mths_EX2+PC_EX2+SVT_EX2+EPS_EX2
                                                +Mal_MJ3+Frs_MJ3+Ang_MJ3+HG_MJ3+EC_MJ3+Mths_MJ3+PC_MJ3+SVT_MJ3+EPS_MJ3
                                                +Mal_EX3+Frs_EX3+Ang_EX3+HG_EX3+EC_EX3+Mths_EX3+PC_EX3+SVT_EX3+EPS_EX3)/120>='$note_eliminatoire'")
                                    ->orderByRaw('((Mal_MJ1+Frs_MJ1+Ang_MJ1+HG_MJ1+EC_MJ1+Mths_MJ1+PC_MJ1+SVT_MJ1+EPS_MJ1
                                                +Mal_EX1+Frs_EX1+Ang_EX1+HG_EX1+EC_EX1+Mths_EX1+PC_EX1+SVT_EX1+EPS_EX1
                                                +Mal_MJ2+Frs_MJ2+Ang_MJ2+HG_MJ2+EC_MJ2+Mths_MJ2+PC_MJ2+SVT_MJ2+EPS_MJ2
                                                +Mal_EX2+Frs_EX2+Ang_EX2+HG_EX2+EC_EX2+Mths_EX2+PC_EX2+SVT_EX2+EPS_EX2
                                                +Mal_MJ3+Frs_MJ3+Ang_MJ3+HG_MJ3+EC_MJ3+Mths_MJ3+PC_MJ3+SVT_MJ3+EPS_MJ3
                                                +Mal_EX3+Frs_EX3+Ang_EX3+HG_EX3+EC_EX3+Mths_EX3+PC_EX3+SVT_EX3+EPS_EX3)/120)')
                                    ->get();
                    $students_redouble =DB::table('etudiants')
                                    ->select('*')
                                    ->where('Annee_scolaire', $Annee_scolaire)
                                    ->where('Cycle', $Cycle)
                                    ->where('code_Nom_ecol', $code_ecol_connecte)
                                    ->whereRaw("(Mal_MJ1+Frs_MJ1+Ang_MJ1+HG_MJ1+EC_MJ1+Mths_MJ1+PC_MJ1+SVT_MJ1+EPS_MJ1
                                                +Mal_EX1+Frs_EX1+Ang_EX1+HG_EX1+EC_EX1+Mths_EX1+PC_EX1+SVT_EX1+EPS_EX1
                                                +Mal_MJ2+Frs_MJ2+Ang_MJ2+HG_MJ2+EC_MJ2+Mths_MJ2+PC_MJ2+SVT_MJ2+EPS_MJ2
                                                +Mal_EX2+Frs_EX2+Ang_EX2+HG_EX2+EC_EX2+Mths_EX2+PC_EX2+SVT_EX2+EPS_EX2
                                                +Mal_MJ3+Frs_MJ3+Ang_MJ3+HG_MJ3+EC_MJ3+Mths_MJ3+PC_MJ3+SVT_MJ3+EPS_MJ3
                                                +Mal_EX3+Frs_EX3+Ang_EX3+HG_EX3+EC_EX3+Mths_EX3+PC_EX3+SVT_EX3+EPS_EX3)/120<'$note_eliminatoire'")
                                    ->orderByRaw('((Mal_MJ1+Frs_MJ1+Ang_MJ1+HG_MJ1+EC_MJ1+Mths_MJ1+PC_MJ1+SVT_MJ1+EPS_MJ1
                                                +Mal_EX1+Frs_EX1+Ang_EX1+HG_EX1+EC_EX1+Mths_EX1+PC_EX1+SVT_EX1+EPS_EX1
                                                +Mal_MJ2+Frs_MJ2+Ang_MJ2+HG_MJ2+EC_MJ2+Mths_MJ2+PC_MJ2+SVT_MJ2+EPS_MJ2
                                                +Mal_EX2+Frs_EX2+Ang_EX2+HG_EX2+EC_EX2+Mths_EX2+PC_EX2+SVT_EX2+EPS_EX2
                                                +Mal_MJ3+Frs_MJ3+Ang_MJ3+HG_MJ3+EC_MJ3+Mths_MJ3+PC_MJ3+SVT_MJ3+EPS_MJ3
                                                +Mal_EX3+Frs_EX3+Ang_EX3+HG_EX3+EC_EX3+Mths_EX3+PC_EX3+SVT_EX3+EPS_EX3)/120)')
                                    ->get();
                    // Mettez à jour les informations des étudiants qui répondent au critère "ADMIS"
                    $mise_a_jour_admi= DB::table('etudiants')
                    ->where('Cycle', $Cycle)
                    ->where('annee_scolaire', $Annee_scolaire)
                    ->where('code_Nom_ecol', $code_ecol_connecte)
                    ->whereRaw("(Mal_MJ1+Frs_MJ1+Ang_MJ1+HG_MJ1+EC_MJ1+Mths_MJ1+PC_MJ1+SVT_MJ1+EPS_MJ1
                                +Mal_EX1+Frs_EX1+Ang_EX1+HG_EX1+EC_EX1+Mths_EX1+PC_EX1+SVT_EX1+EPS_EX1
                                +Mal_MJ2+Frs_MJ2+Ang_MJ2+HG_MJ2+EC_MJ2+Mths_MJ2+PC_MJ2+SVT_MJ2+EPS_MJ2
                                +Mal_EX2+Frs_EX2+Ang_EX2+HG_EX2+EC_EX2+Mths_EX2+PC_EX2+SVT_EX2+EPS_EX2
                                +Mal_MJ3+Frs_MJ3+Ang_MJ3+HG_MJ3+EC_MJ3+Mths_MJ3+PC_MJ3+SVT_MJ3+EPS_MJ3
                                +Mal_EX3+Frs_EX3+Ang_EX3+HG_EX3+EC_EX3+Mths_EX3+PC_EX3+SVT_EX3+EPS_EX3)/120 >= '$note_eliminatoire'")
                    ->update(['Etat_actuel' => 'ADMIS']);
                    // Mettez à jour les informations des étudiants qui répondent au critère "redoublante"
                    $mise_a_jour_admi= DB::table('etudiants')
                    ->where('Cycle', $Cycle)
                    ->where('annee_scolaire', $Annee_scolaire)
                    ->where('code_Nom_ecol', $code_ecol_connecte)
                    ->whereRaw("(Mal_MJ1+Frs_MJ1+Ang_MJ1+HG_MJ1+EC_MJ1+Mths_MJ1+PC_MJ1+SVT_MJ1+EPS_MJ1
                                +Mal_EX1+Frs_EX1+Ang_EX1+HG_EX1+EC_EX1+Mths_EX1+PC_EX1+SVT_EX1+EPS_EX1
                                +Mal_MJ2+Frs_MJ2+Ang_MJ2+HG_MJ2+EC_MJ2+Mths_MJ2+PC_MJ2+SVT_MJ2+EPS_MJ2
                                +Mal_EX2+Frs_EX2+Ang_EX2+HG_EX2+EC_EX2+Mths_EX2+PC_EX2+SVT_EX2+EPS_EX2
                                +Mal_MJ3+Frs_MJ3+Ang_MJ3+HG_MJ3+EC_MJ3+Mths_MJ3+PC_MJ3+SVT_MJ3+EPS_MJ3
                                +Mal_EX3+Frs_EX3+Ang_EX3+HG_EX3+EC_EX3+Mths_EX3+PC_EX3+SVT_EX3+EPS_EX3)/120 < '$note_eliminatoire'")
                    ->update(['Etat_actuel' => 'REDOUBLANTE']);
                    $mise_a_jour_etat_classe= DB::table('etudiants')
                    ->where('Cycle', $Cycle)
                    ->where('annee_scolaire', $Annee_scolaire)
                    ->where('code_Nom_ecol', $code_ecol_connecte)
                    ->update(['Etat_class' => '1']);
                    
                    return view('deliberation_resultat', compact('Cycle', 'Annee_scolaire','students_admis','students_redouble','students', 'valeure'));
                }
                elseif ($etudiant->Etat_class=='') {
                    return view('deliberation', compact('Annee_scolaire', 'Cycle', 'valeure'))->with('Erreur');
                }
                else {
                    $Annee_scolaire = Etudiants::select('Annee_scolaire')->groupBy('Annee_scolaire')->get();
                    $Cycle = Etudiants::select('Cycle')->groupBy('Cycle')->get();
                    return view('deliberation', compact('Annee_scolaire', 'Cycle', 'valeure'))->with('message','Impossible de faire cette déliberation');
                }
                // echo $etudiant->Etat_class . ", Cycle: " . $etudiant->Cycle . ", Annee_scolaire: " . $etudiant->Annee_scolaire . "<br>";
            }
        }
        else {
            $Annee_scolaire = Etudiants::select('Annee_scolaire')->groupBy('Annee_scolaire')->get();
            $Cycle = Etudiants::select('Cycle')->groupBy('Cycle')->get();
            return view('deliberation', compact('Annee_scolaire', 'Cycle', 'valeure'))->with('message','Note éliminatoire impossible');
        }
        
    }
    public function resultats(){
        $Annee_scolaire = Etudiants::select('Annee_scolaire')->groupBy('Annee_scolaire')->get();
        $Cycle = Etudiants::select('Cycle')->groupBy('Cycle')->get();
        //Session des chaque ecolle qui s'authentifier
        $valeure = Session::get('key');
        // Pour récupérer une valeur d'un tableau
        $tableauValeurs = Session::get('tableau_key');
        return view('Resultats', compact('Annee_scolaire', 'Cycle', 'valeure'));
    }
    public function Resultats_affiche()
    {
        //Session des chaque ecolle qui s'authentifier
        $valeure = Session::get('key');
        // Pour récupérer une valeur d'un tableau
        $tableauValeurs = Session::get('tableau_key');
        return view('Resultats_affiche', compact('valeure'));
    }
    public function resultat_action_affiche_information_eleve_ceg(Request $request)
    {
         //Session des chaque ecolle qui s'authentifier
        $valeure = Session::get('key');
        // Pour récupérer une valeur d'un tableau
        $tableauValeurs = Session::get('tableau_key');
        $Cycle=$request->input('Cycle');
        $Annee_scolaire=$request->input('Annee_scolaire');
        foreach ($valeure as $valeureo) {$code_ecol_connecte=$valeureo->code_Nom_ecol;}
        $students_admis =DB::table('etudiants')
                        ->select('*')
                        ->where('Annee_scolaire', $Annee_scolaire)
                        ->where('Cycle', $Cycle)
                        ->where('Etat_actuel', '=', 'ADMIS')
                        ->where('code_Nom_ecol', $code_ecol_connecte)
                        ->orderByRaw('((Mal_MJ1+Frs_MJ1+Ang_MJ1+HG_MJ1+EC_MJ1+Mths_MJ1+PC_MJ1+SVT_MJ1+EPS_MJ1
                        +Mal_EX1+Frs_EX1+Ang_EX1+HG_EX1+EC_EX1+Mths_EX1+PC_EX1+SVT_EX1+EPS_EX1
                        +Mal_MJ2+Frs_MJ2+Ang_MJ2+HG_MJ2+EC_MJ2+Mths_MJ2+PC_MJ2+SVT_MJ2+EPS_MJ2
                        +Mal_EX2+Frs_EX2+Ang_EX2+HG_EX2+EC_EX2+Mths_EX2+PC_EX2+SVT_EX2+EPS_EX2
                        +Mal_MJ3+Frs_MJ3+Ang_MJ3+HG_MJ3+EC_MJ3+Mths_MJ3+PC_MJ3+SVT_MJ3+EPS_MJ3
                        +Mal_EX3+Frs_EX3+Ang_EX3+HG_EX3+EC_EX3+Mths_EX3+PC_EX3+SVT_EX3+EPS_EX3)/120)')
                        ->get();
        $students_redouble =DB::table('etudiants')
                        ->select('*')
                        ->where('Annee_scolaire', $Annee_scolaire)
                        ->where('Cycle', $Cycle)
                        ->where('Etat_actuel', '=', 'REDOUBLANTE')
                        ->where('code_Nom_ecol', $code_ecol_connecte)
                        ->orderByRaw('((Mal_MJ1+Frs_MJ1+Ang_MJ1+HG_MJ1+EC_MJ1+Mths_MJ1+PC_MJ1+SVT_MJ1+EPS_MJ1
                        +Mal_EX1+Frs_EX1+Ang_EX1+HG_EX1+EC_EX1+Mths_EX1+PC_EX1+SVT_EX1+EPS_EX1
                        +Mal_MJ2+Frs_MJ2+Ang_MJ2+HG_MJ2+EC_MJ2+Mths_MJ2+PC_MJ2+SVT_MJ2+EPS_MJ2
                        +Mal_EX2+Frs_EX2+Ang_EX2+HG_EX2+EC_EX2+Mths_EX2+PC_EX2+SVT_EX2+EPS_EX2
                        +Mal_MJ3+Frs_MJ3+Ang_MJ3+HG_MJ3+EC_MJ3+Mths_MJ3+PC_MJ3+SVT_MJ3+EPS_MJ3
                        +Mal_EX3+Frs_EX3+Ang_EX3+HG_EX3+EC_EX3+Mths_EX3+PC_EX3+SVT_EX3+EPS_EX3)/120)')
                        ->get();
        
        // dd($valeure);
        return view('Resultats_affiche', compact('students_admis','students_redouble','Cycle','Annee_scolaire','valeure'));  
    }

    public function deliberation_lycee()
    {
        $valeure = Session::get('key');
        $Annee_scolaire = Etudiant_lycee::select('Annee_scolaire')->groupBy('Annee_scolaire')->get();
        $Cycle = Etudiant_lycee::select('Cycle')->groupBy('Cycle')->get();
        return view('deliberation_lycee', compact('Annee_scolaire', 'Cycle', 'valeure'));
    }
    public function deliberation_resultat_lycee()
    {
        // $Annee_scolaire = Etudiants::select('Annee_scolaire')->groupBy('Annee_scolaire')->get();
        // $Cycle = Etudiants::select('Cycle')->groupBy('Cycle')->get();
        return view('deliberation_resultat_lycee');
    }
    public function deliberation_action_affiche_information_eleve_lycee(Request $request)
    {
        $valeure = Session::get('key');
        foreach ($valeure as $valeureo) {$code_ecol_connecte=$valeureo->code_Nom_ecol;}
        $Cycle=$request->input('Cycle');
        $Annee_scolaire=$request->input('Annee_scolaire');
        $note_eliminatoire=$request->input('note_eliminatoire');
        $Etat_class = Etudiant_lycee::select('Etat_class', 'Cycle', 'Annee_scolaire')
            ->where('Annee_scolaire', '=', $Annee_scolaire)
            ->where('Cycle', '=', $Cycle)
            ->groupBy('Etat_class', 'Cycle', 'Annee_scolaire')
            ->get();
            if ($note_eliminatoire<='20' && $note_eliminatoire>='7') {
                foreach ($Etat_class as $etudiant) {
                    if ($etudiant->Etat_class=='0') {
                        $students =Etudiant_lycee::select('*', DB::raw('(Mal_MJ1 + Frs_MJ1 + Ang_MJ1 + HG_MJ1 + EC_MJ1 + Mths_MJ1 + PC_MJ1 + SVT_MJ1 + EPS_MJ1 + Philo_MJ1 + TICE_MJ1
                                                                        +Mal_EX1 + Frs_EX1 + Ang_EX1 + HG_EX1 + EC_EX1 + Mths_EX1 + PC_EX1 + SVT_EX1 + EPS_EX1 + Philo_EX1 + TICE_EX1
                                                                        +Mal_MJ2 + Frs_MJ2 + Ang_MJ2 + HG_MJ2 + EC_MJ2 + Mths_MJ2 + PC_MJ2 + SVT_MJ2 + EPS_MJ2 + Philo_MJ2 + TICE_MJ2
                                                                        +Mal_EX2 + Frs_EX2 + Ang_EX2 + HG_EX2 + EC_EX2 + Mths_EX2 + PC_EX2 + SVT_EX2 + EPS_EX2 + Philo_EX2 + TICE_EX2
                                                                        +Mal_MJ3 + Frs_MJ3 + Ang_MJ3 + HG_MJ3 + EC_MJ3 + Mths_MJ3 + PC_MJ3 + SVT_MJ3 + EPS_MJ3 + Philo_MJ3 + TICE_MJ3
                                                                        +Mal_EX3 + Frs_EX3 + Ang_EX3 + HG_EX3 + EC_EX3 + Mths_EX3 + PC_EX3 + SVT_EX3 + EPS_EX3 + Philo_EX3 + TICE_EX3)/120 AS Moyenne'))
                                                                    ->where('Annee_scolaire', $Annee_scolaire)
                                                                    ->where('Cycle', $Cycle)
                                                                    ->where('code_Nom_ecol', $code_ecol_connecte)
                                                                    ->get();
                        $MOYENNE=$students->pluck('Moyenne');
                        $students_admis =DB::table('etudiant_lycees')
                                        ->select('*')
                                        ->where('Annee_scolaire', $Annee_scolaire)
                                        ->where('Cycle', $Cycle)
                                        ->where('code_Nom_ecol', $code_ecol_connecte)
                                        ->whereRaw("(Mal_MJ1 + Frs_MJ1 + Ang_MJ1 + HG_MJ1 + EC_MJ1 + Mths_MJ1 + PC_MJ1 + SVT_MJ1 + EPS_MJ1 + Philo_MJ1 + TICE_MJ1
                                                +Mal_EX1 + Frs_EX1 + Ang_EX1 + HG_EX1 + EC_EX1 + Mths_EX1 + PC_EX1 + SVT_EX1 + EPS_EX1 + Philo_EX1 + TICE_EX1
                                                +Mal_MJ2 + Frs_MJ2 + Ang_MJ2 + HG_MJ2 + EC_MJ2 + Mths_MJ2 + PC_MJ2 + SVT_MJ2 + EPS_MJ2 + Philo_MJ2 + TICE_MJ2
                                                +Mal_EX2 + Frs_EX2 + Ang_EX2 + HG_EX2 + EC_EX2 + Mths_EX2 + PC_EX2 + SVT_EX2 + EPS_EX2 + Philo_EX2 + TICE_EX2
                                                +Mal_MJ3 + Frs_MJ3 + Ang_MJ3 + HG_MJ3 + EC_MJ3 + Mths_MJ3 + PC_MJ3 + SVT_MJ3 + EPS_MJ3 + Philo_MJ3 + TICE_MJ3
                                                +Mal_EX3 + Frs_EX3 + Ang_EX3 + HG_EX3 + EC_EX3 + Mths_EX3 + PC_EX3 + SVT_EX3 + EPS_EX3 + Philo_EX3 + TICE_EX3)/120>='$note_eliminatoire'")
                                        ->orderByRaw("(Mal_MJ1 + Frs_MJ1 + Ang_MJ1 + HG_MJ1 + EC_MJ1 + Mths_MJ1 + PC_MJ1 + SVT_MJ1 + EPS_MJ1 + Philo_MJ1 + TICE_MJ1
                                                    +Mal_EX1 + Frs_EX1 + Ang_EX1 + HG_EX1 + EC_EX1 + Mths_EX1 + PC_EX1 + SVT_EX1 + EPS_EX1 + Philo_EX1 + TICE_EX1
                                                    +Mal_MJ2 + Frs_MJ2 + Ang_MJ2 + HG_MJ2 + EC_MJ2 + Mths_MJ2 + PC_MJ2 + SVT_MJ2 + EPS_MJ2 + Philo_MJ2 + TICE_MJ2
                                                    +Mal_EX2 + Frs_EX2 + Ang_EX2 + HG_EX2 + EC_EX2 + Mths_EX2 + PC_EX2 + SVT_EX2 + EPS_EX2 + Philo_EX2 + TICE_EX2
                                                    +Mal_MJ3 + Frs_MJ3 + Ang_MJ3 + HG_MJ3 + EC_MJ3 + Mths_MJ3 + PC_MJ3 + SVT_MJ3 + EPS_MJ3 + Philo_MJ3 + TICE_MJ3
                                                    +Mal_EX3 + Frs_EX3 + Ang_EX3 + HG_EX3 + EC_EX3 + Mths_EX3 + PC_EX3 + SVT_EX3 + EPS_EX3 + Philo_EX3 + TICE_EX3)/120")
                                        ->get();
                        $students_redouble =DB::table('etudiant_lycees')
                                        ->select('*')
                                        ->where('Annee_scolaire', $Annee_scolaire)
                                        ->where('Cycle', $Cycle)
                                        ->where('code_Nom_ecol', $code_ecol_connecte)
                                        ->whereRaw("(Mal_MJ1 + Frs_MJ1 + Ang_MJ1 + HG_MJ1 + EC_MJ1 + Mths_MJ1 + PC_MJ1 + SVT_MJ1 + EPS_MJ1 + Philo_MJ1 + TICE_MJ1
                                                    +Mal_EX1 + Frs_EX1 + Ang_EX1 + HG_EX1 + EC_EX1 + Mths_EX1 + PC_EX1 + SVT_EX1 + EPS_EX1 + Philo_EX1 + TICE_EX1
                                                    +Mal_MJ2 + Frs_MJ2 + Ang_MJ2 + HG_MJ2 + EC_MJ2 + Mths_MJ2 + PC_MJ2 + SVT_MJ2 + EPS_MJ2 + Philo_MJ2 + TICE_MJ2
                                                    +Mal_EX2 + Frs_EX2 + Ang_EX2 + HG_EX2 + EC_EX2 + Mths_EX2 + PC_EX2 + SVT_EX2 + EPS_EX2 + Philo_EX2 + TICE_EX2
                                                    +Mal_MJ3 + Frs_MJ3 + Ang_MJ3 + HG_MJ3 + EC_MJ3 + Mths_MJ3 + PC_MJ3 + SVT_MJ3 + EPS_MJ3 + Philo_MJ3 + TICE_MJ3
                                                    +Mal_EX3 + Frs_EX3 + Ang_EX3 + HG_EX3 + EC_EX3 + Mths_EX3 + PC_EX3 + SVT_EX3 + EPS_EX3 + Philo_EX3 + TICE_EX3)/120<'$note_eliminatoire'")
                                        ->orderByRaw("(Mal_MJ1 + Frs_MJ1 + Ang_MJ1 + HG_MJ1 + EC_MJ1 + Mths_MJ1 + PC_MJ1 + SVT_MJ1 + EPS_MJ1 + Philo_MJ1 + TICE_MJ1
                                                    +Mal_EX1 + Frs_EX1 + Ang_EX1 + HG_EX1 + EC_EX1 + Mths_EX1 + PC_EX1 + SVT_EX1 + EPS_EX1 + Philo_EX1 + TICE_EX1
                                                    +Mal_MJ2 + Frs_MJ2 + Ang_MJ2 + HG_MJ2 + EC_MJ2 + Mths_MJ2 + PC_MJ2 + SVT_MJ2 + EPS_MJ2 + Philo_MJ2 + TICE_MJ2
                                                    +Mal_EX2 + Frs_EX2 + Ang_EX2 + HG_EX2 + EC_EX2 + Mths_EX2 + PC_EX2 + SVT_EX2 + EPS_EX2 + Philo_EX2 + TICE_EX2
                                                    +Mal_MJ3 + Frs_MJ3 + Ang_MJ3 + HG_MJ3 + EC_MJ3 + Mths_MJ3 + PC_MJ3 + SVT_MJ3 + EPS_MJ3 + Philo_MJ3 + TICE_MJ3
                                                    +Mal_EX3 + Frs_EX3 + Ang_EX3 + HG_EX3 + EC_EX3 + Mths_EX3 + PC_EX3 + SVT_EX3 + EPS_EX3 + Philo_EX3 + TICE_EX3)/120")
                                        ->get();
                        // Mettez à jour les informations des étudiants qui répondent au critère "ADMIS"
                        $mise_a_jour_admi= DB::table('etudiant_lycees')
                        ->where('Cycle', $Cycle)
                        ->where('annee_scolaire', $Annee_scolaire)
                        ->where('code_Nom_ecol', $code_ecol_connecte)
                        ->whereRaw("(Mal_MJ1 + Frs_MJ1 + Ang_MJ1 + HG_MJ1 + EC_MJ1 + Mths_MJ1 + PC_MJ1 + SVT_MJ1 + EPS_MJ1 + Philo_MJ1 + TICE_MJ1
                                    +Mal_EX1 + Frs_EX1 + Ang_EX1 + HG_EX1 + EC_EX1 + Mths_EX1 + PC_EX1 + SVT_EX1 + EPS_EX1 + Philo_EX1 + TICE_EX1
                                    +Mal_MJ2 + Frs_MJ2 + Ang_MJ2 + HG_MJ2 + EC_MJ2 + Mths_MJ2 + PC_MJ2 + SVT_MJ2 + EPS_MJ2 + Philo_MJ2 + TICE_MJ2
                                    +Mal_EX2 + Frs_EX2 + Ang_EX2 + HG_EX2 + EC_EX2 + Mths_EX2 + PC_EX2 + SVT_EX2 + EPS_EX2 + Philo_EX2 + TICE_EX2
                                    +Mal_MJ3 + Frs_MJ3 + Ang_MJ3 + HG_MJ3 + EC_MJ3 + Mths_MJ3 + PC_MJ3 + SVT_MJ3 + EPS_MJ3 + Philo_MJ3 + TICE_MJ3
                                    +Mal_EX3 + Frs_EX3 + Ang_EX3 + HG_EX3 + EC_EX3 + Mths_EX3 + PC_EX3 + SVT_EX3 + EPS_EX3 + Philo_EX3 + TICE_EX3)/120 >= '$note_eliminatoire'")
                        ->update(['Etat_actuel' => 'ADMIS']);
                        // Mettez à jour les informations des étudiants qui répondent au critère "redoublante"
                        $mise_a_jour_admi= DB::table('etudiant_lycees')
                        ->where('Cycle', $Cycle)
                        ->where('annee_scolaire', $Annee_scolaire)
                        ->where('code_Nom_ecol', $code_ecol_connecte)
                        ->whereRaw("(Mal_MJ1 + Frs_MJ1 + Ang_MJ1 + HG_MJ1 + EC_MJ1 + Mths_MJ1 + PC_MJ1 + SVT_MJ1 + EPS_MJ1 + Philo_MJ1 + TICE_MJ1
                                    +Mal_EX1 + Frs_EX1 + Ang_EX1 + HG_EX1 + EC_EX1 + Mths_EX1 + PC_EX1 + SVT_EX1 + EPS_EX1 + Philo_EX1 + TICE_EX1
                                    +Mal_MJ2 + Frs_MJ2 + Ang_MJ2 + HG_MJ2 + EC_MJ2 + Mths_MJ2 + PC_MJ2 + SVT_MJ2 + EPS_MJ2 + Philo_MJ2 + TICE_MJ2
                                    +Mal_EX2 + Frs_EX2 + Ang_EX2 + HG_EX2 + EC_EX2 + Mths_EX2 + PC_EX2 + SVT_EX2 + EPS_EX2 + Philo_EX2 + TICE_EX2
                                    +Mal_MJ3 + Frs_MJ3 + Ang_MJ3 + HG_MJ3 + EC_MJ3 + Mths_MJ3 + PC_MJ3 + SVT_MJ3 + EPS_MJ3 + Philo_MJ3 + TICE_MJ3
                                    +Mal_EX3 + Frs_EX3 + Ang_EX3 + HG_EX3 + EC_EX3 + Mths_EX3 + PC_EX3 + SVT_EX3 + EPS_EX3 + Philo_EX3 + TICE_EX3)/120 < '$note_eliminatoire'")
                        ->update(['Etat_actuel' => 'REDOUBLANTE']);
                        $mise_a_jour_etat_classe= DB::table('etudiant_lycees')
                        ->where('Cycle', $Cycle)
                        ->where('annee_scolaire', $Annee_scolaire)
                        ->where('code_Nom_ecol', $code_ecol_connecte)
                        ->update(['Etat_class' => '1']);
                        return view('deliberation_resultat_lycee', compact('Cycle', 'Annee_scolaire','students_admis','students_redouble','students','valeure'));
                    }
                    else {
                        $Annee_scolaire = Etudiant_lycee::select('Annee_scolaire')->groupBy('Annee_scolaire')->get();
                        $Cycle = Etudiant_lycee::select('Cycle')->groupBy('Cycle')->get();
                        return view('deliberation_lycee', compact('Annee_scolaire', 'Cycle', 'valeure'))->with('message','Impossible de faire cette déliberation');
                    }
                }
            }
            else {
                $Annee_scolaire = Etudiant_lycee::select('Annee_scolaire')->groupBy('Annee_scolaire')->get();
                $Cycle = Etudiant_lycee::select('Cycle')->groupBy('Cycle')->get();
                return view('deliberation_lycee', compact('Annee_scolaire', 'Cycle', 'valeure'))->with('message','Note éliminatoire impossible');
            }
        
    }
    public function Resultats_lycee()
    {
        $valeure = Session::get('key');
        $Annee_scolaire = Etudiant_lycee::select('Annee_scolaire')->groupBy('Annee_scolaire')->get();
        $Cycle = Etudiant_lycee::select('Cycle')->groupBy('Cycle')->get();
        return view('Resultats_lycee', compact('Annee_scolaire', 'Cycle', 'valeure'));
    }
    public function Resultats_lycee_affiche()
    {
        $valeure = Session::get('key');
        return view('Resultats_lycee_affiche', compact('valeure'));
    }
    public function resultat_action_affiche_information_eleve_lycee(Request $request)
    {
        $valeure = Session::get('key');
        $Cycle=$request->input('Cycle');
        $Annee_scolaire=$request->input('Annee_scolaire');
        foreach ($valeure as $valeureo) {$code_ecol_connecte=$valeureo->code_Nom_ecol;}
        $students_admis =DB::table('etudiant_lycees')
                        ->select('*')
                        ->where('Annee_scolaire', $Annee_scolaire)
                        ->where('Cycle', $Cycle)
                        ->where('code_Nom_ecol', $code_ecol_connecte)
                        ->where('Etat_actuel', '=', 'ADMIS')
                        ->orderByRaw("(Mal_MJ1 + Frs_MJ1 + Ang_MJ1 + HG_MJ1 + EC_MJ1 + Mths_MJ1 + PC_MJ1 + SVT_MJ1 + EPS_MJ1 + Philo_MJ1 + TICE_MJ1
                                    +Mal_EX1 + Frs_EX1 + Ang_EX1 + HG_EX1 + EC_EX1 + Mths_EX1 + PC_EX1 + SVT_EX1 + EPS_EX1 + Philo_EX1 + TICE_EX1
                                    +Mal_MJ2 + Frs_MJ2 + Ang_MJ2 + HG_MJ2 + EC_MJ2 + Mths_MJ2 + PC_MJ2 + SVT_MJ2 + EPS_MJ2 + Philo_MJ2 + TICE_MJ2
                                    +Mal_EX2 + Frs_EX2 + Ang_EX2 + HG_EX2 + EC_EX2 + Mths_EX2 + PC_EX2 + SVT_EX2 + EPS_EX2 + Philo_EX2 + TICE_EX2
                                    +Mal_MJ3 + Frs_MJ3 + Ang_MJ3 + HG_MJ3 + EC_MJ3 + Mths_MJ3 + PC_MJ3 + SVT_MJ3 + EPS_MJ3 + Philo_MJ3 + TICE_MJ3
                                    +Mal_EX3 + Frs_EX3 + Ang_EX3 + HG_EX3 + EC_EX3 + Mths_EX3 + PC_EX3 + SVT_EX3 + EPS_EX3 + Philo_EX3 + TICE_EX3)/120")
                        ->get();
        $students_redouble =DB::table('etudiant_lycees')
                        ->select('*')
                        ->where('Annee_scolaire', $Annee_scolaire)
                        ->where('Cycle', $Cycle)
                        ->where('code_Nom_ecol', $code_ecol_connecte)
                        ->where('Etat_actuel', '=', 'REDOUBLANTE')
                        ->orderByRaw("(Mal_MJ1 + Frs_MJ1 + Ang_MJ1 + HG_MJ1 + EC_MJ1 + Mths_MJ1 + PC_MJ1 + SVT_MJ1 + EPS_MJ1 + Philo_MJ1 + TICE_MJ1
                                    +Mal_EX1 + Frs_EX1 + Ang_EX1 + HG_EX1 + EC_EX1 + Mths_EX1 + PC_EX1 + SVT_EX1 + EPS_EX1 + Philo_EX1 + TICE_EX1
                                    +Mal_MJ2 + Frs_MJ2 + Ang_MJ2 + HG_MJ2 + EC_MJ2 + Mths_MJ2 + PC_MJ2 + SVT_MJ2 + EPS_MJ2 + Philo_MJ2 + TICE_MJ2
                                    +Mal_EX2 + Frs_EX2 + Ang_EX2 + HG_EX2 + EC_EX2 + Mths_EX2 + PC_EX2 + SVT_EX2 + EPS_EX2 + Philo_EX2 + TICE_EX2
                                    +Mal_MJ3 + Frs_MJ3 + Ang_MJ3 + HG_MJ3 + EC_MJ3 + Mths_MJ3 + PC_MJ3 + SVT_MJ3 + EPS_MJ3 + Philo_MJ3 + TICE_MJ3
                                    +Mal_EX3 + Frs_EX3 + Ang_EX3 + HG_EX3 + EC_EX3 + Mths_EX3 + PC_EX3 + SVT_EX3 + EPS_EX3 + Philo_EX3 + TICE_EX3)/120")
                        ->get();
        return view('Resultats_lycee_affiche', compact('students_admis','students_redouble','Cycle','Annee_scolaire', 'valeure'));  
    }
    
    public function stat()
    {
        $Annee_scolaire = Etudiants::select('Annee_scolaire')->groupBy('Annee_scolaire')->get();
        $Cycle = Etudiants::select('Cycle')->groupBy('Cycle')->get();
        $eleve_6eme = DB::table('etudiants')->select(DB::raw('COUNT(Nom_elev) as countNomElev'), 'Annee_scolaire')->where('Cycle', '6eme')->groupBy('Annee_scolaire')->get();
        $TOTAL_NOTE_6eme = DB::table('etudiants')->select(DB::raw('SUM(Mal_MJ1) + SUM(Frs_MJ1) + sum(Ang_MJ1) + sum(HG_MJ1) + sum(EC_MJ1) + sum(Mths_MJ1) + sum(PC_MJ1) + sum(SVT_MJ1) + sum(EPS_MJ1) as totalMalFrsMJ1'), 'Annee_scolaire')->where('Cycle', '6eme')->groupBy('Annee_scolaire')->get();
        foreach ($TOTAL_NOTE_6eme as $result) {
            $res_6eme=round(($result->totalMalFrsMJ1)/(120),2);
        } 

        $eleve_5eme = DB::table('etudiants')
        ->select(DB::raw('COUNT(Nom_elev) as countNomElev'), 'Annee_scolaire')
        ->where('Cycle', '5eme')
        ->groupBy('Annee_scolaire')
        ->get();
        $TOTAL_NOTE_5eme = DB::table('etudiants')->select(DB::raw('SUM(Mal_MJ1) + SUM(Frs_MJ1) + sum(Ang_MJ1) + sum(HG_MJ1) + sum(EC_MJ1) + sum(Mths_MJ1) + sum(PC_MJ1) + sum(SVT_MJ1) + sum(EPS_MJ1) as totalMalFrsMJ1'), 'Annee_scolaire')->where('Cycle', '5eme')->groupBy('Annee_scolaire')->get();
        foreach ($TOTAL_NOTE_5eme as $result) {
            $qsqs=round(($result->totalMalFrsMJ1)/(120),2);
        }
        $TOTAL_NOTE_4eme = DB::table('etudiants')
        ->select(DB::raw('SUM(Mal_MJ1) + SUM(Frs_MJ1) + sum(Ang_MJ1) + sum(HG_MJ1) + sum(EC_MJ1) + sum(Mths_MJ1) + sum(PC_MJ1) + sum(SVT_MJ1) + sum(EPS_MJ1) as totalMalFrsMJ1'), 'Annee_scolaire')
        ->where('Cycle', '4eme')
        ->groupBy('Annee_scolaire')
        ->get();
        $TOTAL_NOTE_3eme = DB::table('etudiants')->select(DB::raw('SUM(Mal_MJ1) + SUM(Frs_MJ1) + sum(Ang_MJ1) + sum(HG_MJ1) + sum(EC_MJ1) + sum(Mths_MJ1) + sum(PC_MJ1) + sum(SVT_MJ1) + sum(EPS_MJ1) as totalMalFrsMJ1'), 'Annee_scolaire')->where('Cycle', '3eme')->groupBy('Annee_scolaire')->get();
        return view ('stat', compact('Annee_scolaire', 'qsqs', 'res_6eme', 'Cycle', 'TOTAL_NOTE_6eme', 'TOTAL_NOTE_5eme', 'TOTAL_NOTE_4eme', 'TOTAL_NOTE_3eme'));
    }
    public function stat_par_class(){
        return view('stat_par_class');
    }
    public function stat_par_class_get(request $etudiants){
        //moyenne de classe 1ere trimestre
        $classe = $etudiants->Cycle;
        $annee_scolaire = $etudiants->Annee_scolaire;
        // dd($etudiants->Cycle);
        $malagasy_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_MJ1');
        $malagasy_EX1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_EX1');
        
        $francais_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_MJ1');
        $francais_EX1Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_EX1');
        
        $anglais_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_MJ1');
        $anglais_EX1Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_EX1');
        
        $hg_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_MJ1');
        $hg_EX1Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_EX1');
        
        $ec_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_MJ1');
        $ec_EX1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_EX1');
        
        $mths_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_MJ1');
        $mths_EX1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_EX1');
        
        $pc_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_MJ1');
        $pc_EX1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_EX1');
        
        $svt_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_MJ1');
        $svt_EX1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_EX1');
        
        $eps_MJ1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_MJ1');
        $eps_EX1_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_EX1');
        $Note_classe_1Trimestre = $malagasy_MJ1_Sum + $malagasy_EX1_Sum + $francais_MJ1_Sum + $francais_EX1Sum + $anglais_MJ1_Sum + $anglais_EX1Sum + $hg_MJ1_Sum + $hg_EX1Sum + $ec_MJ1_Sum + $ec_EX1_Sum + $mths_MJ1_Sum + $mths_EX1_Sum + $pc_MJ1_Sum + $pc_EX1_Sum + $svt_MJ1_Sum + $svt_EX1_Sum + $eps_MJ1_Sum + $eps_EX1_Sum;
        //
        $count_nombre_elev=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->count('Nom_elev');
        $MOYENNE_CLASSE1=round($Note_classe_1Trimestre/($count_nombre_elev*40),2);

        //moyenne de classe 2eme trimestre
        $malagasy_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_MJ2');
        $malagasy_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_EX2');
        
        $francais_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_MJ2');
        $francais_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_EX2');
        
        $anglais_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_MJ2');
        $anglais_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_EX2');
        
        $hg_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_MJ2');
        $hg_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_EX2');
        
        $ec_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_MJ2');
        $ec_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_EX2');
        
        $mths_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_MJ2');
        $mths_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_EX2');
        
        $pc_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_MJ2');
        $pc_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_EX2');
        
        $svt_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_MJ2');
        $svt_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_EX2');
        
        $eps_MJ2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_MJ2');
        $eps_EX2_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_EX2');
        $Note_classe_2Trimestre = $malagasy_MJ2_Sum + $malagasy_EX2_Sum + $francais_MJ2_Sum + $francais_EX2_Sum + $anglais_MJ2_Sum + $anglais_EX2_Sum + $hg_MJ2_Sum + $hg_EX2_Sum + $ec_MJ2_Sum + $ec_EX2_Sum + $mths_MJ2_Sum + $mths_EX2_Sum + $pc_MJ2_Sum + $pc_EX2_Sum + $svt_MJ2_Sum + $svt_EX2_Sum + $eps_MJ2_Sum + $eps_EX2_Sum;
        //
        $MOYENNE_CLASSE2=round($Note_classe_2Trimestre/($count_nombre_elev*40),2);

        //moyenne de classe 3eme trimestre
        $malagasy_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_MJ3');
        $malagasy_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mal_EX3');
        
        $francais_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_MJ3');
        $francais_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Frs_EX3');
        
        $anglais_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_MJ3');
        $anglais_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Ang_EX3');
        
        $hg_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_MJ3');
        $hg_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('HG_EX3');
        
        $ec_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_MJ3');
        $ec_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EC_EX3');
        
        $mths_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_MJ3');
        $mths_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('Mths_EX3');
        
        $pc_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_MJ3');
        $pc_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('PC_EX3');
        
        $svt_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_MJ3');
        $svt_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('SVT_EX3');
        
        $eps_MJ3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_MJ3');
        $eps_EX3_Sum=DB::table('etudiants')->where('Annee_scolaire',$etudiants->Annee_scolaire)->where('Cycle',$etudiants->Cycle)->sum('EPS_EX3');
        $Note_classe_3Trimestre = $malagasy_MJ3_Sum + $malagasy_EX3_Sum + $francais_MJ3_Sum + $francais_EX3_Sum + $anglais_MJ3_Sum + $anglais_EX3_Sum + $hg_MJ3_Sum + $hg_EX3_Sum + $ec_MJ3_Sum + $ec_EX3_Sum + $mths_MJ3_Sum + $mths_EX3_Sum + $pc_MJ3_Sum + $pc_EX3_Sum + $svt_MJ3_Sum + $svt_EX3_Sum + $eps_MJ3_Sum + $eps_EX3_Sum;
        //
        $MOYENNE_CLASSE3=round($Note_classe_3Trimestre/($count_nombre_elev*40),2);
        // dd($MOYENNE_CLASSE1);
        return view('stat_par_class', compact('MOYENNE_CLASSE1', 'MOYENNE_CLASSE2', 'MOYENNE_CLASSE3', 'classe', 'annee_scolaire'));
    }
}
