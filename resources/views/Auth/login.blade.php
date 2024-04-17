@include('includes.header')
@include('includes.navbar')

<div class="bg-gradient-to-br from-green-500 to-green-200 min-h-screen flex flex-col justify-center items-center">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-md">
        <a href="home" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/Flah.png') }}" class="h-20" alt="Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white  text-green-500 ">Flah</span>
        </a>
        <form class="space-y-6" action="{{ route('singin') }}" method="post">
            @csrf
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
                <button class="w-full bg-green-700 hover:bg-purple-900 text-white font-bold py-2 px-4 rounded-lg " type="submit" name="submit">
                    Log In
                </button>
            </div>
        </form>
    </div>
</div>