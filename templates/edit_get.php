<?php
if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $event = getEventById($eid);

    if ($event) {
        $activityName = $event['Eventname'];
        $activityDetails = $event['description'];
        $participants = $event['Max_participants'];
        $sdate = $event['start_date'];
        $edate = $event['end_date'];

    } else {
        echo "ไม่พบกิจกรรม";
    }
} else {
    echo "ไม่ได้รับ eid";
}
?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            width: 100%;
            font-family: Arial, sans-serif;
            background: #87CEFA;
            color: white;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 50px;
        }

        .edit-container {
            background: rgba(0, 0, 0, 0.85);
            padding: 40px;
            border-radius: 15px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.7);
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: white;
        }

        .image-upload {
            position: relative;
            width: 250px;
            height: 250px;
            margin: 0 auto 20px;
        }

        .image-upload img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            border: 2px solid #fff;
        }

        .image-upload input {
            display: none;
        }

        .create-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .create-form label {
            text-align: left;
            font-weight: bold;
            color: white;
        }

        .create-form input,
        .create-form textarea {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.9);
            color: black;
            font-size: 1rem;
            width: 100%;
        }

        .create-form textarea {
            resize: vertical;
            height: 100px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        button {
            padding: 12px 20px;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 48%;
        }

        .cancel-button {
            background-color: #dc3545;
            color: white;
        }

        .cancel-button:hover {
            background-color: #c82333;
        }

        .update-button {
            background-color: #007bff;
            color: white;
        }

        .update-button:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="edit-container">
        <h1>Edit Activity</h1>

        <!-- Image Upload Section -->
        <div class="image-upload" onclick="document.getElementById('file-upload').click();">
            <img id="preview-image" src="placeholder-image.jpg" alt="Click to upload">
            <input type="file" id="file-upload" accept="image/*" onchange="previewFile()">
        </div>

        <!-- Form Section -->
        <form class="create-form" action="/edit" method="POST" enctype="multipart/form-data">
            <label for="activity-name">Activity Name:</label>
            <input type="text" id="activity-name" name="activity-name" value="<?php echo $activityName; ?>"required>

            <label for="participants">Participants:</label>
            <input type="number" id="participants" name="participants" value="<?php echo $participants; ?>" required>

            <label for="start-date">Start Date:</label>
            <input type="date" id="start-date" name="start-date" value="<?php echo $sdate; ?>" required>

            <label for="end-date">End Date:</label>
            <input type="date" id="end-date" name="end-date" value="<?php echo $edate; ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" value="<?php echo $activityDetails; ?>" required>Activity description here...</textarea>

            <div class="button-container">
                <button type="button" class="cancel-button" onclick="goBack()">Cancel</button>
                <input type="hidden"  name="eid" value="<?php echo $event['Event_id']; ?>">
                <button type="submit" class="update-button" >Update</button>
            </div>
        </form>
    </div>

    <script>
        function previewFile() {
            const file = document.getElementById("file-upload").files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("preview-image").src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }

        function goBack() {
            window.history.back();
        }
    </script>
    