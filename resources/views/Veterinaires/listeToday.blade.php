@extends('veterinaires.dashboard')

@section('content')

<table class="w-full border-collapse border border-blue-500 max-w-xl mt-16 mx-auto">
    <thead>
        <tr class="bg-green-500 text-white">
            <th class="py-2 px-4 text-left">Nom</th>
            <th class="py-2 px-4 text-left">Telephone</th>
            <th class="py-2 px-4 text-left">Service</th>
            <th class="py-2 px-4 text-left">Heure</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rendezVousDuJour as $item)
        <tr class="bg-white border-b border-blue-500">
            <td class="py-2 px-4">{{ $item->nom_complet }}</td>
            <td class="py-2 px-4">{{ $item->telephone }}</td>
            <td class="py-2 px-4">{{ $item->service }}</td>
            <td class="py-2 px-4">{{ $item->date_heure }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
