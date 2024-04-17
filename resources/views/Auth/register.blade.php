@include('includes.header')
@include('includes.navbar')

{{-- @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            @if(session('error'))
                <li>{{ session('error') }}</li>
            @endif
        </ul>
    </div>
@endif --}}

<div class="bg-gradient-to-br from-green-500 to-green-200 min-h-screen flex flex-col justify-center items-center">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-md">
        <a href="home" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/Flah.png') }}" class="h-20" alt="Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white  text-green-500 ">Flah</span>
        </a>
        <form class="space-y-6" action="{{ route('signup') }}" method="post">
            @csrf
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="name">
                    Nom
                </label>
                <input class="w-full px-4 py-2 rounded-lg border border-gray-400" id="name" name="name"
                    type="text">
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="region">
                    Region
                </label>
                <select id="regions" name="region">
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
                </select>>

            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="ville">
                    Ville
                </label>
                <div id="citiesContainer">
                    
                        
    
                </div>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="email">
                    Email
                </label>
                <input class="w-full px-4 py-2 rounded-lg border border-gray-400" id="email" name="email"
                    type="email">
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="password">
                    Password
                </label>
                <input class="w-full px-4 py-2 rounded-lg border border-gray-400" id="password" name="password"
                    type="password">
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="adress">
                    Adress
                </label>
                <input class="w-full px-4 py-2 rounded-lg border border-gray-400" id="adress" name="adress"
                    type="text">
            </div>
            <div>
                <button class="w-full bg-green-700 hover:bg-purple-900 text-white font-bold py-2 px-4 rounded-lg" type="submit" name="submit">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>

<script>

    let citiesContainer = document.getElementById('citiesContainer');

  
    
    function addCityOption(cityName) {
    let cityContainer = document.getElementById('citiesContainer');
    let radio = document.createElement('input');
    radio.type = 'radio';
    radio.name = 'ville';
    radio.value = cityName;
    radio.id = cityName.toLowerCase().replace(/\s+/g, '');
    let label = document.createElement('label');
    label.htmlFor = cityName.toLowerCase().replace(/\s+/g, '');
    label.textContent = cityName;
    cityContainer.appendChild(radio);
    cityContainer.appendChild(label);
    cityContainer.appendChild(document.createElement('br'));
}



    document.getElementById('regions').addEventListener('change', function () {
        
        let selectedRegion = this.value;

        citiesContainer.innerHTML = '';

        switch (selectedRegion) {
            case 'Tanger-Tétouan-Al Hoceïma':
                addCityOption('Tanger');
                addCityOption('Tétouan');
                addCityOption('Al Hoceïma');
                break;
            case 'L\'Oriental':
                addCityOption('Oujda');
                addCityOption('Berkane');
                addCityOption('Nador');
                break;
  
            case 'Fès-Meknès':
                addCityOption('Fès');
                addCityOption('Meknès');
                addCityOption('Taza');
                addCityOption('Ifrane');
                break;
             case 'Rabat-Salé-Kénitra':
                addCityOption('Rabat');
                addCityOption('Salé');
                addCityOption('Kénitra');
                addCityOption('Skhirat');
                break;
            case 'Béni Mellal-Khénifra':
                addCityOption('Béni Mellal');
                addCityOption('Khénifra');
                addCityOption('Azilal');
                addCityOption('Khouribga');
                break;
             case 'Casablanca-Settat':
                addCityOption('Casablanca');
                addCityOption('Settat');
                addCityOption('El Jadida');
                addCityOption('Mohammedia');
                break; 
            case 'Marrakech-Safi':
                addCityOption('Marrakech');
                addCityOption('Safi');
                addCityOption('Essaouira');
                addCityOption('Agadir');
                break;
            case 'Drâa-Tafilalet':
                addCityOption('Errachidia');
                addCityOption('Ouarzazate');
                addCityOption('Zagora');
                addCityOption('Tinghir');
                break;
            case 'Souss-Massa':
                addCityOption('Agadir');
                addCityOption('Inezgane');
                addCityOption('Tiznit');
                addCityOption('Taroudant');
                break;
            case 'Guelmim-Oued Noun':
                addCityOption('Guelmim');
                addCityOption('Tan-Tan');
                addCityOption('Sidi Ifni');
                addCityOption('Assa');
               break;
            case 'Laâyoune-Sakia El Hamra':
               addCityOption('Laâyoune');
               addCityOption('Boujdour');
               addCityOption('Tarfaya');
               addCityOption('Es-Semara');
              break;
            case 'Dakhla-Oued Ed-Dahab':
              addCityOption('Dakhla');
              addCityOption('Oued Ed-Dahab');
              addCityOption('Aousserd');
              break;
              default:
              break;
}
    });
</script>
