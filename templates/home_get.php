<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Club</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            text-align: center;
        }

        .container-0 {
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #444;
        }

        .button {
            width: 100%;
            background: #667eea;
            color: white;
            padding: 12px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px 0;
            transition: 0.3s;
        }

        .button:hover {
            background: #5a67d8;
        }
    </style>
</head>

<body>

    <div class="container-0">
        <h1>Activity Club</h1>
        <p>กิจกรรมที่ทุกคนรอ...คอย</p>
        <button class="button" onclick="window.location.href='/login';">Login</button>
        <button class="button" onclick="window.location.href='/register';">Sign up</button>
    </div>

</body>

</html>