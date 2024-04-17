@extends('admin.dashboard')

@section('content')

<section>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold">{{ $usersCount }}</div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Client</div>
                </div>
                 
            </div>
            <a href="/produit" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-4">
                <div>
                    <div class="flex items-center mb-1">
                        <div class="text-2xl font-semibold">{{ $fornisseur }}</div>
                    </div>
                    <div class="text-sm font-medium text-gray-400">Fornisseur</div>
                </div>
                
            </div>
            <a href="/produit" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
            <div class="flex justify-between mb-6">
                <div>
                    <div class="text-2xl font-semibold mb-1">{{ $veterinarian }}</div>
                    <div class="text-sm font-medium text-gray-400">Veterinarian</div>
                </div>
                 
            </div>
            <a href="" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="p-6 relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
            <div class="rounded-t mb-0 px-0 border-0">
              <div class="flex flex-wrap items-center px-4 py-2">
                <div class="relative w-full max-w-full flex-grow flex-1">
                  <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Commande</h3>
                </div>
              </div>
              <div class="block w-full overflow-x-auto">
                <table class="items-center w-full bg-transparent border-collapse">
                  <thead>
                    <tr>
                      <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Statue</th>
                      <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Total</th>
                      <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="text-gray-700 dark:text-gray-100">
                      <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">Terminée </th>
                      <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">4</td>
                      <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                        <div class="flex items-center">
                          <span class="mr-2">70%</span>
                          <div class="relative w-full">
                            <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                              <div style="width: 70%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-100">
                      <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">En cours</th>
                      <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">6</td>
                      <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                        <div class="flex items-center">
                          <span class="mr-2">40%</span>
                          <div class="relative w-full">
                            <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                              <div style="width: 40%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-100">
                      <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">Annulée</th>
                      <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">5</td>
                      <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                        <div class="flex items-center">
                          <span class="mr-2">45%</span>
                          <div class="relative w-full">
                            <div class="overflow-hidden h-2 text-xs flex rounded bg-pink-200">
                              <div style="width: 45%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
            <div class="flex justify-between mb-4 items-start">
                <div class="font-medium"> Statistiques</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                <div class="rounded-md border border-dashed border-gray-200 p-4">
                    <div class="flex items-center mb-0.5">
                        <div class="text-xl font-semibold">10</div>
                    </div>
                    <span class="text-gray-400 text-sm">Top produit </span>
                </div>
                <div class="rounded-md border border-dashed border-gray-200 p-4">
                    <div class="flex items-center mb-0.5">
                        <div class="text-xl font-semibold">50</div>
                    </div>
                    <span class="text-gray-400 text-sm">Top categorie</span>
                </div>
                <div class="rounded-md border border-dashed border-gray-200 p-4">
                    <div class="flex items-center mb-0.5">
                        <div class="text-xl font-semibold">4</div>
                    </div>
                    <span class="text-gray-400 text-sm">Top price</span>
                </div>
            </div>
            <div>
                <canvas id="order-chart"></canvas>
            </div>
        </div>
        
    </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    new Chart(document.getElementById('order-chart'), {
      type: 'line',
      data: {
          labels: generateNDays(7),
          datasets: [
              {
                  label: 'Fornisseur',
                  data: [{{ $fornisseur }}],
                  borderWidth: 1,
                  fill: true,
                  pointBackgroundColor: 'rgb(59, 130, 246)',
                  borderColor: 'rgb(59, 130, 246)',
                  backgroundColor: 'rgb(59 130 246 / .05)',
                  tension: .2
              },
              {
                  label: 'Agriculteur',
                  data: [{{$usersCount }}],
                  borderWidth: 1,
                  fill: true,
                  pointBackgroundColor: 'rgb(16, 185, 129)',
                  borderColor: 'rgb(16, 185, 129)',
                  backgroundColor: 'rgb(16 185 129 / .05)',
                  tension: .2
              },
              {
                  label: 'veterinarian',
                  data: [{{ $veterinarian }}],
                  borderWidth: 1,
                  fill: true,
                  pointBackgroundColor: 'rgb(244, 63, 94)',
                  borderColor: 'rgb(244, 63, 94)',
                  backgroundColor: 'rgb(244 63 94 / .05)',
                  tension: .2
              },
          ]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  
  function generateNDays(n) {
      const data = []
      for(let i=0; i<n; i++) {
          const date = new Date()
          date.setDate(date.getDate()-i)
          data.push(date.toLocaleString('en-US', {
              month: 'short',
              day: 'numeric'
          }))
      }
      return data
  }

  </script>
  </section>
    @endsection