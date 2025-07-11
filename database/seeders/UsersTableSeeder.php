<?php

    namespace Database\Seeders;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use Modules\Media\Models\MediaFile;
    use Modules\Theme\ThemeManager;
    use Modules\User\Models\Plan;

    class UsersTableSeeder extends Seeder
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
                'first_name'        => 'Candidate',
                'last_name'         => '',
                'email'             => 'candidate@'.$active_theme.'.test',
                'password'          => bcrypt('123456'),
                'phone'             => '112 666 888',
                'status'            => 'publish',
                'address'            => 'My Dinh, Ha Noi',
                'country'            => 'Viet Nam',
                'created_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
                'bio' => 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.'
            ]);
            $user = \App\User::where('email', 'candidate@'.$active_theme.'.test')->first();
            $user->need_update_pw = 1;
            $user->save();
            $user->assignRole('candidate');

            DB::table('users')->insert([
                'first_name'        => 'Employer',
                'last_name'         => '',
                'email'             => 'employer@'.$active_theme.'.test',
                'password'          => bcrypt('123456'),
                'phone'             => '112 666 888',
                'status'            => 'publish',
                'address'            => 'My Dinh, Ha Noi',
                'country'            => 'Viet Nam',
                'created_at'        => date("Y-m-d H:i:s"),
                'email_verified_at' => date("Y-m-d H:i:s"),
                'bio' => 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.'
            ]);
            $user = \App\User::where('email', 'employer@'.$active_theme.'.test')->first();
            $user->need_update_pw = 1;
            $user->save();
            $user->assignRole('employer');

            $candidates = [
                ['Opendoor','Robertson'],
                ['Checkr','Warren'],
                ['Esther','Victoria'],
                ['Bell','Alexander'],
                ['Floyd','Robert'],
                ['Jerome','Leslie'],
            ];
            foreach ($candidates as $k=>$v){
                DB::table('users')->insert([
                    'name'=> $v[0] .' '. $v[1],
                    'first_name' => $v[0],
                    'last_name' => $v[1],
                    'email' =>  strtolower($v[1]).'@'.$active_theme.'.test',
                    'password' => bcrypt('123456Aa'),
                    'phone'   => '112 666 888',
                    'status'   => 'publish',
                    'address'            => 'My Dinh, Ha Noi',
                    'country'            => 'Viet Nam',
                    'created_at' =>  date("Y-m-d H:i:s"),
                    'avatar_id'     => MediaFile::findMediaByName("candidate-".($k+1))->id,
                    'bio'=> 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.'
                ]);
                $user = \App\User::where('email',strtolower($v[1]).'@'.$active_theme.'.test')->first();
                $user->assignRole('candidate');
            }

            $employer = [
                ['Cameron','Williamson'],
                ['Miles','Fox'],
                ['Tom','Hiddleston'],
                ['Jennifer','Linda'],
                ['David','John'],
                ['James','Rebecca']
            ];
            foreach ($employer as $k=>$v){
                DB::table('users')->insert([
                    'name'=> $v[0] .' '. $v[1],
                    'first_name' => $v[0],
                    'last_name' => $v[1],
                    'email' =>  strtolower($v[1]).'@'.$active_theme.'.test',
                    'password' => bcrypt('123456Aa'),
                    'phone'   => '112 666 888',
                    'status'   => 'publish',
                    'address'            => 'My Dinh, Ha Noi',
                    'country'            => 'Viet Nam',
                    'created_at' =>  date("Y-m-d H:i:s"),
                    'bio'=> 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.'
                ]);
                $user = \App\User::where('email',strtolower($v[1]).'@'.$active_theme.'.test')->first();
                $user->assignRole('employer');
            }


        }
    }
