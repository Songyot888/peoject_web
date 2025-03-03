
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #2c3e50, #4ca1af);
            background-size: cover;
        }

        .container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            padding: 40px 50px;
            width: 100%;
            max-width: 500px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            color: #fff;
            animation: fadeIn 0.8s ease-in-out;
            box-sizing: border-box;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .alert {
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
            margin-bottom: 15px;
            text-align: center;
        }

        .alert-success {
            background: #2ecc71;
            color: white;
        }

        input {
            width: 100%;
            padding: 15px;
            margin: 20px 0;
            border: none;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.3);
            color: #fff;
            font-size: 18px;
            transition: 0.3s;
        }

        input:focus {
            background: rgba(255, 255, 255, 0.5);
            outline: none;
            transform: scale(1.05);
        }

        button {
            background: linear-gradient(135deg, #007bff, #00c6ff);
            border: none;
            padding: 15px;
            border-radius: 25px;
            width: 100%;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.5);
            font-size: 18px;
        }

        button:hover {
            background: linear-gradient(135deg, #0056b3, #0094cc);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.7);
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 20px;
            color: rgba(255, 255, 255, 0.7);
            transition: 0.3s;
        }

        .toggle-password:hover {
            color: rgba(255, 255, 255, 1);
        }

        .signup-link {
            margin-top: 20px;
            font-size: 16px;
        }

        .signup-link a {
            color: #00c6ff;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
        }

        .signup-link a:hover {
            text-decoration: underline;
            color: #0094cc;
        }

        .form-check {
            font-size: 12px;
            display: inline-flex; /* แสดงให้เป็นแถวเดียวกัน */
            align-items: center;  /* จัดให้อยู่กลางแนวตั้ง */
            margin: 0; /* ลบ margin ที่ไม่จำเป็น */
        }

        .form-check-input {
            padding: 5px;
            margin-right: 8px; /* เพิ่มระยะห่างระหว่าง checkbox กับ label */
        }

        .form-check a {
            font-size: 12px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
        }
        .form-check a:hover {
            text-decoration: underline;
            color: #0094cc;
        }
        footer {
        text-align: center;
        padding: 15px;
        background: rgba(0, 0, 0, 0.1);
        margin-top: auto; /* ดัน Footer ไปอยู่ล่างสุด */
        font-size: 12px;
        color: #fff;
    }

    </style>

<section>
    <div class="container">
        <h1>Login</h1>

        <form action="/login" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <div class="password-wrapper">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <i class="fa-solid fa-eye-slash toggle-password" id="toggleIcon" onclick="togglePassword()"></i>
            </div>
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit">Login</button>
        </form>
        <p class="signup-link">Don't have an account? <a href="/register">Sign up</a></p>
    </div>
</section>

<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var toggleIcon = document.getElementById("toggleIcon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        }
    }
</script>
