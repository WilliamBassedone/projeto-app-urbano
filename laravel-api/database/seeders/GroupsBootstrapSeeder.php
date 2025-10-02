<?php

// namespace Database\Seeders;
namespace Modules\Groups\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Groups\Models\Group;

class GroupsBootstrapSeeder extends Seeder
{
    public function run(): void
    {
        Group::firstOrCreate(['name' => 'Administradores'], [
            'can_view' => true,
            'can_create' => true,
            'can_edit' => true,
            'can_delete' => true,
            'can_toggle' => true,
            'can_download' => true,
            'can_upload' => true,
        ]);

        Group::firstOrCreate(['name' => 'Leitura'], [
            'can_view' => true,
            'can_create' => false,
            'can_edit' => false,
            'can_delete' => false,
            'can_toggle' => false,
            'can_download' => true,
            'can_upload' => false,
        ]);
    }
}
