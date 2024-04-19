@extends('admin.dashboard')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-semibold mb-4">    Tous les demondes</h2>

    
                @if(count($Veterainaire) > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Region</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ville</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sertification</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($$Veterainaire as $Veterainaire)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $Veterainaire->nom }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $category->descrption }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('categorie.show', $category->id) }}" class="text-blue-500 hover:text-blue-700">View</a>
                                        <a href="{{ route('categorie.edit', $category->id) }}" class="text-green-500 hover:text-green-700 ml-2">Update</a>
                                        <form action="{{ route('categorie.destroy', $category->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No categories available.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection