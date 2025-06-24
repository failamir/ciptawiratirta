<?php
namespace App\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Modules\Review\Models\Review;

trait HasReview{

    public function check_enable_review_after_booking(){

    }

    public function getReviewList(){
        return Review::select(['id','title','content','rate_number','author_ip','status','created_at','vendor_id','create_user'])->where('object_id', $this->id)->where('object_model', $this->type)->where("status", "approved")->orderBy("id", "desc")->with('author')->paginate(setting_item($this->type.'_review_number_per_page', 5),'[*]', 'comment-page');
    }

    public function getReviewEnable()
    {
        return setting_item($this->type."_enable_review", 0);
    }

    public function getReviewApproved()
    {
        return setting_item($this->type."_review_approved", 0);
    }

    public function getReviewStats() : array
    {
        $reviewStats = [];
        if (!empty($review_stats = setting_item($this->type."_review_stats", []))) {
            $reviewStats = Arr::pluck( json_decode($review_stats,true) , 'title');
        }
        return $reviewStats;
    }

    public function getScoreReview($rate_score = false)
    {
        $service_id = $this->id;
        $list_score = Cache::rememberForever('review_'.$this->type.'_' . $service_id, function () use ($service_id) {
            $dataReview = Review::selectRaw(" AVG(rate_number) as score_total , COUNT(id) as total_review ")->where('object_id', $service_id)->where('object_model', $this->type)->where("status", "approved")->first();
            $score_total = !empty($dataReview->score_total) ? number_format($dataReview->score_total, 1) : 0;
            return [
                'score_total'  => $score_total,
                'total_review' => !empty($dataReview->total_review) ? $dataReview->total_review : 0,
            ];
        });
        $list_score['review_text'] =  $list_score['score_total'] ? Review::getDisplayTextScoreByLever( round( $list_score['score_total'] )) : __("Not rated");

        $review_stats = $this->getReviewStats();
        if($rate_score and !empty($review_stats)){
            $list_data_rate = Review::selectRaw('bc_review_meta.name ,avg( bc_review_meta.val ) as review_score')
                ->join('bc_review_meta', function ($join) use ($review_stats) {
                    $join->on('bc_review.id', '=', 'bc_review_meta.review_id')
                        ->whereIn("bc_review_meta.name", $review_stats);
                })
                ->where('bc_review.object_id', $this->id)->where('bc_review.object_model', $this->type)->where("bc_review.status", "approved")
                ->groupBy("bc_review_meta.name")
                ->get()->toArray();

            $list_score['rate_score'] = $list_data_rate;
        }

        return $list_score;
    }

    public function getNumberReviewsInService($status = false)
    {
        return Review::countReviewByServiceID($this->id, false, $status,$this->type) ?? 0;
    }

    public function update_service_rate()
    {
        $rateData = Review::selectRaw("AVG(rate_number) as rate_total")->where('object_id', $this->id)->where('object_model', $this->type)->where("status", "approved")->first();
        $rate_number = number_format($rateData->rate_total ?? 0, 1);
        $this->review_score = $rate_number;
        $this->save();
    }
}
