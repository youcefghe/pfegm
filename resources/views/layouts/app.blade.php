<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}"></script>
{{--     <script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>--}}
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
{{--   <link defer href="https://cdn.rawgit.com/djibe/bootstrap-select/v1.13.0-dev/dist/css/bootstrap-select-daemonite.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">

    <!-- <script  src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.12/dist/js/bootstrap-select.min.js"></script>

 CSS Bootstrap 4      <link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.12/dist/css/bootstrap-select.min.css" rel="stylesheet"/>-->

    <script src="{{ asset('js/Style.js') }}" defer></script>

    <script src="{{ asset('js/getData.js') }}" defer></script>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <link href="{{ asset('css/skelletons.css') }}" rel="stylesheet">
    @notifyCss
    <script src="https://cdn.tiny.cloud/1/hl329lrxwbc0uqxduj4g7a61s5pfoq96fgrr9i0hx78dd9pj/tinymce/5/tinymce.min.js"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>--}}
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>  <style>
        *{
            font-family: "Roboto";
        }
        .form-control:focus {
            border-color: #12736d !important;
            box-shadow: none !important;
        }
        /*search box styling put the icon inside the search input*/
        .has-search .form-control {
            padding-left: 2.375rem;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }

    </style>
</head>
<body>
    <div id="app">
{{--        nav bar blade code with bootstrap--}}
        <nav id="user-navbar" class="navbar navbar-expand-md navbar-light {{Auth::user() ? 'bg-white' : 'bg-light'}}  shadow-sm " style="border-top: 3px solid #17756D !important;position: relative;">
            <div class="container ">
                <a class="navbar-brand" href="@if(auth()->user()){{url('/user')}} @else{{ url('/') }}@endif">
                   <img src="{{asset('images/logo-mooc-g.png')}}" height="35" width="80"/>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                    <ul class="navbar-nav mr-auto  text-secondary font-weight-bold ">
                        <li class="nav-item ">
                            <a class="nav-link  " href="#services">Services <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">Team<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">MOOC UC2<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacts">Contact us <span class="sr-only">(current)</span></a>
                        </li>

                    </ul>
                @else
                        <div class="input-group mr-3" style="width: 17%;">
                        <select id="user_mod_inter" onchange="window.location.href=this.options[this.selectedIndex].value;" class="selectpicker form-control custom-select-3 shadow " ng-class="{'no-border': border}" >
                            <option value="" disabled selected>{{Request::route()->getName()}}</option>
                             <option data-icon-base="fa" data-icon="fa fa-plus-square" class=" h-6" value="{{route('New Post')}}" >      New Post</option>
                             </select>
                        </div>



                @endguest
                    <!-- Actual search box -->
                    <form class="input-group w-50" role="form" method="Get" action="{{route('search')}}">
                        <input type="text" class=" form-control typeahead"  placeholder="Search" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link  " href="{{ route('login') }}"><button  class="text-primary btn btn-success  btn-sm">{{ __('Login') }}</button></a>--}}
{{--                                </li>--}}
                                <li class="nav-item">
                                    <a class="nav-link text-primary btn btn-success btn-sm" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}"><button type="button" class="text-white btn btn-primary  btn-sm">{{ __('Register') }}</button></a>--}}
{{--                                </li>--}}
                                    <li class="nav-item pl-2">
                                        <a class="nav-link text-white btn btn-default btn-sm" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                            @endif
                        @else
                            <li class="nav-item ml-2" style="width: 6rem;">
                                <a class="nav-link btn btn-default text-white d-flex" data-toggle="modal" data-target="#ModalCourseForm">AddCourse</a>
                            </li>
                            <li class="nav-item  ml-2">

                                <a class="nav-link btn btn-user d-flex " href="{{route('My Profile')}}" role="button"  style="border-radius: 20px;font-size: 16px;">
                                    <img src="{{asset("images/icons/user-circle-solid.png")}}" class="  userPicNav mr-2">
                                    {{ Auth::user()->name }}
                                </a>
                            </li>

                            <li class="nav-item dropdown ml-3 mt-2" >
                                <a class="dropdown-toggle" id="messages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-envelope fa-lg text-secondary"></i>
                                    <span class="badge badge-danger" id="notBadge1" style="border-raduis:50%;"></span>
                                </a>
                                <ul class="dropdown-menu message-menu notification-dropdown-menu scrollable-menu" aria-labelledby="messages" id="messagesMenu">
                                    <li class="head text-light bg-default" id="message-head">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-12">
                                                <span id="message-span"></span>
                                                <a href="/message/markAll" class="float-right text-light">Mark all as read</a>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="footer bg-default text-center">
                                        <a href="/messages" class="text-light">View All</a>
                                    </li>
                                </ul>
                            </li>
                           <li class="nav-item dropdown ml-3 mt-2" >
                            <a class="dropdown-toggle" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                <i class="fa fa-bell fa-lg text-secondary"></i>
                                <span class="badge badge-danger" id="notBadge" style="border-raduis:50%;"></span>
                            </a>

                            <ul class="dropdown-menu notification-dropdown-menu scrollable-menu" aria-labelledby="notifications" id="notificationsMenu">
                                <li class="head text-light bg-default" id="notification-head">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-12">
                                            <span id="notification-span"></span>
                                            <a onclick="markAllMessages()" class="float-right text-light">Mark all as read</a>
                                        </div>
                                    </div>
                                </li>

{{--                                <li class="footer bg-default text-center">--}}
{{--                                    <a href="" class="text-light">View All</a>--}}
{{--                                </li>--}}
                            </ul>
                            </li>

                            <li class="nav-item  ml-3 mt-1">
                                <a class="nav-link text-white btn btn-default btn-sm" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>

        </nav>
        <div id="ModalCourseForm" class="modal  fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content w-75" style="background: #f2f8f7; color: #808080;">
                    <x-platform.create_course></x-platform.create_course>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <main >
            @yield('content')
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source:  function (query, process) {
                return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            }
        });
    var user = {!! json_encode((object)auth()->user()) !!};
    if(user){
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
        url: "/notifications",
        type:"Get",
        success:function(response){

            let notifications = response.notifications ;
            console.log(notifications);
            document.getElementById('notification-head').insertAdjacentHTML('afterend' , response);
            document.getElementById('notBadge').innerText=$('.dropdown-menu > .notification-box').length;
            document.getElementById('notification-span').innerText='Notifications ('+ $('.dropdown-menu > .notification-box').length+ ')';
            if($('.dropdown-menu > .notification-box').length ==0){
                 $('#notBadge').hide();
                document.getElementById('notification-head').insertAdjacentHTML('afterend' , '<div class="container justify-content-center no-notifications"><p class="text-secondary h5">No notifications</p></div>');
            }
            },
        });
        $.ajax({
            url: "/message",
            type:"Get",
            success:function(response){

                document.getElementById('message-head').insertAdjacentHTML('afterend' , response);
                document.getElementById('notBadge1').innerText=$('#messagesMenu > .notification-box').length;
                document.getElementById('message-span').innerText='Messages ('+ $('#messagesMenu > .notification-box').length+ ')';
                if($('#messagesMenu > .notification-box').length == 0){
                  $('#notBadge1').hide();
                    document.getElementById('message-head').insertAdjacentHTML('afterend' , '<div class="container justify-content-center no-messages"><p class="text-secondary h5">No Messages</p></div>');
                }
                },
        });
        // Echo.private('App.Models.User.'+user.id)
    .notification((notification) => {
        $.ajax({
            url: "/notification/"+notification.id,
            type:"Get",
            success:function(response){
                document.getElementById('notification-head').insertAdjacentHTML('afterend' , response);
                document.getElementById('notBadge').innerText=parseInt(document.getElementById('notBadge').innerText,10) +1;
                document.getElementById('notification-span').innerText='Notifications ('+ $('.dropdown-menu > .notification-box').length+ ')';
                $('#notBadge').show();
                $('.no-notifications').remove();
            },
        });
        $.ajax({
            url: "/notification/toast/"+notification.id,
            type:"Get",
            success:function(response){
                document.getElementById('user-navbar').insertAdjacentHTML('beforeend' , response);
                $('.toast').toast({ autohide: false });
                $('.toast').toast('show');
                console.log(response);
            },
        });
    });
       // Echo.private('Message.'+user.id) .listen('newMessageEvent', (e) => {
       //     $.ajax({
       //             url: "/messageNotification",
       //             type:"Get",
       //             data:{
       //                 messageId:e.message.id,
       //                 _token: _token
       //             },
       //             success:function(response){
       //                 document.getElementById('message-head').insertAdjacentHTML('afterend' , response);
       //                 document.getElementById('notBadge1').innerText=$('#messagesMenu > .notification-box').length;
       //                 document.getElementById('message-span').innerText='Messages ('+ $('#messagesMenu > .notification-box').length+ ')';
       //                 $('#notBadge1').show();
       //                 $('.no-messages').remove();
       //             },
       //     });
       //     $.ajax({
       //         url: "/message/toast/"+notification.id,
       //         type:"Get",
       //         success:function(response){
       //             document.getElementById('user-navbar').insertAdjacentHTML('beforeend' , response);
       //             $('.toast').toast({ autohide: false });
       //             $('.toast').toast('show');
       //             console.log(response);
       //         },
       //     });
       // });

        // Echo.private('Message.'+user.id)
        //     .notification((notification) => {
        //         $.ajax({
        //             url: "/messageNotification",
        //             type:"Get",
        //             data:{
        //                 messageId:notification.id,
        //                 _token: _token
        //             },
        //             success:function(response){
        //                 document.getElementById('message-head').insertAdjacentHTML('afterend' , response);
        //                 document.getElementById('notBadge1').innerText=parseInt(document.getElementById('notBadge1').innerText,10) +1;
        //                 document.getElementById('message-span').innerText='Messages ('+ $('.dropdown-menu > .notification-box').length+ ')';
        //                 $('#notBadge').show();
        //                 $('.no-messages').remove();
        //             },
        //         });
        //     });
    }
    </script>

</body>
</html>
