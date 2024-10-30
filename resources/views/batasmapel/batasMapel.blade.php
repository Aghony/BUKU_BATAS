<x-layoutguru>
    <x-slot:role>{{ $role }}</x-slot:role>
    {{-- content --}}
    <div class="max-w-md w-full h-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4 text-center text-gray-800">
            Batas Pelajaran
        </h1>
        <div class="flex flex-col gap-4">
            <form action="{{ route('batasmapel.store') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                
                <!-- Matapelajaran -->
                <label for="matapelajaran_id" class="flex flex-col">
                    <span class="text-sm font-semibold text-gray-700 mb-1">Matapelajaran:</span>
                    <input class="focus:outline-none rounded-md border border-gray-300 p-2" name="matapelajaran_id" id="matapelajaran_id"
                        value="{{ $bukubatas->matapelajaran }}" readonly type="hidden">
                    <input class="focus:outline-none rounded-md border border-gray-300 p-2" value="{{ $bukubatas->mapel->name }}" readonly type="text">
                </label>
    
                <!-- Jam Mulai -->
                <label for="mulai" class="flex flex-col">
                    <span class="text-sm font-semibold text-gray-700 mb-1">Jam Mulai:</span>
                    <input class="focus:outline-none rounded-md border border-gray-300 p-2" name="mulai" required type="time">
                </label>
                
                <!-- Jam Selesai -->
                <label for="selesai" class="flex flex-col">
                    <span class="text-sm font-semibold text-gray-700 mb-1">Jam Selesai:</span>
                    <input class="focus:outline-none rounded-md border border-gray-300 p-2" name="selesai" required type="time">
                </label>
                
                <!-- Judul -->
                <label for="judul" class="flex flex-col">
                    <span class="text-sm font-semibold text-gray-700 mb-1">Judul:</span>
                    <input class="focus:outline-none rounded-md border border-gray-300 p-2" name="judul" id="judul" required type="text">
                </label>
    
                <!-- Keterangan -->
                <label for="keterangan" class="flex flex-col mb-3">
                    <span class="text-sm font-semibold text-gray-700 mb-1">Keterangan:</span>
                    <select name="keterangan" required id="ket" class="rounded-md border border-gray-300 focus:outline-none w-full p-2">
                        <option value="">Pilih</option>
                        @foreach ($keteranganOptions as $ket)
                            <option value="{{ $ket }}">{{ $ket }}</option>
                        @endforeach
                    </select>
                </label>
    
                <!-- Button Submit -->
                <div class="flex justify-end mt-4">
                    <button type="submit" class="bg-red-500 w-28 h-10 text-white text-center rounded-md hover:bg-red-600 transition duration-200">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    
</x-layoutguru>
