<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:role>{{ $role }}</x-slot:role>
    <!-- content -->
    <!-- Akun Guru -->
    {{-- @section('content') --}}
    <div class="flex flex-col sm:w-auto w-full h-auto bg-white shadow-md mx-auto p-5 rounded-md gap-4">

        <h1 class="text-xl ml-3 font-bold">
            Add Akun Guru
        </h1>

        @if ($errors->any())
        <div class="bg-red-600 text-white text-center p-2 rounded-md border overflow-auto">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                    {{-- The password field must be at least 8 characters.!! --}}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="px-2">
            <form id="inputForm" action="{{ route('guru.store') }}" method="POST" class="flex flex-col gap-2">
                @csrf

                <label for="name" class="flex flex-col gap-1">
                    <span class="font-semibold text-slate-700">Name</span>
                    <input
                        class="lg:w-83 w-auto h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                        value="{{ old('name') }}" type="text" id="name" name="nama" placeholder="Name..."
                        required>
                </label>

                <label for="username" class="flex flex-col gap-1">
                    <span class="font-semibold text-slate-700">Username</span>
                    <input
                        class="lg:w-83 w-auto h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                        value="{{ old('username') }}" type="text" id="username" name="username"
                        placeholder="Username..." required>
                </label>

                <label for="email" class="flex flex-col gap-1">
                    <span class="font-semibold  text-slate-700">Email (Tidak wajib di isi)</span>
                    <input
                        class="lg:w-83 w-auto bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                        value="{{ old('email') }}" type="email" id="email" name="email" placeholder="Email...">
                </label>

                <label for="password" class="flex flex-col gap-1">
                    <span class="font-semibold  text-slate-700">Password</span>
                    <input
                        class="lg:w-83 w-auto h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none"
                        type="password" id="password" name="password" placeholder="Password..." required>
                </label>

                <div id="array-inputs" class="space-y-2">
                    <div class="flex flex-row items-end">

                        <label for="subject" class="flex flex-col gap-1 w-full flex-1">
                            <span class="font-semibold  text-slate-700">
                                Matapelajaran
                            </span>
                            <select name="subject_array[]" id="subjectInput"
                                class="sm:w-83 w-full h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none">
                                Matapelajaran
                                <option value="">Pilih Matapelajaran</option>
                                @foreach ($matapelajaranOptions as $mapel)
                                    <option value="{{ $mapel->id }}">{{ $mapel->name }}</option>
                                @endforeach
                            </select>
                        </label>

                        <button type="button" onclick="addInput()"
                            class="w-12 h-12 border border-slate-700 rounded-md text-center ml-3 font-semibold text-3xl">
                            +
                        </button>
                        
                    </div>
                </div>

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
            div.classList.add('flex', 'flex-row', 'items-end');
            div.innerHTML =
                            `<label for="subject" class="flex flex-col gap-1 w-full flex-1">
                            <select name="subject_array[]" id="subjectInput"
                                class="sm:w-83 w-full h-12 bg-white border border-slate-700 rounded-md px-3 py-2 focus:outline-none">
                                Matapelajaran
                                <option value="">Pilih Matapelajaran</option>
                                @foreach ($matapelajaranOptions as $mapel)
                                    <option value="{{ $mapel->id }}">{{ $mapel->name }}</option>
                                @endforeach
                            </select>
                        </label>

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
