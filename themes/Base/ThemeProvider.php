<?php


namespace Themes\Base;


use Illuminate\Contracts\Http\Kernel;
use Modules\Core\ModuleProvider;
use Modules\Theme\Abstracts\AbstractThemeProvider;

class ThemeProvider extends AbstractThemeProvider
{

    public static $version = '3.0.0';
    public static $asset_version;
    public static $name = 'Superio Core';
    public static $parent;

    public static function info()
    {
        // TODO: Implement info() method.
    }

    public static $modules = [
        'core'=>ModuleProvider::class,
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
    ];

    public function boot(Kernel $kernel){
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');
    }

    public function register()
    {
        foreach (static::$modules as $module=>$class){
            $this->app->register($class);
        }
    }
}
