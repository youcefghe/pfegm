<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommunityRequest;
use App\Http\Requests\UpdateCommunityRequest;
use App\Models\Community;
use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use App\Models\User_community;
use App\Notifications\JoinedUser;
use App\ReturnedData\CommunityPost;
use App\Traits\CommunityImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CommunityController extends Controller
{
    use CommunityImage;
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
    public function index(Request $request,$id)
    {
        $community =Community::where('id',$id)->first();
       $members = User_community::where('community_id',$id)->where('role','!=','request')->get()->count();
       $created_At =Carbon::parse($community->created_at);
       $community['created_at'] = $created_At->format('d M Y');
       $user = User_community::where('community_id',$id)->where('role','creator')->first();
       $creator =User::where('id',$user->user_id)->first();
       if(auth()->user()){
        $joined =User_community::where('user_id',auth()->user()->id)->where('community_id',$id)->where('role','member')->orwhere( function ($query) use ($id) {
           $query->where('community_id',$id)->where('role','creator')->where('user_id',auth()->user()->id);
       })->orwhere( function ($query) use ($id) {
           $query->where('community_id',$id)->where('role','moderator')->where('user_id',auth()->user()->id);
       })->exists();

       if($joined == true || $community->type =='public'){
           if($joined == true){
               $joined = 'yes';
           }else{
               $joined = 'no';
           }
           $posts =Post::where('community_id',$id)->with(['medias','createdBy','community','comments.replies','post_tags'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->paginate(2);

       }else{
           $posts =[];
           $userCom= User_community::where('user_id',auth()->user()->id)->where('community_id',$id)->where('role','request')->first();
           if($userCom){
               $joined = 'request';
           }else{
               $joined = 'no';
           }
       }
       }else{
           $posts =Post::where('community_id',$id)->with(['medias','createdBy','community','comments.replies'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->paginate(2);
           $joined='no';
       }
         $moderators = User_community::where('community_id',$id)->where('role','moderator')->orwhere( function ($query) use ($id) {
         $query->where('community_id',$id)->where('role','creator');
       })->join('users','user__communities.user_id','=','users.id') ->get();
        return view('community.welcome',[
            'community'=>$community,
            'members' =>$members,
             'joined'=>$joined,
            'creator'=> $creator->name,
            'moderators' => $moderators,
            'allposts' => $posts
        ]);
    }
    public function JOIN (Request $request , $id){
        $existCom = Community::where('id',$id)->exists();
        $exist = User_community::where('user_id',auth()->user()->id)->where('community_id',$id)->exists();
        if(!$exist && $existCom){
            $community = Community::find($id);
            $role ='member';
            if($community->type == 'private'){
                $role = 'request';
            }
            $request->user()->user_communities()->create(
                [
                    'community_id'=>$id,
                    'role'=>$role
                ]
            );
            $comm = Community::where('id',$id)->first();
            $moderators = User_community::where('community_id',$id)->where('role','moderator')->orwhere( function ($query) use ($id) {
                $query->where('community_id',$id)->where('role','creator');
            })->join('users','user__communities.user_id','=','users.id') ->get();
            if($role == 'member')
            {
                $url= '/community/'.$comm->id;
                $data = "Welecome to ".$comm->name ." ".auth()->user()->name;
                notify()->success($data.' ⚡️');
                auth()->user()->notify(new JoinedUser($data,$url,$comm->picture));
                foreach ($moderators as $moderator){
                    $modData = "new user join to ".$comm->name ;
                    $modUrl= '/moderator/community/members/'.$comm->id;
                    User::find($moderator->id)->notify(new JoinedUser($modData,$modUrl,auth()->user()->picture));
                }
            }else{
                notify()->success('request send successfully  ⚡️');
                foreach ($moderators as $moderator){
                    $modData = "There is request to join ".$comm->name ;
                    $modUrl= '/moderator/community/requests/'.$comm->id;

                    User::find($moderator->id)->notify(new JoinedUser($modData,$modUrl,auth()->user()->id));

                }
            }
            $userCommunities =Auth::user()->communities()->get();

        return view('community.user_communities',[
            'communities'=>$userCommunities
        ]);
           // auth()->user()->notify(new JoinedUser(auth()->user()->id,'Welcome to new community'));
            // return back()->with(["message"=>"welcome "]);
        }
    }
    public function updatePicture(Request $request,$id){

        if($request->hasFile('file')){
            $this->CommunityMediaUpload($request,$id);
            $community = Community::find($id);
            notify()->success('Community updated successfully  ⚡️');
            return view('community.edit',[
                'community'=>$community
            ]);
        }else{
            $community = Community::find($id);
        notify()->error('upload image please !');
        return view('community.edit',[
            'community'=>$community
        ]);
        }
    }
    public function updateCover(Request $request,$id){

        if($request->hasFile('file')){
            $this->CommunityCoverUpdate($request,$id);
            $community = Community::find($id);
            notify()->success('Community updated successfully  ⚡️');
            return view('community.edit',[
                'community'=>$community
            ]);
        }else{
            $community = Community::find($id);
            notify()->error('upload image please !');
            return view('community.edit',[
                'community'=>$community
            ]);
        }
    }
    public function Analystics(Request $request,$id){
        $comm = Community::where('id',$id)->withCount(['members','posts'])->first();
        $users_joined = DB::table('User__communities')->select( DB::raw( 'count(*) as total'),DB::raw('date(created_at) as dates')) ->where('community_id',$id)
            ->groupBy('dates')->get();
        $posts = DB::table('posts')->select( DB::raw('count(*) as total'),DB::raw('date(created_at) as dates'))
            ->where('community_id',$id)
            ->groupBy('dates')->get();
        $reported = DB::table('reported_posts')->select( DB::raw('count(*) as total'),DB::raw('date(created_at) as dates'))
            ->where('community_id',$id)
            ->groupBy('dates')->get();
        $comment = DB::table('posts')->select( DB::raw('count(comments.id) as total'),DB::raw('date(comments.created_at) as dates'))
            ->where('community_id',$id)
            ->join('comments','posts.id','comments.post_id')
            ->groupBy('dates')->get();

        //  $array = $collection->toArray();
        return view('community.analystics',[
            'community'=>$comm,
            'usersJoined'=>$users_joined,
            'posts'=> $posts,
            'reported'=>$reported,
            'comments'=>$comment
        ]);
    }
    public function getUserCommunities(Request $request){
        $userCommunities =Auth::user()->communities()->get();

        return view('user.newPost',[
            'communities'=>$userCommunities
        ]);

    }
    public function getAllUserCommunities(Request $request){
        $userCommunities =Auth::user()->communities()->get();

        return view('user.newPost',[
            'communities'=>$userCommunities
        ]);

    }
    public function edit(Request $request,$id){
        $comm = Community::where('id',$id)->first();
        return view('community.edit',[
            'community'=>$comm
        ]);
    }
    public function update(UpdateCommunityRequest $request,$id){

        $community =Community::find($id);
        $community->name =$request->name;
        $community->type =$request->type;
        $community->description = $request->description;
        $community->rules = $request->rules;
        $community->save();
        notify()->success('Community updated successfully  ⚡️');
        return view('community.edit',[
            'community'=>$community
        ]);
    }
    public function store(StoreCommunityRequest  $request)
    {

      $community =  Community::create(
                [
                    'name'=>$request->name,
                    'type'=>$request->type,
                    'cover'=>config('app.url').'/images/community/community.jpg',
                    'picture'=>config('app.url').'/images/community/picture.jpg',
                    'description'=>$request->description,
                    'rules'=>$request->rules
                ]
        );
       $request->user()->user_communities()->create(
            [
                'community_id'=>$community->id,
                'role'=>'creator'
            ]
        );

        $newFolder = Storage::makeDirectory('public/Upload/'.$community->name);
        $members = 1;
        $created_At =Carbon::parse($community->created_at);
        $community['created_at'] = $created_At->format('d M Y');
        $creator =auth()->user();
        $joined =true;
        $posts =Post::where('community_id',$community->id)->with(['medias','createdBy','community','comments.replies'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->paginate(2);
        $moderators = [auth()->user()];

        return view('community.welcome',[
            'community'=>$community,
            'members' =>$members,
            'joined'=>$joined,
            'creator'=> $creator->name,
            'moderators' => $moderators,
            'allposts' => $posts
        ]);

    }
}
