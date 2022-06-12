@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('produits.create') }}" class="btn btn-success float-right">Ajouter un produit</a>
                    </div>
                    <div class="card-body">
                        <livewire:product/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
