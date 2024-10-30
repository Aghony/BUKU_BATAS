<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:role>{{ $role }}</x-slot:role>


    <div class="max-w-3xl w-full flex flex-col p-6 rounded-lg bg-white shadow-md gap-6 mx-auto">
        <h3 class="font-bold text-2xl text-gray-800 text-center">Batas Pelajaran</h3>
        
        <div class="overflow-x-auto">
            <table id="myTable" class="table-auto w-full text-left border border-gray-300 mt-4">
                <thead class="bg-red-600 text-white font-bold">
                    <tr>
                        <th class="py-3 px-4 border">Mata Pelajaran</th>
                        <th class="py-3 px-4 border">Mulai</th>
                        <th class="py-3 px-4 border">Selesai</th>
                        <th class="py-3 px-4 border">Judul</th>
                        <th class="py-3 px-4 border">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-700">
                    @foreach ($mapel as $isi)
                        <tr class="border-t">
                            <td class="py-2 px-4 border text-start">{{ $isi->mapel->name }}</td>
                            <td class="py-2 px-4 border text-start">{{ \Carbon\Carbon::parse($isi->mulai)->format('H:i A') }}</td>
                            <td class="py-2 px-4 border text-start">{{ \Carbon\Carbon::parse($isi->selesai)->format('H:i A') }}</td>
                            <td class="py-2 px-4 border text-start">{{ $isi->judul }}</td>
                            <td class="py-2 px-4 border text-start">{{ $isi->keterangan }}</td>
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
    
</x-layout>