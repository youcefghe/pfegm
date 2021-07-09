<?php

namespace App\Http\Controllers\Vote;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Comment_vote;
use App\Models\Post;
use App\Models\Post_vote;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class VoteController extends Controller
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
 * Add up vote to post.
 *
 * @return Renderable
 */
    public function addUpVote(Request $request){
        $exist=Post_vote::where('user_id',$request->user_id)->where('post_id',$request->post_id)->where('type',1)->get();
        $exist2=Post_vote::where('user_id',$request->user_id)->where('post_id',$request->post_id)->where('type',-1)->get();
        if($exist->isEmpty() || ($exist->count() == 1 && !$exist2->isEmpty()))
        {
            Post_vote::create([
                'user_id'=>$request->user_id,
                'post_id'=>$request->post_id,
                'type'=>1
            ]);
        }
        $votes =Post::where('id',$request->post_id)->withCount(['upvotes','downvotes'])->first();
        $vote =$votes->upvotes_count - $votes->downvotes_count;
        return response()->json(['vote'=>$vote]);
    }
    public function addDownVote(Request $request){
        $exist=Post_vote::where('user_id',$request->user_id)->where('post_id',$request->post_id)->where('type',-1)->get();
        $exist2=Post_vote::where('user_id',$request->user_id)->where('post_id',$request->post_id)->where('type',1)->get();
        if($exist->isEmpty() || ($exist->count() ==1 && !$exist2->isEmpty()))
        {
            Post_vote::create([
                'user_id'=>$request->user_id,
                'post_id'=>$request->post_id,
                'type'=>-1
            ]);
        }
        $votes =Post::where('id',$request->post_id)->withCount(['upvotes','downvotes'])->first();
        $vote =$votes->upvotes_count - $votes->downvotes_count;
        return response()->json(['vote'=>$vote]);
    }
    /**
     * Add up vote to comment.
     *
     * @return Renderable
     */
    public function StoreCommentUpVote(Request $request){
        $go =Comment_vote::where('user_id',$request->userId)->where('comment_id',$request->commentId)->where('type',1)->get();
       if($go->isEmpty())
       {
           Comment_vote::create([
                'user_id'=>$request->userId,
                'comment_id'=>$request->commentId,
                'type'=>1
            ]);
        }
        $votes =Comment::where('id',$request->commentId)->withCount(['upvotes','downvotes'])->first();
        $vote =$votes->upvotes_count - $votes->downvotes_count;

        return response()->json(['commentVote'=>$vote]);
    }
    public function StoreCommentDownVote(Request $request){
       $down=Comment_vote::where('user_id',$request->userId)->where('comment_id',$request->commentId)->where('type',-1)->get();
        if($down->isEmpty())
        {
            Comment_vote::create([
                'user_id'=>$request->userId,
                'comment_id'=>$request->commentId,
                'type'=>-1
            ]);
        }
        $votes =Comment::where('id',$request->commentId)->withCount(['upvotes','downvotes'])->first();
        $vote =$votes->upvotes_count - $votes->downvotes_count;
        return response()->json(['commentVote'=>$vote]);

    }
}
