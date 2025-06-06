<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::truncate();

        Category::insert([
            [
                'name' => 'My Story',
                'sort_order' => 1,
            ],
            [
                'name' => 'Technology',
                'sort_order' => 2,
            ],
            [
                'name' => 'News',
                'sort_order' => 3,
            ],
        ]);
    }
}
