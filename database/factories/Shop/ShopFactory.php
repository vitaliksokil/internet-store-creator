<?php

namespace Database\Factories\Shop;

use App\Models\Shop\Shop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $file = public_path('img/no-product-image.png');
        $newFile = storage_path('app/public/'.Shop::FILE_PATH.'/'.'no-product-image.png');
        if (!is_dir(storage_path('app/public/'.Shop::FILE_PATH))){
            mkdir(storage_path('app/public/'.Shop::FILE_PATH));
        }
        copy($file,$newFile);
        $title = $this->faker->title(). Str::random(5);
        return [
            'name' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->text(),
            'img' => Shop::FILE_PATH.'/'.'no-product-image.png',
            'address' => $this->faker->title(),
            'phone_number' => $this->faker->title(),
            'email' => $this->faker->title().'@gmail.com',
            'shop_type_id' => 9,
            'currency' => 'uah',
            'owner_id' => User::factory()->create()->id,
        ];
    }
}
