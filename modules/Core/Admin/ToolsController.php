<?php
namespace Modules\Core\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Core\Models\Settings;

class ToolsController extends AdminController
{
    public function index()
    {
        $this->setActiveMenu('admin/module/core/tools');
        return view('Core::admin.tools.index');
    }

    public function clearCache()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return redirect()->route('core.admin.tool.index')->with('success', __('Clear cache success!') );
    }
}
