@extends('layouts.app')

@section('content')
{{--         Header section--}}
  <header class="dash-header">
      <div class="row   justify-content-center">
          <div class="col-md-10  my-auto">
              <div class="row ">
                <div class="col-md-6 pl-5 mt-5 pt-5 ">
                    <p class="h1 mt-2 "> <strong> Don't get confused too much</strong> </p>
                      <p class="h5 text-muted"> You are in the largest gathering of students and instructors of course<br> you will find a solution
                       to your problem
                       </p>

                        <div class="d-flex mt-3">
                            <div class="mr-2">
                                <a class="nav-link btn btn-default shadow-lg form-rounded" href="{{ route('login') }}">{{ __('More Info') }}</a>
                            </div>
                            <div class="ml-1">
                                <a class="nav-link btn btn-outline-default shadow-lg form-rounded" href="{{ route('login') }}">{{ __('Getting start') }}</a>
                            </div>
                        </div>

                </div>
                <div class="col-md-6 pl-5">
                      <img class="header-img" src="{{asset('images/dash/header-section.jpg')}}">
                </div>
              </div>
          </div>
      </div>
  </header>
{{--      About our mooc exchange section --}}
    <section class="dash-header">
       <div class="row pt-5 justify-content-center h-100">
           <div class="row justify-content-center">
               <p class="h1 font-weight-bold"> From developpers to developpers </p>
               <hr class="mt-n1" style="  border-top: 10px solid #47b3a8;border-radius: 5px; width: 14%;">
           </div>
       </div>
        <div class="row justify-content-center">
            <div class="col-md-10  my-auto">
                <div class="row ">
                    <div class="col-md-6 pl-5">
                        <img class="header-img" src="{{asset('images/dash/dev-section.jpg')}}">
                    </div>
                    <div class="col-md-6 pl-5  pt-5 ">
                        <p class="h2 mt-4 mb-2"> <strong> Let's talk little bit </strong> </p>
                        <p class="h5 w-75 text-muted" style="word-wrap: break-word;">
                            Mooc Exchange is an open community for anyone that
                            codes . we will help to get answers to your
                            thoughest coding questions,share knowledge with others.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--      Your Benefits section--}}
    <section class="dash-header">
       <div class="row pt-5 justify-content-center h-100">
          <div class="row justify-content-center">
              <p class="h1 font-weight-bold"> Your benefits </p>
            <hr class="mt-n1" style="  border-top: 10px solid #47b3a8;border-radius: 5px; width: 14%;">
          </div>
       </div>
                <div class="row pb-5">
                    <div id="carouselExampleIndicators" class="carousel slide pb-5" data-ride="carousel">
                        <ol class="carousel-indicators ">

                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row justify-content-center">
                                    <div class="col-md-10  my-auto">
                                        <div class="row ">
                                            <div class="col-md-6 pl-5 ">
                                                <div class="row  justify-content-end mr-5 pr-5">
                                                        <img src="{{asset('images/dash/01.png')}}">
                                                </div>
                                                <img width="50"  class="p-2 " height="50" src="{{asset('images/dash/step01.svg')}}">
                                                <p class="h3 carousel-title mb-2 "> Find the problem , find your way  </p>
                                                <p class="h5 w-75 text-muted " style="word-wrap: break-word;">
                                                    It has to be a problem that's personally
                                                    affecting oraffected you like finding your
                                                    keys, calling a taxi or even remembering
                                                    something. Open your eyes, look around
                                                    you carefully and pay close attention to your
                                                    surroundings.
                                                </p>
                                            </div>
                                            <div class="col-md-6 pl-5">
                                                <img class="header-img" src="{{asset('images/dash/find-problem.jpg')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row justify-content-center">
                                    <div class="col-md-10  my-auto">
                                        <div class="row ">
                                            <div class="col-md-6 pl-5 ">
                                                <div class="row  justify-content-end mr-5 pr-5">
                                                    <img src="{{asset('images/dash/02.png')}}">
                                                </div>
                                                <img width="50"  class="p-2 " height="50" src="{{asset('images/dash/step02.svg')}}">
                                                <p class="h3 carousel-title mb-2 ">Think about the solution </p>
                                                <p class="h5 w-75 text-muted " style="word-wrap: break-word;">
                                                    It's time to look for solutions. What can you do
                                                    to solve these problems? It's time to think out
                                                    of the box, grab your notebook and start
                                                    writing down all the ideas that come to mind.
                                                </p>
                                            </div>
                                            <div class="col-md-6 pl-5">
                                                <img class="header-img" src="{{asset('images/dash/slider-1.jpg')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row justify-content-center">
                                    <div class="col-md-10  my-auto">
                                        <div class="row ">
                                            <div class="col-md-6 pl-5 ">
                                                <div class="row  justify-content-end mr-5 pr-5">
                                                    <img src="{{asset('images/dash/03.png')}}">
                                                </div>
                                                <img width="50"  class="p-2 " height="50" src="{{asset('images/dash/step03.svg')}}">
                                                <p class="h3 carousel-title mb-2 "> Design your proposal </p>
                                                <p class="h5 w-75 text-muted " style="word-wrap: break-word;">
                                                    How can us help solve your problem?
                                                    It's time to think about features and functionality,
                                                    and then start designing or programming or what
                                                    ever. Don't forget to Alwaysask yourself: Would I
                                                    actually use this?
                                                </p>
                                            </div>
                                            <div class="col-md-6 pl-5">
                                                <img class="header-img" src="{{asset('images/dash/slider-2.jpg')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row justify-content-center">
                                    <div class="col-md-10  my-auto">
                                        <div class="row ">
                                            <div class="col-md-6 pl-5 ">
                                                <div class="row  justify-content-end mr-5 pr-5">
                                                    <img src="{{asset('images/dash/03.png')}}">
                                                </div>
                                                <img width="50"  class="p-2 " height="50" src="{{asset('images/dash/step04.svg')}}">
                                                <p class="h3 carousel-title mb-2 "> Share your work  </p>
                                                <p class="h5 w-75 text-muted " style="word-wrap: break-word;">
                                                    Share your work with others so that the benefit
                                                    prevails, and they also share with you their
                                                    deeds and mistakes to benefit from them in the
                                                    least time and with the least effort
                                                </p>
                                            </div>
                                            <div class="col-md-6 pl-5">
                                                <img class="header-img" src="{{asset('images/dash/slider-3.jpg')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next text-default" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
    </section>
{{--      Mooc Uc2 and Exchange goals  --}}
    <section id="services">
        <div class="row   justify-content-center">
            <div class="col-md-10  my-auto pb-5">
                <div class="row justify-content-center mt-5 pt-5 pb-5">
                    <div class="col-md-6 pl-5  ">
                        <div class="pl-2">
                            <i class="fa fa-file-code-o icon-color fa-3x"></i>
                            <p class="mt-3 h3 font-weight-bold">Develop your artistic talent</p>
                            <p class="w-75 h5">
                                We help expand your achievement strategy
                                where you can learn many programming
                                languages and how to design in the least
                                time and from the most qualified trainers.
                            </p>
                            <div class="row justify-content-center w-75 mt-4">
                                <div class="col-md-6">
                                    <a class="ml-2 nav-link btn btn-default  " href="{{ route('login') }}"><span style="font-size: 17px;"> {{ __('Mooc Uc2 Learn') }}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6   ">
                        <div class="pl-5">
                            <i class="fa fa-search icon-color fa-3x"></i>
                            <p class="mt-3 h3 font-weight-bold">There is an answer</p>
                            <p class="w-75 h5">
                                With us you can ask a question only, and
                                the instructors or the developpers can help you and answer
                                your questions, no matter how difficult it is. just keep in mind
                                ask only.
                            </p>
                            <div class="row justify-content-center w-75 mt-4">
                                <div class="col-md-6">
                                    <a class="ml-2 nav-link btn btn-default  " href="{{ route('login') }}"><span style="font-size: 17px;"> {{ __('Mooc Exchange') }}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--         Mooc exchange services section --}}
    <section class="dash-header">
        <div class="pt-5">
            <div class="row justify-content-center h-100">
                <div class="row justify-content-center">
                    <p class="h2 font-weight-bold"> Learn to grow with Mooc Exchange</p>
                    <hr class="mt-n1" style="  border-top: 10px solid #47b3a8;border-radius: 5px; width: 15%;">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="row  justify-content-end ">
                                <a class="img shadow-lg " href="#">
                                    <div class="img__overlay">Just ask</div>
                                    <img src="{{asset('images/dash/ask.jpg')}}"/>
                                </a>
                            </div>
                            <div class="row  justify-content-start ">
                                <a class="img shadow-lg " href="#">
                                    <div class="img__overlay text-center"><p class="w-25">There is answers </p></div>
                                    <img src="{{asset('images/dash/answer.jpg')}}"/>
                                </a>
                            </div>
                            <div class="row  justify-content-end ">
                                <a class="img shadow-lg " href="#">
                                    <div class="img__overlay text-center"><p class="w-25">Give your opinion</p></div>
                                    <img src="{{asset('images/dash/vote.jpg')}}"/>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img class="header-img" src="{{asset('images/dash/grow-section.jpg')}}">
                        </div>
                        <div class="col-md-3">
                            <div class="row  justify-content-start ">
                                <a class="img shadow-lg " href="#">
                                    <div class="img__overlay text-center"><p class="w-25">Accept other answers</p></div>
                                    <img src="{{asset('images/dash/accept.jpg')}}"/>
                                </a>
                            </div>
                            <div class="row  justify-content-end ">
                                <a class="img shadow-lg text-center" href="#">
                                    <div class="img__overlay text-center"><p class="w-25">be one of us </p></div>
                                    <img src="{{asset('images/dash/developper.jpg')}}"/>
                                </a>
                            </div>
                            <div class="row  justify-content-start ">
                                <a class="img shadow-lg " href="#">
                                    <div class="img__overlay text-center"><p class="w-25">Share your work</p></div>
                                    <img src="{{asset('images/dash/community.jpg')}}"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--     Subscribe for newletters section--}}
    <section class="dash-header pt-5 pb-5">
        <div class="row justify-content-center pt-5 mb-2">
            <img src="{{asset('images/logo-mooc-g.png')}}" height="85" width="150">
        </div>
        <div class="row justify-content-center mb-4">
            <p class="h3"> Subscribe for Mooc Exchange newletters</p>
        </div>
        <div class="row justify-content-center mb-2">
            <div class=" modern-form ">
                <div class='float-label-field'>
                    <label for="txtName">Your Email Address</label>
                    <input id="txtName" type='email'>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-2 ">
            <div class="col-md-2">
                <button type="button"  class="btn btn-lg btn-default btn-block shadow-lg form-rounded">
                    {{ __('Subscribe') }}
                </button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="d-flex" style="font-size: 10px; color: #c4c2bd; ">
                by subscribing you accept our
                <div style="color: #80a8c0;padding-right: 2px;padding-left: 2px !important;"> term of use </div>
                and
                <div style="color: #80a8c0;padding-right: 2px;padding-left: 2px !important;">privacy policy</div>
            </div>
        </div>
    </section>
{{--    Footer secion ( contacts accounts ) --}}
    <footer class="footer" id="contacts">
        <div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                    <ul class="list-unstyled list-inline social text-center">
                        <li class="list-inline-item"><a href="#" target="_blank"><i style=" color: #DD4B39" class="fa fa-google"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i style="color: #1877f2;" class="fa fa-facebook" ></i></a></li>
                        <li class="list-inline-item"><a href="#"><i style="color: #1d92d8;"  class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i style="color: #d057b7;"  class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i style="color: #e30404;"  class="fa fa-youtube"></i></a></li>

                    </ul>
                </div>
                <hr>
            </div>
            <div class="row justify-contenet-center">
                <div class="col-xs-12 col-sm-12 col-md-12 ">
                    <ul class="list-unstyled list-inline text-center">
                        <li class="list-inline-item"><a class="footer-font" href="#">About</a></li>
                        <li class="list-inline-item"><a class="footer-font" href="#">Need help ?</a></li>
                        <li class="list-inline-item"><a class="footer-font" href="#">Content guide</a></li>
                        <li class="list-inline-item"><a class="footer-font" href="#">Privacy</a></li>
                        <li class="list-inline-item"><a class="footer-font" href="#">Mooc Uc2</a></li>
                        <li class="list-inline-item"><a class="footer-font" href="#">Term of use</a></li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-center">
                <p class="footer-font">More from our network</p>
            </div>
            <div class="row justify-content-center mt-n5">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                    <ul class="list-unstyled list-inline social text-center">
                        <li class="list-inline-item"><a href="#"><i style="color: #575550;" class="fa fa-tumblr"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i style="color: #575550;" class="fa fa-whatsapp" ></i></a></li>
                        <li class="list-inline-item"><a href="#"><i style="color: #575550;" class="fa fa-linkedin"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i style="color: #575550;" class="fa fa-pinterest-p"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i style="color: #575550;" class="fa fa-medium"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i style="color: #575550;" class="fa fa-telegram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="d-flex" style="font-size: 10px!important; color: #575550; ">
                    <i class="fa fa-copyright" style="margin-right: 2px;"></i>
                    2021 all right reserved Mooc Uc2 by
                    <div style="color: #496375;padding-right: 2px;padding-left: 2px !important;"> CBY MUMONUSKI </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
