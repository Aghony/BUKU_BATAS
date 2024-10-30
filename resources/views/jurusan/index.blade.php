<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:role>{{ $role }}</x-slot:role>

    <!-- content -->
    <!-- Data -->
    <div class="bg-white w-full lg:w-850 h-auto flex flex-col p-5 gap-4 shadow-md rounded-md mx-auto">
        <h1 class="text-xl ml-3 font-bold">
            Jurusan
        </h1>
        <div class="w-full h-full flex sm:flex-row flex-col gap-5">
            <form class="flex flex-row gap-2">
                <input id="search"
                    class="bg-white text-sm text-slate-600 px-2 py-2 block  sm:w-72 w-full h-9 rounded-md focus:outline-none border-slate-400"
                    placeholder="pencarian nama..." type="search" id="search" name="search" autocomplete="off">
                <button type="submit"
                    class="bg-merah-0 hover:bg-red-700 top-0 end-0 px-2.5 py-2 text-sm font-medium h-9 rounded-md flex flex-row items-center justify-center text-white ">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
            <a href="{{ route('jurusan.create') }}"
                class="bg-merah-0 hover:bg-red-700 w-auto h-9 px-3 rounded-md flex flex-row items-center justify-center text-white font-medium gap-2">
                <h1>
                    Add
                </h1>
                <h1 class=" text-2xl">
                    +
                </h1>
            </a>
            @if (session('success'))
                <div class="bg-green-500 text-white py-1 px-3 rounded-md text-center ">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="w-full h-full">
            <div class="overflow-auto">
                <table id="myTable" class="table w-full text-left">
                    <thead class=" bg-[#E20225] text-[#e5e7eb]">
                        <tr>
                            <td class="py-0 border  font-bold p-4">No</td>
                            <td class="py-0 border  font-bold p-4">Jurusan</td>
                            <td class="py-0 border  font-bold p-4">Singkatan</td>
                            <td class="py-0 border  font-bold p-4">Id</td>
                            <td class="py-0 border text-center  font-bold p-4">Edit</td>
                            <td class="py-0 border text-center font-bold p-4">Hapus</td>

                        </tr>
                    </thead>
                    <tbody class="bg-white text-gray-500">
                        @foreach ($jurusan as $jurusan2)
                            <tr class="py-1">
                                <td class="py-1 border text-start font-semibold p-4">{{ $loop->iteration }}</td>
                                <td class="py-1 border text-start font-semibold p-4">{{ $jurusan2->name }}</td>
                                <td class="py-1 border text-start font-semibold p-4">{{ $jurusan2->nick }}</td>
                                <td class="py-1 border text-start font-semibold p-4">{{ $jurusan2->id }}</td>
                                <td class="py-1 border text-center font-semibold p-4"><a
                                        href="{{ route('jurusan.edit', $jurusan2->id) }}" class="border border-gray-500 hover:bg-gray-500 rounded p-2 text-gray-500 hover:text-white   ">Edit</a></td>
                                <td class="py-1 border text-center items-center p-4 w-5 h-5">
                                    <form action="{{ route('jurusan.destroy', $jurusan2->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="deleteButton text-2xl font-bold text-center border border-merah-0 hover:bg-merah-0 rounded px-2 py-1 text-merah-0 hover:text-white" onclick="hapus(event, this.form)">
                                            X
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
                        'Data Jurusan telah dihapus.',
                        'success'
                    );
                }
            });
        }
    </script>




</x-layout>
