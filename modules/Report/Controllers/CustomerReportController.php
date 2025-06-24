<?php
namespace Modules\Report\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\Report\Events\CustomerReportSubmit;
use Modules\Report\Models\CustomerReport;

class CustomerReportController extends Controller{

    public function report(Request $request){

        $service_id = $request->input('service_id');
        $service_type = $request->input('service_type');
        $name = $request->input('name');
        $email = $request->input('email');
        $description = $request->input('description');

        $check = Validator::make($request->input(), [
            'service_id' => 'required',
            'service_type' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'description' => 'required'
        ]);
        if ($check->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $check->errors()
            ], 200);
        }

        //
        $customerReport = new CustomerReport();
        $customerReport->service_id = $service_id;
        $customerReport->service_type = $service_type;
        $customerReport->name = $name;
        $customerReport->email = $email;
        $customerReport->description = $description;
        $customerReport->save();

        event(new CustomerReportSubmit($customerReport));

        return $this->sendSuccess(['message' => __("Report successfully!")]);
    }
}
