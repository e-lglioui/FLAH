@include('includes.header')
    
@include('includes.navbar')
@include('includes.search')
    <div class="flex flex-col">
      <div class=" px-20 ">
        <form class="">
         
  
          <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
         
  
            <div class="flex flex-col">
              <label for="manufacturer" class="text-sm font-medium text-stone-600">Region</label>
  
              <select id="regions" name="region" class="mt-2 block w-full rounded-md border border-green-100 bg-green-100 px-2 py-2 shadow-sm outline-none focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                <option >select</option>
                <option value="Tanger-Tétouan-Al Hoceïma">Tanger-Tétouan-Al Hoceïma</option>
                <option value="L'Oriental">L'Oriental</option>
                <option value="Fès-Meknès">Fès-Meknès</option>
                <option value="Rabat-Salé-Kénitra">Rabat-Salé-Kénitra</option>
                <option value="Béni Mellal-Khénifra">Béni Mellal-Khénifra</option>
                <option value="Casablanca-Settat">Casablanca-Settat</option>
                <option value="Marrakech-Safi">Marrakech-Safi</option>
                <option value="Drâa-Tafilalet">Drâa-Tafilalet</option>
                <option value="Souss-Massa">Souss-Massa</option>
                <option value="Guelmim-Oued Noun">Guelmim-Oued Noun</option>
                <option value="Laâyoune-Sakia El Hamra">Laâyoune-Sakia El Hamra</option>
                <option value="Dakhla-Oued Ed-Dahab">Dakhla-Oued Ed-Dahab</option>
              </select>
            </div>
            <div class="flex flex-col">
                <label for="citiesContainer" class="text-sm font-medium text-stone-600">Ville</label>
                <select id="citiesContainer" name="ville" class="mt-2 block w-full rounded-md border border-green-100 bg-green-100 px-2 py-2 shadow-sm outline-none focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                 {{-- ville --}}
                </select>
              </div>
          </div>
  
          <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
            <button class="rounded-lg bg-gray-200 px-8 py-2 font-medium text-gray-700 outline-none hover:opacity-80 focus:ring">Reset</button>
            <button class="rounded-lg bg-green-600 px-8 py-2 font-medium text-white outline-none hover:opacity-80 focus:ring">Search</button>
          </div>
        </form>
      </div>
    </div>


 <script>
function addCityOption(container, cityName) {
  if (!cityName || typeof cityName !== 'string') {
    console.error('Invalid city name:', cityName); 

  }

  const option = document.createElement('option');
  option.value = cityName.toLowerCase().replace(/\s+/g, '');
  option.textContent = cityName;
  container.appendChild(option);
}




document.getElementById('regions').addEventListener('change', function () {
  const citiesContainer = document.getElementById('citiesContainer');
  const selectedRegion = this.value;

  citiesContainer.innerHTML = '';

    switch (selectedRegion) {
        case 'Tanger-Tétouan-Al Hoceïma':
            addCityOption(citiesContainer,'Tanger');
            addCityOption(citiesContainer,'Tétouan');
            addCityOption(citiesContainer,'Al Hoceïma');
            break;
        case 'L\'Oriental':
            addCityOption(citiesContainer,'Oujda');
            addCityOption(citiesContainer,'Berkane');
            addCityOption(citiesContainer,'Nador');
            break;

        case 'Fès-Meknès':
            addCityOption(citiesContainer,'Fès');
            addCityOption(citiesContainer,'Meknès');
            addCityOption(citiesContainer,'Taza');
            addCityOption(citiesContainer,'Ifrane');
            break;
         case 'Rabat-Salé-Kénitra':
            addCityOption(citiesContainer,'Rabat');
            addCityOption(citiesContainer,'Salé');
            addCityOption(citiesContainer,'Kénitra');
            addCityOption(citiesContainer,'Skhirat');
            break;
        case 'Béni Mellal-Khénifra':
            addCityOption(citiesContainer,'Béni Mellal');
            addCityOption(citiesContainer,'Khénifra');
            addCityOption(citiesContainer,'Azilal');
            addCityOption(citiesContainer,'Khouribga');
            break;
         case 'Casablanca-Settat':
            addCityOption(citiesContainer,'Casablanca');
            addCityOption(citiesContainer,'Settat');
            addCityOption(citiesContainer,'El Jadida');
            addCityOption(citiesContainer,'Mohammedia');
            break; 
        case 'Marrakech-Safi':
            addCityOption(citiesContainer,'Marrakech');
            addCityOption(citiesContainer,'Safi');
            addCityOption(citiesContainer,'Essaouira');
            addCityOption(citiesContainer,'Agadir');
            break;
        case 'Drâa-Tafilalet':
            addCityOption(citiesContainer,'Errachidia');
            addCityOption(citiesContainer,'Ouarzazate');
            addCityOption(citiesContainer,'Zagora');
            addCityOption(citiesContainer,'Tinghir');
            break;
        case 'Souss-Massa':
            addCityOption(citiesContainer,'Agadir');
            addCityOption(citiesContainer,'Inezgane');
            addCityOption(citiesContainer,'Tiznit');
            addCityOption(citiesContainer,'Taroudant');
            break;
        case 'Guelmim-Oued Noun':
            addCityOption(citiesContainer,'Guelmim');
            addCityOption(citiesContainer,'Tan-Tan');
            addCityOption(citiesContainer,'Sidi Ifni');
            addCityOption(citiesContainer,'Assa');
           break;
        case 'Laâyoune-Sakia El Hamra':
           addCityOption(citiesContainer,'Laâyoune');
           addCityOption(citiesContainer,'Boujdour');
           addCityOption(citiesContainer,'Tarfaya');
           addCityOption(citiesContainer,'Es-Semara');
          break;
        case 'Dakhla-Oued Ed-Dahab':
          addCityOption(citiesContainer,'Dakhla');
          addCityOption(citiesContainer,'Oued Ed-Dahab');
          addCityOption(citiesContainer,'Aousserd');
          break;
          default:
          break;
    }
});
    
</script>
  