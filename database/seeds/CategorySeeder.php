<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Frontend', 'Backend', 'Fullstack', 'Laravel', 'Vue'];

        foreach ($categories as $category) {
            $_cat = new Category();
            $_cat->name = $category;
            $_cat->slug = Str::slug($_cat->name);
            $_cat->save();
        }
    }
}
