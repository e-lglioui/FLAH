@include('includes.header')

<section>
<div class="relative h-screen w-full">
    <img src="{{ asset('img/about.jpg') }}" alt="Background Image" class="absolute inset-0 w-full h-full object-cover filter blur-sm">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center">
        <h1 class="overflow-hidden whitespace-nowrap border-r-4 border-r-white pr-5 text-5xl text-white font-bold animate-typing">
            À propos de nous
        </h1>
        <p class="text-xl text-white mt-4">Votre destination en ligne pour tous vos besoins en produits agricoles et vétérinaires.</p>
    </div>
</div>
</section> 

<section>
    <section class="px-3 py-5 bg-neutral-100 lg:py-10">
        <div class="grid lg:grid-cols-2 items-center justify-items-center gap-5">
            <div class="order-2 lg:order-1 flex flex-col justify-center items-center">
                <p class="text-4xl font-bold md:text-7xl text-orange-500">25% RÉDUCTION</p>
                <p class="text-4xl font-bold md:text-7xl">SOLDE D'ÉTÉ</p>
                <p class="mt-2 text-sm md:text-lg">Pour une durée limitée seulement !</p>
                <button class="text-lg md:text-2xl bg-black text-white py-2 px-5 mt-10 hover:bg-zinc-800">Acheter maintenant</button>
            </div>
            <div class="order-1 lg:order-2">
                <img class="h-screen w-100 object-cover lg:w-[500px] lg:h-[500px]" src="{{ asset('img/orange.jpg') }}" alt="">
            </div>
        </div>
    </section>
</section>

