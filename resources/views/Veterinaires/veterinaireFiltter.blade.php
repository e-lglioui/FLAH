@extends('veterinaires.veterinaire')

@section('content')

@if($fillterVille->isEmpty() )
    <h1>Pas de viterinair dans cette region</h1>
@else
<div class="grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-3 sm:px-8 lg:grid-cols-4 lg:gap-x-4 mx-4 px-20 ">
    @foreach($fillterVille as $fillterVille)
<div
class="max-w-2xl mx-4 sm:max-w-sm md:max-w-sm lg:max-w-sm xl:max-w-sm sm:mx-auto md:mx-auto lg:mx-auto xl:mx-auto mt-16 bg-white shadow-xl rounded-lg text-gray-900">
<div class="rounded-t-lg h-32 overflow-hidden">
    <img class="object-cover object-top w-full" src='{{asset('img/vit.jpg')}}' alt='Mountain'>
</div>
<div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
    <img class="object-cover object-center h-32" src='{{asset('img/vit1.jpg')}}' alt='Woman looking front'>
</div>
<div class="text-center mt-2">
    <h2 class="font-semibold">{{$fillterVille->name}}</h2>
    <p class="text-gray-500">{{$fillterVille->email}}</p>
</div>
<ul class="py-4 mt-2 text-gray-700 flex items-center justify-around">
  
    <li class="flex flex-col items-center justify-between">
        <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
                d="M7 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1c2.15 0 4.2.4 6.1 1.09L12 16h-1.25L10 20H4l-.75-4H2L.9 10.09A17.93 17.93 0 0 1 7 9zm8.31.17c1.32.18 2.59.48 3.8.92L18 16h-1.25L16 20h-3.96l.37-2h1.25l1.65-8.83zM13 0a4 4 0 1 1-1.33 7.76 5.96 5.96 0 0 0 0-7.52C12.1.1 12.53 0 13 0z" />
        </svg>
        <div>{{$fillterVille->tele}}</div>
    </li>
    
</ul>
{{-- @dd($fillterVille->id) --}}
<div class="p-4 border-t mx-8 mt-2">
    <button class=" block mx-auto rounded-full bg-green-600 hover:shadow-lg font-semibold text-white  py-2 px-6"> <a href="{{ route('rendezvous', $fillterVille->id) }}">Rendez-vous</button>
</div>
</div>
    @endforeach
<div>

@endif
@endsection

