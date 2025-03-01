<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Club</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('background-image.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
        }
        .container-0 {
            text-align: center;
            background: rgba(0, 0, 0, 0.5);
            padding: 40px;
            border-radius: 15px;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        .button {
            background-color: rgba(255, 255, 255, 0.6);
            color: black;
            padding: 15px 30px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
        }
        .button:hover {
            background-color: rgba(255, 255, 255, 0.8);
        }
    </style>
</head>
<body>
 
 <div class="container-0">
        <h1>Activity Club</h1>
        <p>กิจกรรมที่ทุกคนรอ...คอย</p>
        <form action="login.php" method="post">
            <button type="submit" class="button">Login</button>
        </form>
        <form action="signup.php" method="get">
            <button type="submit" class="button">Sign up</button>
        </form>
</div>
 