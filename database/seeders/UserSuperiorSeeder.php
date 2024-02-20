<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserSuperior;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSuperiorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mendapatkan ID pengguna dengan role Direktur Utama
        $direktur = User::where('role', 'user')->whereHas('level', function ($query) {
            $query->where('name', 'Direktur Utama');
        })->first();

        // Mendapatkan ID pengguna dengan role Manager Operasional
        $managerOperasional = User::where('role', 'user')->whereHas('level', function ($query) {
            $query->where('name', 'Manager Operasional');
        })->first();

        // Mendapatkan ID pengguna dengan role Manager Keuangan
        $managerKeuangan = User::where('role', 'user')->whereHas('level', function ($query) {
            $query->where('name', 'Manager Keuangan');
        })->first();

        // Mendapatkan ID pengguna dengan role Staff Oprasional
        $staffOperasional = User::where('role', 'user')->whereHas('level', function ($query) {
            $query->where('name', 'Staff Oprasional');
        })->first();

        // Mendapatkan ID pengguna dengan role Staff Keuangan
        $staffKeuangan = User::where('role', 'user')->whereHas('level', function ($query) {
            $query->where('name', 'Staff Keuangan');
        })->first();

        // Menambahkan atasan untuk setiap pengguna sesuai dengan hierarki
        UserSuperior::create([
            'user_id' => $managerOperasional->id,
            'superior_id' => $direktur->id,
        ]);

        UserSuperior::create([
            'user_id' => $managerKeuangan->id,
            'superior_id' => $direktur->id,
        ]);

        UserSuperior::create([
            'user_id' => $staffOperasional->id,
            'superior_id' => $managerOperasional->id,
        ]);

        UserSuperior::create([
            'user_id' => $staffKeuangan->id,
            'superior_id' => $managerKeuangan->id,
        ]);
    }
}
