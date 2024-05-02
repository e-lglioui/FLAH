@extends('fornisseur.dashboard')

@section('content')
<section>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-6">
            <div>
                <div class="flex items-center mb-1">
                    <div class="text-2xl font-semibold">{{$totalVentes}}</div>
                </div>
                <div class="text-sm font-medium text-gray-400">Nombre total de ventes </div>
            </div>
             
        </div>
    </div>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-4">
            <div>
                <div class="flex items-center mb-1">
                    <div class="text-2xl font-semibold">{{$produitLePlusAchete->nom}}</div>
                </div>
                <div class="text-sm font-medium text-gray-400"> Top Produit</div>
            </div>
            
        </div>
    </div>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-6">
            <div>
                <div class="text-2xl font-semibold mb-1">{{$produitLeMoinsAchete->nom}}</div>
                <div class="text-sm font-medium text-gray-400">Flop Produit</div>
            </div>
             
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <div class="p-6 relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
        <div class="rounded-t mb-0 px-0 border-0">
          <div class="flex flex-wrap items-center px-4 py-2">
            <div class="relative w-full max-w-full flex-grow flex-1">
              <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Client en foction de region</h3>
            </div>
          </div>
          <div class="block w-full overflow-x-auto">
            <table class="items-center w-full bg-transparent border-collapse">
              <thead>
                <tr>
                  <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Région</th>
                  <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Total Clients</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($acheteursParRegion as $stat)
                  <tr class="text-gray-700 dark:text-gray-100">
                    <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                      {{ $stat->region }}
                    </th>
                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                      {{ $stat->total_acheteurs }}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            
            
          </div>
        </div>
      </div>
    <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
     
      <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-6">
            <div>
              <div class="text-sm font-medium text-Neutral-400">Nombre total de mes produits</div>
                <div class="text-2xl font-semibold mb-1">{{$totalProduits}}</div>
               
            </div>
             
        </div>
    </div>

    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
      <div class="flex justify-between mb-6">
          <div>
            <div class="text-sm font-medium text-Neutral-400">Nombre total de  catégories</div>
              <div class="text-2xl font-semibold mb-1">{{$totalCategories}}</div>
             
          </div>
           
      </div>
  </div>
  <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
    <div class="flex justify-between mb-6">
        <div>
          <div class="text-sm font-medium text-Neutral-400">Produit le plus cher</div>
            <div class="text-2xl font-semibold mb-1">{{$produitLePlusCher->nom}}</div>
           
        </div>
         
    </div>
</div>
<div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
  <div class="flex justify-between mb-6">
      <div>
        <div class="text-sm font-medium text-Neutral-400">Produit le moins cher</div>
          <div class="text-2xl font-semibold mb-1">{{ $produitLeMoinsCher->nom}}</div>
         
      </div>
       
  </div>
</div>


    </div>
</div>

</section>
@endsection