@extends('admin.master')

@section('breadcrumb')
    @include('admin.breacrumb',['title' => 'Toutes les categories'])
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('categories.create') }}" class="btn btn-success float-right"> Ajouter une categorie</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nom Categorie</th>
                                    <th>Image</th>
                                    <th>Date de creation</th>
                                    <th>Nombre de produits</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $categorie)
                                <tr>
                                    <td>{{ $categorie->libelle }}</td>
                                    <td>
                                        <img src="{{ $categorie->getFirstMediaUrl('images','icon') }}" alt="" width="50">
                                    </td>
                                    <td>{{ is_null($categorie->created_at) ? "Non Renseigné" : $categorie->created_at->format('d/m/Y H:i:s') }}</td>
                                    <td>{{ $categorie->produits->count() }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('categories.show',$categorie->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
