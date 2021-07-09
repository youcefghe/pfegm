<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditCommentRequest;
use App\Http\Requests\EditReplyRequest;
use App\Models\Comment;
use App\Models\Community;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use App\Models\User_community;
use App\Notifications\JoinedUser;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class ReplyController extends Controller
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
     * Store reply to post.
     *
     * @return Renderable
     */
    public function  Store(Request $request){
        $reply = Reply::create([
           'comment_id' => $request->commentId,
            'user_id' => auth()->user()->id,
            'content' => $request->reply_content
        ]);

        $reply->author()->first();

        //$user->post->createdBy
        $createdBy =Comment::where('id',$request->commentId)->with(['post.createdBy'])->first();
        $comments = Post::where('id',$createdBy->post->id)->with(['comments.user'])->first();

        foreach ($comments->comments as $comment){
            $data = auth()->user()->name." add reply  ";
            $url= '/question/'.$createdBy->post->id;
            $author =User::find($comment->user->id);
            $author->notify(new JoinedUser($data,$url,auth()->user()->picture));
        }

        $data = auth()->user()->name." add reply on one of your posts ";
        $url= '/question/'.$createdBy->post->id;
        $author =User::find($createdBy->post->createdBy->id);

        $author->notify(new JoinedUser($data,$url,auth()->user()->id));
//        return response()->json(['reply'=>$reply]);
        return view('components.post.reply',['reply'=>$reply])->render();
    }
    public function update(EditReplyRequest $request,$id){
        $reply = Reply::find($id);
        $reply->content = $request->reply;
        $reply->save();
        $comment = Comment::where('id',$reply->comment_id)->first();
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
        Reply::find($id)->delete();
        return response()->json(['message'=> 'Reply deleted successfully']);
    }
}
