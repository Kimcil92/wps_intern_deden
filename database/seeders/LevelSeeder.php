<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            [
                'id' => Str::uuid(),
                'name' => 'Direktur Utama',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Manager Operasional',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Manager Keuangan',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Staff Oprasional',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Staff Keuangan',
            ],
        ];

        foreach ($levels as $levelData) {
            $level = Level::create($levelData);
        }
    }
}
