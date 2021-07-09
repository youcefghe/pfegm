<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditCommentRequest;
use App\Models\Comment;
use App\Models\Community;
use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use App\Models\User_community;
use App\Notifications\JoinedUser;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use function React\Promise\Stream\first;

class CommentController extends Controller
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
     * Store comment to post.
     *
     * @return Renderable
     */
    public function Store(Request $request){
       $newcomment = Comment::create([
            'post_id'=>$request->post_id,
            'user_id'=>auth()->user()->id,
            'content'=>$request->post_content,
            'accepted'=>false
        ]);
       $comment = Comment::where('id',$newcomment->id)->with(['user','upvotes','downvotes','replies'])->first();

        $user = Post::where('id',$request->post_id)->with(['createdBy'])->first();
        $data = auth()->user()->name." add comment on post ".$user->title ;
        $url= '/question/'.$request->post_id;
         $reciver =User::find($user->createdBy->id);
//        $reciver->notify(new JoinedUser($data,$url,auth()->user()->picture));
        //return  response()->json(['user'=>$user]);
        return view('components.post.comment_section',['comment'=>$comment,'post'=>Post::where('id',$comment->post_id)->with('createdBy')->first()])->render();
    }
    public function update(EditCommentRequest $request,$id){
       $comment = Comment::find($id);
       $comment->content = $request->comment;
       $comment->save();
       $post=Post::where('id',$comment->post_id)->with(['community','comments.user' ,'comments.replies.author','comments.downvotes','comments.upvotes'])->withCount(['upvotes','downvotes'])->first();
        $members = User_community::where('community_id',$post->community->id)->where('role','!=','request')->get()->count();
        $community=Community::where('id',$post->community->id)->first();
        $created_At =Carbon::parse($post->community->created_at);
        $community['created_at'] = $created_At->format('d M Y');
        $user = User_community::where('community_id',$post->community->id)->where('role','creator')->first();
        $creator =User::where('id',$user->user_id)->first();
        $joined =User_community::where('user_id',auth()->user()->id)->exists();
        $com=$post->community->id;
        $moderators = User_community::where('community_id',$com)->where('role','moderator')->orwhere( function ($query) use ($com) {
            $query->where('community_id',$com)->where('role','creator');
        })->join('users','user__communities.user_id','=','users.id') ->get();

        return view('post.post',[
            'community'=>$community,
            'members' =>$members,
            'joined'=>$joined,
            'creator'=> $creator->name,
            'moderators' => $moderators,
            'post' => $post
        ]);
    }
    public function delete($id){
         Comment::find($id)->delete();
        return response()->json(['message'=> 'comment deleted successfully']);
    }
}
