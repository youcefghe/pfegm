<div class="modal-body mt-3">
    <div class="row justify-content-center h-100">
        <div class="row justify-content-center">
            <p class="h4"> Send a message</p>
            <hr class="mt-n1" style="  border: 3px solid #47b3a8;border-radius: 5px; width: 35%;">
        </div>
    </div>
    <form role="form" method="POST" action="{{route('Contact Instructor')}}" class="p-3"  style="background: #fff;">
        @csrf
        <div class=" row justify-content-center">
            <div class="col-md-10">
                <input type="text" name="community" placeholder="Community" class=" form-control @error('name') is-invalid @enderror mb-3" value="{{ $community->name}}">
                @error('community')
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                @enderror
                <input type="text" name="email" placeholder="Email" class=" form-control @error('email') is-invalid @enderror mb-3">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                @enderror
                <input type="text" name="subject" placeholder="Subject" class=" form-control @error('subject') is-invalid @enderror mb-3" >
                @error('subject')
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                @enderror
                <div class="mb-3">
                    <label for="Content"  class=" mb-2">Message :</label>
                    <textarea   name="message"  class="form-control @error('message') is-invalid @enderror"cols="30" rows="5" required autocomplete="description"> </textarea>
                    @error('message')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="text-white btn btn-primary btn-sm">{{'Send'}}</button>
                </div>
            </div>
        </div>

    </form>
</div>
