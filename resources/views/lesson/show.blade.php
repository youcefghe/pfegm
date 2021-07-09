@extends('layouts.app')


@section('title', $item->title)

@section('main-content')

    @include('breadcrumbs.item-breadcrumb')

    <div
        class="{{ $course->language === 'ar' ? 'rtl' : 'ltr' }}
        my-card container my-lg-3 my-md-3 my-sm-3 my-0 p-0">
        <div class="row m-0">
            @include('course.partials.header')
        </div>

        <div class="row m-0">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 p-4">
                <h2 class="mt-2 mb-4">
                    {{$item->title}}
                </h2>
                @include('course.partials.video', [ 'video_url' => $item->itemable->video_url])
                @include('lesson.partials.content')
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 py-4">
                @include('course.partials.sidebar')
            </div>
        </div>

        <div class="row m-0">
            @include('course.partials.instructor')
        </div>

    </div>
@endsection



@section('js')
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/course.js') }}"></script>
@endsection
