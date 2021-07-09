<div id="{{$comment->user->name.$comment->id}}" class="modal  fade">
    <div class="modal-dialog modal-dialog-centered " style="max-width: 800px;" role="document">
        <div class="modal-content" style="background: #f2f8f7; color: #808080;">
            <div class="modal-body mt-3">
                <div class="container-fluid">
                    <div class="mt-2 add-rp pl-4 pt-2 pb-2">

                        <textarea class="form-control reply-editor"  name="reply"></textarea>
                        <div class="row justify-content-end">
                            <div class="col-md-2">
                                <botton class="nav-link text-white btn btn-primary btn-sm mt-3 mr-3" onclick="reply({{$comment}})">{{ __('Reply') }}</botton>
                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script >

        tinymce.init({
            selector: '.reply-editor',
            plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist  pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            // toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name'
        });
        // function reply(comment){
        //     let _token   = $('meta[name="csrf-token"]').attr('content');
        //     let reply_content =tinymce.activeEditor.getContent();
        //     console.log(reply_content);
        //     $.ajax({
        //         url: "/reply",
        //         type:"POST",
        //         data:{
        //             commentId:comment.id,
        //             reply_content:reply_content,
        //             _token: _token
        //         },
        //         success:function(response){
        //             $('#'+comment.user.name+comment.id).modal("hide");
        //             let add = comment.user.picture+comment.id;
        //             let pare = document.getElementById(add);
        //             pare.insertAdjacentHTML('beforeend' , response);
        //             const Toast = Swal.mixin({
        //                 toast:true,
        //                 position:'top-end',
        //                 showConfirmButton: false,
        //                 timer: 3000,
        //                 timerProgressBar: true,
        //             });
        //             Toast.fire({
        //                 type: 'success',
        //                 title: 'reply added '
        //             });
        //         },
        //     });
        // }
    </script>
</div>


