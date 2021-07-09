<div id="newMessageReply{{$id}}" class="modal  fade">
    <div class="modal-dialog modal-dialog-centered " style="max-width: 800px;" role="document">
        <div class="modal-content" style="background: #f2f8f7; color: #808080;">
            <div class="modal-body mt-3">
                <div class="row justify-content-center h-100">
                    <div class="justify-content-center">
                        <p class="h4"> Reply message</p>
                        <hr class="mt-n1" style="  border: 3px solid #47b3a8;border-radius: 5px; width: 35%;">
                    </div>
                </div>
                <form role="form" method="POST"  @if($fromId->sender['from'] == "user") action="{{route('Reply Message')}}"@else action="{{route('New Message')}}"@endif class="p-3"  style="background: #fff;">
                    @csrf
                    <div class=" row ">
                        <div class="col-md-6">
                            @if($fromId->sender['from'] == "user")
                            <input type="text" name="reciver" placeholder="{{$fromId->from_id}}" value="{{$fromId->from_id}}" class=" form-control mb-3 @error('reciver') is-invalid @enderror" required autocomplete="name" readonly>
                            <input type="text" name="message_id" placeholder="{{$id}}" value="{{$id}}" class=" form-control mb-3 @error('id') is-invalid @enderror" required autocomplete="name" readonly>
                            @else
                                <input type="text" name="reciver" placeholder="{{$fromId->sender['community']}}" value="{{$fromId->sender['community']}}" class=" form-control mb-3 @error('reciver') is-invalid @enderror" required autocomplete="name" readonly>
                            @endif
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

                        <textarea   name="message"  class="form-control message-reply-editor @error('message') is-invalid @enderror"cols="30" rows="5" required autocomplete="message"> </textarea>
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
        selector: '.message-reply-editor',
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist  pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        // toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name'
    });
</script>
