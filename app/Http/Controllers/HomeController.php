<?php

namespace App\Http\Controllers;
use Illuminate\Support\HtmlString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Annee_scolaire;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    //
    public function index()
    {
        //Session des chaque ecolle qui s'authentifier
        $valeure = Session::get('key');
        // Pour récupérer une valeur d'un tableau
        $tableauValeurs = Session::get('tableau_key');
        return view ('home', compact('valeure', 'tableauValeurs'));
    }
    public function home_lycee()
    {
        //Session des chaque ecolle qui s'authentifier
        $valeure = Session::get('key');
        return view ('home_lycee', compact('valeure'));
    }
    
    public function navbar()
    {
        return view ('navbar');
    }
    public function navbar_login()
    {
        return view ('navbar_auth');
    }
    public function navbar_lycee()
    {
        return view ('navbar_lycee');
    }
    public function annescolaire()
    {
        $annee_scolaire = Annee_scolaire::all();
        return view ('annescolaire', compact('annee_scolaire'));
    }
    public function ajouter_anne()
    {
        return view ('ajouter_anne');
    }
    // public function list_annee()
    // {
    //     //$nom de variable = nom de modele corespondants::all
    //     //requete de selection
    //     $annee_scolaire = Annee_scolaire::all();
    //     return view('annescolaire', compact('annee_scolaire'));
    // }
    public function ajouter_anne_traitement(Request $request)
    {
        $request->validate([
            //nom dela champ dans la formulaire=> required,
            'Annee' => 'required',
        ]);
        //$nom de variable = new nom de la modele
        $Annee_scolaire = new Annee_scolaire();
        //$user->nom_delaformat_ao_@_view=$Request->nom_de colone dans la bd
        $Annee_scolaire->Annee = $request->Annee;
        //methode save enregistrer dans la base de donne
        $Annee_scolaire->save();
        //retour dans un page
        //return redirect('/nom du route de rediriger')->with('status','messege afficher');
        return redirect('/annescolaire')->with('status', 'Ajout annéé scolaire succes');
    }
    public function update_anne($id)
    {
        //recherche l'objet etudiant dans la model
        $Annee_scolaire = Annee_scolaire::find($id);
        // $annee_scolaire = Annee_scolaire::pluck('Annee','id');
        return view ('update_anne', compact('Annee_scolaire'));
    }
    //modifier fonction
    public function update_anne_traitement(Request $request)
    {
        $request->validate([
            //nom dela champ dans la formulaire=> required,
            'Annee' => 'required',
        ]);
        //instancier les objet etudiant
        //$nom de variable = new nom de la modele
        $Annee_scolaire = Annee_scolaire::find($request->id);
        //$user->nom_delaformat_ao_@_view=$Request->nom_de colone dans la bd
        $Annee_scolaire->Annee = $request->Annee;
        //methode save enregistrer dans la base de donne
        $Annee_scolaire->update();
        //retour dans un page
        //return redirect('/nom du route de rediriger')->with('status','messege afficher');
        return redirect('/annescolaire')->with('status', 'modification succes');
    }
    public function delete_Annee($id)
    {
        // cherchel l'id dans la base de donne
        $Annee_scolaire = Annee_scolaire::find($id);
        // methode suorimer
        $Annee_scolaire->delete();
        return redirect('/annescolaire')->with('status', 'Supression succes');
    }
    public function Acceuil()
    {
        return view('Acceuil');
    }
    public function apropots()
    {
        $email = 'nomenionysamuel@gmail.com';
        $subject = 'Demande d\'information';
        $body = 'Bonjour, je souhaiterais obtenir des informations supplémentaires.';

        $mailtoLink = new HtmlString(
            sprintf('mailto:%s?subject=%s&body=%s', urlencode($email), urlencode($subject), urlencode($body))
        );
        $phoneNumber = '+261345224036';
        $telLink = new HtmlString(sprintf('tel:%s',$phoneNumber));
        return view('apropots', compact('mailtoLink','telLink'));
    }
    public function exporter_BD()
    {
        $fileName = 'gestion_de_note.xls';
        $tables = DB::select('SHOW TABLES');
        $output = '';
        foreach ($tables as $table) {
            $tableArray = (array) $table;
            $tableName = reset($tableArray);
            $output.="DROP TABLE IF EXIST `$tableName`;\n";
            $createTable = DB::selectOne("SHOW CREATE TABLE `$tableName`");
            $output.=$createTable->{'Create Table'}.";\n\n";
            
                $rows=DB::table($tableName)->get();
                foreach ($rows as $row => $value) {
                    $row = (array) $row;
                    $values = implode(array_map('addslashes',array_values($row)));
                    $output.="\n\n";
                    Storage::disk('local')->put($fileName,$output);
                    return response()->download(storage_path("app/$fileName"));
                }
        }
        // exec('mysqldump -u{root} -p {gestion_de_note.sql}>'.$fileName);
        
        // return view('navbar_auth');
    }
}
