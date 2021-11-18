@extends('layouts.frontend.app')

@section('content')

 <!-- Hero slider-->
      @include('partials.slider')

      <!-- Category (Women)-->
      <section class="container pt-lg-3 mb-4 mb-sm-5">
        <div class="row">
            @foreach($produits as $produit)
                <div class="col-lg-3">
                    <!-- Product card (Grid) -->
                    <div class="card product-card">
                        <span class="badge bg-danger badge-shadow">Promo</span>
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist">
                            <i class="ci-heart"></i>
                        </button>
                        <a class="card-img-top d-block overflow-hidden" href="#">
                            <img src="{{ $produit->image }}" alt="Product">
                        </a>
                        <div class="card-body py-2">
                            <a class="product-meta d-block fs-xs pb-1" href="#">Women’s T-shirt</a>
                            <h3 class="product-title fs-sm"><a href="#">{{ $produit->nom }}</a></h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price">
                                    <span class="text-accent">{{ $produit->prix }} Fcfa</span>
                                </div>
                                <div class="star-rating">
                                    <i class="star-rating-icon ci-star-filled active"></i>
                                    <i class="star-rating-icon ci-star-filled active"></i>
                                    <i class="star-rating-icon ci-star-filled active"></i>
                                    <i class="star-rating-icon ci-star"></i>
                                    <i class="star-rating-icon ci-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body card-body-hidden">
                            <div class="text-center pb-2">
                                <div class="form-check form-option form-check-inline mb-2">
                                    <input class="form-check-input" type="radio" name="color1" id="white" checked>
                                    <label class="form-option-label rounded-circle" for="white">
                                        <span class="form-option-color rounded-circle" style="background-color: #eaeaeb;"></span>
                                    </label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-2">
                                    <input class="form-check-input" type="radio" name="color1" id="blue">
                                    <label class="form-option-label rounded-circle" for="blue">
                                        <span class="form-option-color rounded-circle" style="background-color: #d1dceb;"></span>
                                    </label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-2">
                                    <input class="form-check-input" type="radio" name="color1" id="yellow">
                                    <label class="form-option-label rounded-circle" for="yellow">
                                        <span class="form-option-color rounded-circle" style="background-color: #f4e6a2;"></span>
                                    </label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-2">
                                    <input class="form-check-input" type="radio" name="color1" id="pink">
                                    <label class="form-option-label rounded-circle" for="pink">
                                        <span class="form-option-color rounded-circle" style="background-color: #f3dcff;"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex mb-2">
                                <select class="form-select form-select-sm me-2">
                                    <option>XS</option>
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                </select>
                                <button class="btn btn-primary btn-sm" type="button">
                                    <i class="ci-cart fs-sm me-1"></i>
                                    Add to Cart
                                </button>
                            </div>
                            <div class="text-center">
                                <a class="nav-link-style fs-ms" href="#" data-bs-toggle="modal">
                                    <i class="ci-eye align-middle me-1"></i>
                                    Quick view
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </section>


      <!-- Blog + Instagram info cards-->
      <section class="container-fluid px-0">
        <div class="row g-0">
          <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-primary" href="blog-list-sidebar.html">
              <div class="card-body text-center"><i class="ci-edit h3 mt-2 mb-4 text-primary"></i>
                <h3 class="h5 mb-1">Lire notre blog</h3>
                <p class="text-muted fs-sm">Latest store, fashion news and trends</p>
              </div></a></div>
          <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-accent" href="#">
              <div class="card-body text-center"><i class="ci-instagram h3 mt-2 mb-4 text-accent"></i>
                <h3 class="h5 mb-1">Suivez nous sur Instagram</h3>
                <p class="text-muted fs-sm">#xarala</p>
              </div></a></div>
        </div>
      </section>
@endsection
