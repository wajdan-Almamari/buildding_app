<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1> wellcome</h1>
    <br>
    <!-- If user loggd in -->
    @if(auth::check())
    your name is: {{auth::user()->name}}
    <br>
    your Email is : {{auth::user()->email}}
    @else
    you are not logged in
    @endif
</body>
</html>
