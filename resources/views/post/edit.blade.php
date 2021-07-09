@extends('layouts.app')
@section('content')
    <div style="background: #f2f8f7; color: #626262;">
        <div class="container "  >
            <div class="row pt-5" >
                <div  class="col-md-8"  >
                    <form role="form" method="POST" enctype="multipart/form-data"  action="{{route('Update post',['id'=>$post->id])}}" >
                        @csrf
                        <div class="row">
                            <div class="col-md-10 rounded-lg ml-3 shadow" style="background: white">
                                <div class="container pt-5 mb-3">
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <label >Community name :</label>
                                            <input type="text" name="community" placeholder="{{$post->community->name}}" value="{{$post->community->name}}" class=" form-control mt-3  mb-3 @error('community') is-invalid @enderror" required autocomplete="name" readonly>
                                            @error('community')
                                            <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label >Title :</label>
                                            <input type="text" id="title" placeholder="Title" class="mt-3 mb-3 form-control @error('title') is-invalid @enderror" name="title" value="{{$post->title}}">
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <select data-max-options="2"  data-live-search="true" title="Choose tags " data-icon-base="fa" data-tick-icon="fa-check" class="form-control  shadow selectpicker" multiple="multiple"   ng-class="{'no-border': border}" style="width: 100%;"  >
                                                <option value="one">One</option>
                                                <option value="two">Two</option>
                                                <option value="three">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p>you can't edit files information you can only add it</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 ">
                                            <input id="files"  type="file" name="files[]"  accept="image/*" title="select image or video to upload" style="padding: 0.2rem;" class="mt-3 mb-3 form-control @error('files') is-invalid @enderror""  multiple>
                                            @error('file')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div id="gallery" class="mb-2 gal"></div>
                                        </div>
                                    </div>

                                    <textarea class="form-control @error('post') is-invalid @enderror" id="summary-ckeditor" name="post">{{$post->content}}</textarea>
                                    @error('post')
                                    <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                             </span>
                                    @enderror
                                    <div class="row justify-content-end">
                                        <div class="col-md-2">
                                            <button type="submit" class="nav-link text-white btn btn-primary btn-sm mt-3 mr-3">{{ __('Edit') }}</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="row mb-3">
                        <x-post.rules></x-post.rules>
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

    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
@endsection
