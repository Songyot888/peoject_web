<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $uid = $_POST['uid'] ?? '';
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';

    $image = $_FILES['image'] ?? null;

    echo $uid;
    echo $username;
    echo $email;
    echo $phone;
    echo $address;
    echo $image;
    
    // เรียกฟังก์ชัน updateUser
    $result = updateUser($username, $email, $phone, $address, $image, $uid);

    if ($result) {
        header('Location: /profile');
    } else {
        echo "Update user failed. Check error log for details.";
    }
}
