<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Sgp',
            'date_field' => 'int_date',
            'field'      => 'email',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.sgps.edit',
        ],
        [
            'model'      => '\App\Models\Sgp',
            'date_field' => 'date_of_entry',
            'field'      => 'email',
            'prefix'     => '',
            'suffix'     => 'qwerty',
            'route'      => 'admin.sgps.edit',
        ],
    ];

    public function index()
    {
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . ' ' . $model->{$source['field']} . ' ' . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
