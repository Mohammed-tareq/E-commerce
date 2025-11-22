<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            // القاهرة
            ['id' => 1, 'governorate_id' => 1, 'name' => ['ar' => 'القاهرة', 'en' => 'Cairo']],
            ['id' => 2, 'governorate_id' => 1, 'name' => ['ar' => 'الزمالك', 'en' => 'Zamalek']],
            ['id' => 3, 'governorate_id' => 1, 'name' => ['ar' => 'المعادي', 'en' => 'Maadi']],
            ['id' => 4, 'governorate_id' => 1, 'name' => ['ar' => 'مدينة نصر', 'en' => 'Nasr City']],
            ['id' => 5, 'governorate_id' => 1, 'name' => ['ar' => 'المقطم', 'en' => 'El Mokattam']],

            // الجيزة
            ['id' => 6, 'governorate_id' => 2, 'name' => ['ar' => 'الجيزة', 'en' => 'Giza']],
            ['id' => 7, 'governorate_id' => 2, 'name' => ['ar' => 'الهرم', 'en' => 'Al Haram']],
            ['id' => 8, 'governorate_id' => 2, 'name' => ['ar' => 'الطالبية', 'en' => 'Tebbin']],

            // الإسكندرية
            ['id' => 9, 'governorate_id' => 3, 'name' => ['ar' => 'الإسكندرية', 'en' => 'Alexandria']],
            ['id' => 10, 'governorate_id' => 3, 'name' => ['ar' => 'سموحة', 'en' => 'Smouha']],
            ['id' => 11, 'governorate_id' => 3, 'name' => ['ar' => 'المنتزه', 'en' => 'Montaza']],
            ['id' => 12, 'governorate_id' => 3, 'name' => ['ar' => 'محرم بك', 'en' => 'Moharam Bek']],

            // الدقهلية
            ['id' => 13, 'governorate_id' => 4, 'name' => ['ar' => 'المنصورة', 'en' => 'Mansoura']],
            ['id' => 14, 'governorate_id' => 4, 'name' => ['ar' => 'طلخا', 'en' => 'Talkha']],
            ['id' => 15, 'governorate_id' => 4, 'name' => ['ar' => 'ميت غمر', 'en' => 'Mit Ghamr']],

            // البحر الأحمر
            ['id' => 16, 'governorate_id' => 5, 'name' => ['ar' => 'الغردقة', 'en' => 'Hurghada']],
            ['id' => 17, 'governorate_id' => 5, 'name' => ['ar' => 'رأس غارب', 'en' => 'Ras Gharib']],

            // البحيرة
            ['id' => 18, 'governorate_id' => 6, 'name' => ['ar' => 'دمنهور', 'en' => 'Damanhur']],
            ['id' => 19, 'governorate_id' => 6, 'name' => ['ar' => 'رشيد', 'en' => 'Rashid']],
            ['id' => 20, 'governorate_id' => 6, 'name' => ['ar' => 'كفر الدوار', 'en' => 'Kafr El Dawar']],

            // الفيوم
            ['id' => 21, 'governorate_id' => 7, 'name' => ['ar' => 'الفيوم', 'en' => 'Fayoum']],
            ['id' => 22, 'governorate_id' => 7, 'name' => ['ar' => 'طامية', 'en' => 'Tamiya']],
            ['id' => 23, 'governorate_id' => 7, 'name' => ['ar' => 'سنورس', 'en' => 'Sinnuris']],

            // القليوبية
            ['id' => 24, 'governorate_id' => 8, 'name' => ['ar' => 'بنها', 'en' => 'Banha']],
            ['id' => 25, 'governorate_id' => 8, 'name' => ['ar' => 'القناطر', 'en' => 'Qanater']],

            // المنوفية
            ['id' => 26, 'governorate_id' => 9, 'name' => ['ar' => 'شبين الكوم', 'en' => 'Shebin El Kom']],
            ['id' => 27, 'governorate_id' => 9, 'name' => ['ar' => 'منوف', 'en' => 'Menouf']],
            ['id' => 28, 'governorate_id' => 9, 'name' => ['ar' => 'السادات', 'en' => 'Sadat City']],

            // المنيا
            ['id' => 29, 'governorate_id' => 10, 'name' => ['ar' => 'المنيا', 'en' => 'Minya']],
            ['id' => 30, 'governorate_id' => 10, 'name' => ['ar' => 'العدوة', 'en' => 'El Adwa']],
            ['id' => 31, 'governorate_id' => 10, 'name' => ['ar' => 'مغاغة', 'en' => 'Magagha']],

            // الوادي الجديد
            ['id' => 32, 'governorate_id' => 11, 'name' => ['ar' => 'الخارجة', 'en' => 'Kharga']],
            ['id' => 33, 'governorate_id' => 11, 'name' => ['ar' => 'باريس', 'en' => 'Paris']],

            // السويس
            ['id' => 34, 'governorate_id' => 12, 'name' => ['ar' => 'السويس', 'en' => 'Suez']],

            // أسوان
            ['id' => 35, 'governorate_id' => 13, 'name' => ['ar' => 'أسوان', 'en' => 'Aswan']],
            ['id' => 36, 'governorate_id' => 13, 'name' => ['ar' => 'نصر النوبة', 'en' => 'Nasser City']],

            // أسيوط
            ['id' => 37, 'governorate_id' => 14, 'name' => ['ar' => 'أسيوط', 'en' => 'Asyut']],
            ['id' => 38, 'governorate_id' => 14, 'name' => ['ar' => 'ديروط', 'en' => 'Deirout']],

            // بني سويف
            ['id' => 39, 'governorate_id' => 15, 'name' => ['ar' => 'بني سويف', 'en' => 'Beni Suef']],
            ['id' => 40, 'governorate_id' => 15, 'name' => ['ar' => 'ناصر', 'en' => 'Nasser']],

            // بورسعيد
            ['id' => 41, 'governorate_id' => 16, 'name' => ['ar' => 'بورسعيد', 'en' => 'Port Said']],

            // دمياط
            ['id' => 42, 'governorate_id' => 17, 'name' => ['ar' => 'دمياط', 'en' => 'Damietta']],
            ['id' => 43, 'governorate_id' => 17, 'name' => ['ar' => 'رأس البر', 'en' => 'Ras El Bar']],

            // الشرقية
            ['id' => 44, 'governorate_id' => 18, 'name' => ['ar' => 'الزقازيق', 'en' => 'Zagazig']],
            ['id' => 45, 'governorate_id' => 18, 'name' => ['ar' => 'أبوحماد', 'en' => 'Abu Hammad']],

            // سوهاج
            ['id' => 46, 'governorate_id' => 19, 'name' => ['ar' => 'سوهاج', 'en' => 'Sohag']],
            ['id' => 47, 'governorate_id' => 19, 'name' => ['ar' => 'جبل بني عبد', 'en' => 'Jabal Bani Abd']],

            // كفر الشيخ
            ['id' => 48, 'governorate_id' => 20, 'name' => ['ar' => 'كفر الشيخ', 'en' => 'Kafr El Sheikh']],
            ['id' => 49, 'governorate_id' => 20, 'name' => ['ar' => 'دسوق', 'en' => 'Desouq']],

            // مطروح
            ['id' => 50, 'governorate_id' => 21, 'name' => ['ar' => 'مطروح', 'en' => 'Matrouh']],
            ['id' => 51, 'governorate_id' => 21, 'name' => ['ar' => 'النجيلة', 'en' => 'El Negaila']],

            // الأقصر
            ['id' => 52, 'governorate_id' => 22, 'name' => ['ar' => 'الأقصر', 'en' => 'Luxor']],
            ['id' => 53, 'governorate_id' => 22, 'name' => ['ar' => 'طيبة', 'en' => 'Thebes']],

            // قنا
            ['id' => 54, 'governorate_id' => 23, 'name' => ['ar' => 'قنا', 'en' => 'Qena']],
            ['id' => 55, 'governorate_id' => 23, 'name' => ['ar' => 'نجع حمادي', 'en' => 'Nag Hammadi']],

            ['id' => 56, 'governorate_id' => 24, 'name' => ['ar' => 'الرياض', 'en' => 'Riyadh']],
            ['id' => 57, 'governorate_id' => 24, 'name' => ['ar' => 'الدمام', 'en' => 'Dammam']], ['id' => 58, 'governorate_id' => 25, 'name' => ['ar' => 'جدة', 'en' => 'Jeddah']],
            ['id' => 59, 'governorate_id' => 26, 'name' => ['ar' => 'مكة المكرمة', 'en' => 'Mecca']],
            ['id' => 60, 'governorate_id' => 26, 'name' => ['ar' => 'الطائف', 'en' => 'Taif']],
            ['id' => 61, 'governorate_id' => 27, 'name' => ['ar' => 'المدينة المنورة', 'en' => 'Medina']],
            ['id' => 62, 'governorate_id' => 28, 'name' => ['ar' => 'أبوظبي', 'en' => 'Abu Dhabi']],
            ['id' => 63, 'governorate_id' => 29, 'name' => ['ar' => 'دبي', 'en' => 'Dubai']], ['id' => 64, 'governorate_id' => 30, 'name' => ['ar' => 'الشارقة', 'en' => 'Sharjah']],
            ['id' => 65, 'governorate_id' => 30, 'name' => ['ar' => 'عجمان', 'en' => 'Ajman']],


            ['id' => 66, 'governorate_id' => 31, 'name' => ['ar' => 'الكويت', 'en' => 'Kuwait City']],




        ];

        foreach ($cities as $city)
        {
            City::create($city);
        }

    }
}
