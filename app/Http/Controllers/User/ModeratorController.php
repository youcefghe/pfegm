<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;

class ModeratorController extends Controller
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
    public function index(Request $request,$id){
        $community= Community::where('id',$id)->first();
        $posts =Post::where('community_id',$id)->with(['medias','createdBy','community','comments.replies'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->paginate(3);

        return  view('post.moderator',['community'=>$community ,'posts'=>$posts]);
    }
    public function reportedPost(Request $request,$id){
        $community= Community::where('id',$id)->first();
        $posts =Post::whereIn('id',$community->getReportedPost())->with(['comments.replies','community','reported_posts'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->paginate(2);
        return  view('post.reported',['community'=>$community ,'posts'=>$posts]);
    }
    public function archive(Request $request,$id){
        $community= Community::where('id',$id)->first();
        $posts =Post::where('community_id',$id)->onlyTrashed()->with(['medias','createdBy','community','comments.replies'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->paginate(3);

        return  view('post.archive',['community'=>$community ,'posts'=>$posts]);
    }
    public function loadMorePost(Request $request,$id){
        $posts =Post::where('community_id',$id)->with(['medias','createdBy','community','comments.replies'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->paginate(3);
       //if($request->ajax()){
            return view('components.moderator.posts',['posts'=>$posts])->render();
       // }
    }
    public function loadMoreReportedPosts(Request $request,$id){
        $community= Community::where('id',$id)->first();
        $posts =Post::whereIn('id',$community->getReportedPost())->with(['comments.replies','community','reported_posts'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->paginate(2);
        //if($request->ajax()){
        return view('components.moderator.posts',['posts'=>$posts])->render();
        // }
    }
    public function moderatorCommunity(Request $request){

        return view('components.tags.option',['communities'=>auth()->user()->moderator_communities])->render();
    }
    public function members($id){
        $community= Community::where('id',$id)->first();
        return  view('community.members',['community'=>$community]);
    }
    public function requests($id){
        $community= Community::where('id',$id)->first();
        return  view('community.request',['community'=>$community]);
    }
}
