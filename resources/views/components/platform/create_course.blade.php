<div class="modal-body mt-3">
    <div class="row justify-content-center h-100">
        <div class=" row justify-content-center ">
            <p class="h4"> Create Course</p>
            <hr class="mt-n1" style="  border: 3px solid #47b3a8;border-radius: 5px; width: 35%;">
        </div>
    </div>
    <form role="form" method="POST" action="{{route('Add Course')}}" class="p-3"  style="background: #fff;">
        @csrf
        <div class=" row justify-content-center">
            <div class="col-md-10">
                <input type="text" name="title" placeholder="course name" class=" form-control mb-3 @error('name') is-invalid @enderror" required autocomplete="name">
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


                <div class="d-flex justify-content-end">
                    <button type="submit" class="text-white btn btn-primary btn-sm">Create</button>
                </div>
            </div>
        </div>

    </form>
</div>
