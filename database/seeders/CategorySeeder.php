<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = array([
            'category' => 'Developer',
            ],
            [
            'category' => 'Designer',
            ]);
        $pre_count = Category::count();
        if($pre_count <= 0){
            foreach ($categories as $category) {
                Category::create($category);    
            }
        }
    }
}
