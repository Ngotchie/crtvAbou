<?php

namespace App\Http\Controllers;

include('ChiffresEnLettres.php');
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

use PDF;
use IGB;


class Inventaire extends Controller
{
    public function index()
    {
        //$detenteurs = DB::table('element_detenteurs')->get();
        $regions = DB::table('regions')->get();
        $typeImmos = DB::table('type_immobilisations')->get();
        $personnes = DB::table('detenteurs')->get();
        $nns = DB::table('nns')->get();
        return view ('inventaire')->with(['detenteurs' => [], 'regions' =>$regions, 'typeImmos' => $typeImmos, 
                                          'personnes' => $personnes, 'nns' => $nns, 'region_f' =>"-1", 'ville_f' =>"-1",
                                          'site_f' =>"-1", 'region_f' =>"-1", 'detenteur_f'=>"-1", 'typeImmo_f'=>"-1",
                                          'nommen_f'=>"-1", 'ammort_f'=>"-1", 'villes' => [], 'sites' => []]); 
    
    }

    public function importData(Request $request){
        // $this->validate($request, [
        //     'fileupload' => 'required|file|mimes:xls,xlsx'
        // ]);
        $the_file = $request->file('file');
        // dd($request->all());
        ini_set('max_execution_time', 0);
        try{
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range( 3, /*$row_limit*/500 );

            $column_range = range( 'AA', $column_limit );
            $startcount = 2;
            $data = array();
            foreach ( $row_range as $row ) {
                $data[] = [
                    'assets_number' =>$sheet->getCell( 'D' . $row )->getValue(),
                    'region' => $sheet->getCell( 'E' . $row )->getValue(),
                    'ville' => $sheet->getCell( 'F' . $row )->getValue(),
                    'site' => $sheet->getCell( 'G' . $row )->getValue(),
                    'title' => $sheet->getCell( 'L' . $row )->getValue(),
                    'entite' =>$sheet->getCell( 'H' . $row )->getValue(),
                    'departement' =>$sheet->getCell( 'I' . $row )->getValue(),
                    'emplacement' =>$sheet->getCell( 'J' . $row )->getValue(),
                    'nns' =>$sheet->getCell( 'K' . $row )->getValue(),
                    'number' =>$sheet->getCell( 'AB' . $row )->getValue(),
                    'nom_article' =>$sheet->getCell( 'AC' . $row )->getValue(),
                    'type_dimmobilisation' =>$sheet->getCell( 'AD' . $row )->getValue(),
                    'statut_de_larticle' =>$sheet->getCell( 'AE' . $row )->getValue(),
                    'nom_agent_collecteur' =>$sheet->getCell( 'AF' . $row )->getValue(),
                    'date_mise_en_service' =>$sheet->getCell( 'BO' . $row )->getValue(),
                    'valeur_selon_fiche' =>$sheet->getCell( 'BP' . $row )->getValue(),
                    'source' =>$sheet->getCell( 'BQ' . $row )->getValue(),
                    'ligne_annexe' =>$sheet->getCell( 'BR' . $row )->getValue(),
                    'valeur_origine' =>$sheet->getCell( 'BS' . $row )->getValue(),
                    'date_mes_cptable' =>$sheet->getCell( 'BT' . $row )->getValue(),
                    'taux_amortissement' =>$sheet->getCell( 'BU' . $row )->getValue(),
                    'duree_de_vie' =>$sheet->getCell( 'BV' . $row )->getValue(),
                    'date_amortissement' =>$sheet->getCell( 'BW' . $row )->getValue(),
                    'cumul_dotations_2017' =>$sheet->getCell( 'BX' . $row )->getValue(),
                    'vnc_2017' =>$sheet->getCell( 'BY' . $row )->getValue(),
                    'cumul_dotations_2018' =>$sheet->getCell( 'BY' . $row )->getValue(),
                    'vnc_2018' =>$sheet->getCell( 'CA' . $row )->getValue(),
                    'valeur_a_dire_experts' =>$sheet->getCell( 'CB' . $row )->getValue(),
                    'ecart_de_reevaluation' =>$sheet->getCell( 'CC' . $row )->getValue()
                ];
                $startcount++;
            }
            DB::table('element_detenteurs')->insert($data);
        } catch (Exception $e) {
            return back()->withErrors('There was a problem uploading the data!');
        }
        return back()->withSuccess('Great! Data has been successfully uploaded.');
    }

    
   /**
    * @param $customer_data
    */
   public function ExportExcel($customer_data){
    ini_set('max_execution_time', 0);
    ini_set('memory_limit', '4000M');
        try {
            $spreadSheet = new Spreadsheet();
            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
            $spreadSheet->getActiveSheet()->fromArray($customer_data);
            $Excel_writer = new Xls($spreadSheet);
            $file_name = date("Y.m.d")."_ExportDetenteur.xls";
            //$file_name = $lb_region+"_"+$lb_ville+"_"+$lb_site+"_FD_"+$lb_det+".xl";
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename='.$file_name);
            header('Cache-Control: max-age=0');
            // ob_end_clean();
            $Excel_writer->save('php://output');
            exit();
        } catch (Exception $e) {
            return;
        }
    }

    /**
     *This function loads the customer data from the database then converts it
    * into an Array that will be exported to Excel
    */
    function exportData(Request $request){
        $region = $request->get('region');
        $ville = $request->get('ville');
        $site = $request->get('site');
        $detenteur = $request->get('detenteur');
        $typeImmo = $request->get('typeImmo');
        $nommen = $request->get('nommen');
        $ammort = $request->get('ammort');

        $query = DB::table('element_detenteurs');
        if($region != '-1'){
            $lib_region = DB::table('regions')->where('id', '=', $region)->value('intitule');
            $query->whereRaw('LOWER(region) = (?)', [strtolower($lib_region)])->where('region', '=', $lib_region);
        }
        if($ville != '-1'){
            $lib_ville = DB::table('villes')->where('id', '=', $ville)->value('intitule');
            $query->whereRaw('LOWER(ville) = (?)', [strtolower($lib_ville)])->where('ville', '=', $lib_ville);
        }
        if($site != '-1'){
            $lib_site = DB::table('sites')->where('id', '=', $site)->value('intitule');
            $query->whereRaw('LOWER(site) = (?)', [strtolower($lib_site)])->where('site', '=', $lib_site);
        }
        if($detenteur != '-1'){
            $det = DB::table('detenteurs')->where('id', '=', $detenteur)->value('nom');
            $query->where('nom_agent_collecteur', '=', $det);
        }
        if($typeImmo != '-1'){
            $lib_ti = DB::table('type_immobilisations')->where('id', '=', $typeImmo)->value('intitule');
            $query->where('type_dimmobilisation', '=', $lib_ti);
        }
        if($nommen != '-1'){
            $lib_nom = DB::table('nns')->where('id', '=', $nommen)->value('intitule');
            $query->where('nns', '=', $lib_nom);
        }
        if($ammort != '-1'){
            $query->where('valeur_amortissement', '=', $ammort);
        }
        $data = $query->orderBy('nns', 'ASC')->orderBy('title', 'ASC')->get();
        $data_array [] = array("Asset Number", "NNS","Title","Description","Date Affectation",
        "Lieu Affectation","P U","Valeur","QTE","Date Acquisition","Visa Detenteur","Observations");
        foreach($data as $data_item)
        {
            $data_array[] = array(
                'Asset Number' => $data_item->assets_number,
                'NNS' => $data_item->nns,
                'Title' => $data_item->title,
                'Description' => $data_item->nom_article,
                'Date Affectation' =>$data_item->date_mise_en_service,
                'Lieu Affectation' =>$data_item->departement,
                'P U' =>$data_item->valeur_origine,
                'Valeur' =>$data_item->valeur,
                'QTE' =>$data_item->quantite,
                'Date Acquisition' =>$data_item->date_acquisition,
                'Visa Detenteur' =>$data_item->visa_detenteur,
                'Observations' =>$data_item->observation
            );
        }
        $this->ExportExcel($data_array);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function generatePDF(Request $request)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');
        $region = $request->get('region');
        $ville = $request->get('ville');
        $site = $request->get('site');
        $detenteur = $request->get('detenteur');
        $typeImmo = $request->get('typeImmo');
        $nommen = $request->get('nommen');
        $ammort = $request->get('ammort');

        $lib_region = "";
        $lib_ville = "";
        $lib_site = "";
        $det = "";

        $query = DB::table('element_detenteurs');
        if($region != '-1'){
            $lib_region = DB::table('regions')->where('id', '=', $region)->value('intitule');
            $query->whereRaw('LOWER(region) = (?)', [strtolower($lib_region)])->where('region', '=', $lib_region);
        }
        if($ville != '-1'){
            $lib_ville = DB::table('villes')->where('id', '=', $ville)->value('intitule');
            $query->whereRaw('LOWER(ville) = (?)', [strtolower($lib_ville)])->where('ville', '=', $lib_ville);
        }
        if($site != '-1'){
            $lib_site = DB::table('sites')->where('id', '=', $site)->value('intitule');
            $query->whereRaw('LOWER(site) = (?)', [strtolower($lib_site)])->where('site', '=', $lib_site);
        }
        if($detenteur != '-1'){
            $det = DB::table('detenteurs')->where('id', '=', $detenteur)->value('nom');
            $query->where('nom_agent_collecteur', '=', $det);
        }
        if($typeImmo != '-1'){
            $lib_ti = DB::table('type_immobilisations')->where('id', '=', $typeImmo)->value('intitule');
            $query->where('type_dimmobilisation', '=', $lib_ti);
        }
        if($nommen != '-1'){
            $lib_nom = DB::table('nns')->where('id', '=', $nommen)->value('intitule');
            $query->where('nns', '=', $lib_nom);
        }
        if($ammort != '-1'){
            $query->where('valeur_amortissement', '=', $ammort);
        }
        $liste = $query->orderBy('nns', 'ASC')->orderBy('title', 'ASC')->get();

        $file_name = date("Y.m.d")."_ListeDetenteur.pdf";

        $data = [
            'title' => 'FICHE DE DETENTEUR',
            'date' => date('m/d/Y'),
            'liste' => $liste,
            'lib_region' => $lib_region,
            'lib_ville' => $lib_ville,
            'lib_site' => $lib_site,
            'det' => $det,
        ];

        PDF::setOptions([
            "defaultFont" => "Courier",
            "defaultPaperSize" => "a3",
            "dpi" => 130
        ]);

        $pdf = PDF::loadView('pdf', $data)->setPaper('a4', 'landscape');;
        return $pdf->download($file_name);
        // return response($$file_name)->header('Content-Type', 'application/javascript');
    }

    public function generateInventaire(Request $request)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');
        $region = $request->get('region');
        $ville = $request->get('ville');
        $site = $request->get('site');
        $detenteur = $request->get('detenteur');
        $typeImmo = $request->get('typeImmo');
        $nommen = $request->get('nommen');
        $ammort = $request->get('ammort');

        $lib_region = "";
        $lib_ville = "";
        $lib_site = "";
        $det = "";
        $montant = "";

        $query = DB::table('element_detenteurs');
        if($region != '-1'){
            $lib_region = DB::table('regions')->where('id', '=', $region)->value('intitule');
            $query->whereRaw('LOWER(region) = (?)', [strtolower($lib_region)])->where('region', '=', $lib_region);
        }
        if($ville != '-1'){
            $lib_ville = DB::table('villes')->where('id', '=', $ville)->value('intitule');
            $query->whereRaw('LOWER(ville) = (?)', [strtolower($lib_ville)])->where('ville', '=', $lib_ville);
        }
        if($site != '-1'){
            $lib_site = DB::table('sites')->where('id', '=', $site)->value('intitule');
            $query->whereRaw('LOWER(site) = (?)', [strtolower($lib_site)])->where('site', '=', $lib_site);
        }
        if($detenteur != '-1'){
            $det = DB::table('detenteurs')->where('id', '=', $detenteur)->value('nom');
            $query->where('nom_agent_collecteur', '=', $det);
        }
        if($typeImmo != '-1'){
            $lib_ti = DB::table('type_immobilisations')->where('id', '=', $typeImmo)->value('intitule');
            $query->where('type_dimmobilisation', '=', $lib_ti);
        }
        if($nommen != '-1'){
            $lib_nom = DB::table('nns')->where('id', '=', $nommen)->value('intitule');
            $query->where('nns', '=', $lib_nom);
        }
        if($ammort != '-1'){
            $query->where('valeur_amortissement', '=', $ammort);
        }
        $liste = $query->orderBy('nns', 'ASC')->orderBy('title', 'ASC')->get();
        /*foreach ($liste as list($v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10, $v11, $v12, $v13, $v14, $v15, $v16, $v17, $v18, $v19, $v20, $v21, $v22, $v23, $v24, $v25, $v26, $v27, $v28, $v29, $v30, $v31, $v32, $v33, $v34, $v35, $v36, $v37, $v38, $v39, $v40)) {
            ;//$montant = (strint)((int)$montant + (int)$v22);
        }*/
        $nb= 0;
        foreach ($liste as $cle_1 => $valeur_1) {
            $nbr = 0;
            foreach ($valeur_1 as $cle_2 => $valeur_2) {
                if($cle_2=='valeur_a_dire_experts') {
                    $nb = $nb + (int)$valeur_2;
                    $nbr = 0;
                    break;
                }
                $nbr++;
            }
        }
        //echo $liste;
        $file_name = date("Y.m.d")."_ListeDetenteur.pdf";
        
        $montant = (string)$nb;
        //asLetters(200000);
        $data = [
            'title' => 'FICHE DE DETENTEUR',
            'date' => date('m/d/Y'),
            'liste' => $liste,
            'lib_region' => $lib_region,
            'lib_ville' => $lib_ville,
            'lib_site' => $lib_site,
            'det' => $det,
            'montant' => $montant,
        ];


        PDF::setOptions([
            "defaultFont" => "Courier",
            "defaultPaperSize" => "a3",
            "dpi" => 130
        ]);

        $pdf = PDF::loadView('igb', $data)->setPaper('a4', 'landscape');;
        return $pdf->download($file_name);
        // return response($$file_name)->header('Content-Type', 'application/javascript');
    }

    public static function asLetters($number) {
        $convert = explode('.', $number);
        $num[17] = array('zero', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit',
                         'neuf', 'dix', 'onze', 'douze', 'treize', 'quatorze', 'quinze', 'seize');
                        
        $num[100] = array(20 => 'vingt', 30 => 'trente', 40 => 'quarante', 50 => 'cinquante',
                          60 => 'soixante', 70 => 'soixante-dix', 80 => 'quatre-vingt', 90 => 'quatre-vingt-dix');
                                        
        if (isset($convert[1]) && $convert[1] != '') {
          return self::asLetters($convert[0]).' et '.self::asLetters($convert[1]);
        }
        if ($number < 0) return 'moins '.self::asLetters(-$number);
        if ($number < 17) {
          return $num[17][$number];
        }
        elseif ($number < 20) {
          return 'dix-'.self::asLetters($number-10);
        }
        elseif ($number < 100) {
          if ($number%10 == 0) {
            return $num[100][$number];
          }
          elseif (substr($number, -1) == 1) {
            if( ((int)($number/10)*10)<70 ){
              return self::asLetters((int)($number/10)*10).'-et-un';
            }
            elseif ($number == 71) {
              return 'soixante-et-onze';
            }
            elseif ($number == 81) {
              return 'quatre-vingt-un';
            }
            elseif ($number == 91) {
              return 'quatre-vingt-onze';
            }
          }
          elseif ($number < 70) {
            return self::asLetters($number-$number%10).'-'.self::asLetters($number%10);
          }
          elseif ($number < 80) {
            return self::asLetters(60).'-'.self::asLetters($number%20);
          }
          else {
            return self::asLetters(80).'-'.self::asLetters($number%20);
          }
        }
        elseif ($number == 100) {
          return 'cent';
        }
        elseif ($number < 200) {
          return self::asLetters(100).' '.self::asLetters($number%100);
        }
        elseif ($number < 1000) {
          return self::asLetters((int)($number/100)).' '.self::asLetters(100).($number%100 > 0 ? ' '.self::asLetters($number%100): '');
        }
        elseif ($number == 1000){
          return 'mille';
        }
        elseif ($number < 2000) {
          return self::asLetters(1000).' '.self::asLetters($number%1000).' ';
        }
        elseif ($number < 1000000) {
          return self::asLetters((int)($number/1000)).' '.self::asLetters(1000).($number%1000 > 0 ? ' '.self::asLetters($number%1000): '');
        }
        elseif ($number == 1000000) {
          return 'millions';
        }
        elseif ($number < 2000000) {
          return self::asLetters(1000000).' '.self::asLetters($number%1000000);
        }
        elseif ($number < 1000000000) {
          return self::asLetters((int)($number/1000000)).' '.self::asLetters(1000000).($number%1000000 > 0 ? ' '.self::asLetters($number%1000000): '');
        }
      }
        
    public function filtreData(Request $request) 
    {
        $region = $request->get('region');
        $ville = $request->get('ville');
        $site = $request->get('site');
        $detenteur = $request->get('detenteur');
        $typeImmo = $request->get('typeImmo');
        $nommen = $request->get('nommen');
        $ammort = $request->get('ammort');

         $query = DB::table('element_detenteurs');
         if($region != "-1"){
            $lib_region = DB::table('regions')->where('id', '=', $region)->value('intitule');
            $query->whereRaw('LOWER(region) = (?)', [strtolower($lib_region)])->where('region', '=', $lib_region);
         }
         if($ville != "-1"){
            $lib_ville = DB::table('villes')->where('id', '=', $ville)->value('intitule');
            $query->whereRaw('LOWER(ville) = (?)', [strtolower($lib_ville)])->where('ville', '=', $lib_ville);
         }
         if($site != "-1"){
            $lib_site = DB::table('sites')->where('id', '=', $site)->value('intitule');
            $query->where('site', '=', $lib_site);
         }
         if($detenteur != "-1"){
            $det = DB::table('detenteurs')->where('id', '=', $detenteur)->value('nom');
            $query->where('nom_agent_collecteur', '=', $det);
         }
         if($typeImmo != "-1"){
            $lib_ti = DB::table('type_immobilisations')->where('id', '=', $typeImmo)->value('intitule');
            $query->where('type_dimmobilisation', '=', $lib_ti);
         }
         if($nommen != "-1"){
            $lib_nom = DB::table('nns')->where('id', '=', $nommen)->value('intitule');
            $query->where('nns', '=', $lib_nom);
         }
         if($ammort != "-1"){
            $query->where('valeur_amortissement', '=', $ammort);
         }
  
        $detenteurs = $query->orderBy('nns', 'ASC')->orderBy('title', 'ASC')->get();

        $personnes = DB::table('detenteurs')->get();
        $nns = DB::table('nns')->get();
        $regions = DB::table('regions')->get();
        $typeImmos = DB::table('type_immobilisations')->get();

        $villes = DB::table('villes')->where('id_region', $region)->get();
        $sites = DB::table('sites')->where('id_ville', $ville)->get();
        return view ('inventaire')->with(['detenteurs' => $detenteurs, 'regions' =>$regions, 'typeImmos' => $typeImmos, 
                                          'personnes' => $personnes, 'nns' => $nns, 'region_f' => $region, 'ville_f' => $ville,
                                          'site_f' => $site, 'detenteur_f'=> $detenteur, 'typeImmo_f'=> $typeImmo, 'nns_f' => $nommen,
                                          'nommen_f'=> $nommen, 'ammort_f'=> $ammort, 'villes' => $villes, 'sites' => $sites]); 
        
    }

    function int2str($a)
{
$convert = explode('.',$a);
if (isset($convert[1]) && $convert[1]!=''){
return int2str($convert[0]).'Dinars'.' et '.int2str($convert[1]).'Centimes' ;
}
if ($a<0) return 'moins '.int2str(-$a);
if ($a<17){
switch ($a){
case 0: return 'zero';
case 1: return 'un';
case 2: return 'deux';
case 3: return 'trois';
case 4: return 'quatre';
case 5: return 'cinq';
case 6: return 'six';
case 7: return 'sept';
case 8: return 'huit';
case 9: return 'neuf';
case 10: return 'dix';
case 11: return 'onze';
case 12: return 'douze';
case 13: return 'treize';
case 14: return 'quatorze';
case 15: return 'quinze';
case 16: return 'seize';
}
} else if ($a<20){
return 'dix-'.int2str($a-10);
} else if ($a<100){
if ($a%10==0){
switch ($a){
case 20: return 'vingt';
case 30: return 'trente';
case 40: return 'quarante';
case 50: return 'cinquante';
case 60: return 'soixante';
case 70: return 'soixante-dix';
case 80: return 'quatre-vingt';
case 90: return 'quatre-vingt-dix';
}
} elseif (substr($a, -1)==1){
if( ((int)($a/10)*10)<70 ){
return int2str((int)($a/10)*10).'-et-un';
} elseif ($a==71) {
return 'soixante-et-onze';
} elseif ($a==81) {
return 'quatre-vingt-un';
} elseif ($a==91) {
return 'quatre-vingt-onze';
}
} elseif ($a<70){
return int2str($a-$a%10).'-'.int2str($a%10);
} elseif ($a<80){
return int2str(60).'-'.int2str($a%20);
} else{
return int2str(80).'-'.int2str($a%20);
}
} else if ($a==100){
return 'cent';
} else if ($a<200){
return int2str(100).' '.int2str($a%100);
} else if ($a<1000){
return int2str((int)($a/100)).' '.int2str(100).' '.int2str($a%100);
} else if ($a==1000){
return 'mille';
} else if ($a<2000){
return int2str(1000).' '.int2str($a%1000).' ';
} else if ($a<1000000){
return int2str((int)($a/1000)).' '.int2str(1000).' '.int2str($a%1000);
}
else if ($a==1000000){
return 'millions';
}
else if ($a<2000000){
return int2str(1000000).' '.int2str($a%1000000).' ';
}
else if ($a<1000000000){
return int2str((int)($a/1000000)).' '.int2str(1000000).' '.int2str($a%1000000);
}
}

    function int2alpha($number, $root = true)
{
    $number = (int)$number;
    if($number >= 1000)
    {
        $num_arr = array();
        for($i = strlen("$number"); $i > 0; $i -= 3);
        {
            $j = ($i > 3) ? $i - 3 : 0;
            array_unshift($num_arr, substr("$number", $j, 3));
        }
        $num_arr = array_map(create_function('$a', 'return int2alpha($a, false);'), $num_arr);
        $output = '';
        while(count($num_arr) > 0)
        {
            $output .= ' ' . array_shift($num_arr);
            if(count($num_arr) > 0)
            {
                switch(count($num_arr) % 3)
                {
                    case 1:
                        $output .= ' mille';
                        break;
 
                    case 2:
                        $output .= ' million';
                        break;
 
                    default:
                        $output .= ' milliard';
                }
            }
        }
    }
    elseif($number >= 100)
    {
        $centaines = int2alpha($number / 100);
        $reste = int2alpha($number % 100);
        $output = implode(' ', array(($centaines == 'un') ? 'cent' : "$centaines cent", $reste));
    }
    elseif($number > 80)
    {
        $number -= 80;
        $output = 'quatre-vingt-' . int2alpha($number);
    }
    elseif($number == 80)
    {
        $output = 'quatre-vingt';
    }
    elseif($number > 61)
    {
        $number -= 60;
        $output = 'soixante-' . int2alpha($number);
    }
    elseif($number >= 20)
    {
        $dixaine = $number / 10;
        $unite = $number % 10;
        switch($dixaine)
        {
            case 2:
                $output = 'vingt';
                break;
 
            case 3:
                $output = 'trente';
                break;
 
            case 4:
                $output = 'quarante';
                break;
 
            case 5:
                $output = 'cinquante';
                break;
 
            case 6:
                $output = 'soixante';
                break;
        }
        switch($unite)
        {
            case 0:
                break;
 
            case 1:
                $output .= ' et un';
                break;
             
            default:
                $output .= "-$unite";
        }
    }
    elseif($number > 16)
    {
        $output = 'dix-'.int2alpha($number % 10);
    }
    else
    {
        switch($number)
        {
            case 0:
                if($root)
                    $output = 'zéro';
                else
                    $output = '';
                break;
 
            case 1:
                $output = 'un';
                break;
 
            case 2:
                $output = 'deux';
                break;
 
            case 3:
                $output = 'trois';
                break;
 
            case 4:
                $output = 'quatre';
                break;
 
            case 5:
                $output = 'cinq';
                break;
 
            case 6:
                $output = 'six';
                break;
 
            case 7:
                $output = 'sept';
                break;
 
            case 8:
                $output = 'huit';
                break;
 
            case 9:
                $output = 'neuf';
                break;
 
            case 10:
                $output = 'dix';
                break;
 
            case 11:
                $output = 'onze';
                break;
             
            case 12:
                $output = 'douze';
                break;
 
            case 13:
                $output = 'treize';
                break;
 
            case 14:
                $output = 'quatorze';
                break;
 
            case 15:
                $output = 'quinze';
                break;
 
            case 16:
                $output = 'seize';
                break;
        }
    }
    return $output;
}
}
