@extends('categories')

@section('content')
    <section class="produit-detail">
    <div class="container mx-auto px-20">
      <div class="lg:col-gap-12 xl:col-gap-16 mt-8 grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-5 lg:gap-16">
        <div class="lg:col-span-3 lg:row-end-1">
          <div class="lg:flex lg:items-start">
            <div class="lg:order-2 lg:ml-5">
              <div class="max-w-xl overflow-hidden rounded-lg">
                <img class="h-full w-full max-w-full object-cover" src="{{ asset('storage/' . $produit->images->first()->chemin) }}" alt="{{ $produit->nom }}" />
              </div>
            </div>
            <div class="mt-2 w-full lg:order-1 lg:w-32 lg:flex-shrink-0">
              <div class="flex flex-row items-start lg:flex-col">
                @foreach ($produit->images as $image)
                  <button type="button" class="flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-gray-900 text-center">
                    <img class="h-full w-full object-cover" src="{{ asset('storage/' . $image->chemin) }}" alt="{{ $produit->nom }}" />
                  </button>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
          <h1 class="sm: text-2xl font-bold text-gray-900 sm:text-3xl">{{ $produit->nom }}</h1>
  
          <div class="mt-5 flex items-center">
            <div class="flex items-center">
              <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.690"></path>
              </svg>
            </div>
            <p class="ml-2 text-sm font-medium text-gray-500"> {{ $produit->discription}}</p>
          </div>
          
          <h2 class="mt-8 text-base text-gray-900">Prix: {{ $produit->prix }}</h2>
          <p class="mt-3">Quantité disponible: {{ $produit->quantite }}</p>
          <div class="mt-10 flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0">
            <div class="flex items-end">
              <h1 class="text-3xl font-bold">{{ $produit->prix }}</h1>
            </div>
            <button 
            class="ajouter-panier flex items-center justify-center rounded-md bg-green-700 px-20 py-2.5 text-center text-sm font-medium text-white hover:bg-green-500 focus:outline-none focus:ring-4 focus:ring-blue-300"
            data-produit-id="{{ $produit->id }}"
            data-produit-nom="{{ $produit->nom }}"
            data-produit-prix="{{ $produit->prix }}">
            
            Ajouter au panier
        </button>
          </div>       
        </div>
      </div>
    </div>
  </div>

  <div class="container mx-auto px-20 py-6  my-5 bg-green-100 "> 
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"> 
        <div class="flex items-start"> 
            <div class="flex-shrink-0"> 
                <img src="{{ asset('img/feature-icon-08.png') }}" alt="Support 24/7" class="w-12 h-12"> <!-- img -->
            </div>
            <div class="flex-grow ml-4"> 
                <h3 class="text-lg font-bold text-orange-600">Support 24/7</h3>
                <p class="mb-0">Obtaining the recommended daily fruits and vegetables.</p>
            </div>
        </div>
        <div class="flex items-start"> 
            <div class="flex-shrink-0"> 
                <img src="{{ asset('img/feature-icon-02.png') }}" alt="Free Shipping" class="w-12 h-12"> 
            </div>
            <div class="flex-grow ml-4"> 
                <h3 class="text-lg font-bold text-orange-600">Free Shipping</h3> 
                <p class="mb-0">Obtaining the recommended daily fruits and vegetables.</p>
            </div>
        </div>

        <div class="flex items-start"> 
            <div class="flex-shrink-0"> 
                <img src="{{ asset('img/feature-icon-03.png') }}" alt="Easy Payment" class="w-12 h-20"> <!-- img -->
            </div>
            <div class="flex-grow ml-4"> 
                <h3 class="text-lg font-bold text-orange-600">Easy Payment</h3> 
                <p class="mb-0">Obtaining the recommended daily fruits and vegetables.</p>
            </div>
        </div>
    </div>
</div>
<div class="container mx-auto px-20">
  <h1 class="sm: text-2xl font-bold text-gray-900 sm:text-3xl">   Produit de meme categorie <span class="text-orange-600">{{$memCategorie->nom}}</span></h1>
  
  @if($produits->isEmpty())
  <h1>Pas de produit</h1>
@else
{{-- @dd(Auth::id()) --}}
  <div class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-3 sm:px-8 lg:grid-cols-4 lg:gap-x-4 mx-4 p-4 my-2">
  @foreach($produits as $produit)
      <div class="group flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
          <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="{{ route('produit.detail', $produit->id) }}">
              @if($produit->images->isNotEmpty())
                  @php
                      $premiereImage = $produit->images->first();
                  @endphp
                  <img class="h-full w-full object-cover" src="{{ asset('storage/' . $premiereImage->chemin) }}" alt="{{ $produit->nom }}" />
                  @foreach ($produit->images as $image)
                      <img class="h-full w-full object-cover transition-all delay-100 duration-1000 hover:right-0" src="{{ asset('storage/' . $image->chemin) }}" alt="{{ $produit->nom }}" />
                  @endforeach
              @endif
          </a>
          <div class="mt-4 px-5 pb-5">
              <h5 class="text-xl tracking-tight text-zinc-900">{{ $produit->nom }}</h5>
              <div class="mt-2 mb-5 flex items-center justify-between">
                  <span class="text-3xl font-bold text-zinc-500">{{ $produit->prix }} MAD</span>
              </div>
              <button 
                  class="ajouter-panier flex items-center justify-center rounded-md bg-green-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-500 focus:outline-none focus:ring-4 focus:ring-blue-300"
                  data-produit-id="{{ $produit->id }}"
                  data-produit-nom="{{ $produit->nom }}"
                  data-produit-prix="{{ $produit->prix }}">
                  
                  Ajouter au panier
              </button>
          </div>
      </div>
  @endforeach
  </div>
@endif
</div>
@include('includes.footer')
<script>

  document.addEventListener("DOMContentLoaded", function() {
    console.log("Le script est chargé et prêt");
    const boutonsAjouterPanier = document.querySelectorAll(".ajouter-panier");
    const csrfToken = "{{ csrf_token() }}";
  
    function ajouterAuPanierLocalStorage(id, nom, prix) {
        let panier = JSON.parse(localStorage.getItem("panier")) || [];
        const produitExistant = panier.find(p => p.id === id);
        if (produitExistant) {
            produitExistant.quantite += 1;
        } else {
            panier.push({ id, nom, prix, quantite: 1 });
        }
        localStorage.setItem("panier", JSON.stringify(panier));
    }
  
    function ajouterAuPanierBDD(id, quantite) {
        fetch('/panier/ajouter', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken ,
            },
            body: JSON.stringify({ produit_id: id, quantite })
        })
        .then(response => {
            if (response.ok) {
                alert("Produit ajouté au panier !");
            } else {
                console.error("Erreur lors de l'ajout au panier.");
            }
        });
    }
  
    boutonsAjouterPanier.forEach((bouton) => {
        bouton.addEventListener("click", function() {
            console.log("Bouton cliqué!");
            const produitId = this.dataset.produitId;
            const produitNom = this.dataset.produitNom;
            const produitPrix = this.dataset.produitPrix;
  
  
            // console.log("Produit ID:", produitId);
            // console.log("Produit Nom:", produitNom);
            // console.log("Produit Prix:", produitPrix);
  
            @if(auth()->check())
                ajouterAuPanierBDD(produitId, 1);
            @else
           
                ajouterAuPanierLocalStorage(produitId, produitNom, produitPrix);
            @endif
        });
    });
  });
  // console.log(JSON.parse(localStorage.getItem("panier")));
  
  </script>
@endsection

