<x-layoutguru>
    <x-slot:role>{{ $role }}</x-slot:role>

    <div class="bg-white flex flex-col lg:w-auto w-full h-auto rounded-md shadow-sm p-4 gap-4 ">
        
        <div class="flex w-full justify-between mt-4">
            <h1 class="font-bold text-2xl pl-3 ">Dashboard</h1>
            <a href="{{ route('bukubatas.index') }}"
                class="flex items-center justify-center bg-red-500 text-white w-32 h-10 rounded-md hover:bg-red-600 transition duration-200 font-bold">Absen</a>
        </div>

        <div class=" overflow-auto ">
            <table id="myTable" class="rounded-md bg-merah-0 table w-full text-left">
                <thead class="text-white">
                    <tr>
                        <td class="py-0 border  font-bold p-4">No</td>
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


    </div>

</x-layoutguru>
