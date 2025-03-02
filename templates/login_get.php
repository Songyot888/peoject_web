<?php

    echo "<section>";
    if (isset($_SESSION['alert']) && !empty($_SESSION['alert'])) {
        if ($_SESSION['alert'] === 'เข้าสู่ระบบสำเร็จ') {
            echo "<div class='alert alert-success'>" . $_SESSION['alert'] . "</div>";
        }else{
            echo "<div class='alert alert-success'>" . $_SESSION['alert'] . "</div>";
        } 
        unset($_SESSION['alert']);
    } 
    echo "</section>";
?>
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
            background: #87CEFA; /* สีฟ้าสดใส */
        }

        .container {
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 350px;
        }

        h1 {
            margin-bottom: 1rem;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .ps-con {
            position: relative;
        }

        .ps-con i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .remember-me {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.9rem;
            color: #555;
        }

        .remember-me label {
            display: flex;
            align-items: center;
            gap: 5px;
            white-space: nowrap;
        }

        button {
            width: 100%;
            background: #667eea;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #5a67d8;
        }

        .forgot-password,
        .signup-link a {
            display: block;
            margin-top: 10px;
            color: #667eea;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .signup-link {
            margin-top: 15px;
            font-size: 0.9rem;
            color: #333;
        }
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 10px;
            background: rgba(0, 0, 0, 0.2);
            color: white;
        }
    </style>

<section>
        <div class="container">
            <h1>Login</h1>
            <form action="/login" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <p class="signup-link">Don't have an account? <a href="/register">Sign up</a></p>
        </div>
</section>

    <?php require_once 'footer.php' ?>