@include('includes.header')
@include('includes.navbar')
<section class="pt-10 overflow-hidden bg-gray-50 dark:bg-gray-800 md:pt-0 sm:pt-16 2xl:pt-16">
  <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
      <div class="grid items-center grid-cols-1 md:grid-cols-2">

          <div>
              <h2 class="text-3xl font-bold leading-tight text-black dark:text-white sm:text-4xl lg:text-5xl">Hey 👋 I
                  am
                  <br class="block sm:hidden" /> DR Salima 
              </h2>
              <p class="max-w-lg mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                  Amet minim mollit non deserunt
                  ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.
                  Exercitation veniam consequat sunt nostrud amet.
              </p>

             
          </div>

          <div class="relative">
              <img class="relative w-full xl:max-w-lg xl:mx-auto 2xl:origin-bottom 2xl:scale-110" src="{{('img/chat.png')}}" alt="" />
          </div>

      </div>

      <h1 class="text-3xl font-bold leading-tight text-black dark:text-white sm:text-4xl lg:text-2xl"> Faire votre demmande pour nous joind</h1>
  </div>
</section>

  

@include('demande')


@include('includes.footer')
