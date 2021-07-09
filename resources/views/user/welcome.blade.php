@extends('layouts.app')
@section('content')
    <div style="background: #f2f8f7;">
        <div class="container pt-3"  >
            <div class="row" >
                <div  class="col-md-8"  >
                    <div class="dashNewPost row " >
                        <div class="col-md-10 insidePostDash shadow  rounded-lg" style="background: #fff">
                            <div class="container pt-2 d-flex justify-content-between align-items-center">
                                <img src="{{asset("images/icons/user-circle-solid.svg")}}" class="  userPic mr-2">
                                <input type="text" placeholder="Ask question" onfocus="goToNewPost()" class="form-rounded newPostInput form-control">
                                <i class="fa fa-file-image-o fa-2x fa-color-green ml-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 row " style="font-size: 15px;" >
                        <div class="col-md-10 shadow d-flex justify-content-between rounded-lg" style="background: #fff;height: 45px;">
                          <nav class="navbar navbar-expand-md ">
                              <ul class="navbar-nav">
                                  <li class="nav-item ">
                                      <a class="nav-link btn btn-filter btn-sm " href="#" style="border-radius: 50%;font-size: 16px;"><i class="fa fa-info-circle mr-1"></i>{{ __('Interesting') }}</a>
                                  </li>
                                  <li class="nav-item ">
                                      <a class="nav-link btn btn-filter btn-sm ml-1" href="#" style="border-radius: 50%;font-size: 16px;"><i class="fa fa-rocket mr-1"></i>{{ __('Best') }}</a>
                                  </li>
                                  <li class="nav-item ">
                                      <a class="nav-link btn btn-filter btn-sm ml-1" href="#" style="border-radius: 50%;font-size: 16px;"><i class="fa fa-fire mr-1"></i>{{ __('Hot') }}</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link btn btn-filter btn-sm ml-1" href="#" style="border-radius: 50%;font-size: 16px;"><i class="fa fa-line-chart mr-1"></i>{{ __('Top') }}</a>
                                  </li>
                              </ul>
                          </nav>
                        </div>
                    </div>
                    <div class="mt-3 row " >
                        <div class="col-md-10  Post shadow pl-0 d-flex justify-content-between align-items-center rounded-lg" style="background: #fff">
                           <div class="row row-flex pl-3">
                               <div class=" col-md-1 pl-0 pr-0"  style="border-left: 5px solid #17756D !important; border-top-left-radius: 5px;border-bottom-left-radius:5px;background: #e0eceb; color: #707070;background-size: cover;">
                                   <div class="text-center ">
                                       <i   class="fa fa-caret-up fa-2x  mb-n3"  style="color: #707070"></i>
                                       <p class="mt-n2" style="margin-bottom:0px!important;padding-bottom: 0px!important;">7</p>
                                       <i   class="fa fa-caret-down fa-2x mt-n3"  style="color: #707070"></i>
                                   </div>

                               </div>
                               <div class=" col-md-11 pt-3">
                                   <div class="container">
                                       <div class="d-flex align-items-center" >
                                           <img class="mt-n3 mr-1 shadow" src="{{asset('images/user/dash/gdg.png')}}" style="height: 40px;width: 40px;border-radius: 50%">
                                           <p class="mr-1">GDG Constantine</p>
                                           <p  style="font-size: 13px; color: #c4c2bd;">posted by The winchester 4 hours ago</p>
                                       </div>
                                       <div>
                                           <p class="h5">First internship</p>
                                           <p style="color: #707070;">Is it possible to land your first internship in software engineering as a first year undergraduate
                                               in computer science ? I am going to start applying for internships to see if I can find one over
                                               summer 2021, however, I need advice for what companies will look out for. I go to a decent
                                               Canadian university that has a co-op option in second year but I have jackshit on my resume
                                               right now other than 1 hackathon and a couple projects on GitHub. I want some kind of
                                               experience related to CS by summer 2021 before second year at uni so I can secure a co-op
                                               <span style=" color: #c4c2bd;">position much easily. Any advice will be appreciated.</span></p>
                                           <p>Show more</p>
                                       </div>
                                       <div class="d-flex">
                                           <button class=" text-primary btn btn-success  btn-sm ml-2">
                                               Javascript
                                           </button>
                                           <button class=" text-primary btn btn-success  btn-sm ml-2">
                                               Jquery
                                           </button>
                                           <button class=" text-primary btn btn-success  btn-sm ml-2">
                                               VueJS
                                           </button>
                                           <button class=" text-primary btn btn-success  btn-sm ml-2">
                                               FrontEnd
                                           </button>
                                       </div>
                                       <div class="d-flex mt-3 mb-2">
                                           <a class="text-secondary mr-2" href="#" ><i class="fa fa-commenting mr-1"></i>{{ __('1 Answers') }}</a>
                                           <a class="text-secondary mr-2" href="#" ><i class="fa fa-bookmark mr-1"></i>{{ __('Save') }}</a>
                                           <a class="text-secondary mr-2" href="#" ><i class="fa fa-share mr-1"></i>{{ __('Share') }}</a>
                                           <a class="text-secondary mr-2" href="#" ><i class="fa fa-exclamation-triangle mr-1"></i>{{ __('Report') }}</a>
                                       </div>
                                   </div>
                               </div>
                           </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="row mb-3">
                        <div class="card shadow rounded-lg" style="width: 20rem;">
                            <div class="card-header userDashCom text-center" >
                                 <p class="h5" style="color: white;">Top Communities</p>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    @for ($i = 0; $i < 5; $i++)
                                        <div class="row mb-1" style="border-bottom: 1px solid #bdbdbd" >
                                            <div class="d-flex justify-content-center" >
                                                <p >1.</p>
                                                <i  class="fa fa-caret-up fa-lg ml-1 mt-1"  style="color: #46d160"></i>
                                                <img class="mt-n1 ml-1 mb-2" src="{{asset('images/user/dash/gdg.png')}}" style="height: 40px;width: 40px;border-radius: 50%">
                                                <p class="ml-1"> GDG Constantine</p>
                                            </div>
                                        </div>
                                    @endfor
                                    <a class="nav-link h6 text-white btn btn-primary btn-sm">{{ __('View all') }}</a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="card shadow rounded-lg" style="width: 20rem;">
                            <div class="card-header communitySection text-center" >
                            </div>
                            <div class="card-body">
                                <p class="h5"> Community</p>
                                <p>Through the community,you can share all your thoughts with
                                people who share similar intellectual tendencies </p>
                                <a class="nav-link text-white btn btn-default btn-sm mb-2" data-toggle="modal" data-target="#ModalLoginForm">{{ __('CREATE COMMUNITY') }}</a>
                                <a class="nav-link btn btn-outline-default  btn-sm">{{ __('JOIN COMMUNITY') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="card shadow rounded-lg" style="width: 20rem;min-height: 20px;">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="card shadow rounded-lg" style="width: 20rem;min-height: 20px;">
                            <div class="card-body text-center">
                                <img src="{{asset("images/logo-mooc-g.png")}}" style="height: 40px;width: 80px;" alt="Mooc Exchange">
                                <p>the largest educational platform for computer science,programming and information staff </p>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-6">
                                        <a class="nav-link text-white btn btn-primary btn-sm mb-2">{{ __('VIST Now') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                            <div class="card shadow rounded-lg" style="width: 20rem;min-height: 20px;">
                                <div class="card-body" style="color: #808080;">
                                    <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>About</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Blog</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>UC2</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Help</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Term </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Team</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Contacts</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Facebook</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Twitter</p>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <p>Mooc Exchange <i class="fa fa-copyright mr-1"></i> <span style="font-size: 11px;">2021 all right reserved</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div id="ModalLoginForm" class="modal  fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content w-75" style="background: #f2f8f7; color: #808080;">
                    <div class="modal-body mt-3">
                        <div class="row justify-content-center h-100">
                            <div>
                                <p class="h4"> Create Community</p>
                                <hr class="mt-n1" style="  border: 3px solid #47b3a8;border-radius: 5px; width: 35%;">
                            </div>
                        </div>
                            <form role="form" method="POST" action="" class="p-3"  style="background: #fff;">
                              <div class=" row justify-content-center">
                                  <div class="col-md-10">
                                      <input type="text" name="name" placeholder="Community name" class=" form-control mb-3">
                                      <select class="form-control custom-select-2 shadow mb-5" ng-class="{'no-border': border}" >
                                          <option value="" disabled selected>Choose Topic</option>
                                          <option>one</option>
                                      </select>
                                      <div class="mb-3">
                                          <label for="information"  class=" mb-2">Description :</label>
                                          <textarea id="#information"  name="Information"  class="form-control "cols="30" rows="5" > </textarea>
                                      </div>
                                      <div id="dynamicAddRemove" class="mb-3">
                                          <div  class="d-flex align-items-center mb-2 removed-rule">
                                              <input type="text" name="rule[]" placeholder="Rules" class="  form-control mb-1">
                                              <a class="ml-2 add-btn" href="javascript:void(0);"><i class="fa fa-plus-circle fa-lg" style="color: #2C8E42"></i></a>
                                          </div>
                                      </div>
                                      <div>
                                          <div class="d-flex">
                                              <div class=" ">
                                                  <div class="form-check d-flex">
                                                      <input class="form-check-input  " type="radio" name="private" id="public" value="public">
                                                      <label class="form-check-label p-0  mb-0 ml-0 mr-0 "  style ="position: inherit;margin-top: 11px;" for="public">
                                                          <i class="fa fa-users" aria-hidden="true"></i> public
                                                      </label>
                                                  </div>
                                              </div>
                                              <div class="form-check ">
                                                  <input class="form-check-input " type="radio" name="private" id="private" value="private">
                                                  <label class="form-check-label p-0  mb-0 ml-0 mr-0 "  style ="position: inherit;margin-top: 11px;" for="private">
                                                      <i class="fa fa-lock" aria-hidden="true"></i> private
                                                  </label>
                                              </div>
                                          </div>

                                      </div>
                                      <div class="d-flex justify-content-end">
                                          <button type="submit" class="text-white btn btn-primary btn-sm">Create</button>
                                      </div>
                                  </div>
                              </div>

                            </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

@endsection
