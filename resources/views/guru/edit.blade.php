<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:role>{{ $role }}</x-slot:role>
    <!-- content -->
    <!-- Akun Guru -->
    {{-- @section('content') --}}
    <div class="flex flex-col sm:w-auto w-full h-auto bg-white shadow-md mb-5 mx-auto p-5 rounded-md gap-4">

        <h1 class="text-xl ml-3 font-bold">
            Edit Akun Guru

        </h1>
        @if ($errors->any())
            <div class="bg-red-600 text-white text-center p-2 rounded-md border overflow-auto">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                            {{-- The password field must be at least 8 characters. --}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="px-2">
            <form id="inputForm" action="{{ route('guru.update', $guru->id) }}" method="POST" class="flex flex-col gap-2">
                @csrf
                @method('PUT')

                <label for="name" class="flex flex-col gap-1">
                    <p>{{ $guru->name }}</p>
                    <span class="font-semibold  text-slate-700">Name</span>
                    <input class="lg:w-83 w-auto h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                        type="text" id="name" name="name" placeholder="Name..."
                        value="{{ $guru->user->name }}" required>
                </label>

                <label for="username" class="flex flex-col gap-1">
                    <span class="font-semibold  text-slate-700">Username</span>
                    <input class="lg:w-83 w-auto h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                        type="text" id="username" name="username" placeholder="Username..."
                        value="{{ old('username', $guru->user->username) }}" required>
                </label>

                <label for="email" class="flex flex-col gap-1">
                    <span class="font-semibold  text-slate-700">Email (Tidak wajib di isi) </span>
                    <input class="lg:w-83 w-auto h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                        type="email" id="email" name="email" placeholder="Email..."
                        value="{{ old('email', $guru->user->email) }}">
                </label>

                <label for="password" class="flex flex-col gap-1">
                    <span class="font-semibold  text-slate-700">Password (Kosongkan jika tidak
                        diubah)</span>
                    <input class="lg:w-83 w-auto h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                        type="password" id="password" name="password" placeholder="Password...">
                </label>


                <div id="array-inputs" class="space-y-2">
                    <div class="flex flex-col items-start gap-1">

                        <span class="block font-semibold  text-slate-700">
                            Matapelajaran
                        </span>

                        <label for="subject" class="flex flex-col w-full gap-2">
                            {{-- @foreach ($guru->subject_array as $arrayItem)
                                <div class="w-auto h-auto flex flex-row items-center">
                                    <input id="subjectInput"
                                        class="w-83 h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                                        type="text" name="subject_array[]" value="{{ $arrayItem }}"
                                        placeholder="Matapelajaran..." required>
                                    <button type="button" onclick="removeInput(this)"
                                        class="w-12 h-12 border border-slate-700 rounded-md text-center ml-3 font-semibold text-3xl mt-1 bg-merah-0">
                                        -
                                    </button>
                                </div>
                            @endforeach --}}

                            @foreach ($guru->subject_array as $arrayItem)
                                <div class="w-auto h-auto flex flex-row items-center">

                                    <select name="subject_array[]" id="subjectInput"
                                        class="flex-1 sm:w-83 w-full h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none">Jenis
                                        Kelamin
                                        <option value="">Pilih Jurusan</option>
                                        @foreach ($matapelajaranOptions as $mapel)
                                            <option
                                                value="{{ $mapel->id }}"{{ $arrayItem == $mapel->id ? 'selected' : '' }}>
                                                {{ $mapel->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" onclick="removeInput(this)"
                                        class="w-12 h-12 border border-slate-700 rounded-md text-center ml-3 font-semibold text-3xl bg-merah-0">
                                        -
                                    </button>
                                </div>
                            @endforeach

                        </label>


                    </div>
                </div>

                {{-- <label for="subject">
                    <span class="block font-semibold mb-1 mt-3 text-slate-700">
                        Matapelajaran
                    </span>
                    <input id="subjectInput"
                        class="w-83 h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                        value="{{ old('subject', $guru->subject) }}" type="text" id="subject" name="subject"
                        placeholder="Matapelajaran..." required>
                </label> --}}
                {{-- <button type="button" id="addRowButton"
                    class="w-12 h-12 border border-slate-700 rounded-md text-center ml-3 font-semibold text-3xl"> +
                </button> --}}


                {{-- <div class="relative overflow-hidden mt-3 ">
                    <table id="dataTable" class="table w-full text-left">
                        <thead class=" bg-[#E20225] text-[#e5e7eb] font-bold">
                            <tr>
                                <td class="py-0 border p-4">Matapelajaran</td>
                                <td class="py-0 border text-center p-4">Hapus</td>
                            </tr>
                        </thead>
                        <tbody class="bg-white text-[#6b7280] font-semibold">
                        </tbody>
                    </table>
                </div> --}}

                <div class="lg:w-full w-auto h-10 flex flex-row justify-between mt-4 gap-4">
                    <a href="{{ route('guru.index') }}"
                        class="w-32 h-full bg-white border border-merah-0 text-center rounded text-merah-0 text-xl flex flex-col justify-center">
                        Kembali
                    </a>
                    <button type="submit" class="w-32 h-full bg-merah-0 text-center rounded text-white text-xl">
                        Submit
                    </button>
                </div>

            </form>
        </div>
    </div>


    <script>
        function addInput() {
            const container = document.getElementById('array-inputs');
            const div = document.createElement('div');
            div.classList.add('flex', 'flex-row', 'items-end', 'mt-4');
            div.innerHTML =
                `<input id="subjectInput"
                            class="w-83 h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                            type="text" name="subject_array[]" placeholder="Matapelajaran..." required>
                            <button type="button" onclick="removeInput(this)" class="w-12 h-12 border border-slate-700 rounded-md text-center ml-3 font-semibold text-3x bg-merah-0">-</button>`;
            container.appendChild(div);
        }

        function removeInput(button) {
            const div = button.parentElement;
            div.remove();
        }
    </script>

    {{-- <script>
        // tambah mapel
        function addRow(subject) {
            var table = document.getElementById("dataTable").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow();

            // Insert new cells
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);

            // Fill cells with data
            cell1.textContent = subject;
            cell1.classList.add("py-1", "border", "p-4");
            cell2.innerHTML = '<button class="deleteButton text-red-600 text-2xl font-bold text-center py-1">X</button>';
            cell2.classList.add("py-1", "border", "text-center", "items-center", "w-5", "h-5");

            // Attach delete functionality to the new button
            var deleteButton = cell2.querySelector(".deleteButton");
            deleteButton.addEventListener('click', function() {
                newRow.remove(); // Remove the row when delete button is clicked
            });
        }

        // Event listener for the + button
        var addButton = document.getElementById("addRowButton");
        addButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            var subjectInput = document.getElementById("subjectInput");
            var subjectValue = subjectInput.value.trim();

            if (subjectValue !== '') {
                addRow(subjectValue); // Add row to the table
                subjectInput.value = ''; // Clear input field
            } else {
                alert("Please enter a subject!"); // Alert if input is empty
            }
        });

        // Event listener for form submission
        document.getElementById('inputForm').addEventListener('submit', function(event) {
            var table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
            var rows = table.getElementsByTagName('tr');
            var subjects = [];

            // Loop through rows and collect subjects
            for (var i = 0; i < rows.length; i++) {
                var subject = rows[i].getElementsByTagName('td')[0].textContent;
                subjects.push(subject);
            }

            // Create hidden inputs for each subject and append to the form
            subjects.forEach(function(subject, index) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'subjects[]'; // Name as an array
                input.value = subject;
                document.getElementById('inputForm').appendChild(input);
            });

            // Allow the form to submit
        });
    </script> --}}


    {{-- @endsection --}}

</x-layout>
