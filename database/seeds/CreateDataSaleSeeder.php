<?php

use Illuminate\Database\Seeder;
use User;
use Sale;

class CreateDataSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = collect(User::all()->modelKeys());
        $data = [];
        for ($i = 0; $i < 50000; $i++) {
            $data[] = [
                'user_id' => $users->random(),
                'product_name' => fake()->words(4, true),
                'product_price' => fake()->randomFloat(2, 10, 999),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        foreach (array_chunk($data, 1000) as $chunk) {
            Sale::insert($chunk);
        }
    }
}
