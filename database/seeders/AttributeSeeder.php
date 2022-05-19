<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attribute = Attribute::factory()->count(10)->create();
        $attrValue = AttributeValue::factory()->count(10)->create();

        Product::factory()->count(10)->create()->each(function($table) use($attrValue,$attribute){
            $table->attributes()->attach(
                $attribute->pluck('id')->random(),
                ['value_id'=> $attrValue->pluck('id')->random()]
            );
        });
    }
}
