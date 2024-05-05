@include('includes.header')
    
@include('includes.navbar')
@include('includes.slide')
{{-- @dd(Auth::user()->role_id) --}}
<section>
    <div class="container mx-auto px-4 py-6  my-5 bg-green-100 "> 
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"> 
            <div class="flex items-start"> 
                <div class="flex-shrink-0"> 
                    <img src="{{ asset('img/feature-icon-08.png') }}" alt="Support 24/7" class="w-12 h-12"> <!-- img -->
                </div>
                <div class="flex-grow ml-4"> 
                    <h3 class="text-lg font-bold text-orange-600">Support 24/7</h3>
                    <p class="mb-0">Obtaining the recommended daily fruits and vegetables.</p>
                </div>
            </div>
            <div class="flex items-start"> 
                <div class="flex-shrink-0"> 
                    <img src="{{ asset('img/feature-icon-02.png') }}" alt="Free Shipping" class="w-12 h-12"> 
                </div>
                <div class="flex-grow ml-4"> 
                    <h3 class="text-lg font-bold text-orange-600">Free Shipping</h3> 
                    <p class="mb-0">Obtaining the recommended daily fruits and vegetables.</p>
                </div>
            </div>
    
            <div class="flex items-start"> 
                <div class="flex-shrink-0"> 
                    <img src="{{ asset('img/feature-icon-03.png') }}" alt="Easy Payment" class="w-12 h-20"> <!-- img -->
                </div>
                <div class="flex-grow ml-4"> 
                    <h3 class="text-lg font-bold text-orange-600">Easy Payment</h3> 
                    <p class="mb-0">Obtaining the recommended daily fruits and vegetables.</p>
                </div>
            </div>
        </div>
    </div>
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
        </div>
    </section>


    <section>


        <div class="mx-auto max-w-screen-lg px-8 pt-20 pb-16 text-gray-700 md:pt-24 md:pb-20">
            <div class="flex flex-wrap">
              <div class="w-full max-w-full flex-shrink-0 lg:mt-2 lg:w-1/3 lg:flex-none">
                <h2 class="text-xs font-bold uppercase tracking-wide text-gray-500 xl:text-base">Nos Clients</h2>
                <h3 class="mb-3 font-bold text-gray-800 sm:text-2xl xl:text-4xl">De confiance par plus de 300+ clients</h3>
                <p class="">Nous apportons des solutions pour rendre la vie plus facile à nos clients.</p>                
              </div>
              <div class="w-full max-w-full py-10 lg:w-2/3 lg:flex-none lg:px-8 lg:py-0">
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                  <div class="w-32">
                    <img src="{{('img/filahi.jpg')}}" alt="" class="" />
                  </div>
                  <div class="w-32">
                    <img src="{{('img/wizara.png')}}" alt="" class="" />
                  </div>
                  <div class="w-32">
                    <img src="{{('img/copag.jpg')}}" alt="" class="" />
                  </div>
                  <div class="w-32">
                    <img src="{{('img/rafii.png')}}" alt="" class="" />
                  </div>
                  <div class="w-32">
                    <img src="{{('img/danon.jpg')}}" alt="" class="" />
                  </div>
                  <div class="w-32">
                    <img src="{{('img/jayda.png')}}" alt="" class="" />
                  </div>
                  <div class="w-32">
                    <img src="{{('img/marsa.png')}}" alt="" class="" />
                  </div>
                  <div class="w-32">
                    <img src="{{('img/vert.jpg')}}" alt="" class="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          
    </section>

@yield('newProduct')

                    
@include('includes.footer')
 
  
 



  