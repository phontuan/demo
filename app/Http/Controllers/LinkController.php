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
            $link_comment  = Link::where('url',$link)->get();
            // lấy ra hết comment

            return 'ok';
        }else{
            //$create_link = Link::create(['url'=>$link]);
            return '
                <p><span>Admin:</span> hello</p>
                <input type="text" name="comment">
                <input type="submit" value="Binh luận">
            ';
        }
    }
}
