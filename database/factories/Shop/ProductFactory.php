<?php

namespace Database\Factories\Shop;

use App\Models\Shop\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $file = public_path('img/no-product-image.png');
        $newFile = storage_path('app/public/'.Product::FILE_PATH.'/'.'no-product-image.png');
        if (!is_dir(storage_path('app/public/'.Product::FILE_PATH))){
            mkdir(storage_path('app/public/'.Product::FILE_PATH));
        }
        copy($file,$newFile);
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(2000,10000),
            'img' => Product::FILE_PATH.'/'.'no-product-image.png',
            'category_id' => 1,
            'is_published' => 1
        ];
    }
}
