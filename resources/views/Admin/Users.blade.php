@extends('admin.dashboard')

@section('content')
@extends('admin.dashboard')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-semibold mb-4">All Categories</h2>

                <div class="mb-4">
                    <a href="{{ route('categorie.create') }}" class="bg-green-700 hover:bg-green-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                        Create New Category
                    </a>
                </div>
                @if(count($categories) > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descreption</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $category->nom }}</td>
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
@endsection
