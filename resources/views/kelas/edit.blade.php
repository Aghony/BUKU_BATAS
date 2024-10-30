<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:role>{{ $role }}</x-slot:role>
    <!-- content -->
    <!-- Add Akun Kelas -->
    {{-- @section('content') --}}
    <div class="flex flex-col sm:w-auto w-full h-auto bg-white shadow-md mx-auto p-5 rounded-md gap-4">

        <h1 class="text-xl ml-3 font-bold">
            Edit Akun Kelas
        </h1>
        @if ($errors->any())
        <div class="bg-red-600 text-white text-center p-2 rounded-md border overflow-auto">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="px-4">
            <form id="inputForm" action="{{ route('kelas.update', $kela->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="name"  class="flex flex-col gap-1">
                    <p>{{ $kela->name }}</p>
                    <span class=" font-semibold mb-1 text-slate-700">Name</span>
                    <input class="sm:w-410 w-auto h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                        type="text" id="name" name="name" placeholder="Name..."
                        value="{{ $kela->user->name }}" required>
                </label>

                <label for="username"  class="flex flex-col gap-1">
                    <span class=" font-semibold mb-1 mt-3 text-slate-700">Username</span>
                    <input class="sm:w-410 w-auto h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                        type="text" id="username" name="username" placeholder="Username..."
                        value="{{ old('username', $kela->user->username) }}" required>
                </label>

                <label for="email"  class="flex flex-col gap-1">
                    <span class=" font-semibold mb-1 mt-3 text-slate-700">Email (Tidak wajib di isi) </span>
                    <input class="sm:w-410 w-auto h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                        value="{{ old('email', $kela->user->email) }}" type="email" id="email" name="email" placeholder="Email..."
                        >
                </label>

                <label for="password"  class="flex flex-col gap-1">
                    <span class=" font-semibold mb-1 mt-3 text-slate-700">Password (Kosongkan jika tidak diubah)</span>
                    <input  class="sm:w-410 w-auto h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                        type="password" id="password" name="password" placeholder="Password...">
                </label>

                <label for="jurusan_id" class="flex flex-col gap-1">
                    <span class=" font-semibold mb-1 text-slate-700">
                        Jurusan
                    </span>
                    <select name="jurusan_id" id="jurusan_id"  class="sm:w-410 w-auto h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none">Jenis Kelamin
                        <option value="">Pilih Jurusan</option>
                    @foreach ($jurusans as $jurusan)
                        <option value="{{ $jurusan->id }}"{{ $data->jurusan_id == $jurusan->id ? 'selected' : '' }}>{{ $jurusan->name }}</option>
                    @endforeach
                </select>
                </label>

                <div class="flex flex-row items-end sm:gap-6 gap-2">
                    <label for="celas" class="flex flex-col w-full">
                        <span class="block font-semibold mb-1 mt-3 text-slate-700">
                            Kelas
                        </span>
                        <select name="celas" id="celas" class="sm:w-49 w-full h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none">Jenis Kelamin
                            <option value="">Pilih Kelas</option>
                        @foreach ($kelasOptions as $kelas)
                            <option value="{{ $kelas }}"{{ $data->celas == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                        @endforeach
                    </select>
                    </label>

                    <label for="sub_kelas" class="flex flex-col w-full">
                        <span class="block font-semibold mb-1 mt-3 text-slate-700">
                            Sub Kelas
                        </span>
                        <select name="sub_kelas" id="sub_kelas" class="sm:w-49 w-full h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none">Jenis Kelamin
                            <option value="">Pilih sub Kelas</option>
                        @foreach ($subKelasOptions as $subkelas)
                            <option value="{{ $subkelas }}"{{ $data->sub_kelas == $subkelas ? 'selected' : '' }}>{{ $subkelas }}</option>
                        @endforeach
                    </select>
                    </label>
                </div>




                <div class="lg:w-full w-auto h-10 flex flex-row justify-between mt-4 gap-4">

                    <a href="{{ route('kelas.index') }}"
                    class="w-32 h-full bg-white border border-merah-0 text-center rounded text-merah-0 text-xl flex flex-col justify-center">
                    Kembali
                </a>
                    <button type="submit" class="w-32 h-full bg-merah-0 text-center rounded text-white text-xl">
                        Submit
                    </button>
                </div>

            </form> {{--  --}}
        </div>
    </div>


</x-layout>