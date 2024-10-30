<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:role>{{ $role }}</x-slot:role>
    {{-- {{ dd($user) }} --}}
    <!-- content 1 -->

    <div class="flex md:flex-row flex-wrap xl:justify-between justify-center mb-12 gap-3">
        <!-- 1 -->
        <a href="/guru" class="w-28 h-28 p-2 bg-white shadow-lg rounded-md flex flex-row">
            <div class="flex flex-col w-full h-full items-center justify-center ">
                <h1 class="font-bold text-4xl">
                    {{ count($gurus) }}
                </h1>
                <p class="font-semibold text-sm text-slate-500">
                    Total Guru
                </p>
            </div>
        </a>
        <!-- 2 -->
        <a href="/kelas" class="w-25 h-28 p-2 bg-white shadow-lg rounded-md flex flex-row ">
            <div class="flex flex-col w-full h-full items-center justify-center">
                <h1 class="font-bold text-4xl">
                    {{ count($kelas) }}
                </h1>
                <p class="font-semibold text-sm text-slate-500">
                    Total Kelas
                </p>
            </div>
        </a>
        <!-- 3 -->
        <a href="/siswa" class="w-28 h-28 p-2 bg-white shadow-lg rounded-md flex flex-row ">
            <div class="flex flex-col w-full h-full items-center justify-center">
                <h1 class="font-bold text-4xl">
                    {{ count($siswa) }}
                </h1>
                <p class="font-semibold text-sm text-slate-500">
                    Total Siswa
                </p>
            </div>
        </a>
        <!-- 4 -->
        <a href="/matapelajaran" class="w-28 h-28 p-2 bg-white shadow-lg rounded-md flex flex-row ">
            <div class="flex flex-col w-full h-full items-center justify-center">
                <h1 class="font-bold text-4xl">
                    {{ count($mapel) }}
                </h1>
                <p class="font-semibold text-sm text-slate-500">
                    Total Mapel
                </p>
            </div>
        </a>
        <!-- 5 -->
        <a href="/jurusan" class="w-28 h-28 p-2 bg-white shadow-lg rounded-md flex flex-row ">
            <div class="flex flex-col w-full h-full items-center justify-center">
                <h1 class="font-bold text-4xl">
                    {{ count($jurusan) }}
                </h1>
                <p class="font-semibold text-sm text-slate-500">
                    Total Jurusan
                </p>
            </div>
        </a>
        <!-- 6 -->
        <div class="w-49 h-28 p-2 bg-white shadow-lg rounded-md flex flex-row ">
            <a href="/laporan" class="flex flex-col w-1/2 h-full items-center justify-center">
                <h1 class="font-bold text-4xl">
                    {{ count($laporan) }}
                </h1>
                <p class="font-semibold text-xs text-slate-500">
                    Laporan Masuk
                </p>
            </a>
            <div class="flex flex-col w-1/2 h-full pl-3">
                <div class="h-1/2">
                    <h1 class="font-bold text-2xl">{{ $hadir }}</h1>
                    <p class=" text-xs text-slate-500">Guru</p>
                </div>
                <div class="h-1/2">
                    <h1 class="font-bold text-2xl">{{ $tidakHadir }}</h1>
                    <p class=" text-xs text-slate-500">Kelas</p>
                </div>
            </div>
        </div>
        <!-- 7 -->
        <div class="w-49 h-28 p-2 bg-white shadow-lg rounded-md flex flex-row ">
            <div class="flex flex-col w-1/2 h-full items-center justify-center">
                <h1 class="font-bold text-4xl">
                    {{ $tercapai }}
                </h1>
                <p class="font-semibold ml-2 text-sm text-slate-500">
                    Batas Tercapai
                </p>
            </div>
            <div class="flex flex-col w-1/2 h-full items-center justify-center">
                <h1 class="font-bold text-4xl">
                    {{ $tidakTercapai }}
                </h1>
                <p class="font-semibold ml-2 text-sm text-slate-500">
                    Tidak Tercapai
                </p>
            </div>

        </div>
    </div>



    <div class="flex sm:flex-row flex-col w-full h-full gap-5 mb-5 ">

        <div class=" sm:w-1/3 w-full h-60 bg-white rounded-md px-3 pb-2 pt-1">
            <span class="font-bold ml-2 text-xl">User</span>
            <div class="w-full h-48 bg-slate-200 rounded-md py-3 px-2 overflow-auto no-scrollbar">

                @foreach ($onlineUsers as $user)
                    <div class="bg-white w-full h-auto p-2 shadow-md flex flex-row mb-2 px-3 rounded-md">
                        <div class="flex flex-row w-full h-full justify-between items-center">
                            <span class=" font-bold text-slate-700 justify-between">{{ $user->name }} </span>
                            <span class="font-bold text-white bg-green-500 px-1 rounded-md ">online</span>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

        <a href="/laporan" class="sm:w-2/3 w-full h-60  bg-white rounded-md px-3 pb-2 pt-1 ">
            <span class="font-bold ml-2 mb-4 text-xl">Laporan</span>
            <div class="w-full h-48 bg-slate-200 rounded-md py-3 px-2 overflow-auto no-scrollbar">
                @foreach ($laporan as $isi)
                    <div
                        class="bg-white w-full h-auto p-2 shadow-md flex flex-row items-center justify-between mb-2 px-3 gap-4 rounded-md">
                        <span class=" font-bold text-slate-700">
                            {{ $isi->namaguru->name }}
                        </span>
    
                        <span class=" font-bold  text-slate-700">
                            {{ \Carbon\Carbon::parse($isi->created_at)->format('j F Y / H:i A') }}
                        </span>
                    </div>
                @endforeach
            </div>
        </a>
    </div>

    <div class="flex md:flex-row flex-col w-full h-full gap-5 ">
        <a href="/jurusan" class="w-full h-60 bg-white rounded-md px-3 pb-2 pt-1 ">
            <span class="font-bold ml-2 mb-4 text-xl">Jurusan</span>
            <div class="w-full h-48 bg-slate-200 rounded-md py-3 px-2 overflow-auto no-scrollbar">
                @foreach ($jurusan as $isi)
                    <div
                        class="bg-white w-full h-auto p-2 shadow-md flex flex-row items-center justify-between mb-2 px-3 rounded-md">
                        <span class=" font-bold text-slate-700">
                            {{ $isi->name }}

                        </span>
                        <span class=" font-bold  text-slate-700">
                        </span>
                    </div>
                @endforeach
            </div>
        </a>

        <a href="/matapelajaran" class="w-full h-60 bg-white rounded-md px-3 pb-2 pt-1">
            <span class="font-bold ml-2 mb-4 text-xl">Matapelajaran</span>
            <div class="w-full h-48 bg-slate-200 rounded-md py-3 px-2 overflow-auto no-scrollbar">
                @foreach ($mapel as $isi)
                    <div
                        class="bg-white w-full h-auto p-2 shadow-md flex flex-row items-center justify-between mb-2 px-3 rounded-md">
                        <span class=" font-bold text-slate-700">
                            {{ $isi->name }}

                        </span>
                        <span class=" font-bold  text-slate-700">

                        </span>
                    </div>
                @endforeach
            </div>
        </a>
    </div>


</x-layout>
