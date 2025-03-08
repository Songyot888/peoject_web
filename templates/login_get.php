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
        background: rgba(255, 255, 255, 0.6); /* พื้นหลังโปร่งใส */
        backdrop-filter: blur(15px);
        padding: 40px 50px;
        width: 100%;
        max-width: 500px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        text-align: center;
        color: #333;
        animation: fadeIn 0.8s ease-in-out;
        box-sizing: border-box;
        transition: all 0.3s ease;
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

    h1 {
        margin-bottom: 30px;
        color: #4ca1af;
        font-size: 2rem;
        font-weight: 700;
    }

    input {
        width: 100%;
        padding: 15px;
        margin: 20px 0;
        border: 2px solid #ddd;
        border-radius: 25px;
        background: rgba(255, 255, 255, 0.8);
        color: #333;
        font-size: 18px;
        transition: all 0.3s ease;
    }

    input:focus {
        background: #fff;
        outline: none;
        border-color: #4ca1af;
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
        transition: all 0.3s ease;
        font-size: 18px;
        margin-top: 10px;
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
    }

    button:hover {
        background: linear-gradient(135deg, #0056b3, #0094cc);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 123, 255, 0.5);
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
        color: rgba(0, 0, 0, 0.6);
        transition: 0.3s ease;
    }

    .toggle-password:hover {
        color: rgba(0, 0, 0, 1);
    }

    .signup-link {
        margin-top: 20px;
        font-size: 16px;
    }

    .signup-link a {
        color: #00c6ff;
        font-weight: bold;
        text-decoration: none;
        transition: 0.3s ease;
    }

    .signup-link a:hover {
        text-decoration: underline;
        color: #0094cc;
    }

    .form-check {
        font-size: 14px;
        display: inline-flex;
        align-items: center;
        width: auto;
        margin-top: 10px;
        text-align: left;
        color: #555;
    }

    .form-check-input {
        padding: 5px;
        margin-right: 8px;
    }

    .form-check-label {
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        transition: 0.3s ease;
        background-color: transparent;
    }

    footer {
        text-align: center;
        padding: 15px;
        background: rgba(0, 0, 0, 0.1);
        margin-top: auto;
        font-size: 12px;
        color: #fff;
    }

    .input-label {
        text-align: left;
        width: 100%;
        margin-bottom: 5px;
        font-weight: 600;
        font-size: 14px;
        color: #333;
        display: inline-block;
        background-color: transparent;
    }

    .input-group {
        width: 100%;
        margin-bottom: 20px;
        text-align: left;
    }

    .container:hover {
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
        transform: translateY(-10px);
    }
</style>

<section>
    <div class="container">
        <h1>Login</h1>

        <form action="/login" method="POST">
            <div class="input-group">
                <label for="username" class="input-label">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter your username" required>
            </div>

            <div class="input-group password-wrapper">
                <label for="password" class="input-label">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
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
