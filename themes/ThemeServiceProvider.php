<?php


namespace Themes;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\FileViewFinder;
use Modules\Theme\ThemeManager;

class ThemeServiceProvider extends ServiceProvider
{
    public function boot(Request $request){

        if(!is_installed() || strpos($request->path(), 'install') !== false) return false;

        //	 load Theme overwrite
        $active = ThemeManager::current();
        $provider = ThemeManager::currentProvider();
        $parent = $provider::$parent;

        if(strtolower($active) != "base"){

            $view_paths = config('view.paths');
            array_unshift($view_paths,__DIR__.'/Base/resources/views');

            if($parent){
                array_unshift($view_paths,__DIR__.'/'.ucfirst($parent).'/resources/views');
            }
            array_unshift($view_paths,__DIR__.'/'.ucfirst($active).'/resources/views');


            $view = $this->app->make('view');
            $finder = $view->getFinder();
            $finder->setPaths(array_map([$this,'resolvePath'],$view_paths));

            View::addLocation(base_path("themes".DIRECTORY_SEPARATOR.ucfirst($active)));
            if($parent){
                View::addLocation(base_path("themes".DIRECTORY_SEPARATOR.ucfirst($parent)));
            }
            // Load modules views
            $this->loadModuleViews($active);

            if($parent){
                $this->loadModuleViews($parent);
            }

        }

        // Base Theme require
        View::addLocation(base_path(DIRECTORY_SEPARATOR."themes".DIRECTORY_SEPARATOR."Base"));

        // Load modules views
        $this->loadModuleViews('base');

    }


    /**
     * Resolve the path.
     *
     * @param  string  $path
     * @return string
     */
    protected function resolvePath($path)
    {
        return realpath($path) ?: $path;
    }

    protected function loadModuleViews($theme){

        $listModule = array_map('basename', File::directories(base_path('themes/'.ucfirst($theme))));

        foreach ($listModule as $module) {

            if (is_dir(base_path('themes/'.ucfirst($theme) .'/'. $module))) {
                $this->loadViewsFrom(base_path('themes/'.ucfirst($theme) .'/'. $module).'/Views', $module);
            }
        }

        if (is_dir(base_path('themes/'.ucfirst($theme).'/Layout'))) {
            $this->loadViewsFrom(base_path('themes/'.ucfirst($theme).'/Layout'), 'Layout');
        }
    }

    public function register()
    {
        //load Theme overwrite
        $class = \Modules\Theme\ThemeManager::currentProvider();
        if(class_exists($class)){
            $this->app->register($class);
        }
    }
}
