<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Request $request, $postId){
        $user = auth()->user();

        $like = Like::where('user_id', $user->id)->where('post_id', $postId)->first();

        if($like){
            $like->delete();
            return response()->json(['status' => 'unliked']);
        } else {

            $like = new Like;
            $like->user_id = $user->id;
            $like->post_id = $postId;
            $like->save();
            return response()->json(['status' => 'liked']);
        }

        return redirect()->route('post.show', ['id' => $postId]);
    }
}
