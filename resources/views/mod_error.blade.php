@extends('layouts.app')
@section('content')
    <div  class="maidiv row justify-content-center" style=" padding-bottom: 48px; padding-top: 32px; background: url('/images/bg.jpg');width: 100%; background-position: center center; background-size: cover;background-repeat: no-repeat;">
    <div class="container mb-5 row justify-content-center">
            <div class="col-md-6 mb-5">
                <h1 class="text-red mt-5" style=" font-size: 100px;"><i class="fa fa-exclamation-triangle text-red" aria-hidden="true"></i> 404</h1>
                <h2 class="mt-3" style="font-size: 35px; ">Oops... You are not a moderator!</h2>

                <p class="mt-3">you are not allowed to enter this route</p>
                <div class="error-actions">
                    <a href="/" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Take Me Home </a><a href="http://www.jquery2dotnet.com" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                </div>
            </div>
    </div>

    <footer class="mt-5" style=" font-size: 14px; ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2021 All Rights Reserved Mooc-Exchange MunCPY
                </div>
            </div>
        </div>
    </footer>
    </div>
@endsection
