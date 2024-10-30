<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Matapelajaran;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'roles' => 'admin',
            'username' => 'admin',
        ]);
        // User::create([
        //     'name' => 'Guru',
        //     'email' => 'guru@gmail.com',
        //     'password' => bcrypt('guru'),
        //     'roles' => 'guru',
        //     'username' => 'guru',
        // ]);
        // User::create([
        //     'name' => 'Kelas',
        //     'email' => 'kelas@gmail.com',
        //     'password' => bcrypt('kelas'),
        //     'roles' => 'kelas',
        //     'username' => 'kelas',
        // ]);

        // Matapelajaran::create([
        //     'name' => 'Matematika',
        //     'nick' => 'MTK',
        // ]);
        // Matapelajaran::create([
        //     'name' => 'Bahasa Indonesia',
        //     'nick' => 'B.Indo',
        // ]);
        // Matapelajaran::create([
        //     'name' => 'Publik Speaking',
        //     'nick' => 'PS',
        // ]);

        // Jurusan::create([
        //     'name' => 'Rekayasa Perangkat Lunak',
        //     'nick' => 'RPL',
        // ]);
        // Jurusan::create([
        //     'name' => 'Teknik Komputer Jaringan',
        //     'nick' => 'TKJ',
        // ]);
        // Jurusan::create([
        //     'name' => 'Akuntansi dan Keuangan Lembaga',
        //     'nick' => 'AKL',
        // ]);

        // Siswa::create([
        //     'jurusan_id' => 1,
        //     'sub_kelas' => 1,
        //     'kelas' => 'X',
        //     'nisn' => '12345',
        //     'nama' => 'Justin Hariyanto',
        //     'agama' => 'Buddha',
        //     'gender' => 'Laki-laki',
        //     'tanggal_lahir' => '2024-09-01',
        // ]);
        // Siswa::create([
        //     'jurusan_id' => 1,
        //     'sub_kelas' => 1,
        //     'kelas' => 'X',
        //     'nisn' => '12346',
        //     'nama' => 'Reza Fahlevi',
        //     'agama' => 'Islam',
        //     'gender' => 'Laki-laki',
        //     'tanggal_lahir' => '2024-09-02',
        // ]);
        // Siswa::create([
        //     'jurusan_id' => 1,
        //     'sub_kelas' => 1,
        //     'kelas' => 'X',
        //     'nisn' => '12347',
        //     'nama' => 'Nico Ferdi',
        //     'agama' => 'Kristen Protestan',
        //     'gender' => 'Laki-laki',
        //     'tanggal_lahir' => '2024-09-03',
        // ]);

        // Siswa::create([
        //     'jurusan_id' => 2,
        //     'sub_kelas' => 1,
        //     'kelas' => 'X',
        //     'nisn' => '12348',
        //     'nama' => 'kevin',
        //     'agama' => 'Kristen Protestan',
        //     'gender' => 'Laki-laki',
        //     'tanggal_lahir' => '2024-09-04',
        // ]);
        // Siswa::create([
        //     'jurusan_id' => 2,
        //     'sub_kelas' => 1,
        //     'kelas' => 'X',
        //     'nisn' => '12349',
        //     'nama' => 'budi',
        //     'agama' => 'Islam',
        //     'gender' => 'Laki-laki',
        //     'tanggal_lahir' => '2024-09-05',
        // ]);
        // Siswa::create([
        //     'jurusan_id' => 2,
        //     'sub_kelas' => 1,
        //     'kelas' => 'X',
        //     'nisn' => '12350',
        //     'nama' => 'Tuti',
        //     'agama' => 'Islam',
        //     'gender' => 'Perempuan',
        //     'tanggal_lahir' => '2024-09-06',
        // ]);

        // Siswa::create([
        //     'jurusan_id' => 2,
        //     'sub_kelas' => 1,
        //     'kelas' => 'XI',
        //     'nisn' => '1234',
        //     'nama' => 'Eric',
        //     'agama' => 'Islam',
        //     'gender' => 'Laki-laki',
        //     'tanggal_lahir' => '2024-09-06',
        // ]);
        // Siswa::create([
        //     'jurusan_id' => 2,
        //     'sub_kelas' => 1,
        //     'kelas' => 'XI',
        //     'nisn' => '12357',
        //     'nama' => 'Iric',
        //     'agama' => 'Islam',
        //     'gender' => 'Laki-laki',
        //     'tanggal_lahir' => '2024-09-16',
        // ]);

        // User::create([
        //     'name' => 'reza',
        //     'username' => 'reza',
        //     'roles' => 'kelas',
        //     'email' => 'reza@palep',
        //     'password' => '1234',
        // ]);

        // Kelas::create([
        //     'user_id' => '4',
        //     'jurusan_id' => 1,
        //     'celas' => 'X',
        //     'sub_kelas' => 1,
        // ]);

        // User::create([
        //     'name' => 'justin',
        //     'username' => 'justin',
        //     'roles' => 'kelas',
        //     'email' => 'justin@gmail',
        //     'password' => '1234',
        // ]);

        // Kelas::create([
        //     'user_id' => '5',
        //     'jurusan_id' => 2,
        //     'celas' => 'XI',
        //     'sub_kelas' => 1,
        // ]);
    }
}
