<style>
    section {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px 20px;
}

/* Create container styles */
.create-container {
    background: rgba(0, 0, 0, 0.7);
    padding: 30px;
    border-radius: 15px;
    width: 80%;
    max-width: 1000px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
    text-align: center;
}

h1 {
    font-size: 2.5rem;
    margin-bottom: 30px;
}

/* Form container styling */
.form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 40px;
    flex-wrap: wrap;
}

/* Activity image styling */
.activity-image img {
    width: 250px;
    height: 250px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 20px;
}

/* Form fields styling */
.create-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
    width: 350px;
}

/* Input and textarea styling */
.create-form input,
.create-form textarea {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: rgba(255, 255, 255, 0.8);
    color: black;
    font-size: 1rem;
}

.create-form textarea {
    resize: vertical;
}

/* Button container and buttons */
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
    transition: background-color 0.3s ease;
}

.cancel-button {
    background-color: #dc3545;
    color: white;
}

.cancel-button:hover {
    background-color: #c82333;
}

.create-button {
    background-color: #007bff;
    color: white;
}

.create-button:hover {
    background-color: #0056b3;
}

/* Footer and back button */
footer {
    display: flex;
    justify-content: center;
    margin-top: 30px;
}

.back-button {
    padding: 12px 25px;
    font-size: 1rem;
    background-color: #6c757d;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.back-button:hover {
    background-color: #5a6268;
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    .create-container {
        width: 90%;
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
            <div class="activity-image">
                <img src="placeholder-image.jpg" alt="Activity Image">
            </div>
            <form class="create-form">
                <label for="activity-name">Name activity:</label>
                <input type="text" id="activity-name" name="activity-name" required>

                <label for="participants">Participants:</label>
                <input type="number" id="participants" name="participants" required>

                <label for="start-date">Start date:</label>
                <input type="date" id="start-date" name="start-date" required>

                <label for="end-date">End date:</label>
                <input type="date" id="end-date" name="end-date" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>

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