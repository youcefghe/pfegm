<div class="mt-2 pl-4 pt-2 pb-2">

    <textarea class="form-control" id="comment-editor" name="comment"></textarea>
    <div class="row justify-content-end">
        <div class="col-md-3">
                 <a  class="nav-link text-white btn btn-primary btn-sm mt-3 mr-3 d-flex" id="comment-button" onclick="comment({{$postId}},{{$userId}})"><div id="spinner-border" class="spinner-border text-secondary  spinner-border-sm" role="status" style="display: none">
                         <span class="sr-only">Loading...</span>
                     </div> <p class="ml-2">{{ __('Comment') }}</p> </a>
        </div>
    </div>
</div>
<script>
    tinymce.init({
        selector: '#comment-editor',
        plugins: 'a11ycheckerlists   table ',
        // toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name'
    });
    function comment(post_id,user_id){
        let _token   = $('meta[name="csrf-token"]').attr('content');
        let post_content =tinymce.activeEditor.getContent();
        if(post_content){
            document.getElementById('spinner-border').style.display='flex';
            document.getElementById('comment-button').classList.add('disabled');
            console.log(post_content);

            $.ajax({
                url: "/comment",
                type:"POST",
                data:{
                    user_id:user_id,
                    post_id:post_id,
                    post_content:post_content,
                    _token: _token
                },
                success:function(response){
                    let pare2 = document.getElementById('commentSection');
                    pare2.insertAdjacentHTML('beforeend' , response);
                    //console.log(response.user)
                    const Toast = Swal.mixin({
                        toast:true,
                        position:'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    Toast.fire({
                        type: 'success',
                        title: 'comment added'
                    })
                    document.getElementById('spinner-border').style.display='none';
                    document.getElementById('comment-button').classList.remove('disabled');
                },
            });

        }
    }
</script>


