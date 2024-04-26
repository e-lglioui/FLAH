
@include('includes.header')
<body class="text-gray-800 font-inter">
    <!--sidenav -->
    @include('veterinaires.sidebare')
    <!-- end sidenav -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-white-200 min-h-screen transition-all main">
    <!-- navbar -->
     @include('veterinaires.profilenav')
    <!-- end navbar -->

      <!-- Content -->
        <div class="p-6" >

            @yield('content')
        </div>
      <!-- End Content -->
    </main>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    <script src="{{ asset('js/fullscreen.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    {{-- <script src="{{ asset('js/chart.js') }}"></script> --}}
    <script src="{{ asset('js/tab.js') }}"></script>
     
     
    

</body>
</html>