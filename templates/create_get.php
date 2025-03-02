<?php
    $User_id = $_SESSION['User_id'];
?>
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #87CEFA, #4682B4);
            color: white;
        }

        .create-container {
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 15px;
            width: 95%;
            max-width: 1000px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.6);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .activity-image {
            width: 200px;
            height: 200px;
            border-radius: 10px;
            border: 2px solid white;
            overflow: hidden;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.2);
            margin-bottom: 20px;
        }

        .activity-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
        }

        .activity-image input {
            display: none;
        }

        .create-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
            max-width: 500px;
        }

        .create-form input,
        .create-form textarea {
            padding: 12px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
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
            gap: 20px;
            margin-top: 15px;
        }

        button {
            padding: 12px;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            width: 48%;
        }

        .cancel-button {
            background-color: #e74c3c;
            color: white;
        }

        .cancel-button:hover {
            background-color: #c0392b;
        }

        .create-button {
            background-color: #2ecc71;
            color: white;
        }

        .create-button:hover {
            background-color: #27ae60;
        }
    </style>

    <div class="create-container">
        <!-- Image Upload Section -->
        <div class="activity-image" onclick="document.getElementById('file-upload').click();">
            <img id="preview-image" src="" alt="Click to upload">
            <span id="upload-text">Click to upload image</span>
            <input type="file" id="file-upload" name="image" accept="image/*" onchange="previewFile()">
        </div>

        <!-- Create Activity Form -->
        <form class="create-form" action="/create" method="POST" enctype="multipart/form-data">
            <h1>Create Activity</h1>
            <input type="text" name="activity-name" placeholder="Enter activity name" required>
            <input type="number" name="participants" placeholder="Number of participants" required>
            <input type="date" name="start-date" required>
            <input type="date" name="end-date" required>
            <textarea name="description" placeholder="Describe the activity..." required></textarea>
            <input type="hidden" name="status" value="Open" required>
            <input type="hidden" name="User_id" value="<?=$User_id?>">

            <div class="button-container">
                <!-- Cancel Button to Go Back -->
                <button type="button" class="cancel-button" onclick="goBack()">Cancel</button>
                <!-- Submit Button -->
                <button type="submit" class="create-button">Create</button>
            </div>
        </form>
    </div>

    <script>
        function previewFile() {
            const file = document.getElementById("file-upload").files[0];
            const preview = document.getElementById("preview-image");
            const uploadText = document.getElementById("upload-text");

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                    uploadText.style.display = "none";
                }
                reader.readAsDataURL(file);
            }
        }

        function goBack() {
            window.history.back();
        }
    </script>