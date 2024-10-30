<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:role>{{ $role }}</x-slot:role>

    {{-- <div class="px-10 pt-6 flex flex-col items-center overflow-y-scroll "> --}}
        <div class="w-full h-full flex justify-center">
            <div class="flex flex-row bg-white w-570 h-18 rounded-md font-bold justify-between items-center px-4 text-2xl mb-10">
                <a href="{{ route('data.create') }}" class="flex items-center font-semibold justify-center w-136 h-11 bg-merah-0 text-white rounded-md text-xl font-inter">
                    Kembali
                </a>
                Add Batas Pelajaran
                <a href="#" class="flex items-center font-semibold justify-center w-136 h-11 bg-merah-0 text-white rounded-md text-xl font-inter">
                    Submit
                </a>
            </div>
        </div>
        <div class="my-6 w-928 max-h-max flex flex-wrap justify-between">
            <div class="w-451 h-full bg-white rounded-md p-6 flex flex-col mb-5">
                <div class="w-100 h-10 mb-5 text-white font-semibold bg-merah-0 flex items-center justify-center rounded-md">
                    SENIN
                </div>
                <form id="inputForm" action="" class="flex flex-row items-end gap-1 mb-4">
                    <label for="text" class="flex flex-col">
                        <span class="text-xs text-start mb-1">
                            Matapelajaran
                        </span>
                        <input id="subjectInput1" type="text" class="w-119 h-9 rounded-md focus:outline-none px-2 py-2 text-xs border border-slate-500" placeholder="Matapelajaran">
                    </label>
                    <label for="text" class="flex flex-col">
                        <span class="text-xs text-start mb-1">
                            Mulai
                        </span>
                        <input id="subjectInput2" type="time" class="w-20 h-9 rounded-md focus:outline-none px-2 py-2 text-xs border border-slate-500" placeholder="Mulai">
                    </label>
                    <label for="text" class="flex flex-col">
                        <span class="text-xs text-start mb-1">
                            Selesai
                        </span>
                        <input id="subjectInput3" type="time" class="w-20 h-9 rounded-md focus:outline-none px-2 py-2 text-xs border border-slate-500" placeholder="Selesai">
                    </label>
                    <button id="addRowButton" class="w-9 h-9 flex items-center ml-6 justify-center border border-slate-500 text-2xl font-semibold rounded-md">
                        +
                    </button>
                </form>
                <div class="relative overflow-hidden text-xs ">
                    <table id="dataTable" class="table-auto w-full text-left">
                        <thead class=" bg-[#E20225] text-[#e5e7eb]">
                            <tr>
                                <td class="py-1 border   p-4" >Matapelajaran</td>
                                <td class="py-1 border   p-4" >Mulai</td>
                                <td class="py-1 border   p-4" >Selesai</td>
                                <td class="py-1 border   p-4" >Hapus</td>
                            </tr>
                        </thead>
                        <tbody class="bg-white text-gray-500" >
                            <tr class="py-1">
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>

     {{-- </div> --}}
</x-layout>