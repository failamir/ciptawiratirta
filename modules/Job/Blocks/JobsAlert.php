<?php

namespace Modules\Job\Blocks;

use Modules\Job\Models\JobCategory as Category;
use Modules\Job\Models\JobType;
use Modules\Location\Models\Location;
use Modules\Skill\Models\Skill;
use Modules\Template\Blocks\BaseBlock;

class JobsAlert extends BaseBlock
{
    function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'         => 'title',
                    'type'       => 'input',
                    'inputType'  => 'text',
                    'label'      => __("Form Title"),
                    'adminLabel' => true
                ]
            ],
            'category' => __("Job Blocks")
        ]);
    }

    public function getName()
    {
        return 'Job Alert';
    }

    public function content($model = [])
    {
        $default = [
            'title' => __("Create Job Alert"),
            'style' => 'style_1'
        ];
        $model = array_merge($default, $model);
        $model['job_locations'] = Location::where('status', 'publish')->limit(1000)->get()->toTree();
        $model['job_categories'] = Category::where('status', 'publish')->get()->toTree();
        $model['job_types'] = JobType::where('status', 'publish')->get();
        $model['job_skills'] = Skill::where('status', 'publish')->get();

        return view("Job::frontend.layouts.blocks.jobs-alert.{$model['style']}", $model);
    }
}
