<style>
    section {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 80px 20px 20px;
}

/* Activity Approval container styles */
.approval-container {
    background: rgba(0, 0, 0, 0.8);
    padding: 40px;
    border-radius: 15px;
    width: 80%;
    max-width: 1000px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
    text-align: center;
}

h1 {
    font-size: 2.8rem;
    margin-bottom: 30px;
}

/* User list styles */
.user-list {
    margin-bottom: 30px;
}

.user-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    background-color: rgba(0, 0, 0, 0.6);
    margin-bottom: 10px;
    border-radius: 10px;
}

.user-icon {
    width: 40px;
    height: 40px;
    background-color: #007bff;
    color: white;
    font-size: 1.5rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.user-name {
    flex: 1;
    margin-left: 15px;
    font-size: 1.2rem;
}

.user-status {
    display: flex;
    align-items: center;
    gap: 10px;
}

/* Status dot styles */
.status-dot {
    width: 15px;
    height: 15px;
    border-radius: 50%;
    display: inline-block;
}

.status-dot.green {
    background-color: #28a745;
}

.status-dot.yellow {
    background-color: #ffc107;
}

.status-dot.red {
    background-color: #dc3545;
}

/* Buttons styles */
.detail-button {
    padding: 6px 12px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.detail-button:hover {
    background-color: #0056b3;
}

.button-container {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    margin-top: 20px;
}

.deny-button {
    padding: 12px 20px;
    background-color: #dc3545;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1.2rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.deny-button:hover {
    background-color: #c82333;
}

.apply-button {
    padding: 12px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1.2rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.apply-button:hover {
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
    .approval-container {
        width: 90%;
        padding: 20px;
    }

    .user-item {
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
    }

    .user-status {
        margin-top: 10px;
        width: 100%;
        justify-content: flex-start;
    }

    .deny-button,
    .apply-button {
        width: 100%;
    }
}
</style>
<section>
        <div class="approval-container">
            <h1>Activity Approval</h1>
            <div class="user-list">
                <div class="user-item">
                    <div class="user-icon">U</div>
                    <div class="user-name">User 1</div>
                    <div class="user-status">
                        <button class="detail-button">Detail</button>
                        <div class="status-dot red"></div>
                    </div>
                </div>
                <div class="user-item">
                    <div class="user-icon">U</div>
                    <div class="user-name">User 2</div>
                    <div class="user-status">
                        <button class="detail-button">Detail</button>
                        <div class="status-dot red"></div>
                    </div>
                </div>
                <div class="user-item">
                    <div class="user-icon">U</div>
                    <div class="user-name">User 3</div>
                    <div class="user-status">
                        <button class="detail-button">Detail</button>
                        <div class="status-dot green"></div>
                    </div>
                </div>
                <div class="user-item">
                    <div class="user-icon">U</div>
                    <div class="user-name">User 4</div>
                    <div class="user-status">
                        <button class="detail-button">Detail</button>
                        <div class="status-dot yellow"></div>
                    </div>
                </div>
            </div>
            <div class="button-container">
                <button class="deny-button">Deny</button>
                <button class="apply-button">Apply</button>
            </div>
        </div>
</section>