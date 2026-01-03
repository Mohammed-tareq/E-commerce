<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Attribute::truncate();
        AttributeValue::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $attributes = Attribute::create([
            'name' => ['ar' => 'اللون', 'en' => 'Color'],
        ]);

        $attributes->attributeValues()->createMany([
            ['value' => ['ar' => 'أحمر', 'en' => 'Red']],
            ['value' => ['ar' => 'أخضر', 'en' => 'Green']],
            ['value' => ['ar' => 'أزرق', 'en' => 'Blue']],
        ]);

        $attributes = Attribute::create([
            'name' => ['ar' => 'المقاس', 'en' => 'Size'],
        ]);

        $attributes->attributeValues()->createMany([
            ['value' => ['ar' => 'S', 'en' => 'S']],
            ['value' => ['ar' => 'M', 'en' => 'M']],
            ['value' => ['ar' => 'L', 'en' => 'L']],
        ]);

        $attributes = Attribute::create([
            'name' => ['ar' => 'النوع', 'en' => 'Type'],
        ]);

        $attributes->attributeValues()->createMany([
            ['value' => ['ar' => 'رجال', 'en' => 'Men']],
            ['value' => ['ar' => 'نساء', 'en' => 'Women']],
        ]);
    }
}
