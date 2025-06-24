<?php
namespace Modules\Company;

use Illuminate\Support\ServiceProvider;
use Modules\Company\Models\Company;
use Modules\Core\Helpers\SitemapHelper;
use Modules\ModuleServiceProvider;

class ModuleProvider extends ModuleServiceProvider
{

    public function boot(SitemapHelper $sitemapHelper){

        if(is_installed()){
            $sitemapHelper->add("company",[app()->make(Company::class),'getForSitemap']);
        }

        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');

    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(__DIR__ . '/Config/config.php','company');
        $this->app->register(RouteServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        if($user->hasPermission('employer_manage_others'))
        {
            return [
                'company'=>[
                    "position"=>22,
                    'url'        => 'admin/module/company',
                    'title'      => __("Company"),
                    'icon'       => 'ion-md-bookmarks',
                    'permission' => 'employer_manage',
                    'children'   => [
                        'company_view'=>[
                            'url'        => 'admin/module/company',
                            'title'      => __("All Company"),
                            'permission' => 'employer_manage',
                        ],
                        'company_create'=>[
                            'url'        => 'admin/module/company/create',
                            'title'      => __("Add Company"),
                            'permission' => 'employer_manage',
                        ],
                        'attribute'=>[
                            'url'        => 'admin/module/company/attribute',
                            'title'      => __('Attributes'),
                            'permission' => 'employer_manage_others',
                        ],
                        'company_category'=>[
                            'url'        => route('company.admin.category.index'),
                            'title'      => __("Category"),
                            'permission' => 'employer_manage_others'
                        ]
                    ]
                ],
                [
                    "position"=> 28,
                    'url'        => route('company.admin.myContact'),
                    'title'      => __("My Contact"),
                    'icon'       => 'ion-md-mail',
                    'permission' => 'employer_manage'
                ]
            ];
        }elseif($user->hasPermission('employer_manage')){
            return [
                'company'=>[
                    "position"=>22,
                    'url'        => 'admin/module/company',
                    'title'      => __("Company Profile"),
                    'icon'       => 'ion-md-bookmarks',
                    'permission' => 'employer_manage',
                ],
                [
                    "position"=> 28,
                    'url'        => route('company.admin.myContact'),
                    'title'      => __("My Contact"),
                    'icon'       => 'ion-md-mail',
                    'permission' => 'employer_manage'
                ]
            ];
        }

    }

    public static function getTemplateBlocks(){
        return [
            'list_company'=>"\\Modules\\Company\\Blocks\\ListCompany",
        ];
    }

    public static function getUserMenu()
    {
        $res = [];
        if(is_employer()){
            $res = [
                'user_bookmark_employer' => [
                    'url' => route("user.wishList.index"),
                    'title' => __("Shortlisted"),
                    'icon' => 'la la-bookmark-o',
                    'permission' => 'employer_manage',
                    'enable' => true
                ],
                'my_plan' => [
                    'url' => route('user.plan'),
                    'title' => __("My Plans"),
                    'icon' => 'la la-box',
                    'permission' => 'employer_manage',
                    'enable' => true
                ],

            ];
        }
        return $res;
    }

    public static function getBookableServices()
    {
        return [
            'company'=>Company::class
        ];
    }
}
