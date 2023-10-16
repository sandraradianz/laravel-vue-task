<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hobby;

class HobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $hobbies = array([
            'hobby' => 'Programming',
            ],
            [
            'hobby' => 'Gamming',
            ],
            [
            'hobby' => 'Reading',
            ]);
        $pre_count = Hobby::count();
        if($pre_count <= 0){
            foreach ($hobbies as $hobby) {
                Hobby::create($hobby);    
            }
        }
    }
}
