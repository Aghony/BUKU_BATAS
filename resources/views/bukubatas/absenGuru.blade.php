<x-layoutguru>
    <x-slot:role>{{ $role }}</x-slot:role>

    <div class="max-w-md w-full h-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4 text-center text-gray-800">
            Absensi Guru
        </h1>
        <div class="flex flex-col gap-4">
            @if (session('success'))
                <div class="bg-green-500 text-white py-2 px-3 rounded-md text-center">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('bukubatas.store') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col gap-4">
                @csrf

                {{-- Kelas --}}
                <label class="flex flex-col">
                    <span class="text-sm font-semibold text-gray-700">Kelas</span>
                    <select name="kelas" id="kelas"
                        class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none ">
                        <option value="">Pilih Kelas</option>
                        @foreach ($kelasOptions as $kelas)
                            <option value="{{ $kelas }}">{{ $kelas }}</option>
                        @endforeach
                    </select>
                </label>

                {{-- Jurusan --}}
                <label class="flex flex-col">
                    <span class="text-sm font-semibold text-gray-700">Jurusan</span>
                    <select name="jurusan_id" id="jurusan_id"
                        class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none ">
                        <option value="">Pilih</option>
                        @foreach ($jurusans as $jurusan)
                            <option value="{{ $jurusan->id }}">{{ $jurusan->nick }}</option>
                        @endforeach


                    </select>
                </label>

                {{-- Sub Kelas --}}
                <label class="flex flex-col">
                    <span class="text-sm font-semibold text-gray-700">Sub Kelas</span>
                    <select name="sub_kelas" id="sub_kelas"
                        class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none ">
                        <option value="">Pilih</option>
                        @foreach ($subKelasOptions as $subkelas)
                            <option value="{{ $subkelas }}">{{ $subkelas }}</option>
                        @endforeach
                    </select>
                </label>

                {{-- Mata Pelajaran --}}
                <label class="flex flex-col">
                    <span class="text-sm font-semibold text-gray-700">Mata Pelajaran</span>
                    <select name="matapelajaran" id="matapelajaran"
                        class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none ">
                        <option value="">Pilih</option>
                        {{-- @foreach ($matapelajarans as $matapelajaran)
                            <option value="{{ $matapelajaran->id }}">{{ $matapelajaran->name }}</option>
                        @endforeach --}}

                        @foreach ($guru as $isi)
                            @foreach ($isi->subject_array as $mapelguru)
                                @foreach ($matapelajarans as $matapelajaran)
                                    @if ($mapelguru == $matapelajaran->id)
                                        <option value="{{ $matapelajaran->id }}">
                                            {{ $matapelajaran->name }}
                                        </option>
                                    @endif
                                @endforeach
                            @endforeach
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

                <div class="flex w-full justify-between mt-4">
                    <a href="{{ route('dashboard.index') }}"
                        class="w-32 h-10 bg-white border border-red-500 text-center rounded-md text-red-500 flex items-center justify-center hover:bg-red-500 hover:text-white transition duration-200">
                        Kembali
                    </a>
                    <button type="submit" id="submitButton" disabled
                        class="bg-red-500 text-white w-32 h-10 rounded-md hover:bg-red-600 opacity-50 cursor-not-allowed transition duration-200">
                        Submit
                    </button>
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
                const fileName = file.name.split('.').slice(0, -1).join('.') + '-compressed.' + file.name.split('.')
                    .pop();
                const newFile = new File([compressedFile], fileName, {
                    type: compressedFile.type
                });

                // Ganti file input dengan file terkompresi
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(newFile);
                event.target.files = dataTransfer.files;

                console.log('File berhasil dikompres:', newFile);

                // Aktifkan tombol submit setelah file berhasil dikompres
                submitButton.disabled = false;
                submitButton.textContent = 'Submit'; // Kembali ke teks awal
                submitButton.classList.remove('opacity-50',
                'cursor-not-allowed'); // Menghapus kelas yang menonaktifkan gaya hover
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
