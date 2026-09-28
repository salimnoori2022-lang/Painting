<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminNotificationController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//  return view('user.userole');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/user', [IndexController::class, 'index'])->middleware(['auth', 'verified'])->name('user');

Route::post('/post/{id}/comment', [PostsController::class, 'storeComment'])->name('comments.store')->middleware('auth');
Route::post('/news-detail/{id}/comment', [PostsController::class, 'storeComment'])
    ->name('comments.store')
    ->middleware('auth');
Route::get('/showcomment/{id}', [PostsController::class, 'show'])
    ->name('comments.show')
    ->middleware('auth');

Route::delete('/comments/{comment}', [PostsController::class, 'destroycomment'])
    ->name('comments.destroy')
    ->middleware('auth');

Route::controller(PostsController::class)->middleware('auth', 'Adminx')->group(function () {
    Route::get('/create', 'createpost')->name('createpost.show');
    Route::GET('/deletepost/{id}', 'deletepost')->name('deletepost.delete');
    Route::post('/store', 'storepost')->name('storepost.store');
    Route::get('/edit/{id}', 'editpost')->name('editpost.show');
    Route::post('/update', 'updatepost')->name('updatepost.store');

});

Route::post('/addappointment', [AdminController::class, 'storeappoint'])->middleware('auth')->name('storeappoint.store');
Route::controller(AdminController::class)->middleware('auth', 'Adminx')->group(function () {
    Route::get('/show', 'adminindex')->name('adminindex.show');
    Route::get('/delete/{id}', 'deleteappoint')->name('deleteappoint.delete');

});

Route::controller(UserController::class)->middleware('auth', 'Adminx')->group(function () {

    Route::get('/userlist', 'allusers')->name('users.show');
    Route::get('/deleteuser/{id}', 'deleteuser')->name('deleteuser.show');
    Route::get('/edituser/{id}', 'edituser')->name('edituser.show');
    Route::post('/updateuser', 'updaterole')->name('updateuser.show');

});

Route::get('/sentmail/{id}', [MailController::class, 'email'])->middleware(['auth', 'Adminx'])->name('sentemail.sent');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/posts/{id}/like', [PostsController::class, 'like'])
    ->name('posts.like')
    ->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/notifications', [
        AdminNotificationController::class,
        'index',
    ])->name('admin.notifications.index');

    Route::post('/admin/notifications/{notification}/read', [
        AdminNotificationController::class,
        'markAsRead',
    ])->name('admin.notifications.read');

    Route::post('/admin/notifications/read-all', [
        AdminNotificationController::class,
        'markAllAsRead',
    ])->name('admin.notifications.readAll');

    Route::delete(
        '/admin/notifications/{notification}',
        [AdminNotificationController::class, 'destroy']
    )->name('admin.notifications.delete');
});

require __DIR__.'/auth.php';
