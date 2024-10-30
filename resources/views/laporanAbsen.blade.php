<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:role>{{ $role }}</x-slot:role>


    <div class=" w-full h-full flex flex-col items-center mx-auto">
        <div class="max-w-3xl w-full flex flex-col p-6 rounded-lg bg-white shadow-md gap-6 mx-auto">
            <h3 class="font-bold text-2xl text-gray-800 text-center">Absen Siswa</h3>
            <form id="inputForm" class="flex flex-row justify-start gap-2" action="">

                <label class="flex flex-col w-full">
                    {{-- <span class="text-base font-semibold">Keterangan</span> --}}
                    <select name="keterangan" class=" p-2 border border-gray-300 rounded-md focus:outline-none">
                        <option value="">Keterangan</option>
                        @foreach ($keteranganOptions as $keterangan)
                            <option value="{{ $keterangan }}">{{ $keterangan }}</option>
                        @endforeach
                    </select>
                </label>
                
                <button type="submit"
                    class=" bg-merah-0 hover:bg-red-700 top-0 end-0 px-2.5 py-2 text-sm font-medium h-full w-11 rounded-lg flex flex-row items-center justify-center text-white ">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>

            </form>

            <a class="bg-merah-0 w-40 h-9 rounded-lg flex flex-row items-center justify-center text-white font-bold gap-2"
            href="{{ route('absensiswa.download_excel') }}">
            Download Excel
            </a>

            <div class="overflow-x-auto">
                <table id="myTable" class="table-auto w-full text-left border border-gray-300 mt-4">
                    <thead class="bg-red-600 text-white font-bold">
                        <tr>
                            <td class="py-2 border text-center">No</td>
                            <td class="py-2 border px-4">Nama Siswa</td>
                            <td class="py-2 border px-4">Keterangan</td>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-gray-700 font-semibold">
                        @foreach ($siswa as $isi)
                            <tr>
                                <td class="py-2 border text-center">{{ $loop->iteration }}</td>
                                <td class="py-2 border px-4">{{ $isi->namasiswa->nama }}</td>
                                <td class="py-2 border px-4">{{ $isi->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

<div class="flex justify-end">
            <a href="{{ route('laporan.index') }}" class="w-32 h-10 bg-white border border-red-600 text-red-600 text-center rounded-md hover:bg-red-600 hover:text-white transition duration-300 flex items-center justify-center">
                Kembali
            </a>
        </div>
        </div>
    </div>
</x-layout>
