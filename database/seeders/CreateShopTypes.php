<?php

namespace Database\Seeders;

use App\Models\Shop\ShopType;
use Illuminate\Database\Seeder;

class CreateShopTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShopType::create([
            'type' => 'Дитячий світ',
            'icon' => '<i class="fas fa-child"></i>',
            'image' => 'img/shopTypes/child.jpg'
        ]);
        ShopType::create([
            'type' => 'Нерухомість',
            'icon' => '<i class="fas fa-home"></i>',
            'image' => 'img/shopTypes/property.jpg'
        ]);
        ShopType::create([
            'type' => 'Транспорт',
            'icon' => '<i class="fas fa-car"></i>',
            'image' => 'img/shopTypes/transport.jpg'
        ]);
        ShopType::create([
            'type' => 'Запчастини для транспорту',
            'icon' => '<i class="fas fa-wrench"></i>',
            'image' => 'img/shopTypes/tools.jpg'
        ]);
        ShopType::create([
            'type' => 'Тварини',
            'icon' => '<i class="fas fa-paw"></i>',
            'image' => 'img/shopTypes/animals.png'
        ]);
        ShopType::create([
            'type' => 'Сад',
            'icon' => '<i class="fas fa-seedling"></i>',
            'image' => 'img/shopTypes/garden.jpg'
        ]);
        ShopType::create([
            'type' => 'Електроніка',
            'icon' => '<i class="fas fa-mobile-alt"></i>',
            'image' => 'img/shopTypes/electronics.jpg'
        ]);
        ShopType::create([
            'type' => 'Мода і стиль',
            'icon' => '<i class="fas fa-tshirt"></i>',
            'image' => 'img/shopTypes/style.jpg'
        ]);
        ShopType::create([
            'type' => 'Хобі, відпочинок і спорт',
            'icon' => '<i class="fas fa-table-tennis"></i>',
            'image' => 'img/shopTypes/sport.jpg'
        ]);
        ShopType::create([
            'type' => 'Краса і здоров\'я',
            'icon' => '<i class="fas fa-heartbeat"></i>',
            'image' => 'img/shopTypes/beauty.jpg'
        ]);
        ShopType::create([
            'type' => 'Інше',
            'icon' => '<i class="fas fa-ellipsis-h"></i>',
            'image' => 'img/shopTypes/other.jpg'
        ]);
    }
}
