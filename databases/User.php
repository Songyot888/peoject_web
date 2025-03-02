<?php
    function register($email, $username, $password, $gender): bool {
        $conn = getConnection();
        $conn->query("ALTER TABLE User AUTO_INCREMENT = 1");
        // แฮชรหัสผ่านก่อนบันทึก
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
        // คำสั่ง INSERT ข้อมูลใหม่
        $sql = "INSERT INTO User (Email, Name, password, gender) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $email, $username, $hashed_password, $gender);
    
        $success = $stmt->execute();
    
        $stmt->close();
        $conn->close();
    
        return $success;
    }
    
    

    function login($name, $password, $remember)
    {
        $conn = getConnection(); 
    
        $query = "SELECT * FROM User WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];

            if ($remember) {
                setcookie("username", $name, time() + (86400 * 7), "/"); // 30 วัน
                setcookie("password", $name, time() + (86400 * 7), "/");
            } else {
                setcookie("username", "", time() - 3600, "/"); 
                setcookie("password", "", time() - 3600, "/");
            }

            header("Location: /login");
            exit();
        } else {
            echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!');</script>";
        }
    }
    

function logout(): void
{
    unset($_SESSION['timestamp']);
}