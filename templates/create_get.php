
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
            background: linear-gradient(135deg, #87CEFA, #4682B4);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .create-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 60px 80px;
            border-radius: 15px;
            width: 95%;
            max-width: 1200px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.6);
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 50px;
        }

        .activity-image {
            width: 350px;
            height: 350px;
            border-radius: 10px;
            border: 2px solid white;
            overflow: hidden;
            cursor: pointer;
            flex-shrink: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.3);
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
            gap: 20px;
            width: 100%;
        }

        .create-form h1 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .create-form input,
        .create-form textarea {
            padding: 15px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.3);
            color: white;
            font-size: 1.2rem;
            width: 100%;
        }

        .create-form textarea {
            resize: vertical;
            height: 150px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            gap: 30px;
        }

        button {
            padding: 16px 24px;
            font-size: 1.2rem;
            border: none;
            border-radius: 10px;
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
            background-color: #87CEFA;
            color: white;
        }

        .create-button:hover {
            background-color: #4682B4;
        }
    </style>
</head>

    <section>
        <div class="create-container">
            <div class="activity-image" onclick="document.getElementById('file-upload').click();">
                <img id="preview-image" src="" alt="Click to upload">
                <span id="upload-text">Click to upload image</span>
                <input type="file" id="file-upload" accept="image/*" onchange="previewFile()">
            </div>
            <form class="create-form" action="submit_activity.php" method="POST" enctype="multipart/form-data">
                <h1>Create Activity</h1>
                <input type="text" id="activity-name" name="activity-name" placeholder="Enter activity name" required>
                <input type="number" id="participants" name="participants" placeholder="Number of participants" required>
                <input type="date" id="start-date" name="start-date" required>
                <input type="date" id="end-date" name="end-date" required>
                <textarea id="description" name="description" placeholder="Describe the activity..." rows="4" required></textarea>
                <div class="button-container">
                    <button type="button" class="cancel-button" onclick="goBack()">Cancel</button>
                    <button type="submit" class="create-button">Create</button>
                </div>
            </form>
        </div>
    </section>

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
