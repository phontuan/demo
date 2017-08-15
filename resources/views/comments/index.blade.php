<div class="detailBox">
    <div class="titleBox">
        <label>Comment Box</label>
        <button type="button" class="close" aria-hidden="true">&times;</button>
    </div>
    <div class="actionBox">
        <ul class="commentList">
            @foreach($all_comment as $val)
            <li>
                <div class="commenterImage">
                    <img src="http://placekitten.com/45/45" />
                </div>
                <div class="commentText">
                    <h4>Demo</h4>
                    <p class="">{{$val->content}}</p> <span class="date sub-text">on March 5th, 2014</span>
                </div>
            </li>
            @endforeach
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