@extends('admin.dashboard')
@section('content')


<div class="w-full">

    <!-- Message de succès -->
    @if(session('success'))
    <div class="flex items-center justify-between p-5 leading-normal text-green-600 bg-green-100 rounded-lg" role="alert">
        <p>{{ session('success') }}</p>
        <svg onclick="this.parentNode.remove();" class="inline w-4 h-4 fill-current ml-2 hover:opacity-80 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 464c-114.7 0 208-93.31 208-208S141.3 48 256 48s208 93.31 208 208S370.7 464 256 464zM359.5 133.7c-10.11-8.578-25.28-7.297-33.83 2.828L256 218.8L186.3 136.5C177.8 126.4 162.6 125.1 152.5 133.7C142.4 142.2 141.1 157.4 149.7 167.5L224.6 256l-74.88 88.5c-8.562 10.11-7.297 25.27 2.828 33.83C157 382.1 162.5 384c6.812 0 13.59-2.891 18.34-8.5L256 293.2l69.67 82.34C330.4 381.1 337.2 384 344 384c5.469 0 10.98-1.859 15.48-5.672c10.12-8.562 11.39-23.72 2.828-33.83L287.4 256l-74.88-88.5C370.9 157.4 369.6 142.2 359.5 133.7z"/>
        </svg>
    </div>
    @endif

    <!-- Message d'erreur -->
    @if(session('error'))
    <div class="flex items-center justify-between p-5 leading-normal text-red-600 bg-red-100 rounded-lg" role="alert">
        <p>{{ session('error') }}</p>
        <svg onclick="this.parentNode.remove();" class="inline w-4 h-4 fill-current ml-2 hover:opacity-80 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 464c-114.7 0 208-93.31 208-208S141.3 48 256 48s208 93.31 208 208S370.7 464 256 464zM359.5 133.7c-10.11-8.578-25.28-7.297-33.83 2.828L256 218.8L186.3 136.5C177.8 126.4 162.6 125.1 152.5 133.7C142.4 142.2 141.1 157.4 149.7 167.5L224.6 256l-74.88 88.5c-8.562 10.11-7.297 25.27 2.828 33.83C157 382.1 162.5 384c6.812 0 13.59-2.891 18.34-8.5L256 293.2l69.67 82.34C330.4 381.1 337.2 384 344 384c5.469 0 10.98-1.859 15.48-5.672c10.12-8.562 11.39-23.72 2.828-33.83L287.4 256l74.88-88.5C370.9 157.4 369.6 142.2 359.5 133.7z"/>
        </svg>
    </div>
    @endif

    <!-- Message d'information -->
    @if(session('info'))
    <div class="flex items-center justify-between p-5 leading-normal text-blue-600 bg-blue-100 rounded-lg" role="alert">
        <p>{{ session('info') }}</p>
        <svg onclick="this.parentNode.remove();" class="inline w-4 h-4 fill-current ml-2 hover:opacity-80 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 464c-114.7 0 208-93.31 208-208S141.3 48 256 48s208 93.31 208 208S370.7 464 256 464zM359.5 133.7c-10.11-8.578-25.28-7.297-33.83 2.828L256 218.8L186.3 136.5C177.8 126.4 162.6 125.1 152.5 133.7C142.4 142.2 141.1 157.4 149.7 167.5L224.6 256l-74.88 88.5c-8.562 10.11-7.297 25.27 2.828 33.83C157 382.1 162.5 384c6.812 0 13.59-2.891 18.34-8.5L256 293.2l69.67 82.34C330.4 381.1 337.2 384 344 384c5.469 0 10.98-1.859 15.48-5.672c10.12-8.562 11.39-23.72 2.828-33.83"/>
        </svg>
    </div>
    @endif

</div>

<div class="py-12  ">
    <div class="max-w-12xl mx-auto ">
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
                                        <a href="{{ route('veterinaireDemmande', $veterinaire->id) }}" class="text-green-500 hover:text-green-700 ml-2">Accept</a>


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
<div class="py-12  ">
    <div class="max-w-12xl ">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-semibold mb-4">Demandes des Fornissueur</h2>

    
                @if($F->count() > 0)
                    <table class="w-ful divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom de cabinet</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom du vétérinaire</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Région</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ville</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matricule</th>
                                <th class=" py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($F as $fornissuer)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $fornissuer->nom_entreprise }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $fornissuer->user->name}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $fornissuer->user->email}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $fornissuer->user->region}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $fornissuer->user->ville}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $fornissuer->matricule}}</td>
                                    <td class="px-1 py-4 whitespace-nowrap">
                                        <a href="{{ route('fornissuerDemmande', $fornissuer->id) }}" class="text-green-500 hover:text-green-700 ml-2 ">Accept</a>

                                        <form action="{{ route('destroy', $fornissuer->id) }}" method="POST" class="inline">
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
                    <p>Aucune demande de Fornisseur disponible.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
