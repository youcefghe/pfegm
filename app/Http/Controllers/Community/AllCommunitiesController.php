<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Redirect;
use Response;


class AllCommunitiesController extends Controller
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
    { $userCommunities =Auth::user()->communities()->get();

        return view('community.user_communities',[
            'communities'=>$userCommunities
        ]);
    }
    public function publicCommunities(Request $request)
    { $userCommunities =Community::paginate(13);
        if($request->ajax()){
            return view('components.community.all_community_ajax',['communities'=>$userCommunities])->render();
        }
        return view('community.user_communities',[
            'communities'=>$userCommunities
        ]);
    }
    public function autocomplete(Request $request){
        $data = Community::select("name")
            ->where("name","LIKE",'%'.$request->query('query').'%')
            ->get();
        return response()->json($data);
    }
    public function searchResult(Request $request){
        $userCommunities =Community::where("name","LIKE",'%'.$request->search.'%')->get();
        return view('community.user_communities',[
            'communities'=>$userCommunities
        ]);
    }
}
