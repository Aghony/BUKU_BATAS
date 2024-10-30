<!-- header -->
<header class="px-5 py-2 w-full h-16 bg-white drop-shadow-md flex place-content-between">

    <div class="flex flex-row my-auto items-center">
        <div class="lg:hidden active:bg-gray-300 h-7 w-7 flex flex-row items-center justify-center rounded-md ">
            <div class="bg-navmobile h-5 w-5" id="nav-btn"></div>
        </div>
        <h1 class="ml-1 font-bold text-2xl ">
            {{ $title }}
        </h1>
    </div>

    <button id="dropdownButton2" class="flex flex-row text-end my-auto items-center gap-2 bg-red-">
        <div class="flex flex-col">
            <p class="font-bold ">{{ Auth::user()->name }}</p>
            <p class="font-medium text-slate-500">{{ Auth::user()->roles }}</p>
        </div>
        <div class="w-6 h-6 bg-panahbawah"></div>
    </button>

    <div id="dropdownMenu2" class="w-74 h-15 bg-white rounded-md absolute top-20 right-7 hidden py-3 px-3">
        <a href="{{ route('profile.edit', Auth::user()->id) }}">
            <button class="w-full h-10 text-lg  text-black  flex flex-row items-center">
                <div class="ml-2 w-6 h-6 bg-profilehitam">
                </div>
                <h4 class="ml-2 text-start">
                    Profile
                </h4>
            </button>
        </a>
    </div>
    
</header>

<script></script>
