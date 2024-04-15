@include('includes.header')
@include('includes.navbar')
<section>
<div class="relative h-screen w-full">
    <img src="{{ asset('img/about.jpg') }}" alt="Background Image" class="absolute inset-0 w-full h-full object-cover filter blur-sm">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center">
        <h1 class="overflow-hidden whitespace-nowrap border-r-4 border-r-white pr-5 text-5xl text-orange-500 font-bold animate-typing">
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
                <button class="text-lg md:text-2xl bg-green-500 text-white py-2 px-5 mt-10 hover:bg-orange-700">Acheter maintenant</button>

            </div>
            <div class="order-1 lg:order-2">
                <img class="h-screen w-100 object-cover lg:w-[500px] lg:h-[500px]" src="{{ asset('img/orange.jpg') }}" alt="">
            </div>
        </div>
    </section>
</section>
<section class="">
    <div class="p-5 sm:p-8">
        <div class="columns-1 gap-5 sm:columns-2 sm:gap-8 md:columns-3 lg:columns-4 [&>img:not(:first-child)]:mt-8">
            <img src="{{ asset('img/portfolio-01.jpg') }}"/>
            <img src="{{ asset('img/portfolio-02.jpg') }}"/>
            <img src="{{ asset('img/portfolio-03.jpg') }}"/>
            <img src="{{ asset('img/portfolio-04.jpg') }}"/>
            <img src="{{ asset('img/about-07.jpg') }}"/>
            <img src="{{ asset('img/portfolio-06.jpg') }}"/>
            <img src="{{ asset('img/portfolio-07.jpg') }}"/>
            <img src="{{ asset('img/portfolio-08.jpg') }}"/>
            <img src="{{ asset('img/portfolio-09.jpg') }}"/>
            <img src="{{ asset('img/about-02.jpg') }}"/>
            <img src="{{ asset('img/portfolio-11.jpg') }}"/>
            <img src="{{ asset('img/portfolio-12.jpg') }}"/>
            <img src="{{ asset('img/portfolio-13.jpg') }}"/>
            <img src="{{ asset('img/portfolio-14.jpg') }}"/>
            <img src="{{ asset('img/vache.jpg') }}"/>
            <img src="{{ asset('img/vache.jpg') }}"/>
        </div>
    </div>
</section>

    
@include('includes.footer')