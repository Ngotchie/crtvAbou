@extends('base')
@section('main')  
@php
   $r = "0";
@endphp
<div class="container-fluid px-4">
    <h1 class="mt-4">Inventaires Général de Base</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Détendeurs de matériels</li>
    </ol>
    <div class="d-flex" style="margin-bottom: 5px;">    
    <form action="filtre" method="post">
        <div class="form-row align-items-center" style="margin-bottom: 10px;">
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Region</label>
                <select onchange="region_func()" name="region" class="custom-select mr-sm-2" id="region">
                    <option value="-1">Selectionner...</option>
                    @foreach ($regions as $region)
                    <option {{$region->id == intval($region_f) ? 'selected':''}} value="{{$region->id}}">{{ $region->intitule }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto my-1" id="listeville">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Ville</label>
                <select onchange="ville_func()" name="ville" class="custom-select mr-sm-2" id="ville">
                    <option value="-1">Selectionner...</option>
                    @foreach ($villes as $ville)
                    <option {{$ville->id == intval($ville_f) ? 'selected':''}} value='{{$ville->id}}'>{{ $ville->intitule }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Site</label>
                <select name="site" class="custom-select mr-sm-2" id="site">
                    <option value="-1">Selectionner...</option>
                    @foreach ($sites as $site)
                    <option {{$site->id == intval($site_f) ? 'selected':''}} value='{{$site->id}}'>{{ $site->intitule }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Détenteur</label>
                <select name="detenteur" class="custom-select mr-sm-2" id="detenteur">
                    <option value="-1" selected>Selectionner...</option>
                    @foreach ($personnes as $personne)
                    <option {{$personne->id == intval($detenteur_f) ? 'selected':''}} value='{{$personne->id}}'>{{ $personne->nom }}</option>
                    @endforeach
                </select>
                </select>
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Type immobilisation</label>
                <select name="typeImmo" class="custom-select mr-sm-2" id="typeImmo">
                    <option value="-1" selected>Selectionner...</option>
                    @foreach ($typeImmos as $typeImmo)
                    <option {{$typeImmo->id == intval($typeImmo_f) ? 'selected':''}} value='{{$typeImmo->id}}'>{{ $typeImmo->intitule }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Ammortissement</label>
                <select name="ammort" class="custom-select mr-sm-2" id="ammort">
                    <option value="-1">Selectionner...</option>
                    <option {{$ammort_f == "BON" ? 'selected':''}}  value="Bon">Bon</option>
                    <option {{$ammort_f == "OBSELETE" ? 'selected':''}}  value="OBSELETE">OBSELETE</option>
                    <option {{$ammort_f == "A REFORMER" ? 'selected':''}}  value="A REFORMER">A REFORMER</option>
                </select>
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Nommenclature classe</label>
                <select name="nommen" class="custom-select mr-sm-2" id="nommen">
                    <option value="-1" selected>Selectionner...</option>
                    @foreach ($nns as $nn)
                    <option {{$nn->id == intval($nommen_f) ? 'selected':''}} value='{{$nn->id}}'>{{ $nn->intitule }}</option>
                    @endforeach
                </select>
            </div>
           
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-auto my-1">
            <button style="margin-top: 30px;" type="submit" class="btn btn-success">Filtrer</button>
            </div>
        </div>
    </form>          
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Liste des détendeurs de matériels
        </div>
        <div class="card-body">        
            <div class="d-flex" style="margin-bottom: 5px;">    
                     <!--<a href="{{url('printPdf')}}" class="btn btn-secondary btn-sm" style="margin-left:40%">Export PDF</a> -->
                    <a href="javascript:printPdf()" class="btn btn-secondary btn-sm" style="margin-left:40%">Export PDF</a>
                    
                    <!--<a href="{{url('exportExcel')}}" class="btn btn-primary btn-sm" style="margin-left:5px">Export Excel</a>-->
                    <a href="javascript:exportExcel()" class="btn btn-primary btn-sm" style="margin-left:5px">Export Excel</a>
            </div>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>NNS</th>
                        <th>Asset Number</th>
                        <th>Regions</th>
                        <th>Villes</th>
                        <th>Sites</th>
                        <th>Detenteur</th>
                        <th>Designation des Matières</th>
                        <th>Description</th>
                        <th>Date Affectation</th>
                        <th>Lieu Affectation</th>
                        <th>Type d'Immobilisation</th>
                        <th>Number</th>
                        <th>Qte</th>
                        <th>P.U</th>
                        <th>Valeur</th>
                        <th>Taux d'Ammortisement</th>
                        <th>Durée de Vie</th>
                        <th>Date d'Ammortissement</th>
                        <th>Date Acquisition</th>
                        <th>Observations</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Action</th>
                        <th>NNS</th>
                        <th>Asset Number</th>
                        <th>Regions</th>
                        <th>Villes</th>
                        <th>Sites</th>
                        <th>Detenteur</th>
                        <th>Designation des Matières</th>
                        <th>Description</th>
                        <th>Date Affectation</th>
                        <th>Lieu Affectation</th>
                        <th>Type d'Immobilisation</th>
                        <th>Number</th>
                        <th>Qte</th>
                        <th>P.U</th>
                        <th>Valeur</th>
                        <th>Taux d'Ammortisement</th>
                        <th>Durée de Vie</th>
                        <th>Date d'Ammortissement</th>
                        <th>Date Acquisition</th>
                        <th>Observations</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($detenteurs as $detenteur)
                    <tr>
                        <td><button style="border:none; padding: 3px;" class="btn btn-primary btp" data-target-id="{{ $detenteur->id }}"  data-toggle="modal" data-target="#EditModal" onclick="getElementDetenteur('{{ $detenteur->id }}')"><u style="color:white">éditer</u></button></td>
                        <td>{{ $detenteur->nns }}</td>
                        <td>{{ $detenteur->assets_number }}</td>
                        <td>{{ $detenteur->region }}</td>
                        <td>{{ $detenteur->ville }}</td>
                        <td>{{ $detenteur->site }}</td>
                        <td>{{ $detenteur->nom_agent_collecteur }}</td>
                        <td>{{ $detenteur->title }}</td>
                        <td>{{ $detenteur->nom_article }}</td>
                        <td>{{ $detenteur->date_mise_en_service }}</td>
                        <td>{{ $detenteur->departement }}</td>
                        <td>{{ $detenteur->type_dimmobilisation }}</td>
                        <td>{{ $detenteur->number }}</td>
                        <td>{{ $detenteur->valeur_a_dire_experts }}</td>
                        <td>{{ $detenteur->quantite }}</td>
                        <td>{{ $detenteur->valeur_origine }}</td>
                        <td>{{ $detenteur->taux_amortissement }}</td>
                        <td>{{ $detenteur->duree_de_vie }}</td>
                        <td>{{ $detenteur->date_amortissement }}</td>
                        <td>{{ $detenteur->date_acquisition }}</td>
                        <td>{{ $detenteur->observation }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="EditModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog data-dialog-centerd" role="document">
      <!-- Modal content-->
      <form class="form-horizontal" action="javascript:formUpdate(this);" id="formUpdate"
                    method="POST"
                    enctype="multipart/form-data">
        <input type="hidden" id ="token2" name="_token" value="{{ csrf_token() }}">
        {{ method_field('PUT') }}
      <div class="modal-content">
        <div class="modal-header" style="height:50px;">
          <label>Editer l'élément de détention</label>   
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="form-group">
                            <input class="form-control" name="id" type="hidden"
                                    id="det_id">
                        </div>
                        <div class="form-group">
                            <label>NNS</label>
                            <input class="form-control" name="nns" type="text"
                                    id="det_nns">
                        </div>
                        <div class="form-group">
                            <label>Assets number</label>
                            <input class="form-control" name="assets_number" type="text"
                                    id="det_assets_number">
                        </div>
                        <div class="form-group">
                            <label>Région</label>
                            <input class="form-control" name="region" type="text"
                                    id="det_region">
                        </div>
                        <div class="form-group">
                            <label>Ville</label>
                            <input class="form-control" name="ville" type="text"
                                    id="det_ville">
                        </div>
                        <div class="form-group">
                            <label>Site</label>
                            <input class="form-control" name="site" type="text"
                                    id="det_site">
                        </div>
                        <div class="form-group">
                            <label>Détenteur</label>
                            <input class="form-control" name="nom_agent_collecteur" type="text"
                                    id="det_detenteur">
                        </div>
                        <div class="form-group">
                            <label>Désignation des matières</label>
                            <input class="form-control" name="title" type="text"
                                    id="det_designation">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" name="nom_article" type="text"
                                    id="det_description">
                        </div>
                        <div class="form-group">
                            <label>Type Immobilisation</label>
                            <input class="form-control" name="type_dimmobilisation" type="text"
                                    id="det_type_dimmobilisation">
                        </div>
                        <div class="form-group">
                            <label>Date d'affectation</label>
                            <input class="form-control" name="date_mise_en_service" type="text"
                                    id="det_date_mise_en_service">
                        </div>
                        <div class="form-group">
                            <label>Lieu d'affectation</label>
                            <input class="form-control" name="departement" type="text"
                                    id="det_departement">
                        </div>
                        <div class="form-group">
                            <label>Prix unitaire</label>
                            <input class="form-control" name="valeur_a_dire_experts" type="number"
                                    id="det_valeur_a_dire_experts">
                        </div>
                        <div class="form-group">
                            <label>Quantité</label>
                            <input class="form-control" name="quantite" type="number"
                                    id="det_quantite">
                        </div>
                        <div class="form-group">
                            <label>Valeur d'origine</label>
                            <input class="form-control" name="valeur_origine" type="number"
                                    id="det_valeur_origine">
                        </div>
                        <div class="form-group">
                            <label>Taux d'ammortissement</label>
                            <input class="form-control" name="taux_amortissement" type="number"
                                    id="det_taux_amortissement">
                        </div>
                        <div class="form-group">
                            <label>Durée de vie</label>
                            <input class="form-control" name="duree_de_vie" type="text"
                                    id="det_duree_de_vie">
                        </div>
                        <div class="form-group">
                            <label>Date d'ammortissement</label>
                            <input class="form-control" name="date_amortissement" type="text"
                                    id="det_date_amortissement">
                        </div>
                        <div class="form-group">
                            <label>Date d'acquisition</label>
                            <input class="form-control" name="date_acquisition" type="text"
                                    id="det_date_acquisition">
                        </div>
                        <div class="form-group">
                            <label>Observation</label>
                            <textarea class="form-control" name="observation" type="text" 
                                    id="det_observation" cols="40" rows="5"></textarea>
                        </div>
                    </div>
                </div>    
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Valider" name="valider" style="background-color:rgb(0,30,66); ">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        </div>
      </div>
      </form>  
    </div>
</div>
@endsection
<script>
    async function getElementDetenteur(id) {
        $('#det_id').val(id);
        await fetch('/inventaire/'+id, {
            method: "GET", 

        }).then(response => response.json())
            .then(data => {
                $('#det_id').val(id);
                $('#det_nns').val(data[0].nns);
                $('#det_assets_number').val(data[0].assets_number);
                $('#det_region').val(data[0].region);
                $('#det_ville').val(data[0].ville);
                $('#det_site').val(data[0].site);
                $('#det_detenteur').val(data[0].nom_agent_collecteur);
                $('#det_designation').val(data[0].title);
                $('#det_description').val(data[0].nom_article);
                $('#det_type_dimmobilisation').val(data[0].type_dimmobilisation);
                $('#det_date_mise_en_service').val(data[0].date_mise_en_service);
                $('#det_departement').val(data[0].departement);
                $('#det_valeur_a_dire_experts').val(data[0].valeur_a_dire_experts);
                $('#det_quantite').val(data[0].quantite);
                $('#det_valeur_origine').val(data[0].valeur_origine);
                $('#det_taux_amortissement').val(data[0].taux_amortissement);
                $('#det_duree_de_vie').val(data[0].duree_de_vie);
                $('#det_date_amortissement').val(data[0].date_amortissement);
                $('#det_date_acquisition').val(data[0].date_acquisition);
                $('#det_observation').val(data[0].observation);
            })
        .catch(error => console.error(error))
    }

    async function formUpdate() {
        var myform =    document.getElementById("formUpdate");
        
        var formData = new FormData(myform);
        await fetch("inventaire/"+ $('#det_id').val(), {
            method: "POST",
            body: formData,
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).then(response => response.json())
         .then(data => {
            location.reload()
        })
        .catch((error) => {
        // Handle error
        console.log("error ", error);
        });
    }

    async function printPdf() {
        var currentDate = new Date().toJSON().slice(0, 10);

        var $r = $("#region").val();
        var $v = $("#ville").val();
        var $s = $("#site").val();
        var $d = $("#detenteur").val();
        var $t = $("#typeImmo").val();
        var $n = $("#nommen").val();
        var $a = $("#ammort").val();

        var $r_l = $r != "-1" ? $( "#region option:selected" ).text() : "DIRECTION GENERLE DE LA CRTV - DEPARTMENT DE LA COMPTABILITE MATIERE";
        var $v_l = $v != "-1" ? '_'+ $( "#ville option:selected" ).text() : "";
        var $s_l = $s != "-1" ? '_'+ $( "#site option:selected" ).text() : "";
        var $d_l = $d != "-1" ? '_'+ $( "#detenteur option:selected" ).text() : "";
        
        var $l = $r_l + $v_l + $s_l + "_FD"+$d_l;
        
        await fetch('/public/printPdf', {
            method: "POST", 
            cache: "no-cache",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
		    },
            body: JSON.stringify({
                region: $r,
                ville: $v,
                site: $s,
                detenteur: $d,
                typeImmo: $t,
                nommen: $n,
                ammort: $a,
            })
        }).then(response => response.blob())
            .then(blob => {
                var url = window.URL.createObjectURL(blob);
                var a = document.createElement('a');
                a.href = url;
                a.download = $l +".pdf";
                document.body.appendChild(a); // we need to append the element to the dom -> otherwise it will not work in firefox
                a.click();    
                a.remove();  //afterwards we remove the element again         
            }).catch(error => console.error(error)); 
    }
    
      async function exportExcel() {
        var currentDate = new Date().toJSON().slice(0, 10);

        var $r = $("#region").val();
        var $v = $("#ville").val();
        var $s = $("#site").val();
        var $d = $("#detenteur").val();
        var $t = $("#typeImmo").val();
        var $n = $("#nommen").val();
        var $a = $("#ammort").val();
       
        var $r_l = $r != "-1" ? $( "#region option:selected" ).text() : "DIRECTION GENERLE DE LA CRTV - DEPARTMENT DE LA COMPTABILITE MATIERE";
        var $v_l = $v != "-1" ? '_'+ $( "#ville option:selected" ).text() : "";
        var $s_l = $s != "-1" ? '_'+ $( "#site option:selected" ).text() : "";
        var $d_l = $d != "-1" ? '_'+ $( "#detenteur option:selected" ).text() : "";
        
        var $l = $r_l + $v_l + $s_l + "_FD"+$d_l;
        
        await fetch('/public/exportExcel', {
            method: "POST", 
            cache: "no-cache",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
		    },
            body: JSON.stringify({
                region: $r,
                ville: $v,
                site: $s,
                detenteur: $d,
                typeImmo: $t,
                nommen: $n,
                ammort: $a,
            })
        }).then(response => response.blob())
            .then(blob => {
                var url = window.URL.createObjectURL(blob);
                var a = document.createElement('a');
                console.log("----"+a);
                a.href = url;
                // a.download = $n+ currentDate +".xls";
                a.download = $l +".xls";
                document.body.appendChild(a); // we need to append the element to the dom -> otherwise it will not work in firefox
                a.click();    
                a.remove();  //afterwards we remove the element again         
            }).catch(error => console.error(error)); 
    }
    async function region_func() {
        var $v = $("#region").val();
        if($v !== "-1") {
            await fetch('/public/villes/'+$v, {
                method: "GET", 

            }).then(response => response.json())
                .then(data => {
                $("#ville").empty();
                $("#site").empty();
                $("#site").append('<option value="-1">Selectionner...</option>');
                $("#ville").append('<option value="-1">Selectionner...</option>');
                $.each(data, function (index, value) {
                    $("#ville").append('<option value="' + value.id + '">' + data[index].intitule + ' </option>');
                });
                })
            .catch(error => console.error(error))
            
        }else{
           // document.getElementById('listeville').style.display ='none';
           $("#ville").empty();
           $("#site").empty();
           $("#site").append('<option value="-1">Selectionner...</option>');
           $("#ville").append('<option value="-1">Selectionner...</option>');
        }
    }

    async function ville_func() {
        var $v = $("#ville").val();
        if($v !== "-1") {
            await fetch('/public/sites/'+$v, {
                method: "GET", 

            }).then(response => response.json())
                .then(data => {
                $("#site").empty();
                $("#site").append('<option value="-1">Selectionner...</option>');
                $.each(data, function (index, value) {
                    $("#site").append('<option value="' + value.id + '">' + data[index].intitule + ' </option>');

                });
                console.log(data);
                })
            .catch(error => console.error(error))
            
        }else{
            // document.getElementById('listesite').style.display ='none';
            $("#site").empty();
            $("#site").append('<option value="-1">Selectionner...</option>');
        }
    }
    
</script>
