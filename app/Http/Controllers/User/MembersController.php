<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Notification;
use App\Models\User;
use App\Models\User_community;
use App\Notifications\JoinedUser;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        $members= Community::find($id)->members()->withCount(['posts'])->with(['posts' => function($query){
        $query->withCount('reported_posts');
    }])->get();
        return Datatables::of($members)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Grant</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">kick</a>';
                return $actionBtn;
            })
            ->editColumn('picture', function($members){
                $url= $members->picture;
                return '<img src="'.$url.'" border="0" width="35" height="35"  class="img-rounded text-center" align="center" />';
            })
            ->addColumn('pivot_created_at', function($members){

                return $members->pivot->created_at->format('D ,d M Y');
            })
            ->addColumn('reported', function($members){

                return $members->posts->sum('reported_posts_count');
            })
            ->rawColumns(['action','picture'])
            ->make(true);

//    return response()->json([$members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function joinRequests(Request $request,$id)
    {
        $members = Community::find($id)->requests()->get();
        return Datatables::of($members)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<a href="javascript:void(0)" onclick="accept('.$row->id.')" class="edit btn btn-success btn-sm">Accept</a> <a href="javascript:void(0)" onclick="refuse('.$row->id.')"  class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->editColumn('picture', function($members){
                $url= $members->picture;
                return '<img src="'.$url.'" border="0" width="35" height="35"  class="img-rounded text-center" align="center" />';
            })
            ->addColumn('pivot_created_at', function($members){

                return $members->pivot->created_at->format('D ,d M Y');
            })
            ->rawColumns(['action','picture'])
            ->make(true);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Accept(Request $request)
    {
        $userCom = User_community::where('user_id',$request->userId)->where('community_id',$request->communityId)->first();
        $userCom->role = 'member';
        $userCom->save();
        $community = Community::find($request->communityId);
        $user = User::find($request->userId);
        $data = "Welecome to ".$community->name ." ".$user->name;
        $url= '/community/'.$request->communityId;
        User::find($request->userId)->notify(new JoinedUser($data,$url,$community->picture));
        return response()->json(['message'=>'User accepted successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $userCom = User_community::where('user_id',$request->userId)->where('community_id',$request->communityId)->delete();
        return response()->json(['message'=> 'request deleted successfully']);
    }
}
