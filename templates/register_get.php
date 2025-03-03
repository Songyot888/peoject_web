<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    /* Layout หลักให้ Footer อยู่ล่างสุด */
    body {
        color: grey;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        background: linear-gradient(135deg, #2c3e50, #4ca1af); /* เปลี่ยนพื้นหลังเป็นสีกราเดียนท์ */
    }

    /* Container ปกติ ไม่ถูกปรับขนาด */
    .container {
        background: rgba(255, 255, 255, 0.2);
        
        backdrop-filter: blur(15px);
        padding: 40px 50px;
        border-radius: 15px;
        text-align: center;
        width: 100%;
        max-width: 450px;
        margin: auto; /* จัดให้อยู่กลาง */
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        animation: fadeIn 0.8s ease-in-out;
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
        margin-bottom: 1.5rem;
        color: #fff;
    }

    input, select {
        width: 100%;
        padding: 15px;
        margin: 15px 0;
        border: none;
        border-radius: 25px;
        font-size: 1rem;
        background: rgba(255, 255, 255, 0.3);
        color: #fff;
        backdrop-filter: blur(5px);
        transition: 0.3s;
    }

    input:focus, select:focus {
        background: rgba(255, 255, 255, 0.5);
        outline: none;
        transform: scale(1.05);
    }

    select option {
        color: grey;
        background-color: white;
    }

    button {
        background: linear-gradient(135deg, #667eea, #00c6ff);
        border: none;
        padding: 15px;
        border-radius: 25px;
        width: 100%;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 4px 10px rgba(0, 123, 255, 0.5);
        font-size: 1rem;
    }

    button:hover {
        background: linear-gradient(135deg, #5a67d8, #0094cc);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 123, 255, 0.7);
    }

    .signup-link {
        margin-top: 20px;
        font-size: 16px;
        color: #fff;
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

</style>

<div class="container">
    <h1>Register</h1>
    <form action="/register" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
        <select name="gender" required>
            <option value="" disabled selected>Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        <button type="submit" onclick="return validatePassword()">Sign up</button>
    </form>
    <p class="signup-link">Already have an account? <a href="/login">Login</a></p>
</div>
