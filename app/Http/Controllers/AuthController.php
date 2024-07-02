<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
//chemin ny model hapiasaina
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Ecole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\HomeController;


class AuthController extends Controller
{
    //foncton appele la vue
    public function register()
    {
        return view('register');
    }
    public function register1()
    {
        // $Note = DB::table('ecoles')->select('*')->where('id','=','1')->get();
        $ecoles = Ecole::pluck('Nom_ecol','id');
        return view('register', compact('ecoles'));
    }
    // ajout authentification
    //fonction miappel ny controller
    public function ajout_registerPost(Request $request)
    {
       
        //instanciation de variable user
        $request->validate([
            //nom dela champ dans la formulaire=> required,
            'Zap' => 'required',
            'divisins' => 'required',
            'Nom_ecol' => 'required',
            'code_Nom_ecol' => 'required',
            'name' => 'required',
            'password' => 'required',
            'DRN' => 'required',
            'code_DRN' => 'required',
            'Cisco' => 'required',
            'code_Cisco' => 'required',
            // 'code_Zap' => 'required',
            'commune' => 'required',
            'code_commune' => 'required',
            'fokontany' => 'required',
            'code_fokontany' => 'required',
            'quartier' => 'required',
        ]);
        $user = new User();
        // $option = $request->input('Nom_ecol');
        //$user->nom_delaformat_ao_@_view=$Request->nom_de colone dans la bd
        $user->Zap = $request->Zap;
        $user->divisins = $request->input('divisins');
        $user->Nom_ecol = $request->Nom_ecol;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);

        $user->DRN = $request->DRN;
        $user->code_DRN = $request->code_DRN;
        $user->Cisco = $request->Cisco;
        $user->code_Cisco = $request->code_Cisco;
        // $user->code_Zap = $request->code_Zap;
        $user->code_Nom_ecol = $request->code_Nom_ecol;
        $user->commune = $request->commune;
        $user->code_commune = $request->code_commune;
        $user->fokontany = $request->fokontany;
        $user->code_fokontany = $request->code_fokontany;
        $user->quartier = $request->quartier;
        $user->save();

        return back()->with('succes', 'Ajout utilisateur succes');

    }
    //authentification
    public function login()
    {
        return view ('login');
    }
    public function login1()
    {
        // $zap= DB::table('user')->select('Zap')->groupBy('Zap');
        $zap = DB::table('users')->select('Zap')->where('divisins','=','ceg')->groupBy('Zap')->get();
        $ecoles_ceg = DB::table('users')->select('*')->where('divisins','=','ceg')->pluck('Nom_ecol');
        // $ecoles = Ecole::pluck('Nom_ecol','Code_ecol','id');
        return view('login', compact('ecoles_ceg', 'zap'));
    }
    public function loginPost(Request $request)
    {
        //instanciation de variable user
        $credetials=[
            // 'Commune' => $request->Commune,
            'Zap' => $request->Zap,
            'Nom_ecol' => $request->Nom_ecol,
            'name' => $request->name,
            'password' => $request->password,
        ];
        if (Auth::attempt($credetials)) {
            Session::flash('alert','Connecté.');
            // Une fois l'utilisateur authentifié, stockez les valeurs dans la session.
            //SESSION DE IDENTIFICATION DE CHAQUE PAGE
            $Nom_ecol = $request->input('Nom_ecol');
            $informatiion_ecol_authentifier=DB::table('users')->select('*')->where('Nom_ecol',$Nom_ecol)->get();
            
                Session::put('key', $informatiion_ecol_authentifier);
                // Ou pour un tableau :
                Session::push('tableau_key', 'valeur');
            // return redirect()->route('home');
            return redirect('/home');
        }

        return back()->with('error', "Nom d'utilisateur et mot de passe incorrecte");
    }

    //authentification lycee
    public function login_lycee()
    {
        return view ('login_lycee');
    }
    public function login2()
    {
        $zap_licee = DB::table('users')->select('Zap')->where('divisins','=','lycee')->groupBy('Zap')->get();
        $ecoles_lycee = DB::table('users')->select('*')->where('divisins','=','lycee')->pluck('Nom_ecol');
        // $ecoles = Ecole::pluck('Nom_ecol','Code_ecol','id');
        return view('login_lycee', compact('ecoles_lycee', 'zap_licee'));
    }
    public function login_lycee_Post(Request $request)
    {
        //instanciation de variable user
        $credetials=[
            // 'Commune' => $request->Commune,
            'Zap' => $request->Zap,
            'Nom_ecol' => $request->Nom_ecol,
            'name' => $request->name,
            'password' => $request->password,
        ];
        if (Auth::attempt($credetials)) {
            Session::flash('alert','Connecté.');
            // Une fois l'utilisateur authentifié, stockez les valeurs dans la session.
            //SESSION DE IDENTIFICATION DE CHAQUE PAGE
            $Nom_ecol_lycee = $request->input('Nom_ecol');
            $informatiion_ecol_authentifier=DB::table('users')->select('*')->where('Nom_ecol',$Nom_ecol_lycee)->get();
            
                Session::put('key', $informatiion_ecol_authentifier);
            // return redirect()->route('home');
            return redirect('/home_lycee');
        
            // return redirect('/home_lycee')->with('success','login berhasil');
        }

        return back()->with('error', "Nom d'utilisateur et mot de passe incorrecte");
    }

    // public function login_ceg()
    // {
    //     // SI code ecol 1 ceg
    //     $ecoles = DB::table('ecoles')->select('*')->where('Code_ecol','=','1')->pluck('Nom_ecol');
    //     return view('login', compact('ecoles'));
    // }

    

    public function logout()
    {
        Auth::logout();
        return redirect()->route('Acceuil');
        // exit();
    }
    // public function securite_page()
    // {
    //     Session_start();
    //     if (!Session::has('id')) {
    //         return redirect::to('Acceuil')->send();
    //         exit();
    //     }
    // }
}
