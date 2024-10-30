<x-layoutguru>
    <x-slot:role>{{ $role }}</x-slot:role>
    {{-- content --}}

    <div class="max-w-3xl w-full h-auto flex flex-col gap-5 bg-white rounded-lg shadow-md p-5">
        <h1 class="font-bold text-2xl text-gray-800 text-center">Absensi Siswa</h1>

        <form action="{{ route('absensisiswa.store') }}" method="POST" class="flex flex-col gap-5">
            @csrf

            <table class="w-full text-left border border-gray-300">
                <thead class="bg-red-600 text-white font-bold">
                    <tr>
                        <td class="py-2 border text-center">No</td>
                        <td class="py-2 border px-4">Nama Siswa</td>
                        <td class="py-2 border text-center">Keterangan</td>
                    </tr>
                </thead>
                <tbody class="bg-white text-gray-700 font-semibold">
                    @foreach ($siswa as $val)
                        <tr>
                            <td class="py-2 border text-center">{{ $loop->iteration }}</td>
                            <td class="py-2 border px-4">{{ $val->nama }}</td>
                            <td class="py-2 border text-center px-2">
                                <select name="keterangan[{{ $val->id }}]" id="keterangan"
                                    class="border border-gray-300 rounded-md w-full h-full px-2 focus:outline-none ">
                                    @foreach ($keteranganOptions as $ket)
                                        <option value="{{ $ket }}">{{ $ket }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="flex justify-between mt-4">
                <a href="{{ route('bukubatas.edit', $bukubatas->id) }}">
                    <div
                        class="w-24 h-10 bg-white border border-red-500 text-center rounded-md text-red-500 flex items-center justify-center hover:bg-red-500 hover:text-white transition duration-200">
                        Kembali</div>
                </a>
                <button type="submit"
                    class="w-24 h-10 bg-red-500 text-center rounded-md text-white hover:bg-red-600 transition duration-200">Submit</button>
            </div>
        </form>
    </div>

</x-layoutguru>
