<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
        $userCommunities = auth()->user()->getCommunityIdsAttribute()->all();
        $communities = auth()->user()->communities()->get();
        $posts =Post::where('user_id',auth()->user()->id)->with(['medias','createdBy','comments.replies','community'])->withCount(['upvotes','downvotes'])->orderBy('created_At','desc')->paginate(2);
        if($request->ajax()){
            return view('components.user.all_posts',['posts'=>$posts])->render();
        }
        return view('user.profile',[
            'posts'=>$posts,
            'communities'=>$communities
        ]);
    }
}
