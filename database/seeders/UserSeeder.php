<?php


namespace Database\Seeders;
use App\Models\User;
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
        DB::table('users')->insert([
            [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'role' => 'admin',
            'phone_number' => '085539801',
            'password' => bcrypt('12345678'),
            'created_at' => NULL,
            'updated_at' => NULL
            // 'password' => Hash::make('john@123')
            ],
            [
                'name' => 'Muny',
                'email' => 'muny@gmail.com',
                'username' => 'muny',
                'role' => 'admin',
                'phone_number' => '012387394',
                'password' => bcrypt('12345678'),
                'created_at' => NULL,
                'updated_at' => NULL
                // 'password' => Hash::make('john@123')
                ],
                [
                    'name' => 'Setha',
                    'email' => 'Setha@gmail.com',
                    'username' => 'setha',
                    'role' => 'admin',
                    'phone_number' => '096578964',
                    'password' => bcrypt('12345678'),
                    'created_at' => NULL,
                    'updated_at' => NULL
                    // 'password' => Hash::make('john@123')
                    ],
        ]
    );
    }
}
