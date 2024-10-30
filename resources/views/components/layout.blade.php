<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css', 'resources/js/app.js')
    <title>Document</title>
</head>

<body class=" w-screen h-screen flex flex-row bg-slate-200 font-inter">

    <x-navbar></x-navbar>


    <!-- main -->
    <main class=" w-screen h-screen flex flex-col flex-1 ">
        <x-header>
            <x-slot:title>{{ $title }}</x-slot:title>
            {{-- <x-slot:role>{{ $role }}</x-slot:role> --}}
        </x-header>
        <!-- content -->
        <div id="tutup" class="py-10 lg:px-5 px-3 overflow-y-auto no-scrollbar flex flex-col justify-between h-screen">{{ $slot }}</div>
    </main>

    {{-- <script src="js/script.js"></script> --}}
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
