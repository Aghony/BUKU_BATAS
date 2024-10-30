<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:role>{{ $role }}</x-slot:role>

    <!-- content -->
    <!-- Add Data -->
    <div class="bg-white sm:w-500 w-full h-auto flex flex-col shadow-md mx-auto p-5 gap-4 justify-between rounded-md ">

        <h1 class="text-xl ml-3 font-bold ">
            Edit Data Jurusan
        </h1>
        <div class="flex flex-col ">
            <form id ="inputForm" action ="{{ route('jurusan.update', $jurusan->id) }}" method ="POST">
                @csrf
                @method('PUT')
                <div class="flex flex-col justify-between gap-2">
                    <label for="name">
                        <span class="block font-semibold text-slate-700">
                            Jurusan
                        </span>
                        <input
                            class="w-full h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                            type="text" placeholder="Jurusan..." value="{{ old('name', $jurusan->name) }}"
                            id="name" name="name" required>
                    </label>
                    <label for="nick">
                        <span class="block font-semibold text-slate-700">
                            Singkatan
                        </span>
                        <input
                            class="w-full h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                            type="text" placeholder="Singkatan..." value="{{ old('nick', $jurusan->nick) }}"
                            id="nick" name="nick" required>
                    </label>
                </div>
        </div>
        <div class="lg:w-full w-auto h-10 flex flex-row justify-between mt-4 gap-4">
            <a href="{{ route('jurusan.index') }}"
                class="w-32 h-full bg-white border border-merah-0 text-center rounded text-merah-0 text-xl flex flex-col justify-center">
                Kembali
            </a>
            <button type="submit" class="w-32 h-full bg-merah-0 text-center rounded text-white text-xl">
                Submit
            </button>
        </div>
        </form>
    </div>
</x-layout>
