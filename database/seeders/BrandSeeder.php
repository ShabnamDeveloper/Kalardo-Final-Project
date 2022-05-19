<?php

namespace Database\Seeders;
use App\Models\Brand;

use App\Models\Category;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = Brand::factory()->count(10)->create();
    }
}
