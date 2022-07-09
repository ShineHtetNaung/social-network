<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Requests\PageCreateRequest;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function create(PageCreateRequest $req)
    {
        Page::create(['user_id'=>Auth::id(), 'page_name' => $req->page_name]);
        return response()->json(['message'=>'page create success!']);
    }
}
