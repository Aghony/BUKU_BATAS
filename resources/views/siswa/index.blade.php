<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:role>{{ $role }}</x-slot:role>

    <!-- content -->
    <!-- Add Nama siswa -->
    <div class="bg-white lg:w-auto w-full h-auto flex flex-col p-5 gap-4 shadow-md rounded-md mx-auto">
        <h1 class="text-xl font-bold">
            Nama Siswa
        </h1>

        <div class="flex lg:flex-row flex-col gap-4 w-full h-auto">
            <div class="flex  flex-col gap-4 w-full">

                <div class="flex md:flex-row flex-col gap-4 md:w-auto w-full ">

                    <div class="flex mm:flex-row flex-col gap-4 md:w-auto w-full ">
                        <a href="{{ route('siswa.create') }}"
                            class="bg-merah-0 hover:bg-red-700 w-auto h-9 px-3 rounded-md flex flex-row items-center justify-center text-white font-medium gap-2">
                            <h1>
                                Add
                            </h1>
                            <h1 class=" text-2xl">
                                +
                            </h1>
                        </a>

                        {{-- <a class="bg-merah-0 w-40 h-9 rounded-lg flex flex-row items-center justify-center text-white font-bold gap-2"
                        href="{{ url('siswa/export/excel') }}">
                        Download Excel
                        </a> --}}

                        <a href="{{ route('siswa.import') }}"
                            class="bg-merah-0 hover:bg-red-700 w-auto  h-9 px-3 rounded-md flex flex-row items-center justify-center text-white font-medium gap-2">
                            Upload Nama Siswa
                        </a>
                    </div>

                    @if (session('success'))
                    <div class="bg-green-500 md:w-auto w-full text-white py-1 px-3 rounded-md text-center">
                        {{ session('success') }}
                        {{-- tes tes tes tes tes tes tes tes tes tes tes --}}
                    </div>
                    @endif

                </div>

                <form class="flex lg:flex-row flex-col gap-2 w-full ">

                    <!-- Dropdown untuk kelas, jurusan, agama ,dan jenis kelamin -->
                    <div class="flex md:flex-row flex-col gap-2 justify-center ">

                        <div class="flex mm:flex-row flex-col gap-2">
                            <div>
                                <div class="md:w-auto w-full ">
                                    <input id="nisn"
                                        class="bg-white text-sm text-slate-600 px-2 py-2 block  md:w-32 w-full h-9 rounded-md focus:outline-none border-slate-400"
                                        placeholder="nisn..." type="number" id="nisn" name="nisn"
                                        autocomplete="off">
                                </div>
                            </div>

                            <div class="flex flex-row gap-2 md:w-auto w-full">
                                <select name="kelas"
                                    class="md:w-auto w-full bg-white text-sm text-slate-600 px-2 py-1.5 rounded-md border-slate-400">
                                    <option value="">Kelas</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                    <!-- Tambahkan opsi kelas lainnya -->
                                </select>

                                <select name="jurusan"
                                    class="md:w-auto w-full bg-white text-sm text-slate-600 px-2 py-1.5 rounded-md border-slate-400">
                                    <option value="">Jurusan</option>
                                    @foreach ($jurusans as $juru)
                                        <option value="{{ $juru->id }}">{{ $juru->nick }}</option>
                                    @endforeach
                                    <!-- Tambahkan opsi jurusan lainnya -->
                                </select>
                            </div>
                        </div>

                        <div class="flex mm:flex-row flex-col gap-2">
                            <select name="agama"
                                class="md:w-auto w-full bg-white text-sm text-slate-600 px-2 py-1.5 rounded-md border-slate-400">
                                <option value="">Agama</option>
                                @foreach ($agamaOptions as $agama)
                                    <option value="{{ $agama }}">{{ $agama }}</option>
                                @endforeach
                                <!-- Tambahkan opsi agama lainnya -->
                            </select>

                            <select name="gender"
                                class="md:w-auto w-full bg-white text-sm text-slate-600 px-2 py-1.5 rounded-md border-slate-400">
                                <option value="">Jenis kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                                <!-- Tambahkan opsi gender lainnya -->
                            </select>
                        </div>

                    </div>

                    <div class="flex flex-row gap-2 w-full ">
                        <input id="search"
                            class="bg-white text-sm text-slate-600 px-2 py-2 block  w-full h-9 rounded-md focus:outline-none border-slate-400"
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
                    </div>

                </form>

            </div>


            {{-- <form id="inputForm" action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <button type="submitx" onclick="inputFile(event)" class="bg-merah-0 w-24 h-9 rounded-lg flex flex-row items-center justify-center text-white font-bold gap-2">
                Upload
            </button>
        </form>
        --}}
            {{-- <button onclick="inputFile(event)" class="bg-merah-0 w-24 h-9 rounded-lg flex flex-row items-center justify-center text-white font-bold gap-2">
                <h4>
                    import
                </h4>
            </button> --}}


        </div>

        {{-- <div> --}}
        <div class="overflow-auto ">
            <table id="dataTable" class="table-auto w-full text-left">
                <thead class=" bg-[#E20225] text-[#e5e7eb] font-bold">
                    <tr>

                        <td class="py-0 border  font-bold p-4">Nisn</td>
                        <td class="py-0 border  font-bold p-4">Nama</td>
                        <td class="py-0 border  font-bold p-4">Kelas</td>
                        <td class="py-0 border  font-bold p-4">Jurusan</td>
                        <td class="py-0 border  font-bold p-4">Sub kelas</td>
                        <td class="py-0 border  font-bold p-4">Agama</td>
                        <td class="py-0 border  font-bold p-4">Jenis Kelamin</td>
                        <td class="py-0 border  font-bold p-4">Tanggal Lahir</td>
                        <td class="py-0 border text-center font-bold p-4">Edit</td>
                        <td class="py-0 border text-center font-bold p-4">Hapus</td>

                    </tr>
                </thead>
                <tbody class="bg-white text-[#6b7280] font-semibold">
                    @foreach ($siswas as $siswa)
                        <tr class="py-1">
                            <td class="py-0 border   p-4">{{ $siswa->nisn }}</td>
                            <td class="py-0 border   p-4">{{ $siswa->nama }}</td>
                            <td class="py-0 border   p-4">{{ $siswa->kelas }}</td>
                            <td class="py-0 border   p-4">{{ $siswa->jurusan->nick }}</td>
                            <td class="py-0 border   p-4">{{ $siswa->sub_kelas }}</td>
                            <td class="py-0 border   p-4">{{ $siswa->agama }}</td>
                            <td class="py-0 border   p-4">{{ $siswa->gender }}</td>
                            <td class="py-0 border   p-4">
                                {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('j F Y') }}</td>
                            <td class="py-1 border text-center font-semibold p-4"><a
                                    href="{{ route('siswa.edit', $siswa->id) }}" class="border border-gray-500 hover:bg-gray-500 rounded p-2 text-gray-500 hover:text-white   ">Edit</a></td>
                            <td class="py-1 border text-center items-center p-4 w-5 h-5">
                                <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="deleteButton text-xl font-bold text-center border border-merah-0 hover:bg-merah-0 rounded px-2 py-1 text-merah-0 hover:text-white"
                                        onclick="hapus(event, this.form)">
                                        X
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <hr>
            <br>

            {{ $siswas->links() }}
        </div>
        {{-- </div> --}}
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function hapus(event, form) {
            event.preventDefault();

            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Anda tidak dapat mengembalikan ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#1F1F1F",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Mengirim formulir setelah konfirmasi
                    Swal.fire(
                        'Terhapus!',
                        'Siswa telah dihapus.',
                        'success'
                    );
                }
            });
        }
    </script>


</x-layout>
