<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(PostRequest $req)
    {
        Post::create(['poster_id' => Auth::id(), 'post_content' => $req->post_content, 'is_person' => true]);
        return response()->json(['message' => 'post success!']);
    }

    public function post_page($pageId,PostRequest $req)
    {
        Post::create(['poster_id' => $pageId, 'post_content' => $req->post_content, 'is_person' => false]);
        return response()->json(['message' => 'post success!']);
    }

    public function feed()
    {
        $posts = Post::join("follows",function($join){
                $join->on("follows.follow_id","=","posts.poster_id")
                    ->on("follows.is_person","=","posts.is_person");
                })
                ->where('follows.user_id','=',Auth::id())
                ->select('posts.*')
                ->get();
        return response()->json($posts);
    }
}
