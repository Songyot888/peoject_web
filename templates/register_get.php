
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
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
        }

        .container {
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        h1 {
            margin-bottom: 1rem;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(5px);
        }

        button {
            width: 100%;
            background: #ff758c;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #ff5e78;
        }

        .login-link {
            margin-top: 15px;
            font-size: 0.9rem;
            color: #333;
        }

        .login-link a {
            color: #ff758c;
            text-decoration: none;
        }
    </style>

    <div class="container">
        <h1>Register</h1>
        <form action="/login" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <select name="gender" required>
                <option value="" disabled selected>Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <button type="submit">Sign up</button>
        </form>
        <p class="login-link">Already have an account? <a href="/login">Login</a></p>
    </div>

