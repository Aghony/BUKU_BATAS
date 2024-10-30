<!-- sidebar -->
<nav class="w-60 h-screen bg-merah-0  shadow-md hidden lg:flex lg:flex-col justify-between ">

    <div class="flex flex-col gap-10">

        <div class="flex flex-row py-4 items-center justify-start px-2">
            <div class="w-14 h-11 bg-peger">

            </div>
            <h3 class="w-auto h-10 text-3xl text-white font-bold">
                SMK PGRI
            </h3>
        </div>

        <div class="flex flex-col gap-2 ml-2">
            {{-- Dashboard --}}
            <a href="/dashboard"
                class="{{ request()->is('dashboard') ? 'bg-white text-lg text-merah-0' : ' text-white hover:bg-red-500' }} font-bold w-full h-10 text-lg flex rounded-s-lg ">
                <div
                    class="{{ request()->is('dashboard') ? 'bg-dashboardmerah' : 'bg-dashboardputih' }} ml-7 my-auto w-6 h-6">

                </div>
                <h4 class="ml-2 my-auto group-focus:text-start">Dashboard</h4>
            </a>

            {{-- Akun --}}
            <button id="dropdownButton"
                class="w-full h-10 text-lg font-bold text-white flex hover:bg-red-500 rounded-s-lg">
                <div class=" ml-8 my-auto w-6 h-6 bg-profileputih">

                </div>
                <h4 class="ml-2 my-auto text-start ">
                    Akun
                </h4>
            </button>
            {{-- Akun => Guru & Kelas --}}
            <div id="dropdownMenu"
                class="{{ request()->is('guru', 'guru/create', 'kelas', 'kelas/create') ? '' : 'hidden' }} pl-14 flex flex-col gap-2">
                <a href="/guru"
                    class="{{ request()->is('guru', 'guru/create') ? 'bg-white text-lg text-merah-0' : ' text-white hover:bg-red-500' }} w-full h-10 text-lg font-bold flex rounded-s-lg ">
                    <h4 class="ml-2 my-auto text-start">
                        • Guru
                    </h4>
                </a>
                <a href="/kelas"
                    class="{{ request()->is('kelas', 'kelas/create') ? 'bg-white text-lg text-merah-0' : ' text-white hover:bg-red-500' }} w-full h-10 text-lg font-bold flex rounded-s-lg">
                    <h4 class="ml-2 my-auto text-start">
                        • Kelas
                    </h4>
                </a>
            </div>

            {{-- Master Data --}}
            <button id="dropdownButtonMaster"
                class="w-full h-10 text-lg font-bold text-white flex hover:bg-red-500 rounded-s-lg">
                <div class=" ml-8 my-auto w-6 h-6 bg-dataputih">

                </div>
                <h4 class="ml-2 my-auto text-start ">
                    Master Data
                </h4>
            </button>
            {{-- Master Data => Jurusan & Matapelajaran & Siswa --}}
            <div id="dropdownMenuMaster"
                class="{{ request()->is('jurusan', 'jurusan/create', 'matapelajaran', 'matapelajaran/create') ? '' : 'hidden' }} pl-14 flex flex-col gap-2">
                <a href="/jurusan"
                    class="{{ request()->is('jurusan', 'jurusan/create') ? 'bg-white text-lg text-merah-0' : ' text-white hover:bg-red-500' }} w-full h-10 text-lg font-bold flex rounded-s-lg">
                    <h4 class="ml-2 my-auto text-start">
                        • Jurusan
                    </h4>
                </a>
                <a href="/matapelajaran"
                    class="{{ request()->is('matapelajaran', 'matapelajaran/create') ? 'bg-white text-lg text-merah-0' : ' text-white hover:bg-red-500' }} w-full h-10 text-lg font-bold flex rounded-s-lg">
                    <h4 class="ml-2 my-auto text-start">
                        • Matapelajaran
                    </h4>
                </a>
                {{-- <a href="/siswa"
            class="{{ request()->is('siswa', 'siswa/create') ? 'bg-white text-lg text-merah-0' : 'bg-merah-0 text-white hover:bg-red-500' }} w-full h-10 text-lg font-bold flex group ">
            <h4 class="ml-2 my-auto text-start">
                • Siswa
            </h4>
        </a> --}}
            </div>

            {{-- Siswa --}}
            <a href="/siswa"
                class="{{ request()->is('siswa', 'siswa/create', 'siswa/import') ? 'bg-white text-lg text-merah-0' : ' text-white hover:bg-red-500' }} w-full h-10 text-lg font-bold flex rounded-s-lg ">
                <div
                    class="{{ request()->is('siswa', 'siswa/create', 'siswa/import') ? 'bg-siswamerah' : 'bg-siswaputih' }} ml-8 my-auto w-6 h-6">

                </div>
                <h4 class="ml-2 my-auto text-start">
                    Siswa
                </h4>
            </a>

            {{-- Laporan --}}
            <a href="/laporan"
                class="{{ request()->is('laporan') ? 'bg-white text-lg text-merah-0' : ' text-white hover:bg-red-500' }} w-full h-10 text-lg font-bold flex rounded-s-lg">
                <div
                    class="{{ request()->is('laporan') ? 'bg-laporanmerah' : 'bg-laporanputih' }} ml-8 my-auto w-6 h-6">

                </div>
                <h4 class="ml-2 my-auto text-start">
                    Laporan
                </h4>
            </a>

        </div>

    </div>

    {{-- Logout --}}
    <a href="/logout" {{-- onclick="return confirm('apakah anda ingin logout?')" --}} onclick="logout(event)"
        class="show-example-btn mb-10 mt-20 flex flex-row w-full justify-center ">
        <button
            class="w-auto text-lg font-bold text-white flex flex-row  items-center justify-center px-3 py-1 rounded-md border border-white hover:bg-red-500">
            <h4 class="">
                Log Out
            </h4>
            <div class="ml-2 w-6 h-6 bg-logout ">
            </div>
        </button>
    </a>

</nav>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function logout(event) {
        event.preventDefault(); // Mencegah default action

        Swal.fire({
            title: 'Apakah Anda ingin logout?',
            text: "Anda akan keluar dari akun Anda!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1F1F1F',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, logout!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke halaman logout
                window.location.href = '/logout';
            }
        });
    }
</script>


















<!-- mobile menu -->
{{-- <div id="mob" class="flex flex-row w-screen h-screen absolute" > --}}
<nav id="nav-btn-m"
    class="w-60 h-screen bg-merah-0 shadow-md absolute z-50 lg:hidden flex flex-col justify-between      -translate-x-full delay-0 duration-500 ease-in-out">

    <div class="flex flex-col gap-10">



        <div class="flex flex-row py-4 items-center justify-start px-2 ">
            <div class="w-14 h-11 bg-peger">

            </div>
            <h3 class="w-auto h-10 text-3xl text-white font-bold">
                SMK PGRI
            </h3>
        </div>


        <div class="flex flex-col gap-2 ml-2">

            {{-- Dashboard --}}
            <a href="/dashboard"
                class="{{ request()->is('dashboard') ? 'bg-white text-lg text-merah-0' : ' text-white  active:bg-red-500' }} font-bold w-full h-10 flex rounded-s-lg">
                <div
                    class="{{ request()->is('dashboard') ? 'bg-dashboardmerah' : 'bg-dashboardputih' }} ml-8 my-auto w-6 h-6 ">

                </div>
                <h4 class="ml-2 my-auto group-focus:text-start">Dashboard</h4>
            </a>

            {{-- Akun --}}
            <button id="dropdownButton-M"
                class="w-full h-10 text-lg font-bold text-white flex active:bg-red-500 rounded-s-lg">
                <div class=" ml-8 my-auto w-6 h-6 bg-profileputih">

                </div>
                <h4 class="ml-2 my-auto text-start ">
                    Akun
                </h4>
            </button>

            {{-- Akun => Guru & Kelas --}}
            <div id="dropdownMenu-M"
                class="{{ request()->is('guru', 'guru/create', 'kelas', 'kelas/create') ? '' : 'hidden' }} pl-14 flex flex-col gap-2">
                <a href="/guru"
                    class="{{ request()->is('guru', 'guru/create') ? 'bg-white text-lg text-merah-0' : ' text-white active:bg-red-500' }} w-full h-10 text-lg font-bold flex rounded-s-lg">
                    <h4 class="ml-2 my-auto text-start">
                        • Guru
                    </h4>
                </a>
                <a href="/kelas"
                    class="{{ request()->is('kelas', 'kelas/create') ? 'bg-white text-lg text-merah-0' : ' text-white active:bg-red-500' }} w-full h-10 text-lg font-bold flex group rounded-s-lg">
                    <h4 class="ml-2 my-auto text-start">
                        • Kelas
                    </h4>
                </a>
            </div>

            {{-- Master Data --}}
            <button id="dropdownButtonMaster-M"
                class="w-full h-10 text-lg font-bold text-white flex active:bg-red-500 rounded-s-lg">
                <div class=" ml-8 my-auto w-6 h-6 bg-dataputih">

                </div>
                <h4 class="ml-2 my-auto text-start ">
                    Master Data
                </h4>
            </button>
            {{-- Master Data => Jurusan & Matapelajaran & Siswa --}}
            <div id="dropdownMenuMaster-M"
                class="{{ request()->is('jurusan', 'jurusan/create', 'matapelajaran', 'matapelajaran/create') ? '' : 'hidden' }} pl-14 flex flex-col gap-2">
                <a href="/jurusan"
                    class="{{ request()->is('jurusan', 'jurusan/create') ? 'bg-white text-lg text-merah-0' : ' text-white active:bg-red-500' }} w-full h-10 text-lg font-bold flex rounded-s-lg">
                    <h4 class="ml-2 my-auto text-start">
                        • Jurusan
                    </h4>
                </a>
                <a href="/matapelajaran"
                    class="{{ request()->is('matapelajaran', 'matapelajaran/create') ? 'bg-white text-lg text-merah-0' : ' text-white active:bg-red-500' }} w-full h-10 text-lg font-bold flex group rounded-s-lg">
                    <h4 class="ml-2 my-auto text-start">
                        • Matapelajaran
                    </h4>
                </a>
            </div>

            {{-- Siswa --}}
            <a href="/siswa"
                class="{{ request()->is('siswa', 'siswa/create', 'siswa/import') ? 'bg-white text-lg text-merah-0' : ' text-white active:bg-red-500' }} w-full h-10 text-lg font-bold flex rounded-s-lg ">
                <div
                    class="{{ request()->is('siswa', 'siswa/create', 'siswa/import') ? 'bg-siswamerah' : 'bg-siswaputih' }} ml-8 my-auto w-6 h-6">

                </div>
                <h4 class="ml-2 my-auto text-start">
                    Siswa
                </h4>
            </a>

            {{-- Laporan --}}
            <a href="/laporan"
                class="{{ request()->is('laporan') ? 'bg-white text-lg text-merah-0' : ' text-white active:bg-red-500' }} w-full h-10 text-lg font-bold flex rounded-s-lg">
                <div
                    class="{{ request()->is('laporan') ? 'bg-laporanmerah' : 'bg-laporanputih' }} ml-8 my-auto w-6 h-6">

                </div>
                <h4 class="ml-2 my-auto text-start">
                    Laporan
                </h4>
            </a>

        </div>

    </div>

    {{-- Logout --}}
    <a href="/logout" {{-- onclick="return confirm('apakah anda ingin logout?')" --}} onclick="logout(event)"
        class="show-example-btn mb-10 mt-20 flex flex-row w-full justify-center ">
        <button
            class="w-auto text-lg font-bold text-white flex flex-row  items-center justify-center px-3 py-1 rounded-md border border-white active:bg-red-500">
            <h4 class="">
                Log Out
            </h4>
            <div class="ml-2 w-6 h-6 bg-logout ">
            </div>
        </button>
    </a>


</nav>
{{-- <div id="back_hid" class="h-screen w-screen bg-white opacity-0 z-40 hidden absolute"></div> --}}
</div>
