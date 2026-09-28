<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Notifications\AdminActivityNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class PostsController extends Controller
{
    public function createpost()
    {
        return view('posts.insert-post');
    }

    public function storepost(Request $req)
    {
        $validated = $req->validate([
            'Image' => 'required|image|mimes:jpeg,png,gif,webp|max:5120',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'date' => 'required|date',
        ]);

        $image = $req->file('Image');
        $imagename = time().'.'.$image->extension();
        $image->move(public_path('images'), $imagename);

        $post = new Post;
        $post->title = $validated['title'];
        $post->imagename = $imagename;
        $post->description = $validated['description'];
        $post->date = $validated['date'];
        $post->save();

        return back()->with('post_added', 'A New Post has been posted successfylly.');

    }

    public function editpost($id)
    {
        $post = Post::find($id);

        return view('posts.editpost', compact('post'));

    }

    public function deletepost($id)
    {

        $post = Post::find($id);

        if ($post && $post->imagename && file_exists(public_path('images/'.$post->imagename))) {
            @unlink(public_path('images/'.$post->imagename));
        }

        if ($post) {
            $post->delete();
        }

        return back()->with('post_deleted', 'Post has been deleted successfully!!!');
    }

    public function updatepost(Request $request)
    {
        // dd($request->all());
        $post = Post::findOrFail($request->input('id'));

        $request->validate([
            'id' => 'required',
            'title' => 'required|string|max:255',
            'imagename' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:60000',
            'description' => 'nullable|string',

            'date' => 'nullable',

        ]);

        $post->title = $request->input('title');
        $post->description = $request->input('description');

        $post->date = $request->input('date');

        if ($request->hasFile('imagename')) {
            if ($post->imagename && file_exists(public_path('images/'.$post->imagename))) {
                unlink(public_path('images/'.$post->imagename));
            }
            $file = $request->file('imagename');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $post->imagename = $filename;
        } elseif ($request->has('remove_image') && $request->input('remove_image') == 1) {
            if ($post->imagename && file_exists(public_path('images/'.$post->imagename))) {
                unlink(public_path('images/'.$post->imagename));
            }
            $post->imagename = null;
        }

        $post->save();

        return redirect()->back()->with('post_adit', 'پست با موفقیت بروزرسانی شد.');
    }

    public function storeComment(Request $request, $id)
    {
        // Validate the incoming comment data
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);
        $post = Post::findOrFail($id);
        // Create and save the comment
        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $id, // Ensure this matches your column name 'post_id'
            'body' => $request->body,
        ]);

        $admins = User::where('type', 'Admin')->get();

        Notification::send(
            $admins,
            new AdminActivityNotification(
                auth()->user()->name.' commented on "'.$post->title.'".',
                route('comments.show', $post->id)
            )
        );

        return back()->with('success', 'Comment posted successfully!');
    }

    public function show($id)
    {
        // Eager load the comments and the user who wrote each comment
        $post = Post::with('comments.user')->findOrFail($id);

        return view('news-detail', compact('post'));
    }

    public function destroycomment(Request $request, Comment $comment)
    {
        $user = $request->user();

        $isAdmin = $user->type === 'Admin';
        $isOwner = $comment->user_id === $user->id;

        if (! $isAdmin && ! $isOwner) {
            abort(403, 'You are not allowed to delete this comment.');
        }

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully.');
    }

    public function like(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $user = $request->user();

        // Admins can like the same post multiple times
        if ($user->type === 'Admin') {
            $post->increment('likes_count');

            return response()->json([
                'success' => true,
                'liked' => true,
                'likes_count' => $post->fresh()->likes_count,
            ]);
        }

        // Normal users can like a post only once
        $alreadyLiked = Like::where('user_id', $user->id)
            ->where('post_id', $post->id)
            ->exists();

        if ($alreadyLiked) {
            return response()->json([
                'success' => false,
                'liked' => true,
                'message' => 'You have already liked this post.',
                'likes_count' => $post->likes_count,
            ], 409);
        }

        DB::transaction(function () use ($user, $post) {
            Like::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
            ]);

            $post->increment('likes_count');

            $admins = User::where('type', 'Admin')->get();

            Notification::send(
                $admins,
                new AdminActivityNotification(
                    $user->name.' liked "'.$post->title.'".',
                    route('index', $post->id)
                )
            );
        });

        return response()->json([
            'success' => true,
            'liked' => true,
            'likes_count' => $post->fresh()->likes_count,
        ]);
    }
}
