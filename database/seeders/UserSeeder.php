<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levelDirektur = Level::where('name', 'Direktur Utama')->first();
        $levelManagerOperasional = Level::where('name', 'Manager Operasional')->first();
        $levelManagerKeuangan = Level::where('name', 'Manager Keuangan')->first();
        $levelStaffOperasional = Level::where('name', 'Staff Oprasional')->first();
        $levelStaffKeuangan = Level::where('name', 'Staff Keuangan')->first();

        $users = [
            [
                'id' => Str::uuid(),
                'name' => 'Direktur Utama',
                'username' => 'direktur',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'user',
                'level_id' => $levelDirektur->id,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Manager Operasional',
                'username' => 'manager1',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'user',
                'level_id' => $levelManagerOperasional->id,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Manager Keuangan',
                'username' => 'manager2',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'user',
                'level_id' => $levelManagerKeuangan->id,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Staff Oprational',
                'username' => 'staff1',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'user',
                'level_id' => $levelStaffOperasional->id,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Staff Keuangan',
                'username' => 'staff2',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role' => 'user',
                'level_id' => $levelStaffKeuangan->id,
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);
        }
    }
}
