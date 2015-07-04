<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use CodeCommerce\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        Category::create(
            [
                'name' => 'TV',
                'description' => 'Tudo sobre televisores.'
            ]);

        Category::create(
            [
                'name' => 'Informática',
                'description' => 'Tudo sobre informática.'
            ]);
    }
}
