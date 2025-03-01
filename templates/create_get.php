 <style>
        /* Background with gradient */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #2c3e50, #4ca1af);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 120vh;
        }

        section {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px 20px;
        }

        /* Container */
        .create-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 40px 30px;
            /* เพิ่ม padding ด้านบน */
            border-radius: 15px;
            width: 80%;
            max-width: 1000px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            
            margin-top: 10px;
            
        }


        /* Form layout */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        /* Image upload */
        .activity-image {
            width: 250px;
            height: 250px;
            border-radius: 10px;
            border: 2px solid white;
            overflow: hidden;
            cursor: pointer;
            position: relative;
        }

        .activity-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Hidden file input */
        .activity-image input {
            display: none;
        }

        /* Form fields */
        .create-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 350px;
        }

        /* Input styles */
        .create-form input,
        .create-form textarea {
            padding: 12px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 1rem;
            width: 100%;
        }

        .create-form input::placeholder,
        .create-form textarea::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .create-form textarea {
            resize: vertical;
            height: 100px;
        }

        /* Buttons */
        .button-container {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        button {
            padding: 12px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
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
            background-color: #3498db;
            color: white;
        }

        .create-button:hover {
            background-color: #2980b9;
        }

        /* Footer */
        footer {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .back-button {
            padding: 12px 20px;
            /* ลด padding ด้านข้างให้พอดี */
            font-size: 1rem;
            background-color: #6c757d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
            /* ให้ปุ่มมีขนาดพอดีกับข้อความ */
            text-align: center;
            width: auto;
            /* กำหนดขนาดตามเนื้อหา */
            min-width: 100px;
            /* ป้องกันไม่ให้เล็กเกินไป */
        }

        .back-button:hover {
            background-color: #5a6268;
        }


        /* Mobile Responsive */
        @media (max-width: 768px) {
            .create-container {
                width: 95%;
                padding: 20px;
            }

            .form-container {
                flex-direction: column;
                align-items: center;
            }

            .create-form {
                width: 100%;
            }
        }
    </style>

    <section>
        <div class="create-container">
            <h1>Create Activity</h1>
            <div class="form-container">
                <!-- Clickable image upload -->
                <div class="activity-image" onclick="document.getElementById('file-upload').click();">
                    <img id="preview-image" src="placeholder-image.jpg" alt="Activity Image">
                    <input type="file" id="file-upload" accept="image/*" onchange="previewFile()">
                </div>

                <form class="create-form">
                    <label for="activity-name">Name activity:</label>
                    <input type="text" id="activity-name" name="activity-name" placeholder="Enter activity name" required>

                    <label for="participants">Participants:</label>
                    <input type="number" id="participants" name="participants" placeholder="Number of participants" required>

                    <label for="start-date">Start date:</label>
                    <input type="date" id="start-date" name="start-date" required>

                    <label for="end-date">End date:</label>
                    <input type="date" id="end-date" name="end-date" required>

                    <label for="description">Description:</label>
                    <textarea id="description" name="description" placeholder="Describe the activity..." rows="4" required></textarea>

                    <div class="button-container">
                        <button type="button" class="cancel-button">Cancel</button>
                        <button type="submit" class="create-button">Create</button>
                    </div>
                </form>
            </div>
        </div>

        <footer>
            <button class="back-button">BACK</button>
        </footer>
    </section>

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
    </script>
