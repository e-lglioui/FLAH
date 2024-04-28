@extends('fornisseur.dashboard')
@section('content')

<div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
@foreach($produits as $produit)
    <div class="bg-white rounded-lg overflow-hidden shadow-lg ring-4 ring-green-500 ring-opacity-40 max-w-xs">
        <div class="relative">
            @if($produit->images->isNotEmpty())
                @php
                    $premièreImage = $produit->images->first();
                @endphp
                <img class="w-full h-20 object-cover" src="{{ asset('storage/' . $premièreImage->chemin) }}" alt="{{ $produit->nom }}">
            @else
                <div class="w-full h-20 bg-gray-200 text-center flex items-center justify-center">
                    Pas d'image
                </div>
            @endif
    
        </div>
        <div class="p-2">
            <h3 class="text-sm font-medium">{{ $produit->nom }}</h3>
            <p class="text-gray-600 text-xs">
                {{ \Illuminate\Support\Str::limit($produit->description, 50) }}
            </p>
            <div class="flex justify-between items-center mt-2">
                <span class="font-bold text-sm">{{ $produit->prix }} MAD</span>
                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-2 rounded text-xs">
                    <a href="{{ route('produit.detail', $produit->id) }}">  voir plus</a>
                </button>
            </div>
        </div>
    </div>
@endforeach
</div>

@endsection
