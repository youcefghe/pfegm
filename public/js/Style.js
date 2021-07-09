// *******  Background image loader ****

$(document).ready(function (){




    $('input').focus(function(event) {
        $(this).closest('.float-label-field').addClass('float').addClass('focus');
    })

    $('input').blur(function() {
        $(this).closest('.float-label-field').removeClass('focus');
        if (!$(this).val()) {
            $(this).closest('.float-label-field').removeClass('float');
        }
    });
    $('.lazyImage').addClass('loginBg');
    $('.lazyImageReg').addClass('registerBg');
    function deletePreview(ele, i) {
        "use strict";
        try {
            $(ele).parent().remove();
            window.filesToUpload.splice(i, 1);
        } catch (e) {
            console.log(e.message);
        }
    }
// ******* on change functions ****
    $("#files").on('change', function() {
        "use strict";
        // create an empty array for the files to reside.
        window.filesToUpload = [];

        if (this.files.length >= 1) {
            $("[id^=previewImg]").remove();

            $.each(this.files, function(i, img) {

                var reader = new FileReader(),
                    newElement = $("<div class='newDi' id='previewImg" + i + "' ><img class='addedImage ml-2'></div>"),
                    deleteBtn = $("").prependTo(newElement),
                    preview = newElement.find("img");

                reader.onloadend = function() {
                    preview.attr("src", reader.result);
                    preview.attr("alt", img.name);
                };

                try {
                    window.filesToUpload.push(document.getElementById("files").files[i]);
                } catch (e) {
                    console.log(e.message);
                }

                if (img) {
                    reader.readAsDataURL(img);
                } else {
                    preview.src = "";
                }

                newElement.appendTo("#gallery");
            });

        }

        var a = $('.newDi');

        for( var i = 0; i < a.length; i+=5 ) {
            a.slice(i, i+5).wrapAll('<div class="mb-3 d-flex"></div>');
        }

    });
    $('select').selectpicker();
    $('.fullsize').addClass('img-enlargeable').click(function() {
        var src = $(this).attr('src');
        var modal;

        function removeModal() {
            modal.remove();
            $('body').off('keyup.modal-close');
        }
        modal = $('<div>').css({
            background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
            backgroundSize: 'contain',
            width: '100%',
            height: '100%',
            position: 'fixed',
            zIndex: '10000',
            top: '0',
            left: '0',
            cursor: 'zoom-out'
        }).click(function() {
            removeModal();
        }).appendTo('body');
        //handling ESC
        $('body').on('keyup.modal-close', function(e) {
            if (e.key === 'Escape') {
                removeModal();
            }
        });
    });
    // $('.fullsize').on('click',function(){
    //     console.log($(this))
    //     $(this).style = 'transform:scale(1.5)';
    //     $(this).style = 'transition:transform 0.25s ease';
    // })
});

$("#ProfileIg").on('change', function() {
    "use strict";

    // create an empty array for the files to reside.
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#gallery').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]); // convert to base64 string
    }
});
$("#ProfileCov").on('change', function() {
    "use strict";

    // create an empty array for the files to reside.
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#galleryCov').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]); // convert to base64 string
    }
});
// ******* on focus functions ****
function goToNewPost(){
    window.location = "/new/post"
}
function goToNewLessonPost(){
    // let location = window.location
    // let community_id = new URL(location)
    var str = window.location.pathname;
    var n = str.indexOf('/',2);
    var result = str.substring(n + 1);
    var result2 = result.substring(0,1);
    var f = str.lastIndexOf('/');
    var result3 = str.substring(f + 1);
    console.log( result2)
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/community/"+result2+"/lesson",
        type:"GET",
        data:{

            _token: _token
        },
        success:function(response){
            window.location = "/new/"+response+"/post/"+result3
        },
    });

}
function getPosition(string, subString, index) {
    return string.split(subString, index).join(subString).length;
}
// ******* on click functions ****
var i = 0;
var maxFields =4
var ruleFiled='<div class="d-flex align-items-center removed-rule"><input type="text" name="rule[]" placeholder="Rules" class="  form-control mb-1">' +
    ' <a  class="ml-2 remove-tr"><i class="fa fa-trash-o fa-lg" style="color: #DC3343"></i></a> </div>';
$('.add-btn').click(function(){
    if(i<maxFields){
        $('#dynamicAddRemove').append(ruleFiled);
        ++i;
    }
    });
$(document).on('click', '.remove-tr', function(){
    $(this).parents('.removed-rule').remove();
});
$('.add_reply_btn').click(function(){
    $("#ModalFullPost").modal('hide');
    setTimeout(function(){$("#ModalReply").modal('show'); }, 3000);
})



// ******* onChange Functions *******
