<div class="modal-body mt-3">
    <div class="row justify-content-center h-100">
        <div>
            <p class="h4"> Create Community</p>
            <hr class="mt-n1" style="  border: 3px solid #47b3a8;border-radius: 5px; width: 35%;">
        </div>
    </div>
    <form role="form" method="POST" action="{{route('community')}}" class="p-3"  style="background: #fff;">
        @csrf
        <div class=" row justify-content-center">
            <div class="col-md-10">
                <input type="text" name="name" placeholder="Community name" class=" form-control mb-3 @error('name') is-invalid @enderror" required autocomplete="name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                @enderror
                <div class="mb-3">
                    <label for="information"  class=" mb-2">Description :</label>
                    <textarea   name="description"  class="form-control @error('description') is-invalid @enderror"cols="30" rows="5" required autocomplete="description"> </textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="rules"  class=" mb-2">Rules:</label>
                    <textarea   name="rules"  class="form-control @error('rules') is-invalid @enderror"cols="30" rows="5" required autocomplete="rules"> </textarea>
                    @error('rules')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                    @enderror
                </div>
                <div>
                    <div class="d-flex">
                        <div class=" ">
                            <div class="form-check d-flex">
                                <input class="form-check-input  @error('type') is-invalid @enderror" type="radio" name="type" id="public" value="public" required >
                                <label class="form-check-label p-0  mb-0 ml-0 mr-0 "  style ="position: inherit;margin-top: 11px;" for="public">
                                    <i class="fa fa-users" aria-hidden="true"></i> public
                                </label>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input " type="radio" name="type" id="private" value="private" required >
                            <label class="form-check-label p-0  mb-0 ml-0 mr-0 "  style ="position: inherit;margin-top: 11px;" for="private">
                                <i class="fa fa-lock" aria-hidden="true"></i> private
                            </label>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="text-white btn btn-primary btn-sm">Create</button>
                </div>
            </div>
        </div>

    </form>
</div>
