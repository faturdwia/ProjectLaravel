<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(['Tutorial', 'Job', 'Article']);
        $categories->each(function ($c) {
            Category::create([
                'name' => $c,
                'slug' => Str::slug($c)
            ]);
        });
    }
}
