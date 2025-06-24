jQuery(function ($) {
    $(document).on('click','.tabs-box .tab-buttons .tab-btn', function(e) {
        e.preventDefault();
        var target = $($(this).attr('data-tab'));
        if ($(target).is(':visible')) {
            return false;
        } else {
            target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
            $(this).addClass('active-btn');
            target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
            target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab animated fadeIn');
            $(target).fadeIn(300);
            $(target).addClass('active-tab animated fadeIn');
        }
    });
    if($( ".job-salary-range-slider" ).length) {
        //Salary Range Slider

        $(".job-salary-range-slider").each(function () {
            var min = $(this).attr('data-min');
            var max = $(this).attr('data-max');
            var from = $(this).attr('data-from');
            var to = $(this).attr('data-to');

            $(this).slider({
                range: true,
                min: parseFloat(min),
                max: parseFloat(max),
                values: [parseFloat(from),parseFloat(to) ],
                slide: function (event, ui) {
                    $(".job-salary-amount .min").text(bc_format_money(ui.values[0]));
                    $(".job-salary-amount .max").text(bc_format_money(ui.values[1]));
                    $("input[name=amount_from]").val(ui.values[0]);
                    $("input[name=amount_to]").val(ui.values[1]);
                }
        });

    });

        $(".chosen-container .content-slider").click(function (){
            return false;
        })

        $(".job-salary-amount .min").text(bc_format_money($(".job-salary-range-slider").slider("values", 0)));
        $(".job-salary-amount .max").text(bc_format_money($(".job-salary-range-slider").slider("values", 1)));
    }
})
