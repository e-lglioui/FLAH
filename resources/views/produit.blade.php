@extends('categories')

@section('content')

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
