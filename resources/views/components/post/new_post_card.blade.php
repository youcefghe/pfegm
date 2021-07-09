<div class="dashNewPost row " >
    <div class="col-md-10 ml-5 insidePostDash shadow  rounded-lg" style="background: #fff">
        <div class="container pt-2 d-flex justify-content-between align-items-center">
            <img src="{{asset(auth()->user()->picture)}}" class="  userPic mr-2">
            <input type="text" placeholder="Ask question" onfocus=" @if(Request::route()->getName() == "related posts") goToNewLessonPost() @else goToNewPost()  @endif" class="form-rounded newPostInput form-control">
            <i class="fa fa-file-image-o fa-2x fa-color-green ml-2"></i>
        </div>
    </div>
</div>
