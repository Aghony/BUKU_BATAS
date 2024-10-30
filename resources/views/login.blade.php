<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>

<body class="font-inter w-screen h-screen flex flex-col bg-slate-500">
    <div class="bg-baground opacity-80 bg-fixed bg-no-repeat bg-cover w-full h-full px-10">
        <section class="bg-transparent ">
            <div class="flex flex-row items-center justify-center py-8 mx-auto h-screen lg:py-0">
                <div
                    class="w-full rounded-md border border-slate-3 00 backdrop-blur-sm bg-gray-500 bg-opacity-30  sm:max-w-md  ">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8 ">
                        <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-white md:text-2xl">
                            Login
                        </h1>
                        <div class="w-full flex flex-row justify-center">
                            <div class="bg-LogoPgri w-40 h-40 bg-no-repeat bg-cover">
                            </div>
                        </div>


                        @if ($errors->any())
                            <div class="alert alert-danger ">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li class="text-white bg-merah-0 rounded-sm px-2">{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="space-y-4 md:space-y-8" method="POST">
                            @csrf
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="username" value= "{{ old('username') }}" name="username" id="username"
                                    class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-white peer"
                                    placeholder=" " required />
                                <label for="username"
                                    class="peer-focus:font-medium absolute text-sm text-white dark:text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="password" name="password" id="password"
                                    class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-white appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-white peer"
                                    placeholder=" " required />
                                <label for="password"
                                    class="peer-focus:font-medium absolute text-sm text-white dark:text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                            </div>
                            <div div class="flex items-center justify-between">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full text-merah-0 bg-white font-bold hover:bg-merah-0 hover:text-white hover:font-bold focus:ring-2 focus:outline-none 
                        focus:ring-red-400 rounded-md text-sm px-5 py-2.5 text-center">
                                Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
