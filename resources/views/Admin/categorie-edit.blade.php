
@extends('admin.dashboard')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-semibold mb-4">Edit Category</h2>

                <form action="{{ route('categorie.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT') 

                    <div class="mb-4">
                        <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input type="text" name="nom" id="nom" value="{{ old('nom', $category->nom) }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                    </div>

                    <div class="mb-4">
                        <label for="descrption" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="descrption" id="descrption" class="mt-1 p-2 border border-gray-300 rounded-md w-full">{{ old('descrption', $category->descrption) }}</textarea>
                    </div>

                    <div class="flex items-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                            Update Category
                        </button>
                        <a href="{{ route('categorie.index') }}" class="ml-4 text-gray-500 hover:text-gray-700">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection