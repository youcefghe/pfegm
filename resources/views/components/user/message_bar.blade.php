<div class="dashNewPost row " >
    <div class="col-md-10 ml-5 insidePostDash shadow  rounded-lg" style="background: #fff">
        <div class="container pt-2 d-flex justify-content-between align-items-center">
            <img src="{{asset(auth()->user()->picture)}}" class="  userPic mr-2">
            <input type="text" placeholder="Send message" onfocus=" $('#newMessage').modal({show: true});" class="form-rounded newPostInput form-control">
            <i class="fa fa-paper-plane-o fa-2x fa-color-green ml-2"></i>
        </div>
    </div>
</div>
