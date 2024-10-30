<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:role>{{ $role }}</x-slot:role>


    <div class="bg-white sm:w-451 w-full h-auto flex flex-col shadow-md mx-auto p-5 gap-4 justify-between rounded-md ">
        <h1 class="text-xl ml-3 font-bold">
            Nambah Siswa
        </h1>
        <div class="flex flex-col ">
            <form id="inputForm" action="{{ route('siswa.store') }}" method="POST">
                @csrf
                <div class="flex flex-col justify-between gap-2 ">

                <label for="jurusan_id">
                    <span class="block font-semibold text-slate-700">
                        Jurusan
                    </span>
                    <select name="jurusan_id" id="jurusan_id"
                        class="w-full h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none">Jenis
                        Kelamin
                        <option value="">Silakan Pilih Jurusan</option>
                        @foreach ($jurusans as $jurusan)
                            <option value="{{ $jurusan->id }}">{{ $jurusan->name }}</option>
                        @endforeach
                    </select>
                </label>

                <label for="sub_kelas">
                    <span class="block font-semibold text-slate-700">
                        Sub Kelas
                    </span>
                    <select name="sub_kelas" id="sub_kelas"
                        class="w-full h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none">Jenis
                        Kelamin
                        <option value="">Silakan Pilih Sub Kelas</option>
                        @foreach ($subKelasOptions as $subkelas)
                            <option value="{{ $subkelas }}">{{ $subkelas }}</option>
                        @endforeach
                    </select>
                </label>

                <label for="kelas">
                    <span class="block font-semibold text-slate-700">
                        kelas
                    </span>
                    <select name="kelas" id="kelas"
                        class="w-full h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none">Jenis
                        Kelamin
                        <option value="">Silakan Pilih Kelas</option>
                        @foreach ($kelasOptions as $kelas)
                            <option value="{{ $kelas }}">{{ $kelas }}</option>
                        @endforeach
                    </select>
                </label>

                <label for="nama">
                    <span class="block font-semibold text-slate-700">
                        Nama
                    </span>
                    <span class="block  text-xs text-red-600 mb-1">
                        *note: awalan huruf capital
                    </span>
                    <input
                        class="w-full h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                        type="text" placeholder="Nama..." value="{{ old('nama') }}" id="nama" name="nama"
                        required>
                </label>

                <label for="agama">
                    <span class="block font-semibold text-slate-700">
                        Agama
                    </span>
                    <select name="agama" id="agama"
                        class="w-full h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none">Jenis
                        Kelamin
                        <option value="">Silakan Pilih agama</option>
                        @foreach ($agamaOptions as $agama)
                            <option value="{{ $agama }}">{{ $agama }}</option>
                        @endforeach
                    </select>
                </label>

                <label for="gender">
                    <span class="block font-semibold text-slate-700">
                        Jenis Kelamin
                    </span>
                    <select name="gender" id="gender"
                        class="w-full h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none">Jenis
                        Kelamin
                        <option value="">Silakan Pilih Jenis Kelamin</option>
                        @foreach ($genderOptions as $genders)
                            <option value="{{ $genders }}">{{ $genders }}</option>
                        @endforeach
                    </select>
                </label>

                <label for="nisn">
                    <span class="block font-semibold  text-slate-700">
                        Nisn
                    </span>
                    <input
                        class="w-full h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                        type="number" placeholder="Nisn..." value="{{ old('nisn') }}" id="nisn" name="nisn">
                </label>

                <label for="tanggal_lahir">
                    <span class="block font-semibold text-slate-700">
                        Tanggal Lahir
                    </span>
                    <input
                        class="w-full h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                        type="date" value="{{ old('tanggal_lahir') }}" id="tanggal_lahir" name="tanggal_lahir">
                </label>
                </div>


                <div class="lg:w-full w-auto h-10 flex flex-row justify-between mt-4 gap-4">
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
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            document.getElementById('createProductButton').click();
        });
    </script>
</x-layout>
