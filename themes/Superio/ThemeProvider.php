<?php

namespace Themes\Superio;


class ThemeProvider extends \Themes\Base\ThemeProvider
{
    public static $version = '2.6.1';
    public static $name = 'Superio';
    public static $screenshot = '/images/screenshot.jpg';

    public static $seeder = \Themes\Superio\Database\Seeders\DatabaseSeeder::class;

    public static $modules = [
        'core'=>\Modules\Core\ModuleProvider::class,
        'booking'=>\Modules\Booking\ModuleProvider::class,
        'contact'=>\Modules\Contact\ModuleProvider::class,
        'dashboard'=>\Modules\Dashboard\ModuleProvider::class,
        'email'=>\Modules\Email\ModuleProvider::class,
        'sms'=>\Modules\Sms\ModuleProvider::class,
        'language'=>\Modules\Language\ModuleProvider::class,
        'media'=>\Modules\Media\ModuleProvider::class,
        'news'=>\Modules\News\ModuleProvider::class,
        'page'=>\Modules\Page\ModuleProvider::class,
        'user'=>\Modules\User\ModuleProvider::class,
        'template'=>\Modules\Template\ModuleProvider::class,
        'report'=>\Modules\Report\ModuleProvider::class,
        'location'=>\Modules\Location\ModuleProvider::class,
        'review'=>\Modules\Review\ModuleProvider::class,
        'job'=>\Modules\Job\ModuleProvider::class,
        'candidate'=>\Modules\Candidate\ModuleProvider::class,
        'company'=>\Modules\Company\ModuleProvider::class,
        'gig'=>\Modules\Gig\ModuleProvider::class,
        'skill'=>\Modules\Skill\ModuleProvider::class,
        'payout'=>\Modules\Payout\ModuleProvider::class,
        'order'=>\Modules\Order\ModuleProvider::class,
        'theme'=>\Modules\Theme\ModuleProvider::class,
    ];

    public function register()
    {
        foreach (static::$modules as $module=>$class){
            $this->app->register($class);
        }
    }
}
