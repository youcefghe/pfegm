@extends('layouts.app')

@section('content')
    <div class="maidiv " >
        <div class="row justify-content-center h-100 ">

            <div class="col-md-8 my-auto">
                <div class="card shadow-lg mt-3 mb-5" style="border-radius: 20Px;">
                    <div class="row row-flex  ">


                        <div class="col-md-6 lazyImage registerBg pl-3"   >

                        </div>
                    <div class="col-6 card-body p-5">

                        <div class="mt-4 " >
                            <div class="text-center mb-4">
                                <div class="row justify-content-center">
                                    <p class="h3" >Welcome to  <small class="text-default">MOOC Exchange</small> </p>
                                </div>
                                <div >
                                    <h5 class="text-muted pl-1 mb-2"> we make life easy for every one </h5>
                                    <div class="row ml-5 pl-5">
                                        <hr class="mt-n1 mr-2" style="  border-top: 3px solid #47b3a8;border-radius: 5px; width: 14%;">
                                        <hr class="mt-n1 mr-2 text-muted" style="  border-top: 3px solid;border-radius: 5px; width: 14%;">


                                        <div class="flex-sm-grow-1 "></div>
                                    </div>
                                </div>

                            </div>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row  justify-content-center ">

                                    <div class="col-md-8 mb-2">
                                        <div class="material-textfield">
                                            <input id="name" style="height:40px !important; " type="text" class="form-rounded  form-control pl-5 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            <label> Username</label>
                                            <i class="fa fa-user fa-lg position-absolute"></i>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row  justify-content-center ">

                                    <div class="col-md-8 mb-2">
                                        <div class="material-textfield">
                                            <input id="email" style="height:40px !important; " type="email" class="form-rounded  form-control pl-5 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            <label> Email</label>
                                            <i class="fa fa-envelope fa-lg position-absolute"></i>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row  justify-content-center ">

                                    <div class="col-md-8">
                                        <div class="material-textfield">
                                            <input id="password" style="height:40px !important;" type="password"  class="form-rounded  form-control  pl-5 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            <label>Password</label>
                                            <i class="fa fa-lock fa-lg position-absolute"></i>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row  justify-content-center mb-4 ">

                                    <div class="col-md-8">
                                        <div class="material-textfield">
                                            <input id="password_confirmation" style="height:40px !important;" type="password"  class="form-rounded  form-control  pl-5 @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                                            <label>Confirm password</label>
                                            <i class="fa fa-lock fa-lg position-absolute"></i>
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <div class="col-md-10 ">
                                        <div class="row justify-content-center ml-5">
                                            <div class="col-md-6">
                                                <button type="submit"  class="btn btn-default btn-block shadow-lg form-rounded">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{ route('login') }}"  class="btn btn-outline-default btn-block form-rounded shadow-lg">
                                                    {{ __('Login') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row  justify-content-center">
                                <div class="row mt-3 ml-n4 text-muted "> Or Register with  <a class=" pl-1 pr-1 text-default h5"> Google </a>  or  <a class="h5 pl-1  text-default"> Mooc Uc2</a></div>
                            </div>
                        </div>
                    </div>
                    {{--                <div class="card-header">{{ __('Login') }}</div>--}}
                </div>
            </div>
        </div>
    </div>

@endsection
