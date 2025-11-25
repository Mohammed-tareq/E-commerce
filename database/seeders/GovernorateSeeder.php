<?php

namespace Database\Seeders;

use App\Models\Governorate;
use App\Models\ShippingPrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $governorates = [
            ['id' => 1, 'country_id' => 1, 'name' => ['ar' => 'القاهرة', 'en' => 'Cairo']],
            ['id' => 2, 'country_id' => 1, 'name' => ['ar' => 'الجيزة', 'en' => 'Giza']],
            ['id' => 3, 'country_id' => 1, 'name' => ['ar' => 'الإسكندرية', 'en' => 'Alexandria']],
            ['id' => 4, 'country_id' => 1, 'name' => ['ar' => 'الدقهلية', 'en' => 'Dakahlia']],
            ['id' => 5, 'country_id' => 1, 'name' => ['ar' => 'البحر الأحمر', 'en' => 'Red Sea']],
            ['id' => 6, 'country_id' => 1, 'name' => ['ar' => 'البحيرة', 'en' => 'Beheira']],
            ['id' => 7, 'country_id' => 1, 'name' => ['ar' => 'الفيوم', 'en' => 'Fayoum']],
            ['id' => 8, 'country_id' => 1, 'name' => ['ar' => 'القليوبية', 'en' => 'Qalyubia']],
            ['id' => 9, 'country_id' => 1, 'name' => ['ar' => 'المنوفية', 'en' => 'Monufia']],
            ['id' => 10, 'country_id' => 1, 'name' => ['ar' => 'المنيا', 'en' => 'Minya']],
            ['id' => 11, 'country_id' => 1, 'name' => ['ar' => 'الوادي الجديد', 'en' => 'New Valley']],
            ['id' => 12, 'country_id' => 1, 'name' => ['ar' => 'السويس', 'en' => 'Suez']],
            ['id' => 13, 'country_id' => 1, 'name' => ['ar' => 'أسوان', 'en' => 'Aswan']],
            ['id' => 14, 'country_id' => 1, 'name' => ['ar' => 'أسيوط', 'en' => 'Asyut']],
            ['id' => 15, 'country_id' => 1, 'name' => ['ar' => 'بني سويف', 'en' => 'Beni Suef']],
            ['id' => 16, 'country_id' => 1, 'name' => ['ar' => 'بورسعيد', 'en' => 'Port Said']],
            ['id' => 17, 'country_id' => 1, 'name' => ['ar' => 'دمياط', 'en' => 'Damietta']],
            ['id' => 18, 'country_id' => 1, 'name' => ['ar' => 'الشرقية', 'en' => 'Sharqia']],
            ['id' => 19, 'country_id' => 1, 'name' => ['ar' => 'سوهاج', 'en' => 'Sohag']],
            ['id' => 20, 'country_id' => 1, 'name' => ['ar' => 'كفر الشيخ', 'en' => 'Kafr El Sheikh']],
            ['id' => 21, 'country_id' => 1, 'name' => ['ar' => 'مطروح', 'en' => 'Matrouh']],
            ['id' => 22, 'country_id' => 1, 'name' => ['ar' => 'الأقصر', 'en' => 'Luxor']],
            ['id' => 23, 'country_id' => 1, 'name' => ['ar' => 'قنا', 'en' => 'Qena']],
            // السعودية
            ['id' => 24, 'country_id' => 2, 'name' => ['ar' => 'الرياض', 'en' => 'Riyadh']],
            ['id' => 25, 'country_id' => 2, 'name' => ['ar' => 'مكة المكرمة', 'en' => 'Mecca']],
            ['id' => 26, 'country_id' => 2, 'name' => ['ar' => 'المدينة المنورة', 'en' => 'Medina']],
            ['id' => 27, 'country_id' => 2, 'name' => ['ar' => 'جدة', 'en' => 'Jeddah']],

            // الإمارات
            ['id' => 28, 'country_id' => 3, 'name' => ['ar' => 'أبوظبي', 'en' => 'Abu Dhabi']],
            ['id' => 29, 'country_id' => 3, 'name' => ['ar' => 'دبي', 'en' => 'Dubai']],
            ['id' => 30, 'country_id' => 3, 'name' => ['ar' => 'الشارقة', 'en' => 'Sharjah']],
            ['id' => 31, 'country_id' => 3, 'name' => ['ar' => 'عجمان', 'en' => 'Ajman']],
        ];

        foreach($governorates as  $governorate)
        {
           $gov = Governorate::create($governorate);


           ShippingPrice::create([
               'price' => random_int(1000, 10000),
               'governorate_id' => $gov->id
           ]);
        }
    }
}
