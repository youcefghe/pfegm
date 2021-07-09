@extends('layouts.mooc')
@section('content')
    <div class="conatainer ml-5 mt-5 mr-5 shadow-lg  mb-5">
        <div class="bg-filter">
            <x-platform.header :course="$lesson->course" ></x-platform.header>
        </div>
        <div class="row pt-3 bg-white ml-0 mr-0">
            <div class="col-md-8">
                <p class="h3">Evolution of IT</p>
                <img src="{{asset('images/test_course.jpg')}}" class="mb-3" alt="test">
                <div id="contentSection" class="ml-2">{!! $lesson->content !!}</div>
            </div>
            <div class="col-md-4 pt-3">
                <x-platform.sidebar :course="$lesson->course"></x-platform.sidebar>
            </div>
        </div>
        <div class="bg-filter mt-3">
            <x-platform.footer :user="$lesson->course->instructor"></x-platform.footer>
        </div>
    </div>

@endsection
@push('styles')
    <link href="{{ asset('css/course.css') }}" rel="stylesheet">
@endpush
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script  type="text/javascript">
    $(document).ready(function (){

        let id = {!! Route::current()->parameters()['lesson_id'] !!};
        $.ajax({
            url: "/lesson/" + id + "/elements",
            type: "Get",
            success: function (response) {
                console.log(response.posts)
                var post = response.posts;
                var currentTime = new Date().getTime();
                var content = document.getElementById('contentSection')

                var content = document.getElementById('contentSection').children;
                for (var i = 0; i <= content.length - 1; i++) {
                    if (post[content[i].id] && post[content[i].id].length > 0) {
                        console.log(post[content[i].id])
                        var p = document.getElementById(content[i].id);
                        var div = document.createElement("div");
                        var pp = post[content[i].id];
                        var postCount =0;
                        for(var l = 0; l <= pp.length - 1; l++) {
                            var p = document.createElement("p");
                            var node = document.createTextNode(pp[l].title);
                            p.appendChild(node);
                            div.appendChild(p);
                            postCount ++;
                        }

                        var link = '<div class="popover__wrapper">  <a href="/community/'+  post[content[i].id][0].community_id+'/posts/'+post[content[i].id][0].element_id+'" class="popover__title"><i class="fa fa-info-circle" ></i></a><a class="badge badge-add text-white" href="/new/'+ id+'/post/'+content[i].id +'"  style="font-size:10px;"><i class=" fa fa-plus"></i></a><i class="badge badge-notify text-white" style="font-size:10px;">'+ postCount +'</i> <div class="popover__content"> <div class="popover__message"> '+ div.innerHTML +'</div>  </div> </div>'

                        document.getElementById(content[i].id).insertAdjacentHTML('afterbegin',link);

                    } else {
                        var p = document.getElementById(content[i].id);
                        var a = document.createElement("a");
                        var j = document.createElement("i");
                        a.href = "/new/"+ id+"/post/"+content[i].id ;
                        par = content[i].id + i;


                        j.classList.add('fa');
                        j.classList.add('fa-2x');
                        j.classList.add('fa-plus-circle');
                        j.classList.add('mr-1');

                        j.setAttribute('id', 'post' + content[i].id + i);
                        a.append(j)
                        document.getElementById(content[i].id).insertBefore(a, document.getElementById(content[i].id).firstChild);

                    }

                }

            },

        });
        $('#contentSection').tooltip({
            selector: "a[rel=tooltip]"
        })
    })

</script>
