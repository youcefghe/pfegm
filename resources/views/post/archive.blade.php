@extends('layouts.moderator')
@section('modera')
    <div class="col-md-8">
        <div id="post-moderator">
            <x-moderator.posts :posts="$posts"></x-moderator.posts>
        </div>
        <div class="post-load "  style="display: none">
            <x-post.skeleton></x-post.skeleton>
        </div>
    </div>
    <script>
        function loadMoreModeratorPost(page){
            let _token   = $('meta[name="csrf-token"]').attr('content');
            var str = window.location.pathname;
            var n = str.lastIndexOf('/');
            var result = str.substring(n + 1);
            $.ajax({
                url: "/moderator/community/post?page="+page,
                type:"GET",
                data:{
                    community_id:result
                },
                beforeSend:function (){
                    $('.post-load').show();
                }
            })
                .done(function (response) {
                    if(response.length == 0){
                        $('.post-load').hide();
                    }
                    let pare = document.getElementById('post-moderator');


                    pare.insertAdjacentHTML('beforeend' , response);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }
        var page=1;
        $(window).scroll(function () {
            if($(window).scrollTop() + $(window).height() >= $(document).height()){
                //if(window.location.pathname.include('')){
                page ++;
                loadMoreModeratorPost(page);
                //  }
            }
        });
    </script>
@endsection
