@extends('fornisseur.dashboard')
@section('content')

<div class="max-w-4xl mx-auto px-2 sm:px-4 lg:px-6">
    <div class="flex justify-between items-center mb-2">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $produit->nom }}</h1>
        <div class="flex gap-1">
            <a href="{{ route('produit.edit', $produit->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md">Éditer</a>
            <form action="{{ route('produit.destroy', $produit->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md">Supprimer</button>
            </form>
        </div>
    </div>

    <div class="flex flex-col md:flex-row -mx-2">
        <div class="md:flex-1 px-2">
            <div class="h-[200px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-2">
                <img class="main-image w-full h-full object-cover" src="{{ asset('storage/' . $produit->images->first()->chemin) }}" alt="{{ $produit->nom }}">
            </div>

            <div class="flex -mx-1">
                @foreach($produit->images as $image)
                    <img class="thumbnail-image w-16 h-16 object-cover mx-1 rounded" src="{{ asset('storage/' . $image->chemin) }}" alt="{{ $produit->nom }}">
                @endforeach
            </div>
        </div>

        <div class="md:flex-1 px-2">
            <h2 class="text-lg font-bold text-gray-800 dark:text-white">{{ $produit->nom }}</h2>
            <p class="text-gray-600 dark:text-gray-300 text-xs mb-2">{{ \Illuminate\Support\Str::limit($produit->description, 100) }}</p>

            <div class="flex flex-wrap items-center mb-2">
                <div class="mr-2">
                    <span class="font-bold text-gray-700 dark:text-gray-300">Prix:</span>
                    <span class="text-gray-600 dark:text-gray-300">{{ $produit->prix }} MAD</span>
                </div>
                <div>
                    <span class="font-bold text-gray-700 dark:text-gray-300">Disponibilité:</span>
                    <span class="text-gray-600 dark:text-gray-300">{{ $produit->quantite > 0 ? 'En stock' : 'En rupture de stock' }}</span>
                </div>
            </div>
            
            <div>
                <span class="font-bold text-gray-700 dark:text-gray-300">Description complète:</span>
                <p class="text-gray-600 dark:text-gray-300 text-xs">
                    {{ $produit->description }}
                </p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mainImage = document.querySelector('.main-image'); 
    const thumbnails = document.querySelectorAll('.thumbnail-image'); 
    //  console.log('A')
    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', () => {
            // console.log('A')
            mainImage.src = thumbnail.src;
        });
    });
});
</script>
@endsection
