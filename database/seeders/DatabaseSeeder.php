<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Modules\Theme\ThemeManager;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');

        $active_theme = ThemeManager::current();
        $theme_seeder = '\\Themes\\'.ucfirst($active_theme)."\\Database\\Seeders\\DatabaseSeeder";
        if(class_exists($theme_seeder)){
            $this->call($theme_seeder);
        }
    }
}
