
<!DOCTYPE html>
<html>
<head>
 <title>Invitation Email</title>
 <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

 <h1>You are being invited to Join {{$organization}} on <a href="http://127.0.0.1:8000">Job Ace</a> </h1>
 <p>click the button below to join</p>
 <a class="btn btn-primary" href="http://127.0.0.1:8000/register?role=3&org={{$orgCode}}">Join Now</a>
 <p>Or Scan The Attached Qr Code</p>

</body>
</html>
