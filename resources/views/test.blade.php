<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
        <h1>hello word</h1>
        <div id="comment">

        </div>
    <script>
        $(document).ready(function () {
            $.ajax({
                url : 'http://lar.dev/link'+'?link='+window.location.href,
                type : 'GET',
                success : function (data) {
                    $('#comment').append(data);
                    console.log(data);
                }
            });
        })
//        console.log(window.location.href)
    </script>

</body>
</html>