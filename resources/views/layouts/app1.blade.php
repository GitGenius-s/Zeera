<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            <strong>Success</strong>{{session()->get('message')}}
        </div>
    @endif
</body>
</html>