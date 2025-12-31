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
            ['name' => ['en' => 'TechNova', 'ar' => 'تكنوفا'], 'slug' => 'technova', 'image' => 'brands/technova.png', 'status' => 1],
            ['name' => ['en' => 'GreenLeaf', 'ar' => 'ورقة خضراء'], 'slug' => 'greenleaf', 'image' => 'brands/greenleaf.png', 'status' => 1],
            ['name' => ['en' => 'SkyLine', 'ar' => 'سكاي لاين'], 'slug' => 'skyline', 'image' => 'brands/skyline.png', 'status' => 1],
            ['name' => ['en' => 'HealthPlus', 'ar' => 'هيلث بلس'], 'slug' => 'healthplus', 'image' => 'brands/healthplus.png', 'status' => 1],
            ['name' => ['en' => 'EduSmart', 'ar' => 'إديو سمارت'], 'slug' => 'edusmart', 'image' => 'brands/edusmart.png', 'status' => 1],
            ['name' => ['en' => 'Foodies', 'ar' => 'فوديز'], 'slug' => 'foodies', 'image' => 'brands/foodies.png', 'status' => 1],
            ['name' => ['en' => 'StyleHub', 'ar' => 'ستايل هب'], 'slug' => 'stylehub', 'image' => 'brands/stylehub.png', 'status' => 1],
            ['name' => ['en' => 'AutoDrive', 'ar' => 'أوتو درايف'], 'slug' => 'autodrive', 'image' => 'brands/autodrive.png', 'status' => 1],
            ['name' => ['en' => 'SmartHome', 'ar' => 'سمارت هوم'], 'slug' => 'smarthome', 'image' => 'brands/smarthome.png', 'status' => 1],
            ['name' => ['en' => 'EcoLife', 'ar' => 'إيكو لايف'], 'slug' => 'ecolife', 'image' => 'brands/ecolife.png', 'status' => 1],
            ['name' => ['en' => 'TravelGo', 'ar' => 'ترافل جو'], 'slug' => 'travelgo', 'image' => 'brands/travelgo.png', 'status' => 1],
            ['name' => ['en' => 'BuildMax', 'ar' => 'بيلد ماكس'], 'slug' => 'buildmax', 'image' => 'brands/buildmax.png', 'status' => 1],
            ['name' => ['en' => 'MediCare', 'ar' => 'ميديكير'], 'slug' => 'medicare', 'image' => 'brands/medicare.png', 'status' => 1],
            ['name' => ['en' => 'AgriGrow', 'ar' => 'أجري جرو'], 'slug' => 'agrigrow', 'image' => 'brands/agrigrow.png', 'status' => 1],
            ['name' => ['en' => 'FinTrust', 'ar' => 'فين ترست'], 'slug' => 'fintrust', 'image' => 'brands/fintrust.png', 'status' => 1],
            ['name' => ['en' => 'GameZone', 'ar' => 'جيم زون'], 'slug' => 'gamezone', 'image' => 'brands/gamezone.png', 'status' => 1],
            ['name' => ['en' => 'BeautyLux', 'ar' => 'بيوتي لوكس'], 'slug' => 'beautylux', 'image' => 'brands/beautylux.png', 'status' => 1],
            ['name' => ['en' => 'FitPro', 'ar' => 'فيت برو'], 'slug' => 'fitpro', 'image' => 'brands/fitpro.png', 'status' => 1],
            ['name' => ['en' => 'BabyCare', 'ar' => 'بيبي كير'], 'slug' => 'babycare', 'image' => 'brands/babycare.png', 'status' => 1],
            ['name' => ['en' => 'PetWorld', 'ar' => 'بيت وورلد'], 'slug' => 'petworld', 'image' => 'brands/petworld.png', 'status' => 1],
            ['name' => ['en' => 'CleanTech', 'ar' => 'كلين تك'], 'slug' => 'cleantech', 'image' => 'brands/cleantech.png', 'status' => 1],
            ['name' => ['en' => 'EnergyX', 'ar' => 'إنرجي إكس'], 'slug' => 'energyx', 'image' => 'brands/energyx.png', 'status' => 1],
            ['name' => ['en' => 'FreshMart', 'ar' => 'فريش مارت'], 'slug' => 'freshmart', 'image' => 'brands/freshmart.png', 'status' => 1],
            ['name' => ['en' => 'QuickFix', 'ar' => 'كويك فيكس'], 'slug' => 'quickfix', 'image' => 'brands/quickfix.png', 'status' => 1],
            ['name' => ['en' => 'SafeNet', 'ar' => 'سيف نت'], 'slug' => 'safenet', 'image' => 'brands/safenet.png', 'status' => 1],
            ['name' => ['en' => 'EduWorld', 'ar' => 'إديو وورلد'], 'slug' => 'eduworld', 'image' => 'brands/eduworld.png', 'status' => 1],
            ['name' => ['en' => 'MegaStore', 'ar' => 'ميجا ستور'], 'slug' => 'megastore', 'image' => 'brands/megastore.png', 'status' => 1],
            ['name' => ['en' => 'UrbanStyle', 'ar' => 'أوربان ستايل'], 'slug' => 'urbanstyle', 'image' => 'brands/urbanstyle.png', 'status' => 1],
            ['name' => ['en' => 'FarmFresh', 'ar' => 'فارم فريش'], 'slug' => 'farmfresh', 'image' => 'brands/farmfresh.png', 'status' => 1],
            ['name' => ['en' => 'SmartPay', 'ar' => 'سمارت باي'], 'slug' => 'smartpay', 'image' => 'brands/smartpay.png', 'status' => 1],
            ['name' => ['en' => 'BookNest', 'ar' => 'بوك نيست'], 'slug' => 'booknest', 'image' => 'brands/booknest.png', 'status' => 1],
            ['name' => ['en' => 'MusicBox', 'ar' => 'ميوزيك بوكس'], 'slug' => 'musicbox', 'image' => 'brands/musicbox.png', 'status' => 1],
            ['name' => ['en' => 'ArtSpace', 'ar' => 'آرت سبيس'], 'slug' => 'artspace', 'image' => 'brands/artspace.png', 'status' => 1],
            ['name' => ['en' => 'FilmHouse', 'ar' => 'فيلم هاوس'], 'slug' => 'filmhouse', 'image' => 'brands/filmhouse.png', 'status' => 1],
            ['name' => ['en' => 'NewsLine', 'ar' => 'نيوز لاين'], 'slug' => 'newsline', 'image' => 'brands/newsline.png', 'status' => 1],
            ['name' => ['en' => 'SportMax', 'ar' => 'سبورت ماكس'], 'slug' => 'sportmax', 'image' => 'brands/sportmax.png', 'status' => 1],
            ['name' => ['en' => 'TravelMate', 'ar' => 'ترافل ميت'], 'slug' => 'travelmate', 'image' => 'brands/travelmate.png', 'status' => 1],
            ['name' => ['en' => 'FoodMart', 'ar' => 'فود مارت'], 'slug' => 'foodmart', 'image' => 'brands/foodmart.png', 'status' => 1],
            ['name' => ['en' => 'DrinkUp', 'ar' => 'درينك أب'], 'slug' => 'drinkup', 'image' => 'brands/drinkup.png', 'status' => 1],
            ['name' => ['en' => 'SweetHome', 'ar' => 'سويت هوم'], 'slug' => 'sweethome', 'image' => 'brands/sweethome.png', 'status' => 1],
];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
