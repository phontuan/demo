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
            $all_comment = '';
            foreach ($link_comment->comments()->get() as $val ){
                $all_comment .= "<li>
                    <div class=\"commenterImage\">
                        <img src=\"http://placekitten.com/45/45\" />
                    </div>
                    <div class=\"commentText\">
                        <h4>Demo</h4>
                        ".$val->content." <span class=\"date sub-text\">on March 5th, 2014</span>

                    </div>
                </li>";
            }
            return '
                <div class="detailBox">
                    <div class="titleBox">
                        <label>Comment Box</label>
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                    </div>
                    <div class="actionBox">
                        <ul class="commentList">
                            '.$all_comment.'
                        </ul>
                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Your comments" id="input-conment" />
                            </div>
                            <div class="form-group">
                                <button id="btn-comment" class="btn btn-default">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            ';
        }else{
            $create_link = Link::create(['url'=>$link]);
            return '
                <div class="detailBox">
                    <div class="titleBox">
                        <label>Comment Box</label>
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                    </div>
                    <div class="actionBox">
                        <ul class="commentList">
                            
                        </ul>
                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Your comments" id="input-conment" />
                            </div>
                            <div class="form-group">
                                <button id="btn-comment" class="btn btn-default">Add</button>
                            </div>
                        </form>
                    </div>
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
