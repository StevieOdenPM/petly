<?php

namespace Database\Seeders;

use App\Models\PetType;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Product::factory(50)->create();

        Product::create([
            'product_name' => 'Smartheart 1 Kg Makanan Kelinci Rasa Apel',
            'product_desc' => 'Rasa apel
Menjaga kesehatan kulit dan bulu kelinci
Kaya vitamin dan mineral',
            'product_product_type_id' => 1,
            'pet_pet_types_id' => 3,
            'product_image' => 'https://images.tokopedia.net/img/cache/700/hDjmkQ/2025/3/7/8f24522d-658b-46a0-91b2-3ec3518a49a7.jpg.webp?ect=4g',
            'product_stock' => fake()->numberBetween(1, 100),
            'product_rating' => fake()->numberBetween(1, 10),
            'product_price' => fake()->randomNumber(5,true),
        ]);

        Product::create([
            'product_name' => 'Royal Canin 3 Kg Makanan Anjing Kering Adult Cihuahua',
            'product_desc' => 'Makanan khusus untuk anjing Chihuahua
Kandungan nutrisi lengkap dan seimbang untuk sistem imun atau kekebalan tubuh
Menjaga kesehatan bulu agar lebih lebat dan berkilau
Mendukung kesehatan, gigi, tulang, dan persendian
Mencegah masalah pencernaan
Merangsang nafsu makan anjing
Mengurangi bau tidak sedap pada kotoran anjing
Rasa lezat yang disukai anjing
Memiliki bentuk dan ukuran kibble yang disesuaikan secara khusus',
            'product_product_type_id' => 1,
            'pet_pet_types_id' => 1,
            'product_image' => 'https://images.tokopedia.net/img/cache/700/hDjmkQ/2025/2/13/3c04fa21-cdc1-4c11-8baa-721ae95ebefc.jpg.webp?ect=4g',
            'product_stock' => fake()->numberBetween(10, 100),
            'product_rating' => fake()->numberBetween(5, 10),
            'product_price' => fake()->randomNumber(5,true),
        ]);
    }
}
