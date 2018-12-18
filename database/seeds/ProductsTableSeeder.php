<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 10; $i++) { 
            $url = $faker->image($dir=public_path().'/images/products', $width='500', $height='500');
            $image = substr($url, strpos($url, '\\')+1);

            Product::create([
                'name' => $faker->sentence($nbWords = 5, $variableNbWords = true),
                'description' => $faker->sentence($nbWords = 20, $variableNbWords = true),
                'image' => $image,
                'price' => $faker->numberBetween(10000, 1000000),
                'quantity' => $faker->numberBetween(0, 100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
