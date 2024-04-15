<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Incluez le fichier CSS de Tailwind CSS depuis un CDN -->
</head>
<body>
<div class="flex items-center justify-center min-h-screen bg-cover bg-center bg-no-repeat"
  style="background-image: url('{{ asset('img/vache.jpg') }}')">
  <div class="max-w-md mx-auto text-center  bg-white bg-opacity-90 p-8 rounded-lg shadow-lg">
    <div class="text-9xl font-bold text-green-500 mb-4">404</div>
    <h1 class="text-4xl font-bold text-gray-800 mb-6">Oops ! Page non trouvée</h1>
    <p class="text-lg text-gray-600 mb-8">La page que vous recherchez semble avoir pris un petit chemin. Ne vous inquiétez pas, nous allons vous aider à retrouver votre chemin vers la maison.</p>
    <a href="#"
      class="inline-block bg-green-500 text-green font-semibold px-6 py-3 rounded-md hover:bg-indigo-700 transition-colors duration-300">
      Retourner à la page d'accueil
    </a>
  </div>
</div>
