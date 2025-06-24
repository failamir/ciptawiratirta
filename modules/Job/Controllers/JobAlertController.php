<?php
namespace Modules\Job\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Job\Models\JobAlert;
use Modules\Job\Models\JobAlertQuery;

class JobAlertController extends Controller{

    public function store(Request $request){

        $validator = \Validator::make($request->all(),
            [
                'email' => 'required|email'
            ],
            [
                'email.required'      => __('Email is required field'),
                'email.email'         => __('Email invalidate'),
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors()
            ], 200);
        }else{
            $query = [
              'category'=>$request->input('category'),
              'location'=>$request->input('location'),
              'experience'=>$request->input('experience'),
              'skills'=>$request->input('skills'),
              'job_type'=>$request->input('job_type')
            ];
            $alert_query = JobAlertQuery::getByAttrs($query);

            $job_alert = JobAlert::query()->where('query_id',$alert_query->id);
            if(auth()->user()){
                $job_alert->where('user_id',auth()->id());
            }else{
                $job_alert->where('email', $request->input('email'));
            }
            $job_alert = $job_alert->first();

            if ($job_alert){
                return $this->sendSuccess(['duplicate'=>1],__("Congratulations! You have successfully registered."));
            }
            $row = new JobAlert();
            $attr = [
                'name',
                'email',
                'frequency',
                'locale'
            ];
            $input = $request->input();
            $input['locale'] = app_get_locale();

            $row->fillByAttr($attr, $input);
            $row->query_id = $alert_query->id;
            if(auth()->user()){
                $row->user_id = auth()->id();
            }
            $row->save();

            return $this->sendSuccess([],__("Congratulations! You have successfully registered."));
        }
    }

}
