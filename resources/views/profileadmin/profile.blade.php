<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:role>{{ $role }}</x-slot:role>

    <!-- content -->
    <!-- Add Data -->

    <div class="bg-white flex flex-col w-547 h-auto rounded-md shadow-sm px-11">
        <div class="border-b-2 w-full h-full py-7">
        <form id="inputForm" action="{{ route('profile.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="username" class="flex md:flex-row flex-col justify-between items-center">
                    <span class="font-bold">
                        Username
                    </span>
                    <input type="text" id="username" name="username" placeholder="Username..."
                        class="w-83 h-12 border border-black rounded-md px-5 focus:outline-none"
                        value="{{ old('username', $user->username) }}">
                </label>

            </div>
            <div class="w-full h-full py-7">

                <label for="password" class="flex md:flex-row flex-col justify-between items-center">
                    <span class="font-bold">
                    New Password
                    </span>
                    <input type="password" id="new_password" name="new_password" placeholder="Password..."
                        class="w-83 h-12 border border-black rounded-md px-5 ml-4 focus:outline-none" autocomplete="new-password">
                </label>
            </div>
                <div class="border-b-2 w-full h-full py-7">
                <label for="password" class="flex md:flex-row flex-col justify-between items-center">
                    <span class="font-bold">
                        Confirm Password
                    </span>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Password..."
                        class="w-83 h-12 border border-black rounded-md px-5 ml-4 focus:outline-none" autocomplete="confirm_password">
                </label>
                
            </div>

            <div class="flex flex-row justify-between py-7">
                {{-- <a href="/edit"><button class="w-28 h-11 bg-merah-0 flex justify-center items-center text-white text-xl rounded-md">Ubah</button></a> --}}
                <button type="submit"
                    class="w-32 h-11 bg-merah-0 flex justify-center items-center text-white text-xl rounded-md">Simpan</button>
            </div>
        </form>
    </div>
</x-layout>
