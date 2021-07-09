<?php

use App\Http\Controllers\Community\AllCommunitiesController;
use App\Http\Controllers\Community\CommunityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\SkeletonController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Vote\VoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ModeratorController;
use App\Htpp\Controllers\User\MembersController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('Mooc-Exchange');

Auth::routes(['verify'=>true]);

Route::get('/home', [HomeController::class, 'index'])->name('Dashboard')->middleware('verified');
Route::get('/notModerator',[HomeController::class,'isModerator'])->name('Not allowed');
Route::get('/lesson/{id?}/elements',[SkeletonController::class,'getPosts'])->middleware('auth');
Route::delete('/post',[PostController::class,'delete'])->middleware('auth')->name('Post delete');
Route::post('/createCourse',[\App\Http\Controllers\Course\CourseController::class,'store'])->middleware('auth')->name('Add Course');
Route::get('/course/{id?}',[\App\Http\Controllers\Course\CourseController::class,'index'])->middleware('auth')->name('Course');
Route::get('/course', [SkeletonController::class, 'index'])->name('Course');
Route::get('/community/{community?}/lesson',[SkeletonController::class,'getCommunityLesson']);
Route::get('/lesson/{id?}', [SkeletonController::class, 'lesson'])->name('Lesson')->middleware('auth');
Route::get('/lessons/{id?}', [SkeletonController::class, 'getLesson'])->name('Lessons')->middleware('auth');
Route::post('/lesson/{id?}',[SkeletonController::class,'storeLesson'])->name('Store Lesson')->middleware('auth');
Route::get('/post/{post_id?}/lesson/{lesson_id}',[PostController::class,'goToLesson'])->name('Post Lesson')->middleware('auth');
Route::get('/Hot/Posts',[PostController::class,'hotPosts'])->name('Hot Posts')->middleware('auth');
Route::get('/Top/Posts',[PostController::class,'topPosts'])->name('Top Posts')->middleware('auth');
Route::get('user', [UserController::class, 'index'])->name('Home')->middleware('auth','verified');
Route::get('/new/post', [PostController::class, 'index'])->name('New Post')->middleware('auth');
Route::get('/new/{lessonId?}/post/{elementId?}', [PostController::class, 'indexLesson'])->name('New Question')->middleware('auth');
Route::post('/post',[PostController::class,'store'])->name('post')->middleware('auth');
Route::get('/community/{community_id?}/posts/{element?}',[PostController::class , 'relatedPosts'])->name('related posts')->middleware('auth');
Route::post('/upvote',[VoteController::class,'addUpVote'])->middleware('auth');
Route::post('/downvote',[VoteController::class,'addDownVote'])->middleware('auth');
Route::post('/comment',[\App\Http\Controllers\Comment\CommentController::class,'Store'])->middleware('auth');
Route::post('/edit/{id?}/comment',[\App\Http\Controllers\Comment\CommentController::class,'update'])->name('Update comment')->middleware('auth');
Route::delete('/delete/{id?}/comment',[\App\Http\Controllers\Comment\CommentController::class,'delete'])->name('Delete comment')->middleware('auth');
Route::post('/comment/upvote',[VoteController::class,'StoreCommentUpVote'])->middleware('auth');
Route::post('/comment/downvote',[VoteController::class,'StoreCommentDownVote'])->middleware('auth');
Route::post('/reply',[\App\Http\Controllers\Comment\ReplyController::class,'Store'])->middleware('auth');
Route::post('/edit/{id?}/reply',[\App\Http\Controllers\Comment\ReplyController::class,'update'])->name('Update reply')->middleware('auth');
Route::delete('/delete/{id?}/reply',[\App\Http\Controllers\Comment\ReplyController::class,'delete'])->name('Delete reply')->middleware('auth');
Route::get('/messages',[\App\Http\Controllers\User\MessageController::class,'index'])->middleware('auth')->name('Messages');
Route::post('/message',[\App\Http\Controllers\User\MessageController::class,'store'])->middleware('auth')->name('New Message');
Route::get('/message',[\App\Http\Controllers\User\MessageController::class,'messages'])->middleware('auth')->name('Unread Message');
Route::get('/messageNotification',[\App\Http\Controllers\User\MessageController::class,'message'])->middleware('auth')->name('Message Notification');
Route::post('/messageReply',[\App\Http\Controllers\User\MessageController::class,'reply'])->name('Reply Message')->middleware('auth');
Route::get('/message/markAll',[\App\Http\Controllers\User\MessageController::class,'markAllAsRead'])->middleware('auth');
Route::get('/notification/markAll',[UserController::class,'markAllAsRead'])->middleware('auth');
Route::post('/save/post',[PostController::class,'savePost'])->middleware('auth')->name('Save post');
Route::post('/report/post',[PostController::class,'reportPost'])->middleware('auth')->name('Report post');
Route::get('/upVoted/Post',[PostController::class,'getUpPost'])->name('Up vote')->middleware('auth');
Route::get('/tag/{id?}/posts',[PostController::class,'tagPosts'])->name('Tag posts')->middleware('auth');

Route::get('/Saved/Post',[PostController::class,'getSavedPost'])->name('Saved post')->middleware('auth');
Route::get('/Reported/Post',[PostController::class,'getReportededPost'])->name('Reported post')->middleware('auth');
Route::get('/downVoted/Post',[PostController::class,'getDownPost'])->name('Down vote')->middleware('auth');
Route::get('community/{id?}', [CommunityController::class, 'index'])->name('community');
Route::get('community/{id?}/leave', [UserController::class,'leaveCommunity'])->name('Leave community')->middleware('auth');
Route::get('join/{id?}', [CommunityController::class, 'JOIN'])->name('join')->middleware('auth');
Route::post('community/{id?}', [CommunityController::class, 'store'])->middleware('auth');
Route::post('/contact/moderators',[UserController::class,'ContactModerator'])->name('Contact Instructor');
Route::group(['middleware' => ['moderator']], function () {
    Route::get('moderator/community/{id?}', [ModeratorController::class, 'index'])->name('Instructor')->middleware('auth');
    Route::get('moderator/community/post/{id?}', [ModeratorController::class, 'loadMorePost'])->middleware('auth');
    Route::get('moderator/community/reported/post/{id?}', [ModeratorController::class, 'loadMoreReportedPosts'])->middleware('auth');
    Route::get('moderator/community/members/{id?}', [ModeratorController::class, 'members'])->name('Community members')->middleware('auth');
    Route::get('moderator/community/requests/{id?}', [ModeratorController::class, 'requests'])->name('Community requests')->middleware('auth');
    Route::get('moderator/community/reported/{id?}', [ModeratorController::class, 'reportedPost'])->middleware('auth')->name('Reported posts');
    Route::get('moderator/community/archive/{id?}', [ModeratorController::class, 'archive'])->middleware('auth')->name('Archive posts');
    Route::get('moderator/community/edit/{id?}', [CommunityController::class, 'edit'])->middleware('auth')->name('Community information');
    Route::post('moderator/community/edit/{id?}', [CommunityController::class, 'update'])->middleware('auth')->name('Community update');
    Route::post('moderator/community/image/update/{id?}', [CommunityController::class, 'updatePicture'])->name('Update community picture')->middleware('auth');
    Route::post('moderator/community/cover/update/{id?}', [CommunityController::class, 'updateCover'])->name('Update community cover')->middleware('auth');
    Route::get('moderator/community/analystics/{id?}', [CommunityController::class, 'Analystics'])->middleware('auth')->name('Analystics');
});
Route::post('/update/post/{id?}',[PostController::class,'update'])->name('Update post')->middleware('auth');
Route::get('moderator/communities',[\App\Http\Controllers\User\ModeratorController::class,'moderatorCommunity'])->middleware('auth');
Route::get('members/list/{id?}',[\App\Http\Controllers\User\MembersController::class,'index'])->name('Members')->middleware('auth');
Route::get('/requests/list/{id?}',[\App\Http\Controllers\User\MembersController::class,'joinRequests'])->name('Request to join')->middleware('auth');
Route::post('/requests/accept',[\App\Http\Controllers\User\MembersController::class,'Accept'])->name('Accept request')->middleware('auth');
Route::delete('requests/delete',[\App\Http\Controllers\User\MembersController::class,'delete'])->name('Delete request')->middleware('auth');
Route::delete('/delete/post',[PostController::class,'deletePost'])->name('Delete Post')->middleware('auth');
Route::get('question/{id?}',[PostController::class,'getPost'])->name('question')->middleware('auth');
Route::post('/Accept',[PostController::class,'accept'])->name('Accept')->middleware('auth');
Route::get('/user/communities',[CommunityController::class,'getUserCommunities'])->middleware('auth');
Route::get('/mycommunities', [AllCommunitiesController::class, 'index'])->name('My communities');
Route::get('/publiccommunities', [AllCommunitiesController::class, 'publicCommunities'])->name('Public')->middleware('auth');
Route::get('/profile',[ProfileController::class,'index'])->name('My Profile')->middleware('auth');
Route::get('/notifications',[UserController::class,'notifications'])->name('notifications')->middleware('auth');
Route::get('/notification/{id?}',[UserController::class,'notification'])->name('notification')->middleware('auth');
Route::get('/edit/post/{id?}',[PostController::class,'edit'])->name('Edit post')->middleware('auth');
Route::get('/autocomplete',[AllCommunitiesController::class,'autocomplete'])->name('autocomplete');
Route::get('/searchResult',[AllCommunitiesController::class,'searchResult'])->name('search');
Route::get('/notification/toast/{id?}',[UserController::class,'toast'])->name('notification toast')->middleware('auth');
Route::get('/message/toast/{id?}',[\App\Http\Controllers\User\MessageController::class,'toast'])->name('message toast')->middleware('auth');
Route::get('/markAsRead/{id?}',[UserController::class,'readNotification'])->name('Read notification')->middleware('auth');
Route::get('/post/more',[PostController::class,'getMorePosts'])->name('More posts');
Route::resource('post','App\Http\Controllers\Post\PostController')->middleware('auth');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
