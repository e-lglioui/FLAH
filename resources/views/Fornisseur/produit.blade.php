@extends('fornisseur.dashboard')
@section('content')
@foreach ($produits as $produit)
    <div>
        <h3>{{ $produit->nom }}</h3>
        <p>{{ $produit->description }}</p>
        @foreach ($produit->images as $image)
        <img src="{{ asset('storage/'.$image->chemin)}} " alt="flah">
        @endforeach
    </div>
@endforeach

@endsection