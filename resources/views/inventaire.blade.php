@extends('base')
@section('main')  
@php
   $r = "0";
@endphp
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
            <div class="col-auto my-1" style="display: none;" id="listeville">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Ville</label>
                <select name="ville" class="custom-select mr-sm-2" id="ville">
                    <option value="" selected>Selectionner...</option>
                    @foreach ($villes as $ville)
                    <option value='{{$ville->id}}'>{{ $ville->intitule }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto my-1" style="display: none;">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Site</label>
                <select name="site" class="custom-select mr-sm-2" id="site">
                    <option value="" selected>Selectionner...</option>
                    @foreach ($sites as $site)
                    <option value='{{$site->id}}'>{{ $site->intitule }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Détenteur</label>
                <select name="detenteur" class="custom-select mr-sm-2" id="détenteur">
                    <option value="" selected>Selectionner...</option>
                    <option value="1">One</option>
                </select>
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Type immobilisation</label>
                <select name="typeImmo" class="custom-select mr-sm-2" id="typeImmo">
                    <option value="" selected>Selectionner...</option>
                    @foreach ($typeImmos as $typeImmo)
                    <option value='{{$typeImmo->id}}'>{{ $typeImmo->intitule }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Nommenclature classe</label>
                <select name="nommen" class="custom-select mr-sm-2" id="nommen">
                    <option value="" selected>Selectionner...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Ammortissement</label>
                <select name="ammort" class="custom-select mr-sm-2" id="ammort">
                    <option value="" selected>Selectionner...</option>
                    <option value="1">Bon</option>
                    <option value="2">OBSELETE</option>
                    <option value="3">A REFORMER</option>
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
                    <a href="{{url('printPdf')}}" class="btn btn-secondary btn-sm" style="margin-left:40%">Export PDF</a>
                    <!-- <a href="javascript:printPdf()" class="btn btn-secondary btn-sm" style="margin-left:40%">Export PDF</a> -->
                    
                    <a href="{{url('exportExcel')}}" class="btn btn-primary btn-sm" style="margin-left:5px">Export Excel</a>
            </div>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>NNS</th>
                        <th>Assit Number</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date Acquisition</th>
                        <th>Number</th>
                        <th>Qte</th>
                        <th>P U</th>
                        <th>Valeur</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NNS</th>
                        <th>Assit Number</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date Acquisition</th>
                        <th>Number</th>
                        <th>Qte</th>
                        <th>P U</th>
                        <th>Valeur</th>
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
                        <td>{{ $detenteur->quantite }}</td>
                        <td>{{ $detenteur->valeur_origine }}</td>
                        <td>{{ $detenteur->valeur }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
<script>
    function printPdf() {
        alert(123)
    }
    function region_func() {
        var $v = $("#region").val();
        if($v !== "-1") {
            $v = Number($v);
            document.cookie = "p = " + $v;
            document.getElementById('listeville').innerHTML = '';
            var testDiv = document.getElementById("listeville");
            testDiv.innerHTML = '<label class="mr-sm-2" for="inlineFormCustomSelect">Ville</label> <select name="ville" class="custom-select mr-sm-2" id="ville"><option value="" selected>Selectionner...</option>@foreach ($villes as $ville) @php @endphp @if($r=='+$v+')<option value={{$ville->id}}>{{ $ville->intitule }} </option> @endif @endforeach</select>';
            document.getElementById('listeville').style.display ='block';
        }else{
            document.getElementById('listeville').style.display ='none';
        }
    }
</script>
