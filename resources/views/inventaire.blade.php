@extends('base')
@section('main')  
<div class="container-fluid px-4">
    <h1 class="mt-4">Inventaires</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Détendeurs de matériels</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Liste des détendeurs de matériels
        </div>
        <div class="card-body">        
            <div class="d-flex" style="margin-bottom: 5px;">    
                    <!-- <a href="{{url('printPdf')}}" class="btn btn-secondary btn-sm" style="margin-left:40%">Export PDF</a> -->
                    <a href="{{url('testpdf')}}" class="btn btn-secondary btn-sm" style="margin-left:40%">Export PDF</a>
                    
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
