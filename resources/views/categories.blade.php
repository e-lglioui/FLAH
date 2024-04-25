

@include('includes.header')
    
@include('includes.navbar')

{{-- <div class="h-48"></div> --}}
<div class="bg-green-700 border-gray-200 dark:bg-gray-900 h-20  top-0 w-full z-10"> 
    <div class="max-w-screen-xl flex flex-wrap items-center justify-around " >
        <a href="{{route('produit.new')}}" class=" text-white text-center p-10" aria-current="page">
            Nouveaux produits
        </a>
        @foreach($categories as $category)
        <a  href="{{ route('produit.category', ['id' => $category->id]) }}" class=" text-white text-center p-10" aria-current="page">
            {{ $category->nom }}
        </a>
        @endforeach
    </div>
</div>

@yield('content')