@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row justify-content-center">
                            <div class="col-md-8 mb-2">
                                <div class="material-textfield">
                                    <input id="email" style="height:40px !important; " type="email" class="form-rounded  form-control pl-5 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label> Email</label>
                                    <i class="fa fa-user fa-lg position-absolute mt-n4"></i>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-8 mb-2">
                                <div class="material-textfield">
                                    <input id="password" type="password" style="height:40px !important; "  class="form-rounded  form-control pl-5 @error('password') is-invalid @enderror"  name="password" required autocomplete="new-password">
                                    <label> New Password</label>
                                    <i class="fa fa-lock fa-lg position-absolute mt-n4"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-8 mb-2">
                                <div class="material-textfield">
                                    <input id="password-confirm" type="password" style="height:40px !important; "  class="form-rounded  form-control pl-5 "  name="password_confirmation" required autocomplete="new-password">
                                    <label> Confirm Password</label>
                                    <i class="fa fa-lock fa-lg position-absolute mt-n4"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
