<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Detenteur materiels</title>
        <style>
            hr{
                margin:1cm 0;
                height:3;
                border:2;
            }
            footer{
                margin-top: 10px;
                margin-bottom: 20px;
            }
            table {
                width: 100%;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            ul {
              list-style-type: none;
            }
        </style>
    </head>
    <body>
    <header>
        <div class="headerSection" style="margin-top: 0px;">
           <div style="line-height:5px; font-size: 0.675em; ">
             <h4>REPUBLIQUE DU CAMEROUN</h4>
             <h5 style="margin-left: 40px; margin-top: -5px">Paix-Travail-Patrie</h5>
             <h6 style="margin-left: 60px; margin-top: -10px">-------</h6>
             <h4>DIRECTION GENERAL DE LA CRTV</h4>
             <h6 style="margin-left: 60px; margin-top: -5px">-------</h6>
             <h4>DEPARTMENT DE LA COMPTABILITE MATIERE</h4>
             <h6 style="margin-left: 60px; margin-top: -5px">-------</h6>
           </div>
           <img style="margin-left: 35%; ; margin-top: -75px" src="assets/img/crtv.jpeg" width="300" height="200" alt="logo">
           <div style="line-height:5px; font-size: 0.675em; float:right; margin-top: -125px">
             <h4>REPUBLIC OF CAMEROON</h4>
             <h5 style="margin-left: 40px; margin-top: -5px">Peace-Work-Fatherland</h5>
             <h6 style="margin-left: 60px; margin-top: -10px">-------</h6>
             <h4>DIRECTORATE GENERAL OF THE CRTV</h4>
             <h6 style="margin-left: 60px; margin-top: -5px">-------</h6>
             <h4>DEPARTMENT OF STORE ACCOUNTING</h4>
             <h4> </h4>
             <h6 style="margin-left: 60px; margin-top: -5px">-------</h6>
           </div>
        </div>

        <div style="margin-top: -150px;"><hr /></div>
        
        <h2 style="margin-left: 37%;"><u>INVENTAIRE</u></h2>
        <h3 style="margin-left: 27%;"><u>DES MATIERES, DENREES OU OBJETS </u></h3>
        <ol style="margin-left: 30%;">
            <li>DEPARTMENT DE LA COMPTABILITE MATIERE: 2023</li>
            <li>REGION: {{$lib_region}}</li>
            <li>VILLE: {{$lib_ville}}</li>
            <li>SITE: {{$lib_site}}</li>
            <li>DETENTEUR: {{$det}}</li>
        </ol>
        </header>

        <main>
         <table>
            <thead>
                <tr>
                    <th>Asset Number</th>
                    <th>NNS</th>
                    <th>DESIGNATION DES MATIERES ET OBJETS</th>
                                <!--th>DESCRIPTION, CARACTERISTIQUES DES MATIERES ET OBJETS</t-->
                    <th>TYPE <br>D'IMMOBI<br>LISATTION</th>
                                <!--th>DATE D'ACQUI<br>SITION</th-->
                    <th>QTE</th>
                    <th>P.U  <br></th>
                    <th>VALEUR PARTIELLES</th>
                    <th>VALEUR NET<br>(VU L'AMMORTISSEMENT)</th>
                    <th>VALEUR NET<br>(VU LE NNS)</th>
                                <!--th>DATE D'AFFEC<br>TATION</th>
                                <th>LIEU D'AFFEC<br>TATION</th-->
                                <!--th>VISA<br>DETEN<br>TEUR</th-->
                    <th>DATE <br>DU DERNIER <br>RECENSEMENT</th>
                    
                </tr>
            </thead>
            <tbody>
                    @foreach ($liste as $detenteur)
                    <tr>
                        <td>{{ $detenteur->assets_number }}</td>
                        <td>{{ $detenteur->nns }}</td>
                        <td>{{ $detenteur->title }}</td>
                                        <!--td>{{ $detenteur->nom_article }}</td-->
                        <td>{{ $detenteur->type_dimmobilisation }}</td>
                                        <!--td>{{ $detenteur->date_acquisition }}</td-->
                        <td>{{ $detenteur->quantite }}</td>
                        <td>{{ number_format($detenteur->valeur_origine, 0, ',', ' ') }}</td>
                        <td>{{ number_format($detenteur->valeur, 0, ',', ' ') }}</td>
                        <td>{{ number_format($detenteur-> valeur_a_dire_experts, 0, ',', ' ')}}</td>
                        <td>{{ number_format($detenteur-> valeur, 0, ',', ' ')}}</td>
                        <td>{{ $detenteur->date_mise_en_service }}</td>
                                        <!--td>{{ $detenteur->departement }}</td-->
                                        <!--td>{{ $detenteur->visa_detenteur }}</td--> 
                                        <!--td>{{ $detenteur->statut_de_larticle }}</td--> 
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="7"> </td>
                        <td colspan="3"> <strong>TOTAL  {{ number_format($t, 0, ',', ' ') }} FCFA</strong></td>
                    </tr>
            </tbody>
         </table>
        </main> 
          <!-- The footer contains the company's website and address. To align the address details we will use flexbox in the CSS style. -->
        <footer style="margin-top: 50px;">
            <div>
                <h3 style="margin-top: 20px">Arrêté le présent inventaire à la somme de {{$montant}} FCFA</h3>
                <br>
            </div>
            <div>
                <h5 style="float:right; margin-top: 20px">A Yaoundé, le {{$date}}</h5>
                <br>
            </div>
            <div>
                <h5 style="float:right; margin-top: -1px">Vu : <br>l'Approvisionnement du magasin ou materiel en service </h5>
            </div>
            <!--div>
                <h4 style="float:right; margin-top: 40px">Vu: </h5>
                <br>
            </div-->
            <div>
            <h4 style="margin-top: 250px">LE COMPTABLE GESTIONNAIRE <br>OU DEPOSITAIRE COMPTABLE</h4>
            <h4 style="margin-left: 40%; margin-top: -150px">CHARGE DE LA SURVEILLANCE <br>ADMINISTRATIVE</h4>
            <h4 style="float:right; margin-top: -150px">LE DIRECTEUR GENERAL</h4>
            </div>
        </footer>
    </body>
</html>