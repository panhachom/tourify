<?php


namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Adventure',
            ],
            [
                'name' => 'Cultural',
            ],
            [
                'name' => 'Sport',
            ],
            [
                'name' => 'Food and Drink',
            ],
            [
                'name' => 'History',
            ],
        ];

        Category::insert($categories);
    }
}
