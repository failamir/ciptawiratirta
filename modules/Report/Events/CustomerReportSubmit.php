<?php
namespace Modules\Report\Events;

use Illuminate\Queue\SerializesModels;

class CustomerReportSubmit
{
    use SerializesModels;
    public $row;

    public function __construct($row)
    {
        $this->row = $row;
    }

}
