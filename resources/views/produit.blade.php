@extends('categories')
@section('content')

@if($produits->isEmpty())
    <h1>Pas de produit</h1>
@endif
@foreach($produits as $produit)
<main class="grid grid-cols-2 gap-x-6 gap-y-10  sm:grid-cols-3 sm:px-8 lg:mt-16 lg:grid-cols-4 lg:gap-x-4 mx-4 p-4 my-2">

    <div class="group my-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
        <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="{{ route('produit.detail', $produit->id) }}">
            @if($produit->images->isNotEmpty())
            @php
                $premiereImage = $produit->images->first();
            @endphp
            
          <img class="peer absolute top-0 right-0 h-full w-full object-cover"  src="{{ asset('storage/'.$premiereImage->chemin) }}" alt="product image" />
          @foreach ($produit->images as $image)
          <img class="peer absolute top-0 -right-96 h-full w-full object-cover transition-all delay-100 duration-1000 hover:right-0 peer-hover:right-0" src="{{ asset('storage/'.$image->chemin)}} " alt="product image" />
         @endforeach
          <svg class="pointer-events-none absolute inset-x-0 bottom-5 mx-auto text-3xl text-white  transition-opacity group-hover:animate-ping group-hover:opacity-30 peer-hover:opacity-0" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path fill="currentColor" d="M2 10a4 4 0 0 1 4-4h20a4 4 0 0 1 4 4v10a4 4 0 0 1-2.328 3.635a2.996 2.996 0 0 0-.55-.756l-8-8A3 3 0 0 0 14 17v7H6a4 4 0 0 1-4-4V10Zm14 19a1 1 0 0 0 1.8.6l2.7-3.6H25a1 1 0 0 0 .707-1.707l-8-8A1 1 0 0 0 16 17v12Z" /></svg>
          @endif
        </a>
        <div class="mt-4 px-5 pb-5">
          <a href="#">
            <h5 class="text-xl tracking-tight text-Zinc-900">{{ $produit->nom }}</h5>
          </a>
          <div class="mt-2 mb-5 flex items-center justify-between">
            <p>
              <span class="text-3xl font-bold text-Zinc-500">{{ $produit->prix }} MAD</span>
            </p>
          </div>
          <a href="#" class=" ajouter-panier flex items-center justify-center rounded-md bg-green-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-500 focus:outline-none focus:ring-4 focus:ring-blue-300" data-produit-id="{{ $produit->id }}" data-produit-nom="{{ $produit->nom }}" data-produit-prix="{{ $produit->prix }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            Add to cart</a
          >
        </div>
      </div>
      
                    
</main>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const boutonsAjouterPanier = document.querySelectorAll(".ajouter-panier");
        function ajouterAuPanier(id, nom, prix) {
            let panier = JSON.parse(localStorage.getItem("panier")) || [];
            panier.push({ id, nom, prix });
            localStorage.setItem("panier", JSON.stringify(panier));
        }
        boutonsAjouterPanier.forEach((bouton) => {
            bouton.addEventListener("click", function() {
                const id = this.dataset.produitId;
                const nom = this.dataset.produitNom;
                const prix = this.dataset.produitPrix;

                ajouterAuPanier(id, nom, prix);

                alert("Produit ajouté au panier !");
            });
        });
    });
</script>
@endforeach
@endsection
