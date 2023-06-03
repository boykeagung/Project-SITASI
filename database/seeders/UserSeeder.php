<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Haikal Sucipto',
            'level' => 'tu',
            'username' => '162019035',
            'email' => 'rizkyfeb20@gmail.com',
            'password' => bcrypt('123'),
        ]);
        User::create([
            'name' => 'Yusman',
            'level' => 'koordinator-yudisium',
            'username' => '202020',
            'email' => 'yusmandoank@gmail.com',
            'password' => bcrypt('123'),
        ]);
        User::create([
            'name' => 'Mohammad Dete',
            'level' => 'user',
            'username' => '162019017',
            'email' => 'adeteyah@gmail.com',
            'password' => bcrypt('123'),
            'no_hp' => '085156012239',
            'no_wa' => '085156012239',
            'alamat' => 'Jl. Manisi no.123 Cibiru Cipadung RT6 RW9',
            'ipk' => '3.2',
            'sks' => '146'
            // 'remember_token' => Str::random(60),
        ]);
        // Mahasiswa::truncate();
        // Mahasiswa::create([
        //     'nrp' => '162019029',
        //     'nama_lengkap' => 'daffa alif',
        //     'password' => bcrypt('12345678'),
        //     'level' => 'mahasiswa',
        //     // 'remember_token' => Str::random(60),
        // ]);
        // User::truncate();
        User::create([
            'name' => 'Muhammad Daffa Nur Alif',
            'level' => 'user',
            'username' => '162019028',
            'email' => 'daff@gmail.com',
            'password' => bcrypt('123'),
            // 'remember_token' => Str::random(60),
        ]);
        User::create([
            'name' => 'Nur Fitrianti Farhanudin',
            'level' => 'koordinator',
            'username' => '162019029',
            'email' => 'nur@gmail.com',
            'password' => bcrypt('123'),
            // 'remember_token' => Str::random(60),
        ]);
        User::create([
            'name' => 'Mira Musrini',
            'level' => 'dosen',
            'username' => '162019030',
            'email' => 'Mira@gmail.com',
            'password' => bcrypt('123'),
            // 'remember_token' => Str::random(60),
        ]);
        User::create([
            'name' => 'Keanu',
            'level' => 'tu',
            'username' => '162019031',
            'email' => 'keanu@gmail.com',
            'password' => bcrypt('123'),
            // 'remember_token' => Str::random(60),
        ]);
        User::create([
            'name' => 'Muhammad Ridwan Prasetyo',
            'level' => 'user',
            'username' => '162019032',
            'email' => 'ridwan@gmail.com',
            'password' => bcrypt('123'),
            // 'remember_token' => Str::random(60),
        ]);
        User::create([
            'name' => 'Sofia Umaroh',
            'level' => 'koordinator',
            'username' => '162019033',
            'email' => 'sofia@gmail.com',
            'password' => bcrypt('123'),
            // 'remember_token' => Str::random(60),
        ]);
        User::create([
            'name' => 'Budi Raharjo',
            'level' => 'dosen',
            'username' => '162019034',
            'email' => 'budi@gmail.com',
            'password' => bcrypt('123'),
            // 'remember_token' => Str::random(60),
        ]);
        User::create([
            'name' => 'diky',
            'level' => 'koordinator-kp',
            'username' => '162019016',
            'email' => 'dkfauzzi@gmail.com',
            'password' => bcrypt('123'),
            // 'remember_token' => Str::random(60),
        ]);

        User::create([
            'name' => 'akmal',
            'level' => 'user',
            'username' => '162019100',
            'email' => 'dkfauzzi@gmail.com',
            'password' => bcrypt('123'),
            // 'remember_token' => Str::random(60),
        ]);

        User::create([
            'name' => 'Rizky Triyadi',
            'level' => 'user',
            'username' => '162019001',
            'email' => 'dkfauzzi@gmail.com',
            'password' => bcrypt('123'),
            // 'remember_token' => Str::random(60),
        ]);

    }
}