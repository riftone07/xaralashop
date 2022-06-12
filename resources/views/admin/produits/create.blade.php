@extends('admin.master')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

@endpush
@section('breadcrumb')
    @include('admin.breacrumb',['title' => 'Ajouter un produit'])
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="nom">Nom produit</label>
                                    <input type="text" name="nom" id="nom" class="form-control" >
                                </div>
                                <div class="col">
                                    <label for="prix">Prix</label>
                                    <input type="text" name="prix" id="prix" class="form-control" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="quantite">quantite</label>
                                    <input type="number" name="quantite" id="quantite" class="form-control" >
                                </div>
                                <div class="col">
                                    <label for="categorie">Categorie</label>
                                    <select name="categorie_id" id="categorie" class="form-control">
                                        @foreach($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                          <div class="row mt-2">
                              @foreach($options as $option)
                                  <div class="form-check mx-1">
                                      <input class="form-check-input" type="checkbox" value="{{ $option->id }}" id="option-{{ $option->id }}" name="options[]">
                                      <label class="form-check-label" for="option-{{ $option->id }}">
                                          {{ $option->libelle }}
                                      </label>
                                  </div>
                              @endforeach
                          </div>
                            <div class="row">
                                <div class="col">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description"  class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="file" name="images[]" multiple class="form-control">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <button type="submit" class="btn btn-success">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '#',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($project) && $project->document)
                var files =
                    {!! json_encode($project->document) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                }
                @endif
            }
        }
    </script>
    <script>
        $('#description').summernote({
            tabsize: 2,
            height: 100
        });
    </script>
@endpush
