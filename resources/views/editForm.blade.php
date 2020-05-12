<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
            <form action="/editPost/{{$id}}" method="get">
                @csrf
                <input type="hidden" name="author">
                <textarea name="content" value="Content" style="width: 20vw; height: 10vh; display: block; resize: none;"></textarea>
                <input type="submit" value="Comment">
            </form>
        </div>
    
</body>
</html>

