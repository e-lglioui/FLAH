@extends('admin.dashboard')

@section('content')
<div class="bg-white p-10 md:w-2/3 lg:w-1/2 mx-auto rounded">
    <form action="{{ route('categorie.store') }}" method="POST">
        @csrf
        <div class="flex items-center mb-5">
            <label for="nom" class="w-20 inline-block text-right mr-4 text-gray-500">Nom</label>
            <input name="nom" id="nom" type="text" placeholder="Nom de la catégorie" class="border-b-2 border-gray-400 flex-1 py-2 placeholder-gray-300 outline-none focus:border-green-400">
        </div>

        <div class="flex items-center mb-10">
            <label for="description" class="w-20 inline-block text-right mr-4 text-gray-500">Description</label>
            <input type="text" name="descrption" id="description" placeholder="Description" class="border-b-2 border-gray-400 flex-1 py-2 placeholder-gray-300 outline-none focus:border-green-400">
        </div>
        <div class="text-right">
            <button class="py-3 px-8 bg-green-500 text-green-100 font-bold rounded" name="submit" type="submit">Ajouter</button>
        </div>
    </form>
</div>
@endsection

