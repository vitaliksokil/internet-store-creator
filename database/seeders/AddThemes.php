<?php

namespace Database\Seeders;

use App\Models\Shop\Theme;
use Illuminate\Database\Seeder;

class AddThemes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Theme::create([
            'name' => 'Block Theme',
            'type' => Theme::BLOCK_TYPE
        ]);
        Theme::create([
            'name' => 'List Theme',
            'type' => Theme::LIST_TYPE
        ]);
    }
}
