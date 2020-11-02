<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;
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
// use  App\Models\Image;

Route::get('/', function () {
    // $images = Image::all();

    // foreach ($images as $image) {
    //     echo $image->path.'</br>';
    //     echo '<hr>';
    //     var_dump($image->user->name);
    //     echo '</br>';
    //     if(count($image->comments) >= 1){     
    //         echo '<h4>Comentarios </h4></br>';
    //         foreach($image->comments as $comments){
    //             echo 'Usuario: '.$comments->user->name.''.$comments->user->surname.' COMENTARIO:'.$comments->content;
    //             echo '</br>';
    //         }
    //     }
    //     echo 'LIKES: '.count($image->likes);
    //     echo '<hr>';
    // }
    // die;
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',  [HomeController::class, 'index'])->name('dashboard');

Route::get('/configuracion', [UserController::class, 'config'])->name('config')->middleware('auth');

Route::get('/configuracion/password/change', [UserController::class, 'configPassword'])->name('config.updatePassword')->middleware('auth');

Route::post('/user/password/change', [UserController::class, 'changePassword'])->name('user.changePassword')->middleware('auth');

Route::post('/user/update', [UserController::class, 'update'])->name('user.update')->middleware('auth');

Route::get('/user/avatar/{fileid}', [UserController::class, 'getImage'])->name('user.avatar')->middleware('auth');

Route::get('/profile/{id}', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');

Route::post('/autocomplete', [UserController::class, 'autocomplete'])->name('autocomplete')->middleware('auth');

Route::get('/user/image/{fileid}', [ImageController::class, 'getImage'])->name('image.file')->middleware('auth');

Route::get('/publication/{id}', [ImageController::class, 'publicDetail'])->name('public.detail')->middleware('auth');

Route::get('/image/public', [ImageController::class, 'create'])->name('image.create')->middleware('auth');

Route::post('/image/save', [ImageController::class, 'save'])->name('image.save')->middleware('auth');

Route::get('/image/{id}', [ImageController::class, 'details'])->name('image.details')->middleware('auth');

Route::get('/explore', [ImageController::class, 'getRandomImage'])->name('image.getRandom')->middleware('auth');

Route::post('/comment/save', [CommentController::class, 'save'])->name('comment.save')->middleware('auth');

Route::get('/comment/delete/{id}', [CommentController::class, 'delete'])->name('comment.delete')->middleware('auth');

Route::get('/like/{image_id}', [LikeController::class, 'like'])->name('like.save')->middleware('auth');

Route::get('/dislike/{image_id}', [LikeController::class, 'dislike'])->name('dislike.save')->middleware('auth');

Route::get('/likes/{image_id}', [LikeController::class, 'likes'])->name('likes')->middleware('auth');

Route::get('/follow/{followId}', [FollowController::class, 'follow'])->name('follow.save')->middleware('auth');

Route::get('/disfollow/{followId}', [FollowController::class, 'disfollow'])->name('disfollow.save')->middleware('auth');

Route::get('/followProfile/{followId}', [FollowController::class, 'followProfile'])->name('followProfile.save')->middleware('auth');

Route::get('/disfollowProfile/{followId}', [FollowController::class, 'disfollowProfile'])->name('disfollowProfile.save')->middleware('auth');

Route::get('/followers/{idUser}', [FollowController::class, 'followers'])->name('getFollowers')->middleware('auth');

Route::get('/followed/{idUser}', [FollowController::class, 'followed'])->name('getFollowed')->middleware('auth');

Route::get('/direct/inbox', function(){ return view('user.direct'); })->name('user.direct')->middleware('auth');


