<div id="newMessage" class="modal  fade">
    <div class="modal-dialog modal-dialog-centered " style="max-width: 800px;" role="document">
        <div class="modal-content" style="background: #f2f8f7; color: #808080;">
          <div class="modal-body mt-3">
    <div class="row justify-content-center h-100">
        <div class="justify-content-center">
            <p class="h4"> New message</p>
            <hr class="mt-n1" style="  border: 3px solid #47b3a8;border-radius: 5px; width: 35%;">
        </div>
    </div>
    <form role="form" method="POST" action="{{route('New Message')}}" class="p-3"  style="background: #fff;">
        @csrf
        <div class=" row ">
            <div class="col-md-6">
                <select data-live-search="true" name="reciver" data-icon-base="fa" data-tick-icon="fa-check" class="selectpicker form-control custom-select-2 shadow mb-5 @error('reciver') is-invalid @enderror" title="To" ng-class="{'no-border': border}" required autocomplete="topic" >
                    @foreach($communities as $community)
                    <option value="{{$community->id}}">{{$community->name}}</option>
                    @endforeach
                </select>
                @error('reciver')
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                @enderror
            </div>
        </div>
        <div class=" row ">
            <div class="col-md-6">
                <input type="text" name="subject" placeholder="Subject" class=" form-control mb-3 @error('name') is-invalid @enderror" required autocomplete="name">
                @error('subject')
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                @enderror
            </div>
        </div>
                <div class="mb-3">

                    <textarea   name="message"  class="form-control message-editor @error('message') is-invalid @enderror"cols="30" rows="5" required autocomplete="message"> </textarea>
                    @error('message')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                          </span>
                    @enderror
                </div>


                <div class="d-flex justify-content-end">
                    <button type="submit" class="text-white btn btn-primary btn-sm">Send</button>
                </div>
    </form>
</div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    tinymce.init({
        selector: '.message-editor',
        plugins: 'a11ychecker link format autolink lists copy  paste table  ',
        // toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name'
    });
</script>
