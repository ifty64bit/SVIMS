<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation Mail</title>
</head>
<body>
    <h1>Confirm Your Account</h1>
    <p>Hello {{$data['name']}}</p>
    <p>
        Your account has been created.
        Follow This Link To Create A Password for Your Account <a href="{{$data['link']}}" target="_blank">Click Here</a> 
    </p>
    <p>
        Regards,<br>
        Admin
    </p>
</body>
</html>