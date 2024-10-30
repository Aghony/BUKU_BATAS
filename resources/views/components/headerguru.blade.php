<header class="px-5 py-2 w-full h-18 bg-white drop-shadow-md flex place-content-end ">
    <button id="dropdownButton" class="flex flex-row text-end my-auto items-center gap-2">
        <div class="flex flex-col">
            <p class="font-bold ">{{ Auth::user()->name }}</p>
            <p class="font-bold text-slate-500">{{ Auth::user()->roles }}</p>
        </div>
        <div class="w-6 h-6 bg-panahbawah"></div>
    </button>
    <div id="dropdownMenu" class="w-74 h-15 bg-white rounded-md absolute top-20 hidden py-3 px-3">
        <a href="/logout">
            <button class="w-full h-10 text-lg  text-black  flex flex-row items-center">
                <div class="ml-2 w-6 h-6 bg-logouthitam">

                </div>
                <h4 class="ml-2 text-start">
                    Log Out
                </h4>
            </button>
        </a>
    </div>
</header>