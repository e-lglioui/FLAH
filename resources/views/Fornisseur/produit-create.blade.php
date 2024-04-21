@extends('fornisseur.dashboard')

@section('content')
<div class="bg-white p-10 md:w-2/3 lg:w-1/2 mx-auto rounded">
    <form action="{{ route('produit.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <div class="flex items-center mb-5">
            <label for="nom" class="w-40 inline-block text-right mr-4 text-gray-500">Nom du produit</label>
            <input name="nom" id="nom" type="text" placeholder="Nom du produit" 
                   class="border-b-2 border-gray-400 flex-1 py-2 placeholder-gray-300 outline-none focus:border-green-400" 
                   required>
        </div>
        <div class="flex items-center mb-10">
            <label for="description" class="w-40 inline-block text-right mr-4 text-gray-500">Description du produit</label>
            <input type="text" name="description" id="description" placeholder="Description" 
                   class="border-b-2 border-gray-400 flex-1 py-2 placeholder-gray-300 outline-none focus:border-green-400" 
                   required>
        </div>

        <div class="flex items-center mb-10">
            <label for="prix" class="w-40 inline-block text-right mr-4 text-gray-500">Prix</label>
            <input type="number" name="prix" id="prix" 
                   class="border-b-2 border-gray-400 flex-1 py-2 placeholder-gray-300 outline-none focus:border-green-400" 
                   step="0.01" required>
        </div>

        <div class="flex items-center mb-10">
            <label for="quantite" class="w-40 inline-block text-right mr-4 text-gray-500">Quantité</label>
            <input type="number" name="quantite" id="quantite" 
                   class="border-b-2 border-gray-400 flex-1 py-2 placeholder-gray-300 outline-none focus:border-green-400" 
                   required>
        </div>

        <div class="flex items-center mb-10">
            <label for="category_id" class="w-40 inline-block text-right mr-4 text-gray-500">Catégorie</label>
            <select name="category_id" id="category_id" 
                    class="border-b-2 border-gray-400 flex-1 py-2 outline-none focus:border-green-400" required>
                <option value="" disabled selected>Choisissez une catégorie</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center mb-10">
            <label for="images" class="w-40 inline-block text-right mr-4 text-gray-500">Images</label>
            <input type="file" name="images[]" id="images" multiple 
                   class="border-b-2 border-gray-400 flex-1 py-2 outline-none focus:border-green-400">
        </div>

      
        <div class="text-right">
            <button class="py-3 px-8 bg-green-500 text-green-100 font-bold rounded" 
                    name="submit" type="submit">Ajouter</button>
        </div>
    </form>
</div>
@endsection
