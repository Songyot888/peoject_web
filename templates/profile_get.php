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
    justify-content: space-between;
    gap: 30px;
    width: 80%;
    max-width: 1200px;
    background: rgba(0, 0, 0, 0.7);
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
    margin-bottom: 40px;
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
    text-align: left;
}

.profile-info h2 {
    font-size: 2rem;
    margin-bottom: 20px;
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

/* Activity container styles */
.activity-container {
    width: 80%;
    max-width: 1200px;
    background: rgba(0, 0, 0, 0.7);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
    color: white;
}

.activity-container h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    text-align: center;
}

/* Activity item styles */
.activity-item {
    display: flex;
    justify-content: space-between;
    padding: 15px;
    border-bottom: 1px solid #ddd;
    align-items: center;
}

.activity-item:last-child {
    border-bottom: none;
}

.activity-details {
    flex: 1;
    text-align: left;
}

.activity-status {
    display: flex;
    align-items: center;
    gap: 10px;
}

.activity-detail-button {
    padding: 6px 12px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.activity-detail-button:hover {
    background-color: #0056b3;
}

.status-dot {
    width: 15px;
    height: 15px;
    border-radius: 50%;
    display: inline-block;
}

/* Status colors */
.status-dot.green {
    background-color: #28a745;
}

.status-dot.yellow {
    background-color: #ffc107;
}

.status-dot.red {
    background-color: #dc3545;
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
    .profile-container,
    .activity-container {
        flex-direction: column;
        padding: 20px;
        width: 90%;
    }

    .activity-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }

    .activity-status {
        flex-direction: column;
        align-items: flex-start;
    }

    .profile-image img {
        width: 120px;
        height: 120px;
    }

    .edit-profile-button {
        width: 100%;
        font-size: 1rem;
    }
}
</style>
<section>
<div class="profile-container">
        <div class="profile-container">
            <div class="profile-image">
                <img src="profile-placeholder.jpg" alt="Profile Image">
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

        <div class="activity-container">
            <h2>Activities</h2>
            <div class="activity-item">
                <div class="activity-details">
                    <p>กิจกรรมที่ 1</p>
                    <p>รายละเอียดของกิจกรรม</p>
                </div>
                <div class="activity-status">
                    <button class="activity-detail-button">Detail</button>
                    <div class="status-dot green"></div>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-details">
                    <p>กิจกรรมที่ 2</p>
                    <p>รายละเอียดของกิจกรรม</p>
                </div>
                <div class="activity-status">
                    <button class="activity-detail-button">Detail</button>
                    <div class="status-dot yellow"></div>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-details">
                    <p>กิจกรรมที่ 3</p>
                    <p>รายละเอียดของกิจกรรม</p>
                </div>
                <div class="activity-status">
                    <button class="activity-detail-button">Detail</button>
                    <div class="status-dot red"></div>
                </div>
            </div>
        </div>
    </div>
</section>