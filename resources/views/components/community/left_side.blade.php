<div  class="col-md-8"  >
    @if(auth()->user())
    <x-post.new_post_card></x-post.new_post_card>
    <x-post.filter></x-post.filter>
    @endif

    @foreach($allposts as $post)
    <x-community.preview :post="$post" :community="$community" :members="$members" :joined="$joined" :creator="$creator" :moderators="$moderators"></x-community.preview>
    @endforeach
    <div id="second_post" class="mt-3">
    </div>
    <div class="post-load "  style="display: none">
        <x-post.skeleton></x-post.skeleton>
    </div>
</div>
<script>
    function loadMoreCommunityPost(page){
        let _token   = $('meta[name="csrf-token"]').attr('content');
        var str = window.location.pathname;
        var n = str.lastIndexOf('/');
        var result = str.substring(n + 1);
        $.ajax({
            url: "/post/more?page="+page,
            type:"GET",
            data:{
                community_id:result
            },
            beforeSend:function (){
                $('.post-load').show();
            }
        })
            .done(function (response) {

                let pare = document.getElementById('second_post');


                pare.insertAdjacentHTML('beforeend' , response);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }
    var page=1;
    $(window).scroll(function () {
        if($(window).scrollTop() + $(window).height() >= $(document).height()){
            page ++;
            loadMoreCommunityPost(page);
        }
    });
</script>
