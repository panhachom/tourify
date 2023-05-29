<?php


namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
            'name' => 'Adventure',
            'created_at' => NULL,
            'updated_at' => NULL
            // 'password' => Hash::make('john@123')
            ],
            [
            'name' => 'Cultural',
            'created_at' => NULL,
            'updated_at' => NULL
            ],
            [
            'name' => 'Sport',
            'created_at' => NULL,
            'updated_at' => NULL
            ],
            [
            'name' => 'Food and Drink',
            'created_at' => NULL,
            'updated_at' => NULL
            ],
            [
            'name' => 'History',
            'created_at' => NULL,
            'updated_at' => NULL
            ]
        ]
    );
    }
}
    