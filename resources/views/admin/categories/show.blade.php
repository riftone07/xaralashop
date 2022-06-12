@extends('admin.master')

@section('breadcrumb')
    @include('admin.breacrumb',['title' => 'Detail de la categorie'])
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">Libellé : {{ $categorie->libelle }}</li>
                            <li class="list-group-item">Date de creation : {{ is_null($categorie->created_at) ? "Non Renseigné" : $categorie->created_at->format('d/m/Y H:i:s') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
