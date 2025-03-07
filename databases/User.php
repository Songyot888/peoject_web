<?php
    function register($email, $username, $password, $gender): bool {
        $conn = getConnection();
        $conn->query("ALTER TABLE User AUTO_INCREMENT = 1");
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO User (Email, Name, password, gender) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $email, $username, $hashed_password, $gender);

        // Execute the query and return success
        $success = $stmt->execute();

        $stmt->close();
        $conn->close();

        return $success;
    }


    function login(String $username, String $password): array|bool
    {
        $conn = getConnection();
        $sql = 'select * from User where Name = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 0)
        {
            return false;
        }
        $row = $result->fetch_assoc();

        if(password_verify($password, $row['password']))
        {
            return $row;
        }else
        {
            return false;
        }
    }
    
    function getSearch(): mysqli_result|bool {
        $conn = getConnection();
        $sql = 'select * from Event';
        $result = $conn->query($sql);
        return $result;
    }
    
    function getSearchByKeyword(string $keyword): mysqli_result|bool
    {
        $conn = getConnection();
        $sql = 'select * from Event where Eventname like ?';
        $stmt = $conn->prepare($sql);
        $keyword = '%'. $keyword .'%';
        $stmt->bind_param('s',$keyword);
        $res = $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
function logout(): void
{
    unset($_SESSION['timestamp']);
}
function getUserById(int $id): array|bool
{
    $conn = getConnection();
    $sql = 'select * from User where User_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        return false;
    }
    return $result->fetch_assoc();
}

function updateUser($username, $email, $phone, $address, $image, $uid): bool {
    $conn = getConnection();

    if (isset($image)) {
        $uploadDir = 'uploads/profile/'; // กำหนดโฟลเดอร์สำหรับเก็บไฟล์ภาพ
        $uploadFile = $uploadDir . basename($image['name']); // สร้างเส้นทางของไฟล์ที่จะอัปโหลด
        if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
            $imagePath = $uploadFile; 
        } else {
            error_log("Image upload failed");
            return false;
        }
    } else {
        $imagePath = null; 
    }
    // SQL คำสั่งอัปเดตข้อมูล
    $sql = "UPDATE User SET Name=?, Email=?, phone=?, Addss=?, img_url=? WHERE User_id=?";
    error_log("SQL Query: " . $sql); // ตรวจสอบ SQL Query

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $username, $email, $phone, $address, $imagePath, $uid);

    // ถ้า execute สำเร็จ
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            error_log("Data updated successfully");
            return true;  // ถ้าอัปเดตข้อมูลสำเร็จ
        } else {
            error_log("No data updated, affected rows: " . $stmt->affected_rows);
            return false; // ถ้าไม่มีข้อมูลอัปเดต
        }
    } else {
        error_log("Execute failed: " . $stmt->error);
        return false;  // ถ้า execute ล้มเหลว
    }
    
}

