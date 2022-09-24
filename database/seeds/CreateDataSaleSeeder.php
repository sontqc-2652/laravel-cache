<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;
use App\Sale;

class CreateDataSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', -1);
        User::insert([
            'name' => Str::random(6),
            'email' => 'tqcaoson@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $users = collect(User::all()->modelKeys());
        $data = [];
        for ($i = 0; $i < 50000; $i++) {
            $data[] = [
                'user_id' => $users->random(),
                'product_name' => Str::random(8),
                'product_price' => rand(500, 50000),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        foreach (array_chunk($data, 1000) as $chunk) {
            Sale::insert($chunk);
        }
    }
}
