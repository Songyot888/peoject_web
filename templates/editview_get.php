<style>
    section {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px 20px;
}

/* View container styles */
.view-container {
    background: rgba(0, 0, 0, 0.8);
    padding: 40px;
    border-radius: 15px;
    width: 80%;
    max-width: 1000px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.7);
    text-align: center;
}

h1 {
    font-size: 2.8rem;
    margin-bottom: 30px;
    color: #ffffff;
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
    border: 2px solid #fff;
}

/* Activity details styling */
.activity-details {
    max-width: 600px;
    text-align: left;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 10px;
    color: black;
}

.editview-description {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

/* Button container and buttons */
.button-container {
    display: flex;
    justify-content: space-around;
}

button {
    padding: 12px 20px;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.view-button {
    background-color: #007bff;
    color: white;
}

.view-button:hover {
    background-color: #0056b3;
}

.edit-button {
    background-color: #ffc107;
    color: white;
}

.edit-button:hover {
    background-color: #e0a800;
}

.delete-button {
    background-color: #dc3545;
    color: white;
}

.delete-button:hover {
    background-color: #c82333;
}


.back-button {
    padding: 12px 25px;
    font-size: 1.1rem;
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
    .view-container {
        width: 90%;
        padding: 20px;
    }

    .form-container {
        flex-direction: column;
        align-items: center;
    }

    .activity-details {
        max-width: 90%;
        text-align: center;
    }

    .button-container {
        flex-direction: column;
        gap: 15px;
    }

    .activity-image img {
        width: 200px;
        height: 200px;
    }
}
</style>
<section>
<div class="editview-container">
        <h1>View Activity</h1>
        <div class="form-container">
            <div class="activity-image">
                <img src="placeholder-image.jpg" alt="Activity Image">
            </div>
            <div class="activity-details">
                <p class="activity-description">
                    Lorem School Sports Day is an event that everyone eagerly awaits. It is a day when students can showcase their athletic abilities and team spirit with their color groups. The event begins with a vibrant parade, beautifully decorated and accompanied by cheerful music and energetic cheers. After the parade, the competitions start, featuring various sports like training races, long jumps, and even fun games that bring laughter to everyone.
                </p>
                <div class="button-container">
                    <button class="view-button">View</button>
                    <button class="edit-button">Edit</button>
                    <button class="delete-button">Delete</button>
                </div>
            </div>
        </div>
    </div>
</section>