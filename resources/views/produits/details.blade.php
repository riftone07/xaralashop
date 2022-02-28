@extends('layouts.frontend.app')

@section('content')

    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Product Page v.1</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">{{ $produit->nom }}</h1>
            </div>
        </div>
    </div>
    @if(session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
        @endif
    @if(session('msg_error'))
        <div class="alert alert-danger">
            {{ session('msg_error') }}
        </div>
        @endif
    <div class="container">
        <!-- Gallery + details-->
        <div class="bg-light shadow-lg rounded-3 px-4 py-3 mb-5">
            <div class="px-lg-3">
                <div class="row">
                    <!-- Product gallery-->
                    <div class="col-lg-7 pe-lg-0 pt-lg-4">
                        <div class="product-gallery">
                            <div class="product-gallery-preview order-sm-2">
                                <div class="product-gallery-preview-item active" id="first">
                                    <img class="image-zoom" src="{{ $produit->image }}" data-zoom="{{ $produit->image }}" alt="Product image">
                                    <div class="image-zoom-pane"></div>
                                </div>

                            </div>
                            <div class="product-gallery-thumblist order-sm-1">
                                <a class="product-gallery-thumblist-item active" href="#first">
                                    <img src="{{ $produit->image }}" alt="Product thumb">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product details-->
                    <div class="col-lg-5 pt-4 pt-lg-0">
                        <div class="product-details ms-auto pb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2"><a href="#reviews" data-scroll>
                                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                                    </div><span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">74 Reviews</span></a>
                                <button class="btn-wishlist me-0 me-lg-n3" type="button" data-bs-toggle="tooltip" title="Add to wishlist"><i class="ci-heart"></i></button>
                            </div>
                            <div class="mb-3">
                                <span class="h3 fw-normal text-accent me-1">{{ $produit->prix }} Fcfa</span>
                                <span class="badge bg-danger badge-shadow align-middle mt-n2">Sale</span>
                            </div>

                            <form class="mb-grid-gutter" method="post" action="{{ route('panier.store') }}">
                                @csrf
                                <input type="hidden" value="{{ $produit->id }}" name="produit_id" >

                                @if($produit->options->count() > 0)
                                <select name="option_id" id="" class="form-control mb-1">
                                    @foreach($produit->options as $option)
                                    <option value="{{ $option->libelle }}">{{ $option->libelle }}</option>
                                    @endforeach
                                </select>
                                @endif
                                <div class="mb-3 d-flex align-items-center">
                                    <select class="form-select me-3" style="width: 5rem;" name="quantite">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <button class="btn btn-primary btn-shadow d-block w-100" type="submit"><i class="ci-cart fs-lg me-2"></i>Ajouter au panier</button>
                                </div>
                            </form>
                            <!-- Product panels-->
                            <div class="accordion mb-4" id="productPanels">
                                <div class="accordion-item">
                                    <h3 class="accordion-header"><a class="accordion-button" href="#productInfo" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="productInfo"><i class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product info</a></h3>
                                    <div class="accordion-collapse collapse show" id="productInfo" data-bs-parent="#productPanels">
                                        <div class="accordion-body">
                                            <h6 class="fs-sm mb-2">Composition</h6>
                                            <p>
                                                {{ $produit->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#shippingOptions" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="shippingOptions"><i class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i>Shipping options</a></h3>
                                    <div class="accordion-collapse collapse" id="shippingOptions" data-bs-parent="#productPanels">
                                        <div class="accordion-body fs-sm">
                                            <div class="d-flex justify-content-between border-bottom pb-2">
                                                <div>
                                                    <div class="fw-semibold text-dark">Courier</div>
                                                    <div class="fs-sm text-muted">2 - 4 days</div>
                                                </div>
                                                <div>$26.50</div>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <div>
                                                    <div class="fw-semibold text-dark">Local shipping</div>
                                                    <div class="fs-sm text-muted">up to one week</div>
                                                </div>
                                                <div>$10.00</div>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <div>
                                                    <div class="fw-semibold text-dark">Flat rate</div>
                                                    <div class="fs-sm text-muted">5 - 7 days</div>
                                                </div>
                                                <div>$33.85</div>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <div>
                                                    <div class="fw-semibold text-dark">UPS ground shipping</div>
                                                    <div class="fs-sm text-muted">4 - 6 days</div>
                                                </div>
                                                <div>$18.00</div>
                                            </div>
                                            <div class="d-flex justify-content-between pt-2">
                                                <div>
                                                    <div class="fw-semibold text-dark">Local pickup from store</div>
                                                    <div class="fs-sm text-muted">&mdash;</div>
                                                </div>
                                                <div>$0.00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#localStore" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="localStore"><i class="ci-location text-muted fs-lg align-middle mt-n1 me-2"></i>Find in local store</a></h3>
                                    <div class="accordion-collapse collapse" id="localStore" data-bs-parent="#productPanels">
                                        <div class="accordion-body">
                                            <select class="form-select">
                                                <option value>Select your country</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="France">France</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Spain">Spain</option>
                                                <option value="UK">United Kingdom</option>
                                                <option value="USA">USA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sharing-->
                            <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a class="btn-share btn-twitter me-2 my-2" href="#"><i class="ci-twitter"></i>Twitter</a><a class="btn-share btn-instagram me-2 my-2" href="#"><i class="ci-instagram"></i>Instagram</a><a class="btn-share btn-facebook my-2" href="#"><i class="ci-facebook"></i>Facebook</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product description section 1-->


    </div>

@endsection
