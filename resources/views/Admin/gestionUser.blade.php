@extends('admin.dashboard')
@section('content')
<div class="py-12  ">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-10">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-semibold mb-4">Demandes des vétérinaires</h2>

    
                @if($V->count() > 0)
                    <table class="w-ful divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom de cabinet</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom du vétérinaire</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Région</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ville</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Certification</th>
                                <th class=" py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($V as $veterinaire)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $veterinaire->nom_entreprise }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $veterinaire->user->name}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $veterinaire->user->email}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $veterinaire->user->region}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $veterinaire->user->ville}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($veterinaire->certification)
                                            <a href="{{ asset('storage/' . $veterinaire->certification) }}" class="text-blue-500 hover:text-blue-700" download>Télécharger le certificat</a>
                                        @else
                                            <p>Aucun certificat n'est disponible.</p>
                                        @endif
                                    </td>
                                    <td class="px-1 py-4 whitespace-nowrap">
                                        <a href="{{ route('veterinaire', $veterinaire->id) }}" class="text-green-500 hover:text-green-700 ml-2 ">Accept</a>

                                        <form action="{{ route('destroy', $veterinaire->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                                        </form>
                                       

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Aucune demande de vétérinaire disponible.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
