<?php

if (!isset($_SESSION['User_id'])) {
    header('Location: /login');
    exit;
}

?>

<style>
    body {
        background-color: #f0f8ff;
        font-family: Arial, sans-serif;
    }

    .checkin-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        text-align: center;
        background: #ffffff;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0px 4px 10px rgba(0, 123, 255, 0.3);
        max-width: 500px;
        margin: auto;
    }

    h2 {
        color: #007bff;
    }

    .checkin-image {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        margin-top: 15px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        border: 3px solid #007bff;
    }

    .checkin-input {
        font-size: 1rem;
        padding: 10px;
        border: 2px solid #007bff;
        border-radius: 5px;
        text-align: center;
        width: 80%;
        max-width: 400px;
        background: #f0f8ff;
    }

    .checkin-button {
        margin-top: 10px;
        padding: 10px 20px;
        font-size: 1.2rem;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0px 3px 6px rgba(0, 123, 255, 0.3);
        transition: all 0.3s;
    }

    .checkin-button:hover {
        background-color: #0056b3;
        box-shadow: 0px 5px 10px rgba(0, 123, 255, 0.5);
    }

    #preview-container {
        display: none;
        margin-top: 15px;
    }
</style>

<div class="checkin-container">
    <h2>เช็คอินเข้าร่วมกิจกรรม</h2>
    <p style="color: #0056b3; font-weight: bold;">กิจกรรม: <?php echo $data['event_id']['Eventname']; ?></p>
    <p style="color: #333;">กรุณาอัปโหลดรูปภาพเพื่อเช็คอิน</p>

    <form action="/checkin" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="event_id" value="<?php echo $data['event_id']['Event_id']; ?>">
        <input type="file" name="checkin_image" class="checkin-input" accept="image/*" required onchange="previewImage(event)">
        <div id="preview-container">
            <p style="color: #007bff; font-weight: bold;">รูปตัวอย่าง:</p>
            <img id="preview-image" class="checkin-image" src="#" alt="Preview">
        </div>
        <button name="upload" type="submit" class="checkin-button">อัปโหลดและเช็คอิน</button>
    </form>


    <?php if (!empty($uploaded_file)) : ?>
        <p style="color: #007bff; font-weight: bold;">รูปภาพของคุณ:</p>
        <img src="<?php echo $uploaded_file; ?>" class="checkin-image">
    <?php endif; ?>
</div>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-image').src = e.target.result;
                document.getElementById('preview-container').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }
</script>