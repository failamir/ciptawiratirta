jQuery(function ($) {
    "use strict"
    //Input group image select
    $('.upload-btn-wrapper').each(function () {
        var container = $(this);
        $(document).on('change', '.btn-file :file', function (event) {
            var files = event.target.files;
            var input = $(this);
            var formData = new FormData();
            $.each(files, function (key, value) {
                formData.append('file', value);
            });
            formData.append('type', "image");
            $.ajax({
                url: '/admin/module/media/store',
                type: 'POST',
                data: formData,
                enctype: 'multipart/form-data',
                beforeSend: function () {
                    input.trigger("bravo-file-before-update")
                },
                success: function (data) {
                    if (data.status === 1) {
                        input.trigger("bravo-file-update-success", data)
                    } else {
                        input.trigger("bravo-file-update-error", data.message)
                    }
                },
                error: function (xhr) {
                    input.trigger("bravo-file-update-error")
                },
                complete: function () {
                    input.trigger("bravo-file-update-complete")
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
        container.find('.btn-file :file').on('bravo-file-update-success', function (event, data) {
            console.log(data);
            container.find("input[type=hidden]").attr('value', data.data.id);
            container.find(".image-demo").attr('src', data.data.sizes.default);
            container.find(".text-view").attr('value', data.data.sizes.default);
        });
        container.find('.btn-file :file').on('bravo-file-before-update', function () {
            container.find(".text-view").attr('value', container.find(".text-view").data("loading"));
        });
        container.find('.btn-file :file').on('bravo-file-update-error', function (event, message) {
            if (message.length > 0) {
                container.find(".text-view").attr('value', message);
            } else {
                container.find(".text-view").attr('value', container.find(".text-view").data("error"));
            }
        });
    });
    $(".form-group-item").each(function () {
        let container = $(this);
        $(this).on('click', '.btn-remove-item', function () {
            $(this).closest(".item").remove();
        });
        $(this).on('press', 'input,select', function () {
            let value = $(this).val();
            $(this).attr("value", value);
        });
    });
    $(".form-group-item .btn-add-item").on('click',function () {
        let number = $(this).closest(".form-group-item").find(".g-items .item:last-child").data("number");
        if (number === undefined) number = 0;
        else number++;
        let extra_html = $(this).closest(".form-group-item").find(".g-more").html();
        extra_html = extra_html.replace(/__name__=/gi, "name=");
        extra_html = extra_html.replace(/__number__/gi, number);
        $(this).closest(".form-group-item").find(".g-items").append(extra_html);
    });

    $(document).on('click','.dungdt-upload-box-normal .btn-field-upload,.dungdt-upload-box-normal .attach-demo',function () {
        let p = $(this).closest('.dungdt-upload-box');

        uploaderModal.show({
            multiple: false,
            file_type: 'image',
            onSelect: function (files) {
                p.addClass('active');
                p.find('.attach-demo').html('<img src="' + files[0].thumb_size + '"/>');
                p.find('input').val(files[0].id);
            },
        });

    });
    $('.dungdt-upload-box-normal .delete').on('click',function (e) {
        e.preventDefault();
        let p = $(this).closest('.dungdt-upload-box');
        p.find("input").attr('value','')
        p.removeClass("active");
    });

    $('.dungdt-upload-multiple').find('.btn-field-upload').on('click',function () {
        let p = $(this).closest('.dungdt-upload-multiple');

        let type = $(this).data('type');

        uploaderModal.show({
            multiple:true,
            file_type: (typeof type == 'undefined' ? 'image' : type),
            onSelect:function (files) {
                console.log(files);
                if(typeof files !='undefined' && files.length)
                {
                    var ids = [];
                    var html = '';
                    p.addClass('active');

                    for(var i = 0 ; i < files.length; i++){
                        ids.push(files[i].id);
                        if(typeof type == 'undefined'){
                            html+='<div class="image-item"><div class="inner"><span class="delete btn btn-sm btn-danger"><i class="fa fa-trash"></i></span><img src="'+files[i].thumb_size+'"/></div></div>'
                        }else{
                            if(files[i].file_extension == 'docx' || files[i].file_extension == 'doc'){
                                var file_icon = 'fa-file-word-o';
                            }else{
                                var file_icon = 'fa-file-pdf-o';
                            }

                            html+='<div class="item">'
                                +'<div class="row">' +
                                '<div class="col-md-2">' +
                                '  <input type="radio" class="form-control" name="csv_default"  value="'+files[i].id+'" />' +
                                '</div>'
                                +'<div class="col-md-8">'
                                +'<input type="hidden" name="cvs[]" class="form-control" value="'+files[i].id+'" >'
                                +'<i class="fa '+file_icon+'"></i> '
                                + files[i].file_name +'.'+ files[i].file_extension
                                +'</div>'
                                +'<div class="col-md-2">'
                                +'<span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>'
                                +'</div>'
                                +'</div>'
                                +'</div>'
                        }
                    }
                    if(typeof type == 'undefined'){
                        p.find('.attach-demo').append(html);
                        var old = p.find('input').val().split(',');
                        p.find('input').val(ids.concat(old).join(','));
                    }else{
                        $('.lists_'+type).append(html);
                    }

                }

            },
        });

    });

    $('.dungdt-upload-multiple').on('click','.image-item .delete',function () {
        var i = $(this).closest('.image-item').index();
        let p = $(this).closest('.dungdt-upload-multiple');
        var ids = p.find('input').val().split(',');

        ids.splice(i,1);

        p.find('input').val(ids.join(','));
        $(this).closest('.image-item').remove();

    });


    $(".bravo_user_profile .sidebar-menu .caret").on('click',function () {
        $(this).closest("li").toggleClass("active_child");
    });

    $(".bravo_user_profile .bravo-list-item .control-action .btn-danger").on('click',function () {
        var c = confirm($(this).data('confirm'));
        if(!c){
            return false;
        }
    });

    $(".bravo_user_profile .bravo-list-item .control-action .btn-recovery").on('click',function () {
        var c = confirm($(this).data('confirm'));
        if(!c){
            return false;
        }
    });

    function makeid(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }
    // Form Configs
    $('.has-ckeditor').each(function () {
        var els  = $(this);

        var id = $(this).attr('id');

        if(!id){
            id = makeid(10);
            $(this).attr('id',id);
        }
        var h  = els.data('height');
        if(!h && typeof h =='undefined') h = 300;

        // CKEDITOR.replace( id );
        tinymce.init({
            selector:'#'+id,
            plugins: 'preview searchreplace autolink code fullscreen image link media codesample table charmap hr toc advlist lists wordcount imagetools textpattern help pagebreak hr',
            toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | pagebreak codesample code| removeformat',
            image_advtab: true,
            image_caption: true,
            toolbar_drawer: 'sliding',
            relative_urls : false,
            height:h,
            file_picker_callback: function (callback, value, meta) {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    uploaderModal.show({
                        multiple:false,
                        file_type:'video',
                        onSelect:function (files) {
                            if(files.length)
                                callback(jobCore.url+'/media/preview/'+files[0].id);
                        },
                    });
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    uploaderModal.show({
                        multiple:false,
                        file_type:'image',
                        onSelect:function (files) {
                            if(files.length)
                                callback(files[0].thumb_size);
                        },
                    });
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    uploaderModal.show({
                        multiple:false,
                        file_type:'video',
                        onSelect:function (files) {
                            if(files.length)
                                callback(jobCore.url+'/media/preview/'+files[0].id);
                        },
                    });
                }
            },
        });

    });


    $(".bravo_user_profile .sidebar-menu .active_child").each(function () {
        $(this).closest('.has-children').addClass('active_child').addClass('active');
    });

    $('.form-add-service .nav-tabs a').on('click',function () {
        setTimeout(function () {
            window.dispatchEvent(new Event('resize'));
        },200)
    });

    $('.btn-upload-private-file').on('change',function () {
        var me = $(this);
        var p = $(this).closest('.btn-upload-private-wrap');
        var lists = p.find('.private-file-lists');

        me.isLoading = true;
        for(var i = 0 ;i < me.get(0).files.length ; i++) {
            var d = new FormData();
            d.append('file',me.get(0).files[i]);
            $.ajax({
                url: jobCore.url + '/media/private/store',
                data: d,
                dataType: 'json',
                type: 'post',
                contentType: false,
                processData: false,
                success: function (res) {
                    me.val('');
                    if (res.status === 0) {
                        jobCoreApp.showError(res);
                    }
                    if (res.data) {
                        var div = $('<div/>');
                        var input = $("<input/>");
                        input.attr('type', 'hidden');
                        input.attr('name', me.data('name'));
                        input.val(JSON.stringify(res.data));

                        div.append(input);
                        div.append("<a target='_blank' href='" + res.data.download + "'> " + res.data.name + '.' + res.data.file_extension + " <i class=\"fa fa-download\"></i> </a>");

                        if (me.data('multiple')) {
                            lists.append(div);
                        } else {
                            lists.html(div);
                        }
                    }
                },
                error: function (e) {
                    jobCoreApp.showAjaxError(e);
                    me.val('');
                }
            })
        }
    })
    $('.dungdt-select2-field').each(function () {
        var configs = $(this).data('options');
        $(this).select2(configs);
    })
    $('.dungdt-apply-form-btn').on('click',function (e) {
        var $this = $(this);
        var action = $this.closest('form').find('[name=action]').val();
        var apply_action = function () {
            let ids = '';
            $(".bravo-form-item .check-item").each(function () {
                if($(this).is(":checked")){
                    ids += '<input type="hidden" name="ids[]" value="'+$(this).val()+'">';
                }
            });
            $this.closest('form').append(ids).submit();
        }
        if(action === 'delete' ||  action === 'permanently_delete')
        {
            jobCoreApp.showConfirm({
                message: i18n.confirm_delete,
                callback: function(result){
                    if(result){
                        apply_action();
                    }
                }
            })
        }else if(action === 'recovery')
        {
            jobCoreApp.showConfirm({
                message: i18n.confirm_recovery,
                callback: function(result){
                    if(result){
                        apply_action();
                    }
                }
            })
        }else{
            apply_action();
        }
    });

    $(document).on("click", ".cv-manager-widget .file-edit-box .title", function (e) {
        e.preventDefault();
        $(this).closest(".file-edit-box").find("input[name=csv_default]").trigger('click');
    })
    $(document).on("change", ".cv-manager-widget .file-edit-box input[name=csv_default]", function (e) {
        e.preventDefault();
        var t = $(this);
        $("body .cv-manager-widget .file-edit-box").removeClass("is-default");
        t.closest(".file-edit-box").addClass("is-default");
        console.log(t.val());
        $.ajax({
            url: jobCore.url + '/user/set-default-cv',
            data: {
                'cv_id': t.val()
            },
            dataType: 'json',
            type: 'post',
            success: function (res) {

            },
            error: function (res) {

            }
        })
    })

    $(document).on("click", ".delete-cv", function (e) {
        e.preventDefault();
        var t = $(this), p = $(this).closest(".file-edit-box");

        if(t.closest(".is-default").length){
            alert(i18n.default_cv_del);
            return false
        }
        if (confirm(i18n.confirm_delete)){
            t.addClass("loading");
            $.ajax({
                url: jobCore.url + '/user/delete-cv',
                data: {
                    'cv_id': p.attr('data-id')
                },
                dataType: 'json',
                type: 'post',
                success: function (res) {
                    t.removeClass("loading");
                    p.remove();
                },
                error: function (res) {
                    t.removeClass("loading");
                }
            })
        }
    });

    let file;
    if($(".cv-drag-area").length > 0) {
        //selecting all required elements
        const dropArea = document.querySelector(".cv-drag-area"),
            button = $(".cv-drag-area button"),
            input = $(".cv-drag-area input");

        button.on("click", function () {
            input.click();
        });
        input.on("change", function () {
            if (this.files[0]) {
                file = this.files[0];
                uploadCvFile();
            }
        })

        dropArea.addEventListener("dragover", (event) => {
            event.preventDefault();
        });

        dropArea.addEventListener("drop", (event) => {
            event.preventDefault();
            file = event.dataTransfer.files[0];
            uploadCvFile();
        });

        function uploadCvFile() {
            let fileType = file.type;
            let validExtensions = ["application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
            if (validExtensions.includes(fileType)) {
                dropArea.classList.add("loading");
                var formData = new FormData();
                formData.append('cv_file', file);
                $.ajax({
                    url: jobCore.url + '/user/upload-cv',
                    data: formData,
                    dataType: 'json',
                    type: 'post',
                    contentType: false,
                    processData: false,
                    success: function (res) {
                        dropArea.classList.remove("loading");

                        var cv_html = '<div class="file-edit-box '+ (res.is_default ? 'is-default' : '') +'" data-id="'+ res.cv_id +'" > \n' +
                                        '<span class="title">'+ res.file_name +'</span>\n' +
                                        '<input type="radio" '+ (res.is_default ? 'checked' : '') +' class="form-control" name="csv_default" value="'+ res.cv_id +'">\n' +
                                        '<div class="edit-btns">\n' +
                                            '<button class="delete-cv"><span class="la la-trash"></span></button>\n' +
                                        '</div>\n' +
                                    '</div>';
                        $(".files-outer").append(cv_html);
                    },
                    error: function (res) {
                        dropArea.classList.remove("loading");
                    }
                })
            } else {
                alert("This file is not supported");
            }
        }
    }
});

var vendorPayout = {
    saveAccounts:function (btn) {
        var parent = $(btn).closest('.bravo-form');
        parent.addClass('loading');

        $.ajax({
            url:jobCore.url+'/vendor/storePayoutAccounts',
            method:"post",
            data:parent.find('input,select,textarea').serialize(),
            dataType:'json',
            success:function (json) {
                parent.removeClass('loading');
                if(json.message){
                    jobCoreApp.showSuccess(json.message);
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
    sendRequest:function (btn) {
        var parent = $(btn).closest('.modal');
        var form = parent.find('form');
        form.removeClass('was-validated');

        if(form[0].checkValidity() === false){
            form.addClass('was-validated');
            return false;
        }

        parent.addClass('loading');

        $.ajax({
            url:jobCore.url+'/vendor/createPayoutRequest',
            method:"post",
            data:form.find('input,select,textarea').serialize(),
            dataType:'json',
            success:function (json) {
                parent.removeClass('loading');
                if(json.message){
                    jobCoreApp.showSuccess(json.message);
                }
                if(json.status){
                    window.setTimeout(function () {
                        window.location.reload();
                    },3000);
                }
            },
            error:function (e) {
                console.log(e);
                parent.removeClass('loading');
                jobCoreApp.showAjaxError(e);
            }
        })
    }


};

$(document).ready(()=>{
    $('.has-datepicker').each(function(){
        createDateFormat($(this));
    })
})
function createDateFormat(el){
    const format = el.data('format') ? el.data('format') : 'YYYY/MM/DD'
    el.daterangepicker({
        singleDatePicker: true,
        showCalendar: false,
        autoUpdateInput: false, //disable default date
        sameDate: true,
        autoApply           : true,
        disabledPast        : true,
        enableLoading       : true,
        showEventTooltip    : true,
        classNotAvailable   : ['disabled', 'off'],
        disableHightLight: true,
        showDropdowns: true,
        locale:{
            format:format
        }
    }).on('apply.daterangepicker', function (ev, picker) {
        el.val(picker.startDate.format(format));
    });
}
