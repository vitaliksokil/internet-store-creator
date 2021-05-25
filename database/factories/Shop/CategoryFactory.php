<?php

namespace Database\Factories\Shop;

use App\Models\Shop\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $file = public_path('img/no-product-image.png');
        $newFile = storage_path('app/public/'.Category::FILE_PATH.'/'.'no-product-image.png');
        if (!is_dir(storage_path('app/public/'.Category::FILE_PATH))){
            mkdir(storage_path('app/public/'.Category::FILE_PATH));
        }
        copy($file,$newFile);
        return [
            'title' => $this->faker->title(),
            'img' => Category::FILE_PATH.'/'.'no-product-image.png',
            'shop_id' => 1
        ];
    }
}
