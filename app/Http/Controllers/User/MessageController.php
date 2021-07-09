<?php

namespace App\Http\Controllers\User;

use App\Events\newMessageEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Community;
use App\Models\Message;
use App\Models\User;
use App\Notifications\newMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
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
    public function index(){
        $userCommunities =auth()->user()->communities()->get();

        return view('user.message',['communities'=>$userCommunities,'messages'=>auth()->user()->allMessages()->get()]);
    }
    public function messages(Request $request)
    {
        return view('components.user.messeges',['messages'=>auth()->user()->messages()->get()])->render();
    }
    public function markAllAsRead(Request $request){
        $messages = auth()->user()->messages()->get();
        if(!$messages->isEmpty()){
            foreach ($messages as $message){
                $marked= Message::find($message->id);
                $marked->read_at= Carbon::now();
                $marked->save();
            }
        }
        $userCommunities =auth()->user()->communities()->get();
        return view('user.message',['communities'=>$userCommunities,'messages'=>auth()->user()->allMessages()->get()]);
    }
    public function message(Request $request){
        return view('components.user.messeges',['messages'=>Message::where('id',$request->messageId)->get()])->render();
    }
    public function toast($id){
        return view('components.tags.toastMessage',['message'=>Message::find($id)])->render();
    }
    public function reply(Request $request){
        $message = Message::find($request->message_id);

        $community = Community::where('id',$message->sender['community'])->first();

        $sender = ["picture"=>$community->picture,"sender"=>$community->name,"from"=>"moderator","community"=>$message->sender['community']];
        $subject = $request->subject;
        $content = $request->message;
        $newM =Message::create([
            'user_id'=> $request->reciver,
            'subject'=>$subject,
            'content'=>$content,
            'sender'=>$sender,
            'from_id'=>auth()->user()->id,
        ]);

        newMessageEvent::dispatch($newM,User::find($request->reciver));
        $userCommunities =auth()->user()->communities()->get();
        return view('user.message',['communities'=>$userCommunities,'messages'=>auth()->user()->messages()->get()]);
    }
    public function store(StoreMessageRequest $request){
      $moderators = Community::find($request->reciver)->moderators()->get();
      $creator = Community::find($request->reciver)->creator()->first();
      if(!$moderators->isEmpty()){
          foreach ($moderators as $moderator){
              $sender = ["picture"=>auth()->user()->picture,"sender"=>auth()->user()->name,"from"=>"user","community"=>$request->reciver];
           $subject = $request->subject;
           $content = $request->message;
           $message=Message::create([
               'user_id'=> $moderator->id,
               'subject'=>$subject,
               'content'=>$content,
               'sender'=>$sender,
               'from_id'=>auth()->user()->id,
           ]);
              newMessageEvent::dispatch($message,User::find($moderator->id));
          }
      }
      if($creator){
          $sender = ["picture"=>auth()->user()->picture,"sender"=>auth()->user()->name,"from"=>"user","community"=>$request->reciver];
          $subject = $request->subject;
          $content = $request->message;
          $message=Message::create([
              'user_id'=> $creator->id,
              'subject'=>$subject,
              'content'=>$content,
              'sender'=>$sender,
              'from_id'=>auth()->user()->id,
          ]);
          newMessageEvent::dispatch($message,User::find($creator->id));

      }
          $userCommunities =auth()->user()->communities()->get();
          return view('user.message',['communities'=>$userCommunities,'messages'=>auth()->user()->messages()->get()]);


    }
}
