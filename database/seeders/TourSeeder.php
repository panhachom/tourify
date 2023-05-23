<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tours')->insert([
            'name' => 'Kompot',
            'description' => 'Kampot is a province in southwest Cambodia, edging onto the Gulf of Thailand.',
            'price' => '150',
            'capacity' => '6',
            'qty' => '6',
            'created_at' => NULL,
            'updated_at' => NULL,
            'vendor_id'=> '1'
            // 'password' => Hash::make('john@123')
        ]);
    }
}
