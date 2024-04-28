@extends('fornisseur.dashboard')
@section('content')

<div class="max-w-4xl mx-auto px-4 lg:px-6 py-6">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Éditer le Produit</h1>
    
    <form action="{{ route('produit.update', $produit->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Nom du Produit -->
        <div class="space-y-1">
            <label for="nom" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom du Produit</label>
            <input 
                type="text" 
                name="nom" 
                id="nom" 
                value="{{ old('nom', $produit->nom) }}" 
                required
                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            />
            @error('nom')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- Description -->
        <div class="space-y-1">
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
            <textarea 
                name="description" 
                id="description" 
                rows="4" 
                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            >{{ old('description', $produit->description) }}</textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- Prix -->
        <div class="space-y-1">
            <label for="prix" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prix (MAD)</label>
            <input 
                type="number" 
                name="prix" 
                id="prix" 
                step="0.01"
                min="0"
                value="{{ old('prix', $produit->prix) }}" 
                required
                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            />
            @error('prix')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- Catégorie -->
        <div class="space-y-1">
            <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Catégorie</label>
            <select 
                name="category_id" 
                id="category_id"
                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                required
            >
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $produit->category_id == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- Quantité -->
        <div class="space-y-1">
            <label for="quantite" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantité</label>
            <input 
                type="number" 
                name="quantite" 
                id="quantite" 
                min="0"
                value="{{ old('quantite', $produit->quantite) }}" 
                required
                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            />
            @error('quantite')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- Images -->
        <div class="space-y-1">
            <label for="images" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Images</label>
            <input 
                type="file" 
                name="images[]" 
                id="images" 
                multiple
                class="mt-1 block w-full border rounded-md bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300"
            />
            @error('images')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- Boutons d'Action -->
        <div class="flex justify-end gap-2">
            <a href="{{ route('produit.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-400 transition duration-200">Annuler</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-400 transition duration-200">Mettre à jour</button>
        </div>
    </form>
</div>

@endsection
