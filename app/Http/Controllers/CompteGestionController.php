<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PDF;

class CompteGestionController extends Controller
{   
    /**
    * @param $customer_data
    */
    function compte_gestion($annee) {
        $nns = DB::table('nns')->get();
        $tt = 0;
        foreach($nns as $elt)
        {
            $t = 0;
            $data = DB::table('element_detenteurs')->where('nns', '=', $elt->id)->where('date_mise_en_service', '=', $annee)->get();
            foreach($data as $d) {
                if($d->valeur_selon_fiche != null){
                    $t = $t + (int)$d->valeur_selon_fiche * (int)$d->quantite;
                }
            } 
            $elt->total = $t;
            $tt += $t; 
        }
        $data = [
            'annee' => $annee,
            'nns' => $nns,
            'tt' => $this->numberToWord($tt),
        ];
        PDF::setOptions([
            "defaultFont" => "Courier",
            "defaultPaperSize" => "a3",
            "dpi" => 130
        ]);

        $pdf = PDF::loadView('compte_gestion', $data)->setPaper('a4', 'landscape');;
        return $pdf->download("compte_gestion_".$annee);

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
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
