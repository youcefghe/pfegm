<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Post;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPHtmlParser\Dom;
use PhpParser\Node\Scalar\String_;
use stringEncode\Exception;
use function RingCentral\Psr7\str;

class SkeletonController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('lesson/index');
    }
    public function lesson($id){
        return view('lesson/create',['id'=>$id]);
    }
    public function getCommunityLesson($community){
        $lesson =Community::where('id',$community)->first();
        return $lesson->lesson_id;
    }
    public function getLesson($id){
        $lesson = Lesson::where('id',$id)->with(['course.instructor'])->first();

        return view('lesson.lesson',['lesson'=>$lesson]);
    }
    public function getPosts( $id){
        $community = Community::where('lesson_id',$id)->first();
        $posts = Post::where('community_id',$community->id)->get()->groupBy('element_id');
        return response()->json(['posts'=>$posts]);
    }
    public function storeLesson(Request $request,$id){

        $dom = new Dom;
        $dom->loadStr($request->lesson);

        try {
            $ip=0;
            $it=0;
            $ifi=0;
            $idi=0;
            $ia=0;
             $iul = 0 ;
            $html=$request->lesson;
            $doc = new DOMDocument;
            $doc->loadHTML($html);
          while($ip<$doc->getElementsByTagName('p')->length){
              $dom->find('p')[$ip]->setAttribute('id', 'p'.$ip);

              $ip++;

          }
            while($it<$doc->getElementsByTagName('table')->length){
                 $dom->find('table')[$it]->setAttribute('id', 'table'.$it);
                $it++;

            }
            while($ifi<$doc->getElementsByTagName('figure')->length){
                 $dom->find('figure')[$ifi]->setAttribute('id', 'figure'.$ifi);
                $ifi++;

            }
            while($idi<$doc->getElementsByTagName('div')->length){
                $dom->find('div')[$idi]->setAttribute('id', 'div'.$idi);
                $idi++;

            }
            while($iul<$doc->getElementsByTagName('ul')->length){
                $dom->find('ul')[$iul]->setAttribute('id', 'ul'.$iul);
                $iul++;

            }

            while($ia<$doc->getElementsByTagName('a')->length){
                 $dom->find('a')[$ia]->setAttribute('id', 'a'.$ia);
                $ia++;

            }

                $lesson = Lesson::create(
                    ['course_id'=>$id,
                        'content'=>$dom,
                        'header'=>$request->header]
                );
             $community=Community::create(
                 [
                     'name'=>$request->header,
                     'type'=>'public',
                     'cover'=>config('app.url').'/images/community/community.jpg',
                     'picture'=>config('app.url').'/images/community/picture.jpg',
                     'description'=>'this is a community related to '.$request->header .'lesson ',
                     'rules'=>'1. the posts must be related to lesson context',
                     'lesson_id'=>$lesson->id
                 ]
             );
            $request->user()->user_communities()->create(
                [
                    'community_id'=>$community->id,
                    'role'=>'creator'
                ]
            );

            $newFolder = Storage::makeDirectory('public/Upload/'.$community->name);

        }catch (Exception $e){

        };


        //        $ps = $dom->find('p');
//        $i=0;
//        foreach($ps as $p){
//            $p->setAttribute('id', $i);
//            $i++;
//        }

        return view('lesson.index',['course'=>Course::where('id',$id)->with(['instructor','lessons'])->first()]);
    }
}
