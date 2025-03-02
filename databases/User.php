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
    
    function login(String $username, String $password): array|bool
    {
        $conn = getConnection();
        $sql = 'SELECT * FROM User WHERE Name = ?';
        
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("❌ SQL ERROR: " . $conn->error);
        }
    
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 0) {
            return false; // ไม่พบผู้ใช้
        }
    
        $row = $result->fetch_assoc();
    
        if (password_verify($password, $row['password'])) {
            return $row; // เข้าสู่ระบบสำเร็จ
        } else {
            return false; // รหัสผ่านผิด
        }
    }
    


function logout(): void
{
    unset($_SESSION['timestamp']);
}