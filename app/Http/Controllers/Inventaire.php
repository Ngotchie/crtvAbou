<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

use PDF;


class Inventaire extends Controller
{
    public function index()
    {
        $detenteurs = DB::table('element_detenteurs')->get();
        $regions = DB::table('regions')->get();
        $typeImmos = DB::table('type_immobilisations')->get();
        return view ('inventaire')->with(['detenteurs' => $detenteurs, 'regions' =>$regions, 'typeImmos' => $typeImmos]); 
    
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
        $row_range    = range( 3, /*$row_limit*/40 );

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
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename='.$file_name);
            header('Cache-Control: max-age=0');
            ob_end_clean();
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
    function exportData(){
        $data = DB::table('element_detenteurs')->orderBy('number', 'ASC')->get();
        $data_array [] = array("Number", "NNS","Asset Number","Title","Description","Date Acquisition");
        foreach($data as $data_item)
        {
            $data_array[] = array(
                'Number' =>$data_item->number,
                'NNS' => $data_item->nns,
                'Asset Number' => $data_item->assets_number,
                'Title' => $data_item->title,
                'Description' => "",
                'Date Acquisition' =>$data_item->date_acquisition
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
        $liste = DB::table('element_detenteurs')->orderBy('number', 'ASC')->get();
        $file_name = date("Y.m.d")."_ListeDetenteur.pdf";

        $data = [
            'title' => 'FICHE DE DETENTEUR',
            'date' => date('m/d/Y'),
            'liste' => $liste
        ];


        PDF::setOptions([
            "defaultFont" => "Courier",
            "defaultPaperSize" => "a3",
            "dpi" => 130
        ]);

        $pdf = PDF::loadView('pdf', $data)->setPaper('a4', 'landscape');;
    
        return $pdf->download($file_name);
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
         if($region != ""){
            $query->where('region', '=', $region);
         }
         if($ville != ""){
            $query->where('ville', '=', $ville);
         }
         if($site != ""){
            $query->where('site', '=', $site);
         }
         if($detenteur != ""){
            $query->where('nom_agent_collecteur', '=', $detenteur);
         }
         if($typeImmo != ""){
            $query->where('type_dimmobilisation', '=', $typeImmo);
         }
         if($nommen != ""){
            $query->where('nns', '=', $nommen);
         }
         if($ammort != ""){
            $query->where('valeur_amortissement', '=', $ammort);
         }
  
        $detenteurs = $query->orderBy('number', 'ASC')->get();

        $regions = DB::table('regions')->get();
        $typeImmos = DB::table('type_immobilisations')->get();
        return view ('inventaire')->with(['detenteurs' => $detenteurs, 'regions' =>$regions, 'typeImmos' => $typeImmos]); 
        
    }
}
