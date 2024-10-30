<x-layoutguru>
    <x-slot:role>{{ $role }}</x-slot:role>

<div class="max-w-3xl w-full flex flex-col p-6 rounded-lg bg-white shadow-md gap-6">
    @if (session('success'))
        <div class="bg-green-500 text-white py-2 px-4 rounded-md text-center">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('absenkelas.store') }}" method="POST">
        @csrf
        <div class="flex flex-col sm:flex-row justify-between gap-4">
            <label class="flex flex-col w-full">
                <span class="text-base font-semibold">Guru</span>
                <select required name="guru" id="guru" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none ">
                    <option value="">Pilih</option>
                    @foreach ($gurus as $guru)
                        <option value="{{ $guru->user->id }}">{{ $guru->user->name }}</option>
                    @endforeach
                </select>
            </label>

            <label class="flex flex-col w-full">
                <span class="text-base font-semibold">Mata Pelajaran</span>
                <select required name="matapelajaran" id="matapelajaran" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none ">
                    <option value="">Pilih</option>
                    @foreach ($matapelajaran as $mapel)
                        <option value="{{ $mapel->id }}">{{ $mapel->name }}</option>
                    @endforeach
                </select>
            </label>
        </div>

        <hr class="mt-6 border-gray-300">

        <h1 class="font-bold text-2xl mt-3 text-center">Absensi</h1>
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-left border border-gray-300 mt-4">
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
                                <select name="keterangan[{{ $val->id }}]" id="keterangan" class="border border-gray-300 rounded-md w-full h-full px-2 focus:outline-none ">
                                    @foreach ($keteranganOptions as $ket)
                                        <option value="{{ $ket }}">{{ $ket }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-red-600 text-white font-semibold rounded-md px-4 py-2 hover:bg-red-700 transition duration-200">
                Submit
            </button>
        </div>
    </form>
</div>

</x-layoutguru>
