@extends('admin.dashboard')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-semibold mb-4">Category Details</h2>

                <div>
                    <p><strong>Name:</strong> {{ $category->nom }}</p>
                    <p><strong>Description:</strong> {{ $category->descrption }}</p>
                    
                    <div class="mt-4">
                        <a href="{{ route('categorie.index') }}" class="text-blue-500 hover:text-blue-700">Back to All Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection