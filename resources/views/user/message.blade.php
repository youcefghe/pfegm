@extends('layouts.app')
@section('content')
    <div style="background: #f2f8f7;">
        <div class="container pt-3"  >
            <div class="row justify-content-center" >
                <div class="col-md-8">
                  <x-user.message_bar></x-user.message_bar>
                  <x-user.message_filter></x-user.message_filter>
                    @foreach($messages as $message)
                  <x-user.messege :message="$message"></x-user.messege>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="row mb-3">
                        <x-community.join_create></x-community.join_create>
                    </div>
                    <div class="row mb-3">
                        <div class="card shadow rounded-lg" style="width: 20rem;min-height: 20px;">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <x-user.visit_mooc></x-user.visit_mooc>
                    </div>
                    <div class="row mb-3">
                        <x-user.footer></x-user.footer>
                    </div>

                </div>
            </div>
        </div>
        <x-user.create_message :communities="$communities"></x-user.create_message>
    </div>
@endsection
