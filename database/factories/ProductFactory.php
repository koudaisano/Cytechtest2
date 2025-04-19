<?php

namespace Database\Factories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class; // ← 追加するとより明示的
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'product_name' => $this-> faker-> word,
        'price' => $this -> faker -> randomFloat(0, 100, 250),
        //0は小数点以下の桁数で0なので整数・100円が最小値・250円が最大値でランダムに入れる。
        'company_id' => function(){
            return \App\Models\Companie::inRandomOrder()->first()->id;
        }, //既存の会社IDをランダムに割り当てる
        'stock' => $this->faker->numberBetween(1, 30),
        'comment' => $this->faker->sentence,
        ];
    }
}
