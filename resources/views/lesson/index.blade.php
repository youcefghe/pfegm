@extends('layouts.mooc')
@section('content')
    <div class="conatainer  mt-5 mr-5 shadow-lg  mb-5" style="width: 85%;margin-left: 5%">
        <div class="bg-filter">
            <x-platform.header :course="$course" ></x-platform.header>
        </div>
        <div class="row pt-3 bg-white ml-0 mr-0">
            <div class="col-md-8">
                <p class="h3">{{$course->title_en}}</p>
                <img src="{{asset('images/test_course.jpg')}}" alt="test">
                <p class="ml-2 mt-4 h5">{{$course->description}}</p>
            </div>
            <div class="col-md-3 pt-3">
                <x-platform.sidebar :course="$course"></x-platform.sidebar>
            </div>
        </div>
        <div class="bg-filter">
            <x-platform.footer :user="$course->instructor"></x-platform.footer>
        </div>
    </div>

@endsection
@push('styles')
    <link href="{{ asset('css/course.css') }}" rel="stylesheet">
@endpush
