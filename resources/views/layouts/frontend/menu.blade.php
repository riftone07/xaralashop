<div class="collapse navbar-collapse" id="navbarCollapse">
  <!-- Search-->
  <div class="input-group d-lg-none my-3"><i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
    <input class="form-control rounded-start" type="text" placeholder="Search for products">
  </div>
  <!-- Primary menu-->
  <ul class="navbar-nav">

    <li class="nav-item  active"><a class="nav-link" href="{{ url('/') }}">Accueil</a></li>
    <li class="nav-item  active"><a class="nav-link" href="#">Boutique</a></li>
      <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Categories</a>
          <ul class="dropdown-menu">
              <li class="dropdown position-static mb-0">

                  @foreach($categories_all as $categorie)
                  <a class="dropdown-item py-2 border-bottom" href="home-fashion-store-v1.html">
                      <span class="d-block text-heading">{{ $categorie->libelle }}</span>
                  </a>
                  @endforeach

              </li>
          </ul>
      </li>
    <li class="nav-item  active"><a class="nav-link" href="#">Qui sommes nous</a></li>


  </ul>
</div>
