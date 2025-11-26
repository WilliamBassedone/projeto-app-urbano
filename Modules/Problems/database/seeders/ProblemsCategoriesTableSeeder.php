<?php

namespace Modules\Problems\Database\Seeders;

use Illuminate\Database\Seeder;

class ProblemsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('problems_categories')->insert([
            ['name' => 'Iluminação', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Buraco', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lixo acumulado', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vazamento de água', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sinalização danificada', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
