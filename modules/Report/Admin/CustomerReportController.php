<?php

namespace Modules\Report\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Report\Models\CustomerReport;
use Tymon\JWTAuth\Claims\Custom;

class CustomerReportController extends AdminController{

    public function index(Request $request){

        $s = $request->query('s');
        $customerReports = CustomerReport::query();
        if ($s) {
            $customerReports->where(function ($query) use ($s){
                $query->where('name', 'LIKE', '%' . $s . '%')
                    ->orWhere('email','LIKE', '%' . $s . '%')
                    ->orWhere('message','LIKE', '%' . $s . '%')
                ;
            });
        }
        $rows = $customerReports->paginate(20);
        $data = [
            "rows" => $rows
        ];

        return view("Report::admin.customerReport.index", $data);
    }

    public function bulkEdit(Request $request)
    {
        $this->checkPermission('setting_manage');

        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids)) {
            return redirect()->back()->with('error', __('Please select at least 1 item!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('No Action is selected!'));
        }
        if ($action == "delete") {
            foreach ($ids as $id) {
                $query = CustomerReport::where("id", $id)->first();
                if(!empty($query)){
                    $query->delete();
                }
            }
            return redirect()->back()->with('success', __('Delete success!'));
        }
        return redirect()->back();
    }
}
