<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:role>{{ $role }}</x-slot:role>

    <div class="lg:w-auto w-full h-full flex flex-col items-center mx-auto ">
        <div class="bg-white flex flex-col lg:w-auto w-full h-auto rounded-md shadow-sm p-4 gap-4 ">
            <h3 class="font-bold text-2xl pl-3 ">Laporan</h3>
            <form id="inputForm" class="flex flex-col justify-between gap-3 " action="{{ route('laporan.index') }}"
                method="GET">


                <div class=" flex flex-row gap-1 justify-between">

                    <div class="flex flex-row w-auto h-auto ">
                        <a href="{{ route('laporan.download_excel', ['start_date' => request()->start_date, 'end_date' => request()->end_date]) }}"
                            class="px-2.5 py-1.5 rounded-md text-white bg-merah-0 font-medium text-center"> Download
                            Excel</a>
                    </div>

                    {{-- <div id="date-range-picker" date-rangepicker class="flex items-center gap-2"> --}}
                    {{-- <div class="relative">
                            <input id="datepicker-range-start" name="start_date" type="date"
                                value="{{ now()->format('Y-m-d') }}"
                                class="flex justify-center items-center bg-white border border-slate-400 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 w-36 h-full">
                        </div>
                        <span class="mx-1 text-gray-500">to</span>
                        <div class="relative">
                            <input id="datepicker-range-start" name="end_date" type="date"
                                value="{{ now()->format('Y-m-d') }}"
                                class="flex justify-center items-center bg-white border border-slate-400 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 w-36 h-full">
                        </div> --}}
                    {{-- <button type="submit" class="w-20 h-9 rounded-md bg-merah-0 text-white font-bold ">
                            filter
                        </button> --}}
                    {{-- </div> --}}

                </div>


                <div class="flex md:flex-row flex-col w-full gap-2 ">

                    <div id="date-range-picker" date-rangepicker
                        class="flex mm:flex-row flex-col items-center gap-2 ">
                        <div class="mm:w-auto w-full">
                            <input id="datepicker-range-start" name="start_date" type="date"
                                value="{{ now()->format('Y-m-d') }}"
                                class="flex justify-center items-center bg-white border border-slate-400 text-slate-600 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 mm:w-36 w-full h-9">
                        </div>
                        <span class="mx-1 text-gray-500">to</span>
                        <div class="mm:w-auto w-full">
                            <input id="datepicker-range-start" name="end_date" type="date"
                                value="{{ now()->format('Y-m-d') }}"
                                class="flex justify-center items-center bg-white border border-slate-400 text-slate-600 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 mm:w-36 w-full h-9">
                        </div>
                    </div>


                    <!-- Dropdown untuk kelas, jurusan, dan sub kelas -->
                    <div class="flex mm:flex-row flex-col gap-2 ">

                        <select name="kelas" class="md:w-auto w-full  bg-white text-sm text-slate-600 px-2 py-1.5 rounded-md border-slate-400">
                            <option value="">Kelas</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                            <!-- Tambahkan opsi kelas lainnya -->
                        </select>

                        <select name="jurusan" class="md:w-auto w-full  bg-white text-sm text-slate-600 px-2 py-1.5 rounded-md border-slate-400">
                            <option value="">Jurusan</option>
                            @foreach ($jurusan as $juru)
                                <option value="{{ $juru->id }}">{{ $juru->nick }}</option>
                            @endforeach
                            <!-- Tambahkan opsi jurusan lainnya -->
                        </select>

                        <select name="sub_kelas" class="md:w-auto w-full  bg-white text-sm text-slate-600 px-2 py-1.5 rounded-md border-slate-400">
                            <option value="">Sub Kelas</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <!-- Tambahkan opsi sub kelas lainnya -->
                        </select>

                    </div>


                    <label class="flex flex-row w-full gap-2 ">
                        <input id="search"
                            class="bg-white text-sm text-slate-600 px-2 py-2 block   w-full h-9 rounded-md focus:outline-none border-slate-400"
                            placeholder="pencarian nama..." type="search" id="search" name="search"
                            autocomplete="off">
                        <button type="submit"
                            class="bg-merah-0 hover:bg-red-700 top-0 end-0 px-2.5 py-2 text-sm font-medium h-9 rounded-md flex flex-row items-center justify-center text-white ">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </label>

                </div>


            </form>
            <div class=" overflow-auto ">
                <table id="myTable" class="table w-full text-left">
                    <thead class=" bg-[#E20225] text-[#e5e7eb]">
                        <tr>
                            <td class="py-0 border  font-bold p-4">No.</td>
                            <td class="py-0 border  font-bold p-4">Nama Guru</td>
                            <td class="py-0 border  font-bold p-4">Mapel</td>
                            <td class="py-0 border  font-bold p-4">Absen Guru</td>
                            <td class="py-0 border  font-bold p-4">Kelas</td>
                            <td class="py-0 border  font-bold p-4">Jurusan</td>
                            <td class="py-0 border  font-bold p-4">Sub Kelas</td>
                            <td class="py-0 border  font-bold p-4">Absen Siswa</td>
                            <td class="py-0 border  font-bold p-4">Batas Pelajaran</td>
                            <td class="py-0 border  font-bold p-4">Tanggal / Waktu</td>

                        </tr>
                    </thead>
                    <tbody class="bg-white text-gray-500">
                        @foreach ($bukubatas as $batas)
                            <tr class="py-1">
                                <td class="py-1 border text-start font-semibold p-4">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="py-1 border text-start font-semibold p-4">
                                    @if ($batas->guru == null)
                                        -
                                    @else
                                        {{ $batas->namaguru->name }}
                                    @endif
                                </td>
                                <td class="py-1 border text-start font-semibold p-4">{{ $batas->mapel->nick }}</td>
                                <td class="py-1 border text-start font-semibold p-4">
                                    @if ($batas->file_path == null)
                                        Tidak Hadir
                                    @else
                                        <img class="w-52" src="storage/{{ $batas->file_path }}" alt="nama">
                                    @endif
                                </td>
                                <td class="py-1 border text-start font-semibold p-4">{{ $batas->kelas }}</td>
                                <td class="py-1 border text-start font-semibold p-4">{{ $batas->jurusan->nick }}</td>
                                <td class="py-1 border text-start font-semibold p-4">{{ $batas->sub_kelas }}</td>
                                <td class="py-1 border text-center font-semibold p-4 text-blue-700"><a
                                        href="{{ route('laporansiswa.index', ['data' => $batas->id]) }}"
                                        class="border border-blue-700 rounded py-1 px-2 hover:bg-blue-700 hover:text-white">Absen
                                    </a></td>
                                <td class="py-1 border text-center font-semibold p-4 text-blue-700 "><a
                                        href="{{ route('laporanmapel.index', ['data' => $batas->id]) }}"
                                        class="border border-blue-700 rounded py-1 px-2 hover:bg-blue-700 hover:text-white">
                                        Pelajaran</a></td>
                                <td class="py-1 border text-start font-semibold p-4">
                                    {{ \Carbon\Carbon::parse($batas->created_at)->format('j F Y / H:i A') }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            {{-- <br> --}}
            <hr class="my-5">
            {{-- <br> --}}
            {{ $bukubatas->links() }}
        </div>
    </div>
</x-layout>
