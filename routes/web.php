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
$this->get('/printPdf', 'Inventaire@generatePDF');

$this->get('/testpdf', function() {
  $liste = DB::table('element_detenteurs')->orderBy('number', 'ASC')->get();
  return view('pdf')->with('liste', $liste);
});

$this->get('/dashboard', function() {
    return view('dashboard');
});