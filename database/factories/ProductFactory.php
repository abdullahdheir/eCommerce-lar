<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    public function definition()
    {
        $product_name = $this->faker->words($nb = 4, $asText = true);
        $slug = Str::slug($product_name);
        return [
            'name' => $product_name,
            'slug' => $slug,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(100, 1000),
            'sale_price' => $this->faker->numberBetween(100, 1000),
            'SKU' => 'DIGI' . $this->faker->unique()->numberBetween(100, 1000),
            'stock_status' => 'inStock',
            'featured' => $this->faker->boolean,
            'image' => 'digital_' . $this->faker->numberBetween(01, 20) . '.jpg',
            'veiws' => $this->faker->numberBetween(100, 1000),
            'category_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
