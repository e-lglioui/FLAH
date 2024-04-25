<style>
  .swiper-wrapper {
    width: 100%;
    height: max-content;
    padding-bottom: 64px;
    transition-timing-function: linear;
    position: relative;
  }
  .swiper-pagination-progressbar .swiper-pagination-progressbar-fill {
    background: #2dcc09;
  }
</style>
    <div class="w-full relative mt-14"> 
      <div class="swiper progress-slide-carousel swiper-container relative">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
              <img src="{{ asset('img/banner-02.jpg') }}" alt="Background Image" >
            </div>
          </div>
          <div class="swiper-slide">
            <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
              <img src="{{ asset('img/banner-07.jpg') }}" alt="Background Image" >
            </div>
          </div>
          <div class="swiper-slide">
            <div class="bg-indigo-50 rounded-2xl h-96 flex justify-center items-center">
              <img src="{{ asset('img/banner-03.jpg') }}" alt="Background Image" >
            </div>
          </div>
        </div>
        <div class="swiper-pagination !bottom-2 !top-auto !w-80 right-0 mx-auto bg-gray-100"></div>
      </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
      <script>
        var swiper = new Swiper(".progress-slide-carousel", {
          loop: true,
          fraction: true,
          autoplay: {
            delay: 1200,
            disableOnInteraction: false,
          },
          pagination: {
            el: ".progress-slide-carousel .swiper-pagination",
            type: "progressbar",
          },
        });
      </script>
    
    
    