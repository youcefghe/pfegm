<div  class="col-md-8"  >
    <x-post.new_post_card></x-post.new_post_card>
    <x-post.filter></x-post.filter>

        @foreach($posts as $post)
        <x-post.preview :post="$post" :community="$post->community" ></x-post.preview>
        @endforeach
    <div id="second_post" class="mt-3">
    </div>
    <div class="post-load "  style="display: none">
        <x-post.skeleton></x-post.skeleton>
    </div>
</div>
<script>
    function loadMoreHomePost(page){
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/user?page="+page,
            type:"GET",
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
    function loadMoreHotPost(page){
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/Hot/Posts?page="+page,
            type:"GET",
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
            console.log(window.location.pathname);
            if(window.location.pathname == '/user'){
                page ++;
                loadMoreHomePost(page);
            }
        }
    });
</script>
