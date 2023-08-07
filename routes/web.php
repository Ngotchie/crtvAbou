<?php
use Illuminate\Support\Facades\DB;
//use PDF;
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
$this->post('/exportExcel', 'Inventaire@exportData');
$this->post('/printPdf', 'Inventaire@generatePDF');
$this->post('/printInventaire', 'Inventaire@generateInventaire');
$this->post('/filtre', 'Inventaire@filtreData');
$this->get('/villes/{id}', 'FiltreController@getVilles');
$this->get('/sites/{id}', 'FiltreController@getSites');

$this->get('/inventaire/{id}', 'Inventaire@getOne');
$this->put('/inventaire/{id}', 'Inventaire@updateOne');

$this->get('/compte_gestion/{annee}', 'CompteGestionController@compte_gestion');

$this->get('/testpdf', function() {
  ini_set('max_execution_time', 0);
  ini_set('memory_limit', '4000M');    
  $liste = DB::table('element_detenteurs')->where('region', '=', "Adamaoua")->orderBy('number', 'ASC')->get();
  
   $file_name = date("Y.m.d")."_ListeDetenteur.pdf";

        $data = [
            'title' => 'FICHE DE DETENTEUR',
            'date' => date('m/d/Y'),
            'liste' => $liste,
            'lib_region' => "",
            'lib_ville' => "",
            'lib_site' => "",
            'det' => "",
        ];


        PDF::setOptions([
            "defaultFont" => "Courier",
            "defaultPaperSize" => "a3",
            "dpi" => 130
        ]);

        $pdf = PDF::loadView('pdf', $data)->setPaper('a4', 'landscape');;
        return $pdf->download($file_name);
});

$this->get('/dashboard', function() {
    return view('dashboard');
});
