

<?php $__env->startSection('content'); ?>
<div class="upper-title-box">
    <h3><?php echo e(__("Howdy, :name", ['name' => Auth::user()->nameOrEmail])); ?>!!</h3>
    <div class="text"><?php echo e(__("Ready to jump back in?")); ?></div>
</div>
<div class="row">
    <?php if(!empty($top_cards)): ?>
        <?php $__currentLoopData = $top_cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-<?php echo e($card['size_md']); ?> col-lg-6 col-md-6 col-sm-12">
                <div class="ui-item <?php echo e($card['color']); ?>">
                    <div class="left">
                        <i class="<?php echo e($card['icon2']); ?>"></i>
                    </div>
                    <div class="right">
                        <h4><?php echo e($card['amount']); ?></h4>
                        <p><?php echo e($card['desc']); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>

<div class="row">

    <div class="col-lg-7">
        <!-- Graph widget -->
        <div class="graph-widget ls-widget">
            <div class="tabs-box">
                <div class="widget-title">
                    <h4><?php echo e((is_admin()) ? __('Order views') : __('Your Profile Views')); ?></h4>
                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                </div>

                <div class="widget-content">
                    <canvas id="earning_chart"></canvas>
                    <script>
                        var views_chart_data = <?php echo json_encode($views_chart_data); ?>;
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <!-- Notification Widget -->
        <div class="notification-widget ls-widget">
            <div class="widget-title">
                <h4><?php echo e(__("Notifications")); ?></h4>
                <a class="noti-view-all" href="<?php echo e(route('core.notification.loadNotify')); ?>"><?php echo e(__("View all")); ?></a>
            </div>
            <div class="widget-content">
                <ul class="notification-list">
                    <?php $rows = $notifications ?>
                    <?php echo $__env->make('Core::frontend.notification.notification-loop-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(url('libs/chart_js/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(url('libs/daterange/moment.min.js')); ?>"></script>
    <?php if(file_exists(public_path('libs/moment/locale/' . app()->getLocale() . '.js'))): ?>
        <script src="<?php echo e(url('libs/moment/locale/' . app()->getLocale() . '.js')); ?>"></script>
    <?php endif; ?>
    <script src="<?php echo e(url('libs/daterange/daterangepicker.min.js?_ver='.config('app.version'))); ?>"></script>
    <script>
        var ctx = document.getElementById('earning_chart').getContext('2d');

        window.myMixedChart = new Chart(ctx, {
            type: 'line',
            data: views_chart_data,
            options: {
                layout: {
                    padding: 10,
                },

                legend: {
                    display: false
                },
                title: {
                    display: false
                },

                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: false
                        },
                        gridLines: {
                            borderDash: [6, 10],
                            color: "#d8d8d8",
                            lineWidth: 1,
                        },
                        ticks: {
                            beginAtZero: true,
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: false
                        },
                        gridLines: {
                            display: false
                        },
                    }],
                },

                tooltips: {
                    backgroundColor: '#333',
                    titleFontSize: 13,
                    titleFontColor: '#fff',
                    bodyFontColor: '#fff',
                    bodyFontSize: 13,
                    displayColors: false,
                    xPadding: 10,
                    yPadding: 10,
                    intersect: false
                }
            }
        });

        var start = moment().startOf('week');
        var end = moment();
        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            "alwaysShowCalendars": true,
            "opens": "left",
            "showDropdowns": true,
            ranges: {
                '<?php echo e(__("Today")); ?>': [moment(), moment()],
                '<?php echo e(__("Yesterday")); ?>': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '<?php echo e(__("Last 7 Days")); ?>': [moment().subtract(6, 'days'), moment()],
                '<?php echo e(__("Last 30 Days")); ?>': [moment().subtract(29, 'days'), moment()],
                '<?php echo e(__("This Month")); ?>': [moment().startOf('month'), moment().endOf('month')],
                '<?php echo e(__("Last Month")); ?>': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                '<?php echo e(__("This Year")); ?>': [moment().startOf('year'), moment().endOf('year')],
                '<?php echo e(__('This Week')); ?>': [moment().startOf('week'), end]
            },
            locale: _.merge(daterangepickerLocale, { direction: jobCore.rtl ? 'rtl':'ltr' })
        }, cb).on('apply.daterangepicker', function (ev, picker) {
            // Reload Earning JS
            $.ajax({
                url: '<?php echo e(route('admin.reloadChart')); ?>',
                data: {
                    chart: 'views',
                    from: picker.startDate.format('YYYY-MM-DD'),
                    to: picker.endDate.format('YYYY-MM-DD'),
                },
                dataType: 'json',
                type: 'post',
                success: function (res) {
                    if (res.status) {
                        window.myMixedChart.data = res.data;
                        window.myMixedChart.update();
                    }
                }
            })
        });
        cb(start, end);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/imac/Sites/localhost/Superio.2.6.1/superio.2.6.1/modules/Dashboard/Views/frontend/index.blade.php ENDPATH**/ ?>