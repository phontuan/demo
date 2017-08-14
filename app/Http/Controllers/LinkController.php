<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Comment;

class LinkController extends Controller
{
    public function getLink(Request $request){
        $link = $request->get('link');
        $check_link = Link::where('url',$link)->exists();
        if($check_link){
            $link_comment  = Link::where('url',$link)->first();
            // lấy ra hết comment
            return ['
                <div style="height: 400px; width: 300px; border: 1px #333 solid">
                    <div style="height: 300px; width: 100%">
                        <p><span>Admin:</span> hello</p>
                    </div>
                <form>
                    <input type="text" name="comment" id="content-conment">
                    <button id="btn-comment">bình luân</button>
                </form>
                </div>
            ',$link_comment->comments()->get()];
        }else{
            $create_link = Link::create(['url'=>$link]);
            return '
                <div style="height: 400px; width: 300px; border: 1px #333 solid">
                    <div style="height: 300px; width: 100%">
                    </div>
                <form>
                    <input type="text" name="comment" id="content-conment">
                    <button id="btn-comment">bình luân</button>
                </form>
                </div>
            ';
        }
    }
    public function addComment(Request $request){
        $link = $request->get('link');
        $link_comment = Link::where('url',$link)->first();
        $comment = new Comment;
        $comment->email = 'test@test.com';
        $comment->content = $request->get('comment');
        $link_comment->comments()->save($comment);
        return $comment;

    }
}
