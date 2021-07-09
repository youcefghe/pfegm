@extends('layouts.app')
@section('content')

    <div style="background: #f2f8f7;" class="mt-n3">

        <div class="container "  >
            <x:notify-messages />
            @notifyJs
            <div class="row justify-content-center mt-2 " style="padding-top:60px!important;" >
                <div  class="col-md-8"  >

                    <div class=" row justify-content-center" style="font-size: 1rem;" >
                        <div class="col-md-10  pl-0  d-flex justify-content-between align-items-center rounded-lg" >
                            <div class="row row-flex pl-3">
                                <div class="col-md-4 " >
                                    <div class="row mb-3">
                                        <x-community.categories></x-community.categories>
                                    </div>
                                </div>
                                <div class="col-md-8 pl-5">
                                    <div class="row mb-3">
                                       <x-community.all_my_communities :communities="$communities" ></x-community.all_my_communities>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ml-n5 pl-5" >
                    <div class="row mb-3">
                        <x-community.join_create></x-community.join_create>
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

    </div>

@endsection
