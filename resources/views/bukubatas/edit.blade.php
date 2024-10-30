<x-layoutguru>
    <x-slot:role>{{ $role }}</x-slot:role>

    <div class="max-w-md w-full bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4 text-center text-gray-800">
            Absensi Guru
        </h1>
        <div class="flex flex-col">
            <form action="{{ route('bukubatas.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-4">

                    {{-- Kelas --}}
                    <label for="kelas" class="flex flex-col">
                        <span class="text-sm font-semibold text-gray-700 mb-1">Kelas</span>
                        <select name="kelas" id="kelas"
                            class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-red-500">
                            <option value="">Pilih</option>
                            @foreach ($kelasOptions as $kelas)
                                <option value="{{ $kelas }}" {{ $data->kelas == $kelas ? 'selected' : '' }}>
                                    {{ $kelas }}</option>
                            @endforeach
                        </select>
                    </label>

                    {{-- Jurusan --}}
                    <label for="jurusan_id" class="flex flex-col">
                        <span class="text-sm font-semibold text-gray-700 mb-1">Jurusan</span>
                        <select name="jurusan_id" id="jurusan_id"
                            class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-red-500">
                            <option value="">Pilih</option>
                            @foreach ($jurusans as $jurusan)
                                <option value="{{ $jurusan->id }}"
                                    {{ $data->jurusan_id == $jurusan->id ? 'selected' : '' }}>{{ $jurusan->nick }}
                                </option>
                            @endforeach
                        </select>
                    </label>

                    {{-- Sub Kelas --}}
                    <label for="sub_kelas" class="flex flex-col">
                        <span class="text-sm font-semibold text-gray-700 mb-1">Sub Kelas</span>
                        <select name="sub_kelas" id="sub_kelas"
                            class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-red-500">
                            <option value="">Pilih</option>
                            @foreach ($subKelasOptions as $subkelas)
                                <option value="{{ $subkelas }}"
                                    {{ $data->sub_kelas == $subkelas ? 'selected' : '' }}>{{ $subkelas }}
                                </option>
                            @endforeach
                        </select>
                    </label>

                    {{-- Mata Pelajaran --}}
                    <label for="matapelajaran" class="flex flex-col">
                        <span class="text-sm font-semibold text-gray-700 mb-1">Mata Pelajaran</span>
                        <select name="matapelajaran" id="matapelajaran"
                            class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-red-500">
                            <option value="">Pilih</option>
                            @foreach ($matapelajarans as $matapelajaran)
                                <option value="{{ $matapelajaran->id }}"
                                    {{ $data->matapelajaran == $matapelajaran->id ? 'selected' : '' }}>
                                    {{ $matapelajaran->name }}</option>
                            @endforeach
                        </select>
                    </label>

                    {{-- Absen Foto --}}
                    <label for="file" class="flex flex-col">
                        <span class="text-sm font-semibold text-gray-700 mb-1">Absen</span>
                        <input type="file" accept="image/*" capture="camera" id="file" name="file" required
                            class="mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-red-500"
                            onchange="handleFileUpload(event)">
                    </label>

                    {{-- Button Submit --}}
                    <div class="flex justify-end mt-4">
                        <button id="submitButton" type="submit" disabled
                            class="bg-red-500 text-white w-32 h-10 rounded-md opacity-50 cursor-not-allowed transition duration-200">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/browser-image-compression@1.0.9/dist/browser-image-compression.js"></script>

    <script>
        async function handleFileUpload(event) {
            const file = event.target.files[0];
            if (!file) return;
    
            // Mengubah tombol menjadi loading
            const submitButton = document.getElementById('submitButton');
            submitButton.disabled = true;
            submitButton.textContent = 'Loading...';
            submitButton.classList.add('opacity-50', 'cursor-not-allowed');
    
            const options = {
                maxSizeMB: 0.1, // Maksimal ukuran file 100KB
                maxWidthOrHeight: 1920, // Maksimum dimensi
                useWebWorker: true, // Menggunakan Web Worker
            };
    
            try {
                const compressedFile = await imageCompression(file, options);
                
                // Membuat objek File dari Blob
                const fileName = file.name.split('.').slice(0, -1).join('.') + '-compressed.' + file.name.split('.').pop();
                const newFile = new File([compressedFile], fileName, { type: compressedFile.type });
    
                // Ganti file input dengan file terkompresi
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(newFile);
                event.target.files = dataTransfer.files;
    
                console.log('File berhasil dikompres:', newFile);
    
                // Aktifkan tombol submit setelah file berhasil dikompres
                submitButton.disabled = false;
                submitButton.textContent = 'Submit'; // Kembali ke teks awal
                submitButton.classList.remove('opacity-50', 'cursor-not-allowed'); // Menghapus kelas yang menonaktifkan gaya hover
            } catch (error) {
                console.error('Gagal mengompres gambar:', error);
    
                // Kembali ke keadaan awal jika terjadi error
                submitButton.disabled = false;
                submitButton.textContent = 'Submit';
                submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        }
    </script>
</x-layoutguru>
