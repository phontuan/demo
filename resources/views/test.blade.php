<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .detailBox {
            width:320px;
            border:1px solid #bbb;
            margin:50px;
        }
        .titleBox {
            background-color:#fdfdfd;
            padding:10px;
        }
        .titleBox label{
            color:#444;
            margin:0;
            display:inline-block;
        }

        .commentBox {
            padding:10px;
            border-top:1px dotted #bbb;
        }
        .commentBox .form-group:first-child, .actionBox .form-group:first-child {
            width:80%;
        }
        .commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
            width:18%;
        }
        .actionBox .form-group * {
            width:100%;
        }
        .taskDescription {
            margin-top:10px;
        }
        .commentList {
            padding:0;
            list-style:none;
            max-height:200px;
            overflow:auto;
        }
        .commentList li {
            margin:0;
            margin-top:10px;
        }
        .commentList li > div {
            display:table-cell;
        }
        .commenterImage {
            width:30px;
            margin-right:5px;
            height:100%;
            float:left;
        }
        .commenterImage img {
            width:100%;
            border-radius:50%;
        }
        .commentText p {
            margin:0;
        }
        .sub-text {
            color:#aaa;
            font-family:verdana;
            font-size:11px;
        }
        .actionBox {
            border-top:1px dotted #bbb;
            padding:10px;
        }
    </style>
</head>
<body>
        <div id="comment">

        </div>
    <script>
        $(document).ready(function () {
            $.ajax({
                url : 'http://lar.dev/link?link='+window.location.href,
                type : 'GET',
                success : function (data) {
                    $('#comment').append(data);
                }
            });
            $(document).on('click','#btn-comment',function(){
                var content = $('#input-conment').val();
                $.ajax({
                    url : 'http://lar.dev/add-comment?link='+window.location.href+'&comment='+content,
                    type: 'GET',
                    success : function (data) {
                        $('.commentList').append(' <li>'+
                                '<div class="commenterImage">'+
                                    '<img src="http://placekitten.com/45/45" />'+
                                '</div>'+
                                '<div class="commentText">'+
                                    '<h4>Demo</h4>'+
                                    '<p class="">'+content+'</p> <span class="date sub-text">on March 5th, 2014</span>'+
                                '</div>'+
                            '</li>'
                        );
                        $('#input-conment').val('');
                    }
                })
                return false;
            });
        })
    </script>

</body>
</html>