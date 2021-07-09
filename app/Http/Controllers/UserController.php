<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModeratorContact;
use App\Models\Community;
use App\Models\Moderator_contact;
use App\Models\Post;
use App\Models\Notification;
use App\Models\User;
use App\Models\User_community;
use App\Notifications\sendContact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Events\RealTimeNotification;
use App\Notifications\JoinedUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\DatabaseNotification;
class UserController extends Controller
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
    public function index(Request $request)
    {
        //$communities =auth()->user()->communities()->with(['posts'])->get();
       // $posts=Post::where('user_id',auth()->user()->id)->with(['medias','community','createdBy'])->withCount(['upvotes','downvotes'])->orderBy('created_at','desc')->get();
        $posts =User::where('id',auth()->user()->id)->with(['communities.posts.medias','communities.posts.createdBy','communities.posts.upvotes','communities.posts.downvotes','communities.posts.comments.replies'])->first();

            $userCommunities = auth()->user()->getCommunityIdsAttribute()->all();
            $posts =Post::whereIn('community_id',$userCommunities)->with(['medias','createdBy','comments.replies','community'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->paginate(2);
            $communities = Community::select('name','picture','id')->withCount('members')->orderby('members_count','desc')->take(5)->get();



        if($request->ajax()){
            return view('components.user.all_posts',['posts'=>$posts])->render();
        }
        return view('home',[
            'posts'=>$posts,
            'topFive'=> $communities
        ]);
    }
    public function notifications(Request $request)
    {
        //$notification = auth()->user()->notifications()->where('id', '09f97b66-104d-4258-a210-ef5c2319bf92')->first();
       // if ($notification) {
            //$notification->markAsRead();
           // dd($notification);
        //}
       // dd(auth()->user()->unreadNotifications()->limit(10)->get());
        return view('components.post.notifications',['notifications'=>auth()->user()->unreadNotifications()->get()])->render();

    }
    public function markAllAsRead(Request $request){
        $messages = auth()->user()->unreadNotifications()->get();
        if(!$messages->isEmpty()){
            foreach ($messages as $message){
                $marked= Notification::find($message->id);
                $marked->markAsRead();
            }
        }
        return response()->json(['data'=>'No notification ']);
    }
    public function notification(Request $request,$id){

        return view('components.post.notification',['notification'=>Notification::find($id)])->render();
    }
    public function toast(Request $request,$id){
        return view('components.tags.toast',['notification'=>Notification::find($id)])->render();
    }
    public function readNotification(Request $request,$id){
        $notification = auth()->user()->unreadNotifications->find($id);
        if ($notification) {
            $notification->markAsRead();

            return response()->json(['url'=>json_decode($notification->data)->url]);
        }
    }
    public function ContactModerator(StoreModeratorContact $request){
       $moderators = Community::where('name',$request->community)->with('moderators')->first();


      foreach ($moderators->moderators as $moderator){
          $info =[
              'user_id'=>$moderator->id,
              'sender_mail'=>$request->email,
              'subject'=>$request->subject,
              'body'=>$request->message,
              'thanks'=>'Cordialement',
          ];
          $contact = Moderator_contact::create($info);
         $moderator->notify(new sendContact($info));
      }
      return view('welcome');

    }
    public function leaveCommunity($community_id){
      $userCommunity = User_community::where('user_id',auth()->user()->id)->where('community_id',$community_id)->where('role','member')->first();
        $posts =User::where('id',auth()->user()->id)->with(['communities.posts.medias','communities.posts.createdBy','communities.posts.upvotes','communities.posts.downvotes','communities.posts.comments.replies'])->first();
        $userCommunities = auth()->user()->getCommunityIdsAttribute()->all();
        $posts =Post::whereIn('community_id',$userCommunities)->with(['medias','createdBy','comments.replies','community'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->paginate(2);
        $communities = Community::select('name','picture','id')->withCount('members')->orderby('members_count','desc')->take(5)->get();

        if($userCommunity){
          User_community::where('user_id',auth()->user()->id)->where('community_id',$community_id)->where('role','member')->delete();
           notify()->warning('contact us if something went wrong ⚡️');

        }else{
            notify()->error("you can't leave this community! ⚡️");
         }
        return view('home',[
            'posts'=>$posts,
            'topFive'=> $communities
        ]);
    }
}
