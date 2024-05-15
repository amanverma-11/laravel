<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function showCreatePostForm(){
        return view('post.createPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Create new post
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('posts.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showPosts(){
        
        $allPosts = Post::all();

        return view('posts', compact('allPosts'));
    }

    public function showPost($id)
    {
         // Fetch the post with the given ID
         $post = Post::with('user')->find($id);

         // Check if the post exists
         if (!$post) {
             abort(404);
         }
 
         // Pass the post data to a view for display
         return view('post.showPost', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEditPostForm(Post $post)
    {
        return view('post.editPost', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Update post
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        Session::flash('success', 'Post updated successfully!');

        return redirect()->route('posts.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        Session::flash('success', 'Post deleted successfully!');
        
        return redirect()->route('posts.show');
    }

    public function addComment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->post_id = $id;
        $comment->user_id = auth()->id();
        $comment->save();

        return redirect()->route('post.show', ['id' => $id])->with('success', 'Comment added successfully');
    }
}
