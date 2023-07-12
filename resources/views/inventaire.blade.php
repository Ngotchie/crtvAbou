@extends('base')
@section('main')  
@php
   $r = "0";
@endphp
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid px-4">
    <h1 class="mt-4">Inventaires</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Détendeurs de matériels</li>
    </ol>
    <div class="d-flex" style="margin-bottom: 5px;">    
    <form action="filtre" method="post">
        <div class="form-row align-items-center" style="margin-bottom: 10px;">
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Region</label>
                <select onchange="region_func()" name="region" class="custom-select mr-sm-2" id="region">
                    <option value="-1" selected>Selectionner...</option>
                    @foreach ($regions as $region)
                    <option value='{{$region->id}}'>{{ $region->intitule }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto my-1" id="listeville">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Ville</label>
                <select onchange="ville_func()" name="ville" class="custom-select mr-sm-2" id="ville">
                    <option value="-1" selected>Selectionner...</option>
                </select>
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Site</label>
                <select name="site" class="custom-select mr-sm-2" id="site">
                    <option value="-1" selected>Selectionner...</option>
                </select>
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Détenteur</label>
                <select name="detenteur" class="custom-select mr-sm-2" id="détenteur">
                    <option value="-1" selected>Selectionner...</option>
                    @foreach ($personnes as $personne)
                    <option value='{{$personne->id}}'>{{ $personne->nom }}</option>
                    @endforeach
                </select>
                </select>
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Type immobilisation</label>
                <select name="typeImmo" class="custom-select mr-sm-2" id="typeImmo">
                    <option value="-1" selected>Selectionner...</option>
                    @foreach ($typeImmos as $typeImmo)
                    <option value='{{$typeImmo->id}}'>{{ $typeImmo->intitule }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Ammortissement</label>
                <select name="ammort" class="custom-select mr-sm-2" id="ammort">
                    <option value="-1" selected>Selectionner...</option>
                    <option value="1">Bon</option>
                    <option value="2">OBSELETE</option>
                    <option value="3">A REFORMER</option>
                </select>
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Nommenclature classe</label>
                <select name="nommen" class="custom-select mr-sm-2" id="nommen">
                    <option value="-1" selected>Selectionner...</option>
                    @foreach ($nns as $nn)
                    <option value='{{$nn->id}}'>{{ $nn->intitule }}</option>
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
                    <!-- <a href="{{url('printPdf')}}" class="btn btn-secondary btn-sm" style="margin-left:40%">Export PDF</a> -->
                    <a href="javascript:printPdf()" class="btn btn-secondary btn-sm" style="margin-left:40%">Export PDF</a>
                    
                    <a href="{{url('exportExcel')}}" class="btn btn-primary btn-sm" style="margin-left:5px">Export Excel</a>
            </div>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                    <th>NNS</th>
                        <th>Asset Number</th>
                        <th>Designation des Matières</th>
                        <th>Description</th>
                        <th>Date Acquisition</th>
                        <th>Number</th>
                        <th>Qte</th>
                        <th>P.U</th>
                        <th>Valeur</th>
                        <th>Date Affectation</th>
                        <th>Lieu Affectation</th>
                        <th>Taux d'Ammortisement</th>
                        <th>Durée de Vie</th>
                        <th>Date d'Ammortissement</th>
                        <th>Observations</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NNS</th>
                        <th>Asset Number</th>
                        <th>Designation des Matières</th>
                        <th>Description</th>
                        <th>Date Acquisition</th>
                        <th>Number</th>
                        <th>Qte</th>
                        <th>P.U</th>
                        <th>Valeur</th>
                        <th>Date Affectation</th>
                        <th>Lieu Affectation</th>
                        <th>Taux d'Ammortisement</th>
                        <th>Durée de Vie</th>
                        <th>Date d'Ammortissement</th>
                        <th>Observations</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($detenteurs as $detenteur)
                    <tr>
                        <td>{{ $detenteur->nns }}</td>
                        <td>{{ $detenteur->assets_number }}</td>
                        <td>{{ $detenteur->title }}</td>
                        <td>{{ $detenteur->observation }}</td>
                        <td>{{ $detenteur->date_acquisition }}</td>
                        <td>{{ $detenteur->number }}</td>
                        <td>{{ $detenteur->valeur_selon_fiche }}</td>
                        <td>{{ $detenteur->quantite }}</td>
                        <td>{{ $detenteur->valeur_origine }}</td>
                        <td>{{ $detenteur->date_mise_en_service }}</td>
                        <td>{{ $detenteur->departement }}</td>
                        <td>{{ $detenteur->taux_amortissement }}</td>
                        <td>{{ $detenteur->duree_de_vie }}</td>
                        <td>{{ $detenteur->date_amortissement }}</td>
                        <td>{{ $detenteur->observation }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
<script>
    async function printPdf() {
        var $r = $("#region").val();
        var $v = $("#ville").val();
        var $s = $("#site").val();
        var $d = $("#detenteur").val();
        var $t = $("#typeImmo").val();
        var $n = $("#nommen").val();
        var $a = $("#ammort").val();
        await fetch('/printPdf', {
            method: "POST", 
            body: {
                "region": $r,
                "ville": $v,
                "site": $s,
                "detenteur": $d,
                "typeImmo": $t,
                "nommen": $n,
                "ammort": $a
            }
        });    
    }
    async function region_func() {
        var $v = $("#region").val();
        if($v !== "-1") {
            await fetch('/villes/'+$v, {
                method: "GET", 

            }).then(response => response.json())
                .then(data => {
                $("#ville").empty();
                $("#ville").append('<option value="-1">Selectionner...</option>');
                $.each(data, function (index, value) {
                    $("#ville").append('<option value="' + value.id + '">' + data[index].intitule + ' </option>');
                });
                })
            .catch(error => console.error(error))
            
        }else{
           // document.getElementById('listeville').style.display ='none';
           $("#ville").empty();
           $("#ville").append('<option value="-1">Selectionner...</option>');
        }
    }

    async function ville_func() {
        var $v = $("#ville").val();
        if($v !== "-1") {
            await fetch('/sites/'+$v, {
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
