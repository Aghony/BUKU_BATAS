<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:role>{{ $role }}</x-slot:role>

    <div class="bg-white sm:w-451 w-full h-auto flex flex-col shadow-md mx-auto p-5 gap-4 justify-between rounded-md ">

        <h1 class="text-xl font-bold mb-3">
            Upload Nama Siswa
        </h1>

        <div class="flex flex-col gap-4">

            <div>
                <a href="{{ url('download-template-excel') }}"
                    class=" w-full h-10 flex px-2 bg-merah-0 items-center justify-center text-white text-lg rounded">
                    Download Template Excel
                </a>
            </div>

            <form action="{{ route('siswa.import.excel') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col gap-4">
                @csrf
                
                <label for="ImporFilel">
                    <span class="block font-semibold mb-1 text-slate-700">
                        Upload Excel
                    </span>
                    <input class=" w-full border border-slate-700 rounded-md focus:outline-none" type="file"
                        value="file" name="file" accept=".xls,.xlsx">
                </label>
                {{-- </div> --}}

                <div class="lg:w-full w-auto h-10 flex flex-row justify-between gap-4">
                    <a href="{{ route('siswa.index') }}"
                        class="w-32 h-full bg-white border border-merah-0 text-center rounded text-merah-0 text-xl flex flex-col justify-center">
                        Kembali
                    </a>
                    <button type="submit" class="w-32 h-full bg-merah-0 text-center rounded text-white text-xl">
                        Submit
                    </button>
                </div>


            </form>

        </div>

    </div>

</x-layout>
