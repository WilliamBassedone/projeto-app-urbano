<?php

namespace Modules\Problems\Database\Seeders;

use Illuminate\Database\Seeder;

class ProblemsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            ProblemsCategoriesTableSeeder::class,
        ]);
    }
}
