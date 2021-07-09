function redirectToMembers(){
    var str = window.location.pathname;
    var n = str.lastIndexOf('/');
    var result = str.substring(n + 1);
    window.location = '/moderator/community/members/'+result;
}
function redirectToPost(){
    var str = window.location.pathname;
    var n = str.lastIndexOf('/');
    var result = str.substring(n + 1);
    window.location = '/moderator/community/'+result;
}

function redirectToAnalistics(){
    var str = window.location.pathname;
    var n = str.lastIndexOf('/');
    var result = str.substring(n + 1);
    window.location = '/moderator/community/analystics/'+result;
}
function redirectToArhcive(){
    var str = window.location.pathname;
    var n = str.lastIndexOf('/');
    var result = str.substring(n + 1);
    window.location = '/moderator/community/archive/'+result;
}
function redirectToEditInformation(){
    var str = window.location.pathname;
    var n = str.lastIndexOf('/');
    var result = str.substring(n + 1);
    window.location = '/moderator/community/edit/'+result;
}
function redirectToReportedPosts(){
    var str = window.location.pathname;
    var n = str.lastIndexOf('/');
    var result = str.substring(n + 1);
    window.location = '/moderator/community/reported/'+result;
}
//post up vote for votes
function upVote(post_id,user_id){
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/upvote",
        type:"POST",
        data:{
            user_id:user_id,
            post_id:post_id,
            _token: _token
        },
        success:function(response){
            document.getElementById(post_id).innerHTML=response.vote;
        },
    });

}
function commentDelete(comment_id){
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/delete/"+comment_id+"/comment",
        type:"DELETE",
        data:{
            _token: _token
        },
        success:function(response){
            const Toast = Swal.mixin({
                toast:true,
                position:'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            Toast.fire({
                type: 'warning',
                title: response.message
            });
            location.reload();
        },
    });

}
function replyDelete(reply_id){
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/delete/"+reply_id+"/reply",
        type:"DELETE",
        data:{
            _token: _token
        },
        success:function(response){
            const Toast = Swal.mixin({
                toast:true,
                position:'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            Toast.fire({
                type: 'warning',
                title: response.message
            });
            location.reload();
        },
    });

}
function whyReported(cause){
    Swal.fire({
        title: 'Because!',
        text: cause[0].details,
        type: 'error',
        confirmButtonText: 'Ok'
    })
}
function postDelete(id){
    let _token   = $('meta[name="csrf-token"]').attr('content');
    swal({
        title: "Are you sure!",
        type: "error",
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes!",
        showCancelButton: true,
    }).then((willDelete) => {
        if (willDelete.value == true) {
            $.ajax({
                url: "/post",
                type:"DELETE",
                data:{
                    postId:id,
                    _token: _token
                },
                success:function(response){

                    const Toast = Swal.mixin({
                        toast:true,
                        position:'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    Toast.fire({
                        type: 'warning',
                        title: response.message
                    });
                    location.reload();
                },
            });
        }
    });
}
function markAllMessages(){
    $.ajax({
        url: "/notification/markAll",
        type:"Get",
        success:function(response){
            $('#notBadge').hide();
            $('#notificationsMenu > .notification-box').remove();
            document.getElementById('notification-head').insertAdjacentHTML('afterend' , '<div class="container justify-content-center no-notifications"><p class="text-secondary h5">No notifications</p></div>');

            document.getElementById('notification-span').innerText='Notifications (0)';

        },
    });
}
//get up voted posts
function upPost(){
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/upVoted/Post",
        type:"GET",
        success:function(response){
            document.getElementById('posts').innerHTML='';
            console.log(response);
            document.getElementById('posts').insertAdjacentHTML('beforeend' , response);
        },
    });

}
function downPost(){
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/downVoted/Post",
        type:"GET",
        success:function(response){
            document.getElementById('posts').innerHTML='';
            console.log(response);
            document.getElementById('posts').insertAdjacentHTML('beforeend' , response);
        },
    });

}
function savedPost(){
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/Saved/Post",
        type:"GET",
        success:function(response){
            document.getElementById('posts').innerHTML='';
            document.getElementById('posts').insertAdjacentHTML('beforeend' , response);
        },
    });

}
function reportedPost(){
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/Reported/Post",
        type:"GET",
        success:function(response){
            document.getElementById('posts').innerHTML='';
            document.getElementById('posts').insertAdjacentHTML('beforeend' , response);
        },
    });

}
function reply(comment){
    swal({
        title: 'write something',
        input: 'textarea',
        inputLabel: 'Add reply',
        inputPlaceholder: 'Enter rreply',
        inputValidator: (value) => {
            return new Promise((resolve) => {
                if (value ) {
                    resolve()
                } else {
                    resolve('You should write something :)')
                }
            })
        }
    }).then(function(e){
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/reply",
            type:"POST",
            data:{
                commentId:comment.id,
                reply_content:e.value,
                _token: _token
            },
            success:function(response){

                let add = comment.user.picture+comment.id;
                let pare = document.getElementById(add);
                pare.insertAdjacentHTML('beforeend' , response);
                const Toast = Swal.mixin({
                    toast:true,
                    position:'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
                Toast.fire({
                    type: 'success',
                    title: 'reply added '
                });
            },
        });

    })
}
function AcceptComment(postId,commentId){
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/Accept",
        type:"POST",
        data:{
            postId:postId,
            commentId:commentId,
            _token: _token
        },
        success:function(response){

            const Toast = Swal.mixin({
                toast:true,
                position:'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            Toast.fire({
                type: 'success',
                title: response.message
            });
            location.reload();
        },
    });
}
function previewPostDelete(id){
    let _token   = $('meta[name="csrf-token"]').attr('content');
    console.log(id);
    $.ajax({
        url: "/delete/post",
        type:"DELETE",
        data:{
            postId:id,
            _token: _token
        },
        success:function(response){

            const Toast = Swal.mixin({
                toast:true,
                position:'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            Toast.fire({
                type: 'warning',
                title: response.message
            });
            location.reload();
        },
    });
}
function reportPost(id,iud){
    swal({
        title: 'why you report this post',
        input: 'textarea',
        inputLabel: 'Report details',
        inputPlaceholder: 'Enter report details',
        inputValidator: (value) => {
            return new Promise((resolve) => {
                if (value ) {
                    resolve()
                } else {
                    resolve('You should write something :)')
                }
            })
        }
    }).then(function(e){
        let _token   = $('meta[name="csrf-token"]').attr('content');
        console.log(id);
        $.ajax({
            url: "/report/post",
            type:"POST",
            data:{
                postId:id,
                ID:iud,
                details:e.value,
                _token: _token
            },
            success:function(response){
                console.log(response);
                const Toast = Swal.mixin({
                    toast:true,
                    position:'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
                Toast.fire({
                    type: 'warning',
                    title: response.message
                });
                  // console.log(response.message)
               // swal("Warning!", response.message, "warning");
            },
        });
    })
}
function savePost(id){
    let _token   = $('meta[name="csrf-token"]').attr('content');
   console.log(id);
    $.ajax({
        url: "/save/post",
        type:"POST",
        data:{
            postId:id,
              _token: _token
        },
        success:function(response){

            const Toast = Swal.mixin({
                toast:true,
                    position:'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
            });
            Toast.fire({
                type: 'success',
                title: response.message
            });
        },
    });
}

function upCommentVote(comment_id,user_id){
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/comment/upvote",
        type:"POST",
        data:{
            userId:user_id,
            commentId:comment_id,
            _token: _token
        },
        success:function(response){
            console.log(response.commentVote);

            document.getElementById(comment_id.toString() + comment_id.toString()).innerHTML=response.commentVote;

        },
    });

}
//post down vote for post
function downVote(post_id,user_id){
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/downvote",
        type:"POST",
        data:{
            user_id:user_id,
            post_id:post_id,
            _token: _token
        },
        success:function(response){
            document.getElementById(post_id).innerHTML=response.vote;
        },
    });

}
function downCommentVote(comment_id,user_id){
    let _token   = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/comment/downvote",
        type:"POST",
        data:{
            userId:user_id,
            commentId:comment_id,
            _token: _token
        },
        success:function(response){
            console.log(response.commentVote);
            document.getElementById(comment_id.toString() + comment_id.toString()).innerHTML=response.commentVote;
        },
    });

}

function markAsRead(id){
    console.log(id);
    $.ajax({
        url: "/markAsRead/"+id,
        type:"Get",
        success:function(response){

            window.location=response.url;
            //  document.getElementById('notificationsMenu').insertAdjacentHTML('beforeend' , response.notifications);
        },
    });
}

$(document).ready(function(){
    //post comment


    // var replyEditor = CKEDITOR.replace( 'add-reply' );
    // function reply(comment){
    //     let _token   = $('meta[name="csrf-token"]').attr('content');
    //     let reply_content = replyEditor.getData();
    //
    //
    //     $.ajax({
    //         url: "/reply",
    //         type:"POST",
    //         data:{
    //             commentId:comment.id,
    //             reply_content:reply_content,
    //             _token: _token
    //         },
    //         success:function(response){
    //             let add = comment.user.name;
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
    $.ajax({
        url: "moderator/communities",
        type:"GET",
        success:function(response){
            console.log(response)
            let pare = document.getElementById('user_mod_inter');

            pare.insertAdjacentHTML('beforeend' , response);
            $(".selectpicker").selectpicker("refresh");

        },
    })
});


