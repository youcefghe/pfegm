@extends('layouts.app')
@section('content')
    <div style="background: #f2f8f7;">

        <div class="container "  >
            <div class="row mr-0 pl-0" style="position: relative; background: url({{asset(auth()->user()->cover)}});width: 100%;height: 150px;background-position: center center; background-size: cover;">
                     </div>


                <nav class=" ml-n3 navbar navbar-expand-md  "  style="padding: 0px;position: relative">
                    <div class="container " style="padding-left: 0px;">
                        <div class="bg-white d-flex pl-5" style="width: 100%;">
                    <img class="mb-3 ml-2" src="{{asset(auth()->user()->picture)}}" style="position: absolute;margin-top:-70px; border-radius: 5px;  height: 100px;width: 120px;">
                                                <ul class="navbar-nav  text-secondary pb-1 pt-2 " style="margin-left: 8.5rem;background: white;">
                            <li class="nav-item " style="margin-left:5px;" >
                                <a class="nav-link nav-profile active " href="/profile"  style="padding-bottom: 0px;" ><h5 style="margin-bottom: 0px;" >All</h5> </a>
                            </li>
                        <li class="nav-item " style="margin-left:5px;" >
                            <a class="nav-link nav-profile" href="#" onclick="savedPost()" style="padding-bottom: 0px;"  ><h5 style="margin-bottom: 0px;" >Saved Posts</h5> </a>
                        </li>
                        <li class="nav-item " style="margin-left:5px;" >
                            <a class="nav-link nav-profile" href="#" style="padding-bottom: 0px;" ><h5 style="margin-bottom: 0px;" >Shared Posts</h5> </a>
                        </li>
                        <li class="nav-item " style="margin-left:5px;" >
                            <a class="nav-link nav-profile" href="#" onclick="reportedPost()" style="padding-bottom: 0px;"  ><h5 style="margin-bottom: 0px;" >Reported Posts</h5> </a>
                        </li>
                        <li class="nav-item " style="margin-left:5px;" >
                            <a class="nav-link nav-profile" href="#" onclick="upPost()" style="padding-bottom: 0px;"  ><h5 style="margin-bottom: 0px;" >Up Vote</h5> </a>
                        </li>
                        <li class="nav-item " style="margin-left:5px;" >
                            <a class="nav-link nav-profile" href="#" onclick="downPost()" style="padding-bottom: 0px;"  ><h5 style="margin-bottom: 0px;" >Down vote</h5> </a>
                        </li>
                    </ul>

                    </div>
                    </div>
                </nav>


            <div class="row mt-1 " style="padding-top:50px!important;" >
                <div  class="col-md-8" id="posts" >
                    <x-user.all_posts :posts="$posts"></x-user.all_posts>
                    <div id="inserted_post">
                    </div>
                    <div class="post-load "  style="display: none">
                    <x-post.skeleton></x-post.skeleton>
                    </div>
                </div>
                <div class="col-md-4 pl-5" >

                    <div class="row mb-3">
                       <x-community.community :communities="$communities"></x-community.community>
                    </div>

                    <div class="row mb-3">
                        <x-user.footer></x-user.footer>

                    </div>
                </div>
            </div>
        </div>
{{--        <div id="ModalEditInformationForm" class="modal  fade">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <div class="modal-content w-75" style="background: #f2f8f7; color: #808080;">--}}
{{--                    <x-user.edit_information></x-user.edit_information>--}}
{{--                </div><!-- /.modal-content -->--}}
{{--            </div><!-- /.modal-dialog -->--}}
{{--        </div><!-- /.modal -->--}}
{{--        <div id="ModalEditPasswordForm" class="modal  fade">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <div class="modal-content w-75" style="background: #f2f8f7; color: #808080;">--}}
{{--                   <x-user.edit_password></x-user.edit_password>--}}
{{--                </div><!-- /.modal-content -->--}}
{{--            </div><!-- /.modal-dialog -->--}}
{{--        </div><!-- /.modal -->--}}
{{--        <div id="ModalEditImage" class="modal  fade">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <div class="modal-content w-75" style="background: #f2f8f7; color: #808080;">--}}
{{--                    <x-user.edit_image></x-user.edit_image>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div id="ModalEditCover" class="modal  fade">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <div class="modal-content w-75" style="background: #f2f8f7; color: #808080;">--}}
{{--                   <x-user.edit_cover></x-user.edit_cover>--}}
{{--                </div><!-- /.modal-content -->--}}
{{--            </div><!-- /.modal-dialog -->--}}
{{--        </div><!-- /.modal -->--}}
    </div>
    <script>
        function loadMorePost(page){
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/profile?page="+page,
                type:"GET",
                beforeSend:function (){
                    $('.post-load').show();
                }
            })
                .done(function (response) {

                    let pare = document.getElementById('inserted_post');
                    console.log(response);
                  if(response){
                      pare.insertAdjacentHTML('beforeend' , response);
                  }else{

                      $('#skeleton-content').text('no posts');
                      $('#skeleton-content').removeClass('post_loading');
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
                if(window.location.pathname == '/profile'){
                    page ++;
                    loadMorePost(page);
                }
            }
        });
    </script>
@endsection

