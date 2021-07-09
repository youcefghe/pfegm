<div class="card shadow rounded-lg" style="width: 40rem;">
    <div class="card-header " style="background: #e8e8e8;padding-top: 0.25rem;border:none; padding-bottom: 0.25rem;" >
        <div class="container row align-items-center">
            <h5 style="color: #525252;">@if(Request::route()->getName() == 'Public')
                    All Communities
                    @else
                    All my Communities
                @endif
            </h5>
        </div>
    </div>
    <div class="card-body" id="allCommuniites" style="padding-top: 0.25rem;">

        @foreach ($communities as $community)
            <div class="row mb-1 " style="border-bottom: 1px solid #bdbdbd" >
                <div class="mt-1 d-flex justify-content-center" >


                    <img class="mt-n1 ml-2 mb-2 shadow" src="{{$community->picture}}" style="height: 35px;width: 35px;border-radius: 50%">
                    <a class="ml-1 mt-1 text-secondary" style="text-decoration: none" href="{{route('community',['id'=>$community->id])}}"> {{$community->name}}</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="ajax-load text-center card-footer" style="display: none">
        <p><img src="{{asset('/images/community/loading.gif')}}"> Loading More Communities</p>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function loadMoreCommunities(page){
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/publiccommunities?page="+page,
            type:"GET",
            beforeSend:function (){
                $('.ajax-load').show();
            }
            })
            .done(function (response) {

            let pare = document.getElementById('allCommuniites');
            pare.insertAdjacentHTML('beforeend' , response);
                if (response.length == 0) {
                    $('.ajax-load').html("We don't have more data to display :(");
                    return;
                }
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }
    var page=1;
    $(window).scroll(function () {
        if($(window).scrollTop() + $(window).height() >= $(document).height()){
            console.log(window.location.pathname);
            if(window.location.pathname == '/publiccommunities'){
                page ++;
                loadMoreCommunities(page);
            }
        }
    });
</script>
