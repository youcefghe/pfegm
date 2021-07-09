<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;

use App\Models\Instructor;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index($id){

            return view('lesson.index',['course'=>Course::where('id',$id)->with(['instructor','lessons'])->first()]);

    }
    public function store(Request $request){


        $course = Course::create([
            'user_id'=>auth()->user()->id,
            'description'=>$request->description,
            'title_en'=>$request->title
        ]);
        $instructorexist=Instructor::where('user_id',auth()->user()->id)->exists();
        if(!$instructorexist){
         Instructor::create(
        [
            'user_id'=>auth()->user()->id,
        ]
        );}
        return view('lesson.index',[
            'course'=>$course
        ]);
    }
    public function inedxAll(){

    }
}
