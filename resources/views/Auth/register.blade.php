@include('includes.header')
{{-- @include('includes.navbar') --}}

@if(session('info'))
<div class="bg-blue-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto max-w-lg">
    <svg viewBox="0 0 24 24" class="text-blue-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
        <path fill="currentColor"
            d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm.25,5a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,12.25,5ZM14.5,18.5h-4a1,1,0,0,1,0-2h.75a.25.25,0,0,0,.25-.25v-4.5a.25.25,0,0,0-.25-.25H10.5a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2v4.75a.25.25,0,0,0,.25.25h.75a1,1,0,1,1,0,2Z">
        </path>
    </svg>
    <span class="text-blue-800">{{ session('info') }}</span>
</div>
@endif


<div class="bg-gradient-to-br from-green-500 to-green-200 min-h-screen flex flex-col justify-center items-center">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-md">
        <a href="home" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/Flah.png') }}" class="h-20" alt="Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white  text-green-500 ">Flah</span>
        </a>
        <form class="space-y-6" action="{{ route('signup') }}" method="post" onsubmit="return validateForm()">
            @csrf
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="name">
                    Nom
                </label>
                <input class="w-full px-4 py-2 rounded-lg border border-gray-400" id="name" name="name"
                    type="text">
                    <span id="name-error" class="text-red-500 hidden">entrer nom valider </span>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="region">
                    Region
                </label>
                <select id="regions" name="region">
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
                    <span id="email-error" class="text-red-500 hidden">Slvp entrer email address</span>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="password">
                    Password
                </label>
                <input class="w-full px-4 py-2 rounded-lg border border-gray-400" id="password" name="password"
                    type="password">
                    <span id="password-error" class="text-red-500 hidden"> entrer mot de passvalider </span>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="adress">
                    Adress
                </label>
                <input class="w-full px-4 py-2 rounded-lg border border-gray-400" id="adress" name="adress"
                    type="text">
            </div>
            <label class="block text-gray-700 font-bold mb-2" for="tele">
                Telephone
            </label>
            <input class="w-full px-4 py-2 rounded-lg border border-gray-400" id="adress" name="tele"
                type="text">
                <span id="tele-error" class="text-red-500 hidden">Please enter a valid phone number</span>
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

//     function validateName() {
//         var name = document.getElementById('name').value;
//         var nameError = document.getElementById('name-error');
//         if (name.trim().length === 0) {
//             nameError.classList.remove('hidden');
//         } else {
//             nameError.classList.add('hidden');
//         }
//     }

//     function validateEmail() {
//         var email = document.getElementById('email').value;
//         var emailError = document.getElementById('email-error');
//         var emailRegex = /^\S+@\S+\.\S+$/;

//         if (!emailRegex.test(email)) {
//             emailError.classList.remove('hidden');
//         } else {
//             emailError.classList.add('hidden');
//         }
//     }

//     function validatePassword() {
//         var password = document.getElementById('password').value;
//         var passwordError = document.getElementById('password-error');
//         var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

//         if (!passwordRegex.test(password)) {
//             passwordError.classList.remove('hidden');
//         } else {
//             passwordError.classList add('hidden');
//         }
//     }

//     function validatePhone() {
//     var phone = document.getElementById('tele').value;
//     var phoneError = document.getElementById('tele-error');
//     var phoneRegex = /^0\d{9}$/;

//     if (!phoneRegex.test(phone)) {
//         phoneError.classList.remove('hidden');
//     } else {
//         phoneError.classList.add('hidden');
//     }
// }

    

//     function validateForm() {
//         validateName();
//         validateEmail();
//         validatePassword();
//         validatePhone();

//         var nameError = document.getElementById('name-error').classList.contains('hidden');
//         var emailError = document.getElementById('email-error').classList.contains('hidden');
//         var passwordError = document.getElementById('password-error').classList.contains('hidden');
//         var phoneError = document.getElementById('tele-error').classList.contains('hidden');

//         return nameError && emailError && passwordError && phoneError;
//     }
</script>