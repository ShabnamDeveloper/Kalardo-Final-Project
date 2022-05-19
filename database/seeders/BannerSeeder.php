<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Banner;
use App\Models\BannerImage;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::factory()->count(10)->create()->each(function($table){
            $table->bannerImages()->save(BannerImage::factory()->create());
        });
    }
}
