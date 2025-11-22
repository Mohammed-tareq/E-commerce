<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        $countries = [
            ['id' => 1, 'name' => ['ar' => 'مصر', 'en' => 'Egypt'], 'phone_code' => '+20', 'status' => false],
            ['id' => 2, 'name' => ['ar' => 'السعودية', 'en' => 'Saudi Arabia'], 'phone_code' => '+966', 'status' => false],
            ['id' => 3, 'name' => ['ar' => 'الإمارات', 'en' => 'United Arab Emirates'], 'phone_code' => '+971', 'status' => false],
            ['id' => 4, 'name' => ['ar' => 'الكويت', 'en' => 'Kuwait'], 'phone_code' => '+965', 'status' => false],
            ['id' => 5, 'name' => ['ar' => 'قطر', 'en' => 'Qatar'], 'phone_code' => '+974', 'status' => false],
            ['id' => 6, 'name' => ['ar' => 'البحرين', 'en' => 'Bahrain'], 'phone_code' => '+973', 'status' => false],
            ['id' => 7, 'name' => ['ar' => 'عُمان', 'en' => 'Oman'], 'phone_code' => '+968', 'status' => false],
            ['id' => 8, 'name' => ['ar' => 'الأردن', 'en' => 'Jordan'], 'phone_code' => '+962', 'status' => false],
            ['id' => 9, 'name' => ['ar' => 'فلسطين', 'en' => 'Palestine'], 'phone_code' => '+970', 'status' => false],
            ['id' => 10, 'name' => ['ar' => 'لبنان', 'en' => 'Lebanon'], 'phone_code' => '+961', 'status' => false],
            ['id' => 11, 'name' => ['ar' => 'سوريا', 'en' => 'Syria'], 'phone_code' => '+963', 'status' => false],
            ['id' => 12, 'name' => ['ar' => 'العراق', 'en' => 'Iraq'], 'phone_code' => '+964', 'status' => false],
            ['id' => 13, 'name' => ['ar' => 'اليمن', 'en' => 'Yemen'], 'phone_code' => '+967', 'status' => false],
            ['id' => 14, 'name' => ['ar' => 'السودان', 'en' => 'Sudan'], 'phone_code' => '+249', 'status' => false],
            ['id' => 15, 'name' => ['ar' => 'ليبيا', 'en' => 'Libya'], 'phone_code' => '+218', 'status' => false],
            ['id' => 16, 'name' => ['ar' => 'تونس', 'en' => 'Tunisia'], 'phone_code' => '+216', 'status' => false],
            ['id' => 17, 'name' => ['ar' => 'الجزائر', 'en' => 'Algeria'], 'phone_code' => '+213', 'status' => false],
            ['id' => 18, 'name' => ['ar' => 'المغرب', 'en' => 'Morocco'], 'phone_code' => '+212', 'status' => false],
            ['id' => 19, 'name' => ['ar' => 'موريتانيا', 'en' => 'Mauritania'], 'phone_code' => '+222', 'status' => false],
            ['id' => 20, 'name' => ['ar' => 'جيبوتي', 'en' => 'Djibouti'], 'phone_code' => '+253', 'status' => false],
            ['id' => 21, 'name' => ['ar' => 'الصومال', 'en' => 'Somalia'], 'phone_code' => '+252', 'status' => false],
            ['id' => 22, 'name' => ['ar' => 'جزر القمر', 'en' => 'Comoros'], 'phone_code' => '+269', 'status' => false],
            ['id' => 23, 'name' => ['ar' => 'الولايات المتحدة', 'en' => 'United States'], 'phone_code' => '+1', 'status' => false],
            ['id' => 24, 'name' => ['ar' => 'المملكة المتحدة', 'en' => 'United Kingdom'], 'phone_code' => '+44', 'status' => false],
            ['id' => 25, 'name' => ['ar' => 'ألمانيا', 'en' => 'Germany'], 'phone_code' => '+49', 'status' => false],
            ['id' => 26, 'name' => ['ar' => 'فرنسا', 'en' => 'France'], 'phone_code' => '+33', 'status' => false],
            ['id' => 27, 'name' => ['ar' => 'إيطاليا', 'en' => 'Italy'], 'phone_code' => '+39', 'status' => false],
            ['id' => 28, 'name' => ['ar' => 'إسبانيا', 'en' => 'Spain'], 'phone_code' => '+34', 'status' => false],
            ['id' => 29, 'name' => ['ar' => 'تركيا', 'en' => 'Turkey'], 'phone_code' => '+90', 'status' => false],
            ['id' => 30, 'name' => ['ar' => 'الهند', 'en' => 'India'], 'phone_code' => '+91', 'status' => false],
            ['id' => 31, 'name' => ['ar' => 'الصين', 'en' => 'China'], 'phone_code' => '+86', 'status' => false],
            ['id' => 32, 'name' => ['ar' => 'اليابان', 'en' => 'Japan'], 'phone_code' => '+81', 'status' => false],
            ['id' => 33, 'name' => ['ar' => 'كوريا الجنوبية', 'en' => 'South Korea'], 'phone_code' => '+82', 'status' => false],
            ['id' => 34, 'name' => ['ar' => 'روسيا', 'en' => 'Russia'], 'phone_code' => '+7', 'status' => false],
            ['id' => 35, 'name' => ['ar' => 'كندا', 'en' => 'Canada'], 'phone_code' => '+1', 'status' => false],
            ['id' => 36, 'name' => ['ar' => 'البرازيل', 'en' => 'Brazil'], 'phone_code' => '+55', 'status' => false],
            ['id' => 37, 'name' => ['ar' => 'الأرجنتين', 'en' => 'Argentina'], 'phone_code' => '+54', 'status' => false],
            ['id' => 38, 'name' => ['ar' => 'أستراليا', 'en' => 'Australia'], 'phone_code' => '+61', 'status' => false],
            ['id' => 39, 'name' => ['ar' => 'هولندا', 'en' => 'Netherlands'], 'phone_code' => '+31', 'status' => false],
            ['id' => 40, 'name' => ['ar' => 'السويد', 'en' => 'Sweden'], 'phone_code' => '+46', 'status' => false],
            ['id' => 41, 'name' => ['ar' => 'سويسرا', 'en' => 'Switzerland'], 'phone_code' => '+41', 'status' => false],
        ];


        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
