<?php

namespace App\Http\Controllers;

include('CompteGestionController.php');
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

            $row_range    = range( 14001, /*$row_limit*/15344 );
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
        ini_set('memory_limit', '61440');
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
        ini_set('memory_limit', '61440M');
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
        /*foreach ($liste as $cle_1 => $valeur_1) {
            $nbr = 0;
            foreach ($valeur_1 as $cle_2 => $valeur_2) {
                if($cle_2=='valeur_a_dire_experts') {
                    $nb = $nb + (int)$valeur_2;
                    $nbr = 0;
                    break;
                }
                $nbr++;
            }
        }*/
        $t = 0;
        //$dat = DB::table('element_detenteurs')->where('nns', '=', $elt->id)->where('date_mise_en_service', '=', $annee)->get();
        foreach($liste as $d) {
            if($d->valeur_origine != null){
                $t = $t + (int)$d->valeur_origine * (int)$d->quantite;
            }
        } 
        //echo $liste;
        $file_name = date("Y.m.d")."_ListeDetenteur.pdf";
        
        $montant = (string)$t;  
        //asLetters(200000);
        $data = [
            'title' => 'FICHE DE DETENTEUR',
            'date' => date('m/d/Y'),
            'liste' => $liste,
            'lib_region' => $lib_region,
            'lib_ville' => $lib_ville,
            'lib_site' => $lib_site,
            'det' => $det,
            'montant' => $this->numberToWord($montant),
            't' => $t,
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
    public function numberToWord($num = '')
    {
        $num    = ( string ) ( ( int ) $num );
        
        if( ( int ) ( $num ) && ctype_digit( $num ) )
        {
            $words  = array( );
             
            $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );
             
            $list1  = array('','un','deux','trois','quatre','cinq','six','sept',
                'huit','neuf','dix','onze','douze','treize','quatorze',
                'quinze','seize','dix-sept','dix-huit','dix-neuf');
             
            $list2  = array('','dix','vingt','trente','quarente','cinquante','soixante',
                'soixante-dix','quatre-vingt','quatre-vingt-dix','cent');
             
            $list3  = array('','mille(s)','million(s)','milliard(s)','trillion',
                'quadrillion','quintillion','sextillion','septillion',
                'octillion','nonillion','decillion','undecillion',
                'duodecillion','tredecillion','quattuordecillion',
                'quindecillion','sexdecillion','septendecillion',
                'octodecillion','novemdecillion','vigintillion');
             
            $num_length = strlen( $num );
            $levels = ( int ) ( ( $num_length + 2 ) / 3 );
            $max_length = $levels * 3;
            $num    = substr( '00'.$num , -$max_length );
            $num_levels = str_split( $num , 3 );
             
            foreach( $num_levels as $num_part )
            {
                $levels--;
                $hundreds   = ( int ) ( $num_part / 100 );
                $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Cent' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
                $tens       = ( int ) ( $num_part % 100 );
                $singles    = '';
                 
                if( $tens < 20 ) { $tens = ( $tens ? ' ' . $list1[$tens] . ' ' : '' ); } else { $tens = ( int ) ( $tens / 10 ); $tens = ' ' . $list2[$tens] . ' '; $singles = ( int ) ( $num_part % 10 ); $singles = ' ' . $list1[$singles] . ' '; } $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' ); } $commas = count( $words ); if( $commas > 1 )
            {
                $commas = $commas - 1;
            }
             
            $words  = implode( ', ' , $words );
             
            $words  = trim( str_replace( ' ,' , ',' , ucwords( $words ) )  , ', ' );
            if( $commas )
            {
                $words  = str_replace( ',' , ' ' , $words );
            }
             
            return $words;
        }
        else if( ! ( ( int ) $num ) )
        {
            return 'Zero';
        }
        return '';
    }
  
}
