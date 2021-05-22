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
            'name' => 'Блочне відображення',
            'type' => Theme::BLOCK_TYPE,
            'image_preview' => '/img/themes/previews/block-type.png'
        ]);
        Theme::create([
            'name' => 'Відображення списком',
            'type' => Theme::LIST_TYPE,
            'image_preview' => '/img/themes/previews/list-type.png'
        ]);
    }
}
