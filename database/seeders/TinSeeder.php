<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\loaiTin;
use App\Models\Product;
use App\Models\tin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        loaiTin::factory(5)->create();
        tin::factory(10)->create();
        User::factory(5)->create();
        Product::factory(15)->create();

        for ($i = 1; $i < 11; $i++) {
            DB::table('customers')->insert([
                'name' => fake()->text(20),
                'email' => fake()->unique()->safeEmail(),
                'address' => fake()->address(),
            ]);
        }
        for ($i = 1; $i < 11; $i++) {
            DB::table('orders')->insert([
                'customer_id' => rand(2, 9),
                'total' => fake()->numberBetween(1, 100)
            ]);
        }
        for ($i = 1; $i < 11; $i++) {
            DB::table('order_items')->insert([
                'order_id' => rand(2, 9),
                'product_id' => rand(2, 9),
            ]);
        }
        for ($i = 1; $i < 11; $i++) {
            DB::table('sales')->insert([
                'name' => fake()->text(20),
                'amount' => fake()->numberBetween(1, 100)
            ]);
        }
        for ($i = 1; $i < 11; $i++) {
            DB::table('logs')->insert([
                'content' => fake()->text(50),
            ]);
        }
        for ($i = 1; $i < 11; $i++) {
            DB::table('departments')->insert([
                'name' => fake()->text(20),
            ]);
        }
        for ($i = 1; $i < 11; $i++) {
            DB::table('employes')->insert([
                'department_id' => rand(2, 9),
                'name' => fake()->text(20),
            ]);
        }
    }
}
