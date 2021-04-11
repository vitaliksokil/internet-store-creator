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
        ShopType::create(['type'=>'Child\'s world','icon'=>'<i class="fas fa-baby-carriage"></i>']);
        ShopType::create(['type'=>'Property','icon'=>'<i class="fas fa-home"></i>']);
        ShopType::create(['type'=>'Transport','icon'=>'<i class="fas fa-car"></i>']);
        ShopType::create(['type'=>'Spare parts for transport','icon'=>'<i class="fas fa-tools"></i>']);
        ShopType::create(['type'=>'Animals','icon'=>'<i class="fas fa-paw"></i>']);
        ShopType::create(['type'=>'Garden','icon'=>'<i class="fas fa-seedling"></i>']);
        ShopType::create(['type'=>'Electronics','icon'=>'<i class="fas fa-mobile-alt"></i>']);
        ShopType::create(['type'=>'Fashion & Style','icon'=>'<i class="fas fa-tshirt"></i>']);
        ShopType::create(['type'=>'Hobbies, leisure and sports','icon'=>'<i class="fas fa-table-tennis"></i>']);
        ShopType::create(['type'=>'Beauty and health','icon'=>'<i class="fas fa-heartbeat"></i>']);
        ShopType::create(['type'=>'Other','icon'=>'<i class="fas fa-ellipsis-h"></i>']);
    }
}
