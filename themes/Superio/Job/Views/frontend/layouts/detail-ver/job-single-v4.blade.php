<!-- Job Detail Section -->
<section class="job-detail-section style-two">
    <div class="job-detail-outer">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="job-block-outer">
                        <!-- Job Block -->
                        <div class="job-block-seven style-two">
                            <div class="inner-box">
                                @include("Job::frontend.layouts.details.upper-box", ['hide_avatar' => true])
                            </div>
                        </div>
                    </div>

                    @include("Job::frontend.layouts.details.content")

                    @include("Job::frontend.layouts.details.gallery")

                    @include("Job::frontend.layouts.details.video")

                    @include('Layout::global.share-report', ["title" => __("Share this job")])

                    @include("Job::frontend.layouts.details.related")

                </div>

                <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar">
                        @include("Job::frontend.layouts.details.apply-button")

                        <div class="sidebar-widget">

                            @include("Job::frontend.layouts.details.overview")

                            @include("Job::frontend.layouts.details.location")

                            @include("Job::frontend.layouts.details.skills")
                        </div>

                        @include("Job::frontend.layouts.details.company")

                        @include('Layout::global.contact', ['origin_id' => $row->company->owner_id ?? false, 'job_id' => $row->id])

                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Job Detail Section -->
