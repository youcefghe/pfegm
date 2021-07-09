
<div  class="mt-3">
    <p class=" h3">
        <i class="mdi mdi-view-headline"></i>
        Course plan
    </p>
    <div class="card  rounded-lg  p-0" style="width: 23rem;">

        <div class="card-body"  style="padding-top: 0.25rem;">
            <nav class="nav flex-column">
                @foreach($course->lessons as $lesson)
                    <a class="nav-link pl-0 pr-0 h6 font-weight-bold @if(Route::current()->getName() == 'Lessons' &&  Route::current()->parameters()['id'] == $lesson->id) text-default @else text-secondary  @endif"  href="{{route('Lessons',['id'=>$lesson->id])}}"><i class="fa fa-circle-o" ></i> {{$lesson->header}}</a>
                    <hr>
                @endforeach
                <a class="nav-link pl-0 pr-0 text-secondary"  href="{{route('Lesson',['id'=>$course->id])}}"><i class="fa fa-plus-circle" ></i> {{__(' Add Lesson')}}</a>
            </nav>
        </div>
    </div>
</div>


