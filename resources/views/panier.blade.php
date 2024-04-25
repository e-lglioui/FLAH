
@include('includes.header') 
@include('includes.navbar')

<div class="container mx-auto mt-10">
    <div class="sm:flex shadow-md my-10">
      <div class="w-full sm:w-3/4 bg-white px-10 py-10">
        <div class="flex justify-between border-b pb-8">
          <h1 class="font-semibold text-2xl">Panier d'achat</h1>
          <h2 class="font-semibold text-2xl">{{ count($produits) }} Articles</h2>
        </div>

        <!-- Liste des produits -->
        @foreach ($produits as $produit)
          <div class="flex items-strech py-8 md:py-10 lg:py-8 border-t border-gray-50">
            <div class="md:w-4/12 2xl:w-1/4 w-full">
              <!-- Afficher l'image du produit -->
              <img src="{{ asset('storage/' . $produit->images->first()->chemin) }}" alt="{{ $produit->nom }}" class="h-full object-center object-cover md:block hidden" />
            </div>
            <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
              <p class="text-base font-black leading-none text-gray-800">{{ $produit->nom }}</p>
              <p class="text-xs leading-3 text-gray-600 pt-2">Prix : {{ $produit->prix }} MAD</p>
              <p class="text-xs leading-3 text-gray-600">Quantité : {{ $produit->pivot->quantite }}</p>
            </div>
          </div>
        @endforeach

        <!-- Lien pour continuer les achats -->
        <a href="/categories" class="flex font-semibold text-green-700 text-sm mt-10">
         
          Continuer les achats
        </a>
      </div>

      <div class="w-full sm:w-1/4 md:w-1/2 px-8 py-10 bg-green-100">
        <!-- Résumé de la commande -->
        <h1 class="font-semibold text-2xl border-b pb-8">Résumé de la commande</h1>
        <div class="flex justify-between mt-10 mb-5">
          <span class="font-semibold text-sm uppercase">Articles {{ count($produits) }}</span>
          <span class="font-semibold text-sm">{{ $total }} MAD</span>
        </div>
        <!-- Autres détails comme le coût de livraison, le code promo, etc. -->
        <div class="border-t mt-8">
          <div class="flex font-semibold justify-between py-6 text-sm uppercase">
            <span>Coût total</span>
            <span>{{ $total }} MAD</span>
          </div>
          <button class="bg-green-500 font-semibold hover:bg-green-600 py-3 text-sm text-white uppercase w-full">
                Commander
          </button>
        </div>
      </div>
    </div>
</div>
