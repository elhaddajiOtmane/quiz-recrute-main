<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome User</title>
    <style>
        /* Add your CSS styles here for better email presentation */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to {{ config('app.name') }}</h1>
        <p>Dear User,</p>
        <p>This is a reminder email to inform you about an upcoming quiz.</p>
        <p>Your registered email with us is: {{ $user['email'] }}</p>
        <p>We appreciate your participation and wish you the best of luck with the quiz!</p>
        <p>Thank you for using {{ config('app.name') }}.</p>
    </div>
</body>
</html>
