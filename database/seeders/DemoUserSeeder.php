<?php
namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Theme\ThemeManager;

class DemoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $active_theme = ThemeManager::current();
        $active_theme = strtolower(ucfirst($active_theme));
        $active_theme = ($active_theme == "base") ? "superio" : $active_theme;

        DB::table('users')->insert([
            'first_name'        => 'System',
            'last_name'         => 'Admin',
            'email'             => 'admin@'.$active_theme.'.test',
            'password'          => bcrypt('admin123'),
            'phone'             => '112 666 888',
            'status'            => 'publish',
            'address'            => 'My Dinh, Ha Noi',
            'country'            => 'Viet Nam',
            'created_at'        => date("Y-m-d H:i:s"),
            'email_verified_at' => date("Y-m-d H:i:s"),
            'bio' => 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.'
        ]);
        $user = \App\User::where('email', 'admin@'.$active_theme.'.test')->first();
        $user->need_update_pw = 1;
        $user->save();
        $user->assignRole('administrator');
    }
}
