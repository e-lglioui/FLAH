    <!--sidenav -->
    <div class="fixed left-0 top-0 w-64 h-full bg-[#16a34a] p-4 z-50 sidebar-menu transition-transform">
        <a href="home" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/Flah.png') }}" class="h-20" alt="Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white  text-white ">Flah</span>
        </a>
        <ul class="mt-4">
            <span class="text-orange-400 font-bold">Veterinaire</span>
            <li class="mb-1 group">
                <a href="{{route("VeterinarianStatistique")}}" class="flex font-semibold items-center py-2 px-4 text-white hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-withe">
                    <i class="ri-home-2-line mr-3 text-lg"></i>
                    <span class="text-sm ">Dashboard</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="" class="flex font-semibold items-center py-2 px-4 text-white hover:bg-gray-950 hover:text-white rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-withe-100 sidebar-dropdown-toggle">
                    <i class='bx bx-list-ul mr-3 text-lg'></i>               
                    <span class="text-sm  ">Rendez-vous </span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="{{route("demande")}}" class="flex font-semibold items-center py-2 px-4 text-white gi hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                  
                    <i class='bx bx-user mr-3 text-lg'></i>                 
                    <span class="text-sm">Gestion des rendez-vous</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->