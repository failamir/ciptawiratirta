<?php
namespace Modules\Job\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Job\Models\JobAlert;
use Modules\Job\Models\JobType;

class JobAlertController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setActiveMenu('admin/module/job');
    }

    public function index(Request $request)
    {
        $this->checkPermission('job_manage_others');
        $listTypes = JobAlert::query();
        if (!empty($search = $request->query('s'))) {
            $listTypes->where('name', 'LIKE', '%' . $search . '%');
        }
        $listTypes->orderBy('created_at', 'desc');
        $data = [
            'rows'        => $listTypes->get(),
            'breadcrumbs' => [
                [
                    'name' => __('Job'),
                    'url'  => route("job.admin.index")
                ],
                [
                    'name'  => __('Job Alert'),
                    'class' => 'active'
                ],
            ]
        ];
        return view('Job::admin.job-alert.index', $data);
    }


    public function editBulk(Request $request)
    {
        $this->checkPermission('job_manage_others');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('Select at least 1 item!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Select an Action!'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                $query = JobAlert::where("id", $id)->first();
                if(!empty($query)){
                    $query->delete();
                }
            }
        }
        return redirect()->back()->with('success', __('Updated success!'));
    }
}
