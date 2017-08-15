<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Comment;

class LinkController extends Controller
{
    public function getLink(Request $request)
    {
        $link = $request->get('link');
        $check_link = Link::where('url',$link)->exists();
        if ($check_link){
            $link_comment  = Link::where('url',$link)->first();
            $all_comment = $link_comment->comments()->get();
            return view('comments.index',compact('all_comment'));
        }else{
            $create_link = Link::create(['url'=>$link]);
            return view('comments.add');
        }
    }
    public function addComment(Request $request)
    {
        $link = $request->get('link');
        $link_comment = Link::where('url',$link)->first();
        $comment = new Comment;
        $comment->email = 'test@test.com';
        $comment->content = $request->get('comment');
        $link_comment->comments()->save($comment);
        return $comment;

    }
}
