{{-- rendezvous today --}}
@extends('veterinaires.dashboard')

@section('content')

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h2 class="text-2xl font-semibold mb-4">Rendez-vous du Jour</h2>
            @if(count($rendezVousDuJour) > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telephone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">heure</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">message</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">statut</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $rendezVousDuJour as $rendezVousDuJour)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $rendezVousDuJour->nom_complet }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$rendezVousDuJour ->telephone }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $rendezVousDuJour->service }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $rendezVousDuJour->date_heure }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $rendezVousDuJour->message }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $rendezVousDuJour->statut }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('confermer', $rendezVousDuJour->id) }}" class="text-blue-500 hover:text-green-700">Valider</a>

                                <form action="{{ route('anuller', $rendezVousDuJour->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Anulle</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No Rendez-vous du Jour.</p>
        @endif
    </div>
        </div>
    </div>
</div> 

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h2 class="text-2xl font-semibold mb-4"> Tous les rendez-vous </h2>
            @if(count($rendezVousAll) > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telephone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">heure</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">message</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">statut</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $rendezVousAll as $rendezVousAll)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $rendezVousAll->nom_complet }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$rendezVousAll ->telephone }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $rendezVousAll->service }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $rendezVousAll->date_heure }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $rendezVousAll->message }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $rendezVousAll->statut }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('confermer', $rendezVousAll->id) }}" class="text-blue-500 hover:text-green-700">Valider</a>

                                <form action="{{ route('anuller', $rendezVousAll->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Anulle</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No Rendez-vous </p>
        @endif
    </div>
        </div>
    </div>
</div>
@endsection