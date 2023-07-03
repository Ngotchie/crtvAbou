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
            header .headerSection{
                display:flex;
                justify-content:space-between;
            }
            footer{
                display:flex;
                justify-content:space-between;
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
        <div class="headerSection">
           <div>
           <div style="line-height:0px; font-size: 0.675em;">
             <center><h4>REPUBLIQUE DU CAMEROUN</h4><center>
             <center><h5>Paix-Travail-Patrie</h5></center>
             <center><h6>-------</h6></center>
             <center><h4>MINISTERE DES FINANCES</h4><center>
             <center><h6>-------</h6></center>
             <center><h4>SECRETARIAT GENERAL</h4><center>
             <center><h6>-------</h6></center>
             <center><h4>DIRECTION DE LA NORMALISATION</h4><center>
             <center><h4>ET DE LA COMPTABILITE-MATIERES</h4><center>
             <center><h6>-------</h6></center>
           </div>
           </div>
           <img src="assets/img/cameroun.png" width="150" height="150" alt="logo">
           <div style="line-height:0px; font-size: 0.675em;">
             <center><h4>REPUBLIC OF CAMEROON</h4><center>
             <center><h5>Peace-Work-Fatherland</h5></center>
             <center><h6>-------</h6></center>
             <center><h4>MINISTRY OF FINANCE</h4><center>
             <center><h6>-------</h6></center>
             <center><h4>GENERAL SECRETARIAT</h4><center>
             <center><h6>-------</h6></center>
             <center><h4>DEPARTMENT OF SRANDARDISATION</h4><center>
             <center><h4>AND STORIES ACCOUNTING</h4><center>
             <center><h6>-------</h6></center>
           </div>
        </div>

        <hr />
        
        <h2 style="margin-left: 40%;"><u>FICHE DE DETENTEUR</u></h2>
        <ol style="margin-left: 38%;">
            <li>CHAPITRE DUDGETAIRE: 20</li>
            <li>POSTE DE COMPTABILITE-MATIERE: MINFI</li>
            <li>LIBELE DU POSTE: DNCM</li>
            <li>SITE:</li>
        </ol>
        </header>

        <main>
         <table>
            <thead>
                <tr>
                    <th>Number</th>
                    <th>NNS</th>
                    <th>Asset Number</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Date Acquisition</th>
                    <th>QTE</th>
                    <th>P U</th>
                    <th>Valeur</th>
                    <th>Date Affectation</th>
                    <th>Lieu Affectation</th>
                    <th>Visa Detenteur</th>
                    <th>Observations</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($liste as $detenteur)
                    <tr>
                        <td>{{ $detenteur->number }}</td>
                        <td>{{ $detenteur->nns }}</td>
                        <td>{{ $detenteur->assets_number }}</td>
                        <td>{{ $detenteur->title }}</td>
                        <td>{{ $detenteur->observation }}</td>
                        <td>{{ $detenteur->date_acquisition }}</td>
                        <td>{{ $detenteur->quantite }}</td>
                        <td>{{ $detenteur->valeur_origine }}</td>
                        <td>{{ $detenteur->valeur }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
            </tbody>
         </table>
        </main> 
          <!-- The footer contains the company's website and address. To align the address details we will use flexbox in the CSS style. -->
        <footer>
            <h4>L'ORDONATEUR MATIERES</h4>
            <h4>LE COMPTABLE MATIERES</h4>
            <h4>LE DETENTEUR EFFECTIF</h4>
        </footer>
    </body>
</html>