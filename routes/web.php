<?php



use App\Http\Livewire\hygiene\Soin;
use App\Http\Livewire\gestion\Roles;
use App\Http\Livewire\gestion\Users;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\gestion\Champs;
use App\Http\Livewire\gestion\Eleves;
use App\Http\Livewire\parametre\Cebs;
use App\Http\Livewire\parametre\Csps;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\gestion\Classes;
use App\Http\Livewire\parametre\Vivre;
use App\Http\Livewire\production\Repa;
use App\Http\Livewire\parametre\Ecoles;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\gestion\UserRoles;
use App\Http\Livewire\parametre\Plantes;
use App\Http\Livewire\parametre\Regions;
use App\Http\Livewire\parametre\Communes;
use App\Http\Livewire\production\MetRepa;
use App\Http\Livewire\parametre\Provinces;
use App\Http\Livewire\gestion\ClassesEcoles;
use App\Http\Livewire\hygiene\Consultations;
use App\Http\Livewire\parametre\Enseignants;
use App\Http\Livewire\parametre\Medicaments;
use App\Http\Livewire\gestion\AnneeScolaires;
use App\Http\Livewire\production\Ingredients;
use App\Http\Livewire\production\Productions;
use App\Http\Livewire\production\VivresEcoles;
use App\Http\Livewire\etatetstatistique\EtatsDS;
use App\Http\Livewire\hygiene\Dispositifsecoles;
use App\Http\Livewire\etatetstatistique\EtatsQPLC;
use App\Http\Livewire\etatetstatistique\EtatsEcole;
use App\Http\Livewire\parametre\Dispositifhygienes;
use App\Http\Livewire\production\VivresIngredients;
use App\Http\Livewire\etatetstatistique\EtatsRegion;
use App\Http\Livewire\etatetstatistique\EtatsProvince;
use App\Http\Livewire\etatetstatistique\EtatsSProduitRecu;




Route::get('/', function () {
    return view('auth\login');
});

    // Route pour l'administrateur
// Route::Group([
//     "middleware"=>["auth","auth.administrateur"],
//     "as"=>"administration."
// ],function(){
//     // route pour parametre
//     Route::Group([
//         "prefix"=>"parametre",
//         "as"=>"parametre. "
//     ],function(){
//         Route::get('utilisateur', [UserController::class, 'index'])->name('utilisateur');
//     });
// });



//         // Route pour les utilisateurs

    

// Route::Group([
// ],function(){
//     // route pour parametre
//     Route::Group([
//         "prefix"=>"Production",
//         "as"=>"production."
//     ],function(){
//         Route::get('ingredient',function(){
//             return view('production.ingredient');
//         })->name('ingredient');
//     });
// });
        // Route pour l'authentification laravel ui

Auth::routes([ 'login' => false,'register' => false,'logout' => false]);

      // logout
   Route::post('deconnexion')->name('logout')->uses('App\Http\Controllers\Auth\LoginController@logout');

   // login
Route::post('connexion')->name('login')->uses('App\Http\Controllers\Auth\LoginController@login');
Route::get('connexion')->name('login')->uses('App\Http\Controllers\Auth\LoginController@showLoginForm');

    // register
Route::post('site-fait-part-goteysoft')->name('register')->uses('App\Http\Controllers\Auth\RegisterController@register');
Route::get('site-fait-part-goteysoft')->name('register')->uses('App\Http\Controllers\Auth\RegisterController@showRegistrationForm');






Route::get('/accueil', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




                // Parametre
               
                  Route::get('/ceb',Cebs::class)->name('cebindex')->middleware("auth.administrateur");
                    Route::get('/commune',Communes::class)->name('communeindex')->middleware("auth.administrateur");
                      Route::get('/csp',Csps::class)->name('cspindex')->middleware("auth.administrateur");
                       Route::get('/dispositifhygiene',Dispositifhygienes::class)->name('dispositifhygieneindex')->middleware("auth.administrateur");
                        Route::get('/ecole',Ecoles::class)->name('ecoleindex')->middleware("auth.administrateur");
                        Route::get('/enseignant',Enseignants::class)->name('enseignantindex')->middleware("auth.administrateur");
                         Route::get('/medicament',Medicaments::class)->name('medicamentindex')->middleware("auth.administrateur");
                          Route::get('/plante',Plantes::class)->name('planteindex')->middleware("auth.administrateur");
                           Route::get('/province',Provinces::class)->name('provinceindex')->middleware("auth.administrateur");
                            Route::get('/region',Regions::class)->name('regionindex')->middleware("auth.administrateur");
                             Route::get('/vivre',Vivre::class)->name('vivresindex')->middleware("auth.administrateur");


                  // GESTION 
                  Route::get('/annescolaires',AnneeScolaires::class)->name('annescolairesindex')->middleware("auth.administrateur");
                     Route::get('/champs',Champs::class)->name('champsindex')->middleware("auth.administrateur");
                        Route::get('/classes',Classes::class)->name('classesindex')->middleware("auth.administrateur");
                           Route::get('/classeecoles',ClassesEcoles::class)->name('classeecolesindex')->middleware("auth.administrateur");
                              Route::get('/eleves',Eleves::class)->name('elevesindex')->middleware("auth.administrateur");
                                 Route::get('/vivres',Vivre::class)->name('vivresindex')->middleware("auth.administrateur");
                                 Route::get('/utilisateurs',Users::class)->name('utilisateursindex')->middleware("auth.administrateur");
                                 Route::get('/roles',Roles::class)->name('rolesindex')->middleware("auth.administrateur");
                                 Route::get('/usersroles',UserRoles::class)->name('usersrolesindex')->middleware("auth.administrateur");




                  // HYGIENE 
                  Route::get('/consultations',Consultations::class)->name('consultationsindex');
                  
                   Route::get('/dispositifsecoles',Dispositifsecoles::class)->name('dispositifsecolesindex');



                  // PRODUCTION
              
                   Route::get('/metrepas',MetRepa::class)->name('metrepasindex');
                    Route::get('/production',Productions::class)->name('productionindex');
                     Route::get('/repas',Repa::class)->name('repasindex');
                      // Route::get('/vivresingredients',VivresIngredients::class)->name('vivresingredientsindex');
                       Route::get('/vivresecoles',VivresEcoles::class)->name('vivresecolesindex');
                          Route::get('/ingredient',Ingredients::class)->name('ingredientindex');

            // etatetstatistique

             Route::get('/etatsecole',EtatsEcole::class)->name('etatsecole');
             Route::get('/etatsprovince',EtatsProvince::class)->name('etatsprovince');
             Route::get('/etatsregion',EtatsRegion::class)->name('etatsregion');
             Route::get('/etatssproduitrecu',EtatsSProduitRecu::class)->name('etatssproduitrecu');
             Route::get('/etatsds',EtatsDS::class)->name('etatsds');
             Route::get('/etatqplc',EtatsQPLC::class)->name('etatsqplc');
           
        // supprimer 
         
            //  Route::get('/soins',Soin::class)->name('vivresindex');