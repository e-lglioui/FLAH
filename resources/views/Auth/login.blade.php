@include('includes.header')
{{-- @include('includes.navbar') --}}

<div class="bg-gradient-to-br from-green-500 to-green-200 min-h-screen flex flex-col justify-center items-center">
    @if(session('info'))
        <div class="bg-blue-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto max-w-lg">
            <svg viewBox="0 0 24 24" class="text-blue-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                <path fill="currentColor"
                    d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm.25,5a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,12.25,5ZM14.5,18.5h-4a1,1,0,0,1,0-2h.75a.25.25,0,0,0,.25-.25v-4.5a.25.25,0,0,0-.25-.25H10.5a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2v4.75a.25.25,0,0,0,.25.25h.75 a1,1,0,1,1,0,2Z">
                </path>
            </svg>
            <span class="text-blue-800">{{ session('info') }}</span>
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto max-w-lg">
            <svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                <path fill="currentColor"
                    d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                </path>
            </svg>
            <span class="text-green-800">Votre compte a été enregistré.</span>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-lg p-8 max-w-md">
        <a href="home" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/Flah.png') }}" class="h-20" alt="Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white  text-green-500 ">Flah</span>
        </a>
        <form class="space-y-6" action="{{ route('singin') }}" method="post" onsubmit="return validateForm()">
            @csrf
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
                <input class="w-full px-4 py-2 rounded-lg border border-gray-400" id="email" name="email" type="email" oninput="validateEmail()">
                <span class="text-red-500 hidden" id="email-error">Please enter a valid email address</span>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="password">Mot de passe</label>
                <input class="w-full px-4 py-2 rounded-lg border border-gray-400" id="password" name="password" type="password" oninput="validatePassword()">
                <span class="text-red-500 hidden" id="password-error">Please enter a valid password</span>
            </div>
            <div>
                <button class="w-full bg-green-700 hover:bg-purple-900 text-white font-bold py-2 px-4 rounded-lg" type="submit" name="submit">Log In</button>
            </div>
        </form>
    </div>
</div>

<script>
    function validateEmail() {
        var email = document.getElementById('email').value;
        var emailError = document.getElementById('email-error');
        var emailRegex = /^\S+@\S+\.\S+$/;

        if (!emailRegex.test(email)) {
            emailError.classList.remove('hidden');
        } else {
            emailError.classList.add('hidden');
        }
    }

    function validatePassword() {
        var password = document.getElementById('password').value;
        var passwordError = document.getElementById('password-error');
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

        if (!passwordRegex.test(password)) {
            passwordError.classList.remove('hidden');
        } else {
            passwordError.classList.add('hidden');
        }
    }

    function validateForm() {
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        if (!validateEmail() || !validatePassword()) {
            return false;
        }

        return true;
    }
</script>
