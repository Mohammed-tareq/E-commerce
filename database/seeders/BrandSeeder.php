<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('brands')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $brands = [
            ['name' => ['en' => 'TechNova', 'ar' => 'تكنوفا'], 'slug' => 'technova', 'image' => 'brand-img-4.webp', 'status' => 1],
            ['name' => ['en' => 'GreenLeaf', 'ar' => 'ورقة خضراء'], 'slug' => 'greenleaf', 'image' => 'brand-img-4.webp', 'status' => 1],
            ['name' => ['en' => 'SkyLine', 'ar' => 'سكاي لاين'], 'slug' => 'skyline', 'image' => 'brand-img-4.webp', 'status' => 1],
            ['name' => ['en' => 'HealthPlus', 'ar' => 'هيلث بلس'], 'slug' => 'healthplus', 'image' => 'brand-img-4.webp', 'status' => 1],
            ['name' => ['en' => 'EduSmart', 'ar' => 'إديو سمارت'], 'slug' => 'edusmart', 'image' => 'brand-img-4.webp', 'status' => 1],
            ['name' => ['en' => 'Foodies', 'ar' => 'فوديز'], 'slug' => 'foodies', 'image' => 'brand-img-4.webp', 'status' => 1],
            ['name' => ['en' => 'StyleHub', 'ar' => 'ستايل هب'], 'slug' => 'stylehub', 'image' => 'brand-img-4.webp', 'status' => 1],
            ['name' => ['en' => 'AutoDrive', 'ar' => 'أوتو درايف'], 'slug' => 'autodrive', 'image' => 'brand-img-4.webp', 'status' => 1],
            ['name' => ['en' => 'SmartHome', 'ar' => 'سمارت هوم'], 'slug' => 'smarthome', 'image' => 'brand-img-4.webp', 'status' => 1],
            ['name' => ['en' => 'EcoLife', 'ar' => 'إيكو لايف'], 'slug' => 'ecolife', 'image' => 'brand-img-4.webp', 'status' => 1],
            ['name' => ['en' => 'TravelGo', 'ar' => 'ترافل جو'], 'slug' => 'travelgo', 'image' => 'brand-img-3.webp', 'status' => 1],
            ['name' => ['en' => 'BuildMax', 'ar' => 'بيلد ماكس'], 'slug' => 'buildmax', 'image' => 'brand-img-3.webp', 'status' => 1],
            ['name' => ['en' => 'MediCare', 'ar' => 'ميديكير'], 'slug' => 'medicare', 'image' => 'brand-img-3.webp', 'status' => 1],
            ['name' => ['en' => 'AgriGrow', 'ar' => 'أجري جرو'], 'slug' => 'agrigrow', 'image' => 'brand-img-3.webp', 'status' => 1],
            ['name' => ['en' => 'FinTrust', 'ar' => 'فين ترست'], 'slug' => 'fintrust', 'image' => 'brand-img-3.webp', 'status' => 1],
            ['name' => ['en' => 'GameZone', 'ar' => 'جيم زون'], 'slug' => 'gamezone', 'image' => 'brand-img-3.webp', 'status' => 1],
            ['name' => ['en' => 'BeautyLux', 'ar' => 'بيوتي لوكس'], 'slug' => 'beautylux', 'image' => 'brand-img-3.webp', 'status' => 1],
            ['name' => ['en' => 'FitPro', 'ar' => 'فيت برو'], 'slug' => 'fitpro', 'image' => 'brand-img-3.png', 'status' => 1],
            ['name' => ['en' => 'BabyCare', 'ar' => 'بيبي كير'], 'slug' => 'babycare', 'image' => 'brand-img-8.webp', 'status' => 1],
            ['name' => ['en' => 'PetWorld', 'ar' => 'بيت وورلد'], 'slug' => 'petworld', 'image' => 'brand-img-8.webp', 'status' => 1],
            ['name' => ['en' => 'CleanTech', 'ar' => 'كلين تك'], 'slug' => 'cleantech', 'image' => 'brand-img-8.webp', 'status' => 1],
            ['name' => ['en' => 'EnergyX', 'ar' => 'إنرجي إكس'], 'slug' => 'energyx', 'image' => 'brand-img-8.webp', 'status' => 1],
            ['name' => ['en' => 'FreshMart', 'ar' => 'فريش مارت'], 'slug' => 'freshmart', 'image' => 'brand-img-8.webp', 'status' => 1],
            ['name' => ['en' => 'QuickFix', 'ar' => 'كويك فيكس'], 'slug' => 'quickfix', 'image' => 'brand-img-8.webp', 'status' => 1],
            ['name' => ['en' => 'SafeNet', 'ar' => 'سيف نت'], 'slug' => 'safenet', 'image' => 'brand-img-8.webp', 'status' => 1],
            ['name' => ['en' => 'EduWorld', 'ar' => 'إديو وورلد'], 'slug' => 'eduworld', 'image' => 'brand-img-8.webp', 'status' => 1],
            ['name' => ['en' => 'MegaStore', 'ar' => 'ميجا ستور'], 'slug' => 'megastore', 'image' => 'brand-img-9.webp', 'status' => 1],
            ['name' => ['en' => 'UrbanStyle', 'ar' => 'أوربان ستايل'], 'slug' => 'urbanstyle', 'image' => 'brand-img-9.webp', 'status' => 1],
            ['name' => ['en' => 'FarmFresh', 'ar' => 'فارم فريش'], 'slug' => 'farmfresh', 'image' => 'brand-img-9.webp', 'status' => 1],
            ['name' => ['en' => 'SmartPay', 'ar' => 'سمارت باي'], 'slug' => 'smartpay', 'image' => 'brand-img-9.webp', 'status' => 1],
            ['name' => ['en' => 'BookNest', 'ar' => 'بوك نيست'], 'slug' => 'booknest', 'image' => 'brand-img-9.webp', 'status' => 1],
            ['name' => ['en' => 'MusicBox', 'ar' => 'ميوزيك بوكس'], 'slug' => 'musicbox', 'image' => 'brand-img-9.webp', 'status' => 1],
            ['name' => ['en' => 'ArtSpace', 'ar' => 'آرت سبيس'], 'slug' => 'artspace', 'image' => 'brand-img-9.webp', 'status' => 1],
            ['name' => ['en' => 'FilmHouse', 'ar' => 'فيلم هاوس'], 'slug' => 'filmhouse', 'image' => 'brand-img-1.webp', 'status' => 1],
            ['name' => ['en' => 'NewsLine', 'ar' => 'نيوز لاين'], 'slug' => 'newsline', 'image' => 'brand-img-1.webp', 'status' => 1],
            ['name' => ['en' => 'SportMax', 'ar' => 'سبورت ماكس'], 'slug' => 'sportmax', 'image' => 'brand-img-1.webp', 'status' => 1],
            ['name' => ['en' => 'TravelMate', 'ar' => 'ترافل ميت'], 'slug' => 'travelmate', 'image' => 'brand-img-1.webp', 'status' => 1],
            ['name' => ['en' => 'FoodMart', 'ar' => 'فود مارت'], 'slug' => 'foodmart', 'image' => 'brand-img-1.webp', 'status' => 1],
            ['name' => ['en' => 'DrinkUp', 'ar' => 'درينك أب'], 'slug' => 'drinkup', 'image' => 'brand-img-2.webp', 'status' => 1],
            ['name' => ['en' => 'SweetHome', 'ar' => 'سويت هوم'], 'slug' => 'sweethome', 'image' => 'brand-img-2.webp', 'status' => 1],
];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
