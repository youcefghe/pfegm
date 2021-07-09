<?php

namespace App\Http\Controllers\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Comment;
use App\Models\Community;
use App\Models\Lesson;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Post_tag;
use App\Models\Reported_post;
use App\Models\Saved_post;
use App\Models\Tag;
use App\Models\User;
use App\Models\User_community;
use App\Notifications\JoinedUser;
use App\Traits\MediaUpload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use MediaUpload;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    /**
     * Show new post information for select.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {     $userCommunities =Auth::user()->communities()->get();
          $tags = Tag::get();

        return view('user.newPost',[
            'communities'=>$userCommunities,
            'tags'=>$tags
        ]);
    }
    public function hotPosts(Request  $request){
        $communities =User::find(auth()->user()->id)->getCommunityIdsAttribute()->all();
        $posts =Post::whereIn('community_id',$communities)->with(['medias','createdBy','comments.replies','community','post_tags'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->paginate(3);
        $communities = Community::select('name','picture','id')->withCount('members')->orderby('members_count','desc')->take(5)->get();
        if($request->ajax()){
            return view('components.user.all_posts',['posts'=>$posts])->render();
        }
        return view('home',[
            'posts'=>$posts,
            'topFive'=> $communities
        ]);

    }
    public function topPosts(Request $request){
        $communities =User::find(auth()->user()->id)->getCommunityIdsAttribute()->all();
        $posts =Post::whereIn('community_id',$communities)->with(['medias','createdBy','comments.replies','community','post_tags'])->withCount(['upvotes','downvotes'])->orderBy('upvotes_count','desc')->paginate(3);
        $communities = Community::select('name','picture','id')->withCount('members')->orderby('members_count','desc')->take(5)->get();
        if($request->ajax()){
            return view('components.user.all_posts',['posts'=>$posts])->render();
        }
        return view('home',[
            'posts'=>$posts,
            'topFive'=> $communities
        ]);

    }
    public function indexLesson($lessonId,$elementId)
    {     $userCommunities =Community::where('lesson_id',$lessonId)->first();
          $element = $elementId;
          $tags = Tag::get();

        return view('user.newPost',[
            'communities'=>$userCommunities,
            'element_id'=>$element,
            'tags'=>$tags
        ]);
    }
    public function relatedPosts($community_id,$element){
        $posts = Post::where('element_id',$element)->where('community_id',$community_id)->with(['medias','createdBy','comments.replies','community','post_tags'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->get();
        $members = User_community::where('community_id',$community_id)->where('role','!=','request')->get()->count();
        $community=Community::where('id',$community_id)->first();
        $created_At =Carbon::parse($community->created_at);
        $community['created_at'] = $created_At->format('d M Y');
        $user = User_community::where('community_id',$community->id)->where('role','creator')->first();
        $creator =User::where('id',$user->user_id)->first();
        $joined =User_community::where('user_id',auth()->user()->id)->exists();
        $com=$community->id;
        $moderators = User_community::where('community_id',$com)->where('role','moderator')->orwhere( function ($query) use ($com) {
            $query->where('community_id',$com)->where('role','creator');
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
    public function goToLesson($post_id,$lesson_id){
        $post=Post::where('id',$post_id)->first();
        $community = $post->community;

        $lesson = Lesson::where('id',$community->lesson_id)->with(['course.instructor'])->first();

        return view('lesson.from_post',['lesson'=>$lesson]);
    }
    /**
     * Get user reported post .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getReportededPost(Request $request){
        $reportedPost = auth()->user()->getReportedPost()->all();
        $posts =Post::whereIn('id',$reportedPost)->with(['medias','createdBy','comments.replies','community','post_tags'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->get();
        if(!$posts->isEmpty()){
            return view('components.user.all_posts',['posts'=>$posts])->render();
        }else{
            return 'No Reported Post';
        }
        //return response()->json(['posts'=>$post]);
    }
    /**
     * Get user upvoted post .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getSavedPost(Request $request){
        $savedPost = auth()->user()->getSavedPost()->all();
        $posts =Post::whereIn('id',$savedPost)->with(['medias','createdBy','comments.replies','community','post_tags'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->get();
        if(!$posts->isEmpty()){
           return view('components.user.all_posts',['posts'=>$posts])->render();
       }else{
           return 'No Saved Post';
       }
       //return response()->json(['posts'=>$post]);
    }
    /**
     * Get user saved post .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getUpPost(Request $request){
        $upVotes = auth()->user()->getUpPost()->all();
        $posts =Post::whereIn('id',$upVotes)->with(['medias','createdBy','comments.replies','community','post_tags'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->get();
        if(!$posts->isEmpty()){
        return view('components.user.all_posts',['posts'=>$posts])->render();
        }else{
            return 'No Up vote';
        }
    }
    /**
     * Get user down voted post .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getDownPost(Request $request){
        $downVotes = auth()->user()->getDownPost()->all();
        $posts =Post::whereIn('id',$downVotes)->with(['medias','createdBy','comments.replies','community','post_tags'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->get();
        if(!$posts->isEmpty()){
            return view('components.user.all_posts',['posts'=>$posts])->render();
            }else{
                return 'No down vote';
            }
    }
    /**
     * Get more posts.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getMorePosts(Request $request){
        $posts= Post::where('community_id',$request->community_id)->with(['medias','createdBy','comments.replies','community','post_tags'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->paginate(2);
        return view('components.user.all_posts',['posts'=>$posts])->render();
    }
    /**
     * Report post .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function reportPost(Request $request){
        $success = true;
        $message= 'Post Already reported';

        $exist= Reported_post::where('post_id',$request->postId)->where('user_id',auth()->user()->id)->exists();

        if(!$exist)
        {
            $Post= Post::find($request->postId);
            $savepost = Reported_post::create([
            'user_id'=>auth()->user()->id,
            'post_id'=>$request->postId,
            'community_id'=>$Post->community->id,
            'details'=>$request->details
        ]);
            $message ='Post reported';
            return response()->json(['message'=>$message,
                'success'=>$exist]);
//            return response()->json(['message'=>$Post->community->id]);
        }
        return response()->json(['message'=>$message,
            'success'=>$exist]);
    }
    /**
     * Save post .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function savePost(Request $request){
        $success = true;
        $message= 'Post Already saved';
        $exist= Saved_post::where('post_id',$request->postId)->where('user_id',auth()->user()->id)->exists();
        if(!$exist)
        {$savepost = Saved_post::create([
            'user_id'=>auth()->user()->id,
            'post_id'=>$request->postId
        ]);
        $message ='Post saved'.' ⚡️';
            return response()->json(['message'=>$message,
                'success'=>$exist]);
        }
        return response()->json(['message'=>$message,
            'success'=>$exist]);
    }
    /**
     * Show one post information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function getPost(Request $request,$id){
        $post =Post::where('id',$id)->with(['community','comments.user' ,'comments.replies.author','comments.downvotes','comments.upvotes'])->withCount(['upvotes','downvotes'])->first();

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
    public function edit(Request $request,$id){
        $post = Post::where('id',$id)->with('community')->first();
        return view('post.edit',['post'=>$post]);
    }
    public function tagPosts(Request $request,$id){
      $tags=Tag::find($id)->getPostIdsAttribute();
      $posts=Post::whereIn('id',$tags)->with(['medias','createdBy','comments.replies','community','post_tags'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->get();
      $communities = Community::select('name','picture','id')->withCount('members')->orderby('members_count','desc')->take(5)->get();
        return view('post.tag_posts',[
            'posts'=>$posts,
            'topFive'=> $communities
        ]);
    }
    public function update(Request $request,$id){
        $post = Post::find($id);
        $post->title= $request->title;
        $post->content = $request->post;
        $post->save();
        $community1 = Community::find($post->community_id);
        if ($request->hasfile('files')) {
            $this->PostMediaUpload($request,$post->id,$community1->name,'files');
        }
        $members = User_community::where('community_id',$post->community_id)->where('role','!=','request')->get()->count();
        $created_At =Carbon::parse($community1->created_at);
        $community1['created_at'] = $created_At->format('d M Y');
        $user = User_community::where('community_id',$post->community_id)->where('role','creator')->first();
        $creator =User::where('id',$user->user_id)->first();
        $community_id =$post->community_id;
        $moderators = User_community::where('community_id',$community_id)->where('role','moderator')->orwhere( function ($query) use ($community_id) {
            $query->where('community_id',$community_id)->where('role','creator');
        })->join('users','user__communities.user_id','=','users.id') ->get();
        return view('post.post',[
            'post'=>$post,
            'community'=>$community1,
            'members' =>$members,
            'joined'=>true,
            'creator'=> $creator->name,
            'moderators' => $moderators,
            ]);

    }

    /**
     * Store user post
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(StorePostRequest $request){
        if(!$request->element_id){

        $post = Post::create(
            [
              'title' => $request->title,
             'content' => $request->post,
             'community_id'=>$request->community,
                'user_id' =>auth()->user()->id,
                'solved' => false

            ]
        );
        foreach ($request->tags as $tag)
        {
            Post_tag::create([
                'tag_id'=>$tag,
                'post_id'=>$post->id
            ]);
        }
    }else{
            $post = Post::create(
                [
                    'title' => $request->title,
                    'content' => $request->post,
                    'community_id'=>$request->community,
                    'user_id' =>auth()->user()->id,
                    'solved' => false,
                    'element_id'=>$request->element_id

                ]);
            foreach ($request->tags as $tag)
            {
                Post_tag::create([
                    'tag_id'=>$tag,
                    'post_id'=>$post->id
                ]);
            }
    }

        $community1 = Community::where('id',$request->community)->first();
        if ($request->hasfile('files')) {
            $this->PostMediaUpload($request,$post->id,$community1->name,'files');
        }
        foreach ($community1->members as $user){
            $message = auth()->user()->name." add new post in ".$community1->name ;
            $url= '/question/'.$post->id;

            $user->notify(new JoinedUser($message,$url,auth()->user()->picture));
        }
        $members = User_community::where('community_id',$request->community)->where('role','!=','request')->get()->count();
        $created_At =Carbon::parse($community1->created_at);
        $community1['created_at'] = $created_At->format('d M Y');
        $user = User_community::where('community_id',$request->community)->where('role','creator')->first();
        $creator =User::where('id',$user->user_id)->first();
       $id =$request->community;
        $moderators = User_community::where('community_id',$request->community)->where('role','moderator')->orwhere( function ($query) use ($id) {
            $query->where('community_id',$id)->where('role','creator');
        })->join('users','user__communities.user_id','=','users.id') ->get();
        $posts =Post::where('community_id',$community1->id)->with(['medias','createdBy','comments.replies','community','post_tags'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->paginate(2);

        return view('community.welcome',[
            'community'=>$community1,
            'members' =>$members,
            'joined'=>true,
            'creator'=> $creator->name,
            'moderators' => $moderators,
            'allposts'=>$posts
        ]);
    }
    public function delete(Request $request){
        $post= Post::find($request->postId)->delete();
        return response()->json(['message'=> 'post deleted successfully']);
    }
    public function accept(Request $request){
        $post =Post::find($request->postId);
        $post->solved = true;
        $post->save();
        $comment = Comment::find($request->commentId);
        $comment->accepted = true;
        $comment->save();
        return response()->json(['message'=>'edit successfully']);
    }
    public function deletePost(Request $request){
        $post= Post::find($request->postId)->delete();
        return response()->json(['message'=> 'post deleted successfully']);
    }
}
