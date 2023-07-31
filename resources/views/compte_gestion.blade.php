<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Compte de gestion</title>
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
            .header2 {
                margin-bottom: -10px;
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
           <img style="margin-left: 35%; margin-top: -75px" src="assets/img/crtv.jpeg" width="300" height="200" alt="logo">
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
        <center><h3 class="header2">MATERIEL, IMMEUBLES BATIS ET NON BATIS</h3></center>
        <center><h6 class="header2">******************</h6></center>
        <center><h1><u>COMPTE DE GESTION</u></h1></center>
        
        <center><h4 class="header2">Présentant</h4></center>
        <center><h4 class="header2">PIECES JUSTIFICATIVES ET LA RECAPITULATION D'INVENTAIRE</h4></center>
        <center><h4 class="header2">AU COURS DE L'ANNEE (EXERCICE {{ $annee }})</h4></center>
        <center><h4 class="header2">LE TOUT PRESENT SOUS FORME DE TABLEAUX SYNOPTIQUES</h4></center>
        <center><h6 class="header2">******************</h6></center>
        <h4 class="header2"><u>GESTION de</u> : Ordonnateur-Matières(DIRECTEUR GENERAL DE LA CRTV)</h4>
        <center class="header2"><h4>Du 1er janvier au 30 juin {{ $annee }} et du 1er juillet au 31 décembre {{ $annee }}</h4></center>
        <h4 class="header2"><u>COMPTE</u> : Préparé et présenté par __________________________________ Comptable-Matières, Téléphone : 6_______________</h4>
        <br><br>
        </header>
        <main>
            <table style="text-align:center;">
                <thead>
                    <tr>
                        <th>NNS</th>
                        <th>DESIGNATION DES <br>MATIERES ET OBJETS</th>
                        <th>VALEUR DES <br>EXISTANTS au 01 Janvier <br> {{ $annee }}</t>
                        <th>
                            <table style="border: none; width: 100%; text-align:center; border-style: hidden;">
                                <tr>
                                    <td colspan="3" style="padding-bottom: 15px;">VALEUR DES ENTREES AU COURS<br> DE L'EXERCICE {{ $annee }}</td>
                                    <td>TOTAL</td>
                                    <td colspan="3" style="padding-bottom: 15px;">VALEUR DES SORTIES AU COURS<br> DE L'EXERCICE {{ $annee }}</td>
                                </tr>
                                <tr>
                                    <td style="height:15%;">1er<br>SEMESTRE</td>
                                    <td>2e<br>SEMESTRE</td>
                                    <td style="padding-bottom: 22px;">TOTAL DES<br>ENTREES</td>
                                    <td>EXISTANTS+<br>ENTREES</td>
                                    <td>1er<br>SEMESTRE</td>
                                    <td>2e<br>SEMESTRE</td>
                                    <td style="padding-bottom: 20px;">TOTAL DES<br>SORTIES</td>
                                </tr>
                            </table>
                        </th>
                        <th>VALEUR <br> TOTAL DES <br> EXISTANTS <br> DU <br> 01/01/{{ $annee }} <br> AU <br> 01/01/{{ $annee }}</th>           
                    </tr>
                </thead>
                <tbody>
                        @php $total = 0; @endphp
                        @foreach ($nns as $elt)
                        <tr>
                            <td>{{ $elt->id }}</td>
                            <td>{{ $elt->intitule }}</td>
                            <td>0</td>
                            <td>
                                <table style="border: none; width: 100%; text-align:center;  border-style: hidden;">
                                    <tr>
                                        <td style="width: 91px;  height:14%;">0</td>
                                        <td style="width: 91px;">0</td> 
                                        <td style="width: 79px;">0</td> 
                                        <td style="width: 104px;">0</td> 
                                        <td style="width: 91px;">.....</td> 
                                        <td style="width: 91px;">{{ number_format($elt->total, 0, ',', ' ') }}</td> 
                                        <td>{{ number_format($elt->total, 0, ',', ' ') }}</td> 
                                    </tr>
                                </table>
                            </td>
                            <td>{{ number_format($elt->total, 0, ',', ' ') }}</td>
                        </tr>
                        @php $total = $total + $elt->total; @endphp

                        @endforeach
                        <tr>
                            <td colspan="2">221- SERVICE FAITS</td>
                            <td>0</td>
                            <td>
                                <table style="border: none; width: 100%; text-align:center; border-style: hidden;">
                                    <tr>
                                        <td style="width: 93px;">0</td>
                                        <td style="width: 93px;">0</td> 
                                        <td style="width: 81px;">0</td> 
                                        <td style="width: 106px;">0</td> 
                                        <td style="width: 93px;">0</td> 
                                        <td style="width: 93px;">0</td> 
                                        <td>0</td> 
                                    </tr>
                                </table>
                            </td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td colspan="2"> TOTAL FOURNITURES FAITES</td>
                            <td>0</td>
                            <td>
                                <table style="border: none; width: 100%; text-align:center; border-style: hidden;">
                                    <tr>
                                        <td style=" padding-top: 30px; padding-bottom: 30px; width: 93px;">0</td>
                                        <td style="width: 93px;">0</td> 
                                        <td style="width: 81px;">0</td> 
                                        <td style="width: 106px;">0</td> 
                                        <td style="width: 93px;">0</td> 
                                        <td style="width: 93px;">0</td> 
                                        <td>0</td> 
                                    </tr>
                                </table>
                            </td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td colspan="2"> TOTAL GENERAL</td>
                            <td>0</td>
                            <td>
                                <table style="border: none; width: 100%; text-align:center; border-style: hidden;">
                                    <tr>
                                        <td style="width: 93px;">0</td>
                                        <td style="width: 93px;">0</td> 
                                        <td style="width: 81px;">0</td> 
                                        <td style="width: 106px;">0</td> 
                                        <td style="width: 93px;">0</td> 
                                        <td style="width: 93px;">{{ number_format($total, 0, ',', ' ') }}</td> 
                                        <td>{{ number_format($total, 0, ',', ' ') }}</td> 
                                    </tr>
                                </table>
                            </td>
                            <td>{{ number_format($total, 0, ',', ' ') }}</td>
                        </tr>
                </tbody>
            </table>
        </main> 

        <footer style="margin-top: 40px;">
            <center><h3 class="header2"><u>FOURNITURE FAITES</u></h3></center>
            <center><h4 class="header2">Arreté, le présent Compte de Gestion à :</h4></center>
            <center><h3 class="header2">0 FCFA</h4></center>
            <center><h4 class="header2">En ce qui concerne la valeur des Entrées au cours de l'années</h4></center>
            <center><h6 class="header2">*******************</h6></center>

            <center><h4 class="header2">En ce qui concerne la valeur des Sorties au cours de l'années</h4></center>
            <center><h3 class="header2"> {{ $tt }} FCFA</h4></center>
            <center><h6 class="header2">*******************</h6></center>

            <center><h4 class="header2">Les existants, à la fin de l'année représentent un volume global en valeur absolue de :</h4></center>
            <center><h3 class="header2">{{ $tt }} FCFA</h2></center>

            <center><h3 class="header2"><u>SERVICES-FAITS</u></h3></center>
            <center><h4 class="header2">Les services-faits en cours d'exercice représentent un volume en valeur globale de :</h4></center>
            <center><h3 class="header2">0 FCFA</h2></center><br><br>

            <h4 style="margin-left:5%">A..........................................................  le..........................................</h4>
            <h4 style="margin-left:5%">Vu: le(s) Contrôleur(s)........................................................................................</h2><br><br>


            <h4 style="margin-top: 20px;">Le Comptable-Matières</h4>
            <h4 style="float:right; margin-top: -50px; margin-right:5%">Vu et Vérifié: l'Ordonnateur-Matières abc</h4>
        </footer>
    </body>
</html>