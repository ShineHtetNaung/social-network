<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow($personId)
    {
        Follow::create(['user_id' => Auth::id(), 'follow_id' => $personId, 'is_person' => true]);
        return response()->json(['message'=>'success']);
    }

    public function follow_page($pageId)
    {
        Follow::create(['user_id' => Auth::id(), 'follow_id' => $pageId, 'is_person' => false]);
        return response()->json(['message'=>'success']);
    }   
}
