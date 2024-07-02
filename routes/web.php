<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthController;
use App\Models\Ecole;
use App\http\Controllers\inscriptionController;
use App\http\Controllers\HomeController;
use App\http\Controllers\EtudiantController;
use App\Models\Annee_scolaire;
use App\http\Controllers\NoteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
        return view('Acceuil');
});
//route::get('/chemin hotapema @url',[nom de controller::class, 'nom du fonction return view dans la controleur'])->name('ny nom de view hiverenany');
route::get('/register',[AuthController::class, 'register'])->name('register');
route::get('/register',[AuthController::class, 'register1']);
route::post('/register',[AuthController::class, 'ajout_registerPost'])->name('register');

route::get('/login',[AuthController::class, 'login'])->name('login');
route::get('/login',[AuthController::class, 'login1']);
route::post('/login',[AuthController::class, 'loginPost'])->name('login');
// route::post('/login',[AuthController::class, 'information_ecole']);

route::get('/login_lycee',[AuthController::class, 'login_lycee'])->name('login_lycee');
route::get('/login_lycee',[AuthController::class, 'login2']);
route::post('/login_lycee',[AuthController::class, 'login_lycee_Post'])->name('login_lycee');

route::get('/home',[HomeController::class, 'index']);
route::get('/Acceuil',[HomeController::class, 'Acceuil'])->name('Acceuil');
route::get('/home_lycee',[HomeController::class, 'home_lycee']);
route::delete('/logout',[AuthController::class, 'logout'])->name('logout');
route::delete('/securite_page',[AuthController::class, 'securite_page'])->name('securite_page');
route::get('/annescolaire',[HomeController::class, 'annescolaire']);
route::get('/ajouter_anne',[HomeController::class, 'ajouter_anne']);
route::post('/ajouter_anne/traitement',[HomeController::class, 'ajouter_anne_traitement']);
route::get('/update_anne/{id}',[HomeController::class, 'update_anne']);
route::post('/etudiant_anne_update/traitement',[HomeController::class, 'update_anne_traitement']);
route::get('/delete_annee/{id}',[HomeController::class, 'delete_Annee']);
route::get('/navbar_auth',[HomeController::class, 'navbar_login']);
route::GET('/exporter_BD',[HomeController::class, 'exporter_BD'])->name('exporter_BD');
Route::middleware(['auth'])->group(function () {
// Les routes sécurisées vont ici

//affichage des formulaire etudiant
route::get('/navbar',[HomeController::class, 'navbar']);
route::get('/navbar_lycee',[HomeController::class, 'navbar_lycee']);
route::get('/etudiant',[EtudiantController::class, 'list_etudiant']);
route::get('/ajouter',[EtudiantController::class, 'ajouter_etudiant']);
route::post('/ajouter/traitement',[EtudiantController::class, 'ajouter_etudiant_traitement']);

route::get('/liste',[inscriptionController::class, 'list_lyce']);
route::get('/inscription',[inscriptionController::class, 'inscription']);
route::post('/ajouter_lycee/traitement',[inscriptionController::class, 'ajouter_etudiant_lycee_traitement']);

//route modifier 
route::get('/update_etudiant/{id}',[EtudiantController::class, 'update_etudiant']);
route::post('/etudiant_ceg_update/traitement',[EtudiantController::class, 'update_etudiant_traitement']);

route::get('/update_etudiant_lycee/{id}',[inscriptionController::class, 'update_etudiant_lycee']);
route::post('/etudiant_Lycee_update/traitement',[inscriptionController::class, 'update_etudiant_lycee_traitement']);

route::get('/delete_etudiant_lycee/{id}',[inscriptionController::class, 'delete_etudiant_lycee']);
route::get('/delete_etudiant_ceg/{id}',[EtudiantController::class, 'delete_etudiant_ceg']);



route::get('/note',[NoteController::class, 'note']);
route::get('/matiere_ceg',[NoteController::class, 'matiere_ceg']);
route::post('/ajouter/matiere_ceg',[NoteController::class, 'matiere_ceg_traitement']);
route::get('/liste_matiere_ceg',[NoteController::class, 'liste_matiere_ceg']);
route::get('/update_matiere_ceg/{id}',[NoteController::class, 'update_matiere_ceg']);
route::post('/update/matiere_ceg',[NoteController::class, 'update_matiere_ceg_traitement']);
route::get('/delete_matiere_ceg/{id}',[NoteController::class, 'delete_matiere_ceg']);

route::get('/matiere_lycee',[NoteController::class, 'matiere_lycee']);
route::post('/ajouter/matiere_lycee',[NoteController::class, 'matiere_lycee_traitement']);
route::get('/liste_matiere_lycee',[NoteController::class, 'liste_matiere_lycee']);
route::get('/update_matiere_lycee/{id}',[NoteController::class, 'update_matiere_lycee']);
route::post('/update/matiere_lycee',[NoteController::class, 'update_matiere_lycee_traitement']);
route::get('/delete_matiere_lycee/{id}',[NoteController::class, 'delete_matiere_lycee']);
route::get('/examin',[NoteController::class, 'examin']);
route::get('/examin_lycee',[NoteController::class, 'examin_lycee']);

route::get('/liste_eleve_parclass_ceg',[NoteController::class, 'liste_eleve_parclass_ceg']);
route::get('/examin_action',[NoteController::class, 'examin_action_affiche_liste_ceg']);
// route::get('/students/records',[NoteController::class, 'records'])->name('/students/records');
route::get('/examin_action_lycee',[NoteController::class, 'examin_action_affiche_information_eleve_lycee']);

route::get('/ajout_note_ceg',[NoteController::class, 'ajout_note_ceg']);
route::get('/ajout_note_ceg/{id}',[NoteController::class, 'ajout_note_ceg_afiche']);

route::get('/ajout_note_lycee',[NoteController::class, 'ajout_note_lycee']);
route::get('/liste_note_ceg',[NoteController::class, 'liste_note_ceg']);
route::get('/update_note_ceg/{id}',[NoteController::class, 'update_note_ceg']);
route::post('/update_note_ceg/traitement',[NoteController::class, 'update_note_ceg_traitement']);
route::get('/delete_note_ceg/{id}',[NoteController::class, 'delete_note_ceg']);

route::post('/ajouter_note/traitement',[NoteController::class, 'ajouter_note_traitement']);

route::get('/bulletin_ceg',[NoteController::class, 'bulletin_ceg']);
route::get('/bulletin_ceg/{id}',[NoteController::class, 'bulletin_ceg_afiche']);
route::post('/Ajout_notes_ceg/traitement',[NoteController::class, 'Enregistrer_note_ceg_traitement']);

route::get('/bulletin_lycee',[NoteController::class, 'bulletin_lycee']);
route::get('/bulletin_lycee/{id}',[NoteController::class, 'bulletin_lycee_afiche']);
route::post('/Ajout_notes_lycee/traitement',[NoteController::class, 'Enregistrer_note_lycee_traitement']);

//listes des eleves ceg izy
Route::get('/students', [NoteController::class, 'index'])->name('students');
Route::get('/standards', [NoteController::class, 'getStandard'])->name('standards');
Route::get('/results', [NoteController::class, 'getResult'])->name('results');
Route::get('/students/records', [NoteController::class, 'records'])->name('students/records');

//listes des eleves ceg izy
Route::get('/liste_lycee', [NoteController::class, 'liste_lycee'])->name('liste_lycee');
Route::get('/Cycle', [NoteController::class, 'cycle_lycce'])->name('Cycle');
Route::get('/annescolaire_lycee', [NoteController::class, 'annescolaire_lycee'])->name('annescolaire_lycee');
Route::get('/eleve_lycee', [NoteController::class, 'liste_elev_lycee'])->name('eleve_lycee');

//Deliberation
Route::get('/deliberation', [NoteController::class, 'deliberation'])->name('deliberation');
Route::get('/deliberation_resultat', [NoteController::class, 'deliberation_resultat'])->name('deliberation_resultat');
route::POST('/deliberation_action_ceg',[NoteController::class, 'deliberation_action_affiche_information_eleve_ceg']);
route::get('/Resultats',[NoteController::class, 'resultats']);
Route::get('/Resultats_affiche', [NoteController::class, 'Resultats_affiche'])->name('Resultats_affiche');
route::POST('/resultat_action_ceg',[NoteController::class, 'resultat_action_affiche_information_eleve_ceg']);

Route::get('/deliberation_lycee', [NoteController::class, 'deliberation_lycee'])->name('deliberation_lycee');
Route::get('/deliberation_resultat_lycee', [NoteController::class, 'deliberation_resultat_lycee'])->name('deliberation_resultat_lycee');
route::get('/deliberation_action_lycee',[NoteController::class, 'deliberation_action_affiche_information_eleve_lycee']);

route::get('/Resultats_lycee',[NoteController::class, 'Resultats_lycee']);
Route::get('/Resultats_lycee_affiche', [NoteController::class, 'Resultats_lycee_affiche'])->name('Resultats_lycee_affiche');
route::POST('/resultat_action_lyee',[NoteController::class, 'resultat_action_affiche_information_eleve_lycee']);

route::get('/stat',[NoteController::class, 'stat']);
route::get('/stat_par_class',[NoteController::class, 'stat_par_class']);
route::get('/stat_par_class_get',[NoteController::class, 'stat_par_class_get']);

Route::get('/apropots', [HomeController::class, 'apropots']);
});

