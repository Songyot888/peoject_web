<style>
    section {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 50px 20px;
    }

    /* Profile container styles */
    .profile-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        width: 80%;
        max-width: 600px;
        background: rgba(0, 0, 0, 0.7);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
        margin-bottom: 40px;
        text-align: center;
    }

    /* Profile image styling */
    .profile-image img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #fff;
        margin-bottom: 20px;
    }

    /* Profile info section */
    .profile-info {
        color: white;
        text-align: center;
    }

    .profile-info h2 {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .profile-info p {
        font-size: 1.1rem;
        margin-bottom: 10px;
    }

    .edit-profile-button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }

    .edit-profile-button:hover {
        background-color: #0056b3;
    }
</style>
<section>
    <div class="profile-container">
        <div class="profile-image">
            <img src="profile-placeholder.jpg" alt="">
        </div>
        <div class="profile-info">
            <h2>Name Admin</h2>
            <p>Email: admin@example.com</p>
            <p>Phone: +123 456 7890</p>
            <p>Address: 123 Admin St, City</p>
            <p>Birthday: January 1, 1990</p>
            <button class="edit-profile-button">Edit Profile</button>
        </div>
    </div>
</section>
