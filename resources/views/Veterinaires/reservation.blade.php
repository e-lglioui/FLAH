@include('includes.header')
@include('includes.navbar')

<div class="w-screen">
  <div class="relative mx-auto my-10 max-w-screen-lg py-32 text-center shadow-xl shadow-gray-300 overflow-hidden">
    <h1 class="text-3xl font-bold text-orange-500 md:text-5xl">Rendez-vous</h1>
    <p class="mt-6 text-lg text-white">Fixez un rendez-vous avec un vétérinaire</p>
    <img class="absolute top-0 left-0 -z-10 h-full w-full object-cover" src="{{asset('img/vit4.jpg')}}" alt="veterinarian" />
  </div>

  <div class="container mx-auto my-10">
    <div class="text-2xl py-4 px-6 bg-gray-900 text-white text-center font-bold uppercase">
      Rendez-vous
    </div>
    <form class="py-4 px-6 bg-white shadow rounded" action="{{ route('reservation') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="name">
          Nom complet
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="name" name="name" type="text" placeholder="Entrez votre nom" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="phone">
          Numéro de téléphone
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="phone" name="phone" type="tel" placeholder="Entrez votre numéro de téléphone" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="date">
          Date du rendez-vous
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="date" name="date" type="date" placeholder="Sélectionnez une date" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="time">
          Heure du rendez-vous
        </label>
        <input
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="time" name="time" type="time" placeholder="Sélectionnez une heure" required>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="service">
          Service
        </label>
        <select
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="service" name="service" required>
          <option value="">Choisissez un service</option>
          <option value="clinic">Visite à la clinique</option>
          <option value="stable">Visite à l'écurie</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="message">
          Message
        </label>
        <textarea
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          id="message" name="message" rows="4" placeholder="Entrez des informations supplémentaires"></textarea>
      </div>
       <input type="hidden" name="veterinaire_id" value="{{$id}}">
      <div class="flex items-center justify-center mb-4">
        <button
          class="bg-green-700 text-white py-2 px-4 rounded hover:bg-green-500 focus:outline-none focus:shadow-outline"
          type="submit" name="submit">
          Fixer le rendez-vous
        </button>
      </div>
    </form>
  </div>
</div>


