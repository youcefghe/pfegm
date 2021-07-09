<div class="row row-flex">
    <div class=" col-md-11 pl-5">
        <div class="row">
            <div class="col-md-9">
                <div>
                    {{$reply->content}}
                </div>
                <div class="d-flex mb-2">
                    @if($reply->author->id == auth()->user()->id)
                    <a class="text-info mr-2" data-toggle="modal" data-target="#replyModal{{$reply->id}}"  ><i class="fa fa-pencil-square mr-1"></i>{{ __('Edit') }}</a>
                    <a class="text-danger mr-2" onclick="replyDelete({{$reply->id}})" ><i class="fa fa-trash mr-1"></i>{{ __('Delete') }}</a>
                    @endif
                </div>
            </div>
            <div class="col-md-3 text-center">
                    <img class="mt-1 ml-3 mr-1 shadow" src="{{asset($reply->author->picture)}}" style="height: 30px;width: 30px;border-radius: 50%">
                    <p class="mr-n1" style="font-size: 14px">{{$reply->author->name}}</p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="replyModal{{$reply->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row justify-content-center">
                    <p class="h3 text-secondary ">Edit Reply </p>
                </div>
                <form action="{{route('Update reply',['id'=>$reply->id])}}" method="POST">
                    @csrf
                    <div class="mt-2 pl-4 pt-2 pb-2">
                        <textarea class="form-control @error('reply') is-invalid @enderror" rows="5" cols="10" name="reply" >{{ $reply->content }}</textarea>
                        @error('reply')
                        <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                             </span>
                        @enderror
                        <div class="row justify-content-end">
                            <div class="col-md-3">
                                <button type="submit"  class="nav-link text-white btn btn-primary btn-sm mt-3 mr-3 d-flex" id="comment-button" ><div id="spinner-border" class="spinner-border text-secondary  spinner-border-sm" role="status" style="display: none">
                                        <span class="sr-only">Loading...</span>
                                    </div> <p class="ml-2">{{ __('Edit Reply') }}</p> </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
