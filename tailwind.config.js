/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',

    ],

    theme: {
        extend: {
            screens: {
                'mm': '450px',
            },
            spacing: {
                79: "305px",
                18: "74px",
                49: "195px",
                25: "103px",
                74: "298px",
                83: "350px",
                519: "519px",
                622: "622px",
                410: "410px",
                500: "500px",
                850: "850px",
                136: "136px",
                652: "652px",
                608: "608px",
                570: "570px",
                100: "100px",
                119: "119px",
                451: "451px",
                928: "928px",
                1010: "1010px",
                494: "494px",
                590: "590px",
            },
            colors: {
                primary: {
                    50: "#eff6ff",
                    100: "#dbeafe",
                    200: "#bfdbfe",
                    300: "#93c5fd",
                    400: "#60a5fa",
                    500: "#3b82f6",
                    600: "#2563eb",
                    700: "#1d4ed8",
                    800: "#1e40af",
                    900: "#1e3a8a",
                    950: "#172554",
                },
                merah: ["#E20225"],
                bg: ["#EEEEEE"],
            },
            fontFamily: {
                inter: ["Inter"],
            },
            backgroundImage: {
                dashboardmerah: "url('/public/iconSB/dashboard-merah.png')",
                dashboardputih: "url('/public/iconSB/dashboard-putih.png')",
                datamerah: "url('/public/iconSB/data-merah.png')",
                dataputih: "url('/public/iconSB/data-putih.png')",
                laporanmerah: "url('/public/iconSB/laporan-merah.png')",
                laporanputih: "url('/public/iconSB/laporan-putih.png')",
                logout: "url('/public/iconSB/logout.png')",
                peger: "url('/public/iconSB/peger.png')",
                profilemerah: "url('/public/iconSB/profile-merah.png')",
                profileputih: "url('/public/iconSB/profile-putih.png')",
                navmobile: "url('/public/iconSB/nav-mobile.png')",
                panahbawah: "url('/public/icon/panahbawah.png')",
                justin: "url('/public/icon/JUSTIN.png')",
                LogoPgri: "url('/public/icon/PgriLogo.png')",
                buku: "url('/public/icon/buku.jpg')",
                baground : "url('/public/icon/background.JPG')",
                merahabstrak: "url('/public/icon/merahabstrak.jpeg')",
                logouthitam: "url('/public/iconSB/logouthitam.png')",
                profilehitam: "url('/public/iconSB/profilehitam.png')",
                siswamerah: "url('/public/iconSB/siswa-merah.png')",
                siswaputih: "url('/public/iconSB/siswa-putih.png')",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
