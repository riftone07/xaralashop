@extends('layouts.frontend.app')

@section("content")
    <!-- Page Title-->
    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Valider votre commande</h1>
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <section class="col-lg-8">
                <!-- Steps-->
                <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="shop-cart.html">
                        <div class="step-progress"><span class="step-count">1</span></div>
                        <div class="step-label"><i class="ci-cart"></i>Cart</div></a><a class="step-item active current" href="checkout-details.html">
                        <div class="step-progress"><span class="step-count">2</span></div>
                        <div class="step-label"><i class="ci-user-circle"></i>Details</div></a><a class="step-item" href="checkout-shipping.html">
                        <div class="step-progress"><span class="step-count">3</span></div>
                        <div class="step-label"><i class="ci-package"></i>Shipping</div></a><a class="step-item" href="checkout-payment.html">
                        <div class="step-progress"><span class="step-count">4</span></div>
                        <div class="step-label"><i class="ci-card"></i>Payment</div></a><a class="step-item" href="checkout-review.html">
                        <div class="step-progress"><span class="step-count">5</span></div>
                        <div class="step-label"><i class="ci-check-circle"></i>Review</div></a></div>
                <!-- Autor info-->
                <form action="{{ route('passeralacaisse.store') }}" method="post">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif
                <!-- Shipping address-->
                <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Information de base</h2>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-fn">Prenom et Nom</label>
                            <input class="form-control" type="text" id="checkout-fn" value="{{ Auth::user()->name }}">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-email">Adresse E-mail</label>
                            <input class="form-control" type="email" id="checkout-email" name="email" value="{{ Auth::user()->email }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-phone">Numero téléphone</label>
                            <input class="form-control" type="text" id="checkout-phone" name="telephone" value="{{ Auth::user()->telephone }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label class="form-label" for="checkout-address-1">Adresse de livraison</label>
                            <input class="form-control" type="text" name="adresse_de_livraison" id="checkout-address-1" value="{{ old('adresse_de_livraison') }}" required>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type_de_paiement" id="paiement_en_ligne" value="enligne" checked>
                            <label class="form-check-label" for="paiement_en_ligne">Paiement en ligne (<small class="text-danger">payez par orange money - wave - free money ...</small>)</label>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type_de_paiement" id="inlineRadio1" value="livraison" >
                            <label class="form-check-label" for="inlineRadio1">Paiement à la livraison</label>
                        </div>
                    </div>

                </div>

                <!-- Navigation (desktop)-->
                <div class="d-none d-lg-flex pt-4 mt-3">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="{{ route('panier.index') }}"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Retour au panier</span><span class="d-inline d-sm-none">Back</span></a></div>
                    <div class="w-50 ps-2">
                        <button type="submit" class="btn btn-primary d-block w-100"><span class="d-none d-sm-inline">Valider la commande</span><span class="d-inline d-sm-none">Suivant</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></button>
                    </div>
                </div>

                </form>
            </section>
            <!-- Sidebar-->
            <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
                <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
                    <div class="py-2 px-xl-2">
                        <div class="widget mb-3">
                            <h2 class="widget-title text-center">Details Commande</h2>
                            @foreach($paniers as $panier)
                            <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0" href="shop-single-v1.html"><img src="img/shop/cart/widget/01.jpg" width="64" alt="Product"></a>
                                <div class="ps-2">
                                    <h6 class="widget-product-title"><a href="shop-single-v1.html">{{ $panier->name }}</a></h6>
                                    <div class="widget-product-meta"><span class="text-accent me-2">{{ format_devise($panier->price) }}</span><span class="text-muted">x {{ $panier->quantity }}</span></div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <h3 class="fw-normal text-center my-4">{{ format_devise($totalpanier) }}</h3>
                    </div>
                </div>
            </aside>
        </div>
        <!-- Navigation (mobile)-->
        <div class="row d-lg-none">
            <div class="col-lg-8">
                <div class="d-flex pt-4 mt-3">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="shop-cart.html"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
                    <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="checkout-shipping.html"><span class="d-none d-sm-inline">Valider la commande</span><span class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
