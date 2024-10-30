<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <!-- Tambahkan SweetAlert2 CSS dan JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <title>Absensi</title>
</head>
<body class="w-screen h-screen flex flex-col bg-slate-200 font-inter">

    
    <!-- header -->
    

    <!-- main -->
    <main class=" w-screen h-screen flex flex-col">
        <x-headerguru>
            {{-- <x-slot:role>{{ $role }}</x-slot:role> --}}
        </x-headerguru>

        <div class="py-10 px-3 overflow-auto no-scrollbar flex flex-col gap-5 h-screen    items-center" >{{ $slot }}<!-- conten --></div>
            
    </main>

<script src="js/script.js"></script>
</body>
</html>