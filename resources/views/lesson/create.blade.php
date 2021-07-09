@extends('layouts.app')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-6">
            <div class="card shadow-lg" >
                <div class="card-header " style="background-color:  #47b3a8">
                   <p class="h5 pt-2 text-white">Create Lesson</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('Store Lesson',['id'=>$id])}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-5 mt-3 ml-2">

                                <input type="text" name="header" placeholder="lesson name"
                                       class=" form-control ml-n2 mb-4 @error('name') is-invalid @enderror" required autocomplete="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                @enderror
                            </div>
                        </div>
                        <textarea class="form-control mt-3" id="add-lesson" name="lesson" rows="15"></textarea>

                        <div class="row justify-content-end"><button class="nav-link text-white btn btn-default m mt-3 mr-5 d-flex"
                                                                     type="submit">{{ __('Create') }} </button></div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <
    <script>
        tinymce.init({
            selector: '#add-lesson',
            plugins: 'advlist fullpage autolink lists link image imagetools charmap print preview anchor directionality searchreplace visualblocks codesample visualchars code template insertdatetime  table toc paste code help wordcount searchreplace',
            toolbar: ' undo redo | formatselect | bold italic underline | bullist numlist | | advlist list | ltr rtl | ' +
                'formatpainter removeformat |  preview visualblocks code',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',


        });
    </script>
@endsection
