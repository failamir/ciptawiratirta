<div class="job-block-outer">
    <div class="job-block-seven">
        <div class="inner-box">
            <div>
                <h4>{!! clean($translation->title) !!}</h4>
                <ul class="job-info">
                    @if($row->cat)
                        @php $cat_translation = $row->cat->translateOrOrigin(app()->getLocale()); @endphp
                        <li><span class="icon flaticon-briefcase"></span> {{ $cat_translation->name }}</li>
                    @endif
                    @if($row->cat2)
                        @php $cat_translation = $row->cat2->translateOrOrigin(app()->getLocale()); @endphp
                        <li><span class="icon flaticon-briefcase"></span> {{ $cat_translation->name }}</li>
                    @endif
                    @if($row->cat3)
                        @php $cat_translation = $row->cat3->translateOrOrigin(app()->getLocale()); @endphp
                        <li><span class="icon flaticon-briefcase"></span> {{ $cat_translation->name }}</li>
                    @endif
                </ul>
                <?php
                $reviewData = $row->getScoreReview();
                $score_total = $reviewData['score_total'];
                ?>
                <div class="service-review review-{{$score_total}}">
                    <div class="d-inline-flex align-items-center">
                        <div class="list-star">
                            <ul class="item-rating-stars">
                                <li><i class="far fa-star"></i></li>
                                <li><i class="far fa-star"></i></li>
                                <li><i class="far fa-star"></i></li>
                                <li><i class="far fa-star"></i></li>
                                <li><i class="far fa-star"></i></li>
                            </ul>
                            <div class="item-rating-stars-active" style="width: {{  $score_total * 2 * 10 ?? 0  }}%">
                                <ul class="item-rating-stars">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <span class="text-secondary">
                            @if($reviewData['total_review'] > 1)
                                {{ __(":number Reviews",["number"=>$reviewData['total_review'] ]) }}
                            @else
                                {{ __(":number Review",["number"=>$reviewData['total_review'] ]) }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
