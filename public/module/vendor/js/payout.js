var vendorPayout = {
    saveAccounts:function (btn) {
        var parent = $(btn).closest('.bravo-form');
        parent.addClass('loading');

        $.ajax({
            url:jobCore.url+'/payout/account/store',
            method:"post",
            data:parent.find('input,select,textarea').serialize(),
            dataType:'json',
            success:function (json) {
                parent.removeClass('loading');
                if(json.message){
                    //jobCoreApp.showSuccess(json.message);
                }
                if(json.status){
                    window.setTimeout(function () {
                        window.location.reload();
                    },2000);
                }
            },
            error:function (e) {
                console.log(e);
                parent.removeClass('loading');
                jobCoreApp.showAjaxError(e);
            }
        })
    },

};
