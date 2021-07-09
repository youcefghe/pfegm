@extends('layouts.app')

@section('content')
<div class="maidiv " style=" padding-bottom: 48px; padding-top: 32px; background: url('/images/auth/background.jpg');width: 100%; background-position: center center; background-size: cover;background-repeat: no-repeat;">
    <div class="row justify-content-center h-100 ">

        <div class="col-md-8 my-auto">
            <div class="card shadow-lg mt-3" style="border-radius: 20Px;">
              <div class="row row-flex  ">
                  <div class="col-md-6 lazyImage loginBg pl-3"   >

                  </div>
                  <div class="col-md-6 card-body p-5">

                      <div class="mt-5 mb-5 " >
                          <div class="text-center mb-5">
                              <div class="row justify-content-center">
                                  <p class="h3" >Welcome back to  <small class="text-default">MOOC Exchange</small> </p>
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

                          <form method="POST" action="{{ route('login') }}">
                              @csrf

                              <div class="form-group row  justify-content-center ">

                                  <div class="col-md-8 mb-2">
                                      <div class="material-textfield">
                                          <input id="email" style="height:40px !important; " type="email" class="form-rounded  form-control pl-5 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                          <label> Email</label>
                                          <i class="fa fa-user fa-lg position-absolute"></i>
                                          @error('email')
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

                                  <div class="">
                                      <div class="d-flex" style="margin-left:11%;">

                                          <div class="form-group pl-4">
                                              <div class="form-check mt-1">
                                                  <input class="form-check-input "  type="checkbox" value="" id="remember"  {{ old('remember') ? 'checked' : '' }}>
                                                  <label class="form-check-label pl-2 pt-4" style="background: none;" for="remember">
                                                      {{ __('Remember') }}
                                                  </label>
                                              </div>
                                          </div>


                                          <div class="form-group ml-3 pl-4" style="margin-left: 20px;">
                                              @if (Route::has('password.request'))
                                                  <a class="btn btn-link ml-5" style="color: #47b3a8;" href="{{ route('password.request') }}">
                                                      {{ __('Forgot Password?') }}
                                                  </a>
                                              @endif
                                          </div>

                                  </div>

                              </div>


                              <div class="form-group  ">
                                  <div class="col-md-10 ">
                                    <div class="row justify-content-center ml-5">
                                        <div class="col-md-6">
                                            <button type="submit"  class="btn btn-default btn-block shadow-lg form-rounded">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('register') }}"  class="btn btn-outline-default btn-block form-rounded shadow-lg">
                                                {{ __('Register') }}
                                            </a>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                          </form>
                          <div class="row  justify-content-center">
                              <div class="row mt-3 ml-n4 text-muted "> Or Login with  <a class=" pl-1 pr-1 text-default h5"> Google </a>  or  <a class="h5 pl-1  text-default"> Mooc Uc2</a></div>
                          </div>
                      </div>
              </div>
{{--                <div class="card-header">{{ __('Login') }}</div>--}}
            </div>
        </div>
    </div>
</div>
@endsection
