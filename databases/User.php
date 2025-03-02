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

function logout(): void
{
    unset($_SESSION['timestamp']);
}