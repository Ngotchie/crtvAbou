<?php
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

$this->get('/', function() {
  return view('login');
});

$this->post('/authenticate', 'Auth\LoginController@authenticate');

$this->get('/inventaire', 'Inventaire@index');
$this->post('/importfile', 'Inventaire@importData');
$this->get('/exportExcel', 'Inventaire@exportData');
$this->post('/printPdf', 'Inventaire@generatePDF');
$this->post('/filtre', 'Inventaire@filtreData');
$this->get('/villes/{id}', 'FiltreController@getVilles');
$this->get('/sites/{id}', 'FiltreController@getSites');

$this->get('/inventaire/{id}', 'Inventaire@getOne');
$this->put('/inventaire/{id}', 'Inventaire@updateOne');

$this->get('/compte_gestion/{annee}', 'CompteGestionController@compte_gestion');

$this->get('/testpdf', function() {
  $liste = DB::table('element_detenteurs')->orderBy('number', 'ASC')->get();
  return view('pdf')->with('liste', $liste);
});

$this->get('/dashboard', function() {
    return view('dashboard');
});
